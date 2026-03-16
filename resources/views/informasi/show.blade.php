<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $article->seo_title }} - Papan Informasi</title>
    <meta name="description" content="{{ $article->seo_description }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --purple-deep: #4A148C;
            --gold: #FFD700;
            --gold-dark: #F5B041;
            --gradient-gold: linear-gradient(135deg, #FFD700 0%, #F5B041 100%);
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Poppins', sans-serif; background: #0A0A14; color: #fff; }

        .navbar {
            position: sticky; top: 0; z-index: 1000;
            display: flex; justify-content: space-between; align-items: center;
            padding: .75rem 1.5rem;
            background: rgba(10, 10, 20, .92);
            border-bottom: 1px solid rgba(255, 215, 0, 0.2);
            backdrop-filter: blur(18px);
        }

        .brand { display: flex; align-items: center; gap: 10px; color: #fff; text-decoration: none; font-weight: 700; }
        .brand img { height: 42px; }
        .brand span {
            background: var(--gradient-gold);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 800;
        }

        .btn {
            text-decoration: none;
            border-radius: 999px;
            padding: 8px 13px;
            border: 1px solid rgba(255,255,255,.25);
            color: #fff;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: .92rem;
        }

        .wrap { max-width: 1100px; margin: 0 auto; padding: 1.2rem 1.3rem 2rem; }

        .article-card {
            background: linear-gradient(145deg, rgba(74, 20, 140, 0.17), rgba(10, 10, 20, 0.88));
            border: 1px solid rgba(255, 215, 0, 0.17);
            border-radius: 18px;
            overflow: hidden;
        }

        .article-body { padding: 20px; }
        .meta { color: rgba(255,255,255,.7); font-size: .86rem; margin-bottom: 10px; }
        .title { font-size: clamp(1.7rem, 4.5vw, 2.35rem); margin-bottom: 10px; color: var(--gold); }
        .badge {
            display: inline-block;
            background: rgba(255,215,0,.12);
            border: 1px solid rgba(255,215,0,.3);
            color: var(--gold);
            border-radius: 999px;
            padding: 4px 9px;
            font-size: .74rem;
            margin-right: 4px;
            margin-bottom: 8px;
        }

        .content { margin-top: 10px; line-height: 1.9; color: rgba(255,255,255,.95); }
        .content a { color: var(--gold); }
        .content p, .content li, .content blockquote { margin-bottom: .9rem; }

        .latest {
            margin-top: 16px;
            background: linear-gradient(145deg, rgba(74, 20, 140, 0.13), rgba(10, 10, 20, 0.85));
            border: 1px solid rgba(255, 215, 0, 0.13);
            border-radius: 14px;
            padding: 14px;
        }

        .latest h3 { margin-bottom: 8px; color: var(--gold); }
        .latest a {
            display: block;
            text-decoration: none;
            color: #fff;
            border: 1px solid rgba(255,255,255,.14);
            border-radius: 10px;
            padding: 10px;
            margin-bottom: 8px;
            font-size: .94rem;
        }

        .latest a:hover { border-color: rgba(255, 215, 0, .35); }
    </style>
</head>
<body>
    <nav class="navbar">
        <a href="{{ route('home') }}" class="brand">
            <img src="/images/logokabinet.png" alt="Logo">
            <span>Sentra Sinergi</span>
        </a>
        <div style="display:flex; gap:8px;">
            <a href="{{ route('informasi.index') }}" class="btn"><i class="fas fa-arrow-left"></i> Semua Informasi</a>
            <a href="{{ route('home') }}" class="btn">Landing</a>
        </div>
    </nav>

    <main class="wrap">
        <article class="article-card">
            @if($article->cover_image_url)
                <img src="{{ $article->cover_image_url }}" alt="{{ $article->title }}" style="width:100%; max-height:390px; object-fit:cover;">
            @endif
            <div class="article-body">
                <div class="meta">{{ optional($article->published_at)->format('d M Y H:i') ?? '-' }} | {{ $article->user?->name ?? '-' }}</div>
                <h1 class="title">{{ $article->title }}</h1>
                <div>
                    @foreach($article->categories as $cat)
                        <span class="badge">{{ $cat->name }}</span>
                    @endforeach
                </div>
                <div class="content">{!! $article->content !!}</div>
            </div>
        </article>

        @if($latestArticles->count())
            <section class="latest">
                <h3>Artikel Lainnya</h3>
                @foreach($latestArticles as $latest)
                    <a href="{{ route('informasi.show', $latest->slug) }}">{{ $latest->title }}</a>
                @endforeach
            </section>
        @endif
    </main>
</body>
</html>
