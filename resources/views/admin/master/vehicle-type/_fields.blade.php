@php $data = $data ?? null; @endphp

<div class="mb-3">
    <label for="inputJenisKendaraan" class="form-label" style="font-weight: 500;">Jenis Kendaraan <span
            class="text-danger">*</span></label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
        id="inputJenisKendaraan" value="{{ old('name', $data->name ?? '') }}"
        placeholder="Masukan Jenis Kendaraan">

</div>
