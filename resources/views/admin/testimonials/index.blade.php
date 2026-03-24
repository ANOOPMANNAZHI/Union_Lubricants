@extends('layouts.admin')

@section('title', 'Testimonials - Admin')

@section('content')
<div class="row mb-4">
    <div class="col-12 d-flex justify-content-between align-items-center">
        <div>
            <h4 class="py-3 mb-0"><span class="text-muted fw-light">Admin /</span> Testimonials</h4>
            <p class="text-muted small">Manage customer testimonials and reviews</p>
        </div>
        <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">
            <i class="bx bx-plus me-1"></i> New Testimonial
        </a>
    </div>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>Author</th>
                    <th>Company/Position</th>
                    <th class="text-center">Rating</th>
                    <th class="text-center">Featured</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($testimonials as $testimonial)
                <tr>
                    <td>
                        <strong>{{ $testimonial->author_name }}</strong>
                        <br>
                        <small class="text-muted">{{ Str::limit($testimonial->content, 60) }}</small>
                    </td>
                    <td>
                        <small>
                            @if($testimonial->author_company)
                                {{ $testimonial->author_company }}
                            @endif
                            @if($testimonial->author_position)
                                <br>{{ $testimonial->author_position }}
                            @endif
                        </small>
                    </td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center">
                            @for($i = 1; $i <= $testimonial->rating; $i++)
                                <i class="bx bxs-star text-warning" style="font-size: 0.9rem;"></i>
                            @endfor
                        </div>
                    </td>
                    <td class="text-center">
                        @if($testimonial->is_featured)
                            <span class="badge bg-label-success">
                                <i class="bx bx-star me-1"></i> Featured
                            </span>
                        @else
                            <span class="badge bg-label-secondary">Not Featured</span>
                        @endif
                    </td>
                    <td class="text-end">
                        <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}" class="btn btn-sm btn-outline-primary me-2">
                            <i class="bx bx-pencil"></i> Edit
                        </a>
                        <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Are you sure you want to delete this testimonial?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                <i class="bx bx-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-5">
                        <p class="text-muted mb-3">No testimonials yet</p>
                        <a href="{{ route('admin.testimonials.create') }}" class="btn btn-sm btn-primary">
                            <i class="bx bx-plus me-1"></i> Add First Testimonial
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@if($testimonials->hasPages())
<div class="mt-3">
    {{ $testimonials->links() }}
</div>
@endif

@endsection
