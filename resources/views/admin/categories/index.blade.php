@extends('layouts.admin')

@section('title', 'Categories - Admin')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="py-3 mb-0"><span class="text-muted fw-light">eCommerce /</span> Categories</h4>
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
                <i class="bx bx-plus me-2"></i> Add Category
            </a>
        </div>
    </div>
</div>

@if($categories->count() > 0)
    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>
                                <strong>{{ $category->name }}</strong>
                            </td>
                            <td>
                                <code>{{ $category->slug }}</code>
                            </td>
                            <td>
                                <span class="text-truncate d-inline-block" style="max-width: 300px;">
                                    {{ $category->description ?? 'No description' }}
                                </span>
                            </td>
                            <td>
                                @if($category->is_active)
                                    <span class="badge bg-label-success">
                                        <span class="badge-dot bg-success me-1"></span> Active
                                    </span>
                                @else
                                    <span class="badge bg-label-secondary">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-sm btn-icon btn-text-secondary rounded-pill" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('admin.categories.edit', $category->id) }}">
                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display: inline;" onclick="return confirm('Delete this category?')">
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
@else
    <div class="card">
        <div class="card-body text-center py-5">
            <h5>No categories found</h5>
            <p class="text-muted">Create your first product category to get started.</p>
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
                <i class="bx bx-plus me-1"></i> Create Category
            </a>
        </div>
    </div>
@endif
@endsection
