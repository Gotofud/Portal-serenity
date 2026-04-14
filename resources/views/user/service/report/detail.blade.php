<x-user>
    <div class="content-wrapper" style="margin:100px">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
                <a href="{{ route('services.report.index') }}">
                    <div class="btn mt-5">
                        <i class="ri ri-reply-fill text-primary"></i>
                    </div>
                </a>
                <div class="card-header d-flex flex-column align-items-start mx-3 mt-5">
                    <div class="app-brand mb-2">
                        <div class="app-brand-link">
                            <span class="app-brand-logo demo">
                                <img src="{{ asset('assets/img/text-icon.svg') }}">
                            </span>
                        </div>
                    </div>
                    <h4 class="mb-1 mt-2">Surat Pelaporan - Komplek Bojong Malaka Indah</h4>
                    <div class="d-flex justify-content-start gap-5">
                        <div class="text-muted" style="font-size: 15px;">
                            <span class="text-dark fw-bold">Kode : </span>{{ $report->code ?? '-' }}
                            <span class="text-dark fw-bold mx-3">Status Laporan : </span>
                            @if ($report->status == 'Pending')
                                <span class="badge bg-warning text-white">Menunggu</span>
                            @elseif($report->status == 'Diterima')
                                <span class="badge bg-primary text-white">Diterima</span>
                            @elseif($report->status == 'Selesai')
                                <span class="badge bg-success text-white">Selesai</span>
                            @else
                                <span class="badge bg-danger text-white">Ditolak</span>
                            @endif
                        </div>
                    </div>
                </div>
                <hr class="my-4">
                <div class="card-body">
                    <div class="row mb-5 px-3">

                        <!-- SUBJEK -->
                        <div class="row mb-2">
                            <div class="col-sm-3 text-muted small">
                                Subjek
                            </div>
                            <div class="col-sm-9 fw-semibold">
                                {{ $report->subject ?? '-' }}
                            </div>
                        </div>

                        <!-- KATEGORI -->
                        <div class="row mb-2">
                            <div class="col-sm-3 text-muted small">
                                Kategori
                            </div>
                            <div class="col-sm-9 fw-semibold text-danger">
                                {{ $report->ReportCategories->name ?? '-' }}
                            </div>
                        </div>

                        <!-- TANGGAL -->
                        <div class="row mb-2">
                            <div class="col-sm-3 text-muted small">
                                Laporan Masuk
                            </div>
                            <div class="col-sm-9 fw-semibold">
                                {{ $report->created_at->translatedFormat('d M Y, H:i') }} WIB
                            </div>
                        </div>

                    </div>

                    <hr class="my-4">

                    <div class="row px-3">
                        {{-- LEFT SIDE --}}
                        <div class="col-md-6 mb-md-0">
                            <div class="d-flex justify-content-between">
                                <span class="text-muted small">Isi Laporan : </span>
                            </div>
                        </div>
                        <p class="text-dark mb-2 small">{!! $report->description ?? 'Tidak Ada Isi' !!}</p>
                    </div>

                    @if ($report->image)
                        <div class="row mb-5 px-3">
                            <div class="col-12">
                                <small class="text-muted">Lampiran Foto : </small>

                                <div class="mt-2">
                                    <img src="{{ Storage::url($report->image) }}" class="img-fluid rounded shadow-sm w-100"
                                        style="max-height: 400px; object-fit: cover;" alt="Lampiran Foto">
                                </div>
                            </div>

                        </div>
                    @endif



                    {{-- STATUS --}}
                    <div class="mt-4">

                        <div class="mt-3">
                            <small class="text-muted">
                                <span class="text-danger">*</span>
                                Laporan telah diterima dan sedang menunggu tindak lanjut.
                            </small>
                        </div>

                    </div>

                </div>
            </div>
            <!-- Report Header -->

            <!-- Timeline Log -->
            <div class="card mt-4 mb-4">
                <div class="card-header">
                    <h6 class="card-title fw-bold mb-0">Log Laporan</h6>
                </div>
                <div class="card-body">
                    <div class="timeline">
                        <!-- Laporan Dibuat -->
                        <div class="timeline-item">
                            <div class="timeline-point timeline-point-primary"></div>
                            <div class="timeline-event">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="mb-1">Laporan Dibuat</h6>
                                    <small class="text-muted">{{ $report->created_at->translatedFormat('d M Y, H:i') }}
                                        WIB</small>
                                </div>
                                <p class="mb-0 text-muted" style="font-size: 13px;">Laporan masuk ke sistem</p>
                            </div>
                        </div>

                        <!-- Laporan Diterima -->
                        @if ($report->accepted_at)
                            <div class="timeline-item">
                                <div class="timeline-point timeline-point-success"></div>
                                <div class="timeline-event">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="mb-1">Laporan Diterima</h6>
                                        <small class="text-muted">{{ $report->accepted_at->translatedFormat('d M Y, H:i') }}
                                            WIB</small>
                                    </div>
                                    <p class="mb-0 text-muted" style="font-size: 13px;">
                                        {{ $report->acc_reply ?? 'Catatan tidak ada' }}
                                    </p>
                                </div>
                            </div>
                        @endif

                        <!-- Laporan Selesai -->
                        @if ($report->replied_at)
                            <div class="timeline-item">
                                <div class="timeline-point timeline-point-info"></div>
                                <div class="timeline-event">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="mb-1">Laporan Selesai</h6>
                                        <small class="text-muted">{{ $report->replied_at->translatedFormat('d M Y, H:i') }}
                                            WIB</small>
                                    </div>
                                    <p class="mb-0 text-muted" style="font-size: 13px;">
                                        {{ $report->reply ?? 'Catatan tidak ada' }}
                                    </p>
                                </div>
                            </div>
                        @endif

                        <!-- Laporan Ditolak -->
                        @if ($report->rejected_at)
                            <div class="timeline-item">
                                <div class="timeline-point timeline-point-danger"></div>
                                <div class="timeline-event">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="mb-1">Laporan Ditolak</h6>
                                        <small class="text-muted">{{ $report->rejected_at->translatedFormat('d M Y, H:i') }}
                                            WIB</small>
                                    </div>
                                    <p class="mb-0 text-muted" style="font-size: 13px;">
                                        {{ $report->rejected_reply ?? 'Alasan tidak ada' }}
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-user>