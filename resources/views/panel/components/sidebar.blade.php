<aside class="sidebar sidebar-default navs-rounded-all">
    <div class="sidebar-header d-flex align-items-center justify-content-start">
        <a href="{{route('panel.dashboard')}}" class="navbar-brand">
            <svg width="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor"/>
                <rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor"/>
                <rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor"/>
                <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor"/>
            </svg>
            <h4 class="logo-title">{{env('APP_NAME')}}</h4>
        </a>
        <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
            <i class="icon">
                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </i>
        </div>
    </div>
    <div class="sidebar-body pt-0 data-scrollbar">
        <div class="sidebar-list mb-5" id="sidebar">
            <ul class="navbar-nav iq-main-menu"  id="sidebar">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('panel.dashboard')}}">
                        <i class="icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.5 4C2.5 3.17157 3.17157 2.5 4 2.5H9C9.82845 2.5 10.5 3.17157 10.5 4V20C10.5 20.8285 9.82846 21.5 9 21.5H4C3.17157 21.5 2.5 20.8285 2.5 20V4Z" stroke="currentColor" />
                                <path d="M13.5 4C13.5 3.17157 14.1715 2.5 15 2.5H20C20.8285 2.5 21.5 3.17157 21.5 4V9C21.5 9.82846 20.8285 10.5 20 10.5H15C14.1715 10.5 13.5 9.82846 13.5 9V4Z" stroke="currentColor" />
                                <path d="M13.5 15C13.5 14.1715 14.1715 13.5 15 13.5H20C20.8285 13.5 21.5 14.1715 21.5 15V20C21.5 20.8285 20.8285 21.5 20 21.5H15C14.1715 21.5 13.5 20.8285 13.5 20V15Z" stroke="currentColor" />
                            </svg>
                        </i>
                        <span class="item-name">Dashboard</span>
                    </a>
                </li>
                <li><hr class="hr-horizontal"></li>
                <li class="nav-item static-item">
                    <a class="nav-link static-item disabled" href="#" tabindex="-1">
                        <span class="default-icon">Siyandi</span>
                        <span class="mini-icon">-</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('panel.citizens.index')}}">
                        <i class="icon">
                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4" d="M10.0833 15.958H3.50777C2.67555 15.958 2 16.6217 2 17.4393C2 18.2559 2.67555 18.9207 3.50777 18.9207H10.0833C10.9155 18.9207 11.5911 18.2559 11.5911 17.4393C11.5911 16.6217 10.9155 15.958 10.0833 15.958Z" fill="currentColor"></path>
                                <path opacity="0.4" d="M22.0001 6.37867C22.0001 5.56214 21.3246 4.89844 20.4934 4.89844H13.9179C13.0857 4.89844 12.4102 5.56214 12.4102 6.37867C12.4102 7.1963 13.0857 7.86 13.9179 7.86H20.4934C21.3246 7.86 22.0001 7.1963 22.0001 6.37867Z" fill="currentColor"></path>
                                <path d="M8.87774 6.37856C8.87774 8.24523 7.33886 9.75821 5.43887 9.75821C3.53999 9.75821 2 8.24523 2 6.37856C2 4.51298 3.53999 3 5.43887 3C7.33886 3 8.87774 4.51298 8.87774 6.37856Z" fill="currentColor"></path>
                                <path d="M21.9998 17.3992C21.9998 19.2648 20.4609 20.7777 18.5609 20.7777C16.6621 20.7777 15.1221 19.2648 15.1221 17.3992C15.1221 15.5325 16.6621 14.0195 18.5609 14.0195C20.4609 14.0195 21.9998 15.5325 21.9998 17.3992Z" fill="currentColor"></path>
                            </svg>
                        </i>
                        <span class="item-name">Masyarakat</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#indonesia" role="button" aria-expanded="false" aria-controls="indonesia">
                        <i class="icon">
                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4" d="M10.0833 15.958H3.50777C2.67555 15.958 2 16.6217 2 17.4393C2 18.2559 2.67555 18.9207 3.50777 18.9207H10.0833C10.9155 18.9207 11.5911 18.2559 11.5911 17.4393C11.5911 16.6217 10.9155 15.958 10.0833 15.958Z" fill="currentColor"></path>
                                <path opacity="0.4" d="M22.0001 6.37867C22.0001 5.56214 21.3246 4.89844 20.4934 4.89844H13.9179C13.0857 4.89844 12.4102 5.56214 12.4102 6.37867C12.4102 7.1963 13.0857 7.86 13.9179 7.86H20.4934C21.3246 7.86 22.0001 7.1963 22.0001 6.37867Z" fill="currentColor"></path>
                                <path d="M8.87774 6.37856C8.87774 8.24523 7.33886 9.75821 5.43887 9.75821C3.53999 9.75821 2 8.24523 2 6.37856C2 4.51298 3.53999 3 5.43887 3C7.33886 3 8.87774 4.51298 8.87774 6.37856Z" fill="currentColor"></path>
                                <path d="M21.9998 17.3992C21.9998 19.2648 20.4609 20.7777 18.5609 20.7777C16.6621 20.7777 15.1221 19.2648 15.1221 17.3992C15.1221 15.5325 16.6621 14.0195 18.5609 14.0195C20.4609 14.0195 21.9998 15.5325 21.9998 17.3992Z" fill="currentColor"></path>
                            </svg>
                        </i>
                        <span class="item-name">Master Data</span>
                        <i class="right-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="indonesia" data-bs-parent="#sidebar">
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('panel.provinces.index') }}">
                              <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                              <i class="sidenav-mini-icon"> H </i>
                              <span class="item-name">Provinsi</span>
                            </a>
                        </li>
                        <li class=" nav-item ">
                            <a class="nav-link" href="{{ route('panel.cities.index') }}">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> D </i>
                                <span class="item-name">Kota & Kabupaten</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('panel.districts.index') }}">
                              <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                              <i class="sidenav-mini-icon"> H </i>
                              <span class="item-name">Kecamatan</span>
                            </a>
                        </li>
                        <li class=" nav-item ">
                            <a class="nav-link" href="{{ route('panel.villages.index') }}">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> D </i>
                                <span class="item-name">Kelurahan & Desa</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#menu-siyandi-layanan" role="button" aria-expanded="false" aria-controls="indonesia">
                        <i class="icon">
                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4" d="M10.0833 15.958H3.50777C2.67555 15.958 2 16.6217 2 17.4393C2 18.2559 2.67555 18.9207 3.50777 18.9207H10.0833C10.9155 18.9207 11.5911 18.2559 11.5911 17.4393C11.5911 16.6217 10.9155 15.958 10.0833 15.958Z" fill="currentColor"></path>
                                <path opacity="0.4" d="M22.0001 6.37867C22.0001 5.56214 21.3246 4.89844 20.4934 4.89844H13.9179C13.0857 4.89844 12.4102 5.56214 12.4102 6.37867C12.4102 7.1963 13.0857 7.86 13.9179 7.86H20.4934C21.3246 7.86 22.0001 7.1963 22.0001 6.37867Z" fill="currentColor"></path>
                                <path d="M8.87774 6.37856C8.87774 8.24523 7.33886 9.75821 5.43887 9.75821C3.53999 9.75821 2 8.24523 2 6.37856C2 4.51298 3.53999 3 5.43887 3C7.33886 3 8.87774 4.51298 8.87774 6.37856Z" fill="currentColor"></path>
                                <path d="M21.9998 17.3992C21.9998 19.2648 20.4609 20.7777 18.5609 20.7777C16.6621 20.7777 15.1221 19.2648 15.1221 17.3992C15.1221 15.5325 16.6621 14.0195 18.5609 14.0195C20.4609 14.0195 21.9998 15.5325 21.9998 17.3992Z" fill="currentColor"></path>
                            </svg>
                        </i>
                        <span class="item-name">Layanan</span>
                        <i class="right-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="menu-siyandi-layanan" data-bs-parent="#sidebar">
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('panel.provinces.index') }}">
                              <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                              <i class="sidenav-mini-icon"> H </i>
                              <span class="item-name">Kartu Kuning</span>
                            </a>
                        </li>
                        <li class=" nav-item ">
                            <a class="nav-link" href="{{ route('panel.cities.index') }}">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> D </i>
                                <span class="item-name">Transmigrasi</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('panel.districts.index') }}">
                              <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                              <i class="sidenav-mini-icon"> H </i>
                              <span class="item-name">Pengaduan</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#menu-cms-informasi" role="button" aria-expanded="false" aria-controls="indonesia">
                        <i class="icon">
                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4" d="M10.0833 15.958H3.50777C2.67555 15.958 2 16.6217 2 17.4393C2 18.2559 2.67555 18.9207 3.50777 18.9207H10.0833C10.9155 18.9207 11.5911 18.2559 11.5911 17.4393C11.5911 16.6217 10.9155 15.958 10.0833 15.958Z" fill="currentColor"></path>
                                <path opacity="0.4" d="M22.0001 6.37867C22.0001 5.56214 21.3246 4.89844 20.4934 4.89844H13.9179C13.0857 4.89844 12.4102 5.56214 12.4102 6.37867C12.4102 7.1963 13.0857 7.86 13.9179 7.86H20.4934C21.3246 7.86 22.0001 7.1963 22.0001 6.37867Z" fill="currentColor"></path>
                                <path d="M8.87774 6.37856C8.87774 8.24523 7.33886 9.75821 5.43887 9.75821C3.53999 9.75821 2 8.24523 2 6.37856C2 4.51298 3.53999 3 5.43887 3C7.33886 3 8.87774 4.51298 8.87774 6.37856Z" fill="currentColor"></path>
                                <path d="M21.9998 17.3992C21.9998 19.2648 20.4609 20.7777 18.5609 20.7777C16.6621 20.7777 15.1221 19.2648 15.1221 17.3992C15.1221 15.5325 16.6621 14.0195 18.5609 14.0195C20.4609 14.0195 21.9998 15.5325 21.9998 17.3992Z" fill="currentColor"></path>
                            </svg>
                        </i>
                        <span class="item-name">Informasi</span>
                        <i class="right-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="menu-cms-informasi" data-bs-parent="#sidebar">
                        <li class=" nav-item ">
                            <a class="nav-link" href="{{ route('panel.job-vacancy-channels.index') }}">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> D </i>
                                <span class="item-name">Saluran Cari Kerja</span>
                            </a>
                        </li>
                        <li class=" nav-item ">
                            <a class="nav-link" href="{{ route('panel.post-types.posts.index', ['post_type'=>'lowongan-kerja']) }}">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> D </i>
                                <span class="item-name">Lowongan Kerja</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li><hr class="hr-horizontal"></li>
                <li class="nav-item static-item">
                    <a class="nav-link static-item disabled" href="#" tabindex="-1">
                        <span class="default-icon">CMS</span>
                        <span class="mini-icon">-</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#menu-cms-tentang" role="button" aria-expanded="false" aria-controls="indonesia">
                        <i class="icon">
                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4" d="M10.0833 15.958H3.50777C2.67555 15.958 2 16.6217 2 17.4393C2 18.2559 2.67555 18.9207 3.50777 18.9207H10.0833C10.9155 18.9207 11.5911 18.2559 11.5911 17.4393C11.5911 16.6217 10.9155 15.958 10.0833 15.958Z" fill="currentColor"></path>
                                <path opacity="0.4" d="M22.0001 6.37867C22.0001 5.56214 21.3246 4.89844 20.4934 4.89844H13.9179C13.0857 4.89844 12.4102 5.56214 12.4102 6.37867C12.4102 7.1963 13.0857 7.86 13.9179 7.86H20.4934C21.3246 7.86 22.0001 7.1963 22.0001 6.37867Z" fill="currentColor"></path>
                                <path d="M8.87774 6.37856C8.87774 8.24523 7.33886 9.75821 5.43887 9.75821C3.53999 9.75821 2 8.24523 2 6.37856C2 4.51298 3.53999 3 5.43887 3C7.33886 3 8.87774 4.51298 8.87774 6.37856Z" fill="currentColor"></path>
                                <path d="M21.9998 17.3992C21.9998 19.2648 20.4609 20.7777 18.5609 20.7777C16.6621 20.7777 15.1221 19.2648 15.1221 17.3992C15.1221 15.5325 16.6621 14.0195 18.5609 14.0195C20.4609 14.0195 21.9998 15.5325 21.9998 17.3992Z" fill="currentColor"></path>
                            </svg>
                        </i>
                        <span class="item-name">Profil</span>
                        <i class="right-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="menu-cms-tentang" data-bs-parent="#sidebar">
                        <li class=" nav-item ">
                            <a class="nav-link" href="{{ route('panel.post-types.posts.index', ['post_type'=>'tentang-kami']) }}">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> D </i>
                                <span class="item-name">Tentang Kami</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('panel.officers.index') }}">
                              <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g><circle cx="12" cy="12" r="8" fill="currentColor"></circle></g>
                                    </svg>
                                </i>
                              <i class="sidenav-mini-icon"> P </i>
                              <span class="item-name">Pejabat & Staf</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#menu-cms-publikasi" role="button" aria-expanded="false" aria-controls="indonesia">
                        <i class="icon">
                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4" d="M10.0833 15.958H3.50777C2.67555 15.958 2 16.6217 2 17.4393C2 18.2559 2.67555 18.9207 3.50777 18.9207H10.0833C10.9155 18.9207 11.5911 18.2559 11.5911 17.4393C11.5911 16.6217 10.9155 15.958 10.0833 15.958Z" fill="currentColor"></path>
                                <path opacity="0.4" d="M22.0001 6.37867C22.0001 5.56214 21.3246 4.89844 20.4934 4.89844H13.9179C13.0857 4.89844 12.4102 5.56214 12.4102 6.37867C12.4102 7.1963 13.0857 7.86 13.9179 7.86H20.4934C21.3246 7.86 22.0001 7.1963 22.0001 6.37867Z" fill="currentColor"></path>
                                <path d="M8.87774 6.37856C8.87774 8.24523 7.33886 9.75821 5.43887 9.75821C3.53999 9.75821 2 8.24523 2 6.37856C2 4.51298 3.53999 3 5.43887 3C7.33886 3 8.87774 4.51298 8.87774 6.37856Z" fill="currentColor"></path>
                                <path d="M21.9998 17.3992C21.9998 19.2648 20.4609 20.7777 18.5609 20.7777C16.6621 20.7777 15.1221 19.2648 15.1221 17.3992C15.1221 15.5325 16.6621 14.0195 18.5609 14.0195C20.4609 14.0195 21.9998 15.5325 21.9998 17.3992Z" fill="currentColor"></path>
                            </svg>
                        </i>
                        <span class="item-name">Publikasi</span>
                        <i class="right-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="menu-cms-publikasi" data-bs-parent="#sidebar">
                        <li class=" nav-item ">
                            <a class="nav-link" href="{{ route('panel.post-types.posts.index', ['post_type'=>'berita']) }}">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                                <i class="sidenav-mini-icon"> D </i>
                                <span class="item-name">Berita</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('panel.post-types.posts.index', ['post_type'=>'kegiatan']) }}">
                              <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24" fill="currentColor">
                                        <g>
                                        <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                </i>
                              <i class="sidenav-mini-icon"> H </i>
                              <span class="item-name">Kegiatan</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>                    
        </div>
    </div>
    <div class="sidebar-footer"></div>
</aside>