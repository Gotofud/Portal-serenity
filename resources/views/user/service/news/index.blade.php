<x-user>
    <section id="landingReviews" class="section-py bg-body landing-reviews">
        <div class="container py-4">
            <div class="row g-4">
                <a href="{{ route('services.news.show', $mainNews->id) }}">
                    <div class="col-lg-12">
                        <!-- Title -->
                        <h2 class="fw-bold mb-2" style="line-height: 1.3;">
                            {{ $mainNews->title }}
                        </h2>

                        <!-- Meta -->
                        <div class="mb-3">
                            <span class="text-danger small">{{ $mainNews->news_types }}</span>
                            <span class="text-muted border-start ps-2 text-dark small">
                                {{ $mainNews->created_at ? $mainNews->created_at->format('d M Y') : '-' }}</span>
                        </div>

                        <!-- Image -->
                        <img src="{{ Storage::url($mainNews->image) }}" class="w-100 rounded-4"
                            style="height: 500px; object-fit: cover;">

                    </div>
                </a>


            </div>

            <div class="row g-4 mt-3">
                @foreach ($recentNews as $newsData)
                    <div class="col-md-6">
                        <a href="{{ route('services.news.show', $newsData->id) }}">
                            <div class="card border-0 text-white overflow-hidden shadow-sm" style="height: 18rem;">
                                <img src="{{ Storage::url($newsData->image) }}" class="card-img" alt="Diver"
                                    style="height: 350px; object-fit: cover;">
                                <div class="card-img-overlay d-flex flex-column justify-content-end"
                                    style="background: linear-gradient(transparent, rgba(0, 0, 0, 0.6));">
                                    <div class="flex me-3">
                                        <span class="text-danger small  fw-semibold">{{ $newsData->news_types }}</span>
                                        <span class="text-muted border-start ps-2 small">
                                            {{ $newsData->created_at ? $newsData->created_at->format('d M Y') : '-' }}</span>
                                        <h5 class="mb-1 text-white" style="line-height:1.3;">
                                            {{ $newsData->title }}
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="row mt-5">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="fw-bold mb-0">Berita Lainnya</h2>
                </div>
                @foreach ($otherNews as $otherNewsData)

                            <div class="col-sm-6 col-md-3 mt-5">
                                <a href="{{ route('services.news.show', $otherNewsData->id) }}">
                                    <div class="cardh-100">
                                        <img src="{{ Storage::url($otherNewsData->image) }}" class="card-img-top rounded-4 mb-3"
                                            alt="Article 1" style="height: 180px; object-fit: cover;">
                                        <div class="card-body p-0">
                                            <h6 class="fw-bold lh-base mb-3">{{ $otherNewsData->title }}</h6>
                                            <div class="d-flex align-items-center small mt-auto">
                                                <span class="text-danger fw-bold me-2">{{ $otherNewsData->news_types }}</span>
                                                @php
                                                    $date = $otherNewsData->created_at;
                                                @endphp

                                                <span class="text-muted text-dark border-start ps-2">
                                                    {{ $date
                    ? ($date->diffInDays(now()) <= 5
                        ? $date->diffForHumans()
                        : $date->format('d M Y'))
                    : '-' }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                @endforeach
                <div class="mt-5">
                    <div class="d-flex justify-content-center">
                        <div class="mt-5">
                            {{ $otherNews->links() }}
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
</x-user>