@use('Illuminate\Support\Facades\Storage')
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
                                        <h4 class="mb-0">{{ App\Models\Service\Report::count() }}</h4>
                                        <p class="mb-0">Total Laporan</p>
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
                                            {{ App\Models\Service\Report::whereNotNull('replied_at')->count() }}
                                        </h4>
                                        <p class="mb-0">Laporan Selesai</p>
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
                                            {{ App\Models\Service\Report::where('replied_at', null)->count() }}
                                        </h4>
                                        <p class="mb-0">Laporan Belum Selesai</p>
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

    <div class="card mt-5">
        <x-partials.admin.export_modal :exportExcel="route('dashboard.community-unit.export')"
            :exportPdf="route('service.report.exportPdf')" />
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
                            <option value="Selesai">Selesai</option>
                            <option value="Diproses">Diproses</option>
                            <option value="Pending">Pending</option>
                            <option value="Ditolak">Ditolak</option>
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
                        <th class="text-center" style="width: 50px;">No</th>
                        <th>Pelapor</th>
                        <th>Kategori</th>
                        <th>Waktu Laporan</th>
                        <th class="text-center">Status</th>
                        <th>Log Laporan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($report as $data)
                                    <tr class="align-middle">
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>
                                            <a href="{{ route('resident.user.show', $data->user_id) }}"
                                                class="text-dark text-decoration-none">
                                                {{ $data->users->user_profile->full_name ?? 'N/A' }}
                                                <br><small class="text-muted text-light"
                                                    style="font-size: 13.5px;">{{ $data->users->email }}</small>
                                            </a>
                                        </td>
                                        <td>{{ Str::limit($data->reportCategories->name, 20) }}</td>
                                        <td>
                                            {{ $data->created_at->translatedFormat('d M Y, H:i') }} WIB
                                            <br>
                                            <small class="text-muted" style="font-size: 11.5px;">

                                            </small>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge bg-label-{{ $data->status == 'Selesai' ? 'success' :
                        ($data->status == 'Diterima' ? 'primary' :
                            ($data->status == 'Pending' ? 'warning' : 'danger')) }}">
                                                {{ $data->status }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column" style="font-size: 12px;">
                                                <span class="text-primary">Diterima:
                                                    @if($data->accepted_at)
                                                        <span class="text-dark">
                                                            {{ $data->accepted_at->translatedFormat('d M Y, H:i') }} WIB
                                                            <br>
                                                        </span>
                                                    @else
                                                        <span class="text-muted">-</span>
                                                    @endif
                                                </span>
                                                <span class="text-success">Dibalas :
                                                    @if($data->replied_at)
                                                        <span class="text-dark">
                                                            {{ $data->replied_at->translatedFormat('d M Y, H:i') }} WIB
                                                            <br>
                                                        </span>
                                                    @else
                                                        <span class="text-muted">-</span>
                                                    @endif
                                                </span>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-2">
                                                @if ($data->status == 'Diterima')
                                                    <a class="btn btn-outline-primary text-primary d-inline-flex align-items-center justify-content-center p-0"
                                                        style="height: 40px; width: 40px;"
                                                        href="{{ route('service.report.show', $data->id) }}">
                                                        <i class="ri ri-reply-fill" style="font-size: 15px; line-height: 1;"></i>
                                                    </a>
                                                @elseif($data->status == 'Pending')
                                                    <a class="btn btn-outline-warning text-warning d-inline-flex align-items-center justify-content-center p-0"
                                                        style="height: 40px; width: 40px;"
                                                        href="{{ route('service.report.show', $data->id) }}">
                                                        <i class="ri ri-checkbox-circle-fill" style="font-size: 15px; line-height: 1;"></i>
                                                    </a>
                                                @elseif($data->status != 'Diterima' && $data->status != 'Pending')
                                                    <a class="btn btn-outline-primary text-primary d-inline-flex align-items-center justify-content-center p-0"
                                                        style="height: 40px; width: 40px;"
                                                        href="{{ route('service.report.show', $data->id) }}">
                                                        <i class="ri ri-eye-fill" style="font-size: 15px; line-height: 1;"></i>
                                                    </a>
                                                @endif

                                                <a class="btn btn-outline-danger text-danger d-inline-flex align-items-center justify-content-center p-0"
                                                    style="height: 40px; width: 40px;" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal{{ $data->id }}">
                                                    <i class="ri ri-delete-bin-fill" style="font-size: 15px; line-height: 1;"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin>