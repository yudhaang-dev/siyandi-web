@extends('panel.layouts.app')

@section('content-heading')
    @parent 
    <div class="container-fluid py-3">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h1 class="fw-bolder fs-3">Kecamatan</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('panel.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('panel.districts.index') }}">Kecamatan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@if (request()->routeIs('panel.districts.edit')) Edit @else Tambah @endif</li>
                    </ol>
                </nav>
            </div>
            <div>
                <a class="btn btn-secondary" href="{{ route('panel.districts.index') }}">Back to lists</a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4">
            <form method="POST" action="{{ request()->routeIs('panel.districts.edit') ? route('panel.districts.update', $district) : route('panel.districts.store') }}">
                @csrf
                @method((request()->routeIs('panel.districts.edit') ? 'PUT' : 'POST'))
                <div class="card shadow">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="province_code">Provinsi</label>
                            <select id="province_code" type="text" class="form-select">
                            @isset($district->city->province)
                                <option value="{{ $district->city->province->code }}">{{ $district->city->province->name }}</option>                                
                            @endisset
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="city_code">Kota Kabupaten</label>
                            <select id="city_code" type="text" class="form-select @error("city_code") is-invalid @enderror" name="city_code">
                            @isset($district->city)
                                <option value="{{ $district->city->code }}" selected>{{ $district->city->name }}</option>                                
                            @endisset
                            </select>
                            @error("city_code")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="code">Kode</label>
                            <input id="code" type="text" class="form-control @error("code") is-invalid @enderror" name="code" value="{{ old('code', ($district->code ?? null)) }}">
                            @error("code")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name">Nama</label>
                            <input id="name" type="text" class="form-control @error("name") is-invalid @enderror" name="name" value="{{ old('name', ($district->name ?? null)) }}">
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

@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(function(){
    const dt = $('#dt').DataTable({
        serverSide : true,
        processing : true,
        ajax : {
            url : `{{ route('panel.districts.index') }}`
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
                            <li><a class="dropdown-item" href="{{ route('panel.districts.index') }}/${data}/edit">Edit</a></li>
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
                    url = `{{ route('panel.districts.index') }}/${primaryKey}`;

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

    $.fn.select2.defaults.set("theme", "bootstrap-5");
    $.fn.select2.defaults.set("width", "100%");
    const selectProvinsi = $('#province_code').select2({
        ajax : {
            url             : `{{ route('panel.api.indonesia.region.index', ['region'=>'provinces']) }}`,
            dataType        : `json`,
            processResults  : function (response) {
                let data    = $.map(response.data, function (obj) {
                    obj.id      = obj.code;
                    obj.text    = obj.name;
                    return obj;
                });
                return {
                    results     : data,
                    pagination  : {
                        more: (response.links.next != null)
                    }
                };
            }
        }
    });
    const selectKota = $('#city_code').select2({
        ajax : {
            url             : `{{ route('panel.api.indonesia.region.index', ['region'=>'cities']) }}`,
            dataType        : `json`,
            data            : (params)=>{
                return $.extend({}, params, {
                    filters : {
                        province_code : selectProvinsi.val()
                    }
                });
            },
            processResults  : function (response) {
                let data    = $.map(response.data, function (obj) {
                    obj.id      = obj.code;
                    obj.text    = obj.name;
                    return obj;
                });
                return {
                    results     : data,
                    pagination  : {
                        more: (response.links.next != null)
                    }
                };
            }
        }
    });

    selectProvinsi.on({
        change(){
            selectKota.val(null).trigger('change');
        }
    })
});
</script>
@endpush