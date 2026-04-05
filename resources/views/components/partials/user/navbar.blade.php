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
                            <a href="{{ route('user-dashboard.index') }}" class="btn btn-primary px-2 px-sm-4 px-lg-2 px-xl-4"><span
                                    class="icon-base ri ri-user-line me-md-1"></span><span class="d-none d-md-block">Dashboard</span></a>
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