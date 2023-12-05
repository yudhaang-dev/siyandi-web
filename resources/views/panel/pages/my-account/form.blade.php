@extends('panel.layouts.app')

@section('content-heading')
    @parent 
    <div class="container-fluid py-3 px-4">
        <h1 class="fw-bolder fs-3">My Account</h1>
    </div>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h4 class="text-center fw-bold mb-1">Edit Akun</h4>
            <form method="POST" action="{{ route('panel.my-account.update') }}">
                @csrf
                <div class="card shadow mb-3">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name">Kode</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('email', ($user->name ?? null)) }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email">Nama</label>
                            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', ($user->email ?? null)) }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-4">
            <h4 class="text-center fw-bold mb-1">Ganti Password</h4>
            <form method="POST" action="{{ route('panel.my-account.password.update') }}">
                @csrf
                <div class="card shadow">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="">Password Saat Ini</label>
                            <input type="text" class="form-control @error('current_password') is-invalid @enderror" name="current_password" name="current_password"/>
                            @error('current_password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Password Baru</label>
                            <input type="text" class="form-control @error('current_password') is-invalid @enderror" name="password" value="{{ old('password',null) }}"/>
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Ulangi Password Baru</label>
                            <input type="text" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"  value="{{ old('password_confirmation', null) }}"/>
                            @error('password_confirmation')
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