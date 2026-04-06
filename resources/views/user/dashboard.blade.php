<x-user>
     <x-partials.admin.form-modal :formRoute="route('user-dashboard.storehouse')" id="addHouse"
        icon="ri ri-function-add-line" title="Tambah Unit"
        subtitle="Jika Sudah ada Rumah Utama maka Status akan hanya ada Rumah Lainnya">
        @include('user._fields-house')
    </x-partials.admin.form-modal>
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
                                <p class="text-muted mb-0" style="font-size: 12px;">Total {{number_format($houseCount ?? 0, 0, ',', '.')}} Unit Terdaftar</p>
                            </div>
                            <button class="btn btn-sm btn-primary px-3" style="font-size: 11px;" data-bs-toggle="modal" data-bs-target="#addHouse">
                                <i class="ri ri-add-line"></i> Tambah Unit
                            </button>
                        </div>
                    </div>

                    <div class="card-body p-4 pt-3 d-flex flex-column" style="max-height: 550px;">
                        <div class="flex-grow-1 overflow-auto custom-scrollbar">
                            <div class="mb-4">
                                <div class="d-flex align-items-center mb-2">
                                    <div style="width: 3px; height: 12px; background: #5D87FF; border-radius: 10px;" class="me-2"></div>
                                    <label class="text-uppercase fw-bold text-muted" style="font-size: 10px; letter-spacing: 1px;">Aset Utama</label>
                                </div>

                                @forelse($primaryHouse as $housePrimary)
                                    <div class="p-3 rounded-4 border-0 bg-primary shadow-sm d-flex align-items-center justify-content-between position-relative overflow-hidden" style="color: white;">
                                        <i class="ri ri-home-4-fill position-absolute" style="font-size: 80px; right: -10px; bottom: -20px; opacity: 0.1; transform: rotate(-15deg);"></i>
                                        <div class="d-flex align-items-center position-relative">
                                            <div class="bg-white bg-opacity-25 rounded-3 d-flex align-items-center justify-content-center me-3" style="width: 48px; height: 48px; backdrop-filter: blur(4px);">
                                                <i class="ri ri-home-4-fill text-danger fs-4"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-0 text-white" style="font-size: 14px;">Blok {{ $housePrimary->houses->blocks->name }} No {{ $housePrimary->houses->number }}</h6>
                                                <small class="opacity-75" style="font-size: 11px;">{{ $housePrimary->houses->building_Types->name }} | {{ $housePrimary->is_primary }} | {{ $housePrimary->total_resident .' Penghuni' }} </small>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="text-muted fs-7 py-5 text-center">
                                        <div style="font-size:32px; margin:0 auto 12px; opacity:0.5;"><i class="ri ri-home-4-fill"></i></div>
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
                                                    <small class="opacity-75" style="font-size: 11px;">{{ $houseSecondary->houses->building_Types->name }} | {{ $houseSecondary->is_primary }} | {{ $houseSecondary->total_resident .' Penghuni' }} </small>
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
                            <h6 class="fw-bold mb-0" style="color: #1A1F3C;">Status IWD Rumah Utama {{ date('Y') }}</h6>
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
                                        <a href="{{ route('finances.payment.pay',$bill->id) }}">
                                           <div class="rounded-3 border d-flex align-items-center justify-content-center"
                                            style="background:{{ $isPaid ? '#5d87ff' : '#F8F9FD' }}; border-color:{{ $isPaid ? '#5D87FF' : '#E8ECF4' }}; height: 75px;">
                                            <div class="text-center">
                                                <span class="fw-bold d-block {{ $isPaid ? 'text-white' : 'text-muted' }}" style="font-size: 14px;">{{ $bill->month }}</span>
                                                <i class="{{ $isPaid ? 'ri-checkbox-circle-fill text-white' : 'ri ri-time-line text-muted' }}" style="font-size: 12px;"></i>
                                            </div>
                                        </div>   
                                        </a>
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
 <div class="row g-4 justify-content-center">

        <!-- Item -->
        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
            <a href="{{ route('services.announcements.index') }}">
              <div class="card border-0 shadow-sm text-center h-100" style="border-radius: 16px;">
                <div class="card-body d-flex flex-column justify-content-center align-items-center p-3">
                    <img src="{{ asset('assets/img/front-pages/icons/pemberitahuan.svg') }}"
                        class="mb-3" style="height: 65px;">
                    <small class="fw-semibold">Pemberitahuan</small>
                </div>
            </div>   
            </a>
        </div>

        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
            <a href="{{ route('services.report.index') }}">
             <div class="card border-0 shadow-sm text-center h-100" style="border-radius: 16px;">
                <div class="card-body d-flex flex-column justify-content-center align-items-center p-3">
                    <img src="{{ asset('assets/img/front-pages/icons/laporan.svg') }}"
                        class="mb-3" style="height: 65px;">
                    <small class="fw-semibold">Laporan</small>
                </div>
            </div>     
            </a>
        </div>

        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
            <a href="{{ route('finances.bill.index') }}">
                <div class="card border-0 shadow-sm text-center h-100" style="border-radius: 16px;">
                <div class="card-body d-flex flex-column justify-content-center align-items-center p-3">
                    <img src="{{ asset('assets/img/front-pages/icons/iwd.svg') }}"
                        class="mb-3" style="height: 65px;">
                    <small class="fw-semibold">Iuran Wajib Daerah</small>
                </div>
            </div>  
            </a>
        </div>

        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
            <a href="{{ route('services.guest.index') }}">
              <div class="card border-0 shadow-sm text-center h-100" style="border-radius: 16px;">
                <div class="card-body d-flex flex-column justify-content-center align-items-center p-3">
                    <img src="{{ asset('assets/img/front-pages/icons/tamu.svg') }}"
                        class="mb-3" style="height: 65px;">
                    <small class="fw-semibold">Tambah Tamu</small>
                </div>
            </div>   
            </a>
        </div>

        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
            <a href="{{ route('services.stall.index') }}">
            <div class="card border-0 shadow-sm text-center h-100" style="border-radius: 16px;">
                <div class="card-body d-flex flex-column justify-content-center align-items-center p-3">
                    <img src="{{ asset('assets/img/front-pages/icons/kios.svg') }}"
                        class="mb-3" style="height: 65px;">
                    <small class="fw-semibold">Sewa Kios</small>
                </div>
            </div>    
            </a>
        </div>

        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
            <a href="{{ route('services.news.index') }}">
               <div class="card border-0 shadow-sm text-center h-100" style="border-radius: 16px;">
                <div class="card-body d-flex flex-column justify-content-center align-items-center p-3">
                    <img src="{{ asset('assets/img/front-pages/icons/berita.svg') }}"
                        class="mb-3" style="height: 65px;">
                    <small class="fw-semibold">Berita Terkini</small>
                </div>
            </div> 
            </a>
        </div>

    </div>

    <script>
    function updateClock() {
        document.getElementById('clock').innerHTML = new Date().toLocaleTimeString('id-ID');
    }
    setInterval(updateClock, 1000);
    updateClock();  

   // =============================
