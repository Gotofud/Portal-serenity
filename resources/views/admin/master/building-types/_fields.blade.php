@php $data = $data ?? null; @endphp

<div class="mb-3">
    <label for="inputJenisBangunan" class="form-label" style="font-weight: 500;">Jenis Bangunan <span
            class="text-danger">*</span></label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
        id="inputJenisBangunan" value="{{ old('name', $data->name ?? '') }}"
        placeholder="Masukan Jenis Bangunan">
</div>
