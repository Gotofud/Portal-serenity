<x-user>
    @php
        $user = Auth::user();
        $house = $user->user_house->houses ?? null;
        if ($house) {
            $agreement = App\Models\Finance\CommunityUnitAggrements::where('building_types_id', $house->building_types_id)->first();
        }
    @endphp
    <div class="content-wrapper py-4 px-4" style="margin:100px 100px 100px 100px">
        <div class="container-xxl">
            <div class="row g-5 g-xl-8">

                {{-- ================= LEFT SIDE ================= --}}
                <div class="col-xl-4">

                    {{-- PROFILE CARD --}}
                    <div class="card mb-5 mb-xl-8">
                        <a href="{{ route('user-dashboard.index') }}">
                            <div class="btn mt-2">
                                <i class="ri ri-reply-fill text-primary"></i>
                            </div>
                        </a>
                        <div class="card-body pt-4 pb-8">

                            {{-- HEADER --}}
                            <div class="d-flex align-items-start mb-6">
                                <!-- Google Avatar -->
                                @if ($user->avatar)
                                    <div
                                        style="width:60px; height:60px; border-radius:50%; margin-right:10px;; overflow:hidden; display:flex; align-items:center; justify-content:center;">
                                        <img src="{{ $user->avatar }}" alt="Profile"
                                            style="width: 100%; height: 100%; object-fit: cover; "
                                            referrerpolicy="no-referrer">
                                    </div>
                                @else
                                    <div class="bg-light d-flex align-items-center justify-content-center"
                                        style="width:60px; height:60px; border-radius:50%; margin-right:10px;">

                                        <span class="fs-3 fw-bold text-white">
                                            {{ substr($user->name ?? '-', 0, 2) }}
                                        </span>

                                    </div>
                                @endif
                                <div class="d-flex flex-column mt-3">
                                    <span class="fs-5 fw-bold mb-1 text-dark">
                                        {{ $user->name }}
                                    </span>
                                    <span class="text-muted" style="font-size:12.5px">
                                        Bergabung {{ $user->created_at?->format('d M Y') }}
                                    </span>
                                </div>
                            </div>
                            <hr>
                            {{-- DETAIL --}}
                            <div class="row g-4">

                                <div class="col-12">
                                    <span class="text-muted" style="font-size:12.5px;">Nama Lengkap</span>
                                    <div class="fw-bold text-dark" style="font-size: 13.5px;">
                                        {{ $user->user_profile->full_name ?? '-' }}
                                    </div>
                                </div>

                                <div class="col-12">
                                    <span class="text-muted" style="font-size:12.5px;">Email</span>
                                    <div class="fw-bold text-dark" style="font-size: 13.5px;">
                                        {{ $user->email ?? '-' }}
                                    </div>
                                </div>

                                <div class="col-12">
                                    <span class="text-muted" style="font-size:12.5px;">Telepon</span>
                                    <div class="fw-bold text-dark" style="font-size: 13.5px;">
                                        {{ $user->user_profile->telephone_num ?? '-' }}
                                    </div>
                                </div>

                                <div class="col-6">
                                    <span class="text-muted d-block mb-1" style="font-size:12.5px;">Verifikasi
                                        Email</span>
                                    <span
                                        class="badge {{ $user->is_verified ? 'bg-label-success' : 'bg-label-warning' }}"
                                        style="font-size:12.5px;">
                                        {{ $user->is_verified ? 'Sudah' : 'Belum' }}
                                    </span>
                                </div>

                                <div class="col-6">
                                    <span class="text-muted d-block mb-1" style="font-size:12.5px;">Status Akun</span>
                                    <span class="badge {{ $user->status ? 'bg-label-success' : 'bg-label-danger' }}">
                                        {{ $user->status ? 'Aktif' : 'Nonaktif' }}
                                    </span>
                                </div>

                                @if ($user->google_id)
                                    <div class="col-12">
                                        <div
                                            class="text-dark border fw-normal d-flex align-items-center justify-content-center rounded-2 py-4 mt-5">
                                            <img src="{{ asset('assets/img/icons/google-icon.svg') }}"
                                                class="img-fluid me-2" width="18" height="18">
                                            <span class="flex-shrink-0">Terhubung dengan Google</span>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-12">
                                        <div
                                            class="text-dark border fw-normal d-flex align-items-center justify-content-center rounded-2 py-4 mt-5">
                                            <img src="{{ asset('assets/img/icons/email-icon.svg') }}" class="img-fluid me-2"
                                                width="18" height="18">
                                            <span class="flex-shrink-0">Masuk dengan Email</span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- PROFIL DETAIL --}}
                    <div class="card mb-5">
                        <div class="card-header mb-0">
                            <h5 class="card-title fw-bold text-dark">
                                Informasi Profil
                            </h5>
                            <hr>
                        </div>
                        <div class="card-body">
                            @if ($user->user_profile)
                                <div class="row g-4">
                                    <div class="col-12">
                                        <span class="text-muted d-block mb-1" style="font-size:12.5px;">NIK</span>
                                        <div class="fw-bold text-dark" style="font-size: 13.5px;">
                                            {{ $user->user_profile->nik ?? '-' }}
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <span class="text-muted d-block mb-1" style="font-size:12.5px;">NKK</span>
                                        <div class="fw-bold text-dark" style="font-size: 13.5px;">
                                            {{ $user->user_profile->nkk ?? '-' }}
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <span class="text-muted d-block mb-1" style="font-size:12.5px;">Status
                                            Keluarga</span>
                                        <div class="fw-bold text-dark" style="font-size: 13.5px;">
                                            {{ $user->user_profile->family_status ?? '-' }}
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <span class="text-muted d-block mb-1"
                                            style="font-size:12.5px;">Kewarganegaraan</span>
                                        <div class="fw-bold text-dark" style="font-size: 13.5px;">
                                            {{ $user->user_profile->citizenship ?? '-' }}
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <span class="text-muted d-block mb-1" style="font-size:12.5px;">Agama</span>
                                        <div class="fw-bold text-dark" style="font-size: 13.5px;">
                                            {{ $user->user_profile->religion ?? '-' }}
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <span class="text-muted d-block mb-1" style="font-size:12.5px;">Jenis Kelamin</span>
                                        <div class="fw-bold text-dark" style="font-size: 13.5px;">
                                            {{ $user->user_profile->gender ?? '-' }}
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <span class="text-muted d-block mb-1" style="font-size:12.5px;">Tempat Lahir</span>
                                        <div class="fw-bold text-dark" style="font-size: 13.5px;">
                                            {{ $user->user_profile->pob ?? '-' }}
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <span class="text-muted d-block mb-1" style="font-size:12.5px;">Tanggal Lahir</span>
                                        <div class="fw-bold text-dark" style="font-size: 13.5px;">
                                            {{ $user->user_profile->bod ? $user->user_profile->bod->format('d M Y') : '-' }}
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="text-muted fs-7 py-5 text-center">
                                    <div style="font-size:32px; margin:0 auto 12px; opacity:0.5;"><i
                                            class="ri ri-profile-line"></i>
                                    </div>
                                    <p class="mb-1 fw-semibold">Data profil belum tersedia</p>
                                    <small>Silakan lengkapi informasi profil pengguna.</small>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- ================= RIGHT SIDE ================= --}}
                <div class="col-xl-8">

                    {{-- INFORMASI RUMAH --}}
                    <div class="card mb-5 mb-xl-8">
                        <div class="card-header border-0 pt-6">
                            <h5 class="card-title fw-bold text-dark">
                                Informasi Rumah
                            </h5>
                        </div>

                        <div class="card-body pt-2 pb-8">
                            @if ($user->user_house && $user->user_house->is_primary == 'Rumah Utama')

                                <div class="row g-6">

                                    <div class="col-md-4">
                                        <span class="text-muted d-block mb-1" style="font-size:12.5px;">Blok / Nomor</span>
                                        <div class="fw-bold text-dark" style="font-size: 13.5px;">
                                            Block {{ $user->user_house->houses->blocks->name }} NO
                                            {{ $user->user_house->houses->number }}
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <span lass="text-muted d-block mb-1" style="font-size:12.5px;">Pemilik Rumah</span>
                                        <div class="fw-bold text-dark" style="font-size: 13.5px;">
                                            {{ $user->name }}
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <span lass="text-muted d-block mb-1" style="font-size:12.5px;">Status</span>
                                        <div class="fw-bold text-dark" style="font-size: 13.5px;">
                                            {{ $user->user_house->status }}
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <span lass="text-muted d-block mb-1" style="font-size:12.5px;">Jenis Bangunan</span>
                                        <div class="fw-bold text-dark" style="font-size: 13.5px;">
                                            {{ $user->user_house->houses->building_Types->name }}
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <span lass="text-muted d-block mb-1" style="font-size:12.5px;">Iuran</span>
                                        <div class="fw-bold text-dark" style="font-size: 13.5px;">
                                            Rp {{ number_format($agreement->bill_amount ?? 0, 0, ',', '.') }}
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <span lass="text-muted d-block mb-1" style="font-size:12.5px;">Jumlah
                                            Penghuni</span>
                                        <div class="fw-bold text-dark" style="font-size: 13.5px;">
                                            {{ $user->user_house->total_resident ?? 0 }} Orang
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <span lass="text-muted d-block mb-1" style="font-size:12.5px;">Terdaftar
                                            Sejak</span>
                                        <div class="fw-bold text-dark" style="font-size: 13.5px;">
                                            {{ $user->user_house->created_at?->format('d M Y') }}
                                        </div>
                                    </div>


                                </div>

                            @else
                                <div class="text-muted fs-7 py-5 text-center">
                                    <div style="font-size:32px; margin:0 auto 12px; opacity:0.5;"><i
                                            class="ri ri-home-2-line"></i>
                                    </div>
                                    <p class="mb-1 fw-semibold">Belum ada data rumah</p>
                                    <small>Rumah belum dikaitkan dengan pengguna ini.</small>
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- KENDARAAN --}}
                    <div class="card mb-5 mb-xl-8">
                        <div class="card-header border-0 pt-6">
                            <h5 class="card-title fw-bold text-dark">
                                Daftar Kendaraan
                            </h5>
                        </div>

                        <div class="card-body">
                            @if ($user->user_vehicle && $user->user_vehicle->isNotEmpty())
                                <div class="row mb-3 border-bottom pb-2">
                                    <div class="col-1"><span class="text-muted" style="font-size:12.5px;">#</span></div>
                                    <div class="col-3"><span class="text-muted" style="font-size:12.5px;">Jenis
                                            Kendaraan</span></div>
                                    <div class="col-4"><span class="text-muted" style="font-size:12.5px;">Plat Nomor</span>
                                    </div>
                                    <div class="col-4"><span class="text-muted" style="font-size:12.5px;">Ditambahkan
                                            Pada</span></div>
                                </div>

                                @foreach ($user->user_vehicle as $vehicle)
                                    <div class="row mb-3 align-items-center">
                                        <div class="col-1">
                                            <div class="fw-bold text-dark" style="font-size: 13.5px;">
                                                {{ $loop->iteration }}
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="fw-bold text-dark" style="font-size: 13.5px;">
                                                {{ $vehicle->vehicleTypes->name }}
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="fw-bold text-dark" style="font-size: 13.5px;">
                                                {{ $vehicle->plate_number }}
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="fw-bold text-dark" style="font-size: 13.5px;">
                                                {{ $vehicle->created_at?->format('d M Y') }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="text-muted fs-7 py-5 text-center">
                                    <div style="font-size:32px; margin:0 auto 12px; opacity:0.5;"><i
                                            class="ri ri-e-bike-2-line"></i></div>
                                    <p class="mb-1 fw-semibold">Belum ada kendaraan terdaftar</p>
                                    <small>Pengguna belum mendaftarkan kendaraan apapun.</small>
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- RUMAH LAIN --}}
                    <div class="card mb-5 mb-xl-8">
                        <div class="card-header border-0 pt-6">
                            <h5 class="card-title fw-bold text-dark">
                                Rumah Lain Yang Dimiliki
                            </h5>
                        </div>

                        <div class="card-body pt-2 pb-8">
                            @php
                                // Ambil semua rumah user yang bukan rumah utama
                                $otherHouses = App\Models\User\UsersHouse::where('user_id', $user->id)
                                    ->where('is_primary', 'Rumah Lainnya')
                                    ->with('houses.blocks', 'houses.building_Types')
                                    ->get();
                            @endphp

                            @if ($otherHouses && $otherHouses->count() > 0)
                                <div class="row mb-3 border-bottom pb-2">
                                    <div class="col-1"><span class="text-muted" style="font-size:12.5px;">#</span></div>
                                    <div class="col-3"><span class="text-muted" style="font-size:12.5px;">Blok /
                                            Nomor</span>
                                    </div>
                                    <div class="col-2"><span class="text-muted" style="font-size:12.5px;">Jenis
                                            Bangunan</span>
                                    </div>
                                    <div class="col-2"><span class="text-muted" style="font-size:12.5px;">Status</span>
                                    </div>
                                    <div class="col-2"><span class="text-muted" style="font-size:12.5px;">Penghuni</span>
                                    </div>
                                    <div class="col-2"><span class="text-muted" style="font-size:12.5px;">Terdaftar
                                            Sejak</span>
                                    </div>
                                </div>

                                @foreach ($otherHouses as $house)
                                    <div class="row mb-3 align-items-center">
                                        <div class="col-1">
                                            <div class="fw-bold text-dark" style="font-size: 13.5px;">
                                                {{ $loop->iteration }}
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="fw-bold text-dark" style="font-size: 13.5px;">
                                                @if ($house->houses && $house->houses->blocks)
                                                    Block {{ $house->houses->blocks->name }} NO {{ $house->houses->number }}
                                                @else
                                                    -
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-2">
                                            <div class="fw-bold text-dark" style="font-size: 13.5px;">
                                                @if ($house->houses && $house->houses->building_Types)
                                                    {{ $house->houses->building_Types->name }}
                                                @else
                                                    -
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-2">
                                            <span
                                                class="badge {{ $house->status === 'Aktif' ? 'bg-label-success' : ($house->status === 'Disewakan' ? 'bg-label-info' : 'bg-label-warning') }}"
                                                style="font-size: 12.5px;">
                                                {{ $house->status }}
                                            </span>
                                        </div>

                                        <div class="col-2">
                                            <div class="fw-bold text-dark" style="font-size: 13.5px;">
                                                {{ $house->total_resident ?? 0 }} Orang
                                            </div>
                                        </div>

                                        <div class="col-2">
                                            <div class="fw-bold text-dark" style="font-size: 13.5px;">
                                                {{ $house->created_at?->format('d M Y') ?? '-' }}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="text-muted fs-7 py-5 text-center">
                                    <div style="font-size:32px; margin:0 auto 12px; opacity:0.5;"><i
                                            class="ri ri-building-line"></i></div>
                                    <p class="mb-1 fw-semibold">Tidak ada rumah lain yang dimiliki</p>
                                    <small>Pengguna hanya memiliki satu rumah utama.</small>
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-user>