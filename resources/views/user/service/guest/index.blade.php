<x-user>
    <div class="content-wrapper" style="margin:100px 100px 0 100px">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card h-100 mb-4"
                style="background: #ffffff; overflow: hidden; border-radius: 24px;">
                <div class="card-header border-0 pt-4 px-4 pb-2"
                    style="background: linear-gradient(to bottom, #f8faff, #ffffff);">
                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <h5 class="fw-bold mb-1" style="color: #1A1F3C; letter-spacing: -0.5px;">
                                Daftar Pendataan Tamu Masuk
                            </h5>
                            <div class="d-flex align-items-center mb-2">
                                <div style="width: 3px; height: 12px; background: #D1D8E0; border-radius: 10px;"
                                    class="me-2"></div>
                                <label class="text-uppercase fw-bold text-muted"
                                    style="font-size: 10px; letter-spacing: 1px;">Data Pelaporan Tamu <span class="text-danger"> 1x24</span></label>
                            </div>
                        </div>

                        <!-- GROUP BUTTON -->
                        <div class="d-flex gap-2">
                            <button class="btn btn-sm btn-primary px-3" style="font-size: 11px;" data-bs-toggle="modal"
                                data-bs-target="#addVehicle">
                                <i class="ri ri-add-line"></i> Tambah Tamu
                            </button>
                        </div>

                    </div>
                </div>

                <div class="card-body p-4 pt-3 d-flex flex-column" style="max-height: 550px;">
                    <div class="flex-grow-1 overflow-auto custom-scrollbar">

                        <div class="vstack gap-3" style="max-height: 180px; overflow-y: auto;">
                            @if ($guest && $guest->count() > 0)
                                @foreach ($guest as $guestData)
                                    <div class="p-3 rounded-4 border border-light-subtle d-flex align-items-center justify-content-between transition-all hover-card"
                                        style="background: #ffffff;">
                                        <div class="d-flex align-items-center position-relative">
                                            <div class="bg-primary bg-opacity-25 rounded-3 d-flex align-items-center justify-content-center me-3"
                                                style="width: 48px; height: 48px; backdrop-filter: blur(4px);">
                                                <i class="ri ri-home-4-fill text-white fs-4"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-0 text-primary" style="font-size: 14px;">Blok
                                                    sa
                                                </h6>
                                                <small class="opacity-75" style="font-size: 11px;">sa</small>
                                            </div>
                                        </div>
                                        <button class="btn btn-sm btn-outline-light text-muted rounded-circle border-0"><i
                                                class="ri-arrow-right-s-line fs-4"></i></button>
                                    </div>
                                @endforeach
                            @else
                                <div class="text-muted fs-7 py-5 text-center ">
                                    <div style="font-size:32px; opacity:0.5;"><i class="ri ri-map-pin-user-fill"></i>
                                    </div>
                                    <p class="mb-1 fw-semibold">Belum ada tamu</p>
                                    <small>Pengguna belum menambahkan tamu.</small>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-user>