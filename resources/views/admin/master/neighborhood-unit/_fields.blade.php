@php $data = $data ?? null; @endphp

<div class="mb-3">
    <label for="inputNoRT" class="form-label" style="font-weight: 500;">No RT <span class="text-danger">*</span></label>
    <input type="text" inputmode="numeric" pattern="[0-9]*" id="inputNoRT"
        oninput="this.value=this.value.replace(/[^0-9]/g,'')" name="no"
        class="form-control @error('no') is-invalid @enderror" value="{{ old('no', $data->no ?? '') }}"
        placeholder="Masukan No RT">
</div>

<div class="mb-3">
    <label for="exampleInputname" class="form-label">No Rw <span class="text-danger">*</span></label>
    <select class="form-select @error('community_id') is-invalid @enderror " name="community_id"
        aria-label="Default select example">
        <option value=" " selected>Pilih RW</option>
        @foreach ($co as $rw)
            <option value="{{ $rw->id }}" {{ (old('community_id', $data->community_id ?? '') == $rw->id) ? 'selected' : '' }}>
                RW {{ $rw->no }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="inputNamaKetua" class="form-label" style="font-weight: 500;">Nama Ketua RT <span
            class="text-danger">*</span></label>
    <input type="text" name="leader_name" class="form-control @error('leader_name') is-invalid @enderror"
        id="inputNamaKetua" value="{{ old('leader_name', $data->leader_name ?? '') }}"
        placeholder="Masukan Nama Ketua RW">

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