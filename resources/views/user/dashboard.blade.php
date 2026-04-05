<x-user>
    <div class="container-fluid py-5" style="margin-top: 100px; margin-bottom:100px;">

        {{-- ===== HEADER ===== --}}
        <div class="row align-items-center mb-5 mt-2">
            <div class="col-md-8">
                <div class="d-flex align-items-center">
                    <div>
                        <h2 class="fw-bold mb-1" style="color: #2D3436; letter-spacing: -0.5px;">
                            {{ $greeting }},<span class="text-primary"> {{ Auth::user()->name }}</span>!
                        </h2>
                        <p class="text-muted mb-0 opacity-75">
                            <i class="ri-rocket-line me-1"></i> Pantau Aktifitas layanan Serenity di sini.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                <div class="d-inline-block p-3 rounded-4 bg-white shadow-sm border border-light-subtle">
                    <div class="d-flex align-items-center justify-content-md-end">
                        <div class="me-3 text-end">
                            <h4 id="clock" class="fw-bold mb-0 text-dark"
                                style="letter-spacing: 1px; font-variant-numeric: tabular-nums;"></h4>
                            <span class="text-uppercase text-muted fw-semibold"
                                style="font-size: 0.7rem; letter-spacing: 2px;">{{ $date }}</span>
                        </div>
                        <div class="bg-primary-subtle p-2 rounded-3">
                            <i class="ri-calendar-event-line text-primary fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ===== STAT CARDS ===== --}}
        <div class="row g-4 mb-4">
            <div class="col-md-3">
                <div class="card border-0 shadow-sm text-white bg-primary" style="border-radius: 15px; height: 160px;">
                    <div class="card-body p-3 d-flex flex-column">
                        <div class="d-flex justify-content-between">
                            <small class="fw-bold text-white">Rumah</small>
                            <i class="ri-more-fill text-white"></i>
                        </div>
                        <h2 class="fw-bold text-white mt-auto mb-0">{{ number_format($houseCount ?? 0, 0, ',', '.') }}</h2>
                        <small class="text-white" style="font-size: 12.5px;">Rumah Terdaftar</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0 shadow-sm" style="border-radius: 15px; height: 160px;">
                    <div class="card-body p-3 d-flex flex-column">
                        <div class="d-flex justify-content-between text-muted">
                            <small class="fw-bold">IWD Selesai</small>
                            <i class="ri-more-fill"></i>
                        </div>
                        <h2 class="fw-bold mt-auto mb-0">{{ number_format($billsPaidCount ?? 0, 0, ',', '.') }}</h2>
                        <small class="text-muted" style="font-size: 12.5px;">Transaksi Selesai</small>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-0 shadow-sm" style="border-radius: 15px; height: 160px;">
                    <div class="card-body p-3 d-flex flex-column">
                        <div class="d-flex justify-content-between text-muted">
                            <small class="fw-bold">Total IWD Terbayar</small>
                            <i class="ri-more-fill"></i>
                        </div>
                        <h2 class="fw-bold mt-auto mb-0">Rp {{ number_format($billsPaidSum ?? 0, 0, ',', '.') }}</h2>
                        <small class="text-muted" style="font-size: 12.5px;">Dari 12 transaksi</small>
                    </div>
                </div>
            </div>
        </div>

        {{-- ===== RIWAYAT TAGIHAN + PROGRESS LUNAS ===== --}}
        <div class="row g-3 mb-4">
            <div class="col-md-7">
                <div class="card border-0 shadow-sm h-100" style="background: #ffffff; overflow: hidden; border-radius: 24px;">
                    <div class="card-header border-0 pt-4 px-4 pb-2"
                        style="background: linear-gradient(to bottom, #f8faff, #ffffff);">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="fw-bold mb-1" style="color: #1A1F3C; letter-spacing: -0.5px;">Daftar Rumah & Aset</h5>
                                <p class="text-muted mb-0" style="font-size: 12px;">Total 3 Unit Terdaftar</p>
                            </div>
                            <button class="btn btn-sm btn-primary px-3" style="font-size: 11px;">
                                <i class="ri-add-line"></i> Tambah Unit
                            </button>
                        </div>
                    </div>

                    <div class="card-body p-4 pt-3 d-flex flex-column" style="max-height: 550px;">
                        <div class="flex-grow-1 overflow-auto custom-scrollbar pe-2">
                            <div class="mb-4">
                                <div class="d-flex align-items-center mb-2">
                                    <div style="width: 3px; height: 12px; background: #5D87FF; border-radius: 10px;" class="me-2"></div>
                                    <label class="text-uppercase fw-bold text-muted" style="font-size: 10px; letter-spacing: 1px;">Aset Utama</label>
                                </div>

                                @forelse($primaryHouse as $housePrimary)
                                    <div class="p-3 rounded-4 border-0 bg-primary shadow-sm d-flex align-items-center justify-content-between position-relative overflow-hidden" style="color: white;">
                                        <i class="ri-home-7-line position-absolute" style="font-size: 80px; right: -10px; bottom: -20px; opacity: 0.1; transform: rotate(-15deg);"></i>
                                        <div class="d-flex align-items-center position-relative">
                                            <div class="bg-white bg-opacity-25 rounded-3 d-flex align-items-center justify-content-center me-3" style="width: 48px; height: 48px; backdrop-filter: blur(4px);">
                                                <i class="ri ri-home-4-fill text-danger fs-4"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-0 text-white" style="font-size: 14px;">Blok {{ $housePrimary->houses->blocks->name }} No {{ $housePrimary->houses->number }}</h6>
                                                <small class="opacity-75" style="font-size: 11px;">Rumah Tinggal</small>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="text-muted fs-7 py-5 text-center">
                                        <div style="font-size:32px; margin:0 auto 12px; opacity:0.5;"><i class="ri i-home-4-fill"></i></div>
                                        <p class="mb-1 fw-semibold">Belum ada Rumah Utama</p>
                                        <small>Pengguna belum mendaftarkan rumah utama.</small>
                                    </div>
                                @endforelse
                            </div>

                            <div class="d-flex align-items-center mb-2">
                                <div style="width: 3px; height: 12px; background: #D1D8E0; border-radius: 10px;" class="me-2"></div>
                                <label class="text-uppercase fw-bold text-muted" style="font-size: 10px; letter-spacing: 1px;">Unit Properti Lainnya</label>
                            </div>

                            <div class="vstack gap-3">
                                @if ($secondaryHouse && $secondaryHouse->count() > 0)
                                    @foreach ($secondaryHouse as $houseSecondary)
                                        <div class="p-3 rounded-4 border border-light-subtle d-flex align-items-center justify-content-between transition-all hover-card" style="background: #ffffff;">
                                            <div class="d-flex align-items-center position-relative">
                                                <div class="bg-primary bg-opacity-25 rounded-3 d-flex align-items-center justify-content-center me-3" style="width: 48px; height: 48px; backdrop-filter: blur(4px);">
                                                    <i class="ri ri-home-4-fill text-white fs-4"></i>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0 text-primary" style="font-size: 14px;">Blok {{ $houseSecondary->houses->blocks->name }} No {{ $houseSecondary->houses->number }}</h6>
                                                    <small class="opacity-75" style="font-size: 11px;">Rumah Tinggal</small>
                                                </div>
                                            </div>
                                            <button class="btn btn-sm btn-outline-light text-muted rounded-circle border-0"><i class="ri-arrow-right-s-line fs-4"></i></button>
                                        </div>
                                    @endforeach       
                                @else
                                    <div class="text-muted fs-7 py-5 text-center ">
                                        <div style="font-size:32px; opacity:0.5;"><i class="ri ri-home-4-fill"></i></div>
                                        <p class="mb-1 fw-semibold">Belum ada Rumah Lainnya</p>
                                        <small>Pengguna belum mendaftarkan rumah lainnya.</small>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 24px; background: #ffffff;">
                    <div class="card-body p-4 d-flex flex-column">
                        <div class="mb-4">
                            <h6 class="fw-bold mb-0" style="color: #1A1F3C;">Status Lunas {{ date('Y') }}</h6>
                            <small class="text-muted">Progress iuran tahun ini</small>
                            @php 
                                $totalTarget = 12;
                                $percentage = $totalTarget > 0 ? ($billsPaidCount / $totalTarget) * 100 : 0;
                            @endphp
                            <div class="d-flex align-items-end gap-2 mt-3 mb-1">
                                <span style="font-size:28px;font-weight:800;color:#1A1F3C;line-height:1;">{{ $billsPaidCount }}</span>
                                <span class="text-muted mb-1" style="font-size:12px;">/ {{ $totalTarget }} bulan</span>
                                <span class="ms-auto fw-bold text-primary" style="font-size:13px;">{{ round($percentage) }}%</span>
                            </div>
                            <div class="progress mb-3" style="height:6px;border-radius:20px;background:#F1F3F9;">
                                <div class="progress-bar" role="progressbar" style="width:{{ $percentage }}%; background:#5D87FF; border-radius:20px;"></div>
                            </div>

                            <div class="row g-2"> 
                                @forelse($allBills as $bill)
                                    @php $isPaid = $bill->status == 'paid'; @endphp
                                    <div class="col-3 mb-2">
                                        <div class="rounded-3 border d-flex align-items-center justify-content-center"
                                            style="background:{{ $isPaid ? '#5d87ff' : '#F8F9FD' }}; border-color:{{ $isPaid ? '#5D87FF' : '#E8ECF4' }}; height: 75px;">
                                            <div class="text-center">
                                                <span class="fw-bold d-block {{ $isPaid ? 'text-white' : 'text-muted' }}" style="font-size: 14px;">{{ $bill->month }}</span>
                                                <i class="{{ $isPaid ? 'ri-checkbox-circle-fill text-white' : 'ri ri-time-line text-muted' }}" style="font-size: 12px;"></i>
                                            </div>
                                        </div>
                                    </div>
                                @empty 
                                    <div class="text-muted fs-7 py-5 text-center col-12">
                                        <div style="font-size:32px; margin:0 auto 12px; opacity:0.5;"><i class="ri ri-money-dollar-box-fill"></i></div>
                                        <p class="mb-1 fw-semibold">Belum ada IWD</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateClock() {
            document.getElementById('clock').innerHTML = new Date().toLocaleTimeString('id-ID');
        }
        setInterval(updateClock, 1000);
        updateClock();
    </script>
</x-user>