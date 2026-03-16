@extends('layouts.app')

@section('title', $informationBoard->title)
@section('page-title', 'Detail Artikel Informasi')

@section('content')
<div class="row">
    <div class="col-12 col-lg-8">
        <div class="card animate-fadeIn">
            @if($informationBoard->cover_image_url)
                <img src="{{ $informationBoard->cover_image_url }}" alt="{{ $informationBoard->title }}" style="width: 100%; max-height: 340px; object-fit: cover; border-radius: 16px 16px 0 0;">
            @endif
            <div class="card-body">
                <div class="d-flex align-center gap-2" style="margin-bottom: 10px; flex-wrap: wrap;">
                    <span class="badge badge-{{ $informationBoard->status === 'published' ? 'success' : 'secondary' }}">{{ ucfirst($informationBoard->status) }}</span>
                    @foreach($informationBoard->categories as $cat)
                        <span class="badge badge-info">{{ $cat->name }}</span>
                    @endforeach
                    <span class="text-muted fs-sm"><i class="fas fa-user"></i> {{ $informationBoard->user?->name ?? '-' }}</span>
                    <span class="text-muted fs-sm"><i class="fas fa-calendar"></i> {{ optional($informationBoard->published_at)->format('d M Y H:i') ?? $informationBoard->created_at->format('d M Y H:i') }}</span>
                </div>

                <h2 style="margin-bottom: 14px;">{{ $informationBoard->title }}</h2>

                <div style="line-height: 1.85; color: var(--text-color);">{!! $informationBoard->content !!}</div>

                <div class="d-flex gap-2 mt-4" style="flex-wrap: wrap;">
                    <a href="{{ route('information-boards.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i>
                        Kembali
                    </a>
                    @if(auth()->user()->isAdmin() || $informationBoard->user_id === auth()->id())
                    <a href="{{ route('information-boards.edit', $informationBoard) }}" class="btn btn-primary">
                        <i class="fas fa-edit"></i>
                        Edit Artikel
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-4">
        <div class="card animate-fadeIn">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-stream text-primary"></i>
                    Artikel Terbaru
                </h3>
            </div>
            <div class="card-body" style="display: grid; gap: 12px;">
                @forelse($latestArticles as $article)
                    <a href="{{ route('information-boards.show', $article) }}" style="display: block; text-decoration: none; color: inherit; padding: 10px; border-radius: 10px; border: 1px solid var(--border-color);">
                        <div class="fw-semibold" style="margin-bottom: 4px;">{{ $article->title }}</div>
                        <div class="text-muted fs-xs">{{ optional($article->published_at)->format('d M Y H:i') ?? '-' }}</div>
                    </a>
                @empty
                    <p class="text-muted mb-0">Belum ada artikel lain.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
