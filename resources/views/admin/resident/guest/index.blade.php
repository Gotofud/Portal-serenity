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
                                        <h4 class="mb-0">0</h4>
                                        <p class="mb-0">Total Operator </p>
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
                                            0
                                        </h4>
                                        <p class="mb-0">Operator Aktif</p>
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
                                            0
                                        </h4>
                                        <p class="mb-0">Operator Nonaktif</p>
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
            :exportPdf="route('resident.guest.exportPdf')" />
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
                        <th>Penerima Tamu</th>
                        <th>Kontak Tamu</th>
                        <th>Jumlah Tamu</th>
                        <th>Rumah Tujuan</th>
                        <th>Mengunjungi Pada</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($guest as $data)
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
                            <td>{{ $data->name }} <br><small class="text-muted text-light"
                                    style="font-size: 13.5px;">{{ $data->telephone_num }}</small></td>
                            <td>{{ $data->guest_amount }} Orang<br><small class="text-muted text-light"
                                    style="font-size: 13.5px;">{{ $data->guestTypes->name }}</small></td>
                            <td>
                                Blok {{ $data->houses->blocks->name }} No {{ $data->houses->number }}<br><small
                                    class="text-muted text-light" style="font-size: 12.5px;">Rw
                                    {{ $data->houses->communityUnits->no }} Rt
                                    {{ $data->houses->neighborhoodUnits->no }}
                                </small>
                            </td>
                            <td>{{ $data->created_at->format('d M Y , H:i')  }} WIB
                                <br>
                                <small class="text-muted text-light" style="font-size: 11.5px;">
                                    {{ $data->created_at->diffForHumans() }}
                                </small>
                            </td>
                            <td class="text-center">
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
</x-admin>