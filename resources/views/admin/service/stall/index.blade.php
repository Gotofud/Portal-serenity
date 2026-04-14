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
                                        <h4 class="mb-0">{{ App\Models\Service\Stall::count() }}</h4>
                                        <p class="mb-0">Total Kios </p>
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
                                            {{ App\Models\Service\Stall::where('status', 'Aktif')->count() }}
                                        </h4>
                                        <p class="mb-0">Kios Aktif</p>
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
                                            {{ App\Models\Service\Stall::where('status', 'Nonaktif')->count() }}
                                        </h4>
                                        <p class="mb-0">Kios Nonaktif</p>
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
    <x-partials.admin.form-modal :formRoute=" route('dashboard.faq.store')" id="addFaq" icon="ri ri-function-add-line"
        title="Tambah Data Faq" subtitle="Wajib Diisi">
        @include('admin.master.faq._fields')
    </x-partials.admin.form-modal>
    <div class="card mt-5">
        <x-partials.admin.export_modal :exportExcel="route('dashboard.community-unit.export')"
            :exportPdf="route('service.stall.exportPdf')" />
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
                            <option value="Pending">Pending</option>
                            <option value="Nonaktif">Nonaktif</option>
                        </select>

                    </div>

                    <a class="btn btn-sm btn-outline-light text-dark" data-bs-toggle="modal" data-bs-target="#export"
                        style=" height:40px;">
                        <i class="ri ri-download-2-line"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pengguna</th>
                        <th>Nama Kios</th>
                        <th>Status</th>
                        <th>Periode</th>
                        <th>Biaya</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($stall as $data)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            <a href="{{ route('resident.user.show', $data->user_id) }}"
                                                class="text-dark text-decoration-none">
                                                {{ $data->users->user_profile->full_name ?? 'N/A' }}
                                                <br><small class="text-muted text-light"
                                                    style="font-size: 13.5px;">{{ $data->users->email }}</small>
                                            </a>
                                        </td>
                                        <td>{{ $data->stall_place->name}}
                                            <br><small class="text-muted text-light" style="font-size: 13.5px;">Rt
                                                {{ $data->stall_place->neighborhoodUnits->no }} Rw
                                                {{ $data->stall_place->communityUnits->no }}</small>
                                        </td>
                                        <td><span class="badge bg-label-{{ $data->status == 'Aktif' ? 'success' :
                        ($data->status == 'Pending' ? 'primary' :
                            ($data->status == 'Nonaktif' ? 'warning' : 'danger')) }} me-1">{{ $data->status }}</span>
                                        </td>
                                        <!-- Periode -->
                                        <td class="text-center small text-nowrap">
                                            {{ $data->start_date ? $data->start_date->format('d M Y') : '-' }}
                                            <br>
                                            <span class="text-muted">s/d</span>
                                            <br>
                                            {{ $data->end_date ? $data->end_date->format('d M Y') : '-' }}
                                        </td>

                                        <!-- Info (Durasi + Biaya) -->
                                        <td class="text-center">
                                            <div class="small">
                                                {{ $data->duration }} bln
                                            </div>
                                            <div class="fw-semibold text-nowrap">
                                                {{ Number::currency($data->total_cost, 'IDR', 'id') }}
                                            </div>
                                        </td>
                                        <td>
                                            <a class="btn btn-outline-primary text-primary d-inline-flex align-items-center justify-content-center p-0"
                                                style="height: 40px; width: 40px;" href="{{ route('service.stall.show', $data->id) }}">
                                                <i class="ri ri-eye-fill" style="font-size: 15px; line-height: 1;"></i>
                                            </a>
                                            <a class="btn btn-outline-danger text-danger d-inline-flex align-items-center justify-content-center p-0"
                                                style="height: 40px; width: 40px;" data-bs-toggle="modal" data-bs-target="#addRw">
                                                <i class="ri ri-delete-bin-fill" style="font-size: 15px; line-height: 1;"></i>
                                            </a>
                                        </td>
                                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <x-partials.admin.import_modal :downloadRoute="route('dashboard.template.download', 'rw')"
        :importRoute="route('dashboard.faq.import')" />
</x-admin>