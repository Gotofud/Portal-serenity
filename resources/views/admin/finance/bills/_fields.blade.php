@php $data = $data ?? null; @endphp

<div class="row g-4 mb-5">
    <div class="col-4">
        <span class="text-muted d-block mb-1" style="font-size:12.5px;">Nomor Tagihan</span>
        <div class="fw-bold text-dark" style="font-size: 13.5px;">
            {{ $data->code ?? '-' }}
        </div>
    </div>
    <div class="col-4">
        <span class="text-muted d-block mb-1" style="font-size:12.5px;">Periode</span>
        <div class="fw-bold text-dark" style="font-size: 13.5px;">
            Bulan {{ $data->month ?? '-' }}, {{ $data->year ?? '-' }}
        </div>
    </div>
    <div class="col-4">
        <span class="text-muted d-block mb-1" style="font-size:12.5px;">Biaya IWD</span>
        <div class="fw-bold text-dark" style="font-size: 13.5px;">
            Rp {{ number_format($data->amount ?? 0, 0, ',', '.') }}
        </div>
    </div>
    <div class="col-4">
        <span class="text-muted d-block mb-1" style="font-size:12.5px;">Jenis Bangunan</span>
        <div class="fw-bold text-dark" style="font-size: 13.5px;">
            {{ $data->houses->building_Types->name }}
        </div>
    </div>
    <div class="col-6">
        <span class="text-muted d-block mb-1" style="font-size:12.5px;">Rumah</span>
        <div class="fw-bold text-dark" style="font-size: 13.5px;">
            Blok {{ $data->houses->blocks->name }} No {{ $data->houses->number }}
            RW{{ $data->houses->communityUnits->no }} RT{{ $data->houses->neighborhoodUnits->no }}
        </div>
    </div>
    <div class="col-4">
        <span class="text-muted d-block mb-1" style="font-size:12.5px;">Jatuh Tempo</span>
        <span class="fw-bold text-{{ $daysLeft > 0 ? 'dark' : 'danger' }}" style="font-size: 13.5px;">
            {{ $data->due_at ? $data->due_at->format('d M Y') : '-' }}
        </span>
    </div>
    <div class="col-6">
        <span class="text-muted d-block mb-1" style="font-size:12.5px;">Status</span>
        <span class="badge bg-{{ $data->status == 'paid' ? 'label-success' : 'label-danger' }} me-1">
            @if ($data->status == 'paid')
                Sudah Lunas
            @else
                Belum Lunas
            @endif
        </span>
    </div>
</div>
<hr>
<div class="row mt-3">
    <div class="col-6">
        <div class="mb-3 mt-3">
            <label for="file" class="form-label" style="font-weight: 500;">
                Upload Bukti Pembayaran <span class="text-danger">*</span>
            </label>

            <input type="file" name="file" id="file" class="form-control @error('file') is-invalid @enderror">

            @if(isset($data->file))
                <div class="form-text mt-2">
                    <small>File saat ini:
                        <a href="{{ asset('storage/' . $data->file) }}" target="_blank" class="text-decoration-none">
                            Lihat File Terupload
                        </a>
                    </small>
                </div>
            @endif

            @error('file')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-6">
        <div class="mb-3 mt-3">
            <label for="paid_at" class="form-label" style="font-weight: 500;">
                Tanggal Pembayaran <span class="text-danger">*</span>
            </label>

            <input type="datetime-local" name="paid_at" id="paid_at"
                class="form-control @error('paid_at') is-invalid @enderror"
                value="{{ old('paid_at', isset($data->paid_at) ? $data->paid_at->format('Y-m-d') : '') }}">

            @error('paid_at')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
</div>



<div class="mb-5">
    <label for="inputStatus" class="form-label" style="font-weight: 500;">Status Pembayaran<span
            class="text-danger">*</span></label>
    <select class="form-select @error('status') is-invalid @enderror" name="status" id="inputStatus">
        <option value="" selected>Pilih Status</option>
        <option value="paid" {{ old('status', $data->status ?? '') == 'paid' ? 'selected' : '' }}>
            Sudah Lunas
        </option>
        <option value="pending" {{ old('status', $data->status ?? '') == 'pending' ? 'selected' : '' }}>
            Belum Lunas
        </option>
    </select>
</div>