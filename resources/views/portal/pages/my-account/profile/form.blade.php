<x-web.layouts.master 
    :document="(object)['title'=>'Edit Profil Saya']"
    :page-heading="(object)['title'=>'Edit Profil Saya']">
	<x-web.layouts.blocks.user-card :user="$citizen"/>
	<!-- Profile Start -->
	<section class="section p-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12 mb-3">
                    @include('portal.components.sidebar-nav')
                </div>
                <!--end col-->
                <div class="col-lg-9 col-12">
                    <form action="{{ route('portal.my-account.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card border-0 rounded shadow">
                            <div class="card-body">
                                <h5 class="mb-4">Profil Kependudukan :</h5>
                                <div class="row mb-3">
                                    <div class="col-md-3 text-center">
                                        <img id="user-photo-preview" src="{{ asset('storage/' . ($citizen->photo ?? null)) }}" class="avatar avatar-medium rounded-circle shadow" alt="">
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group mb-4">
                                            <label for="">Foto</label>
                                            <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" accept=".jpg, .jpeg, .png">
                                            @error('photo')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label">NIK</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik"  value="{{ old('nik', ($citizen->nik ?? null)) }}">
                                        @error('nik')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label">Nama</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', ($citizen->name ?? null)) }}">
                                        @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label">TTL</label>
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="">Tempat Lahir</label>
                                                <input type="text" class="form-control @error('place_of_birth') is-invalid @enderror" name="place_of_birth" value="{{ old('place_of_birth', ($citizen->place_of_birth ?? null)) }}">
                                                @error('place_of_birth')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-6">
                                                <label for="">Tanggal Lahir</label>
                                                <input type="text" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth', ($citizen->date_of_birth ?? null)) }}">
                                                @error('date_of_birth')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label">Kelamin</label>
                                    <div class="col-md-9">
                                        <select class="form-select @error('sex') is-invalid @enderror" name="sex">
                                            @foreach (config('select_option.sex') as $sex)
                                            <option value="{{ $sex }}" @selected($sex == (old('sex', ($citizen->sex ?? null))))>{{ ($sex == 'Female' ? 'Perempuan' : 'Laki-laki') }}</option>
                                            @endforeach
                                        </select>
                                        @error('sex')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label">Alamat</label>
                                    <div class="col-md-9">
                                        <div class="form-group mb-3">
                                            <label for="">Jalan</label>
                                            <textarea class="form-control @error('address') is-invalid @enderror" name="address">{{ old('address', ($citizen->address ?? null)) }}</textarea>
                                            @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="province-code">Provinsi <span class="text-danger">*</span></label>
                                            <select id="province-code" class="form-select" name="province_code">
                                                @if (isset($citizen->village) && !empty($citizen->village))
                                                    <option value="{{ $citizen->village->district->city->province->code }}" selected>{{ $citizen->village->district->city->province->name }}</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="city-code">Kota/Kabupaten <span class="text-danger">*</span></label>
                                            <select id="city-code" class="form-select" name="city_code">
                                                @if (isset($citizen->village) && !empty($citizen->village))
                                                    <option value="{{ $citizen->village->district->city->code }}" selected>{{ $citizen->village->district->city->name }}</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="district-code">Kecamatan <span class="text-danger">*</span></label>
                                            <select id="district-code" class="form-select" name="district_code">
                                                @if (isset($citizen->village) && !empty($citizen->village))
                                                    <option value="{{ $citizen->village->district->code }}" selected>{{ $citizen->village->district->name }}</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="village-code">Kelurahan <span class="text-danger">*</span></label>
                                            <select id="village-code" class="form-select @error('village_code') is-invalid @enderror" name="village_code">
                                                @if (isset($citizen->village) && !empty($citizen->village))
                                                    <option value="{{ $citizen->village->code }}" selected>{{ $citizen->village->name }}</option>
                                                @endif
                                            </select>
                                            @error('village_code')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label">Agama</label>
                                    <div class="col-md-9">
                                        <select class="form-select @error('religion') is-invalid @enderror" name="religion">
                                            @foreach (config('select_option.religion') as $religion)
                                            <option value="{{ $religion }}" @selected($religion == (old('religion', ($citizen->religion ?? null))))>{{ $religion }}</option>
                                            @endforeach
                                        </select>
                                        @error('religion')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label">Status Pekerjaan</label>
                                    <div class="col-md-9">
                                        <input type="text" name="job_status" class="form-control @error('job_status') is-invalid @enderror" value="{{ old('job_status', ($citizen->job_status ?? null)) }}">
                                        @error('job_status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label">Status Perkawinan</label>
                                    <div class="col-md-9">
                                        <select class="form-select @error('marital_status') is-invalid @enderror" name="marital_status">
                                            @foreach (config('select_option.marital_status') as $marital_status)
                                            <option value="{{ $marital_status }}" @selected($marital_status == (old('marital_status', ($citizen->marital_status ?? null))))>{{ $marital_status }}</option>
                                            @endforeach
                                        </select>
                                        @error('marital_status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label">Kewarganegaraan</label>
                                    <div class="col-md-9">
                                        <select class="form-select @error('citizenship') is-invalid @enderror" name="citizenship">
                                            @foreach (config('select_option.citizenship') as $citizenship)
                                            <option value="{{ $citizenship }}" @selected($citizenship == (old('citizenship', ($citizen->citizenship ?? null))))>{{ $citizenship }}</option>
                                            @endforeach
                                        </select>
                                        @error('citizenship')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <hr>
                                <h5 class="mb-4">Pendidikan dan Keahlian :</h5>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label">Pendidikan</label>
                                    <div class="col-md-9">
                                        <select class="form-select @error('education') is-invalid @enderror" name="education">
                                            @foreach (config('select_option.education') as $education)
                                            <option value="{{ $education }}" @selected($education == (old('education', ($citizen->education ?? null))))>{{ $education }}</option>
                                            @endforeach
                                        </select>
                                        @error('education')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label">Keterampilan</label>
                                    <div class="col-md-9">
                                        <select id="skills" class="form-select @error('skills') is-invalid @enderror" name="skills[]" multiple>
                                        @foreach ($citizen->skills as $skill)
                                        <option value="{{ $skill->name }}" selected>{{ $skill->name }}</option>                                            
                                        @endforeach
                                        </select>
                                        @error('skills')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <hr>
                                <h5 class="mb-4">Akun :</h5>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', ($citizen->email ?? null)) }}">
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label">Username</label>
                                    <div class="col-md-9">
                                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username', ($citizen->username ?? null)) }}">
                                        @error('username')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-end">
                                    <a href="javascript:history.back()" class="btn btn-outline-secondary me-2">Batal</a>
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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
	<!--end section-->
	<!-- Profile End -->
	<x-slot:css>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.13/dist/flatpickr.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css">
    </x-slot>
	<x-slot:scripts>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.13/dist/flatpickr.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.full.min.js"></script>
        <script>
            $.fn.select2.defaults.set("theme", "bootstrap-5");
            $.fn.select2.defaults.set("width", "100%");
            $(document).ready(function () {
                $(`input[name="photo"]`).change(function () {
                    let thumb = $('#user-photo-preview');
                    thumb.attr('src', `{{ asset('storage/' . $citizen->photo) }}`);
                    if (this.files && this.files[0]) {
                        let reader = new FileReader();
                        reader.onload = function (e) {
                            thumb.attr('src', e.target.result);
                        }
                        reader.readAsDataURL(this.files[0]);
                    }
                });
                
                $(`input[name="date_of_birth"]`).flatpickr({
                    dateFormat: "Y-m-d",
                    maxDate: "today"
                });

                const 
                selectProvince = $('#province-code').select2({
                    placeholder: "Pilih Provinsi",
                    allowClear: true,
                    ajax: {
                        url: "{{ route('portal.api.indonesia.region.index', ['region'=>'province']) }}",
                        dataType: "json",
                        delay: 200,
                        cache: true,
                        data: function (params) {
                            return $.extend({}, params, {});
                        },
                        processResults(response) {
                            return {
                                results: $.map(response.data, function (obj) {
                                    obj.id    = obj.code || obj.id;
                                    obj.text  = obj.text || obj.name;
                                    return obj;
                                }),
                                pagination: {
                                    more : (response.links.next != null)
                                }
                            }
                        }
                    }
                }),
                selectCity = $('#city-code').select2({
                    placeholder: "Pilih Kota/Kabupaten",
                    allowClear: true,
                    ajax: {
                        url: "{{ route('portal.api.indonesia.region.index', ['region'=>'city']) }}",
                        dataType: "json",
                        delay: 200,
                        cache: true,
                        data: function (params) {
                            return $.extend({}, params, {
                                filters : {
                                    province_code : selectProvince.val()
                                }
                            });
                        },
                        processResults(response) {
                            return {
                                results: $.map(response.data, function (obj) {
                                    obj.id    = obj.code || obj.id;
                                    obj.text  = obj.text || obj.name;
                                    return obj;
                                }),
                                pagination: {
                                    more : (response.links.next != null)
                                }
                            }
                        }
                    }
                }),
                selectDistrict = $('#district-code').select2({
                    placeholder: "Pilih Kecamatan",
                    allowClear: true,
                    ajax: {
                        url: "{{ route('portal.api.indonesia.region.index', ['region'=>'district']) }}",
                        dataType: "json",
                        delay: 200,
                        cache: true,
                        data: function (params) {
                            return $.extend({}, params, {
                                filters : {
                                    city_code : selectCity.val()
                                }
                            });
                        },
                        processResults(response) {
                            return {
                                results: $.map(response.data, function (obj) {
                                    obj.id    = obj.code || obj.id;
                                    obj.text  = obj.text || obj.name;
                                    return obj;
                                }),
                                pagination: {
                                    more : (response.links.next != null)
                                }
                            }
                        }
                    }
                }),
                selectVillage = $('#village-code').select2({
                    placeholder: "Pilih Kelurahan",
                    allowClear: true,
                    ajax: {
                        url: "{{ route('portal.api.indonesia.region.index', ['region'=>'village']) }}",
                        dataType: "json",
                        delay: 200,
                        cache: true,
                        data: function (params) {
                            return $.extend({}, params, {
                                filters : {
                                    district_code : selectDistrict.val()
                                }
                            });
                        },
                        processResults(response) {
                            return {
                                results: $.map(response.data, function (obj) {
                                    obj.id    = obj.code || obj.id;
                                    obj.text  = obj.text || obj.name;
                                    return obj;
                                }),
                                pagination: {
                                    more : (response.links.next != null)
                                }
                            }
                        }
                    }
                }),
                selectSkills = $('#skills').select2({
                    placeholder : "Keterampilan",
                    allowClear  : true,
                    tags        : true,
                });

                selectProvince.on({
                    change(event){
                        selectCity.val(null).trigger('change');
                    }
                });
                selectCity.on({
                    change(event){
                        selectDistrict.val(null).trigger('change');
                    }
                });
                selectDistrict.on({
                    change(event){
                        selectVillage.val(null).trigger('change');
                    }
                });
            });
        </script>
	</x-slot>
</x-web.layouts.master>