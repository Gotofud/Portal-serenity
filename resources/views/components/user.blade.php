<!doctype html>

<html lang="en" class="layout-navbar-fixed layout-wide" dir="ltr" data-skin="default" data-bs-theme="light"
    data-assets-path="../../assets/" data-template="front-pages">

<x-partials.user.style />

<body>
    <script src="../../assets/vendor/js/dropdown-hover.js"></script>
    <script src="../../assets/vendor/js/mega-dropdown.js"></script>
    <!-- Navbar: Start -->
    <x-partials.user.navbar />
    <!-- Navbar: End -->

    <!-- Sections:Start -->

    <div data-bs-spy="scroll" class="scrollspy-example">
        {{ $slot }}
    </div>

    <!-- / Sections:End -->

    <!-- Footer: Start -->
    <x-partials.user.footer />
    <!-- Footer: End -->

    <!-- Core JS -->

    <!-- build:js assets/vendor/js/theme.js  -->

    <x-partials.user.script />
    @stack('scripts')
</body>

</html>