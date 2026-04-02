@php 
    $data = $data ?? null; 
@endphp

{{-- Nama Banner --}}
<div class="mb-3">
    <label for="title" class="form-label fw-semibold">
        Nama Banner <span class="text-danger">*</span>
    </label>
    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
        value="{{ old('title', $data->title ?? '') }}" placeholder="Masukkan Nama Banner">
    @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="row">
    <div class="col-md-6">
        @if(isset($data?->image))
            <div class="mb-3">
                <small class="text-muted d-block mb-2">Foto saat ini:</small>
                <img src="{{ asset('storage/' . $data->image) }}" class="img-fluid rounded border" alt="Banner Image"
                    style="max-width: 250px;">
            </div>
        @endif
    </div>
    <div class="{{ isset($data?->image) ? 'col-md-6' : ' ' }} mb-3">
        <label for="image" class="form-label fw-semibold">
            Upload Banner <span class="text-danger">*</span>
        </label>
        <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
         @if(isset($data?->image))
         <small class="text-muted d-block mt-2"><span class="text-danger">*</span>Ukuran Gambar Wajib 3780x1890</small>
         @endif
        @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
{{-- Tanggal --}}
<div class="row">
    <div class="col-md-6 mb-3">
        <label for="start_at" class="form-label fw-semibold">
            Tanggal Mulai <span class="text-danger">*</span>
        </label>
        <input type="datetime-local" name="start_at" id="start_at"
            class="form-control @error('start_at') is-invalid @enderror"
            value="{{ old('start_at', isset($data->start_at) ? $data->start_at->format('Y-m-d\TH:i') : '') }}">
        @error('start_at')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label for="expired_at" class="form-label fw-semibold">
            Tanggal Berakhir <span class="text-danger">*</span>
        </label>
        <input type="datetime-local" name="expired_at" id="expired_at"
            class="form-control @error('expired_at') is-invalid @enderror"
            value="{{ old('expired_at', isset($data->expired_at) ? $data->expired_at->format('Y-m-d\TH:i') : '') }}">
        @error('expired_at')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

{{-- Status --}}
<div class="mb-4">
    <label for="status" class="form-label fw-semibold">
        Status <span class="text-danger">*</span>
    </label>
    <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
        <option value="">Pilih Status</option>
        <option value="Aktif" {{ old('status', $data->status ?? '') == 'Aktif' ? 'selected' : '' }}>
            Aktif
        </option>
        <option value="Nonaktif" {{ old('status', $data->status ?? '') == 'Nonaktif' ? 'selected' : '' }}>
            Nonaktif
        </option>
    </select>
    @error('status')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>