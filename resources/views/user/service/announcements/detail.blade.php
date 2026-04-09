<x-user>
    <div class="content-wrapper" style="margin:100px 100px 0 100px">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
                <a href="{{ url()->previous() }}">
                    <div class="btn mt-5">
                        <i class="ri ri-reply-fill text-primary"></i>
                    </div>
                </a>
                <div class="card-header d-flex flex-column align-items-start mx-3">
                    <div class="app-brand mb-2">
                        <div class="app-brand-link">
                            <span class="app-brand-logo demo">
                                <img src="{{ asset('assets/img/text-icon.svg') }}">
                            </span>
                        </div>
                    </div>
                    <h4 class="mb-0 mt-2">{{ $announcements->subject }}</h4>
                </div>
                <hr class="my-4 mt-0">
                <div class="card-body">

                    {{-- CUSTOMER + INVOICE INFO --}}


                    <div class="px-3 mb-2">
                        <div class="fs-6 text-muted small"
                            style="text-align: justify; text-justify: inter-word; margin-bottom: 1rem;">
                            {!! $announcements->description !!}
                        </div>
                    </div>
                    @if ($announcements->image)
                        <div class="px-3 mt-3">
                            <small class="text-muted">Lampiran Foto : </small>

                            <div class="mt-2">
                                <img src="{{ Storage::url($announcements->image) }}"
                                    class="img-fluid rounded shadow-sm w-100" style="max-height: 400px; object-fit: cover;"
                                    alt="Lampiran Foto">
                            </div>
                        </div>
                    @endif
                    <hr class="my-4">
                    {{-- STATUS --}}
                    <div class="mt-4">
                        <div class="mt-3">
                            <small class="text-muted">
                                <span class="text-danger">*</span>
                                Pembayaran dianggap sah setelah dana masuk ke rekening RT.
                            </small>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-user>