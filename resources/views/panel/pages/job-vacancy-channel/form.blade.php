@extends('panel.layouts.app')

@section('content-heading')
    @parent 
    <div class="container-fluid py-3">
        <div class="d-flex align-items-center justify-content-between">
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
                <a class="btn btn-outline-secondary" href="{{ route('panel.job-vacancy-channels.index') }}">Kembali</a>
            </div>
        </div>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
        <form method="POST" action="{{ request()->routeIs('panel.job-vacancy-channels.edit') ? route('panel.job-vacancy-channels.update', $job_vacancy_channel) : route('panel.job-vacancy-channels.store') }}" enctype="multipart/form-data">
            @csrf
            @method((request()->routeIs('panel.job-vacancy-channels.edit') ? 'PUT' : 'POST'))
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3 text-center">
                                <img id="image-preview" src="{{ $job_vacancy_channel->image ??  'https://placehold.co/200' }}" class="img-fluid" />
                                <input type="file" class="form-control" name="image" />
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="name">Nama</label>
                                <input id="name" type="text" class="form-control @error("name") is-invalid @enderror" name="name" value="{{ old('name', ($job_vacancy_channel->name ?? null)) }}">
                                @error("name")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="url">Url</label>
                                <input id="url" type="text" class="form-control @error("url") is-invalid @enderror" name="url" value="{{ old('url', ($job_vacancy_channel->url ?? null)) }}">
                                @error("url")
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
    $(`input[name="image"]`).change(function () {
        let img = $('#image-preview');
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