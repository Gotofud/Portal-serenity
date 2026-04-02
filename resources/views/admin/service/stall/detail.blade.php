<x-admin>
    <div class="card">
        <a href="{{ route('service.stall.index') }}">
            <div class="btn mt-5">
                <i class="ri ri-reply-fill text-primary"></i>
            </div>
        </a>
        <div class="card-header d-flex flex-column align-items-start mx-3">
            <div class="app-brand mb-2">
                <div class="app-brand-link">
                    <span class="app-brand-logo demo">
                        <img src="{{ asset('assets/img/text-icon.svg') }}">
                    </span>
                </div>
            </div>
            <h4 class="mb-1 mt-2">Invoice Kios - Komplek Bojong Malaka Indah</h4>
            <div class="d-flex justify-content-start gap-5">
                <div class="text-muted" style="font-size: 15px;">
                    <span class="text-dark fw-bold">Kode : </span>{{ $stall->code ?? '-' }}
                </div>
                <div class="text-muted" style="font-size: 15px;">
                    <span class="text-dark fw-bold">Periode
                        : </span>{{ $stall->start_date ? $stall->start_date->format('d M Y') : '-' }} s/d
                    {{ $stall->end_date ? $stall->end_date->format('d M Y') : '-' }}
                </div>
            </div>
        </div>
        <hr class="my-4">
        <div class="card-body">

            {{-- CUSTOMER + INVOICE INFO --}}
            <div class="row mb-5 px-3">

                {{-- LEFT SIDE --}}
                <div class="col-md-6 mb-4 mb-md-0">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted small">Kode Invoice</span>
                        <span class="fw-semibold text-end">
                            {{ $stall->code ?? '-' }}
                        </span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted small">Ditagihkan Kepada</span>
                        <span class="fw-semibold text-end">
                            {{ $stall->users->user_profile->full_name ?? '-' }}
                        </span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted small">Rumah</span>
                        <span class="fw-semibold text-end">
                            Blok {{ $stall->users->user_house->houses->blocks->name ?? '-' }} No {{ $stall->users->user_house->houses->number ?? '-' }}
                        </span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted small">RT / RW</span>
                        <span class="fw-semibold text-end">
                            RT {{ $stall->users->user_house->houses->communityUnits->no ?? '-' }} RW {{ $stall->users->user_house->houses->neighborhoodUnits->no ?? '-' }}
                        </span>
                    </div>

                </div>

                {{-- RIGHT SIDE --}}
                <div class="col-md-6 border-start ps-md-4">

                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted small">Nama Kios</span>
                        <span class="fw-semibold text-end">
                            {{ $stall->stall_place->name ?? '-' }}
                        </span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted small">RT / RW</span>
                        <span class="fw-semibold text-end">
                             RT {{ $stall->stall_place->communityUnits->no ?? '-' }} RW {{ $stall->stall_place->neighborhoodUnits->no ?? '-' }}
                        </span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted small">Lama Menyewa</span>
                        <span class="fw-semibold text-end">
                            {{ $stall->duration }} Bln
                        </span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted small">Status</span>
                        <span class="fw-semibold text-end">
                            <span class="badge bg-label-{{ $stall->status == 'Aktif' ? 'success' :
                        ($stall->status == 'Pending' ? 'primary' :
                            ($stall->status == 'Nonaktif' ? 'warning' : 'danger')) }}">
                                {{ $stall->status }}
                            </span>
                        </span>
                    </div>

                </div>

            </div>

            <hr class="my-4">

            {{-- TABLE --}}
            <div class="table-responsive mb-4">
                <table class="table align-middle">

                    <thead>
                        <tr class="text-muted small border-bottom">
                            <th>Item Tagihan</th>
                            <th class="text-end">Jumlah</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>
                                <div class="fw-semibold">
                                    Penyewaan Kios 
                                </div>
                            </td>
                            <td class="text-end fw-semibold">
                                Rp {{ number_format($stall->total_cost, 0, ',', '.') }}
                            </td>
                        </tr>


                    </tbody>

                    <tfoot>
                        <tr class="border-top">
                            <td class="fw-semibold pt-3">Total Tagihan</td>
                            <td class="text-end pt-3">
                                <span class="fs-5 fw-bold text-primary">
                                    Rp {{ number_format($stall->total_cost, 0, ',', '.') }}
                                </span>
                            </td>
                        </tr>
                    </tfoot>

                </table>
            </div>

            {{-- STATUS --}}
            <div class="mt-4">



                <div class="mt-3">
                    <small class="text-muted">
                        <span class="text-danger">*</span>
                        Pembayaran dianggap sah setelah dana masuk ke rekening RT.
                    </small>
                </div>

            </div>

        </div>
    </div>
</x-admin>