// FETCH RT
// =============================
function fetchRT(modal, rwId, selectedRtId = null, selectedBlockId = null, selectedHouseId = null) {
    let rtSelect = modal.querySelector('.rt-select');
    let blockSelect = modal.querySelector('.block-select');
    let houseSelect = modal.querySelector('.house-select');

    if (!rwId) return;

    rtSelect.innerHTML = '<option>Loading...</option>';
    rtSelect.disabled = true;

    blockSelect.innerHTML = '<option selected disabled>Pilih Blok</option>';
    blockSelect.disabled = true;

    houseSelect.innerHTML = '<option selected disabled>Pilih Rumah</option>';
    houseSelect.disabled = true;

    fetch(`/get-rt/${rwId}`)
        .then(res => res.json())
        .then(data => {
            rtSelect.innerHTML = '<option selected disabled>Pilih RT</option>';

            data.forEach(item => {
                let opt = document.createElement('option');
                opt.value = item.id;
                opt.textContent = 'RT ' + item.no;
                if (selectedRtId && item.id == selectedRtId) opt.selected = true;
                rtSelect.appendChild(opt);
            });

            rtSelect.disabled = false;

            // lanjut ke block kalau ada selected
            if (selectedRtId) {
                fetchBlock(modal, rwId, selectedRtId, selectedBlockId, selectedHouseId);
            }
        })
        .catch(err => console.error("RT ERROR:", err));
}


