<x-admin>
    <div class="row g-5 g-xl-8">

        <!-- Main Content -->
        <div class="col-lg-8">

            <div class="card">
                <div class="card-header d-flex flex-column align-items-start mx-3 mt-5">
                    <div class="app-brand mb-2">
                        <div class="app-brand-link">
                            <span class="app-brand-logo demo">
                                <img src="{{ asset('assets/img/text-icon.svg') }}">
                            </span>
                        </div>
                    </div>
                    <h4 class="mb-1 mt-2">Laporan Masuk - Komplek Bojong Malaka Indah</h4>
                    <div class="d-flex justify-content-start gap-5">
                        <div class="text-muted" style="font-size: 15px;">
                            <span class="text-dark fw-bold">Kode : </span>{{ $report->code ?? '-' }}
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

                    <div class="row mb-5 px-3">
                        <div class="col-12">
                            <small class="text-muted">Lampiran Foto : </small>

                            <div class="mt-2">
                                <img src="https://picsum.photos/800/400" class="img-fluid rounded shadow-sm w-100"
                                    style="max-height: 400px; object-fit: cover;" alt="Lampiran Foto">
                            </div>
                        </div>

                    </div>


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

        <!-- Sidebar -->
        <div class="col-lg-4 ">
            <div class="position-sticky" style="top: 70px;">
                <!-- Info Pelapor -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="card-title fw-bold mb-0">Informasi Pelapor</h6>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4">
                            @if ($report->users->avatar)
                                <img src="{{ $report->users->avatar }}" alt="Avatar" class="rounded-circle me-3" width="50"
                                    height="50" style="object-fit: cover;">
                            @else
                                <div class="avatar avatar-sm bg-light d-flex align-items-center justify-content-center me-3"
                                    style="width: 50px; height: 50px; border-radius: 50%;">
                                    <span
                                        class="fs-4 fw-bold text-white">{{ substr($report->users->name ?? '-', 0, 2) }}</span>
                                </div>
                            @endif
                            <div>
                                <h6 class="mb-0 fw-semibold">{{ $report->users->user_profile->full_name ?? '-' }}</h6>
                                <p class="mb-0 text-muted" style="font-size: 12px;">{{ $report->users->email }}</p>
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-12">
                                <p class="mb-1 text-muted" style="font-size: 12px;">Alamat</p>
                                @if ($report->users->user_house && $report->users->user_house->houses)
                                    <p class="mb-0 fw-semibold">
                                        Blok {{ $report->users->user_house->houses->blocks->name }} No
                                        {{ $report->users->user_house->houses->number }}
                                    </p>
                                @else
                                    <p class="mb-0 fw-semibold">-</p>
                                @endif
                            </div>
                            <div class="col-12">
                                <p class="mb-1 text-muted" style="font-size: 12px;">RW / RT</p>
                                @if ($report->users->user_house && $report->users->user_house->houses)
                                    <p class="mb-0 fw-semibold">
                                        RW {{ $report->users->user_house->houses->communityUnits->no }} RT
                                        {{ $report->users->user_house->houses->neighborhoodUnits->no }}
                                    </p>
                                @else
                                    <p class="mb-0 fw-semibold">-</p>
                                @endif
                            </div>
                            <div class="col-12">
                                <p class="mb-1 text-muted" style="font-size: 12px;">Status</p>
                                <span class="badge bg-label-{{ $report->status == 'Selesai' ? 'success' :
    ($report->status == 'Diterima' ? 'primary' :
        ($report->status == 'Pending' ? 'warning' : 'danger')) }}">
                                    {{ $report->status }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Card -->
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title fw-bold mb-0">Aksi</h6>
                    </div>
                    <div class="card-body">
                        @if ($report->status == 'Pending' && !$report->accepted_at)
                            <button class="btn btn-primary w-100 mb-2" data-bs-toggle="modal" data-bs-target="#acceptModal">
                                <i class="ri ri-check-line me-1"></i> Terima Laporan
                            </button>

                            <button class="btn btn-outline-danger w-100" data-bs-toggle="modal"
                                data-bs-target="#rejectModal">
                                <i class="ri ri-close-line me-1"></i> Tolak Laporan
                            </button>

                        @elseif ($report->status == 'Diterima' && !$report->replied_at)
                            <button class="btn btn-success w-100 mb-2" data-bs-toggle="modal"
                                data-bs-target="#completeModal">
                                <i class="ri ri-check-double-line me-1"></i> Selesaikan Laporan
                            </button>
                        @elseif ($report->status == 'Selesai')
                            <div class="alert alert-success text-center">
                                <i class="ri ri-checkbox-circle-line me-1"></i>
                                Laporan telah selesai diproses
                            </div>

                        @elseif ($report->status == 'Ditolak')
                            <div class="alert alert-danger text-center">
                                <i class="ri ri-close-circle-line me-1"></i>
                                Laporan telah ditolak
                            </div>
                        @endif

                        <a href="{{ route('service.report.index') }}"
                            class="btn btn-sm btn-outline-secondary w-100 mt-3">
                            <i class="ri ri-arrow-left-line me-1"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Accept Report -->
    <div class="modal fade" id="acceptModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Terima Laporan</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('service.report.accept', $report->id) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="accReply" class="form-label">Catatan Penerimaan</label>
                            <textarea class="form-control" id="accReply" name="acc_reply" rows="4"
                                placeholder="Masukkan catatan/respons penerimaan laporan..."></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="ri ri-check-line me-1"></i> Terima
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Complete Report -->
    <div class="modal fade" id="completeModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Selesaikan Laporan</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('service.report.complete', $report->id) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="reply" class="form-label">Catatan Penyelesaian</label>
                            <textarea class="form-control" id="reply" name="reply" rows="4"
                                placeholder="Masukkan catatan/penjelasan penyelesaian laporan..."></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">
                            <i class="ri ri-check-double-line me-1"></i> Selesaikan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Reject Report -->
    <div class="modal fade" id="rejectModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Tolak Laporan</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('service.report.reject', $report->id) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="rejectedReply" class="form-label">Alasan Penolakan</label>
                            <textarea class="form-control" id="rejectedReply" name="rejected_reply" rows="4"
                                placeholder="Masukkan alasan penolakan laporan..."></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">
                            <i class="ri ri-close-line me-1"></i> Tolak
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-admin>