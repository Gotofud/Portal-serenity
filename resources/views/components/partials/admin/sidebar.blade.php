<aside id="layout-menu" class="layout-menu menu-vertical menu">
    <div class="app-brand mt-5 mb-4">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('assets/img/text-icon.svg') }}">
            </span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M8.47365 11.7183C8.11707 12.0749 8.11707 12.6531 8.47365 13.0097L12.071 16.607C12.4615 16.9975 12.4615 17.6305 12.071 18.021C11.6805 18.4115 11.0475 18.4115 10.657 18.021L5.83009 13.1941C5.37164 12.7356 5.37164 11.9924 5.83009 11.5339L10.657 6.707C11.0475 6.31653 11.6805 6.31653 12.071 6.707C12.4615 7.09747 12.4615 7.73053 12.071 8.121L8.47365 11.7183Z"
                    fill-opacity="0.9" />
                <path
                    d="M14.3584 11.8336C14.0654 12.1266 14.0654 12.6014 14.3584 12.8944L18.071 16.607C18.4615 16.9975 18.4615 17.6305 18.071 18.021C17.6805 18.4115 17.0475 18.4115 16.657 18.021L11.6819 13.0459C11.3053 12.6693 11.3053 12.0587 11.6819 11.6821L16.657 6.707C17.0475 6.31653 17.6805 6.31653 18.071 6.707C18.4615 7.09747 18.4615 7.73053 18.071 8.121L14.3584 11.8336Z"
                    fill-opacity="0.4" />
            </svg>
        </a>
    </div>


    <ul class="menu-inner py-1">
        <li class="menu-item {{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
            <a href="{{ url('dashboard') }}" class="menu-link">
                <i class="menu-icon icon-base ri ri-dashboard-horizontal-line"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>
        <li class="menu-item {{ request()->routeIs('service.report.*') ? 'active' : '' }}">
            <a href="{{ route('service.report.index') }}" class="menu-link">
                <i class="menu-icon icon-base ri ri-alert-line"></i>
                <div data-i18n="Laporan">Laporan</div>
            </a>
        </li>
        <li class="menu-header small mt-5">
            <span class="menu-header-text" data-i18n="Dashboard">Dashboard</span>
        </li>
        <!-- Master -->
        <li class="menu-item {{ request()->routeIs('dashboard.*.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ri ri-folder-4-line"></i>
                <div data-i18n="Master">Master</div>
                <div class="badge badge-center text-bg-danger rounded-pill ms-auto">5</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('dashboard.banner.*') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.banner.index') }}" class="menu-link">
                        <div data-i18n="Banner">Banner</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('dashboard.role.*') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.role.index') }}" class="menu-link">
                        <div data-i18n="Role">Role</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('dashboard.community-unit.*') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.community-unit.index') }}" class="menu-link">
                        <div data-i18n="Data RW">Data RW</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('dashboard.neighborhood-unit.*') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.neighborhood-unit.index') }}" class="menu-link">
                        <div data-i18n="Data RT">Data RT</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('dashboard.block.*') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.block.index') }}" class="menu-link">
                        <div data-i18n="Blok Rumah">Blok Rumah</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('dashboard.building-type.*') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.building-type.index') }}" class="menu-link">
                        <div data-i18n="Jenis Bangunan">Jenis Bangunan</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('dashboard.house.*') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.house.index') }}" class="menu-link">
                        <div data-i18n="Rumah Warga">Rumah Warga</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('dashboard.guest-type.*') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.guest-type.index') }}" class="menu-link">
                        <div data-i18n="Jenis Tamu">Jenis Tamu</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('dashboard.vehicle-type.*') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.vehicle-type.index') }}" class="menu-link">
                        <div data-i18n="Jenis Kendaraan">Jenis Kendaraan</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('dashboard.stall-place.*') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.stall-place.index') }}" class="menu-link">
                        <div data-i18n="Tempat Kios">Tempat Kios</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('dashboard.faq.*') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.faq.index') }}" class="menu-link">
                        <div data-i18n="Faq">Faq</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Warga -->
        <li class="menu-item {{ request()->routeIs('resident.*.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ri ri-user-community-line"></i>
                <div data-i18n="Warga">Warga</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('resident.user.*') ? 'active' : '' }}">
                    <a href="{{ route('resident.user.index') }}" class="menu-link">
                        <div data-i18n="Warga Komplek">Warga Komplek</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('resident.operator.*') ? 'active' : '' }}">
                    <a href="{{ route('resident.operator.index') }}" class="menu-link">
                        <div data-i18n="Staff Serenity">Staff Serenity</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('resident.guest.*') ? 'active' : '' }}">
                    <a href="{{ route('resident.guest.index') }}" class="menu-link">
                        <div data-i18n="Tamu">Tamu</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Layanan Warga -->
        <li class="menu-item {{ request()->routeIs('service.*.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ri ri-hand-heart-line"></i>
                <div data-i18n="Layanan Warga">Layanan Warga</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="../front-pages/landing-page.html" class="menu-link">
                        <div data-i18n="Pengumuman">Pengumuman</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('service.report.*') ? 'active' : '' }}">
                    <a href="{{ route('service.report.index') }}" class="menu-link">
                        <div data-i18n="Laporan Warga">Laporan Warga</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="../front-pages/payment-page.html" class="menu-link">
                        <div data-i18n="Periklanan">Periklanan</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="../front-pages/checkout-page.html" class="menu-link">
                        <div data-i18n="Kios">Kios</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('service.news.*') ? 'active' : '' }}">
                    <a href="{{ route('service.news.index') }}" class="menu-link">
                        <div data-i18n="Berita">Berita</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('service.contact.*') ? 'active' : '' }}">
                    <a href="{{route('service.contact.index')}}" class="menu-link">
                        <div data-i18n="Kontak">Kontak</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Keuangan -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon icon-base ri ri-bank-line"></i>
                <div data-i18n="Keuangan">Keuangan</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="../front-pages/landing-page.html" class="menu-link">
                        <div data-i18n="Iuran Wajib Daerah">Iuran Wajib Daerah</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="../front-pages/pricing-page.html" class="menu-link">
                        <div data-i18n="Perjanjian Rw">Perjanjian Rw</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Misc -->
        <li class="menu-header small mt-5">
            <span class="menu-header-text" data-i18n="Misc">Misc</span>
        </li>
        <li class="menu-item {{ request()->routeIs('service.support') ? 'active' : '' }}">
            <a href="{{ route('service.support') }}" class="menu-link">
                <i class="menu-icon icon-base ri ri-lifebuoy-line"></i>
                <div data-i18n="Support">Support</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="https://demos.pixinvent.com/materialize-html-admin-template/documentation/" class="menu-link">
                <i class="menu-icon icon-base ri ri-article-line"></i>
                <div data-i18n="Documentation">Documentation</div>
            </a>
        </li>
    </ul>
</aside>