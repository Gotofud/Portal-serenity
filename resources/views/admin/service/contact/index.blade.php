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
                                        <h4 class="mb-0">{{ App\Models\Service\Contact::count() }}</h4>
                                        <p class="mb-0">Total Kontak </p>
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
                                            {{ App\Models\Service\Contact::whereNotNull('replied_at')->count() }}
                                        </h4>
                                        <p class="mb-0">Kontak Terjawab</p>
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
                                            {{ App\Models\Service\Contact::where('replied_at', null)->count() }}
                                        </h4>
                                        <p class="mb-0">Kontak Belum Terjawab</p>
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
        <x-partials.admin.export_modal :exportExcel="route('dashboard.community-unit.export')" />
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
                            <option value="Dibalas">Dibalas</option>
                            <option value="Belum Dibalas">Belum Dibalas</option>
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
                        <th>Nama Pengirim</th>
                        <th>Status</th>
                        <th>Dikirim</th>
                        <th>Dibalas</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($contact as $data)
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td>{{ $data->name }} <br><small class="text-muted text-light"
                                    style="font-size: 13.5px;">{{ $data->email }}</small>
                            <td>
                                @if ($data->replied_at)
                                    <span class="badge bg-label-success">Dibalas</span>
                                @else
                                    <span class="badge bg-label-warning">Belum Dibalas</span>
                                @endif
                            </td>
                            <td>{{ $data->created_at->translatedFormat('d M Y, H:i')}} WIB
                                <br><small class="text-muted text-light"
                                    style="font-size: 11.5px;">{{ $data->created_at->diffForHumans() }}</small>
                            </td>
                            <td>@if($data->replied_at)
                                {{ $data->replied_at->translatedFormat('d M Y, H:i') . ' WIB' }}
                                <br>
                                <small class="text-muted text-light" style="font-size: 11.5px;">
                                    {{ $data->replied_at->diffForHumans() }}
                                </small>
                            @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                @if (!$data->replied_at)
                                    <a class="btn btn-outline-primary text-primary d-inline-flex align-items-center justify-content-center p-0"
                                        style="height: 40px; width: 40px;"
                                        href="{{ route('service.contact.reply', $data->id)  }}">
                                        <i class="ri ri-reply-fill" style="font-size: 15px; line-height: 1;"></i>
                                    </a>
                                @else
                                    <a class="btn btn-outline-warning text-warning d-inline-flex align-items-center justify-content-center p-0"
                                        style="height: 40px; width: 40px;"
                                        href="{{ route('service.contact.show', $data->id)  }}">
                                        <i class="ri ri-eye-fill" style="font-size: 15px; line-height: 1;"></i>
                                    </a>
                                @endif
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
        :importRoute="route('dashboard.community-unit.import')" />
</x-admin>