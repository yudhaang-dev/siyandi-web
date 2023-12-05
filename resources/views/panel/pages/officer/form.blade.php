@extends('panel.layouts.app')

@section('content-heading')
    @parent 
    <div class="container-fluid py-3">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h1 class="fw-bolder fs-3">Pejabat & Staf</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('panel.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pejabat & Staf</li>
                    </ol>
                </nav>
            </div>
            <div>
                <a class="btn btn-outline-secondary" href="{{ route('panel.officers.index') }}">Kembali</a>
            </div>
        </div>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
        <form method="POST" action="{{ request()->routeIs('panel.officers.edit') ? route('panel.officers.update', $officer) : route('panel.officers.store') }}" enctype="multipart/form-data">
            @csrf
            @method((request()->routeIs('panel.officers.edit') ? 'PUT' : 'POST'))
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 text-center">
                                <img id="photo-preview" src="{{ $officer->photo ??  'https://placehold.co/200' }}" class="img-fluid rounded-circle" />
                                <input type="file" class="form-control" name="photo" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Nama</label>
                                <input id="name" type="text" class="form-control @error("name") is-invalid @enderror" name="name" value="{{ old('name', ($officer->name ?? null)) }}">
                                @error("name")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name">Jabatan</label>
                                <input id="position" type="text" class="form-control @error("position") is-invalid @enderror" name="position" value="{{ old('position', ($officer->position ?? null)) }}">
                                @error("position")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name">No Urut</label>
                                <input id="number" type="text" class="form-control @error("number") is-invalid @enderror" name="number" value="{{ old('number', ($officer->number ?? 1)) }}">
                                @error("number")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(`input[name="photo"]`).change(function () {
        let img = $('#photo-preview');
        if (this.files && this.files[0]) {
            let reader = new FileReader();
            reader.onload = function (e) {
                img.attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
</script>
@endpush