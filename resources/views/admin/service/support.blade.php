<x-admin>
    <div class="row mb-4 g-4 justify-content-center">

        <!-- CARD CS (LEBIH LEBAR) -->
        <div class="col-12 col-lg-8">
            <div class="card border-0 text-white h-100">
                <img src="{{ asset('assets/img/backgrounds/gerbang.jpg') }}" class="card-img" alt="Customer Service">

                <div class="card-img-overlay d-flex flex-column justify-content-end bg-dark bg-opacity-50 rounded">
                    <h2 class="card-title fw-bold mb-2 text-white">
                        <i class="ri ri-24-hours-line ms-1"></i>
                        Customer Service
                    </h2>

                    <a href="https://wa.me/6282112497009" target="_blank"
                        class="btn btn-lg btn-success align-self-start">
                        <i class="ri ri-whatsapp-line me-1"></i> Chat WhatsApp
                    </a>
                </div>
            </div>
        </div>

        <!-- CARD UPGRADE -->
        <div class="col-12 col-lg-4">
            <div class="card h-100 position-relative">
                <div class="card-body">

                    <span class="badge bg-success mb-5">
                        Pusat Bantuan
                    </span>

                    <h4 class="card-title mb-2 fw-bold mt-3">
                        Butuh Bantuan Cepat?
                    </h4>

                    <p class="text-muted small mb-5">
                        Tim Customer Service kami siap membantu jika Anda mengalami kendala,
                        error sistem, atau pertanyaan seputar layanan.
                    </p>

                    <ul class="list-unstyled small mb-5">
                        <li class="mb-2">
                            <i class="ri ri-check-line text-success me-1"></i>
                            Respon cepat via WhatsApp
                        </li>
                        <li class="mb-2">
                            <i class="ri ri-check-line text-success me-1"></i>
                            Bantuan teknis & non-teknis
                        </li>
                        <li>
                            <i class="ri ri-check-line text-success me-1"></i>
                            Aktif 24 Jam
                        </li>
                    </ul>
                </div>
            </div>
        </div>


    </div>
    <div class="card">
        <div class="d-flex align-items-end row">
            <div class="col-md-6 order-2 order-md-1">
                <div class="card-body">
                    <h3 class="card-title mb-4">&copy; <span class="fw-bold fst-italic">Gotofud</span>. All Rights
                        Reserved.</h3>
                    <a href="https://github.com/Gotofud" target="_blank" class="btn btn-md btn-dark align-self-start">
                        <i class="ri ri-github-line me-1"></i> Lihat Di Github
                    </a>
                    <a href="https://www.instagram.com/fazlirf_/" target="_blank"
                        class="btn btn-md align-self-start text-white"
                        style="background: linear-gradient(45deg, #f58529, #dd2a7b, #8134af, #515bd4); border: none;">
                        <i class="ri ri-instagram-line me-1"></i> Lihat Di Instagram
                    </a>
                </div>
            </div>
            <div class="col-md-6 text-center text-md-end order-1 order-md-2">
                <div class="card-body pb-0 px-0 pt-1_5">
                    <img src="../../assets/img/illustrations/pencil-rocket.png" height="186" class="scaleX-n1-rtl"
                        alt="View Profile" data-app-light-img="illustrations/pencil-rocket.png"
                        data-app-dark-img="illustrations/pencil-rocket.png" />
                </div>
            </div>
        </div>
    </div>
</x-admin>