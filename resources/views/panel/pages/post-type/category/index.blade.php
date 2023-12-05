@extends('panel.layouts.app')

@section('content-heading')
    @parent 
    <div class="container-fluid py-3">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h1 class="fw-bolder fs-3">Kategori {{ $post_type->name ?? 'Posts' }}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('panel.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('panel.post-types.posts.index', ['post_type'=> $post_type]) }}">{{ $post_type->name ?? 'Posts' }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Kategori</li>
                    </ol>
                </nav>
            </div>
            <div>
                <a class="btn btn-outline-secondary" href="{{ route('panel.post-types.posts.index', ['post_type'=> $post_type]) }}">Kembali</a>
                <a class="btn btn-primary" href="{{ route('panel.post-types.categories.create', ['post_type'=> $post_type]) }}">Tambah</a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="table-responsive py-3">
            <table id="dt" class="table w-100" width="100%">
                <thead>
                    <th>Name</th>
                    <th></th>
                </thead>
            </table>
        </div>
    </div>
    <div class="modal fade" id="dtModalDelete" tabindex="-1" aria-labelledby="dtModalDelete" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form id="dtModalDeleteForm" method="POST" action="">
                        @csrf
                        <div class="text-center">
                            <p>Data akan dihapus secara permanen, anda yakin ?</p>
                            <div>
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-danger">Delete</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
$(function(){
    const dt = $('#dt').DataTable({
        serverSide : true,
        processing : true,
        search : {
            return : true
        },
        ajax : {
            url : `{{ route('panel.post-types.categories.index', ['post_type'=> $post_type]) }}`
        },
        columns : [
            { data: 'name' },
            { 
                data: 'id',
                className: 'text-center',
                width: '40px',
                render(data){
                    return `<div class="dropdown dropstart">
                        <button type="button" class="btn btn-xs btn-outline-secondary" data-bs-toggle="dropdown">&vellip;</button>
                        <ul class="dropdown-menu dropdown-menu-end border shadow">
                            <li><a class="dropdown-item" href="{{ route('panel.post-types.categories.index', ['post_type'=> $post_type], ['post_type'=> $post_type]) }}/${data}/edit">Edit</a></li>
                            <li><a class="dropdown-item btn-delete" data-primary-key="${data}">Delete</a></li>
                        </ul>  
                    </div>`;
                },

            },
        ],
        rowCallback(row, data) {
            let api = this.api();
            $(row).find('.btn-delete').click(function(){
                let primaryKey = $(this).data('primaryKey'),
                    url = `{{ route('panel.post-types.categories.index', ['post_type'=> $post_type]) }}/${primaryKey}`;

                Swal.fire({
                    title   : "Anda Yakin ?",
                    text    : "Data tidak dapat dikembalikan setelah di hapus!",
                    icon    : "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Ya, Hapus!",
                    cancelButtonText: "Tidak, Batalkan",
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: url,
                            type: "DELETE",
                            data: {
                                _token  : '{{ csrf_token() }}',
                                _method : 'DELETE'
                            },
                            error   : function(response){
                                toastr.error('Data failed to delete', 'Failed !');
                            },
                            success : function(response) {
                                toastr.success('Data has been deleted', 'Success !');
                                api.ajax.reload(null, false);
                            }
                        });
                    }
                });
            });
        }
    });
});
</script>
@endpush