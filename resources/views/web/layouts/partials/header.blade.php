<header id="topnav" class="defaultscroll sticky">
    <div class="container">
        
        @if(isset($pageHeading)  && $pageHeading !== false) 
        <a class="logo" href="/">
            <span class="logo-light-mode">
                <img src="https://siyandi.disnakertanggamus.com/siyandi-logo/dark-text.png" class="l-dark" height="40" alt="">
                <img src="https://siyandi.disnakertanggamus.com/siyandi-logo/text-white.png" class="l-light" height="40" alt="">
            </span>
            <img src="https://siyandi.disnakertanggamus.com/siyandi-logo/text-white.png" height="40" class="logo-dark-mode" alt="">
        </a>
        @else
        <a class="logo" href="/">
            <img src="https://siyandi.disnakertanggamus.com/siyandi-logo/dark-text.png" class="logo-light-mode" height="40" alt="">
            <img src="https://siyandi.disnakertanggamus.com/siyandi-logo/text-white.png" class="logo-dark-mode" height="40" alt="">
        </a>
        @endif

        <div class="menu-extras">
            <div class="menu-item">
                <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                    <div class="lines">
                        <span></span><span></span><span></span>
                    </div>
                </a>
            </div>
        </div>

        <ul class="buy-button list-inline mb-0">
            @auth('portal')
            <li class="list-inline-item mb-0 dropdown">
                <div class="dropdown dropdown-primary">
                    <button type="button" class="btn btn-soft-light dropdown-toggle p-0 rounded-circle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true" fdprocessedid="x8vleg">
                        <img src="{{ asset('storage/' . auth('portal')->user()->photo) }}" class="avatar avatar-ex-small rounded-circle" alt="">
                    </button>
                    <div class="dropdown-menu dd-menu dropdown-menu-end shadow border-0 mt-3 py-3" style="min-width: 200px; position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-0.5px, 39.5px, 0px);" data-popper-placement="bottom-end">
                        <a class="dropdown-item d-flex align-items-center text-dark pb-3" href="{{ route('portal.dashboard') }}">
                            <img src="{{ asset('storage/' . auth('portal')->user()->photo) }}" class="avatar avatar-md-sm rounded-circle border shadow" alt="">
                            <div class="flex-1 ms-2 lh-1">
                                <span class="d-block">{{ auth('portal')->user()->name }}</span>
                                <small class="text-muted">{{ auth('portal')->user()->username }}</small>
                            </div>
                        </a>
                        <a class="dropdown-item text-dark" href="{{ route('portal.dashboard') }}">
                            <span class="mb-0 d-inline-block me-1">
                                <i class="ti ti-home"></i>
                            </span>
                            Ubah Profil
                        </a>
                        <a class="dropdown-item text-dark" href="profile.html">
                            <span class="mb-0 d-inline-block me-1">
                                <i class="ti ti-settings"></i>
                            </span> 
                            Ubah Password
                        </a>
                        <div class="dropdown-divider border-top"></div>
                        <a class="dropdown-item text-dark" href="{{ route('portal.auth.login') }}" onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
                            <span class="mb-0 d-inline-block me-1">
                                <i class="ti ti-logout"></i>
                            </span>
                            Logout
                        </a>
                        <form id="formLogout" action="{{ route('portal.auth.logout') }}" method="POST">@csrf</form>
                    </div>
                </div>
            </li>
            @else
                @if (!request()->routeis('portal.auth.*'))
                    <li class="list-inline-item mb-0">
                        <a href="{{ route('portal.auth.login') }}" class="btn btn-primary me-2 me-lg-0">
                            Masuk <i data-feather="log-in" class="fea icon-sm"></i> 
                        </a>
                    </li>                    
                @endif
            @endauth
        </ul>

        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu @if(isset($pageHeading) && $pageHeading !== false) nav-light @endif">
            <li><a href="{{ route('home') }}" class="sub-menu-item active">Beranda</a></li>
            <li><a href="https://siyandi.disnakertanggamus.com/profil" class="sub-menu-item active">Tentang Kami</a></li>
            <li class="has-submenu parent-parent-menu-item">
            <a href="javascript:void(0)">Publikasi</a><span class="menu-arrow"></span>
            <ul class="submenu">
            <li><a href="https://siyandi.disnakertanggamus.com/publikasi/berita" class="sub-menu-item"> Berita</a></li>
            <li><a href="https://siyandi.disnakertanggamus.com/publikasi/kegiatan" class="sub-menu-item"> Kegiatan</a></li>
            </ul>
            </li>
            <li class="has-submenu parent-parent-menu-item">
            <a href="javascript:void(0)">Informasi</a><span class="menu-arrow"></span>
            <ul class="submenu">
            <li><a href="https://siyandi.disnakertanggamus.com/informasi/lowongan" class="sub-menu-item"> Lowongan Kerja</a></li>
            <li><a href="https://siyandi.disnakertanggamus.com/informasi/transmigrasi" class="sub-menu-item"> Transmigrasi</a></li>
            <li><a href="https://siyandi.disnakertanggamus.com/informasi/perusahaan" class="sub-menu-item"> Perusahaan</a></li>
            <li><a href="https://siyandi.disnakertanggamus.com/informasi/tki" class="sub-menu-item"> TKI</a></li>
            <li><a href="https://siyandi.disnakertanggamus.com/informasi/bpjs" class="sub-menu-item"> BPJS</a></li>
            </ul>
            </li>
            <li class="has-submenu parent-parent-menu-item">
            <a href="javascript:void(0)">Layanan</a><span class="menu-arrow"></span>
            <ul class="submenu">
            <li><a href="https://siyandi.disnakertanggamus.com/apps/yellow-cards" class="sub-menu-item"> Pendaftaran Kartu Kuning</a>
            </li>
            <li><a href="https://siyandi.disnakertanggamus.com/apps/transmigrants" class="sub-menu-item"> Pendaftaran Transmigrasi</a>
            </li>
            <li><a href="https://siyandi.disnakertanggamus.com/apps/cases" class="sub-menu-item"> Pengaduan Online</a></li>
            </ul>
            </li>
            <li><a href="https://siyandi.disnakertanggamus.com/kontak" class="sub-menu-item">Kontak</a></li>
            </ul><!--end navigation menu-->
        </div><!--end navigation-->
    </div><!--end container-->
</header>
@if (isset($pageHeading) && $pageHeading !== false)
<x-web.layouts.blocks.page-heading :title="($pageHeading->title ?? null)" />
@endif