@extends('panel.layouts.app')

@section('content-heading')
    @parent 
    <div class="container-fluid py-3">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h1 class="fw-bolder fs-3">Masyarakat</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('panel.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('panel.citizens.index') }}">Masyarakat</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail</li>
                    </ol>
                </nav>
            </div>
            <div>
                <a class="btn btn-outline-secondary" href="{{ route('panel.citizens.index') }}">Kembali</a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-1">
                    <div class="text-center mb-3">
                        <img src="{{ asset('storage/' . ($citizen->photo ?? '')) }}" class="rounded-circle img-fluid" />
                    </div>
                </div>
                <div class="col-md-6">
                    <p class="fw-bolder mb-0">Profil Kependudukan</p>
                    <hr class="mt-1">
                    <dl class="row">
                        <dt class="col-sm-4">NIK</dt>
                        <dd class="col-sm-8">{{ $citizen->nik }}</dd>
                        <dt class="col-sm-4">Nama</dt>
                        <dd class="col-sm-8">{{ $citizen->name }}</dd>
                        <dt class="col-sm-4">TTL</dt>
                        <dd class="col-sm-8">{{ $citizen->place_of_birth ?? '-' }}, {{ $citizen->date_of_birth->locale('id')->translatedFormat('d F Y') ?? '-' }}</dd>
                        <dt class="col-sm-4">Jenis Kelamin</dt>
                        <dd class="col-sm-8">{{ isset($citizen->sex) && !empty($citizen->sex) ? ($citizen->sex == 'Male' ? 'Laki-laki' : 'Perempuan') : '-' }}</dd>
                        <dt class="col-sm-4">Agama</dt>
                        <dd class="col-sm-8">{{ $citizen->religion ?? '-' }}</dd>
                        <dt class="col-sm-4">Status Perkawinan</dt>
                        <dd class="col-sm-8">{{ $citizen->marital_status ?? '-' }}</dd>
                        <dt class="col-sm-4">Status Pekerjaan</dt>
                        <dd class="col-sm-8">{{ $citizen->job_status ?? '-' }}</dd>
                        <dt class="col-sm-4">Alamat</dt>
                        <dd class="col-sm-8">{{ $citizen->address ?? '-' }}</dd>
                        <dt class="col-sm-4">Kewarganegaraan</dt>
                        <dd class="col-sm-8">{{ $citizen->citizenship ?? '-' }}</dd>
                    </dl>
                </div>
                <div class="col-md-5">
                    <p class="fw-bolder mb-0">Pendidikan & Keterampilan</p>
                    <hr class="mt-1">
                    <dl class="row">
                        <dt class="col-sm-4">Pendidikan</dt>
                        <dd class="col-sm-8">{{ $citizen->education ?? '-' }}</dd>
                        <dt class="col-sm-4">Keterampilan</dt>
                        <dd class="col-sm-8">
                            @if (isset($citizen->skills) && count($citizen->skills) > 0)
                            @foreach ($citizen->skills as $skill)
                                <span class="badge bg-secondary">{{ $skill->name }}</span>                                
                            @endforeach
                            @else
                            -
                            @endif
                        </dd>
                    </dl>
                    <p class="fw-bolder mb-0">Akun</p>
                    <hr class="mt-1">
                    <dl class="row">
                        <dt class="col-sm-4">Email</dt>
                        <dd class="col-sm-8">{{ $citizen->email }}</dd>
                        <dt class="col-sm-4">Username</dt>
                        <dd class="col-sm-8">{{ $citizen->username }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
@endsection
