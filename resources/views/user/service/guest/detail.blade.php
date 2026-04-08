<x-user>
    <div class="content-wrapper" style="margin:100px">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
                <a href="{{ url()->previous() }}">
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
                    <h4 class="mb-1 mt-2">Laporan Tamu - Komplek Bojong Malaka Indah</h4>
                    <div class="d-flex justify-content-start gap-5">
                        <div class="text-muted" style="font-size: 15px;">
                            Detail data kunjungan tamu di Komplek Bojong Malaka Indah
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
                                <span class="text-muted small">Penerima Tamu</span>
                                <span class="fw-semibold text-end">
                                    {{ $guest->users->user_profile->full_name }}
                                </span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted small">Kontak</span>
                                <span class="fw-semibold text-end">
                                    {{ $guest->users->user_profile->telephone_num }}
                                </span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted small">Rumah</span>
                                <span class="fw-semibold text-end">
                                    Blok {{ $guest->houses->blocks->name }} No {{ $guest->houses->number }}
                                </span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted small">RT / RW</span>
                                <span class="fw-semibold text-end">
                                    RT {{ $guest->houses->neighborhoodUnits->no }} RW
                                    {{ $guest->houses->CommunityUnits->no }}
                                </span>
                            </div>

                        </div>

                        {{-- RIGHT SIDE --}}
                        <div class="col-md-6 border-start ps-md-4">

                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted small">Perwakilan Tamu</span>
                                <span class="fw-semibold text-end">
                                    {{ $guest->name }}
                                </span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted small">Kontak</span>
                                <span class="fw-semibold text-end">
                                    {{ $guest->telephone_num }}
                                </span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted small">Jumlah Tamu</span>
                                <span class="fw-semibold text-end">
                                    {{ $guest->guest_amount }} Orang
                                </span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted small">Waktu</span>
                                <span class="fw-semibold text-end">
                                    {{ $guest->created_at?->format('d M Y, H:i') ?? '-' }} WIB
                                </span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted small">Tipe Tamu</span>
                                <span class="fw-semibold text-end">
                                    {{ $guest->guestTypes->name }}
                                </span>
                            </div>

                        </div>

                    </div>

                    <hr class="my-4">

                    <div class="mt-3">
                        <small class="text-muted">
                            <span class="text-danger">*</span>
                            Pelaporan tamu dianggap sah jika ada bukti laporan tamu di  <b>Serenity</b>.
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-user>