@extends('layouts.admin')

@section('title', 'About Us - Admin')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h4 class="py-3 mb-0"><span class="text-muted fw-light">Admin /</span> About Us Page</h4>
        <p class="text-muted small">Manage the About Us page content and images</p>
    </div>
</div>

@if($about)
    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-lg-8">
                    <h5 class="mb-2">{{ $about->title }}</h5>
                    <p class="text-muted">{{ Str::limit($about->content, 150) }}</p>
                </div>
                <div class="col-lg-4 text-end">
                    <a href="{{ route('admin.about.edit', $about->id) }}" class="btn btn-outline-primary">
                        <i class="bx bx-pencil me-1"></i> Edit
                    </a>
                </div>
            </div>

            @if($about->image_path)
                <div class="mt-3">
                    <img src="{{ asset('storage/' . $about->image_path) }}" alt="{{ $about->title }}" style="max-width: 300px; border-radius: 0.25rem;">
                </div>
            @endif
        </div>
    </div>
@else
    <div class="alert alert-info">
        <p>No About Us content yet. Create one to get started.</p>
    </div>
    @php
        // Create default about if none exists
        \App\Models\About::create([
            'title' => 'About Union Lubricants',
            'content' => 'Welcome to Union Lubricants. We are a leading provider of premium lubricant solutions for industrial applications.',
        ]);
    @endphp
@endif

@endsection
