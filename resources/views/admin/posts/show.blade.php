@extends('layouts.admin')

@section('title', $post->title . ' - Blog Post')

@section('content')
<div class="row mb-4">
    <div class="col-12 d-flex justify-content-between align-items-start">
        <div>
            <h4 class="py-3 mb-0"><span class="text-muted fw-light">Admin / Posts /</span> {{ $post->title }}</h4>
            <p class="text-muted small">Published on {{ $post->published_at ? $post->published_at->format('M d, Y H:i') : 'Not published yet' }}</p>
        </div>
        <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-primary">
            <i class="bx bx-arrow-back me-1"></i> Back to Posts
        </a>
    </div>
</div>

<div class="row g-4">
    <!-- Main Content -->
    <div class="col-lg-8">
        <!-- Featured Image -->
        @if($post->featured_image)
        <div class="card mb-3">
            <img src="{{ asset('storage/' . $post->featured_image) }}" class="card-img-top" alt="{{ $post->title }}" style="max-height: 400px; object-fit: cover;">
        </div>
        @endif

        <!-- Post Content -->
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="mb-0">Post Content</h5>
            </div>
            <div class="card-body">
                <div class="mb-4 pb-4 border-bottom">
                    <p class="text-muted small text-uppercase fw-semibold mb-2">Title</p>
                    <h6 class="fw-semibold">{{ $post->title }}</h6>
                </div>

                @if($post->excerpt)
                <div class="mb-4 pb-4 border-bottom">
                    <p class="text-muted small text-uppercase fw-semibold mb-2">Excerpt</p>
                    <p class="text-body">{{ $post->excerpt }}</p>
                </div>
                @endif

                <div>
                    <p class="text-muted small text-uppercase fw-semibold mb-2">Content</p>
                    <p class="text-body">{{ nl2br(e($post->content)) }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="col-lg-4">
        <!-- Status Card -->
        <div class="card mb-3">
            <div class="card-header">
                <h6 class="mb-0">Status</h6>
            </div>
            <div class="card-body">
                @if($post->is_published)
                    <span class="badge bg-label-success">
                        <i class="bx bx-check-circle me-1"></i> Published
                    </span>
                @else
                    <span class="badge bg-label-warning">
                        <i class="bx bx-time me-1"></i> Draft
                    </span>
                @endif
            </div>
        </div>

        <!-- Metadata Card -->
        <div class="card mb-3">
            <div class="card-header">
                <h6 class="mb-0">Information</h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <p class="text-muted small mb-1">Created</p>
                    <p class="small">{{ $post->created_at->format('M d, Y H:i') }}</p>
                </div>
                <div class="mb-3">
                    <p class="text-muted small mb-1">Updated</p>
                    <p class="small">{{ $post->updated_at->format('M d, Y H:i') }}</p>
                </div>
                @if($post->published_at)
                <div>
                    <p class="text-muted small mb-1">Published</p>
                    <p class="small">{{ $post->published_at->format('M d, Y H:i') }}</p>
                </div>
                @endif
            </div>
        </div>

        <!-- Actions Card -->
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Actions</h6>
            </div>
            <div class="card-body">
                <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-info w-100 mb-2">
                    <i class="bx bx-pencil me-1"></i> Edit Post
                </a>
                <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Are you sure you want to delete this post?')">
                        <i class="bx bx-trash me-1"></i> Delete Post
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
