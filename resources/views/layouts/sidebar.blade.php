<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="index.html">
                <img src="{{ asset('assets/images/brand/logo.png') }}" class="header-brand-img desktop-logo" alt="logo">
                <img src="{{ asset('assets/images/brand/logo-1.png') }}" class="header-brand-img toggle-logo"alt="logo">
                <img src="{{ asset('assets/images/brand/logo-2.png') }}" class="header-brand-img light-logo" alt="logo">
                <img src="{{ asset('assets/images/brand/logo-3.png') }}" class="header-brand-img light-logo1" alt="logo">
            </a>
            <!-- LOGO -->
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg>
            </div>
            <ul class="side-menu">
                <li class="sub-category">
                    <h3>Main</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item @if (Request::segment(1) == 'dashboard' || Request::segment(1) == '' ) active @endif" data-bs-toggle="slide" href="{{ route('dashboard') }}">
                        <i class="side-menu__icon fe fe-home"></i>
                        <span class="side-menu__label">Dashboard</span>
                    </a>
                </li>
                <li class="sub-category">
                    <h3>Management User</h3>
                </li>
                <li class="slide @if (Request::segment(1) == 'users' || Request::segment(1) == 'roles' || Request::segment(1) == 'permissions') is-expanded @endif">
                    <a class="side-menu__item @if (Request::segment(1) == 'users' || Request::segment(1) == 'roles' || Request::segment(1) == 'permissions') active is-expanded @endif" data-bs-toggle="slide" href="javascript:void(0)">
                        <i class="side-menu__icon fe fe-slack"></i>
                        <span class="side-menu__label">Management User</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1">
                            <a href="javascript:void(0)">Management User</a>
                        </li>
                        <li>
                            <a href="{{ route('users.index') }}" class="slide-item @if (Request::segment(1) == 'users') active @endif"> User</a>
                        </li>
                        <li>
                            <a href="{{ route('roles.index') }}" class="slide-item @if (Request::segment(1) == 'roles') active @endif"> Role</a>
                        </li>
                        <li>
                            <a href="{{ route('permissions.index') }}" class="slide-item @if (Request::segment(1) == 'permissions') active @endif"> Permission</a>
                        </li>
                    </ul>
                </li>
                <li class="sub-category">
                    <h3>UI Kit</h3>
                </li>
                <li class="slide @if (Request::segment(1) == 'murid' || Request::segment(1) == 'guru' || Request::segment(1) == 'pelajaran' || Request::segment(1) == 'semester'|| Request::segment(1) == 'kelas'|| Request::segment(1) == 'kategori') is-expanded @endif">
                    <a class="side-menu__item @if (Request::segment(1) == 'murid' || Request::segment(1) == 'guru' || Request::segment(1) == 'pelajaran' || Request::segment(1) == 'semester'|| Request::segment(1) == 'kelas'|| Request::segment(1) == 'kategori') active @endif" data-bs-toggle="slide" href="javascript:void(0)">
                        <i class="side-menu__icon fe fe-slack"></i>
                        <span class="side-menu__label">Menu Master</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li>
                            <a href="{{ route('murid.index') }}" class="slide-item @if (Request::segment(1) == 'murid') active @endif"> Murid</a>
                        </li>
                        <li>
                            <a href="{{ route('guru.index') }}" class="slide-item @if (Request::segment(1) == 'guru') active @endif"> Guru</a>
                        </li>
                        <li>
                            <a href="{{ route('pelajaran.index') }}" class="slide-item @if (Request::segment(1) == 'pelajaran') active @endif"> Pelajaran</a>
                        </li>
                        <li>
                            <a href="{{ route('semester.index') }}" class="slide-item @if (Request::segment(1) == 'semester') active @endif"> Semester</a>

                        </li>
                        <li>
                            <a href="{{ route('kelas.index') }}" class="slide-item @if (Request::segment(1) == 'kelas') active @endif"> Kelas</a>

                        </li>
                        <li>
                            <a href="{{ route('kategori.index') }}" class="slide-item @if (Request::segment(1) == 'kategori') active @endif"> Kategori</a>

                        </li>
                    </ul>
                </li>
                <li class="slide @if (Request::segment(1) == 'walikelas' || Request::segment(1) == 'kelasmurid' || Request::segment(1) == 'gurupelajaran' || Request::segment(1) == 'kelaspelajaran') is-expanded @endif">
                    <a class="side-menu__item @if (Request::segment(1) == 'walikelas' || Request::segment(1) == 'kelasmurid' || Request::segment(1) == 'gurupelajaran' || Request::segment(1) == 'kelaspelajaran') active @endif" data-bs-toggle="slide" href="javascript:void(0)">
                        <i class="side-menu__icon fe fe-package"></i>
                        <span class="side-menu__label">Mapping Data</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li>
                            <a href="{{ route('walikelas.index') }}" class="slide-item @if (Request::segment(1) == 'walikelas') active @endif"> Wali Kelas</a>
                        </li>
                        <li>
                            <a href="{{ route('kelasmurid.index') }}" class="slide-item @if (Request::segment(1) == 'kelasmurid') active @endif"> Kelas Murid</a>
                        </li>
                        <li>
                            <a href="{{ route('gurupelajaran.index') }}" class="slide-item @if (Request::segment(1) == 'gurupelajaran') active @endif"> Guru Pelajaran</a>
                        </li>
                        <li>
                            <a href="{{ route('kelaspelajaran.index') }}" class="slide-item @if (Request::segment(1) == 'kelaspelajaran') active @endif"> Kelas Pelajaran</a>
                        </li>
                        
                    </ul>
                </li>
                <li class="slide @if (Request::segment(1) == 'raport' || Request::segment(1) == 'absen' || Request::segment(1) == 'sikap'||Request::segment(1) == 'ekstrakulikuler') is-expanded @endif">
                    <a class="side-menu__item @if (Request::segment(1) == 'raport' || Request::segment(1) == 'absen'||Request::segment(1) == 'sikap'||Request::segment(1) == 'ekstrakulikuler') active @endif" data-bs-toggle="slide" href="javascript:void(0)">
                        <i class="side-menu__icon fe fe-slack"></i>
                        <span class="side-menu__label">Raport</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li>
                            <a href="{{ route('raport.index') }}" class="slide-item @if (Request::segment(1) == 'raport') active @endif"> Raport</a>
                        </li>
                        <li>
                            <a href="{{ route('absen.index') }}" class="slide-item @if (Request::segment(1) == 'absen') active @endif"> Absen</a>
                        </li>
                        <li>
                            <a href="{{ route('sikap.index') }}" class="slide-item @if (Request::segment(1) == 'sikap') active @endif"> Penilaian Sikap dan Catatan</a>
                        </li>
                        <li>
                            <a href="{{ route('ekstrakulikuler.index') }}" class="slide-item @if (Request::segment(1) == 'ekstrakulikuler') active @endif"> Penilaian Ekstrakulikuler</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="slide-right" id="slide-right">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg>
            </div>
        </div>
    </div>
</div>