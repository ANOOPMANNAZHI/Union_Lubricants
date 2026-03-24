@extends('layouts.admin')

@section('title', 'Enquiries - Admin')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h4 class="py-3 mb-0"><span class="text-muted fw-light">Admin /</span> Enquiries</h4>
        <p class="text-muted small">View and manage customer enquiries</p>
    </div>
</div>

<!-- Filter Section -->
<div class="card mb-3">
    <div class="card-body">
        <form method="GET" action="{{ route('admin.enquiries.index') }}" class="row g-3">
            <div class="col-md-4">
                <label class="form-label">Filter by Status</label>
                <select name="status" class="form-select">
                    <option value="">All Statuses</option>
                    <option value="new" {{ request('status') === 'new' ? 'selected' : '' }}>New</option>
                    <option value="in_progress" {{ request('status') === 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="resolved" {{ request('status') === 'resolved' ? 'selected' : '' }}>Resolved</option>
                </select>
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="bx bx-filter me-1"></i> Filter
                </button>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th class="text-center">Status</th>
                    <th>Date</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($enquiries as $enquiry)
                <tr>
                    <td>
                        <strong>{{ $enquiry->name }}</strong>
                    </td>
                    <td>
                        <a href="mailto:{{ $enquiry->email }}" class="text-decoration-none">{{ $enquiry->email }}</a>
                    </td>
                    <td>
                        <small class="text-muted">{{ Str::limit($enquiry->subject, 40) }}</small>
                    </td>
                    <td class="text-center">
                        @if($enquiry->status === 'new')
                            <span class="badge bg-label-info">New</span>
                        @elseif($enquiry->status === 'in_progress')
                            <span class="badge bg-label-warning">In Progress</span>
                        @else
                            <span class="badge bg-label-success">Resolved</span>
                        @endif
                    </td>
                    <td>
                        <small class="text-muted">{{ $enquiry->created_at->format('M d, Y') }}</small>
                    </td>
                    <td class="text-end">
                        <a href="{{ route('admin.enquiries.show', $enquiry->id) }}" class="btn btn-sm btn-outline-primary me-2">
                            <i class="bx bx-show"></i> View
                        </a>
                        <form action="{{ route('admin.enquiries.destroy', $enquiry->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Are you sure you want to delete this enquiry?');">
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
                    <td colspan="6" class="text-center py-5">
                        <p class="text-muted mb-3">No enquiries found</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@if($enquiries->hasPages())
<div class="mt-3">
    {{ $enquiries->links() }}
</div>
@endif

@endsection
