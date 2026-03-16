@extends('layouts.app')

@section('title', 'Edit Artikel')
@section('page-title', 'Edit Artikel Papan Informasi')

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/trix@2.1.3/dist/trix.css">
<style>
trix-toolbar [data-trix-button-group="file-tools"] { display: none; }
trix-editor { min-height: 260px; background: #fff; border-radius: 8px; }
</style>
@endpush

@section('content')
<div class="row justify-center">
    <div class="col-12 col-lg-9">
        <div class="card animate-fadeIn">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-edit text-primary"></i>
                    Edit Artikel: {{ $informationBoard->title }}
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ route('information-boards.update', $informationBoard) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label class="form-label" for="title">Judul <span class="text-danger">*</span></label>
                        <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $informationBoard->title) }}" required>
                        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="excerpt">Ringkasan</label>
                        <textarea id="excerpt" name="excerpt" rows="2" class="form-control @error('excerpt') is-invalid @enderror">{{ old('excerpt', $informationBoard->excerpt) }}</textarea>
                        @error('excerpt')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="category_ids">Kategori</label>
                        <select id="category_ids" name="category_ids[]" class="form-control form-select @error('category_ids') is-invalid @enderror" multiple>
                            @php($selected = old('category_ids', $informationBoard->categories->pluck('id')->all()))
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" @selected(in_array($category->id, $selected))>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_ids')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        @error('category_ids.*')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Konten Artikel <span class="text-danger">*</span></label>
                        <input id="content" type="hidden" name="content" value="{{ old('content', $informationBoard->content) }}">
                        <trix-editor input="content" class="@error('content') is-invalid @enderror"></trix-editor>
                        @error('content')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="status">Status <span class="text-danger">*</span></label>
                                <select id="status" name="status" class="form-control form-select @error('status') is-invalid @enderror" required>
                                    <option value="draft" @selected(old('status', $informationBoard->status) === 'draft')>Draft</option>
                                    <option value="published" @selected(old('status', $informationBoard->status) === 'published')>Published</option>
                                </select>
                                @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="published_at">Tanggal Publish</label>
                                <input type="datetime-local" id="published_at" name="published_at" value="{{ old('published_at', optional($informationBoard->published_at)->format('Y-m-d\\TH:i')) }}" class="form-control @error('published_at') is-invalid @enderror">
                                @error('published_at')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="meta_title">Meta Title (SEO)</label>
                                <input type="text" id="meta_title" name="meta_title" class="form-control @error('meta_title') is-invalid @enderror" value="{{ old('meta_title', $informationBoard->meta_title) }}">
                                @error('meta_title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="meta_description">Meta Description (SEO)</label>
                                <input type="text" id="meta_description" name="meta_description" class="form-control @error('meta_description') is-invalid @enderror" value="{{ old('meta_description', $informationBoard->meta_description) }}">
                                @error('meta_description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="cover_image">Cover</label>
                        @if($informationBoard->cover_image_url)
                        <div style="margin-bottom: 10px;">
                            <img src="{{ $informationBoard->cover_image_url }}" alt="Cover" style="max-width: 100%; width: 320px; border-radius: 10px; border: 1px solid var(--border-color);">
                        </div>
                        @endif
                        <input type="file" id="cover_image" name="cover_image" accept="image/*" class="form-control @error('cover_image') is-invalid @enderror">
                        @error('cover_image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="d-flex gap-2 mt-4">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
                        <a href="{{ route('information-boards.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://unpkg.com/trix@2.1.3/dist/trix.umd.min.js"></script>
@endpush
