<x-admin>
    <div class="row ">
        <div class="col-12">
            <div class="card">
                <div class="card-widget-separator-wrapper">
                    <div class="card-body card-widget-separator ms-3">
                        <div class="row gy-4 gy-sm-1">
                            <div class="col-sm-8 col-lg-4">
                                <div
                                    class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-4 pb-sm-0">
                                    <div>
                                        <h4 class="mb-0">{{ App\Models\Master\House::count() }}</h4>
                                        <p class="mb-0">Total Rumah </p>
                                    </div>
                                    <div class="avatar me-sm-6">
                                        <span class="avatar-initial rounded-3 bg-label-primary">
                                            <i class="icon-base ri ri-database-2-line text-heading icon-26px"></i>
                                        </span>
                                    </div>
                                </div>
                                <hr class="d-none d-sm-block d-lg-none me-6" />
                            </div>
                            <div class="col-sm-8 col-lg-4">
                                <div
                                    class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-4 pb-sm-0">
                                    <div>
                                        <h4 class="mb-0">
                                            {{ App\Models\Master\House::where('status', 'Aktif')->count() }}
                                        </h4>
                                        <p class="mb-0">Rumah Aktif</p>
                                    </div>
                                    <div class="avatar me-lg-6">
                                        <span class="avatar-initial rounded-3 bg-label-success">
                                            <i class="icon-base ri ri-checkbox-circle-line text-heading icon-26px"></i>
                                        </span>
                                    </div>
                                </div>
                                <hr class="d-none d-sm-block d-lg-none" />
                            </div>
                            <div class="col-sm-8 col-lg-4">
                                <div
                                    class="d-flex justify-content-between align-items-start  pb-4 pb-sm-0 card-widget-3">
                                    <div>
                                        <h4 class="mb-0">
                                            {{ App\Models\Master\House::where('status', 'Nonaktif')->count() }}
                                        </h4>
                                        <p class="mb-0">Rumah Nonaktif</p>
                                    </div>
                                    <div class="avatar me-sm-6">
                                        <span class="avatar-initial rounded-3 bg-label-danger">
                                            <i
                                                class="icon-base ri ri-indeterminate-circle-line text-heading icon-26px"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-partials.admin.form-modal :formRoute=" route('dashboard.house.store')" id="addHouse"
        icon="ri ri-function-add-line" title="Tambah Data House" subtitle="Wajib Diisi">
        @include('admin.master.house._fields')
    </x-partials.admin.form-modal>
    <div class="card mt-5">
        <x-partials.admin.export_modal :exportExcel="route('dashboard.community-unit.export')"
            :exportPdf="route('dashboard.house.exportPdf')" />
        <div class="card-header">
            <div class="d-sm-flex justify-content-between align-items-start">
                <div class="input-group position-relative d-inline-block w-25">
                    <i class="ri ri-search-line position-absolute"
                        style="left:12px; top:50%; transform:translateY(-50%); font-size:14px; color:#6c757d;">
                    </i>
                    <div class="input-group input-group-sm">
                        <input type="text" id="customSearch" class="form-control"
                            style="border-radius:5px; padding-left:38px;" placeholder="Cari Data...">
                    </div>
                </div>
                <div class="action">
                    <div class="position-relative d-inline-block" style="width:170px;">

                        <i class="ri ri-price-tag-3-line position-absolute"
                            style="left:12px; top:50%; transform:translateY(-50%); font-size:14px; color:#6c757d;">
                        </i>

                        <select id="status" class="form-select form-select-sm"
                            style="border-radius:5px; padding-left:38px;">
                            <option value="" selected>Status</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Nonaktif">Nonaktif</option>
                        </select>

                    </div>

                    <a class="btn btn-sm btn-outline-light text-dark" data-bs-toggle="modal" data-bs-target="#export"
                        style=" height:40px;">
                        <i class="ri ri-download-2-line"></i>
                    </a>
                    <a class="btn btn-sm btn-outline-light text-dark" data-bs-toggle="modal" data-bs-target="#import"
                        style=" height:40px;">
                        <i class="ri ri-upload-2-line"></i>
                    </a>
                    <a class="btn btn-sm text-white" style="background-color:#2fc692; height:40px;"
                        data-bs-toggle="modal" data-bs-target="#addHouse">
                        +
                    </a>
                </div>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pemilik</th>
                        <th>Alamat</th>
                        <th>Tipe Hunian</th>
                        <th>Jenis Bangunan</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($house as $data)
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                @php
                                    // Ambil data pertama dari relasi
                                    $house = $data->users_houses->first();
                                @endphp
                                @if($house && $house->users)
                                    <a href="{{ route('resident.user.show', $house->users->id) }}"
                                        class="text-dark text-decoration-none">
                                        {{ $house->users->user_profile->full_name ?? 'N/A' }}
                                        <br>
                                        <small class="text-muted text-light" style="font-size: 13.5px;">
                                            {{ $house->users->email }}
                                        </small>
                                    </a>
                                @else
                                    <span class="text-muted">Belum diatur</span>
                                @endif
                            </td>
                            <td>Blok {{ $data->blocks->name ?? 'N/a' }} No {{ $data->number }} <br><small
                                    class="text-muted text-light" style="font-size: 13.5px;">
                                    RT {{ $data->neighborhoodUnits->no }} RW
                                    {{ $data->communityUnits->no }}</small></td>
                            <td>
                                @if($house && $house->users)
                                    {{ $house->is_primary }}
                                    <br><small class="text-muted text-light" style="font-size: 13.5px;">
                                        {{ $house->total_resident }} Penghuni</small>
                                @else
                                    <span class="text-muted">Belum diatur</span>
                                @endif
                            </td>
                            <td>{{ $data->building_Types->name }}<br><small class="text-muted text-light"
                                    style="font-size: 13.5px;">
                                    {{ $data->building_Types->code }} </small></td>
                            <td><span
                                    class="badge bg-{{ $data->status == 'Aktif' ? 'label-primary' : 'label-danger' }} me-1">{{ $data->status }}</span>
                            </td>
                            <td>
                                <a class="btn btn-outline-warning text-warning d-inline-flex align-items-center justify-content-center p-0"
                                    style="height: 40px; width: 40px;" data-bs-toggle="modal"
                                    data-bs-target="#editHouse{{ $data->id }}">
                                    <i class="ri ri-pencil-fill" style="font-size: 15px; line-height: 1;"></i>
                                </a>
                                <a class="btn btn-outline-danger text-danger d-inline-flex align-items-center justify-content-center p-0"
                                    style="height: 40px; width: 40px;" data-bs-toggle="modal" data-bs-target="#addRw">
                                    <i class="ri ri-delete-bin-fill" style="font-size: 15px; line-height: 1;"></i>
                                </a>
                            </td>
                        </tr>
                        <x-partials.admin.form-modal id="editHouse{{ $data->id }}"
                            :formRoute="route('dashboard.guest-type.update', $data->id)" method="PUT"
                            title="Edit House {{ $data->no }}">
                            @include('admin.master.house._fields', ['data' => $data])
                        </x-partials.admin.form-modal>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <x-partials.admin.import_modal :downloadRoute="route('dashboard.template.download', 'house')"
        :importRoute="route('dashboard.house.import')" />
    @push('scripts')
        <script>
            // --- 1. Fungsi Fetch Blok ---
            function fetchBlock(modal, rwId, rtId, selectedBlockId = null) {
                let blockSelect = modal.querySelector('.block-select');
                if (!rwId || !rtId || rwId === " " || rtId === " ") return;

                blockSelect.innerHTML = '<option>Loading...</option>';
                blockSelect.disabled = true;

                fetch(`/get-block/${rwId}/${rtId}`)
                    .then(res => res.json())
                    .then(data => {
                        blockSelect.innerHTML = '<option selected disabled>Pilih Blok</option>';
                        data.forEach(item => {
                            let opt = document.createElement('option');
                            opt.value = item.id;
                            opt.textContent = 'Blok ' + item.name; // Sesuaikan dengan kolom nama blok kamu
                            if (selectedBlockId && item.id == selectedBlockId) opt.selected = true;
                            blockSelect.appendChild(opt);
                        });
                        blockSelect.disabled = false;
                    });
            }

            // --- 2. Fungsi Fetch RT (Dimodifikasi untuk memicu Blok) ---
            function fetchRT(modal, rwId, selectedRtId = null, selectedBlockId = null) {
                let rtSelect = modal.querySelector('.rt-select');
                let blockSelect = modal.querySelector('.block-select');
                if (!rwId || rwId === " ") return;

                rtSelect.innerHTML = '<option>Loading...</option>';
                rtSelect.disabled = true;
                blockSelect.disabled = true; // Reset blok saat RW berubah

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

                        // KUNCI EDIT BERANTAI: Jika RT sudah terpilih otomatis, langsung fetch Blok
                        if (selectedRtId) {
                            fetchBlock(modal, rwId, selectedRtId, selectedBlockId);
                        }
                    });
            }

            // --- 3. Event Listeners ---
            document.addEventListener('change', function (e) {
                let modal = e.target.closest('.modal');

                // Jika RW Berubah
                if (e.target.classList.contains('rw-select')) {
                    fetchRT(modal, e.target.value);
                    modal.querySelector('.block-select').innerHTML = '<option selected disabled>Pilih Blok</option>';
                }

                // Jika RT Berubah
                if (e.target.classList.contains('rt-select')) {
                    let rwId = modal.querySelector('.rw-select').value;
                    fetchBlock(modal, rwId, e.target.value);
                }
            });

            // --- 4. Event Auto-Load saat Edit ---
            document.addEventListener('shown.bs.modal', function (e) {
                let modal = e.target;
                let rwSelect = modal.querySelector('.rw-select');
                let rtSelect = modal.querySelector('.rt-select');
                let blockSelect = modal.querySelector('.block-select');

                if (rwSelect && rwSelect.value !== " " && rwSelect.value !== "") {
                    let savedRtId = rtSelect.getAttribute('data-selected');
                    let savedBlockId = blockSelect.getAttribute('data-selected');

                    // Panggil fetchRT, yang di dalamnya akan otomatis memanggil fetchBlock
                    fetchRT(modal, rwSelect.value, savedRtId, savedBlockId);
                }
            });
        </script>
    @endpush
</x-admin>