<x-web.layouts.master>
    <section class="bg-auth-home d-table w-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="me-lg-5">
                        <img src="{{ asset('statics/landrick/images/user/login.svg') }}" class="img-fluid d-block mx-auto" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <h4 class="text-center fw-bolder mb-4">Login</h4>
                    <form class="login-form mt-4" action="{{ route('portal.auth.authenticate') }}" method="POST">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label">Akun <span class="text-danger">*</span></label>
                                    <div class="form-icon position-relative">
                                        <i data-feather="user" class="fea icon-sm icons"></i>
                                        <input type="text" class="form-control ps-5 @error('user') is-invalid @enderror" placeholder="NIK/Email/Username" name="user" value="{{ old('user') }}" autofocus>
                                        @error('user')
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
                                <button type="submit" class="btn btn-primary w-100">Masuk <i data-feather="log-in" class="fea icon-sm"></i> </button>
                            </div>
                        </div>
                        <div class="mx-auto text-center">
                            <p class="mb-0 mt-3">
                                <small class="text-dark me-2">Belum punya akun ?</small>
                                <a href="{{ route('portal.auth.register') }}" class="text-dark fw-bold">Buat disini.</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-web.layouts.master>