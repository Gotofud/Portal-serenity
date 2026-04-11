<x-user>
    <section id="landingReviews" class="section-py landing-reviews px-5">
        <!-- Card -->
        <div class="row mt-5 px-2">
            @foreach ($stall as $stallData)

                <div class="col-sm-6 col-md-3 mt-5">
                    <a href="{{ route('services.stall.show', $stallData->id) }}" class="text-decoration-none text-dark">
                        <div class="h-100">
                            <!-- Image -->
                            <div class="overflow-hidden rounded-4">
                                <img src="https://picsum.photos/200/300" class="w-100"
                                    style="height: 300px; object-fit: cover;" alt="stall">
                            </div>
                            <!-- Body -->
                            <div class="card-body">
                                <!-- Title -->
                                <h4 class="fw-semibold text-dark mt-2 mb-1 text-truncate">
                                    {{ $stallData->name }}
                                </h4>
                                <!-- Location -->
                                <div class="text-muted text-secondary small mb-2">
                                    <i class="ri ri-map-pin-line me-1"></i>RT {{ $stallData->neighborhoodUnits->no }} RW
                                    {{ $stallData->communityUnits->no }}
                                </div>
                                <!-- Info -->
                                <div class="d-flex gap-3 text-muted text-secondary small mb-2">
                                    @php
                                        $unit = $stallData->stall_unit;
                                        $rented = $stallData->stalls_count;
                                        $total = $unit - $rented
                                    @endphp
                                    <span><i class="ri ri-store-2-line me-1"></i>{{ $stallData->stall_unit }} Unit /
                                        Tersedia {{$total}} Unit</span>
                                </div>
                                <!-- Price -->
                                <div class="fw-bold text-primary">
                                    Rp {{ number_format($stallData->rent_amount ?? 0, 0, ',', '.') }} <span
                                        class="fw-normal text-muted small">/ bulan</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-5">
            {{ $stall->links() }}
        </div>
    </section>
</x-user>