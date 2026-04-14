<x-user>
    <section class="container py-5" style="margin:100px 100px 25px 100px">
        <div class="mb-4 text-center">
            <h3 class="fw-bold">Buat Laporan</h3>
            <p class="text-muted">Laporkan kejadian di lingkunganmu</p>
        </div>

        <form action="{{ route('services.report.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-4">

                <!-- LEFT -->
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm rounded-4 mb-4">
                        <div class="card-body">
                            <label class="form-label fw-semibold">Judul</label>
                            <input type="text" name="subject" class="form-control" required>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm rounded-4 mb-4">
                        <div class="card-body">
                            <label class="form-label fw-semibold">Kategori</label>
                            <select name="report_category" class="form-select" required>
                                <option selected disabled>Pilih kategori</option>
                                @foreach ($reportCat as $catData)
                                    <option value="{{ $catData->id }}">{{ $catData->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body">
                            <label class="form-label fw-semibold">Deskripsi</label>
                            <textarea name="description" class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                </div>

                <!-- RIGHT -->
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body">
                            <label class="fw-semibold mb-3">Sumber Gambar</label>

                            <!-- OPTION -->
                            <select id="sourceType" class="form-select mb-3">
                                <option value="upload">Upload Gambar</option>
                                <option value="camera">Gunakan Kamera</option>
                            </select>

                            <!-- PREVIEW -->
                            <div class="mb-3">
                                <div class="w-100 border rounded-3 bg-light" style="height:220px; overflow:hidden;">
                                    <video id="camera" class="w-100 h-100" style="display:none; object-fit:cover;"
                                        autoplay></video>
                                    <img id="previewImage" src="https://via.placeholder.com/300x200?text=Preview"
                                        class="w-100 h-100" style="object-fit:cover;">
                                </div>
                            </div>

                            <!-- UPLOAD -->
                            <div id="uploadSection">
                                <input type="file" name="image" id="imageInput" class="form-control" accept="image/*">
                            </div>

                            <!-- CAMERA -->
                            <div id="cameraSection" style="display:none;">
                                <button type="button" class="btn btn-outline-primary w-100 mb-2"
                                    onclick="startCamera()">Buka Kamera</button>
                                <button type="button" class="btn btn-outline-success w-100" onclick="takePhoto()">Ambil
                                    Foto</button>
                            </div>

                            <!-- hidden file for laravel -->
                            <input type="file" name="camera_image" id="cameraFile" class="d-none">

                        </div>
                    </div>
                </div>
            </div>

            <div class="text-end mt-4">
                <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
        </form>
    </section>

    <script>
        // SWITCH
        const sourceType = document.getElementById('sourceType');
        const uploadSection = document.getElementById('uploadSection');
        const cameraSection = document.getElementById('cameraSection');

        sourceType.addEventListener('change', function () {
            if (this.value === 'camera') {
                uploadSection.style.display = 'none';
                cameraSection.style.display = 'block';
            } else {
                uploadSection.style.display = 'block';
                cameraSection.style.display = 'none';
            }
        });

        // UPLOAD PREVIEW
        document.getElementById('imageInput').addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                // stop camera if active
                stopCamera();

                const reader = new FileReader();
                reader.onload = e => {
                    const img = document.getElementById('previewImage');
                    img.src = e.target.result;
                    img.style.display = 'block';
                    document.getElementById('camera').style.display = 'none';
                };
                reader.readAsDataURL(file);
            }
        });

        // CAMERA
        let stream;
        function startCamera() {
            navigator.mediaDevices.getUserMedia({ video: true }).then(s => {
                stream = s;
                const video = document.getElementById('camera');
                video.srcObject = stream;
                video.style.display = 'block';
                document.getElementById('previewImage').style.display = 'none';
            });
        }

        function stopCamera() {
            if (stream) {
                stream.getTracks().forEach(track => track.stop());
            }
        }

        function takePhoto() {
            const video = document.getElementById('camera');
            const canvas = document.createElement('canvas');
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            canvas.getContext('2d').drawImage(video, 0, 0);

            canvas.toBlob(function (blob) {
                const file = new File([blob], 'camera.png', { type: 'image/png' });

                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(file);
                document.getElementById('cameraFile').files = dataTransfer.files;

                const img = document.getElementById('previewImage');
                img.src = URL.createObjectURL(blob);
                img.style.display = 'block';
                video.style.display = 'none';

                stopCamera();
            });
        }

        // SWITCH UI IMPROVEMENT
        sourceType.addEventListener('change', function () {
            if (this.value === 'camera') {
                uploadSection.style.display = 'none';
                cameraSection.style.display = 'block';
                document.getElementById('previewImage').src = 'https://via.placeholder.com/300x200?text=Camera+Mode';
            } else {
                cameraSection.style.display = 'none';
                uploadSection.style.display = 'block';
                stopCamera();
                document.getElementById('previewImage').src = 'https://via.placeholder.com/300x200?text=Upload+Mode';
            }
        });
    </script>
</x-user>