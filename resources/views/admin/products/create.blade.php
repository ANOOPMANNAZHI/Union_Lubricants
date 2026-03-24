@extends('layouts.admin')

@section('page_title', 'Create Product')
@section('title', 'Create Product - Admin')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h4 class="py-3 mb-0"><span class="text-muted fw-light">Admin /</span> Create New Product</h4>
        <p class="text-muted small">Add a new product to the catalog with images and documentation</p>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="row g-4">
            <!-- Left Column -->
            <div class="col-md-6">
                <!-- Category -->
                <div class="mb-3">
                    <label class="form-label">Category <span class="text-danger">*</span></label>
                    <select name="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
                        <option value="">Select a category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" @if(old('category_id') == $category->id) selected @endif>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Product Name -->
                <div class="mb-3">
                    <label class="form-label">Product Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="e.g., Synthetic Motor Oil 5W-30" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Product Code -->
                <div class="mb-3">
                    <label class="form-label">Product Code <span class="text-danger">*</span></label>
                    <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" placeholder="e.g., SMO-5W30-LT" value="{{ old('code') }}" required>
                    @error('code')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Viscosity Grade -->
                <div class="mb-3">
                    <label class="form-label">Viscosity Grade</label>
                    <input type="text" name="viscosity_grade" class="form-control @error('viscosity_grade') is-invalid @enderror" placeholder="e.g., 5W-30, 10W-40" value="{{ old('viscosity_grade') }}">
                    @error('viscosity_grade')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Short Description -->
                <div class="mb-3">
                    <label class="form-label">Short Description</label>
                    <textarea name="short_description" rows="3" class="form-control @error('short_description') is-invalid @enderror" placeholder="Brief description for listings">{{ old('short_description') }}</textarea>
                    @error('short_description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-md-6">
                <!-- Product Image -->
                <div class="mb-3">
                    <label class="form-label">Product Image <span class="text-danger">*</span></label>
                    <div class="border-2 border-dashed rounded p-4 text-center cursor-pointer" id="dropZone" style="border-color: #dee2e6; transition: all 0.3s;">
                        <input type="file" name="image" id="imageInput" accept="image/jpeg,image/png" class="d-none">
                        <div id="dropZoneContent">
                            <i class="bx bx-image text-muted" style="font-size: 2.5rem;"></i>
                            <p class="mt-2 mb-0 text-muted small">Click or drag image here</p>
                            <p class="text-muted" style="font-size: 0.85rem;">JPG, PNG | Required dimensions: 600x400px | Max 5MB</p>
                        </div>
                        <img id="imagePreview" style="display: none; max-height: 200px; border-radius: 0.25rem; margin-top: 10px;">
                        <p id="imageSuccess" style="display: none; margin-top: 10px;" class="text-success small fw-bold"></p>
                    </div>
                    <div id="imageError" style="display: none; margin-top: 8px;" class="alert alert-danger py-2 px-3 small mb-0"></div>
                    @error('image')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- TDS PDF -->
                <div class="mb-3">
                    <label class="form-label">Technical Data Sheet (TDS) PDF</label>
                    <div class="border-2 border-dashed rounded p-4 text-center cursor-pointer" id="tdsDrop" style="border-color: #dee2e6; transition: all 0.3s;">
                        <input type="file" name="tds_pdf" id="tdsInput" accept="application/pdf" class="d-none">
                        <div id="tdsDropZoneContent">
                            <i class="bx bx-file text-muted" style="font-size: 2.5rem;"></i>
                            <p class="mt-2 mb-0 text-muted small">Click or drag PDF here</p>
                            <p class="text-muted" style="font-size: 0.85rem;">PDF only | Max 10MB</p>
                        </div>
                        <p id="tdsSuccess" style="display: none; margin-top: 10px;" class="text-success small fw-bold"></p>
                    </div>
                    <div id="tdsError" style="display: none; margin-top: 8px;" class="alert alert-danger py-2 px-3 small mb-0"></div>
                    @error('tds_pdf')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- MSDS PDF -->
                <div class="mb-3">
                    <label class="form-label">Material Safety Data Sheet (MSDS) PDF</label>
                    <div class="border-2 border-dashed rounded p-4 text-center cursor-pointer" id="msdsDrop" style="border-color: #dee2e6; transition: all 0.3s;">
                        <input type="file" name="msds_pdf" id="msdsInput" accept="application/pdf" class="d-none">
                        <div id="msdsDropZoneContent">
                            <i class="bx bx-file text-muted" style="font-size: 2.5rem;"></i>
                            <p class="mt-2 mb-0 text-muted small">Click or drag PDF here</p>
                            <p class="text-muted" style="font-size: 0.85rem;">PDF only | Max 10MB</p>
                        </div>
                        <p id="msdsSuccess" style="display: none; margin-top: 10px;" class="text-success small fw-bold"></p>
                    </div>
                    <div id="msdsError" style="display: none; margin-top: 8px;" class="alert alert-danger py-2 px-3 small mb-0"></div>
                    @error('msds_pdf')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

            <!-- Full Width Fields -->
            <div class="col-12 pt-4 border-top">
                <!-- Description -->
                <div class="mb-3">
                    <label class="form-label">Full Description</label>
                    <textarea name="description" rows="5" class="form-control @error('description') is-invalid @enderror" placeholder="Detailed product description...">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Specifications -->
                <div class="mb-3">
                    <label class="form-label">Specifications</label>
                    <textarea name="specifications" rows="4" class="form-control @error('specifications') is-invalid @enderror" placeholder="Technical specifications (can include JSON or key-value pairs)">{{ old('specifications') }}</textarea>
                    @error('specifications')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Applications -->
                <div class="mb-3">
                    <label class="form-label">Applications</label>
                    <textarea name="applications" rows="4" class="form-control @error('applications') is-invalid @enderror" placeholder="Where this product is used...">{{ old('applications') }}</textarea>
                    @error('applications')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Pack Sizes -->
                <div class="mb-3">
                    <label class="form-label">Pack Sizes (comma-separated)</label>
                    <input type="text" name="pack_sizes" class="form-control @error('pack_sizes') is-invalid @enderror" placeholder="e.g., 1L, 5L, 20L, 210L" value="{{ old('pack_sizes') }}">
                    <small class="text-muted">Enter multiple sizes separated by commas</small>
                    @error('pack_sizes')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Industries -->
                <div class="mb-3">
                    <label class="form-label">Industries</label>
                    <div class="row g-2">
                        @foreach($industries as $industry)
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input type="checkbox" name="industries[]" value="{{ $industry->id }}" id="industry-{{ $industry->id }}" class="form-check-input">
                                    <label class="form-check-label" for="industry-{{ $industry->id }}">
                                        {{ $industry->name }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @error('industries')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Status -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-check">
                            <input type="checkbox" name="is_active" value="1" id="is_active" class="form-check-input" @if(old('is_active') == 1 || true) checked @endif>
                            <label class="form-check-label" for="is_active">
                                Active Product
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check">
                            <input type="checkbox" name="is_featured" value="1" id="is_featured" class="form-check-input" @if(old('is_featured') == 1) checked @endif>
                            <label class="form-check-label" for="is_featured">
                                <i class="bx bxs-star"></i> Featured Product
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="pt-3 border-top mt-3">
            <button type="submit" class="btn btn-primary">
                <i class="bx bx-check me-1"></i> Create Product
            </button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

<script>
// Image file validation and preview
const imageInput = document.getElementById('imageInput');
const imagePreview = document.getElementById('imagePreview');
const imageSuccess = document.getElementById('imageSuccess');
const imageError = document.getElementById('imageError');
const dropZone = document.getElementById('dropZone');
const dropZoneContent = document.getElementById('dropZoneContent');

function handleImageSelect() {
    const file = imageInput.files[0];
    if (!file) return;

    // Validate file type
    if (!['image/jpeg', 'image/png'].includes(file.type)) {
        imageError.textContent = 'Only JPG and PNG images are allowed.';
        imageError.style.display = 'block';
        imageSuccess.style.display = 'none';
        imagePreview.style.display = 'none';
        dropZoneContent.style.display = 'block';
        return;
    }

    // Validate file size (5MB max)
    if (file.size > 5 * 1024 * 1024) {
        imageError.textContent = `File size (${(file.size / (1024 * 1024)).toFixed(2)}MB) exceeds 5MB limit.`;
        imageError.style.display = 'block';
        imageSuccess.style.display = 'none';
        imagePreview.style.display = 'none';
        dropZoneContent.style.display = 'block';
        return;
    }

    // Check image dimensions
    const reader = new FileReader();
    reader.onload = function(e) {
        const img = new Image();
        img.onload = function() {
            if (img.width !== 600 || img.height !== 400) {
                imageError.textContent = `Image dimensions are ${img.width}x${img.height}px. Required: 600x400px.`;
                imageError.style.display = 'block';
                imageSuccess.style.display = 'none';
                imagePreview.style.display = 'none';
                dropZoneContent.style.display = 'block';
                return;
            }

            // Validation passed
            imagePreview.src = e.target.result;
            imagePreview.style.display = 'block';
            dropZoneContent.style.display = 'none';
            imageError.style.display = 'none';
            displayImageSuccess(file);
        };
        img.onerror = function() {
            imageError.textContent = 'Invalid image file.';
            imageError.style.display = 'block';
            imageSuccess.style.display = 'none';
            imagePreview.style.display = 'none';
            dropZoneContent.style.display = 'block';
        };
        img.src = e.target.result;
    };
    reader.readAsDataURL(file);
}

function displayImageSuccess(file) {
    imageSuccess.textContent = `✓ ${file.name} (${(file.size / 1024).toFixed(2)}KB) - 600x400px`;
    imageSuccess.style.display = 'block';
}

// Drag and drop for image
dropZone.addEventListener('dragover', (e) => {
    e.preventDefault();
    dropZone.style.borderColor = '#0054a6';
    dropZone.style.backgroundColor = '#e3f2fd';
});

dropZone.addEventListener('dragleave', () => {
    dropZone.style.borderColor = '#dee2e6';
    dropZone.style.backgroundColor = 'transparent';
});

dropZone.addEventListener('drop', (e) => {
    e.preventDefault();
    dropZone.style.borderColor = '#dee2e6';
    dropZone.style.backgroundColor = 'transparent';

    const dt = new DataTransfer();
    dt.items.add(e.dataTransfer.files[0]);
    imageInput.files = dt.files;
    handleImageSelect();
});

dropZone.addEventListener('click', () => {
    imageInput.click();
});

imageInput.addEventListener('change', handleImageSelect);

// TDS PDF validation
const tdsInput = document.getElementById('tdsInput');
const tdsSuccess = document.getElementById('tdsSuccess');
const tdsError = document.getElementById('tdsError');
const tdsDrop = document.getElementById('tdsDrop');
const tdsDropZoneContent = document.getElementById('tdsDropZoneContent');

function handleTdsSelect() {
    const file = tdsInput.files[0];
    if (!file) return;

    // Validate file type
    if (file.type !== 'application/pdf') {
        tdsError.textContent = 'Only PDF files are allowed.';
        tdsError.style.display = 'block';
        tdsSuccess.style.display = 'none';
        tdsDropZoneContent.style.display = 'block';
        return;
    }

    // Validate file size (10MB max)
    if (file.size > 10 * 1024 * 1024) {
        tdsError.textContent = `File size (${(file.size / (1024 * 1024)).toFixed(2)}MB) exceeds 10MB limit.`;
        tdsError.style.display = 'block';
        tdsSuccess.style.display = 'none';
        tdsDropZoneContent.style.display = 'block';
        return;
    }

    tdsDropZoneContent.style.display = 'none';
    tdsError.style.display = 'none';
    tdsSuccess.textContent = `✓ ${file.name} (${(file.size / 1024).toFixed(2)}KB)`;
    tdsSuccess.style.display = 'block';
}

// Drag and drop for TDS
tdsDrop.addEventListener('dragover', (e) => {
    e.preventDefault();
    tdsDrop.style.borderColor = '#0054a6';
    tdsDrop.style.backgroundColor = '#e3f2fd';
});

tdsDrop.addEventListener('dragleave', () => {
    tdsDrop.style.borderColor = '#dee2e6';
    tdsDrop.style.backgroundColor = 'transparent';
});

tdsDrop.addEventListener('drop', (e) => {
    e.preventDefault();
    tdsDrop.style.borderColor = '#dee2e6';
    tdsDrop.style.backgroundColor = 'transparent';

    const dt = new DataTransfer();
    dt.items.add(e.dataTransfer.files[0]);
    tdsInput.files = dt.files;
    handleTdsSelect();
});

tdsDrop.addEventListener('click', () => {
    tdsInput.click();
});

tdsInput.addEventListener('change', handleTdsSelect);

// MSDS PDF validation
const msdsInput = document.getElementById('msdsInput');
const msdsSuccess = document.getElementById('msdsSuccess');
const msdsError = document.getElementById('msdsError');
const msdsDrop = document.getElementById('msdsDrop');
const msdsDropZoneContent = document.getElementById('msdsDropZoneContent');

function handleMsdsSelect() {
    const file = msdsInput.files[0];
    if (!file) return;

    // Validate file type
    if (file.type !== 'application/pdf') {
        msdsError.textContent = 'Only PDF files are allowed.';
        msdsError.style.display = 'block';
        msdsSuccess.style.display = 'none';
        msdsDropZoneContent.style.display = 'block';
        return;
    }

    // Validate file size (10MB max)
    if (file.size > 10 * 1024 * 1024) {
        msdsError.textContent = `File size (${(file.size / (1024 * 1024)).toFixed(2)}MB) exceeds 10MB limit.`;
        msdsError.style.display = 'block';
        msdsSuccess.style.display = 'none';
        msdsDropZoneContent.style.display = 'block';
        return;
    }

    msdsDropZoneContent.style.display = 'none';
    msdsError.style.display = 'none';
    msdsSuccess.textContent = `✓ ${file.name} (${(file.size / 1024).toFixed(2)}KB)`;
    msdsSuccess.style.display = 'block';
}

// Drag and drop for MSDS
msdsDrop.addEventListener('dragover', (e) => {
    e.preventDefault();
    msdsDrop.style.borderColor = '#0054a6';
    msdsDrop.style.backgroundColor = '#e3f2fd';
});

msdsDrop.addEventListener('dragleave', () => {
    msdsDrop.style.borderColor = '#dee2e6';
    msdsDrop.style.backgroundColor = 'transparent';
});

msdsDrop.addEventListener('drop', (e) => {
    e.preventDefault();
    msdsDrop.style.borderColor = '#dee2e6';
    msdsDrop.style.backgroundColor = 'transparent';

    const dt = new DataTransfer();
    dt.items.add(e.dataTransfer.files[0]);
    msdsInput.files = dt.files;
    handleMsdsSelect();
});

msdsDrop.addEventListener('click', () => {
    msdsInput.click();
});

msdsInput.addEventListener('change', handleMsdsSelect);
</script>

@endsection
