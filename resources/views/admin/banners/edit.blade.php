@extends('layouts.admin')

@section('title', 'Edit Banner - Admin')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h4 class="py-3 mb-0"><span class="text-muted fw-light">Admin / Banners /</span> Edit</h4>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Edit Banner: {{ $banner->heading }}</h5>
                <small class="text-muted">Image dimensions: 1920x960px recommended</small>
            </div>
            <div class="card-body">
                <form id="bannerForm" action="{{ route('admin.banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data" novalidate>
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="heading" class="form-label">
                            <span class="text-danger">*</span> Banner Heading
                        </label>
                        <input type="text" id="heading" name="heading" class="form-control @error('heading') is-invalid @enderror"
                            placeholder="Enter banner heading" value="{{ old('heading', $banner->heading) }}" required>
                        @error('heading')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">
                            <span class="text-danger">*</span> Banner Description
                        </label>
                        <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror"
                            rows="4" placeholder="Enter the banner description" required>{{ old('description', $banner->description) }}</textarea>
                        @error('description')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                        <small class="text-muted">Minimum 10 characters required</small>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Banner Image</label>

                        <div class="mb-3">
                            <div class="card border">
                                <img src="{{ asset('storage/' . $banner->image_path) }}" alt="{{ $banner->heading }}"
                                    class="card-img-top" style="height: 250px; object-fit: cover;">
                                <div class="card-body">
                                    <small class="text-muted">
                                        <strong>Current Image</strong><br>
                                        {{ basename($banner->image_path) }}<br>
                                        <strong>Uploaded:</strong> {{ $banner->created_at->format('M d, Y H:i') }}
                                    </small>
                                </div>
                            </div>
                        </div>

                        <div id="dropZone" class="border-2 border-dashed rounded p-4 text-center" style="cursor: pointer; transition: all 0.3s;">
                            <i class="bx bx-image text-muted" style="font-size: 2.5rem;"></i>
                            <div class="mt-2">
                                <label for="image" class="form-label text-primary" style="cursor: pointer; margin-bottom: 0;">
                                    <u>Click to upload or drag new image</u>
                                </label>
                                <input id="image" type="file" accept="image/jpeg,image/png,image/jpg" name="image"
                                    class="d-none @error('image') is-invalid @enderror">
                            </div>
                            <small class="text-muted d-block mt-2">
                                <strong>Recommended size:</strong> 1920x960px<br>
                                <strong>Supported formats:</strong> JPG, PNG (Max 5MB)<br>
                                <strong>Leave empty to keep current image</strong>
                            </small>
                        </div>
                        @error('image')
                            <span class="invalid-feedback d-block mt-2">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bx bx-check me-1"></i> Update Banner
                        </button>
                        <a href="{{ route('admin.banners.index') }}" class="btn btn-outline-secondary">
                            <i class="bx bx-arrow-back me-1"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Drag and drop functionality
    document.addEventListener('DOMContentLoaded', function() {
        const imageInput = document.getElementById('image');
        const dropZone = document.getElementById('dropZone');
        const form = document.getElementById('bannerForm');

        // Track if file is selected
        let fileSelected = false;

        // Click to upload
        dropZone.addEventListener('click', (e) => {
            if (!e.target.closest('input')) {
                imageInput.click();
            }
        });

        // Drag over
        dropZone.addEventListener('dragover', (e) => {
            e.preventDefault();
            e.stopPropagation();
            dropZone.style.backgroundColor = '#e8f5e9';
            dropZone.style.borderColor = '#4caf50';
        });

        // Drag leave
        dropZone.addEventListener('dragleave', (e) => {
            e.preventDefault();
            e.stopPropagation();
            dropZone.style.backgroundColor = '';
            dropZone.style.borderColor = '';
        });

        // Drop
        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            e.stopPropagation();
            dropZone.style.backgroundColor = '';
            dropZone.style.borderColor = '';

            const files = e.dataTransfer.files;
            if (files.length > 0) {
                // Set files using a proper transfer
                const dt = new DataTransfer();
                dt.items.add(files[0]);
                imageInput.files = dt.files;
                handleFileSelect();
            }
        });

        // File input change - show selected file name
        imageInput.addEventListener('change', handleFileSelect);

        function handleFileSelect() {
            if (imageInput.files && imageInput.files.length > 0) {
                const file = imageInput.files[0];
                const fileName = file.name;
                const fileSize = (file.size / 1024 / 1024).toFixed(2);

                // Validate file type
                const validTypes = ['image/jpeg', 'image/png', 'image/jpg'];
                if (!validTypes.includes(file.type)) {
                    alert('Please select a valid image file (JPG or PNG).');
                    imageInput.value = '';
                    fileSelected = false;
                    return;
                }

                // Validate file size (5MB)
                if (file.size > 5 * 1024 * 1024) {
                    alert('File size must not exceed 5MB.');
                    imageInput.value = '';
                    fileSelected = false;
                    return;
                }

                const content = `
                    <i class="bx bx-check-circle text-success" style="font-size: 2.5rem;"></i>
                    <div class="mt-2">
                        <p class="text-success mb-1"><strong>File selected:</strong></p>
                        <p class="text-muted mb-1">${fileName}</p>
                        <small class="text-muted">${fileSize} MB</small>
                    </div>
                `;
                dropZone.innerHTML = content;
                dropZone.style.borderColor = '';
                fileSelected = true;
            }
        }

        // Prevent default drag and drop behavior on document
        document.addEventListener('dragover', (e) => {
            e.preventDefault();
        });
        document.addEventListener('drop', (e) => {
            e.preventDefault();
        });
    });
</script>

@endsection
