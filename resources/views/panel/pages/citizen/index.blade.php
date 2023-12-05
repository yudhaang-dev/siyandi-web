@extends('panel.layouts.app')

@section('content-heading')
    @parent 
    <div class="container-fluid py-3">
        <div class="d-flex align-items-end justify-content-between">
            <div>
                <h1 class="fw-bolder fs-3">Masyarakat</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('panel.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Masyarakat</li>
                    </ol>
                </nav>
            </div>
            <div>
                <div class="input-group">
                    <select id="filter-status" class="form-select">
                        <option value="">Semua</option>
                        <option value="1">Aktif</option>
                        <option value="0">Non Aktif</option>
                    </select>
                    <button id="btn-dt-reload" type="button" class="btn btn-primary">Terapkan</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="table-responsive py-3">
            <table id="dt" class="table w-100" width="100%">
                <thead>
                    <th></th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Email</th>
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
            url : `{{ route('panel.citizens.index') }}`,
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
                data: 'photo', 
                width : '20px',
                orderable : false,
                searchable : false, 
                render(data){
                    return `<img src="{{ asset('storage') }}/${data}" class="rounded-circle" width="30"/>`;
                }
            },
            { 
                data: 'name', 
                render(data, type, row, meta){
                    return `<a href="{{ route('panel.citizens.index') }}/${row.id}" class="fw-bold">${data}</a>`;
                }
            },
            { data: 'nik' },
            { data: 'email' },
            { 
                data: 'status',
                width: '40px',
                className: 'text-center',
                orderable: false,
                searchable: false, 
                render(data){
                    return `<span class="badge bg-${data > 0 ? 'success' : 'secondary'}">${data > 0 ? 'Aktif' : 'Non Aktif'}</span>`;
                }
            },
        ]
    });
    
    btnDtReload.click((e)=>{
        e.preventDefault();
        dt.ajax.reload();
    });


});
</script>
@endpush