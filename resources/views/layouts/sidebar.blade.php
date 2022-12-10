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
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
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
                        
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                        <i class="side-menu__icon fe fe-package"></i>
                        <span class="side-menu__label">Bootstrap</span>
                        <i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1">
                            <a href="javascript:void(0)">Bootstrap</a>
                        </li>
                        <li>
                            <a href="alerts.html" class="slide-item"> Alerts</a>
                        </li>
                        <li>
                            <a href="buttons.html" class="slide-item"> Buttons</a>
                        </li>
                        <li>
                            <a href="colors.html" class="slide-item"> Colors</a>
                        </li>
                        <li class="sub-slide">
                            <a class="sub-side-menu__item" data-bs-toggle="sub-slide" href="javascript:void(0)">
                                <span class="sub-side-menu__label">Avatars</span>
                                <i class="sub-angle fe fe-chevron-right"></i>
                            </a>
                            <ul class="sub-slide-menu">
                                <li>
                                    <a href="avatarsquare.html" class="sub-slide-item"> Avatar-Square</a>
                                </li>
                                <li>
                                    <a href="avatar-round.html" class="sub-slide-item"> Avatar-Rounded</a>
                                </li>
                                <li>
                                    <a href="avatar-radius.html" class="sub-slide-item"> Avatar-Radius</a>
                                </li>
                            </ul>
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