// =============================
// FETCH BLOCK
// =============================
function fetchBlock(modal, rwId, rtId, selectedBlockId = null, selectedHouseId = null) {
    let blockSelect = modal.querySelector('.block-select');
    let houseSelect = modal.querySelector('.house-select');

    if (!rwId || !rtId) return;

    blockSelect.innerHTML = '<option>Loading...</option>';
    blockSelect.disabled = true;

    houseSelect.innerHTML = '<option selected disabled>Pilih Rumah</option>';
    houseSelect.disabled = true;

    fetch(`/get-block/${rwId}/${rtId}`)
        .then(res => res.json())
        .then(data => {
            blockSelect.innerHTML = '<option selected disabled>Pilih Blok</option>';

            data.forEach(item => {
                let opt = document.createElement('option');
                opt.value = item.id;
                opt.textContent = 'Blok ' + item.name;
                if (selectedBlockId && item.id == selectedBlockId) opt.selected = true;
                blockSelect.appendChild(opt);
            });

            blockSelect.disabled = false;

            // lanjut ke house kalau ada selected
            if (selectedBlockId) {
                fetchHouse(modal, rwId, rtId, selectedBlockId, selectedHouseId);
            }
        })
        .catch(err => console.error("BLOCK ERROR:", err));
}


// =============================
// FETCH HOUSE (FIXED 3 PARAM)
// =============================
function fetchHouse(modal, rwId, rtId, blockId, selectedHouseId = null) {
    let houseSelect = modal.querySelector('.house-select');

    if (!rwId || !rtId || !blockId) return;

    houseSelect.innerHTML = '<option>Loading...</option>';
    houseSelect.disabled = true;

    fetch(`/get-house/${rwId}/${rtId}/${blockId}`)
        .then(res => res.json())
        .then(data => {
            houseSelect.innerHTML = '<option selected disabled>Pilih Rumah</option>';

            if (data.length === 0) {
                houseSelect.innerHTML = '<option disabled>Tidak ada rumah</option>';
            }

            data.forEach(item => {
                let opt = document.createElement('option');
                opt.value = item.id;
                opt.textContent = `${item.label}`;
                if (selectedHouseId && item.id == selectedHouseId) opt.selected = true;
                houseSelect.appendChild(opt);
            });

            houseSelect.disabled = false;
        })
        .catch(err => console.error("HOUSE ERROR:", err));
}


// =============================
// EVENT CHANGE (KHUSUS MODAL)
// =============================
document.addEventListener('change', function (e) {
    let modal = e.target.closest('.modal');
    if (!modal) return;

    // RW
    if (e.target.classList.contains('rw-select')) {
        fetchRT(modal, e.target.value);
    }

    // RT
    if (e.target.classList.contains('rt-select')) {
        let rwId = modal.querySelector('.rw-select').value;
        fetchBlock(modal, rwId, e.target.value);
    }

    // BLOCK
    if (e.target.classList.contains('block-select')) {
        let rwId = modal.querySelector('.rw-select').value;
        let rtId = modal.querySelector('.rt-select').value;
        fetchHouse(modal, rwId, rtId, e.target.value);
    }
});


// =============================
// AUTO LOAD SAAT MODAL DIBUKA (EDIT MODE)
// =============================
document.addEventListener('shown.bs.modal', function (e) {
    let modal = e.target;

    let rwSelect = modal.querySelector('.rw-select');
    let rtSelect = modal.querySelector('.rt-select');
    let blockSelect = modal.querySelector('.block-select');
    let houseSelect = modal.querySelector('.house-select');

    if (!rwSelect) return;

    let rwId = rwSelect.value;
    let savedRtId = rtSelect?.dataset.selected;
    let savedBlockId = blockSelect?.dataset.selected;
    let savedHouseId = houseSelect?.dataset.selected;

    if (rwId) {
        fetchRT(modal, rwId, savedRtId, savedBlockId, savedHouseId);
    }
});
</script>
</x-user>