<section style="margin-top:-100px;">
    <div class="container">
        <div class="card public-profile border-0 rounded shadow" style="z-index: 1;">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-md-3 text-md-start text-center">
                        <img src="{{ asset('storage/' . $user->photo) }}" class="avatar avatar-large rounded-circle shadow d-block mx-auto" alt="">
                    </div><!--end col-->
                    <div class="col-lg-10 col-md-9">
                        <h3 class="title">{{ $user->name }}</h3>
                        <div class="table-responsive">
                            <table class="table table-borderless table-sm">
                                <tr>
                                    <td>NIK</td>
                                    <td>:</td>
                                    <td>{{ $user->nik }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td>:</td>
                                    <td>{{ $user->username }}</td>
                                </tr>
                            </table>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div>
        </div>
    </div>
</section>