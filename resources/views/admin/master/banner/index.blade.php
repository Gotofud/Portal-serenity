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
                                        <h4 class="mb-0">{{ App\Models\Master\Banner::count() }}</h4>
                                        <p class="mb-0">Total Banner </p>
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
                                            {{ App\Models\Master\Banner::where('status', 'Aktif')->count() }}
                                        </h4>
                                        <p class="mb-0">Banner Aktif</p>
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
                                            {{ App\Models\Master\Banner::where('status', 'Nonaktif')->count() }}
                                        </h4>
                                        <p class="mb-0">Banner Nonaktif</p>
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
    <x-partials.admin.form-modal :formRoute=" route('dashboard.banner.store')" id="addBanner"
        icon="ri ri-function-add-line" title="Tambah Data Banner"
        subtitle="Gambar Wajib berukuran Gambar Wajib 3780x1890">
        @include('admin.master.banner._fields')
    </x-partials.admin.form-modal>
    <x-partials.admin.export_modal :exportExcel="null" />
    <div class="card mt-5">
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
                    <a class="btn btn-sm text-white" style="background-color:#2fc692; height:40px;"
                        data-bs-toggle="modal" data-bs-target="#addBanner">
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
                        <th>Banner</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Dibuat</th>
                        <th>Diperbarui</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($banner as $data)
                        <tr>
                            <td>
                                {{ $no++ }}
                            </td>
                            <td><img src="{{ Storage::url($data->image) }}" class="img-fluid"
                                    lass="img-fluid rounded border" alt="Banner Image" style="max-width: 150px;"></td>
                            <td>{{ $data->title  }}</td>
                            <td><span
                                    class="badge bg-{{ $data->status == 'Aktif' ? 'label-primary' : 'label-danger' }} me-1">{{ $data->status }}</span>
                            </td>
                            <td>{{ $data->created_at ? $data->created_at->format('d M Y , H:i') : '-' }}
                            </td>
                            <td>{{ $data->updated_at ? $data->updated_at->format('d M Y , H:i') : '-' }}
                            </td>
                            <td>
                                <a class="btn btn-outline-warning text-warning d-inline-flex align-items-center justify-content-center p-0"
                                    style="height: 40px; width: 40px;" data-bs-toggle="modal"
                                    data-bs-target="#editBanner{{ $data->id }}">
                                    <i class="ri ri-pencil-fill" style="font-size: 15px; line-height: 1;"></i>
                                </a>
                                <a class="btn btn-outline-danger text-danger d-inline-flex align-items-center justify-content-center p-0"
                                    style="height: 40px; width: 40px;" data-bs-toggle="modal" data-bs-target="#addRw">
                                    <i class="ri ri-delete-bin-fill" style="font-size: 15px; line-height: 1;"></i>
                                </a>
                            </td>
                        </tr>
                        <x-partials.admin.form-modal id="editBanner{{ $data->id }}"
                            :formRoute="route('dashboard.banner.update', $data->id)" method="PUT"
                            title="Edit Blok {{ $data->no }}">
                            @include('admin.master.banner._fields', ['data' => $data])
                        </x-partials.admin.form-modal>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin>