@extends('layouts.admin')

@section('title', 'Create Post - Admin')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h4 class="py-3 mb-0"><span class="text-muted fw-light">Admin /</span> Create New Post</h4>
        <p class="text-muted small">Write and publish a new blog article</p>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Post Title <span class="text-danger">*</span></label>
                <input type="text" name="title" value="{{ old('title') }}" required
                    class="form-control @error('title') is-invalid @enderror">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Excerpt</label>
                <input type="text" name="excerpt" value="{{ old('excerpt') }}"
                    class="form-control @error('excerpt') is-invalid @enderror" placeholder="Short summary of the post">
                @error('excerpt')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Content <span class="text-danger">*</span></label>
                <textarea name="content" rows="8" required
                    class="form-control @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Featured Image <span class="text-danger">*</span></label>

                <div id="dropZone" class="border-2 border-dashed rounded p-4 text-center" style="cursor: pointer; transition: all 0.3s;">

                    <div id="dropZoneContent">
                        <i class="bx bx-image text-muted" style="font-size: 2.5rem;"></i>
                        <div class="mt-2">
                            <label for="featured_image" class="form-label text-primary" style="cursor: pointer; margin-bottom: 0;">
                                <u>Click to upload or drag image</u>
                            </label>
                        </div>
                        <small class="text-muted d-block mt-2">
                            <strong>Required dimensions:</strong> 800x500px<br>
                            <strong>Supported formats:</strong> JPG, PNG (Max 5MB)
                        </small>
                    </div>

                    <input id="featured_image" type="file" accept="image/jpeg,image/png,image/jpg" name="featured_image"
                           class="d-none @error('featured_image') is-invalid @enderror">
                </div>

                <div id="imageError" class="invalid-feedback d-block mt-2" style="display: none;">
                    The image file is invalid or too large.
                </div>
                @error('featured_image')
                    <span class="invalid-feedback d-block mt-2">{{ $message }}</span>
                @enderror
            </div>

            <!-- Publish Toggle -->
            <div class="form-check mb-3 p-3 bg-light rounded">
                <input type="checkbox" name="is_published" value="1" id="is_published" class="form-check-input" checked>
                <label class="form-check-label" for="is_published">
                    <strong>Publish this post</strong>
                    <p class="text-muted small mb-0">Make this post visible on your blog frontend</p>
                </label>
            </div>

            <!-- Buttons -->
            <div class="pt-3 border-top">
                <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">
                    <i class="bx bx-check me-1"></i> Publish Post
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Drag and drop functionality
    document.addEventListener('DOMContentLoaded', function() {
    const imageInput = document.getElementById('featured_image');
    const dropZone = document.getElementById('dropZone');
    const dropZoneContent = document.getElementById('dropZoneContent');
    const imageError = document.getElementById('imageError');
    const form = document.querySelector('form');

    let fileSelected = false;

    dropZone.addEventListener('click', (e) => {
        if (!e.target.closest('input')) {
            imageInput.click();
        }
    });

    dropZone.addEventListener('dragover', (e) => {
        e.preventDefault();
        e.stopPropagation();
        dropZone.style.backgroundColor = '#e8f5e9';
        dropZone.style.borderColor = '#4caf50';
    });

    dropZone.addEventListener('dragleave', (e) => {
        e.preventDefault();
        e.stopPropagation();
        dropZone.style.backgroundColor = '';
        dropZone.style.borderColor = '';
    });

    dropZone.addEventListener('drop', (e) => {
        e.preventDefault();
        e.stopPropagation();
        dropZone.style.backgroundColor = '';
        dropZone.style.borderColor = '';

        const files = e.dataTransfer.files;
        if (files.length > 0) {
            const dt = new DataTransfer();
            dt.items.add(files[0]);
            imageInput.files = dt.files;
            handleFileSelect();
        }
    });

    imageInput.addEventListener('change', handleFileSelect);

    function handleFileSelect() {
        if (imageInput.files && imageInput.files.length > 0) {
            const file = imageInput.files[0];
            const fileName = file.name;
            const fileSize = (file.size / 1024 / 1024).toFixed(2);

            const validTypes = ['image/jpeg', 'image/png', 'image/jpg'];
            if (!validTypes.includes(file.type)) {
                imageError.textContent = 'Please select a valid image file (JPG or PNG).';
                imageError.style.display = 'block';
                dropZone.style.borderColor = '#dc3545';
                fileSelected = false;
                return;
            }

            if (file.size > 5 * 1024 * 1024) {
                imageError.textContent = 'File size must not exceed 5MB.';
                imageError.style.display = 'block';
                dropZone.style.borderColor = '#dc3545';
                fileSelected = false;
                return;
            }

            // Check image dimensions
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = new Image();
                img.onload = function() {
                    if (img.width !== 600 || img.height !== 400) {
                        imageError.textContent = `Image dimensions must be exactly 600x400px. Current dimensions: ${img.width}x${img.height}px`;
                        imageError.style.display = 'block';
                        dropZone.style.borderColor = '#dc3545';
                        fileSelected = false;
                        return;
                    }

                    displayFileSuccess(fileName, fileSize);
                };
                img.onerror = function() {
                    imageError.textContent = 'Unable to read image file. Please try again.';
                    imageError.style.display = 'block';
                    dropZone.style.borderColor = '#dc3545';
                    fileSelected = false;
                };
                img.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }

    function displayFileSuccess(fileName, fileSize) {
        const content = `
            <i class="bx bx-check-circle text-success" style="font-size: 2.5rem;"></i>
            <div class="mt-2">
                <p class="text-success mb-1"><strong>File selected:</strong></p>
                <p class="text-muted mb-1">${fileName}</p>
                <small class="text-muted">${fileSize} MB | 600x400px</small>
            </div>
        `;

        dropZoneContent.innerHTML = content;

        imageError.style.display = 'none';
        dropZone.style.borderColor = '';
        fileSelected = true;
    }

    form.addEventListener('submit', function(e) {
        if (!fileSelected || !imageInput.files || imageInput.files.length === 0) {
            e.preventDefault();
            e.stopPropagation();
            imageError.textContent = 'Featured image is required. Please upload an image with dimensions 600x400px.';
            imageError.style.display = 'block';
            dropZone.style.borderColor = '#dc3545';
            return false;
        }
    });
});

</script>

@endsection
