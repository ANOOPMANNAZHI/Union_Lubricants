@extends('layouts.admin')

@section('title', 'Posts - Admin')

@section('content')
<div class="row mb-4">
    <div class="col-12 d-flex justify-content-between align-items-center">
        <div>
            <h4 class="py-3 mb-0"><span class="text-muted fw-light">Admin /</span> Blog Posts</h4>
            <p class="text-muted small">Manage all published and draft blog articles</p>
        </div>
        <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">
            <i class="bx bx-plus me-1"></i> New Post
        </a>
    </div>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>Title</th>
                    <th class="text-center">Status</th>
                    <th>Published</th>
                    <th>Created</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $post)
                <tr>
                    <td>
                        <a href="{{ route('admin.posts.show', $post->id) }}" class="text-decoration-none">
                            <strong class="text-body">{{ $post->title }}</strong>
                        </a>
                        @if($post->excerpt)
                            <br><small class="text-muted">{{ Str::limit($post->excerpt, 60) }}</small>
                        @endif
                    </td>
                    <td class="text-center">
                        @if($post->is_published)
                            <span class="badge bg-label-success">
                                <i class="bx bx-check me-1"></i> Published
                            </span>
                        @else
                            <span class="badge bg-label-warning">
                                <i class="bx bx-time me-1"></i> Draft
                            </span>
                        @endif
                    </td>
                    <td>
                        <small class="text-muted">{{ $post->published_at ? $post->published_at->format('M d, Y') : '-' }}</small>
                    </td>
                    <td>
                        <small class="text-muted">{{ $post->created_at->format('M d, Y') }}</small>
                    </td>
                    <td class="text-end">
                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-sm btn-outline-primary me-2">
                            <i class="bx bx-pencil"></i> Edit
                        </a>
                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Are you sure you want to delete this post?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                <i class="bx bx-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-5">
                        <p class="text-muted mb-3">No posts yet</p>
                        <a href="{{ route('admin.posts.create') }}" class="btn btn-sm btn-primary">
                            <i class="bx bx-plus me-1"></i> Write First Post
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@if($posts->hasPages())
<div class="mt-3">
    {{ $posts->links() }}
</div>
@endif

@endsection
