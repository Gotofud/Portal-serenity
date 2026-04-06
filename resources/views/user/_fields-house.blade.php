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
        <label class="form-label">Pilih RT <span class="text-danger">*</span>`</label>
        <select class="form-select rt-select" disabled>
            <option value="" selected disabled>Pilih RT</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Pilih Blok <span class="text-danger">*</span></label>
        <select class="form-select block-select" disabled>
            <option value="" selected disabled>Pilih Blok</option>
        </select>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Rumah</label>
        <select class="form-select house-select" name="house_id" disabled>
            <option selected disabled>Pilih Rumah</option>
        </select>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label for="inputNama" class="form-label" style="font-weight: 500;">Jumlah Penghuni <span
                class="text-danger">*</span></label>
        <input type="text" name="total_resident" class="form-control @error('total_resident') is-invalid @enderror"
            id="inputNama" value="{{ old('total_resident', $data->total_resident ?? '') }}"
            placeholder="Masukan Jumlah Penghuni">
    </div>
    <div class="col-md-6 mb-3">
      <label for="inputStatus" class="form-label" style="font-weight: 500;">Status Tinggal<span
            class="text-danger">*</span></label>
    <select class="form-select @error('status') is-invalid @enderror" name="status" id="inputstatus">
        <option value="" selected>Pilih status</option>
        @if ($secondaryHouse && $primaryHouse->count() <= 0)
            <option value="Dihuni" {{ old('status', $data->status ?? '') == 'Dihuni' ? 'selected' : '' }}>
                Dihuni
            </option>
        @endif
        <option value="Kadang Kadang" {{ old('status', $data->status ?? '') == 'Kadang Kadang' ? 'selected' : '' }}>
            Kadang Kadang
        </option>
        <option value="Tidak Dihuni" {{ old('status', $data->status ?? '') == 'Tidak Dihuni' ? 'selected' : '' }}>
            Tidak Dihuni
        </option>
    </select>
    </div>
</div>

<div class="mb-4">
    <label for="inputStatus" class="form-label" style="font-weight: 500;">Status Rumah<span
            class="text-danger">*</span></label>
    <select class="form-select @error('is_primary') is-invalid @enderror" name="is_primary" id="inputis_primary">
        <option value="" selected>Pilih Status Rumah</option>
        @if ($secondaryHouse && $primaryHouse->count() <= 0)
            <option value="Rumah Utama" {{ old('is_primary', $data->is_primary ?? '') == 'Rumah Utama' ? 'selected' : '' }}>
                Rumah Utama
            </option>
        @endif
        <option value="Rumah Lainnya" {{ old('is_primary', $data->is_primary ?? '') == 'Rumah Lainnya' ? 'selected' : '' }}>
            Rumah Lainnya
        </option>
    </select>
</div>