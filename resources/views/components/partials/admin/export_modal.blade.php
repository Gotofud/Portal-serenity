<div class="modal fade" id="export" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header mb-3">
                <div class="row">
                    <div class="col">
                        <h1 class="modal-title fs-5 mb-1" id="staticBackdropLabel"><i class="ti ti-users"></i> Unduh
                            Laporan
                        </h1>
                        <p class="text-muted mb-0" style="font-size:12.5px;">
                            <span class="text-danger">*</span> Pilih Format Unduhan
                        </p>
                    </div>
                </div>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- Excel --}}
                @if ($exportExcel)
                    <a href="{{ $exportExcel }}" class="d-flex align-items-center gap-3 text-decoration-none mb-3"
                        style="padding:16px 18px; border-radius:14px; border:1.5px solid #e8f7f1; background:#f8fffe;">
                        <div
                            style="width:50px; height:50px; border-radius:12px; background:linear-gradient(135deg,#1d7a45,#2fc692); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                            <i class="ri ri-file-excel-2-line" style="font-size:22px; color:#fff;"></i>
                        </div>
                        <div class="flex-fill">
                            <div style="font-size:14px; font-weight:600; color:#1a1a2e; margin-bottom:2px;">Unduh ke Excel
                            </div>
                            <div style="font-size:11.5px; color:#888;">Format spreadsheet .xlsx siap pakai</div>
                        </div>
                        <i class="ri ri-download-2-line"></i>
                    </a>
                @endif

                {{-- PDF --}}
                <a href="{{ $exportPdf }}" class="d-flex align-items-center gap-3 text-decoration-none"
                    style="padding:16px 18px; border-radius:14px; border:1.5px solid #fef2f2; background:#fffafa;">
                    <div
                        style="width:50px; height:50px; border-radius:12px; background:linear-gradient(135deg,#b91c1c,#ef4444); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                        <i class="ri ri-file-pdf-line" style="font-size:22px; color:#fff;"></i>
                    </div>
                    <div class="flex-fill">
                        <div style="font-size:14px; font-weight:600; color:#1a1a2e; margin-bottom:2px;">Unduh ke PDF
                        </div>
                        <div style="font-size:11.5px; color:#888;">Format dokumen .pdf siap cetak</div>
                    </div>
                    <i class="ri ri-download-2-line"></i>
                </a>

                <div class="modal-footer mt-3">
                    <button type="button" class="btn btn-secondary mt-5" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>