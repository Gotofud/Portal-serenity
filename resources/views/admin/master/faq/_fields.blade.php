@php $data = $data ?? null; @endphp

<div class="mb-3">
    <label for="inputCategory" class="form-label" style="font-weight: 500;">Kategori <span
            class="text-danger">*</span></label>
    <select class="form-select @error('category') is-invalid @enderror" name="category" id="inputCategory">
        <option value="" selected>Pilih Kategori</option>
        <option value="Umum" {{ old('category', $data->category ?? '') == 'Umum' ? 'selected' : '' }}>
            Umum
        </option>
        <option value="Akun Pengguna" {{ old('category', $data->category ?? '') == 'Akun Pengguna' ? 'selected' : '' }}>
            Akun Pengguna
        </option>
        <option value="Kebijakan" {{ old('category', $data->category ?? '') == 'Kebijakan' ? 'selected' : '' }}>
            Kebijakan
        </option>
        <option value="Produk" {{ old('category', $data->category ?? '') == 'Produk' ? 'selected' : '' }}>
            Produk
        </option>
    </select>
</div>

<div class="mb-3">
    <label for="inputPertanyaan" class="form-label" style="font-weight: 500;">Pertanyaan <span
            class="text-danger">*</span></label>
    <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror" id="inputPertanyaan"
        value="{{ old('subject', $data->subject ?? '') }}" placeholder="Masukan Pertanyaan">
</div>

<div class="mb-3">
    <label for="inputJawaban" class="form-label" style="font-weight: 500;">Jawaban <span
            class="text-danger">*</span></label>
    <textarea name="answer" class="form-control @error('answer') is-invalid @enderror" id="inputJawaban"
        placeholder="Masukan Jawaban">{{ old('answer', $data->answer ?? '') }}</textarea>
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