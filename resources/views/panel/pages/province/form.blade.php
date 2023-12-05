@extends('panel.layouts.app')

@section('content-heading')
    @parent 
    <div class="container-fluid py-3">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h1 class="fw-bolder fs-3">Provinsi</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('panel.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('panel.provinces.index') }}">Provinsi</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@if (request()->routeIs('panel.provinces.edit')) Edit @else Tambah @endif</li>
                    </ol>
                </nav>
            </div>
            <div>
                <a class="btn btn-secondary" href="{{ route('panel.provinces.index') }}">Back to lists</a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4">
            <form method="POST" action="{{ request()->routeIs('panel.provinces.edit') ? route('panel.provinces.update', $province) : route('panel.provinces.store') }}">
                @csrf
                @method((request()->routeIs('panel.provinces.edit') ? 'PUT' : 'POST'))
                <div class="card shadow">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="code">Kode</label>
                            <input id="code" type="text" class="form-control @error("code") is-invalid @enderror" name="code" value="{{ old('code', ($province->code ?? null)) }}">
                            @error("code")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control @error("name") is-invalid @enderror" name="name" value="{{ old('name', ($province->name ?? null)) }}">
                            @error("name")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
<script>
$(function(){
    const dt = $('#dt').DataTable({
        serverSide : true,
        processing : true,
        ajax : {
            url : `{{ route('panel.provinces.index') }}`
        },
        columns : [
            { data: 'code', width : '80px' },
            { data: 'name' },
            { 
                data: 'id',
                className: 'text-center',
                width: '40px',
                render(data){
                    return `<div class="dropdown dropstart">
                        <button type="button" class="btn btn-xs btn-outline-secondary" data-bs-toggle="dropdown">&vellip;</button>
                        <ul class="dropdown-menu dropdown-menu-end border shadow">
                            <li><a class="dropdown-item" href="{{ route('panel.provinces.index') }}/${data}/edit">Edit</a></li>
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
                    url = `{{ route('panel.provinces.index') }}/${primaryKey}`;

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