@php $data = $data ?? null; @endphp
<div class="row">
    <div class="col-md-6 mb-3">
        <label for="inputNama" class="form-label" style="font-weight: 500;">Nama Perwakilan Tamu <span
                class="text-danger">*</span></label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="inputNama"
            value="{{ old('name', $data->name ?? '') }}" placeholder="Masukan Nama">
    </div>
    <div class="col-md-6 mb-3">
        <label for="inputNama" class="form-label" style="font-weight: 500;">Nomor Perwakilan Tamu <span
                class="text-danger">*</span></label>
        <input type="text" name="telephone_num" class="form-control @error('telephone_num') is-invalid @enderror"
            id="inputNama" value="{{ old('telephone_num', $data->telephone_num ?? '') }}"
            placeholder="Masukan Nomor Hp">
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label for="inputStatus" class="form-label" style="font-weight: 500;">Tipe Tamu<span
                class="text-danger">*</span></label>
        <select class="form-select @error('guest_types') is-invalid @enderror" name="guest_types" id="inputstatus">
            <option value="" selected>Pilih Tipe</option>
            @foreach ($guestTypes as $types)
                <option value="{{ $types->id }}" {{ (old('guest_types', $data->guest_types ?? '') == $types->id) ? 'selected' : '' }}>
                    {{ $types->name }}
                </option>
            @endforeach

        </select>
    </div>
    <div class="col-md-6 mb-3">
        <label for="inputNama" class="form-label" style="font-weight: 500;">Jumlah Tamu <span
                class="text-danger">*</span></label>
        <input type="text" name="guest_amount" class="form-control @error('guest_amount') is-invalid @enderror"
            id="inputNama" value="{{ old('guest_amount', $data->guest_amount ?? '') }}"
            placeholder="Masukan Jumlah Tamu">
    </div>
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