@extends('layouts.admin')

@section('title', 'Edit Service - Admin')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h4 class="py-3 mb-0"><span class="text-muted fw-light">Admin / Services /</span> Edit</h4>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Edit Service: {{ $service->title }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="title" class="form-label">
                                <span class="text-danger">*</span> Service Title
                            </label>
                            <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror"
                                placeholder="Enter service title" value="{{ old('title', $service->title) }}" required>
                            @error('title')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="icon" class="form-label">Icon</label>
                            <input type="text" id="icon" name="icon" class="form-control @error('icon') is-invalid @enderror"
                                placeholder="e.g., bx-shield, bx-wrench" value="{{ old('icon', $service->icon) }}">
                            @error('icon')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <small class="text-muted d-block mt-2">
                                <strong>Icon Class Name Instructions:</strong><br>
                                • Visit <a href="https://fontawesome.com/icons" target="_blank" class="text-primary"><strong>Font Awesome Icons</strong></a><br>
                                • Search for desired icon<br>
                                • Copy the icon class name (e.g., <code>fa-shield</code>, <code>fa-wrench</code>, <code>fa-gear</code>)<br>
                                • Paste it in this field<br>
                                <strong>Example:</strong> <code>fa-shield</code>, <code>fa-wrench</code>, <code>fa-cogs</code>
                            </small>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">
                            <span class="text-danger">*</span> Service Description
                        </label>
                        <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror"
                            rows="5" placeholder="Enter the service description" required>{{ old('description', $service->description) }}</textarea>
                        @error('description')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                        <small class="text-muted">Minimum 10 characters required</small>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Service Image</label>

                        <div id="dropZone" class="border-2 border-dashed rounded p-4 text-center" style="cursor: pointer; transition: all 0.3s;">

                            <div id="dropZoneContent">
                                @if($service->image_path)
                                    <img src="{{ asset('storage/' . $service->image_path) }}" alt="{{ $service->title }}" style="width: 150px; height: 150px; margin: 0 auto 1rem; border-radius: 0.25rem; object-fit: cover;">
                                @else
                                    <i class="bx bx-image text-muted" style="font-size: 2.5rem;"></i>
                                @endif
                                <div class="mt-2">
                                    <label for="image" class="form-label text-primary" style="cursor: pointer; margin-bottom: 0;">
                                        <u>{{ $service->image_path ? 'Click to change or drag new image' : 'Click to upload or drag image' }}</u>
                                    </label>
                                </div>
                                <small class="text-muted d-block mt-2">
                                    <strong>Required dimensions:</strong> 600x400px<br>
                                    <strong>Supported formats:</strong> JPG, PNG (Max 5MB)<br>
                                    @if($service->image_path)
                                    <span class="text-muted">Leave empty to keep current image</span>
                                    @endif
                                </small>
                            </div>

                            <input id="image" type="file" accept="image/jpeg,image/png,image/jpg" name="image"
                                   class="d-none @error('image') is-invalid @enderror">
                        </div>

                        <div id="imageError" class="invalid-feedback d-block mt-2" style="display: none;">
                            The image file is invalid or too large.
                        </div>
                        @error('image')
                            <span class="invalid-feedback d-block mt-2">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bx bx-check me-1"></i> Update Service
                        </button>
                        <a href="{{ route('admin.services.index') }}" class="btn btn-outline-secondary">
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

    document.addEventListener('dragover', (e) => e.preventDefault());
    document.addEventListener('drop', (e) => e.preventDefault());
});

</script>

@endsection
