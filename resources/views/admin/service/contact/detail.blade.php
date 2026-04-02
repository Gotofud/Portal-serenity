<x-admin>
    <div class="card mb-5">
        <a href="{{ route('service.contact.index') }}">
            <div class="btn mt-5">
                <i class="ri ri-reply-fill text-primary"></i>
            </div>
        </a>
        <div class="card-body">
            <div class="row  mt-2">
                <div class="col-md-3 mb-3">
                    <span class="text-muted" style="font-size:12.5px;">Nama Lengkap</span>
                    <div class="fw-bold text-dark mt-2">
                        {{ $contact->name ?? '-' }}
                        <br>
                        <small class="text-muted fw-normal" style="font-size: 11.5px;">
                            {{ $contact->email ?? '-' }}
                        </small>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <span class="text-muted" style="font-size:12.5px;">Dikirim Pada</span>
                    <div class="fw-bold text-dark mt-2">
                        {{ $contact->created_at->translatedFormat('d M Y, H:i') . ' WIB' }}
                        <br>
                        <small class="text-muted fw-normal" style="font-size: 11.5px;">
                            {{ $contact->created_at->diffForHumans() }}
                        </small>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <span class="text-muted" style="font-size:12.5px;">Dibalas Pada</span>
                    @if($contact->replied_at)
                        <div class="fw-bold text-dark mt-2">
                            {{ $contact->replied_at->translatedFormat('d M Y, H:i') . ' WIB' }}
                            <br>
                            <small class="text-muted fw-normal" style="font-size: 11.5px;">
                                {{ $contact->replied_at->diffForHumans() }}
                            </small>
                        </div>
                    @else
                        <div class="fw-bold text-dark mt-2">
                            Belum Dibalas
                        </div>
                    @endif
                </div>
                <div class="col-md-3 mb-3">
                    <span class="text-muted" style="font-size:12.5px;">Status</span>
                    <div class="fw-bold text-dark mt-2">
                        @if ($contact->replied_at)
                            <span class="badge bg-label-success">Sudah Dibalas</span>
                        @else
                            <span class="badge bg-label-warning">Belum Dibalas</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row mt-4 mb-5">
                <span class="text-muted" style="font-size:12.5px;">Pertanyaan</span>
                <div class="text-dark mt-2">
                    <p>{{ $contact->question }}</p>
                    <br>
                    <small class="text-muted fw-normal" style="font-size: 11.5px;">
                        {{ mb_strlen($contact->question) }} Karakter
                    </small>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <span class="text-muted mt-3" style="font-size:12.5px;">Balasan</span>
            <div class="text-dark mt-2">
                <p>{{ $contact->reply }}</p>
                <br>
                <small class="text-muted fw-normal" style="font-size: 11.5px;">
                    {{ mb_strlen($contact->reply) }} Karakter
                </small>
            </div>
        </div>
    </div>
</x-admin>