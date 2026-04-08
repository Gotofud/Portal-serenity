<x-user>
    <div class="content-wrapper py-4 px-4" style="margin:100px 100px 100px 100px">
        <div class="container-xxl">
            <x-partials.admin.form-modal :formRoute="route('services.guest.store')" id="addGuest"
                icon="ri ri-function-add-line" title="Tambah tamu" subtitle="Tambahkan data tamu anda">
                @include('user.service.guest._fields')
            </x-partials.admin.form-modal>
            <!-- HEADER -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 class="fw-bold mb-1">Pendataan Tamu</h4>
                    <small class="text-muted">Kelola dan pantau tamu yang masuk ke perumahan</small>
                </div>

                <button class="btn btn-primary rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#addGuest">
                    <i class="ri ri-add-line me-1"></i> Tambah Tamu
                </button>
            </div>

            <!-- CARD LIST -->
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-3" style="
background-image: url('../../assets/img/front-pages/backgrounds/bg-white-color.png');
background-size: cover;
background-position: center;
background-repeat: no-repeat;
">

                    @if ($guest && $guest->count() > 0)
                        <div class="row g-3">

                            @foreach ($guest as $guestData)
                                <div class="col-md-6 col-lg-4">
                                    <div class="card border-0 shadow-sm rounded-4 h-100 position-relative overflow-hidden hover-card"
                                        style="transition:.25s;">

                                        <!-- BACKGROUND DECOR -->
                                        <div class="position-absolute top-0 end-0 opacity-10"
                                            style="font-size:80px; transform: translate(20%, -20%);">
                                            <i class="ri-user-3-line"></i>
                                        </div>

                                        <div class="card-body p-3 d-flex flex-column">

                                            <!-- HEADER -->
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3"
                                                    style="width:50px; height:50px;">
                                                    <i class="ri ri-user-3-fill text-primary fs-5"></i>
                                                </div>

                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0 fw-semibold">
                                                        {{ $guestData->name ?? 'Nama Tamu' }}
                                                    </h6>
                                                    <small class="text-muted">
                                                        {{ $guestData->telephone_num ?? '-' }}
                                                    </small>
                                                </div>

                                            </div>

                                            <!-- INFO GRID -->
                                            <div class="row g-2 mb-3">
                                                <div class="col-6">
                                                    <small class="text-muted d-block">Tujuan</small>
                                                    <span class="fw-semibold small">
                                                        Blok {{ $guestData->houses?->blocks?->name ?? '-' }}
                                                    </span>
                                                    <br>
                                                    <span class="text-muted small">
                                                        No {{ $guestData->houses?->number ?? '-' }}
                                                    </span>
                                                </div>

                                                <div class="col-6">
                                                    <small class="text-muted d-block">Waktu</small>
                                                    <span class="fw-semibold small">
                                                        {{ $guestData->created_at?->diffForHumans() ?? '-' }}
                                                    </span>
                                                    <br>
                                                    <span class="text-muted small">
                                                        {{ $guestData->created_at?->format('d M Y, H:i') ?? '-' }}
                                                    </span>
                                                </div>
                                            </div>

                                            <!-- FOOTER -->
                                            <div class="d-flex justify-content-between align-items-center mt-auto">

                                                <span class="badge bg-label-primary">
                                                    {{ $guestData->guestTypes->name ?? 'Tamu' }}
                                                </span>

                                                <a href="{{ route('services.guest.show', $guestData->id) }}">
                                                    <i class="fs-3 text-primary ri ri-arrow-right-circle-line"></i>
                                                </a>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="mt-4">
                                <div class="d-flex justify-content-center">
                                    <div class="mt-2">
                                        {{ $guest->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <!-- EMPTY -->
                        <div class="text-center py-5" style="margin:100px 0 100px 0;">
                            <i class="ri ri-user-search-line" style="font-size:40px; opacity:.4;"></i>
                            <p class="fw-semibold mt-3 mb-1">Belum ada data tamu</p>
                            <small class="text-muted">
                                Klik tombol "Tambah Tamu" untuk mulai mencatat tamu
                            </small>
                        </div>
                    @endif

                </div>
            </div>

        </div>
    </div>
    @stack('scripts')
    <script>
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