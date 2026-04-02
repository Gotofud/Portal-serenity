@php $data = $data ?? null; @endphp

<div class="mb-3">
    <label for="exampleInputname" class="form-label">Jenis Bangunan <span class="text-danger">*</span></label>
    <select class="form-select @error('building_types_id') is-invalid @enderror " name="building_types_id"
        aria-label="Default select example">
        <option value=" " selected>Pilih Jenis Bangunan</option>
        @foreach ($bt as $type)
            <option value="{{ $type->id }}" {{ (old('building_types_id', $data->building_types_id ?? '') == $type->id) ? 'selected' : '' }}>
                {{ $type->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label for="exampleInputname" class="form-label">No Rw <span class="text-danger">*</span></label>
        <select class="form-select rw-select @error('community_id') is-invalid @enderror " name="community_id"
            aria-label="Default select example">
            <option value=" " selected>Pilih RW</option>
            @foreach ($co as $rw)
                <option value="{{ $rw->id }}" {{ (old('community_id', $data->community_id ?? '') == $rw->id) ? 'selected' : '' }}>
                    RW {{ $rw->no }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Pilih RT <span class="text-danger">*</span>`</label>
        {{-- Kita simpan RT lama di 'data-selected' agar JS bisa ambil --}}
        <select name="neighborhood_id" class="form-select rt-select"
            data-selected="{{ old('neighborhood_id', $data->neighborhood_id ?? '') }}" disabled>
            <option value="" selected disabled>Pilih RT</option>
        </select>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Pilih Blok <span class="text-danger">*</span></label>
        <select name="block_id" class="form-select block-select"
            data-selected="{{ old('block_id', $data->block_id ?? '') }}" disabled>
            <option value="" selected disabled>Pilih Blok</option>
        </select>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Nomor <span class="text-danger">*</span></label>
        <input type="text" name="number" class="form-control @error('number') is-invalid @enderror" id="inputNama"
            value="{{ old('number', $data->number ?? '') }}" placeholder="Masukan Nomor Rumah">
    </div>
</div>

<div class="mb-4">
    <label for="inputStatus" class="form-label" style="font-weight: 500;">Status <span
            class="text-danger">*</span></label>
    <select class="form-select @error('status') is-invalid @enderror" name="status" id="inputStatus">
        <option value="" selected>Pilih Status</option>
        <option value="Aktif" {{ old('status', $data->status ?? '') == 'Aktif' ? 'selected' : '' }}>
            Aktif
        </option>
        <option value="Nonaktif" {{ old('status', $data->status ?? '') == 'Nonaktif' ? 'selected' : '' }}>
            Nonaktif
        </option>
    </select>
</div>