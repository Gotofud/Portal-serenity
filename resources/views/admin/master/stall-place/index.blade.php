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
                                        <h4 class="mb-0">{{ App\Models\Master\StallPlace::count() }}</h4>
                                        <p class="mb-0">Total Tempat Kios </p>
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
                                            {{ App\Models\Master\StallPlace::where('status', 'Aktif')->count() }}
                                        </h4>
                                        <p class="mb-0">Tempat Kios Aktif</p>
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
                                            {{ App\Models\Master\StallPlace::where('status', 'Nonaktif')->count() }}
                                        </h4>
                                        <p class="mb-0">Tempat Kios Nonaktif</p>
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
    <x-partials.admin.form-modal :formRoute=" route('dashboard.stall-place.store')" id="addStallPlace"
        icon="ri ri-function-add-line" title="Tambah Data Tempat Kios" subtitle="Wajib Diisi">
        @include('admin.master.stall-place._fields')
    </x-partials.admin.form-modal>
    <div class="card mt-5">
        <x-partials.admin.export_modal :exportExcel="route('dashboard.community-unit.export')"
            :exportPdf="route('dashboard.stall-place.exportPdf')" />
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
                        data-bs-toggle="modal" data-bs-target="#addStallPlace">
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
                        <th>No Rw/Rt</th>
                        <th>Nama Kios</th>
                        <th>Harga Sewa</th>
                        <th>Status</th>
                        <th>Dibuat</th>
                        <th>Diperbarui</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($stall_place as $data)
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td>Rt {{ $data->neighborhoodUnits->no }}
                                <br><small class="text-muted text-light" style="font-size: 13.5px;">Rw
                                    {{ $data->communityUnits->no }}</small>
                            </td>
                            <td>{{ $data->name }}
                                <br><small class="text-muted text-light" style="font-size: 13.5px;">{{ $data->stall_unit }}
                                    Kios</small>
                            </td>
                            <td class="text-center">{{ Number::currency($data->rent_amount, 'IDR', 'id') }}</td>
                            <td>
                                <span class="badge bg-{{ $data->status == 'Aktif' ? 'label-primary' : 'label-danger' }}
                                                                                        me-1">{{ $data->status }}</span>
                            </td>
                            <td>{{ $data->created_at ? $data->created_at->format('d M Y , H:i') : '-' }}
                            </td>
                            <td>{{ $data->updated_at ? $data->updated_at->format('d M Y , H:i') : '-' }}
                            </td>
                            <td>
                                <a class="btn btn-outline-warning text-warning d-inline-flex align-items-center justify-content-center p-0"
                                    style="height: 40px; width: 40px;" data-bs-toggle="modal"
                                    data-bs-target="#editStallPlace{{ $data->id }}">

                                    <i class="ri ri-pencil-fill" style="font-size: 15px; line-height: 1;"></i>

                                </a>
                                <a class="btn btn-outline-danger text-danger d-inline-flex align-items-center justify-content-center p-0"
                                    style="height: 40px; width: 40px;" data-bs-toggle="modal" data-bs-target="#addRw">

                                    <i class="ri ri-delete-bin-fill" style="font-size: 15px; line-height: 1;"></i>

                                </a>
                            </td>
                        </tr>
                        <x-partials.admin.form-modal id="editStallPlace{{ $data->id }}"
                            :formRoute="route('dashboard.stall-place.update', $data->id)" method="PUT"
                            title="Edit Data Tempat Kios {{ $data->no }}">

                            @include('admin.master.stall-place._fields', ['data' => $data])

                        </x-partials.admin.form-modal>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <x-partials.admin.import_modal :downloadRoute="route('dashboard.template.download', 'stall-place')"
        :importRoute="route('dashboard.stall-place.import')" />
    @push('scripts')
        <script>
            // Number Format
            const input = document.getElementById("harga");

            input.addEventListener("input", function () {
                // Ambil angka saja
                let value = this.value.replace(/\D/g, "");

                // Format ribuan Indonesia
                this.value = new Intl.NumberFormat("id-ID").format(value);
            });

            // 1. Fungsi Utama Fetch RT
            function fetchRT(modal, rwId, selectedRtId = null) {
                let rtSelect = modal.querySelector('.rt-select');
                if (!rwId || rwId === " ") return;

                rtSelect.innerHTML = '<option>Loading...</option>';
                rtSelect.disabled = true;

                fetch(`/get-rt/${rwId}`)
                    .then(res => res.json())
                    .then(data => {
                        rtSelect.innerHTML = '<option selected disabled>Pilih RT</option>';

                        data.forEach(item => {
                            let opt = document.createElement('option');
                            opt.value = item.id;
                            opt.textContent = 'RT ' + item.no;

                            // KUNCI EDIT: Cek apakah ID ini sama dengan data-selected
                            if (selectedRtId && item.id == selectedRtId) {
                                opt.selected = true;
                            }

                            rtSelect.appendChild(opt);
                        });

                        rtSelect.disabled = false;
                    })
                    .catch(err => console.error(err));
            }

            // 2. Event saat RW diganti (Manual)
            document.addEventListener('change', function (e) {
                if (e.target.classList.contains('rw-select')) {
                    fetchRT(e.target.closest('.modal'), e.target.value);
                }
            });

            // 3. Event OTOMATIS saat Modal Dibuka (Untuk Edit)
            // Kita pakai event bawaan Bootstrap 'shown.bs.modal'
            document.addEventListener('shown.bs.modal', function (e) {
                let modal = e.target;
                let rwSelect = modal.querySelector('.rw-select');
                let rtSelect = modal.querySelector('.rt-select');

                if (rwSelect && rwSelect.value !== " ") {
                    let savedRtId = rtSelect.getAttribute('data-selected');
                    // Jalankan fetch otomatis jika ada RW yang terpilih
                    fetchRT(modal, rwSelect.value, savedRtId);
                }
            });
        </script>
    @endpush
</x-admin>