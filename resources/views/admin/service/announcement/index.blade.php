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
                                        <h4 class="mb-0">{{ App\Models\Service\Announcements::count() }}</h4>
                                        <p class="mb-0">Total Pengumuman </p>
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
                                            {{ App\Models\Service\Announcements::where('is_public', true)->count() }}
                                        </h4>
                                        <p class="mb-0">Pengumuman Aktif</p>
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
                                            {{ App\Models\Service\Announcements::where('is_public', false)->count() }}
                                        </h4>
                                        <p class="mb-0">Pengumuman Nonaktif</p>
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
    <x-partials.admin.form-modal :formRoute=" route('service.announcements.store')" id="addAnn"
        icon="ri ri-function-add-line" title="Tambah Pengumuman" subtitle="Wajib Diisi">
        @include('admin.service.announcement._fields')
    </x-partials.admin.form-modal>
    <div class="card mt-5">
        <x-partials.admin.export_modal :exportExcel="route('dashboard.community-unit.export')"
            :exportPdf="route('service.announcements.exportPdf')" />
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
                            <option value="" selected>Kategori</option>
                            <option value="Publik">Publik</option>
                            <option value="Menunggu">Menunggu</option>
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
                        data-bs-toggle="modal" data-bs-target="#addAnn">
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
                        <th>Gambar</th>
                        <th>Pengumuman</th>
                        <th>Dibuat</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($announcement as $data)
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                @if ($data->image)
                                    <img src="{{ Storage::url($data->image) }}"
                                        style="width: 150px; height: 80px; object-fit: cover;">
                                @else
                                    Tidak Ada Gambar
                                @endif
                            </td>
                            <td style="max-width: 150px;">
                                <div class="fw-bold text-truncate">
                                    {{ $data->subject }}
                                </div>
                                <form action="{{ route('service.announcements.publish', $data->id) }}" method="post">
                                    <div class="small text-muted text-ligth" style="font-size: 12.5px;">
                                        @if ($data->is_public == true)
                                            <span class="badge bg-label-prmary">
                                                Publik
                                            </span>
                                        @else
                                            <span class="badge bg-label-danger">
                                                Privat
                                            </span>
                                        @endif
                                        •
                                        @csrf
                                        <button type="submit"
                                            class="btn btn-outline-{{  $data->is_public == 1 ? 'primary' : 'danger'  }} text-{{  $data->is_public == 1 ? 'primary' : 'danger' }} d-inline-flex align-items-center justify-content-center p-0"
                                            style="height: 20px; width: 20px;">
                                            <i class="ri ri-{{  $data->is_public == 1 ? 'eye-fill' : 'eye-off-fill' }} "
                                                style="font-size: 10px; line-height: 1;"></i>
                                        </button>

                                    </div>
                                </form>
                                <!-- STATUS -->
                                <div class="small mt-1">

                                </div>
                            </td>
                            <td>{{ $data->created_at ? $data->created_at->format('d M Y , H:i') : 'Belum Di Konfirmasi' }}
                                WIB
                            </td>
                            <td>
                                <a class="btn btn-outline-warning text-warning d-inline-flex align-items-center justify-content-center p-0"
                                    style="height: 40px; width: 40px;" data-bs-toggle="modal"
                                    data-bs-target="#editAnn{{ $data->id }}">
                                    <i class="ri ri-pencil-fill" style="font-size: 15px; line-height: 1;"></i>
                                </a>
                                <a class="btn btn-outline-primary text-primary d-inline-flex align-items-center justify-content-center p-0"
                                    style="height: 40px; width: 40px;" href="{{ route('service.news.show', $data->id) }}">
                                    <i class="ri ri-eye-fill" style="font-size: 15px; line-height: 1;"></i>
                                </a>
                                <a class="btn btn-outline-danger text-danger d-inline-flex align-items-center justify-content-center p-0"
                                    style="height: 40px; width: 40px;" data-bs-toggle="modal" data-bs-target="#addRw">
                                    <i class="ri ri-delete-bin-fill" style="font-size: 15px; line-height: 1;"></i>
                                </a>
                            </td>
                        </tr>
                        <x-partials.admin.form-modal id="editAnn{{ $data->id }}"
                            :formRoute="route('service.announcements.update', $data->id)" method="PUT"
                            title="Edit Pengumuman">
                            @include('admin.service.announcement._fields', ['data' => $data])
                        </x-partials.admin.form-modal>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <x-partials.admin.import_modal :downloadRoute="route('dashboard.template.download', 'rw')"
        :importRoute="route('dashboard.block.import')" />
    @push('scripts')
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

        <script>
            let quillInstances = {};

            function initializeQuill(modalId) {
                // Jika editor sudah ada, jangan reinisialisasi
                if (quillInstances[modalId]) {
                    return quillInstances[modalId];
                }

                const editorElement = document.querySelector(`#${modalId} #editor`);
                if (!editorElement) return null;

                const quill = new Quill(`#${modalId} #editor`, {
                    theme: 'snow'
                });

                quillInstances[modalId] = quill;

                // Attach submit handler untuk modal ini
                const form = document.querySelector(`#${modalId} form`);
                if (form) {
                    form.addEventListener('submit', function () {
                        const descInput = this.querySelector('#description');
                        if (descInput) {
                            descInput.value = quill.root.innerHTML;
                        }
                    });
                }

                return quill;
            }

            document.addEventListener('DOMContentLoaded', function () {
                // Inisialisasi modal untuk "Tambah"
                initializeQuill('addAnn');

                // Inisialisasi Quill saat modal dibuka (untuk edit)
                document.querySelectorAll('[id^="editAnn"]').forEach(modal => {
                    modal.addEventListener('shown.bs.modal', function () {
                        initializeQuill(this.id);
                    });

                    // Juga inisialisasi untuk modal tambah
                    if (modal.id === 'addAnn') {
                        initializeQuill(this.id);
                    }
                });
            });
        </script>
    @endpush
</x-admin>