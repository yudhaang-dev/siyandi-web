<x-web.layouts.master :page-heading="(object)['title'=>'Portal Akun Saya']">
    <x-web.layouts.blocks.user-card :user="$user"/>
    <!-- Profile Start -->
    <section class="section p-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12 mb-3">
                    @include('portal.components.sidebar-nav')
                </div><!--end col-->

                <div class="col-lg-9 col-12">
                    <div class="border-bottom pb-4">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <h5>Profil Kependudukan:</h5>
                                <div class="mb-4">
                                    <div class="d-flex align-items-center mb-3">
                                        <i data-feather="mail" class="fea icon-ex-md text-muted me-3"></i>
                                        <div class="flex-1">
                                            <h6 class="text-primary mb-0">NIK :</h6>
                                            <span class="text-muted">{{ $user->nik }}</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <i data-feather="bookmark" class="fea icon-ex-md text-muted me-3"></i>
                                        <div class="flex-1">
                                            <h6 class="text-primary mb-0">Nama :</h6>
                                            <span class="text-muted">{{ $user->name }}</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <i data-feather="italic" class="fea icon-ex-md text-muted me-3"></i>
                                        <div class="flex-1">
                                            <h6 class="text-primary mb-0">Tempat Lahir :</h6>
                                            <span class="text-muted">{{ $user->place_of_birth ?? '-' }}</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <i data-feather="gift" class="fea icon-ex-md text-muted me-3"></i>
                                        <div class="flex-1">
                                            <h6 class="text-primary mb-0">Tanggal Lahir :</h6>
                                            <span class="text-muted">{{ !empty($user->date_of_birth) ? $user->date_of_birth->format('l, d F Y') : '-'  }}</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <i data-feather="globe" class="fea icon-ex-md text-muted me-3"></i>
                                        <div class="flex-1">
                                            <h6 class="text-primary mb-0">Alamat :</h6>
                                            <span class="text-muted">{{ $user->address ?? '-' }}</span>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center mb-3">
                                        <i data-feather="map-pin" class="fea icon-ex-md text-muted me-3"></i>
                                        <div class="flex-1">
                                            <h6 class="text-primary mb-0">Agama :</h6>
                                            <span class="text-muted">{{ $user->religion ?? '-' }}</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <i data-feather="phone" class="fea icon-ex-md text-muted me-3"></i>
                                        <div class="flex-1">
                                            <h6 class="text-primary mb-0">Status Perkawinan :</h6>
                                            <span class="text-muted">{{ $user->marital_status ?? '-' }}</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <i data-feather="phone" class="fea icon-ex-md text-muted me-3"></i>
                                        <div class="flex-1">
                                            <h6 class="text-primary mb-0">Pekerjaan :</h6>
                                            <span class="text-muted">{{ $user->job_status ?? '-' }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <h5>Pendidikan & Keahlian :</h5>
                                <div class="mb-4">
                                    <div class="d-flex align-items-center mb-3">
                                        <i data-feather="mail" class="fea icon-ex-md text-muted me-3"></i>
                                        <div class="flex-1">
                                            <h6 class="text-primary mb-0">Pendidikan Terakhir:</h6>
                                            <span class="text-muted">{{ $user->education ?? '-' }}</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <i data-feather="mail" class="fea icon-ex-md text-muted me-3"></i>
                                        <div class="flex-1">
                                            <h6 class="text-primary mb-0">Keterampilan :</h6>
                                            @if (!empty($user->skills))
                                                @foreach ($user->skills as $skill)
                                                    <span class="badge bg-secondary">{{ $skill->name }}</span>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <h5>Akun :</h5>
                                <div class="mb-4">
                                    <div class="d-flex align-items-center mb-3">
                                        <i data-feather="mail" class="fea icon-ex-md text-muted me-3"></i>
                                        <div class="flex-1">
                                            <h6 class="text-primary mb-0">Email :</h6>
                                            <span class="text-muted">{{ $user->email ?? '-' }}</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <i data-feather="mail" class="fea icon-ex-md text-muted me-3"></i>
                                        <div class="flex-1">
                                            <h6 class="text-primary mb-0">Username :</h6>
                                            <span class="text-muted">{{ $user->username ?? '-' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('portal.my-account.profile.edit') }}" class="btn btn-outline-primary w-100 mb-3">Edit Profil</a>
                                <a href="{{ route('portal.my-account.password.edit') }}" class="btn btn-outline-primary w-100 mb-3">Ubah Password</a>
                            </div>
                        </div><!--end row-->
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- Profile End -->
</x-web.layouts.master>