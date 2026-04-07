<x-user>
    <div class="content-wrapper" style="margin:100px 100px 0 100px">
        <div class="container-xxl flex-grow-1 container-p-y">

            <!-- ================= RUMAH UTAMA ================= -->
            <h6 class="mb-3 fw-bold text-primary">Rumah Utama</h6>
            @foreach($primaryHouse as $house)
                <h4 class="mb-3 fw-bold text-dark">
                    Blok {{ $house->houses->blocks->name }}
                    No {{ $house->houses->number }}
                </h4>
            @endforeach

            <div class="row g-2">

                @forelse($primarybill as $bill)
                    @php $isPaid = $bill->status == 'paid'; @endphp
                    <div class="col-3 mb-2">
                        <a href="{{ route('finances.payment.pay', $bill->id) }}" class="text-decoration-none">
                            <div class="p-3 rounded-4 border-0 shadow-sm d-flex align-items-center justify-content-between position-relative overflow-hidden mb-3"
                                style="background:{{ $isPaid ? '#5d87ff' : '#ffffff' }}; color:{{ $isPaid ? 'white' : '#5d87ff' }};">

                                <!-- ICON BG -->
                                <i class="ri ri-money-dollar-circle-fill position-absolute"
                                    style="font-size: 80px; right: -10px; bottom: -20px; opacity: 0.1;"></i>

                                <!-- LEFT -->
                                <div class="d-flex align-items-center position-relative">
                                    <div class="bg-white bg-opacity-25 rounded-3 d-flex align-items-center justify-content-center me-3"
                                        style="width: 48px; height: 48px;">
                                        <i class="ri ri-wallet-3-fill fs-4 text-primary"></i>
                                    </div>

                                    <div>
                                        <h6 class="mb-0 {{ $isPaid ? 'text-white' : 'text-dark' }}"
                                            style="font-size: 14px;">
                                            {{ $bill->month }} {{ $bill->year }}
                                        </h6>

                                        <small class="opacity-75" style="font-size: 11px;">
                                            Rp {{ number_format($bill->amount, 0, ',', '.') }}
                                        </small>
                                    </div>
                                </div>

                                <!-- RIGHT -->
                                <div class="text-end position-relative">
                                    <span class="badge {{ $isPaid ? 'bg-light text-dark' : 'bg-warning text-dark' }}">
                                        {{ $isPaid ? 'Lunas' : 'Belum' }}
                                    </span>
                                </div>

                            </div>
                        </a>
                    </div>

                @empty
                    <div class="text-muted fs-7 py-5 text-center">
                        <div style="font-size:32px; opacity:0.5;">
                            <i class="ri ri-money-dollar-box-fill"></i>
                        </div>
                        <p class="mb-1 fw-semibold">Belum ada tagihan</p>
                    </div>
                @endforelse
            </div>

            <!-- ================= RUMAH LAINNYA ================= -->
            <h6 class="mb-3 fw-bold text-primary mt-4">Rumah Lainnya</h6>
            <div class="row g-2">
                @php
                    $groupedBills = $secondarybill->groupBy(function ($bill) {
                        $block = $bill->houses?->blocks?->name ?? 'Tidak diketahui';
                        $number = $bill->houses?->number ?? '-';

                        return 'Blok ' .  $block . ' No ' . $number;
                    });
                @endphp

                @forelse($groupedBills as $blockName => $bills)

                    <!-- JUDUL BLOK -->
                    <h4 class="mb-3 fw-bold text-dark">
                        {{ $blockName }}
                    </h4>

                    <div class="row g-2">
                        @foreach($bills as $bill)
                            @php $isPaid = $bill->status == 'paid'; @endphp

                            <div class="col-3 mb-2">
                                <a href="{{ route('finances.payment.pay', $bill->id) }}" class="text-decoration-none">
                                    <div class="p-3 rounded-4 border border-light-subtle shadow-sm d-flex align-items-center justify-content-between position-relative overflow-hidden mb-3"
                                        style="background:{{ $isPaid ? '#5d87ff' : '#ffffff' }}; color:{{ $isPaid ? 'white' : '#5d87ff' }};"> 

                                        <i class="ri ri-money-dollar-circle-fill position-absolute"
                                            style="font-size: 80px; right: -10px; bottom: -20px; opacity: 0.1;"></i>

                                        <div class="d-flex align-items-center position-relative">
                                            <div class="rounded-3 d-flex align-items-center justify-content-center me-3"
                                                style="width: 48px; height: 48px;">
                                                <i
                                                    class="ri ri-wallet-3-fill fs-4 {{ $isPaid ? 'text-white' : 'text-primary' }}"></i>
                                            </div>

                                            <div>
                                                <h6 class="mb-0" style="font-size: 14px;">
                                                    {{ $bill->month }} {{ $bill->year }}
                                                </h6>

                                                <small class="opacity-75" style="font-size: 11px;">
                                                    Rp {{ number_format($bill->amount, 0, ',', '.') }}
                                                </small>
                                            </div>
                                        </div>

                                        <div class="text-end position-relative">
                                            <span
                                                class="badge {{ $isPaid ? 'bg-light text-primary' : 'bg-warning text-dark' }}">
                                                {{ $isPaid ? 'Lunas' : 'Belum' }}
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>

                @empty
                    <div class="text-muted fs-7 py-5 text-center">
                        <div style="font-size:32px; opacity:0.5;">
                            <i class="ri ri-money-dollar-box-fill"></i>
                        </div>
                        <p class="mb-1 fw-semibold">Belum ada tagihan</p>
                    </div>
                @endforelse
            </div>


        </div>
    </div>
</x-user>