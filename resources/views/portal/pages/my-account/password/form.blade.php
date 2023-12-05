<x-web.layouts.master 
    :document="(object)['title'=>'Ganti Password']"
    :page-heading="(object)['title'=>'Ganti Password']">
	<x-web.layouts.blocks.user-card :user="auth()->user()"/>
	<!-- Profile Start -->
	<section class="section p-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12 mb-3">
                    @include('portal.components.sidebar-nav')
                </div>
                <!--end col-->
                <div class="col-lg-6 col-12">
                    <form action="{{ route('portal.my-account.password.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card border-0 rounded shadow">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label>Password Anda Saat Ini</label>
                                    <input type="text" name="current_password" class="form-control @error('current_password') is-invalid @enderror" value="{{ old('current_password', '') }}">
                                    @error('current_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Password Baru</label>
                                    <input type="text" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password', '') }}">
                                    @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Ulangi Password Baru</label>
                                    <input type="text" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" value="{{ old('password_confirmation', '') }}">
                                    @error('password_confirmation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="d-flex justify-content-end">
                                    <a href="javascript:history.back()" class="btn btn-outline-secondary me-2">Batal</a>
                                    <button type="submit" class="btn btn-primary">Ubah Password</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
	</section>
</x-web.layouts.master>