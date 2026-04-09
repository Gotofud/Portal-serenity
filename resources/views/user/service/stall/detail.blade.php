<x-user>
    <section class="section-py px-4 px-md-5">

        <div class="container">



            <div class="row g-4">

                <!-- LEFT: IMAGE -->
                <div class="col-lg-7">
                    <div class="overflow-hidden rounded-4 shadow-sm">
                        <img src="https://picsum.photos/800/500" class="w-100" style="height: 400px; object-fit: cover;"
                            alt="stall">
                    </div>
                </div>

                <!-- RIGHT: DETAIL -->
                <div class="col-lg-5">

                    <div class="p-3 p-md-4 border rounded-4 shadow-sm h-100 d-flex flex-column">

                        <!-- Title -->
                        <h3 class="fw-bold mb-2">{{ $stall->name }}</h3>

                        <!-- Availability -->
                        @php
                            $total = $stall->stall_unit;
                            $rented = $stall->stalls_count;
                            $available = $total - $rented;
                        @endphp


                        <!-- Price -->
                        <div class="fs-4 fw-bold text-primary mb-3">
                            Rp {{ number_format($stall->rent_amount ?? 0, 0, ',', '.') }}
                            <span class="fs-6 fw-normal text-muted">/ bulan</span>
                        </div>

                        <div class="mb-3">
                            <span class="badge badge-sm bg-light text-dark me-2">
                                {{ $total }} Unit Terdaftar
                            </span>

                            @if($available > 0)
                                <span class="badge badge-sm bg-success">
                                    {{ $available }} Tersedia
                                </span>
                            @else
                                <span class="badge badge-sm bg-danger">
                                    Unit Penuh
                                </span>
                            @endif
                        </div>

                        <!-- Divider -->
                        <hr>

                        <!-- Info Tambahan -->
                        <div class="mb-3">
                            <h6 class="fw-bold mb-3">Tentang Kios</h6>
                            <div class="d-flex justify-content-between small mb-2">
                                <span class="text-muted">Tipe</span>
                                <span class="fw-semibold">Kios</span>
                            </div>
                            <div class="d-flex justify-content-between small mb-2">
                                <span class="text-muted">Status</span>
                                <span class="fw-semibold text-success">Aktif</span>
                            </div>
                            <div class="d-flex justify-content-between small mb-2">
                                <span class="text-muted">Unit</span>
                                <span class="fw-semibold">{{ $stall->stall_unit }} Unit</span>
                            </div>

                            <div class="d-flex justify-content-between small">
                                <span class="text-muted">Lokasi</span>
                                <span class="fw-semibold">
                                    RT {{ $stall->neighborhoodUnits->no }} RW
                                    {{ $stall->communityUnits->no }}
                                </span>
                            </div>
                        </div>

                        <!-- CTA -->
                        <div class="mt-auto">
                            @if($available > 0)
                                <a href="#" class="btn btn-primary w-100 rounded-3">
                                    Sewa Sekarang
                                </a>
                            @else
                                <button class="btn btn-secondary w-100 rounded-3" disabled>
                                    Kios Penuh
                                </button>
                            @endif
                        </div>

                    </div>

                </div>

            </div>

            <!-- DESKRIPSI -->
            <div class="row mt-5">
                <div class="col-lg-8">
                    <h5 class="fw-bold mb-3">Penyewa Kios</h5>

                    <div class="list-group list-group-flush">

                        @forelse ($stall->stalls as $rentedStall)
                            <div class="list-group-item px-0 py-3 d-flex align-items-center justify-content-between">

                                <!-- Left: User Info -->
                                <div class="d-flex align-items-center">

                                    <!-- Avatar -->
                                    @if ($rentedStall->users->avatar)
                                        <div
                                            style="width: 45px; height: 45px; border-radius:50%; margin-right:10px;; overflow:hidden; display:flex; align-items:center; justify-content:center;">
                                            <img src="{{ $rentedStall->users->avatar }}" alt="Profile"
                                                style="width: 100%; height: 100%; object-fit: cover; "
                                                referrerpolicy="no-referrer">
                                        </div>
                                    @else
                                        <div class="bg-light d-flex align-items-center justify-content-center"
                                            style="width: 45px; height: 45px; border-radius:50%; margin-right:10px;">

                                            <span class="fs-5 fw-bold text-white">
                                                {{ substr($rentedStall->users->name ?? '-', 0, 2) }}
                                            </span>

                                        </div>
                                    @endif

                                    <!-- Name + Date -->
                                    <div>
                                        <div class="fw-semibold">
                                            {{ $rentedStall->users->user_profile->full_name ?? $rentedStall->users->name }}
                                        </div>
                                        <div class="text-muted text-secondary small">
                                         Menyewa Selama : {{ $rentedStall->duration }} Bulan 
                                        </div>
                                        <div class="text-muted text-secondary small">
                                            {{ $rentedStall->start_date?->format('d M Y') ?? '-' }}
                                            -
                                            {{ $rentedStall->end_date?->format('d M Y') ?? '-' }}
                                        </div>
                                    </div>

                                </div>

                                <!-- Right: Status -->
                                <div>
                                    @if($rentedStall->status == 'Aktif')
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-primary">Selesai</span>
                                    @endif
                                </div>

                            </div>
                        @empty
                            <div class="text-muted mt-3">
                                <i class="ri ri-user-unfollow-fill fs-3 me-3"></i>
                                Belum ada penyewa
                            </div>
                        @endforelse

                    </div>
                </div>
            </div>

        </div>

    </section>
</x-user>