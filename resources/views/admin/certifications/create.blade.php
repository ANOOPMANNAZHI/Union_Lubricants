@extends('layouts.admin')

@section('title', 'Create Certification - Admin')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h4 class="py-3 mb-0"><span class="text-muted fw-light">Admin /</span> Add New Certification</h4>
        <p class="text-muted small">Upload certification document and details</p>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.certifications.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Certification Title <span class="text-danger">*</span></label>
                <input type="text" name="title" value="{{ old('title') }}" required
                    class="form-control @error('title') is-invalid @enderror" placeholder="e.g., ISO 9001:2015">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" rows="4"
                    class="form-control @error('description') is-invalid @enderror" placeholder="Brief description about this certification">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">PDF Document</label>
                        <div class="border-2 border-dashed rounded p-3 text-center" style="border-color: #dee2e6;">
                            <i class="bx bx-file text-muted" style="font-size: 2rem;"></i>
                            <div class="mt-2">
                                <label for="pdf" class="form-label cursor-pointer text-primary mb-0">
                                    <u>Upload PDF</u>
                                </label>
                                <input id="pdf" name="pdf" type="file" accept=".pdf" class="d-none">
                                <p class="text-muted small mt-1">Max 5MB</p>
                            </div>
                        </div>
                        @error('pdf')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Certificate Image</label>
                        <div class="border-2 border-dashed rounded p-3 text-center" style="border-color: #dee2e6;">
                            <i class="bx bx-image text-muted" style="font-size: 2rem;"></i>
                            <div class="mt-2">
                                <label for="image" class="form-label cursor-pointer text-primary mb-0">
                                    <u>Upload Image</u>
                                </label>
                                <input id="image" name="image" type="file" accept="image/*" class="d-none">
                                <p class="text-muted small mt-1">Max 2MB</p>
                            </div>
                        </div>
                        @error('image')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Buttons -->
            <div class="pt-3 border-top">
                <a href="{{ route('admin.certifications.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">
                    <i class="bx bx-check me-1"></i> Create Certification
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
