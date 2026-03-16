@extends('layouts.app')

@section('title', 'Papan Informasi')
@section('page-title', 'Papan Informasi')

@section('content')
<div class="card animate-fadeIn">
    <div class="card-header" style="gap: 10px; align-items: center;">
        <h3 class="card-title">
            <i class="fas fa-newspaper text-primary"></i>
            Manajemen Artikel Informasi
        </h3>
        <a href="{{ route('information-boards.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i>
            Tulis Artikel
        </a>
    </div>

    <div class="card-body" style="border-bottom: 1px solid var(--border-color);">
        <form method="GET" action="{{ route('information-boards.index') }}" class="d-flex gap-2" style="flex-wrap: wrap;">
            <input type="text" name="q" class="form-control" placeholder="Cari judul/konten..." value="{{ $search }}" style="min-width: 220px;">
            <select name="status" class="form-control form-select" style="min-width: 140px;">
                <option value="">Semua Status</option>
                <option value="draft" @selected($status === 'draft')>Draft</option>
                <option value="published" @selected($status === 'published')>Published</option>
            </select>
            <select name="category" class="form-control form-select" style="min-width: 170px;">
                <option value="">Semua Kategori</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" @selected((string) $category === (string) $cat->id)>{{ $cat->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-secondary">
                <i class="fas fa-search"></i>
                Filter
            </button>
        </form>
    </div>

    <div class="card-body p-0">
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Penulis</th>
                        <th>Status</th>
                        <th>Dibuat</th>
                        <th class="no-sort" style="width: 230px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($informationBoards as $article)
                    <tr>
                        <td>
                            <div class="fw-semibold">{{ $article->title }}</div>
                            <div class="text-muted fs-xs">{{ \Illuminate\Support\Str::limit(strip_tags($article->excerpt ?: $article->content), 90) }}</div>
                        </td>
                        <td>
                            @forelse($article->categories as $cat)
                                <span class="badge badge-info" style="margin-right: 4px; margin-bottom: 4px;">{{ $cat->name }}</span>
                            @empty
                                <span class="text-muted fs-xs">-</span>
                            @endforelse
                        </td>
                        <td class="fs-sm">{{ $article->user?->name ?? '-' }}</td>
                        <td>
                            <span class="badge badge-{{ $article->status === 'published' ? 'success' : 'secondary' }}">{{ ucfirst($article->status) }}</span>
                        </td>
                        <td class="fs-sm">{{ $article->created_at->format('d M Y H:i') }}</td>
                        <td>
                            <div class="d-flex gap-1" style="flex-wrap: wrap;">
                                <a href="{{ route('information-boards.show', $article) }}" class="btn btn-sm btn-secondary">
                                    <i class="fas fa-eye"></i> Lihat
                                </a>
                                @if(auth()->user()->isAdmin() || $article->user_id === auth()->id())
                                <a href="{{ route('information-boards.edit', $article) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('information-boards.destroy', $article) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Hapus artikel ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted" style="padding: 24px;">Belum ada artikel.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if($informationBoards->hasPages())
    <div class="card-footer">
        {{ $informationBoards->links() }}
    </div>
    @endif
</div>
@endsection
