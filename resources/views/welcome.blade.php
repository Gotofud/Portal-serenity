<x-user>
    <link rel="stylesheet" href="{{ asset(' ') }}" />
    <style>
        .meta-row {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 16px;
            font-family: 'DM Sans', sans-serif;
            font-size: 13px;
        }
    </style>
    <!-- Hero: Start -->
    <section id="landingHero" class="section-py landing-hero position-relative ">
        <img src="../../assets/img/front-pages/backgrounds/bg-color.png" alt="hero background"
            class="position-absolute top-0 start-0 w-100 h-200 z-n1" />
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center text-white py-5 mt-5">
                    <h1 class="display-1 mb-4 text-white" style="font-size:100px; font-weight: 100;">
                        Satu <span style="font-weight:bold; font-style:italic;">Akses</span> untuk <br
                            class="d-none d-md-block"><span style="font-weight: bold;">Kenyamanan</span>
                    </h1>
                    <p class="lead mb-5 opacity-75"><b>Serenity,</b> Portal Komplek Bojong Malaka Indah <br> untuk
                        mempermudah
                        segala aktivitas Anda.
                    </p>

                    <a href="{{ route('login') }}" class="btn btn-md btn-warning btn-lg px-5 py-3 fw-semibold">
                        Mulai Sekarang <i class="ri ri-arrow-right-up-line ms-3"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero: End -->
    <!-- Fun facts: Start -->
    <section id="landingFunFacts" class="section-py landing-fun-facts py-12 my-4"
        style="background: linear-gradient(to bottom, #f7f7f9 0%, #ffffff 100%);">
        <div class="container">
            <div class="row gx-0 gy-5 gx-sm-6">
                <div class="col-md-3 col-sm-6 text-center">
                    <span class="badge rounded-pill bg-label-primary bg-label-hover fun-facts-icon mb-6 p-5"><i
                            class="icon-base ri ri-home-4-line icon-42px"></i></span>
                    <h2 class="fw-bold mb-0 fun-facts-text">{{ $house }}+</h2>
                    <h6 class="mb-0 text-body">Rumah Terdaftar</h6>
                </div>
                <div class="col-md-3 col-sm-6 text-center">
                    <span class="badge rounded-pill bg-label-warning bg-label-hover fun-facts-icon mb-6 p-5"><i
                            class="icon-base ri ri-user-smile-line icon-42px"></i></span>
                    <h2 class="fw-bold mb-0 fun-facts-text">{{ $user }}+</h2>
                    <h6 class="mb-0 text-body">Pengguna Bahagia</h6>
                </div>
                <div class="col-md-3 col-sm-6 text-center">
                    <span class="badge rounded-pill bg-label-success bg-label-hover fun-facts-icon mb-6 p-5"><i
                            class="icon-base ri ri-user-community-line icon-42px"></i></span>
                    <h2 class="fw-bold mb-0 fun-facts-text">{{ $rt }}+</h2>
                    <h6 class="mb-0 text-body">Rukun Tetangga</h6>
                </div>
                <div class="col-md-3 col-sm-6 text-center">
                    <span class="badge rounded-pill bg-label-info bg-label-hover fun-facts-icon mb-6 p-5"><i
                            class="icon-base ri ri-community-line icon-42px"></i></span>
                    <h2 class="fw-bold mb-0 fun-facts-text">{{ $rw }}+</h2>
                    <h6 class="mb-0 text-body">Rukun Warga</h6>
                </div>
            </div>
        </div>
    </section>
    <!-- Fun facts: End -->

    <!-- Fitur-Fitur : Start -->
    <section id="landingFeatures" class="section-py">
        <div class="container">
            <h6 class="text-center d-flex justify-content-center align-items-center mb-6">
                <img src="../../assets/img/front-pages/icons/section-title-icon.png" alt="section title icon"
                    class="me-3" height="19" />
                <span class="text-uppercase">Fitur Fitur</span>
            </h6>
            <h5 class="text-center mb-2">
                Semua yang kamu butuhin ada disini!
            </h5>
            <p class="text-center fw-medium mb-4 mb-md-12">
                Bukan sekadar kumpulan <i>tools</i>, tapi solusi siap pakai yang bisa langsung digunakan.
            </p>
            <div class="features-icon-wrapper row gx-0 gy-12 gx-sm-6">
                <div class="col-lg-4 col-sm-6 text-center features-icon-box">
                    <div class="features-icon mb-4">
                        <img src="../../assets/img/front-pages/icons/pemberitahuan.svg" alt="laptop charging" width="90"
                            height="60" />
                    </div>
                    <h5 class="mb-2">Pemberitahuan</h5>
                    <p class="features-icon-description">
                        Semua informasi dan pemberitahuan <br> komplek ada di sini!
                    </p>
                </div>
                <div class="col-lg-4 col-sm-6 text-center features-icon-box">
                    <div class="features-icon mb-4">
                        <img src="../../assets/img/front-pages/icons/laporan.svg" alt="transition up" width="60"
                            height="60" />
                    </div>
                    <h5 class="mb-2">Laporin</h5>
                    <p class="features-icon-description">
                        Buat laporan sekarang, kami siap <br> menanganinya dengan cepat!
                    </p>
                </div>
                <div class="col-lg-4 col-sm-6 text-center features-icon-box">
                    <div class="features-icon mb-4">
                        <img src="../../assets/img/front-pages/icons/berita.svg" alt="edit" width="60" height="60" />
                    </div>
                    <h5 class="mb-2">Berita</h5>
                    <p class="features-icon-description">
                        Update berita terbaru dari komplek <br> ada di sini!
                    </p>
                </div>
                <div class="col-lg-4 col-sm-6 text-center features-icon-box">
                    <div class="features-icon mb-4">
                        <img src="../../assets/img/front-pages/icons/iwd.svg" alt="3d select solid" width="60"
                            height="60" />
                    </div>
                    <h5 class="mb-2">Bayar IWD</h5>
                    <p class="features-icon-description">
                        Udah nggak ribet lagi—bayar dan data <br> semua serba otomatis!
                    </p>
                </div>
                <div class="col-lg-4 col-sm-6 text-center features-icon-box">
                    <div class="features-icon mb-4">
                        <img src="../../assets/img/front-pages/icons/kios.svg" alt="lifebelt" width="60" height="60" />
                    </div>
                    <h5 class="mb-2">Sewa Kios</h5>
                    <p class="features-icon-description">Sewa kios jadi lebih mudah, cepat, <br> dan tanpa ribet!</p>
                </div>
                <div class="col-lg-4 col-sm-6 text-center features-icon-box">
                    <div class="features-icon mb-4">
                        <img src="../../assets/img/front-pages/icons/tamu.svg" alt="google docs" width="60"
                            height="60" />
                    </div>
                    <h5 class="mb-2">Tamu</h5>
                    <p class="features-icon-description">Catat dan laporkan tamu yang datang <br> ke rumahmu dengan
                        mudah.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Fitur-Fitur : End -->

    <!-- Real customers reviews: Start -->
    <section id="landingReviews" class="section-py bg-body landing-reviews">
        <div class="container py-4">
            <div class="row g-4 px-2">
                <a href="{{ route('services.news.show', $mainNews->id) }}">
                    <div class="col-lg-12">
                        <div class="card border-0 text-white overflow-hidden shadow-sm"
                            style="height: 30rem; position: relative;">

                            <img src="{{ Storage::url($mainNews->image) }}" class="card-img" alt="News Image"
                                style="height: 100%; object-fit: contain; background-color: #1a1a1a;">

                            <div class="card-img-overlay d-flex align-items-end p-0">
                                <div class="bg-white p-4 m-3 shadow-sm"
                                    style="width: fit-content; max-width: 600px; min-width: 300px;">

                                    <div class="mb-2">
                                        <span class="badge bg-black text-white rounded-1 small px-2 py-1">
                                            {{ $mainNews->news_types }}
                                        </span>
                                        <span class="text-dark text-muted small ms-2">
                                            {{ $mainNews->created_at ? $mainNews->created_at->format('F d, Y') : '' }}
                                        </span>
                                    </div>

                                    <h2 class="fw-bold text-dark mb-2" style="line-height: 1.2; font-size: 1.5rem;">
                                        {{ $mainNews->title }}
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>


            <div class="row mt-5 px-2">
                 <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-bold mb-0">Berita Lainnya</h3>
                    <a href="{{ route('services.news.index') }}" class="text-danger fw-bold text-decoration-none small">
                        Lihat Semua <i class="ri-arrow-right-line ms-1"></i>
                    </a>
                </div>
                @foreach ($otherNews as $otherNewsData)

                            <div class="col-sm-6 col-md-3 mt-5">
                                <a href="{{ route('services.news.show', $otherNewsData->id) }}">
                                    <div class="cardh-100">
                                        <img src="{{ Storage::url($otherNewsData->image) }}" class="card-img-top rounded-4 mb-3"
                                            alt="Article 1" style="height: 180px; object-fit: cover;">
                                        <div class="card-body p-0">
                                            <div class="d-flex align-items-center small mt-auto mb-2" style="font-size:12.5px">
                                                <span class="text-primary fw-bold me-2">{{ $otherNewsData->news_types }}</span>
                                                @php
                                                    $date = $otherNewsData->created_at;
                                                @endphp

                                                <span class="text-muted text-dark border-start ps-2">
                                                    {{ $date
                    ? ($date->diffInDays(now()) <= 2
                        ? $date->diffForHumans()
                        : $date->format('d M Y'))
                    : '-' }}
                                                </span>
                                            </div>
                                            <h5 class="fw-bold lh-base mb-3" style=" display: -webkit-box;
                                                                -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden;
                                                                text-overflow: ellipsis;">{{ $otherNewsData->title }}</h5>
                                            <p class="text-muted text-dark opacity-75 small mb-0"
                                                style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                                {{ strip_tags($otherNewsData->description) }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                @endforeach
            </div>
        </div>
    </section>
    <!-- Real customers reviews: End -->

    <!-- FAQ: Start -->
    <section id="landingFAQ" class="section-py bg-body landing-faq" style="margin-top: -100px;">
        <div class="container bg-icon-right">
            <div class="content-wrapper">
                <!-- Content -->
                <div class="faq-header d-flex flex-column justify-content-center align-items-center h-px-300 position-relative overflow-hidden rounded-4"
                    style="background: url(../../assets/img/front-pages/backgrounds/bg-color.png); background-size: cover;">
                    <h2 class="text-center text-white mb-2"><b>Pertanyaan</b> Umum</h2>
                    <p class="text-muted text-white text-center mb-0 px-4">Punya pertanyaan? Cek kumpulan FAQ kami untuk
                        menemukan
                        jawabannya.
                    </p>
                </div>

                <div class="row mt-6">
                    <div class="col-lg-3 col-md-4 col-12 mb-md-0 mb-4">
                        <div class="d-flex justify-content-between flex-column nav-align-left mb-2 mb-md-0">
                            <ul class="nav nav-pills flex-column flex-nowrap">
                                @foreach($faq as $category_name => $questions)
                                    <li class="nav-item">
                                        <button class="nav-link {{ $loop->first ? 'active' : '' }}" data-bs-toggle="tab"
                                            data-bs-target="#faq-{{ Str::slug($category_name) }}">
                                            {{-- Icon bisa kamu sesuaikan manual berdasarkan nama kategori jika perlu --}}
                                            <i class="icon-base ri ri-add-fill icon-sm me-2"></i>
                                            <span class="align-middle">{{ $category_name }}</span>
                                        </button>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-9 col-md-8 col-12">
                        <div class="tab-content p-0">
                            @foreach($faq as $category_name => $questions)
                                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                    id="faq-{{ Str::slug($category_name) }}" role="tabpanel">

                                    <div class="d-flex mb-4 gap-4 align-items-center">
                                        <div class="avatar avatar-md">
                                            <div class="avatar-initial bg-label-primary rounded-4">
                                                <i class="icon-base ri ri-questionnaire-fill icon-30px"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <h5 class="mb-0">{{ $category_name }}</h5>
                                            <span>Daftar pertanyaan seputar {{ $category_name }}</span>
                                        </div>
                                    </div>

                                    <div id="accordion-{{ Str::slug($category_name) }}" class="accordion">
                                        @foreach($questions as $item)
                                            <div class="accordion-item {{ $loop->first ? 'active' : '' }}">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}"
                                                        type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#item-{{ $item->id }}"
                                                        aria-expanded="{{ $loop->first ? 'true' : 'false' }}">
                                                        {{ $item->subject }} {{-- Menggunakan kolom subject dari db kamu --}}
                                                    </button>
                                                </h2>

                                                <div id="item-{{ $item->id }}"
                                                    class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                                    data-bs-parent="#accordion-{{ Str::slug($category_name) }}">
                                                    <div class="accordion-body">
                                                        {!! $item->answer !!} {{-- Menggunakan kolom answer dari db kamu --}}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- / Content -->

                <div class="content-backdrop fade"></div>
            </div>
        </div>
    </section>
    <!-- FAQ: End -->

    <!-- CTA: Start -->
    <section id="landingCTA" class="section-py landing-cta p-lg-0 pb-0 position-relative">
        <img src="../../assets/img/front-pages/backgrounds/cta.png"
            class="position-absolute bottom-0 end-0 scaleX-n1-rtl h-100 w-100 z-n1" alt="cta image" />
        <div class="container">
            <div class="row align-items-center gy-5 gy-lg-0">
                <div class="col-lg-6 text-center text-lg-start">
                    <h2 class="display-5 text-primary mb-3">Siap Untuk Pakai <i class="fw-bold">Serenity</i>?</h2>
                    <p class="fw-medium mb-md-8">Daftar warga baru atau login disini</p>
                    <a href="{{ route('login') }}" class="btn btn-primary">Masuk Warga<i
                            class="icon-base ri ri-arrow-right-line icon-16px ms-2 scaleX-n1-rtl"></i></a>
                </div>
                <div class="col-lg-6 pt-lg-12">
                    <img src="../../assets/img/front-pages/landing-page/bg-website.png" alt="cta dashboard"
                        class="img-fluid" />    
                </div>
            </div>
        </div>
    </section>
    <!-- CTA: End -->

    <!-- Contact Us: Start -->
    <section id="landingContact" class="section-py bg-body landing-contact">
        <div class="container bg-icon-left position-relative">
            <img src="../../assets/img/front-pages/icons/bg-left-icon-light.png" alt="section icon"
                class="position-absolute top-0 start-0" data-speed="1"
                data-app-light-img="front-pages/icons/bg-left-icon-light.png"
                data-app-dark-img="front-pages/icons/bg-left-icon-dark.png" />
            <h6 class="text-center d-flex justify-content-center align-items-center mb-6">
                <img src="../../assets/img/front-pages/icons/section-title-icon.png" alt="section title icon"
                    class="me-3" height="19" />
                <span class="text-uppercase">Kontak Kami</span>
            </h6>
            <h5 class="text-center mb-2">Ayo kita bekerjasama</h5>
            <p class="text-center fw-medium mb-4 mb-md-12 pb-3">Punya pertanyaan, masukan, atau ingin bekerja sama? Kami
                siap mendengar dari Anda.</p>
            <div class="row gy-4">
                <div class="col-lg-5">
                    <div class="card h-100">
                        <div class="bg-primary rounded-4 text-white card-body p-lg-8">
                            <p class="fw-medium mb-1_5 tagline">Mari terhubung dengan kami</p>
                            <h4 class="text-white mb-5 title">Sampaikan Masukan atau kebutuhan Anda bersama tim ahli
                                kami.</h4>
                            <img src="../../assets/img/front-pages/landing-page/let’s-contact.png" alt="let’s contact"
                                class="w-100 mb-4 pb-1" />
                            <p class="mb-0 description">
                                Butuh fitur tambahan atau penyesuaian khusus? Tenang, kami siap membantu dengan tim
                                profesional yang berpengalaman.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="mb-6">Kirim Masukan mu</h5>
                            <form action="{{ route('contact.store') }}" method="post">
                                @csrf
                                <div class="row g-5">
                                    <div class="col-md-6">
                                        <div class="form-floating form-floating-outline">
                                            <input type="text" class="form-control" id="basic-default-fullname"
                                                placeholder="John Doe" name="name" />
                                            <label for="basic-default-fullname">Nama</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-floating form-floating-outline">
                                            <input type="email" class="form-control" id="basic-default-email"
                                                placeholder="johndoe99@gmail.com" name="email" />
                                            <label for="basic-default-email">Email</label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-floating form-floating-outline">
                                            <textarea class="form-control h-px-250" placeholder="Message"
                                                aria-label="Message" id="basic-default-message"
                                                name="question"></textarea>
                                            <label for="basic-default-message">Pertanyaan</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-5">Kirim</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Us: End -->
</x-user>