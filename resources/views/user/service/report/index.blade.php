<x-user>
    <section class="container py-5" style="margin:100px 0px 100px 100px">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-5">
            <div>
                <h3 class="fw-bold mb-1">Laporan Warga</h3>
                <p class="text-muted mb-0">Daftar laporan kejadian di lingkungan perumahan</p>
            </div>
            <a href="{{ route('services.report.create') }}" class="btn btn-primary">
                <i class="ri ri-add-fill me-1"></i> Buat Laporan
            </a>
        </div>

        <!-- Laporan List -->
        <div class="row g-4 mt-3">
            <!-- Card 1 -->
            @foreach ($report as $dataReport)
                    <div class="col-md-6 col-lg-4">
                        <div class="card shadow-sm h-100 rounded-4">
                            <div class="card-body d-flex flex-column">
                                <div class="d-flex justify-content-between mb-2">
                                    @if ($dataReport->status == 'Pending')
                                        <span class="badge bg-warning text-white">Menunggu</span>
                                    @elseif($dataReport->status == 'Diterima')
                                        <span class="badge bg-primary text-white">Diterima</span>
                                    @elseif($dataReport->status == 'Selesai')
                                        <span class="badge bg-success text-white">Selesai</span>
                                    @else
                                        <span class="badge bg-danger text-white">Ditolak</span>
                                    @endif
                                    @php
                                        $date = $dataReport->created_at;
                                    @endphp
                                    <small class="text-muted">{{ $date
                ? ($date->diffInDays(now()) <= 2
                    ? $date->diffForHumans()
                    : $date->format('d M Y'))
                : '-' }}</small>
                                </div>
                                <h5 class="fw-bold">{{$dataReport->reportCategories->name}}</h5>
                                <p class="text-muted text-dark opacity-75 small mb-4"
                                    style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                    {{ strip_tags($dataReport->description) }}
                                </p>
                                <div class="d-flex justify-content-end align-items-center">
                                    <a href="{{ route('services.report.show', $dataReport->id) }}"
                                        class="btn btn-sm btn-outline-primary">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-5">
            <div class="d-flex justify-content-center">
                <div class="mt-5">
                    {{ $report->links() }}
                </div>
            </div>
        </div>
    </section>
</x-user>