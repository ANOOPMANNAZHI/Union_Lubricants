@extends('layouts.admin')

@section('title', 'Edit Profile - Admin')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h4 class="py-3 mb-0"><span class="text-muted fw-light">Admin /</span> Your Profile</h4>
        <p class="text-muted small">Manage your account settings and security</p>
    </div>
</div>

@if(session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bx bx-check me-2"></i> {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<!-- Update Profile Form -->
<div class="card mb-3">
    <div class="card-header">
        <h5 class="mb-0"><i class="bx bx-user me-2"></i> Profile Information</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.profile.update') }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}" required
                        class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}" required
                        class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">
                        <i class="bx bx-check me-1"></i> Save Changes
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Change Password Form -->
<div class="card mb-3">
    <div class="card-header">
        <h5 class="mb-0"><i class="bx bx-lock me-2"></i> Change Password</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label">Current Password</label>
                    <input type="password" name="current_password"
                        class="form-control @error('current_password') is-invalid @enderror">
                    @error('current_password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12">
                    <label class="form-label">New Password</label>
                    <input type="password" name="password"
                        class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>

                <div class="col-12 pt-3 border-top">
                    <button type="submit" class="btn btn-primary">
                        <i class="bx bx-check me-1"></i> Update Password
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Delete Account Form -->
<div class="card border-danger">
    <div class="card-header bg-danger bg-opacity-10">
        <h5 class="mb-0 text-danger"><i class="bx bx-trash me-2"></i> Delete Account</h5>
    </div>
    <div class="card-body">
        <p class="text-muted">Once deleted, your account and all associated data cannot be recovered. This action is permanent.</p>

        <form action="{{ route('admin.profile.destroy') }}" method="POST">
            @csrf
            @method('DELETE')

            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" name="password" required class="form-control">
                <small class="text-muted">Enter your password to confirm account deletion</small>
            </div>

            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you absolutely sure you want to delete your account? This action cannot be undone.')">
                <i class="bx bx-trash me-1"></i> Delete Account
            </button>
        </form>
    </div>
</div>

@endsection
