@extends('layouts.admin')

@section('title', 'Edit About Us - Admin')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h4 class="py-3 mb-0"><span class="text-muted fw-light">Admin /</span> Edit About Us</h4>
        <p class="text-muted small">Update the About Us page content and image</p>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label class="form-label">Page Title <span class="text-danger">*</span></label>
                <input type="text" name="title" value="{{ old('title', $about->title) }}" required
                    class="form-control @error('title') is-invalid @enderror">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Content <span class="text-danger">*</span></label>
                <textarea name="content" rows="10" required
                    class="form-control @error('content') is-invalid @enderror">{{ old('content', $about->content) }}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Page Image</label>

                <div id="dropZone" class="border-2 border-dashed rounded p-4 text-center" style="cursor: pointer; transition: all 0.3s;">

                    <div id="dropZoneContent">
                        @if($about->image_path)
                            <img src="{{ asset('storage/' . $about->image_path) }}" alt="About Image" style="width: 150px; height: 150px; margin: 0 auto 1rem; border-radius: 0.25rem; object-fit: cover;">
                        @else
                            <i class="bx bx-image text-muted" style="font-size: 2.5rem;"></i>
                        @endif
                        <div class="mt-2">
                            <label for="image" class="form-label text-primary" style="cursor: pointer; margin-bottom: 0;">
                                <u>{{ $about->image_path ? 'Click to change or drag new image' : 'Click to upload or drag image' }}</u>
                            </label>
                        </div>
                        <small class="text-muted d-block mt-2">
                            <strong>Supported formats:</strong> JPG, PNG (Max 5MB)
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

            <!-- Buttons -->
            <div class="pt-3 border-top">
                <a href="{{ route('admin.about.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">
                    <i class="bx bx-check me-1"></i> Update
                </button>
            </div>
        </form>
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

            const content = `
                <i class="bx bx-check-circle text-success" style="font-size: 2.5rem;"></i>
                <div class="mt-2">
                    <p class="text-success mb-1"><strong>File selected:</strong></p>
                    <p class="text-muted mb-1">${fileName}</p>
                    <small class="text-muted">${fileSize} MB</small>
                </div>
            `;

            dropZoneContent.innerHTML = content;

            imageError.style.display = 'none';
            dropZone.style.borderColor = '';
            fileSelected = true;
        }
    }

    document.addEventListener('dragover', (e) => e.preventDefault());
    document.addEventListener('drop', (e) => e.preventDefault());
});

</script>

@endsection
