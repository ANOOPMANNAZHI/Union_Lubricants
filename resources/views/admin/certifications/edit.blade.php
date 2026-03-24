@extends('layouts.admin')

@section('title', 'Edit Certification - Admin')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h4 class="py-3 mb-0"><span class="text-muted fw-light">Admin /</span> Edit Certification</h4>
        <p class="text-muted small">Update certification details and files</p>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.certifications.update', $certification->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Certification Title <span class="text-danger">*</span></label>
                <input type="text" name="title" value="{{ old('title', $certification->title) }}" required
                    class="form-control @error('title') is-invalid @enderror">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" rows="4"
                    class="form-control @error('description') is-invalid @enderror">{{ old('description', $certification->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">PDF Document</label>
                        <div class="border-2 border-dashed rounded p-3 text-center" style="border-color: #dee2e6;">
                            @if($certification->pdf_path)
                                <i class="bx bx-check-circle text-success" style="font-size: 2rem;"></i>
                                <p class="small text-muted mt-2">PDF Uploaded</p>
                            @else
                                <i class="bx bx-file text-muted" style="font-size: 2rem;"></i>
                            @endif
                            <div class="mt-2">
                                <label for="pdf" class="form-label cursor-pointer text-primary mb-0">
                                    <u>{{ $certification->pdf_path ? 'Change PDF' : 'Upload PDF' }}</u>
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
                            @if($certification->image_path)
                                <img src="{{ asset('storage/' . $certification->image_path) }}" alt="Certificate" style="width: 100px; height: 100px; object-fit: cover; border-radius: 0.25rem;">
                            @else
                                <i class="bx bx-image text-muted" style="font-size: 2rem;"></i>
                            @endif
                            <div class="mt-2">
                                <label for="image" class="form-label cursor-pointer text-primary mb-0">
                                    <u>{{ $certification->image_path ? 'Change image' : 'Upload image' }}</u>
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
                    <i class="bx bx-check me-1"></i> Update
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
