@extends('panel.layouts.app')

@section('content-heading')
    @parent 
    <div class="container-fluid py-3">
        <div class="d-flex align-items-end justify-content-between">
            <div>
                <h1 class="fw-bolder fs-3">Saluran Cari Kerja</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('panel.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Saluran Cari Kerja</li>
                    </ol>
                </nav>
            </div>
            <div>
                <a class="btn btn-primary" href="{{ route('panel.job-vacancy-channels.create') }}">Tambah</a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="table-responsive py-3">
            <table id="dt" class="table w-100" width="100%">
                <thead>
                    <th>Logo</th>
                    <th>Nama</th>
                    <th>URL</th>
                    <th></th>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
<script>
$(function(){
    const btnDtReload = $('#btn-dt-reload');
    const dt = $('#dt').DataTable({
        serverSide : true,
        processing : true,
        search : {
            return : true
        },
        ajax : {
            url : `{{ route('panel.job-vacancy-channels.index') }}`,
            data : (params)=>{
                return $.extend({},params,{
                    filters : {
                        status : $('#filter-status').val()
                    }
                });
            }
        },
        order : [[1, 'asc']],
        columns : [
            { 
                data: 'image', 
                width : '20px',
                orderable : false,
                searchable : false, 
                render(data, type, row, meta){
                    return `<img src="${data}" class="rounded-circle" width="30"/>`;
                }
            },
            { data: 'name' },
            { 
                data: 'url',
                render(data){
                    return `<a target="_blank" href="${data}">${data}</a>`;
                }
            },
            { 
                data: 'id',
                className: 'text-center',
                width: '40px',
                render(data){
                    return `<div class="dropdown dropstart">
                        <button type="button" class="btn btn-xs btn-outline-secondary" data-bs-toggle="dropdown">&vellip;</button>
                        <ul class="dropdown-menu dropdown-menu-end border shadow">
                            <li><a class="dropdown-item" href="{{ route('panel.job-vacancy-channels.index') }}/${data}/edit">Edit</a></li>
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
                    url = `{{ route('panel.job-vacancy-channels.index') }}/${primaryKey}`;

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
    
    btnDtReload.click((e)=>{
        e.preventDefault();
        dt.ajax.reload();
    });


});
</script>
@endpush