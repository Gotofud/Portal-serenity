<x-user>
    <!DOCTYPE html>
    <html lang="id">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>{{ $news->title }}</title>
        <link
            href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Source+Serif+4:ital,wght@0,300;0,400;0,600;1,400&family=DM+Sans:wght@400;500;600&display=swap"
            rel="stylesheet" />
        <style>
            *,
            *::before,
            *::after {
                box-sizing: border-box;
                margin: 0;
                padding: 0;
            }

            :root {
                --ink: #1a1a1a;
                --muted: #6b6b6b;
                --rule: #e0ddd8;
                --accent: #c0392b;
                --bg: #faf9f7;
                --tag-bg: #f0ede8;
            }

            /* ── Article wrapper ── */
            .article-page {
                max-width: 70rem;
                margin: 0 auto;
                padding: 40px 24px;
            }

            /* ── Category + meta ── */
            .meta-row {
                display: flex;
                align-items: center;
                gap: 10px;
                margin-bottom: 16px;
                font-family: 'DM Sans', sans-serif;
                font-size: 13px;
            }

            .author-avatar {
                width: 28px;
                height: 28px;
                border-radius: 50%;
                background: linear-gradient(135deg, #e8b4a0, #c47f68);
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 12px;
                font-weight: 600;
                color: #fff;
                flex-shrink: 0;
            }

            .author-name {
                font-weight: 600;
                color: var(--ink);
            }

            .meta-dot {
                color: var(--rule);
            }

            .pub-date {
                color: var(--muted);
            }

            /* ── Headline ── */
            h1.headline {
                font-family: 'Playfair Display', serif;
                font-size: clamp(26px, 5vw, 38px);
                font-weight: 700;
                line-height: 1.2;
                letter-spacing: -0.5px;
                color: var(--ink);
                margin-bottom: 14px;
            }

            /* ── Standfirst ── */
            .standfirst {
                font-size: 17px;
                font-weight: 300;
                color: #444;
                line-height: 1.6;
                border-left: 3px solid var(--accent);
                padding-left: 16px;
                margin-bottom: 28px;
            }

            /* ── Hero image ── */
            .hero-wrap {
                position: relative;
                border-radius: 4px;
                overflow: hidden;
                margin-bottom: 10px;
            }

            .hero-wrap img {
                width: 100%;
                display: block;
                height: 550px;
                object-fit: cover;
                object-position: center;
            }

            .hero-caption {
                font-family: 'DM Sans', sans-serif;
                font-size: 12px;
                color: var(--muted);
                margin-bottom: 32px;
                font-style: italic;
            }

            /* ── Body text ── */
            .article-body {
                font-size: 16.5px;
                line-height: 1.8;
            }

            .article-body p {
                margin-bottom: 20px;
                color: #2c2c2c;
            }

            .article-body h2 {
                font-family: 'Playfair Display', serif;
                font-size: 22px;
                font-weight: 600;
                margin: 36px 0 14px;
                color: var(--ink);
                border-bottom: 1px solid var(--rule);
                padding-bottom: 8px;
            }

            .article-body ul {
                list-style: none;
                padding: 0;
                margin: 0 0 20px;
            }

            .article-body ul li {
                padding: 6px 0 6px 20px;
                position: relative;
                color: #2c2c2c;
                font-size: 16px;
            }

            .article-body ul li::before {
                content: "•";
                position: absolute;
                left: 0;
                color: var(--accent);
                font-weight: 700;
            }

            /* ── Pull quote ── */
            .pull-quote {
                border-top: 2px solid var(--ink);
                border-bottom: 1px solid var(--rule);
                margin: 36px 0;
                padding: 22px 0 20px;
                font-family: 'Playfair Display', serif;
                font-size: 21px;
                font-style: italic;
                line-height: 1.45;
                color: var(--ink);
            }

            /* ── Tags ── */
            .tags-row {
                display: flex;
                flex-wrap: wrap;
                gap: 8px;
                margin-top: 40px;
                padding-top: 20px;
                border-top: 1px solid var(--rule);
            }

            .tag {
                font-family: 'DM Sans', sans-serif;
                font-size: 12px;
                font-weight: 500;
                background: var(--tag-bg);
                color: var(--muted);
                padding: 5px 12px;
                border-radius: 100px;
                cursor: pointer;
                transition: background 0.2s;
            }

            .tag:hover {
                background: #e0dbd3;
            }

            /* ── Author card ── */
            .author-card {
                display: flex;
                gap: 16px;
                align-items: flex-start;
                margin-top: 40px;
                padding: 24px;
                background: #fff;
                border: 1px solid var(--rule);
                border-radius: 6px;
            }

            .author-card .big-avatar {
                width: 56px;
                height: 56px;
                border-radius: 50%;
                flex-shrink: 0;
                background: linear-gradient(135deg, #e8b4a0, #c47f68);
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 20px;
                font-weight: 700;
                color: #fff;
            }

            .author-card .author-info h4 {
                font-family: 'DM Sans', sans-serif;
                font-weight: 600;
                font-size: 15px;
                margin-bottom: 4px;
            }

            .author-card .author-info p {
                font-size: 14px;
                color: var(--muted);
                margin: 0;
                font-family: 'DM Sans', sans-serif;
            }

            /* ── Share bar ── */
            .share-bar {
                display: flex;
                align-items: center;
                gap: 10px;
                margin: 32px 0 0;
                font-family: 'DM Sans', sans-serif;
                font-size: 13px;
                font-weight: 600;
                color: var(--muted);
            }

            .share-btn {
                padding: 7px 16px;
                border-radius: 4px;
                cursor: pointer;
                font-family: 'DM Sans', sans-serif;
                font-size: 13px;
                font-weight: 600;
                border: 1px solid var(--rule);
                background: #fff;
                color: var(--ink);
                transition: background 0.15s;
            }

            .share-btn:hover {
                background: var(--tag-bg);
            }

            .share-btn.primary {
                background: var(--ink);
                color: #fff;
                border-color: var(--ink);
            }

            .share-btn.primary:hover {
                background: #333;
            }
        </style>
    </head>

    <body>

        <!-- Article -->
        <article class="article-page" style="margin-top:75px;">
            <!-- Meta -->
            <!-- Headline -->
            <h1 class="headline">{{ $news->title }}</h1>
            <div class="meta-row">
                <div class="flex-shrink-0">
                    @if ($news->users->avatar)
                        <div class="avatar">
                            <img src="{{$news->users->avatar}}" alt="avatar" class="rounded-circle"
                                style="width:25px; height:25px; object-fit:cover;" />
                        </div>
                    @else
                        <div class="avatar bg-light d-flex align-items-center justify-content-center"
                            style="width:25px; height:25px; border-radius:50%;">

                            <span class="fw-bold text-white" style="font-size:10px">
                                {{ substr($news->users->name ?? '-', 0, 2) }}
                            </span>

                        </div>
                    @endif
                </div>
                <span class="pub-date">{{ $news->users->name }}</span>
                <span class="meta-dot">•</span>
                <span class="pub-date" style="text-transform: uppercase;">{{ $news->news_types }}</span>
                <span class="meta-dot">•</span>
                <span class="pub-date">{{ $news->created_at ? $news->created_at->format('d M Y') : '-' }}</span>
            </div>
            <!-- Hero image (CSS-generated cityscape placeholder) -->
            <div class="hero-wrap">
                <img src="{{ Storage::url($news->image) }}">
            </div>
            <p class="hero-caption">{{$news->image_subtitle}}</p>

            <!-- Body -->
            <div class="article-body">
                {!! $news->description !!}
            </div>


            <!-- Share bar -->
            <div class="share-bar">
                Share this article:
                <button class="share-btn primary">Twitter / X</button>
                <button class="share-btn">Facebook</button>
                <button class="share-btn">Copy Link</button>
            </div>


        </article>

    </body>

    </html>
</x-user>