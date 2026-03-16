<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Papan Informasi - Sentra Sinergi</title>
    <meta name="description" content="Portal informasi resmi Sentra Sinergi. Artikel, pembaruan kegiatan, dan publikasi organisasi.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --purple-deep: #4A148C;
            --purple: #6A1B9A;
            --gold: #FFD700;
            --gold-dark: #F5B041;
            --gradient-main: linear-gradient(135deg, #4A148C 0%, #6A1B9A 30%, #FFD700 70%, #F5B041 100%);
            --gradient-gold: linear-gradient(135deg, #FFD700 0%, #F5B041 100%);
            --gradient-purple: linear-gradient(135deg, #4A148C 0%, #9C27B0 100%);
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Poppins', sans-serif; background: #0A0A14; color: #fff; }

        .navbar {
            position: sticky; top: 0; z-index: 1000;
            display: flex; justify-content: space-between; align-items: center;
            padding: 0.75rem 1.5rem;
            background: rgba(10, 10, 20, 0.9);
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

        .actions { display: flex; gap: 8px; }
        .btn {
            text-decoration: none;
            border-radius: 999px;
            padding: 9px 14px;
            font-weight: 600;
            border: 1px solid rgba(255,255,255,.25);
            color: #fff;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background: var(--gradient-gold);
            color: var(--purple-deep);
            border: none;
            font-weight: 700;
        }

        .hero {
            padding: 2.8rem 1.3rem 1.6rem;
            background:
                radial-gradient(ellipse at top left, rgba(74, 20, 140, 0.4) 0%, transparent 55%),
                radial-gradient(ellipse at top right, rgba(255, 215, 0, 0.15) 0%, transparent 45%);
        }

        .hero-inner { max-width: 1200px; margin: 0 auto; }
        .hero-badge {
            display: inline-flex; align-items: center; gap: 8px;
            border: 1px solid rgba(255, 215, 0, 0.35);
            color: var(--gold);
            border-radius: 999px;
            padding: 8px 14px;
            margin-bottom: 12px;
            font-size: .88rem;
        }

        h1 {
            font-size: clamp(1.8rem, 4vw, 2.6rem);
            margin-bottom: 8px;
            background: var(--gradient-main);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero p { color: rgba(255,255,255,.8); max-width: 760px; line-height: 1.75; }

        .container { max-width: 1200px; margin: 0 auto; padding: 1rem 1.3rem 2rem; }

        .filters {
            display: flex; gap: 10px; flex-wrap: wrap;
            background: linear-gradient(145deg, rgba(74, 20, 140, 0.25), rgba(255, 215, 0, 0.05));
            border: 1px solid rgba(255, 215, 0, 0.18);
            border-radius: 14px;
            padding: 12px;
            margin-bottom: 1rem;
        }

        .filters input, .filters select {
            background: rgba(255,255,255,.06);
            color: #fff;
            border: 1px solid rgba(255,255,255,.2);
            border-radius: 10px;
            padding: 10px 12px;
            min-width: 220px;
            font-family: inherit;
        }

        .filters button {
            background: var(--gradient-gold);
            color: var(--purple-deep);
            border: none;
            border-radius: 10px;
            padding: 10px 14px;
            font-weight: 700;
            font-family: inherit;
            cursor: pointer;
        }

        .grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 14px; }
        .card {
            background: linear-gradient(145deg, rgba(74, 20, 140, 0.17), rgba(10, 10, 20, 0.88));
            border: 1px solid rgba(255, 215, 0, 0.17);
            border-radius: 18px;
            overflow: hidden;
            transition: .25s ease;
        }

        .card:hover { transform: translateY(-3px); border-color: rgba(255, 215, 0, 0.35); }
        .card img { width: 100%; height: 190px; object-fit: cover; }
        .card-body { padding: 14px; }
        .meta { color: rgba(255,255,255,.65); font-size: .78rem; margin-bottom: 8px; }
        .title { font-size: 1rem; font-weight: 700; margin-bottom: 8px; color: var(--gold); }
        .excerpt { color: rgba(255,255,255,.86); line-height: 1.68; font-size: .92rem; }
        .badge {
            display: inline-block;
            background: rgba(255, 215, 0, 0.12);
            border: 1px solid rgba(255, 215, 0, 0.28);
            color: var(--gold);
            border-radius: 999px;
            padding: 3px 8px;
            font-size: .74rem;
            margin-right: 4px;
            margin-bottom: 6px;
        }

        .read-btn {
            margin-top: 10px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            color: var(--gold);
            border: 1px solid rgba(255, 215, 0, 0.4);
            border-radius: 999px;
            padding: 8px 12px;
            font-size: .88rem;
            font-weight: 600;
        }

        .empty { text-align: center; color: rgba(255,255,255,.8); padding: 40px 0; grid-column: 1/-1; }
        .pagination-wrap { margin-top: 16px; }

        @media (max-width: 980px) { .grid { grid-template-columns: 1fr 1fr; } }
        @media (max-width: 680px) {
            .grid { grid-template-columns: 1fr; }
            .actions { flex-wrap: wrap; justify-content: flex-end; }
            .filters input, .filters select { min-width: 100%; }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <a href="{{ route('home') }}" class="brand">
            <img src="/images/logokabinet.png" alt="Logo">
            <span>Sentra Sinergi</span>
        </a>
        <div class="actions">
            <a href="{{ route('home') }}" class="btn"><i class="fas fa-arrow-left"></i> Landing</a>
            <a href="{{ route('login') }}" class="btn btn-primary"><i class="fas fa-right-to-bracket"></i> Login</a>
        </div>
    </nav>

    <section class="hero">
        <div class="hero-inner">
            <div class="hero-badge"><i class="fas fa-newspaper"></i> Papan Informasi Organisasi</div>
            <h1>Artikel, Pengumuman, dan Dokumentasi</h1>
            <p>Halaman ini menampilkan seluruh artikel yang telah dipublikasikan resmi. Gunakan filter untuk menemukan informasi berdasarkan kata kunci atau kategori.</p>
        </div>
    </section>

    <main class="container">
        <form method="GET" action="{{ route('informasi.index') }}" class="filters">
            <input type="text" name="q" value="{{ $search }}" placeholder="Cari artikel...">
            <select name="kategori">
                <option value="">Semua Kategori</option>
                @foreach($categories as $category)
                    <option value="{{ $category->slug }}" @selected($activeCategory?->id === $category->id)>{{ $category->name }}</option>
                @endforeach
            </select>
            <button type="submit"><i class="fas fa-search"></i> Filter</button>
        </form>

        <div class="grid">
            @forelse($articles as $article)
            <article class="card">
                @if($article->cover_image_url)
                    <img src="{{ $article->cover_image_url }}" alt="{{ $article->title }}">
                @endif
                <div class="card-body">
                    <div class="meta">{{ optional($article->published_at)->format('d M Y H:i') ?? '-' }} | {{ $article->user?->name ?? '-' }}</div>
                    <div>
                        @foreach($article->categories as $cat)
                            <span class="badge">{{ $cat->name }}</span>
                        @endforeach
                    </div>
                    <h3 class="title">{{ $article->title }}</h3>
                    <p class="excerpt">{{ \Illuminate\Support\Str::limit(strip_tags($article->excerpt ?: $article->content), 145) }}</p>
                    <a href="{{ route('informasi.show', $article->slug) }}" class="read-btn"><i class="fas fa-book-open"></i> Baca Detail</a>
                </div>
            </article>
            @empty
                <div class="empty">Belum ada artikel dipublikasikan.</div>
            @endforelse
        </div>

        <div class="pagination-wrap">
            {{ $articles->links() }}
        </div>
    </main>
</body>
</html>
