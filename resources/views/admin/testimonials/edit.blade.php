@extends('layouts.admin')

@section('title', 'Edit Testimonial - Admin')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h4 class="py-3 mb-0"><span class="text-muted fw-light">Admin / Testimonials /</span> Edit</h4>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Edit Testimonial: {{ $testimonial->author_name }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="author_name" class="form-label">
                                <span class="text-danger">*</span> Author Name
                            </label>
                            <input type="text" id="author_name" name="author_name" class="form-control @error('author_name') is-invalid @enderror"
                                placeholder="Enter author name" value="{{ old('author_name', $testimonial->author_name) }}" required>
                            @error('author_name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="rating" class="form-label">
                                <span class="text-danger">*</span> Rating
                            </label>
                            <select id="rating" name="rating" class="form-select @error('rating') is-invalid @enderror" required>
                                <option value="">Select rating</option>
                                <option value="5" {{ old('rating', $testimonial->rating) == 5 ? 'selected' : '' }}>
                                    <i class="bx bxs-star"></i> 5 Stars - Excellent
                                </option>
                                <option value="4" {{ old('rating', $testimonial->rating) == 4 ? 'selected' : '' }}>
                                    <i class="bx bxs-star"></i> 4 Stars - Very Good
                                </option>
                                <option value="3" {{ old('rating', $testimonial->rating) == 3 ? 'selected' : '' }}>
                                    <i class="bx bxs-star"></i> 3 Stars - Good
                                </option>
                                <option value="2" {{ old('rating', $testimonial->rating) == 2 ? 'selected' : '' }}>
                                    <i class="bx bxs-star"></i> 2 Stars - Fair
                                </option>
                                <option value="1" {{ old('rating', $testimonial->rating) == 1 ? 'selected' : '' }}>
                                    <i class="bx bxs-star"></i> 1 Star - Poor
                                </option>
                            </select>
                            @error('rating')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="author_company" class="form-label">Company</label>
                            <input type="text" id="author_company" name="author_company" class="form-control @error('author_company') is-invalid @enderror"
                                placeholder="e.g., ABC Corporation" value="{{ old('author_company', $testimonial->author_company) }}">
                            @error('author_company')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="author_position" class="form-label">Position/Title</label>
                            <input type="text" id="author_position" name="author_position" class="form-control @error('author_position') is-invalid @enderror"
                                placeholder="e.g., CEO, Manager" value="{{ old('author_position', $testimonial->author_position) }}">
                            @error('author_position')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">
                            <span class="text-danger">*</span> Testimonial Content
                        </label>
                        <textarea id="content" name="content" class="form-control @error('content') is-invalid @enderror"
                            rows="5" placeholder="Enter the testimonial text" required>{{ old('content', $testimonial->content) }}</textarea>
                        @error('content')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                        <small class="text-muted">Minimum 10 characters required</small>
                    </div>

                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1"
                                {{ old('is_featured', $testimonial->is_featured) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_featured">
                                <i class="bx bxs-star text-warning"></i> Feature this testimonial on homepage
                            </label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="author_image" class="form-label">Author Image</label>

                        @if($testimonial->author_image)
                        <div class="mb-3">
                            <div class="d-flex align-items-center gap-3 p-3 bg-light rounded">
                                <img src="{{ asset('storage/' . $testimonial->author_image) }}" alt="{{ $testimonial->author_name }}"
                                    class="rounded" style="width: 80px; height: 80px; object-fit: cover;">
                                <div>
                                    <p class="mb-1"><strong>Current Image</strong></p>
                                    <small class="text-muted">{{ basename($testimonial->author_image) }}</small>
                                </div>
                            </div>
                        </div>
                        @endif

                        <div class="border-2 border-dashed rounded p-4 text-center">
                            <i class="bx bx-image text-muted" style="font-size: 2rem;"></i>
                            <div class="mt-2">
                                <label for="author_image" class="form-label text-primary cursor-pointer" style="cursor: pointer;">
                                    <u>{{ $testimonial->author_image ? 'Change image' : 'Upload a file' }}</u>
                                </label>
                                <input id="author_image" type="file" accept="image/*" name="author_image"
                                    class="d-none @error('author_image') is-invalid @enderror">
                            </div>
                            <small class="text-muted d-block mt-2">Supported formats: JPG, PNG, GIF (Max 2MB)</small>
                            @if($testimonial->author_image)
                                <small class="text-muted d-block mt-2">Leave empty to keep current image</small>
                            @endif
                        </div>
                        @error('author_image')
                            <span class="invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bx bx-check me-1"></i> Update Testimonial
                        </button>
                        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline-secondary">
                            <i class="bx bx-arrow-back me-1"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
