<x-web.layouts.master>
    <section class="bg-auth-home d-table w-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <div class="me-lg-5">
                        <img src="{{ asset('statics/landrick/images/user/signup.svg') }}" class="img-fluid d-block mx-auto" alt="">
                    </div>
                </div>
                <div class="col-md-7">
                    <h4 class="text-center fw-bolder mb-4">Daftar Akun Baru</h4>
                    <form class="login-form mt-4" action="{{ route('portal.auth.register') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">NIK <span class="text-danger">*</span></label>
                                    <div class="form-icon position-relative">
                                        <i data-feather="user" class="fea icon-sm icons"></i>
                                        <input type="number" class="form-control ps-5 @error('nik') is-invalid @enderror" placeholder="NIK" name="nik" value="{{ old('nik') }}">
                                        @error('nik')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nama <span class="text-danger">*</span></label>
                                    <div class="form-icon position-relative">
                                        <i data-feather="user" class="fea icon-sm icons"></i>
                                        <input type="text" class="form-control ps-5 @error('name') is-invalid @enderror" placeholder="Nama Lengkap" name="name" value="{{ old('name') }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Username <span class="text-danger">*</span></label>
                                    <div class="form-icon position-relative">
                                        <i data-feather="user" class="fea icon-sm icons"></i>
                                        <input type="text" class="form-control ps-5 @error('name') is-invalid @enderror" placeholder="Username" name="username" value="{{ old('username') }}">
                                        @error('username')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Email <span class="text-danger">*</span></label>
                                    <div class="form-icon position-relative">
                                        <i data-feather="mail" class="fea icon-sm icons"></i>
                                        <input type="email" class="form-control ps-5 @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password <span class="text-danger">*</span></label>
                                    <div class="form-icon position-relative">
                                        <i data-feather="key" class="fea icon-sm icons"></i>
                                        <input type="password" class="form-control ps-5 @error('password') is-invalid @enderror" placeholder="Password" name="password">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Ulangi Password <span class="text-danger">*</span></label>
                                    <div class="form-icon position-relative">
                                        <i data-feather="key" class="fea icon-sm icons"></i>
                                        <input type="password" class="form-control ps-5 @error('password_confirmation') is-invalid @enderror" placeholder="Password" name="password_confirmation">
                                        @error('password_confirmation')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Captcha <span class="text-danger">*</span></label>
                                    <div class="input-group @error('captcha') has-validation @enderror">
                                        <div class="input-group-text p-0">
                                            <img id="captcha" class="rounded-start" src="{{ captcha_src() }}" style="height:38px;">
                                        </div>
                                        <button 
                                            type="button" 
                                            class="btn btn-outline-secondary"
                                            onclick="document.getElementById('captcha').src=`{{ route('captcha') }}?_${Math.random()}`;"
                                        >&#x21bb;</button>
                                        <input type="text" class="form-control @error('captcha') is-invalid @enderror" placeholder="Captcha" name="captcha" />
                                        @error('captcha')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Daftar</button>
                            </div>
                        </div>
                        <div class="mx-auto text-center">
                            <p class="mb-0 mt-3">
                                <small class="text-dark me-2">Sudah punya akun ?</small>
                                <a href="{{ route('portal.auth.login') }}" class="text-dark fw-bold">Login disini.</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-web.layouts.master>