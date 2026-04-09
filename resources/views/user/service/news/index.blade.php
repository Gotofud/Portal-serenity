<x-user>
    <section id="landingReviews" class="section-py landing-reviews px-5">
        <div class="row g-4 px-2">
            <a href="{{ route('services.news.show', $mainNews->id) }}">
                <div class="col-lg-12">
                    <div class="card border-0 text-white overflow-hidden shadow-sm"
                        style="height: 30rem; position: relative;">

                        <img src="{{ Storage::url($mainNews->image) }}" class="card-img" alt="News Image"
                            style="height: 100%; object-fit: contain; background-color: #1a1a1a;">

                        <div class="card-img-overlay d-flex align-items-end p-0">
                            <div class="bg-white p-4 m-3 shadow-sm"
                                style="width: fit-content; max-width: 600px; min-width: 300px;">

                                <div class="mb-2">
                                    <span class="badge bg-black text-white rounded-1 small px-2 py-1">
                                        {{ $mainNews->news_types }}
                                    </span>
                                    <span class="text-dark text-muted small ms-2">
                                        {{ $mainNews->created_at ? $mainNews->created_at->format('F d, Y') : '' }}
                                    </span>
                                </div>

                                <h2 class="fw-bold text-dark mb-2" style="line-height: 1.2; font-size: 1.5rem;">
                                    {{ $mainNews->title }}
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </a>


        </div>

        <div class="row g-4 mt-3 px-2">
            @foreach ($recentNews as $newsData)
                <div class="col-md-6">
                    <a href="{{ route('services.news.show', $newsData->id) }}">
                        <div class="card border-0 text-white overflow-hidden shadow-sm"
                            style="height: 19rem; position: relative;">
                            <div class="position-absolute top-0 start-0 m-3 z-1">
                                <span class="badge bg-black text-white rounded-1  px-3 py-2 rounded-3">
                                    {{ $newsData->created_at ? $newsData->created_at->format('M d, Y') : '-' }}
                                </span>
                            </div>

                            <img src="{{ Storage::url($newsData->image) }}" class="card-img" alt="News Image"
                                style="height: 100%; object-fit: contain; background-color: #1a1a1a;">

                            <div class="card-img-overlay d-flex flex-column justify-content-end"
                                style="background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));">

                                <div class="flex me-3">
                                    <h3 class="mb-1 text-white" style="line-height:1.3;">
                                        {{ $newsData->title }}
                                    </h3>
                                    <p class="text-muted text-white opacity-75 small mb-0"
                                        style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                        {{ strip_tags($newsData->description) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="row mt-5 px-2">
            <div class="d-flex justify-content-between align-items-center  mt-4">
                <h3 class="fw-bold ">Berita Lainnya</h3>
            </div>
            @foreach ($otherNews as $otherNewsData)

                    <div class="col-sm-6 col-md-3 mt-5">
                        <a href="{{ route('services.news.show', $otherNewsData->id) }}">
                            <div class="h-100">
                                <img src="{{ Storage::url($otherNewsData->image) }}" class="card-img-top rounded-4 mb-3"
                                    alt="Article 1" style="height: 180px; object-fit: cover;">
                                <div class="card-body p-0">
                                    <div class="d-flex align-items-center small mt-auto mb-2" style="font-size:12.5px">
                                        <span class="text-primary fw-bold me-2">{{ $otherNewsData->news_types }}</span>
                                        @php
                                            $date = $otherNewsData->created_at;
                                        @endphp

                                        <span class="text-muted text-dark border-start ps-2">
                                            {{ $date
                ? ($date->diffInDays(now()) <= 2
                    ? $date->diffForHumans()
                    : $date->format('d M Y'))
                : '-' }}
                                        </span>
                                    </div>
                                    <h5 class="fw-bold lh-base mb-3" style=" display: -webkit-box;
                                                    -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden;
                                                    text-overflow: ellipsis;">{{ $otherNewsData->title }}</h5>
                                    <p class="text-muted text-dark opacity-75 small mb-0"
                                        style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                        {{ strip_tags($otherNewsData->description) }}
                                    </p>
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



    </section>
</x-user>