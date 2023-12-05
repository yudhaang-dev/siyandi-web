@extends('panel.layouts.blank')

@section('content')
    <section class="login-content">
        <div class="row m-0 align-items-center bg-white vh-100">
            <div class="col-md-6">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="card card-transparent shadow-none d-flex justify-content-center mb-0 auth-card">
                            <div class="card-body">
                                <h2 class="mb-2 text-center fw-bolder text-uppercase">Login</h2>
                                <form method="POST" action="{{ route('panel.auth.authenticate') }}" data-toggle="validator">
                                    @csrf
                                    <div class="form-floating mb-3">
                                        <input id="user" type="text" class="form-control @error('user') is-invalid @enderror" name="user" value="{{ old('user', null) }}" autofocus placeholder="Your Account"/>
                                        <label for="user">Email/Name</label>
                                        @error('user')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Your Password" />
                                        <label for="password">Password</label>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-lg w-100">{{ __('Sign In') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sign-bg">
                    <svg width="280" height="230" viewBox="0 0 431 398" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g opacity="0.05">
                            <rect x="-157.085" y="193.773" width="543" height="77.5714" rx="38.7857" transform="rotate(-45 -157.085 193.773)" fill="#3B8AFF"/>
                            <rect x="7.46875" y="358.327" width="543" height="77.5714" rx="38.7857" transform="rotate(-45 7.46875 358.327)" fill="#3B8AFF"/>
                            <rect x="61.9355" y="138.545" width="310.286" height="77.5714" rx="38.7857" transform="rotate(45 61.9355 138.545)" fill="#3B8AFF"/>
                            <rect x="62.3154" y="-190.173" width="543" height="77.5714" rx="38.7857" transform="rotate(45 62.3154 -190.173)" fill="#3B8AFF"/>
                        </g>
                    </svg>
                </div>
            </div>
            <div class="col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
                {{-- <img src="{{asset('statics/hope-ui/images/error/02.png')}}" class="img-fluid gradient-main animated-scaleX" alt="images"> --}}
                <div class="d-flex w-100 vh-100 align-items-center justify-content-center p-5">
                    <div class="p-5">
                        <img src="{{asset('statics/hope-ui/images/error/02.png')}}" class="img-fluid" />
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection