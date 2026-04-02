<!-- Layanan Komplek Bojong Malaka Indah -->
<!-- Fazli Rausyan Fikri XII RPL 1 -->
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

<x-partials.style/>

<body>


    <!-- Preloader -->

   
    <!-- ------------------------------------- -->
    <!-- Header Start -->
    <!-- ------------------------------------- -->
    <x-partials.user.navbar/>
    <!-- ------------------------------------- -->
    <!-- Header End -->
    <!-- ------------------------------------- -->

    <!-- ------------------------------------- -->
    <!-- Responsive Sidebar Start -->
    <!-- ------------------------------------- -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <a href="../main/frontend-landingpage.html">
                <img src="../assets/images/logos/dark-logo.svg" alt="Logo-light" />
            </a>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="list-unstyled ps-0">
                <li class="mb-1">
                    <a href="../main/frontend-aboutpage.html"
                        class="px-0 fs-4 d-block text-dark link-primary w-100 py-2">
                        About Us
                    </a>
                </li>

                <li class="mb-1">
                    <a href="../main/frontend-blogpage.html"
                        class="px-0 fs-4 d-block w-100 py-2 text-dark link-primary">
                        Blog
                    </a>
                </li>

                <li class="mb-1">
                    <a href="../main/frontend-portfoliopage.html"
                        class="px-0 fs-4 d-flex align-items-center justify-content-start gap-2 w-100 py-2 text-dark link-primary">
                        Portfolio
                        <span class="badge text-primary bg-primary-subtle fs-2 fw-bolder hstack">New</span>
                    </a>
                </li>

                <li class="mb-1">
                    <a href="../main/index.html" class="px-0 fs-4 d-block w-100 py-2 text-dark link-primary">
                        Dashboard
                    </a>
                </li>

                <li class="mb-1">
                    <a href="../main/frontend-pricingpage.html"
                        class="px-0 fs-4 d-block w-100 py-2 text-dark link-primary">
                        Pricing
                    </a>
                </li>

                <li class="mb-1">
                    <a href="../main/frontend-contactpage.html"
                        class="px-0 fs-4 d-block w-100 py-2 text-dark link-primary">
                        Contact
                    </a>
                </li>
                <li class="mt-3">
                    <a href="../main/authentication-login.html" class="btn btn-primary w-100">Log In</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- ------------------------------------- -->
    <!-- Responsive Sidebar End -->
    <!-- ------------------------------------- -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pt-0">
                    <iframe width="100%" height="500"
                        src="https://www.youtube.com/embed/W_ADbeKyP4c?si=-63qC3_L1fI5wEsO" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

    <div class="main-wrapper overflow-hidden">
        {{ $slot }}
    </div>

    <!-- ------------------------------------- -->
    <!-- Footer Start -->
    <!-- ------------------------------------- -->
     <x-partials.user.footer/>
    <!-- ------------------------------------- -->
    <!-- Footer End -->
    <!-- ------------------------------------- -->

    <!-- Scroll Top -->
    <a href="javascript:void(0)"
        class="top-btn btn btn-primary d-flex align-items-center justify-content-center round-54 p-0 rounded-circle">
        <i class="ti ti-arrow-up fs-7"></i>
    </a>

    <x-partials.script/>
</body>

</html>