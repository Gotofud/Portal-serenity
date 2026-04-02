@php $data = $data ?? null; @endphp

<div class="mb-3">
    <label for="inputNama" class="form-label" style="font-weight: 500;">Judul Pengumuman <span
            class="text-danger">*</span></label>
    <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror" id="inputNama"
        value="{{ old('subject', $data->subject ?? '') }}" placeholder="Masukan Judul Pengumuman">
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label for="file" class="form-label" style="font-weight: 500;">
            Upload Gambar <span class="text-danger">*</span>
        </label>

        <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">

        @if(isset($data->image))
            <div class="form-text mt-2">
                <small>Gambar saat ini:
                    <a href="{{ asset('storage/' . $data->image) }}" target="_blank" class="text-decoration-none">
                        Lihat Gambar Terupload
                    </a>
                </small>
            </div>
        @endif

        @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label for="inputStatus" class="form-label" style="font-weight: 500;">Status Publikasi<span
                class="text-danger">*</span></label>
        <select class="form-select @error('is_publish') is-invalid @enderror" name="is_publish" id="inputis_publish">
            <option value="" selected>Pilih Status</option>
            <option value="1" {{ old('is_publish', $data->is_publish ?? '') == '1' ? 'selected' : '' }}>
                Publik
            </option>
            <option value="0" {{ old('is_publish', $data->is_publish ?? '') == '0' ? 'selected' : '' }}>
                Privat
            </option>
        </select>
    </div>
</div>

<div class="mb-5">
    <label class="form-label">Isi Pengumuman</label>

    <!-- Editor -->
    <div id="editor" style="height: 200px;">{!! old('description', $data->description ?? '') !!}</div>

    <!-- Hidden input -->
    <input type="hidden" name="description" id="description">
</div>