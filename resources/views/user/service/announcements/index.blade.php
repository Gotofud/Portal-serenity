<x-user>
    <section id="landingFAQ" class="section-py bg-body landing-faq">
        <div class="container bg-icon-right">
            <div class="content-wrapper">
                <!-- Content -->
                <div class="faq-header d-flex flex-column justify-content-center align-items-center h-px-300 position-relative overflow-hidden rounded-4"
                    style="background: url(../../assets/img/front-pages/backgrounds/bg-color.png); background-size: cover;">
                    <h2 class="text-center text-white mb-2">Pengumuman</h2>
                    <p class="text-muted text-white text-center mb-0 px-4">Pengumuman terkait komplek ada disini.
                    </p>
                </div>

                @forelse ($announcements as $data)
                    <a href="{{ route('services.announcements.show',$data->id) }}" style="text-decoration:none;">
                        <div class="row mt-6 px-5">
                            <div class="col">
                                <div class="d-flex mb-4 gap-4 align-items-center">
                                    @php
                                        $date = $data->created_at;
                                    @endphp
                                    <div class="fs-4 text-end text-dark opacity-75 pe-4" style="min-width: 100px; line-height: 1.2;">
                                        @if ($date->isToday()) Hari ini <br> <span
                                            class="small">{{ $date->format('H:i') }}</span>
                                        @else
                                            {{ $date->format('M d') }} <br> <span
                                                class="small text-muted text-dark opacity-75">{{ $date->format('H:i') }}</span>
                                        @endif
                                    </div>
                                    <div class="border-start px-5">
                                        <h3 class="mb-0 fw-bold">{{ $data->subject }}</h3>
                                        <p class="text-muted text-dark opacity-75 small mb-0"
                                            style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                            {!! strip_tags($data->description) !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                    <div
                        class="d-flex flex-column justify-content-center align-items-center h-px-300 position-relative overflow-hidden rounded-4 border border-dashed">
                        <i class="ri ri-megaphone-line text-primary mb-3" style="font-size: 64px; opacity: 0.5;"></i>

                        <h4 class="text-center text-primary fw-bold mb-1">Belum Ada Pengumuman</h4>

                        <p class="text-muted text-center mb-0 px-4">
                            Saat ini belum ada informasi terbaru. <br>
                            Silakan cek kembali nanti, ya!
                        </p>
                    </div>
                @endforelse
                <div class="mt-5">
                    <div class="d-flex justify-content-center">
                        <div class="mt-5">
                            {{ $announcements->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-user>