@php $data = $data ?? null; @endphp

<div class="row">
    <div class="col-md-6 mb-3">
        <label for="inputNamaKetua" class="form-label" style="font-weight: 500;">Nama Operator <span
                class="text-danger">*</span></label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="inputNamaKetua"
            value="{{ old('name', $data->name ?? '') }}" placeholder="Masukan Nama Operator">
    </div>
    <div class="col-md-6 mb-3">
        <label for="exampleInputname" class="form-label">Email Operator</label>
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror "
            id="exampleInputname" placeholder="Masukan Email" value="{{ old('email', $data->email ?? '') }}">
    </div>
</div>

<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
        required autocomplete="current-password" value="{{ old('password', $data->password ?? '') }}"
        placeholder="Masukan Password">
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label for="exampleInputname" class="form-label">No Rw <span class="text-danger">*</span></label>
        <select class="form-select rw-select @error('community_id') is-invalid @enderror " name="community_id"
            aria-label="Default select example">
            <option value=" " selected>Pilih RW</option>
            @foreach ($co as $rw)
                <option value="{{ $rw->id }}" {{ (old('community_id', $data->neighborhoodOperator?->community_id ?? '') == $rw->id) ? 'selected' : '' }}>
                    RW {{ $rw->no }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Pilih RT <span class="text-danger">*</span>`</label>
        {{-- Kita simpan RT lama di 'data-selected' agar JS bisa ambil --}}
        <select name="neighborhood_id" class="form-select rt-select"
            data-selected="{{ old('neighborhood_id', $data->neighborhoodOperator?->neighborhood_id ?? '') }}" disabled>
            <option value="" selected disabled>Pilih RT</option>
        </select>
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