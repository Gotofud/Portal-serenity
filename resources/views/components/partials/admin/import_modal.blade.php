<div class="modal fade" id="import" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header mb-3">
                <div class="row">
                    <div class="col">
                        <h1 class="modal-title fs-5 mb-1" id="staticBackdropLabel"><i class="ti ti-users"></i> Import
                            Data
                        </h1>
                        <p class="text-muted mb-0" style="font-size:12.5px;">
                            <span class="text-danger">*</span> Format file hanya bisa XLSX, CSV dan XLS
                        </p>
                    </div>
                </div>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form Input Group -->
                <form action="{{ $importRoute }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <a href="{{ $downloadRoute }}" class="d-flex align-items-center gap-3 text-decoration-none mb-5"
                        style="padding:16px 18px; border-radius:14px; border:1.5px solid #e8f7f1; background:#f8fffe;">
                        <div
                            style="width:50px; height:50px; border-radius:12px; background:linear-gradient(135deg,#1d7a45,#2fc692); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                            <i class="ri ri-file-excel-2-line" style="font-size:22px; color:#fff;"></i>
                        </div>
                        <div class="flex-fill">
                            <div style="font-size:14px; font-weight:600; color:#1a1a2e; margin-bottom:2px;">Unduh
                                Template
                            </div>
                            <div style="font-size:11.5px; color:#888;">Format spreadsheet .xlsx siap pakai</div>
                        </div>
                        <i class="ri ri-download-2-line"></i>
                    </a>
                    <div class=" mb-5">
                        <div class="form-floating form-floating-outline mb-6">
                            <input type="file" class="form-control" id="basic-default-upload-file" name="file"
                                accept=".csv, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
                                required />
                        </div>
                        <p class="text-muted mb-0 text-end" style="font-size:12.5px;">
                            <span class="text-danger">*</span> Mohon baca cara penggunaannya pada setiap template
                        </p>
                    </div>

                    <div class="modal-footer mt-5">
                        <button type="submit" class="btn btn-primary"><i class="ri ri-save-3-fill"></i> Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
                <!-- End Form -->

            </div>
        </div>
    </div>