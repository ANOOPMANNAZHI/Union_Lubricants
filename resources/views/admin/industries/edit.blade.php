@extends('layouts.admin')

@section('title', 'Edit Industry - Admin')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h4 class="py-3 mb-0"><span class="text-muted fw-light">Admin /</span> Edit Industry</h4>
        <p class="text-muted small">Update industry details</p>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.industries.update', $industry->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Industry Name <span class="text-danger">*</span></label>
                <input type="text" name="name" value="{{ old('name', $industry->name) }}" placeholder="E.g., Manufacturing, Aerospace, etc." required
                    class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" rows="4" placeholder="Describe this industry and the types of products it uses"
                    class="form-control @error('description') is-invalid @enderror">{{ old('description', $industry->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Buttons -->
            <div class="pt-3 border-top">
                <a href="{{ route('admin.industries.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">
                    <i class="bx bx-check me-1"></i> Update Industry
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
