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

    <div class="card mt-5">
        <h5 class="card-header">Table Basic</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Rw</th>
                        <th>No Rt</th>
                        <th>Nama Kios</th>
                        <th>Jumlah Unit</th>
                        <th>Harga Sewa</th>
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
                    @foreach ($stall_place as $data)
                        <tr>
                            <td>
                                {{ $no++ }}
                            </td>
                            <td>Rw {{ $data->communityUnits->no }}</td>
                            <td>Rt {{ $data->neighborhoodUnits->no }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->stall_unit }} Kios</td>
                            <td>{{ Number::currency($data->rent_amount, 'IDR', 'id') }}</td>label-danger
                                    class="badge bg-{{ $data->status == 'Aktif' ? 'label-primary' : 'danger' }} me-1">{{ $data->status }}</span>
                            </td>
                            <td>{{ $data->created_at ? $data->created_at->format('d M Y , H:i') : '-' }}
                            </td>
                            <td>{{ $data->updated_at ? $data->updated_at->format('d M Y , H:i') : '-' }}
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="icon-base ri ri-more-2-line icon-18px"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);"><i
                                                class="icon-base ri ri-pencil-line icon-18px me-1"></i> Edit</a>
                                        <a class="dropdown-item" href="javascript:void(0);"><i
                                                class="icon-base ri ri-delete-bin-6-line icon-18px me-1"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin>