<?php
use Illuminate\Support\Facades\Auth;
?>
<nav class="layout-navbar shadow-none py-0">
    <div class="container">
        <div class="navbar navbar-expand-lg landing-navbar px-3 px-md-8">
            <!-- Menu logo wrapper: Start -->
            <div class="navbar-brand app-brand demo d-flex py-0 me-4 me-xl-8">
                <!-- Mobile menu toggle: Start-->
                <button class="navbar-toggler border-0 px-0 me-4" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="icon-base ri ri-menu-fill icon-lg align-middle text-heading fw-medium"></i>
                </button>
                <!-- Mobile menu toggle: End-->
                <span class="app-brand-logo demo">
                    <img src="{{ asset('assets/img/text-icon.svg') }}">
                </span>
            </div>
            <!-- Menu logo wrapper: End -->
            <!-- Menu wrapper: Start -->
            <div class="collapse navbar-collapse landing-nav-menu" id="navbarSupportedContent">
                <button class="navbar-toggler border-0 text-heading position-absolute end-0 top-0 p-2" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="icon-base ri ri-close-fill"></i>
                </button>
                @if (request()->is('/'))
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link fw-medium" aria-current="page"
                                href="landing-page.html#landingHero">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-medium" href="landing-page.html#landingFeatures">Fitur Fitur</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-medium" href="landing-page.html#landingTeam">Berita</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-medium" href="landing-page.html#landingFAQ">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-medium" href="landing-page.html#landingContact">Kontak kami</a>
                        </li>
                    </ul>
                @endif

            </div>
            <div class="landing-menu-overlay d-lg-none"></div>
            <!-- Menu wrapper: End -->
            <!-- Toolbar: Start -->
            <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- navbar button: Start -->
                <li>
                    @auth
                        @if (Auth::user()->roles == in_array(Auth::user()->roles->name, ['Super Admin', 'Admin']))
                            <a href="{{ route('dashboard.index') }}" class="btn btn-primary px-2 px-sm-4 px-lg-2 px-xl-4"><span
                                    class="icon-base ri ri-user-line me-md-1"></span><span class="d-none d-md-block">Masuk
                                    Dashboard</span></a>
                        @else
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    @if (Auth::user()->avatar)
                                        <div class="avatar avatar-online">
                                            <img src="{{Auth::user()->avatar}}" alt="avatar" class="rounded-circle"
                                                referrerpolicy="no-referrer" />
                                        </div>
                                    @else
                                        <div class="avatar avatar-online bg-light d-flex align-items-center justify-content-center"
                                            style="border-radius:50%;">

                                            <span class="fs-5 fw-bold text-white">
                                                {{ substr(Auth::user()->name ?? '-', 0, 2) }}
                                            </span>

                                        </div>
                                    @endif
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end mt-3 py-2">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('profile') }}">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-2">
                                                    @if (Auth::user()->avatar)
                                                        <div class="avatar avatar-online">
                                                            <img src="{{Auth::user()->avatar}}" alt="avatar" class="rounded-circle" />
                                                        </div>
                                                    @else
                                                        <div class="avatar avatar-online bg-light d-flex align-items-center justify-content-center"
                                                            style="border-radius:50%;">

                                                            <span class="fs-5 fw-bold text-white">
                                                                {{ substr(Auth::user()->name ?? '-', 0, 2) }}
                                                            </span>

                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0 small">
                                                        {{ Auth::user()->user_profile->full_name ?? Auth::user()->name }}
                                                    </h6>
                                                    <small class="text-body-secondary">{{ Auth::user()->roles->name }}</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('profile') }}">
                                            <i class="icon-base ri ri-user-3-line icon-22px me-3"></i><span
                                                class="align-middle">Profil Saya</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('user-dashboard.index') }}">
                                            <i class="icon-base ri ri-dashboard-line icon-22px me-3"></i><span
                                                class="align-middle">Dashboard</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="pages-account-settings-account.html">
                                            <i class="icon-base ri ri-settings-4-line icon-22px me-3"></i><span
                                                class="align-middle">Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="d-grid px-4 pt-2 pb-1">
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                            <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                                class="btn btn-sm btn-danger d-flex" href="{{route('logout')}}" target="_blank">
                                                <small class="align-middle">Logout</small>
                                                <i class="icon-base ri ri-logout-box-r-line ms-2 icon-16px"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    @else
                    <a href="{{ route('login') }}" class="btn btn-primary px-2 px-sm-4 px-lg-2 px-xl-4"><span
                            class="icon-base ri ri-user-line me-md-1"></span><span class="d-none d-md-block">Masuk
                            Warga</span></a>
                @endauth
                </li>
                <!-- navbar button: End -->
            </ul>
            <!-- Toolbar: End -->
        </div>
    </div>
</nav>