@extends('layouts.admin')

@section('title', 'Brands - Admin')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="py-3 mb-0"><span class="text-muted fw-light">eCommerce /</span> Brands</h4>
            <a href="{{ route('admin.brands.create') }}" class="btn btn-primary">
                <i class="bx bx-plus me-2"></i> Add Brand
            </a>
        </div>
    </div>
</div>

@if($brands->count() > 0)
    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Logo</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Catalogs</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($brands as $brand)
                        <tr>
                            <td>
                                @if($brand->logo_path)
                                    <img src="{{ $brand->logo_url }}" alt="{{ $brand->name }}" height="40" class="rounded">
                                @else
                                    <span class="badge bg-label-secondary">No Logo</span>
                                @endif
                            </td>
                            <td>
                                <strong>{{ $brand->name }}</strong>
                            </td>
                            <td>
                                <code>{{ $brand->slug }}</code>
                            </td>
                            <td>
                                <span class="badge bg-label-info">{{ $brand->catalogs_count ?? 0 }}</span>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-sm btn-icon btn-text-secondary rounded-pill" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('admin.brands.show', $brand->id) }}">
                                            <i class="bx bx-show me-1"></i> View
                                        </a>
                                        <a class="dropdown-item" href="{{ route('admin.brands.edit', $brand->id) }}">
                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <form action="{{ route('admin.brands.destroy', $brand->id) }}" method="POST" style="display: inline;" onclick="return confirm('Delete this brand?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item text-danger">
                                                <i class="bx bx-trash me-1"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12 d-flex justify-content-center">
            {{ $brands->links() }}
        </div>
    </div>
@else
    <div class="card">
        <div class="card-body py-5">
            <div class="text-center">
                <p class="text-muted mb-0">
                    <i class="bx bx-package" style="font-size: 48px; opacity: 0.3;"></i>
                </p>
                <p class="text-muted mt-3">No brands found. <a href="{{ route('admin.brands.create') }}">Create the first brand</a></p>
            </div>
        </div>
    </div>
@endif
@endsection
