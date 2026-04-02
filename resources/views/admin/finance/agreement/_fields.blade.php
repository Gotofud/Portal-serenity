@php $data = $data ?? null; @endphp
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
        <label for="exampleInputname" class="form-label">Jenis Bangunan<span class="text-danger">*</span></label>
        <select class="form-select rw-select @error('building_types_id') is-invalid @enderror " name="building_types_id"
            aria-label="Default select example">
            <option value=" " selected>Pilih Jenis Bangunan</option>
            @foreach ($building_type as $bt)
                <option value="{{ $bt->id }}" {{ (old('building_types_id', $data->building_types_id ?? '') == $bt->id) ? 'selected' : '' }}>
                    {{ $bt->name }}
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="mb-3">
    <label for="exampleInputname" class="form-label">Biaya</label>
    <div class="input-group">
        <span class="input-group-text bg-white border-end-0 pe-1 text-muted fw-medium" id="basic-addon1"
            style="border-top-left-radius: 8px; border-bottom-left-radius: 8px;">
            Rp
        </span>

        <input type="text" inputmode="numeric" id="harga" name="bill_amount" autocomplete="off"
            class="form-control border-start-0 ps-1 @error('bill_amount') is-invalid @enderror"
            placeholder="Masukan Harga Sewa" style="border-top-right-radius: 8px; border-bottom-right-radius: 8px;"
            value="{{ old('bill_amount', $data->bill_amount ?? '') }}">
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