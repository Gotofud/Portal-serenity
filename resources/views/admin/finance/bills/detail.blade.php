<x-admin>
    @php
        $daysLeft = now()->startOfDay()->diffInDays($bill->due_at->startOfDay(), false);
        $progress = $daysLeft > 7 ? 100 : ($daysLeft > 0 ? ($daysLeft / 7) * 100 : 0);
        $color = $daysLeft > 7 ? 'primary' : ($daysLeft > 0 ? 'warning' : 'danger');
    @endphp
    <div class="card">
        <a href="{{ route('finance.bill.index') }}">
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
            <h4 class="mb-1 mt-2">Invoice IWD - Komplek Bojong Malaka Indah</h4>
            <div class="d-flex justify-content-start gap-5">
                <div class="text-muted" style="font-size: 15px;">
                    <span class="text-dark fw-bold">Kode : </span>{{ $bill->code ?? '-' }}
                </div>
                <div class="text-muted" style="font-size: 15px;">
                    <span class="text-dark fw-bold">Periode : </span>{{ $bill->month }} {{ $bill->year }}
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
                            {{ $bill->code ?? '-' }}
                        </span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted small">Ditagihkan Kepada</span>
                        <span class="fw-semibold text-end">
                            {{ $house->users_houses->first()->users->user_profile->full_name ?? $house->users_houses->first()->users->name }}
                        </span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted small">Rumah</span>
                        <span class="fw-semibold text-end">
                            Blok {{ $bill->houses->blocks->name }} No. {{ $bill->houses->number }}
                        </span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted small">RT / RW</span>
                        <span class="fw-semibold text-end">
                            RT {{ $bill->houses->neighborhoodUnits->no }}
                            / RW {{ $bill->houses->communityUnits->no }}
                        </span>
                    </div>

                </div>

                {{-- RIGHT SIDE --}}
                <div class="col-md-6 border-start ps-md-4">

                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted small">Tipe Bangunan</span>
                        <span class="fw-semibold text-end">
                            {{ $bill->houses->building_Types->name }}
                        </span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted small">Periode</span>
                        <span class="fw-semibold text-end">
                            {{ $bill->month }} {{ $bill->year }}
                        </span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted small">Jatuh Tempo</span>
                        <span class="fw-semibold text-end">
                            {{ $bill->due_at ? $bill->due_at->format('d M Y') : '-' }}
                        </span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted small">Status</span>
                        <span class="fw-semibold text-end">
                            <span class="badge bg-{{ $bill->status == 'paid' ? 'label-success' : 'label-danger' }}">
                                @if ($bill->status == 'paid')
                                    Sudah Lunas
                                @else
                                    Belum Lunas
                                @endif
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
                                    Iuran Wajib Daerah RW{{ $bill->houses->communityUnits->no }}
                                </div>
                            </td>
                            <td class="text-end fw-semibold">
                                Rp {{ number_format($bill->amount, 0, ',', '.') }}
                            </td>
                        </tr>

                        @if($bill->penalty)
                            <tr>
                                <td>
                                    <div class="fw-semibold text-danger">Denda Keterlambatan</div>
                                    <small class="text-muted">
                                        Terlambat {{ $bill->days_late }} hari
                                    </small>
                                </td>
                                <td class="text-end fw-semibold text-danger">
                                    Rp {{ number_format($bill->penalty, 0, ',', '.') }}
                                </td>
                            </tr>
                        @endif
                    </tbody>

                    <tfoot>
                        <tr class="border-top">
                            <td class="fw-semibold pt-3">Total Tagihan</td>
                            <td class="text-end pt-3">
                                <span class="fs-5 fw-bold text-primary">
                                    Rp {{ number_format($bill->amount + ($bill->penalty ?? 0), 0, ',', '.') }}
                                </span>
                            </td>
                        </tr>
                    </tfoot>

                </table>
            </div>

            {{-- STATUS --}}
            <div class="mt-4">

                @if($bill->paid_at)
                    <div class="d-flex align-items-start gap-3 p-3 rounded-3 bg-success-subtle">
                        <i class="bx bx-check-circle text-success fs-4"></i>
                        <div>
                            <div class="fw-semibold text-success">
                                Pembayaran Berhasil
                            </div>
                            <div class="text-muted small">
                                {{ $bill->paid_at->format('d F Y H:i') }}
                                • @if ($bill->paid_at && $bill->file)
                                    Sistem Manual (Admin)
                                @else
                                    Sistem Aplikasi
                                @endif
                            </div>
                        </div>
                    </div>

                @elseif(!$bill->paid_at && $bill->status == 'pending')
                    <div class="d-flex justify-content-between align-items-center p-3 rounded-3 bg-primary-subtle">
                        <div>
                            <div class="fw-semibold text-primary">
                                Menunggu Pembayaran
                            </div>
                            <div class="text-muted small">
                                Silakan selesaikan pembayaran Anda
                            </div>
                        </div>
                        <button data-bs-toggle="modal" data-bs-target="#editStatus{{ $bill->id }}"
                            class="btn btn-sm btn-primary">
                            Bayar Manual
                        </button>
                    </div>
                @endif

                <div class="mt-3">
                    <small class="text-muted">
                        <span class="text-danger">*</span>
                        Pembayaran dianggap sah setelah dana masuk ke rekening RT.
                    </small>
                </div>

            </div>

        </div>
    </div>

    <x-partials.admin.form-modal id="editStatus{{ $bill->id }}" :formRoute="route('finance.bill.update', $bill->id)"
        method="PUT" title="Edit Status Pembayaran"
        subtitle="Ubah data ini jika pengguna membayar dengan  <br> <b>Cash</b> atau diluar aplikasi <b>Serenity</b>">
        @include('admin.finance.bills._fields', ['data' => $bill])
    </x-partials.admin.form-modal>
</x-admin>