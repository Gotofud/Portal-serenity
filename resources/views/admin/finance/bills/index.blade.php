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
                                        <h4 class="mb-0">Rp
                                            {{ number_format(App\Models\Finance\Bills::sum('amount'), 0, ',', '.') }}
                                        </h4>
                                        <p class="mb-0">Total IWD</p>
                                        <small class="text-muted text-light" style="font-size: 12.5px;">
                                            dari {{ App\Models\Finance\Bills::count() }} Tagihan
                                        </small>
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
                                            {{ App\Models\Finance\Bills::where('status', 'paid')->count() }} Tagihan
                                        </h4>
                                        <p class="mb-0">IWD Dibayar</p>
                                        <small class="text-muted text-light" style="font-size: 12.5px;">
                                            dari {{ App\Models\Finance\Bills::count() }} Tagihan
                                        </small>
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
                                            {{ App\Models\Finance\Bills::where('status', 'pending')->count() }} Tagihan
                                        </h4>
                                        <p class="mb-0">IWD Belum Dibayar</p>
                                        <small class="text-muted text-light" style="font-size: 12.5px;">
                                            dari {{ App\Models\Finance\Bills::count() }} Tagihan
                                        </small>
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
        <x-partials.admin.export_modal :exportExcel="route('finance.bill.export')" :exportPdf="route('finance.bill.exportPdf')" />
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
                    <form action="{{ route('finance.bill.generate') }}" method="post">
                        <div class="position-relative d-inline-block" style="width:180px;">
                            <i class="ri ri-price-tag-3-line position-absolute"
                                style="left:12px; top:50%; transform:translateY(-50%); font-size:14px; color:#6c757d;">
                            </i>

                            <select id="status" class="form-select form-select-sm"
                                style="border-radius:5px; padding-left:36px;">
                                <option value="" selected>Status Tagihan</option>
                                <option value="Sudah Lunas">Sudah Lunas</option>
                                <option value="Belum Lunas">Belum Lunas</option>
                            </select>

                        </div>

                        <a class="btn btn-sm btn-outline-light text-dark" data-bs-toggle="modal"
                            data-bs-target="#export" style=" height:40px;">
                            <i class="ri ri-download-2-line"></i>
                        </a>
                        <a class="btn btn-sm btn-outline-light text-dark" data-bs-toggle="modal"
                            data-bs-target="#import" style=" height:40px;">
                            <i class="ri ri-upload-2-line"></i>
                        </a>
                        @csrf
                        <button type="submit" class="btn btn-sm text-white"
                            style="background-color:#2fc692; height:40px;">
                            +
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table dataTable">
                <thead>
                    <tr>
                        <th>Periode Tagihan</th>
                        <th>Rumah Warga</th>
                        <th>Biaya</th>
                        <th>Status</th>
                        <th>Jatuh Tempo</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($bill as $data)
                        @php
                            $daysLeft = now()->startOfDay()->diffInDays($data->due_at->startOfDay(), false);
                            $progress = $daysLeft > 7 ? 100 : ($daysLeft > 0 ? ($daysLeft / 7) * 100 : 0);
                            $color = $daysLeft > 7 ? 'primary' : ($daysLeft > 0 ? 'warning' : 'danger');
                        @endphp
                        <tr>
                            <td>
                                {{ $data->month }} {{ $data->year }}
                                <br><small class="text-muted text-light" style="font-size: 12.5px;">
                                    {{ $data->code  }}
                                </small>
                            </td>
                            <td>Blok {{ $data->houses->blocks->name }} No {{ $data->houses->number }}<br><small
                                    class="text-muted text-light" style="font-size: 12.5px;">Rw
                                    {{ $data->houses->communityUnits->no }} Rt
                                    {{ $data->houses->neighborhoodUnits->no }}
                                </small></td>
                            <td>Rp {{ number_format($data->amount ?? 0, 0, ',', '.') }} <br><small
                                    class="text-muted text-light"
                                    style="font-size: 12.5px;">{{ $data->houses->building_Types->name }}
                                </small></td>
                            <td>
                                <span
                                    class="badge bg-{{ $data->status == 'paid' ? 'label-success' : 'label-danger' }} me-1">
                                    @if ($data->status == 'paid')
                                        Sudah Lunas
                                    @else
                                        Belum Lunas
                                    @endif
                                </span>
                            </td>
                            <td> <span class="fw-bold text-{{ $daysLeft > 0 ? 'dark' : 'danger' }}">
                                    {{ $data->due_at ? $data->due_at->format('d M Y') : '-' }}
                                </span>
                                <br><small class="text-muted text-light" style="font-size: 12.5px;">
                                    @if($daysLeft > 0)
                                        ({{ floor($daysLeft) }} hari lagi)
                                    @else
                                        (Terlambat {{ floor(abs($daysLeft)) }} hari)
                                    @endif
                                </small>
                            </td>
                            <td>
                                <a class="btn btn-outline-warning text-warning d-inline-flex align-items-center justify-content-center p-0"
                                    style="height: 40px; width: 40px;" data-bs-toggle="modal"
                                    data-bs-target="#editStatus{{ $data->id }}">
                                    <i class="ri ri-pencil-fill" style="font-size: 15px; line-height: 1;"></i>
                                </a>
                                <a class="btn btn-outline-primary text-primary d-inline-flex align-items-center justify-content-center p-0"
                                    style="height: 40px; width: 40px;" href="{{ route('finance.bill.show',$data->id) }}">
                                    <i class="ri ri-eye-fill" style="font-size: 15px; line-height: 1;"></i>
                                </a>
                                <a class="btn btn-outline-danger text-danger d-inline-flex align-items-center justify-content-center p-0"
                                    style="height: 40px; width: 40px;" data-bs-toggle="modal" data-bs-target="#addRw">
                                    <i class="ri ri-delete-bin-fill" style="font-size: 15px; line-height: 1;"></i>
                                </a>
                            </td>
                        </tr>
                        <x-partials.admin.form-modal id="editStatus{{ $data->id }}"
                            :formRoute="route('finance.bill.update', $data->id)" method="PUT"
                            title="Edit Status Pembayaran" subtitle="Ubah data ini jika pengguna membayar dengan  <br> <b>Cash</b> atau diluar aplikasi <b>Serenity</b>">
                            @include('admin.finance.bills._fields', ['data' => $data])
                        </x-partials.admin.form-modal>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <x-partials.admin.import_modal :downloadRoute="route('finance.bill.export')"
        :importRoute="route('finance.bill.importProcess')" />
</x-admin>