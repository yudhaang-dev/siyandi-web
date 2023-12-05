@extends('panel.layouts.app')

@section('content-heading')
    @parent 
    <div class="container-fluid py-3">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h1 class="fw-bolder fs-3">Post Type</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('panel.post-types.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Post Type</li>
                    </ol>
                </nav>
            </div>
            <div>
                <a class="btn btn-outline-secondary" href="{{ route('panel.post-types.index') }}">Kembali</a>
            </div>
        </div>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        <form method="POST" action="{{ request()->routeIs('panel.post-types.edit') ? route('panel.post-types.update', $post_type) : route('panel.post-types.store') }}">
            @csrf
            @method((request()->routeIs('panel.post-types.edit') ? 'PUT' : 'POST'))
            <div class="card shadow">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input id="name" type="text" class="form-control @error("name") is-invalid @enderror @error("slug") is-invalid @enderror" name="name" value="{{ old('name', ($post_type->name ?? null)) }}">
                        @error("name")
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        @error("slug")
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="meta--media">Media</label>
                                <select id="meta--media" type="text" class="form-select @error("meta.media") is-invalid @enderror" name="meta[media]">
                                    <option value="none" @selected('none'==(old('meta.media', ($post_type->meta->media ?? 'none'))))>None</option>
                                    <option value="image" @selected('image'==(old('meta.media', ($post_type->meta->media ?? null))))>Image</option>
                                </select>
                                @error("meta.media")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="meta--category">Category</label>
                                <select id="meta--category" type="text" class="form-select @error("meta.category") is-invalid @enderror" name="meta[category]">
                                    <option value="0" @selected(old('meta.category', ($post_type->meta->category ?? false)))>No</option>
                                    <option value="1" @selected(old('meta.category', ($post_type->meta->category ?? false)))>Yes</option>
                                </select>
                                @error("meta.category")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
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
        search : {
            return : true
        },
        ajax : {
            url : `{{ route('panel.post-types.index') }}`
        },
        columns : [
            { data: 'name' },
            { data: 'meta' },
            { 
                data: 'id',
                className: 'text-center',
                width: '40px',
                render(data){
                    return `<div class="dropdown dropstart">
                        <button type="button" class="btn btn-xs btn-outline-secondary" data-bs-toggle="dropdown">&vellip;</button>
                        <ul class="dropdown-menu dropdown-menu-end border shadow">
                            <li><a class="dropdown-item" href="{{ route('panel.post-types.index') }}/${data}/edit">Edit</a></li>
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
                    url = `{{ route('panel.post-types.index') }}/${primaryKey}`;

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