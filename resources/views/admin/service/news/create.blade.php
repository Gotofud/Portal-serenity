<x-admin>
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row justify-content-center">
            <div class="col">

                <!-- Header -->
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="fw-bold mb-1">Tambah Berita</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0" style="font-size: 13px;">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="#">Berita</a></li>
                                <li class="breadcrumb-item active">Tambah</li>
                            </ol>
                        </nav>
                    </div>
                    <a href="{{ route('service.news.index') }}" class="btn btn-outline-secondary btn-sm">
                        <i class="bx bx-arrow-back me-1"></i> Kembali
                    </a>
                </div>

                <form id="newsForm" action="{{ route('service.news.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <!-- Card 1: Informasi Utama -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header bg-transparent border-bottom px-4 py-3">
                            <h6 class="mb-0 fw-semibold">
                                <i class="bx bx-file-blank text-primary me-2"></i>Informasi Berita
                            </h6>
                        </div>
                        <div class="card-body px-4 py-4">

                            <!-- Judul -->
                            <div class="mb-4">
                                <label class="form-label fw-medium">
                                    Judul <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="title" class="form-control"
                                    placeholder="Masukkan judul berita…">
                            </div>

                            <!-- Tipe & Status -->
                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <label class="form-label fw-medium">
                                        Tipe Berita <span class="text-danger">*</span>
                                    </label>
                                    <select name="news_types" class="form-select">
                                        <option value="Umum">Umum</option>
                                        <option value="Insiden">Insiden</option>
                                        <option value="Sosial">Sosial</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-medium">
                                        Status <span class="text-danger">*</span>
                                    </label>
                                    <select name="status" class="form-select">
                                        <option value="Aktif">Aktif</option>
                                        <option value="Nonaktif">Nonaktif</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Gambar & Subtitle -->
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-medium">Gambar <span
                                            class="text-danger">*</span></label>
                                    <input type="file" name="image"
                                        class="form-control @error('image') is-invalid @enderror">
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-medium">Subtitle Gambar</label>
                                    <input type="text" name="image_subtitle" class="form-control"
                                        placeholder="Keterangan gambar…">
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Card 2: Deskripsi -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header bg-transparent border-bottom px-4 py-3">
                            <h6 class="mb-0 fw-semibold">
                                <i class="bx bx-edit text-primary me-2"></i>Deskripsi
                            </h6>
                        </div>
                        <div class="card-body px-4 py-4">
                            <div id="editor" style="height: 300px;"></div>
                            <input type="hidden" name="description" id="description">

                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-flex gap-2 justify-content-end mb-5">
                        <a href="#" class="btn btn-outline-secondary px-4">Batal</a>
                        <button type="submit" class="btn btn-primary px-5">
                            <i class="bx bx-save me-1"></i> Simpan Berita
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>

    @push('scripts')
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const quill = new Quill('#editor', {
                    theme: 'snow'
                });

                const form = document.getElementById('newsForm');
                const descriptionInput = document.getElementById('description');

                form.addEventListener('submit', function (e) {
                    // Ambil isi dari Quill
                    let html = quill.root.innerHTML;

                    // Cek jika kosong (Quill default kosong adalah <p><br></p>)
                    if (html === '<p><br></p>' || quill.getText().trim().length === 0) {
                        descriptionInput.value = '';
                    } else {
                        descriptionInput.value = html;
                    }

                    // Pastikan input description sudah terisi sebelum submit benar-benar terjadi
                    if (descriptionInput.value === '') {
                        alert('Deskripsi tidak boleh kosong!');
                        e.preventDefault(); // Gagalkan submit jika kosong
                        return false;
                    }
                });
            });
        </script>
    @endpush
</x-admin>