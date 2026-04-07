@php $data = $data ?? null; @endphp

<div class="row">
    <div class="col-md-6 mb-3">
        <label for="inputNama" class="form-label" style="font-weight: 500;">Plat Nomor <span
                class="text-danger">*</span></label>
        <input type="text" name="plate_number" class="form-control @error('plate_number') is-invalid @enderror"
            id="inputNama" value="{{ old('plate_number', $data->plate_number ?? '') }}"
            placeholder="Masukan Plat Nomor">
    </div>
    <div class="col-md-6 mb-3">
        <label for="exampleInputname" class="form-label">Jenis Kendaraan<span class="text-danger">*</span></label>
        <select class="form-select @error('vehicle_types') is-invalid @enderror " name="vehicle_types"
            aria-label="Default select example">
            <option value=" " selected>Pilih Jenis Kendaraan</option>
            @foreach ($vehicleTypes as $types)
                <option value="{{ $types->id }}" {{ (old('vehicle_types', $data->vehicle_types ?? '') == $types->id) ? 'selected' : '' }}>
                    {{ $types->name }}
                </option>
            @endforeach
        </select>
    </div>
</div>