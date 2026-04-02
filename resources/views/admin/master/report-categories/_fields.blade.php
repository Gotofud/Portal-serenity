@php $data = $data ?? null; @endphp

<div class="mb-3">
        <label for="inputJenisLaporan" class="form-label" style="font-weight: 500;">Jenis Laporan <span
                        class="text-danger">*</span></label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="inputJenisLaporan"
                value="{{ old('name', $data->name ?? '') }}" placeholder="Masukan Jenis Laporan">
</div>

<div class="mb-4">
        <label for="inputTypes" class="form-label" style="font-weight: 500;">Tipe Laporan <span
                        class="text-danger">*</span></label>
        <select class="form-select @error('types') is-invalid @enderror" name="types" id="inputTypes">
                <option value="" selected>Pilih Kategori</option>
                <option value="Bencana dan Darurat" {{ old('types', $data->types ?? '') == 'Bencana dan Darurat' ? 'selected' : '' }}>
                        Bencana dan Darurat
                </option>
                <option value="Fasilitas Umum dan Lingkungan" {{ old('types', $data->types ?? '') == 'Fasilitas Umum dan Lingkungan' ? 'selected' : '' }}>
                        Fasilitas Umum dan Lingkungan
                </option>
                <option value="Sosial dan Keamanan Umum" {{ old('types', $data->types ?? '') == 'Sosial dan Keamanan Umum' ? 'selected' : '' }}>
                        Sosial dan Keamanan Umum
                </option>
                <option value="Laporan Khusus dan Manajemen" {{ old('types', $data->types ?? '') == 'Laporan Khusus dan Manajemen' ? 'selected' : '' }}>
                        Laporan Khusus dan Manajemen
                </option>
        </select>
</div>