@extends('layouts.admin')

@section('title', 'Settings - Admin')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h4 class="py-3 mb-0"><span class="text-muted fw-light">Admin /</span> Settings</h4>
        <p class="text-muted small">Configure your website and company information</p>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.settings.store') }}" method="POST">
            @csrf

            <!-- Company Section -->
            <div class="mb-4 pb-4 border-bottom">
                <h5 class="fw-semibold mb-3">
                    <i class="bx bx-building me-2 text-primary"></i> Company Information
                </h5>

                <div class="row g-3">
                    <!-- Company Name -->
                    <div class="col-md-6">
                        <label class="form-label">Company Name</label>
                        <input type="text" name="company_name" value="{{ old('company_name', $settings['company_name'] ?? 'Union Lubricants') }}" placeholder="Your company name"
                            class="form-control">
                    </div>

                    <!-- Company Email -->
                    <div class="col-md-6">
                        <label class="form-label">Contact Email</label>
                        <input type="email" name="company_email" value="{{ old('company_email', $settings['company_email'] ?? 'info@unionlubricants.com') }}" placeholder="contact@example.com"
                            class="form-control">
                    </div>

                    <!-- Company Phone -->
                    <div class="col-md-6">
                        <label class="form-label">Phone Number</label>
                        <input type="tel" name="company_phone" value="{{ old('company_phone', $settings['company_phone'] ?? '+1-555-0000') }}" placeholder="+1 (555) 000-0000"
                            class="form-control">
                    </div>

                    <!-- Company Address -->
                    <div class="col-md-6">
                        <label class="form-label">Company Address</label>
                        <textarea name="company_address" rows="2" class="form-control">{{ old('company_address', $settings['company_address'] ?? '123 Oil Lane, City, ST 12345') }}</textarea>
                    </div>

                    <!-- Company Description -->
                    <div class="col-12">
                        <label class="form-label">Company Description</label>
                        <textarea name="company_description" rows="3" class="form-control">{{ old('company_description', $settings['company_description'] ?? 'Premium lubricant solutions for industrial applications worldwide.') }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Email Configuration -->
            <div class="mb-4 pb-4 border-bottom">
                <h5 class="fw-semibold mb-3">
                    <i class="bx bx-envelope me-2 text-primary"></i> Email Configuration
                </h5>

                <div class="row g-3">
                    <!-- Mail Driver -->
                    <div class="col-md-6">
                        <label class="form-label">Mail Driver</label>
                        <select name="mail_mailer" class="form-select">
                            <option value="smtp" {{ old('mail_mailer', $settings['mail_mailer'] ?? 'smtp') === 'smtp' ? 'selected' : '' }}>SMTP</option>
                            <option value="sendmail" {{ old('mail_mailer', $settings['mail_mailer'] ?? 'smtp') === 'sendmail' ? 'selected' : '' }}>Sendmail</option>
                            <option value="log" {{ old('mail_mailer', $settings['mail_mailer'] ?? 'smtp') === 'log' ? 'selected' : '' }}>Log (Testing)</option>
                            <option value="array" {{ old('mail_mailer', $settings['mail_mailer'] ?? 'smtp') === 'array' ? 'selected' : '' }}>Array (Testing)</option>
                        </select>
                        <small class="text-muted">Select your email sending service</small>
                    </div>

                    <!-- Mail Scheme -->
                    <div class="col-md-6">
                        <label class="form-label">Encryption</label>
                        <select name="mail_scheme" class="form-select">
                            <option value="tls" {{ old('mail_scheme', $settings['mail_scheme'] ?? 'tls') === 'tls' ? 'selected' : '' }}>TLS</option>
                            <option value="ssl" {{ old('mail_scheme', $settings['mail_scheme'] ?? 'tls') === 'ssl' ? 'selected' : '' }}>SSL</option>
                        </select>
                    </div>

                    <!-- From Name -->
                    <div class="col-md-6">
                        <label class="form-label">From Name</label>
                        <input type="text" name="mail_from_name" value="{{ old('mail_from_name', $settings['mail_from_name'] ?? 'Union Lubricants') }}"
                            class="form-control" placeholder="e.g., Union Lubricants">
                    </div>

                    <!-- From Address -->
                    <div class="col-md-6">
                        <label class="form-label">From Email Address</label>
                        <input type="email" name="mail_from_address" value="{{ old('mail_from_address', $settings['mail_from_address'] ?? 'noreply@unionlubricants.com') }}"
                            class="form-control" placeholder="noreply@example.com">
                    </div>

                    <!-- SMTP Host -->
                    <div class="col-md-6">
                        <label class="form-label">SMTP Host</label>
                        <input type="text" name="mail_host" value="{{ old('mail_host', $settings['mail_host'] ?? 'smtp.mailtrap.io') }}"
                            class="form-control" placeholder="smtp.gmail.com">
                    </div>

                    <!-- SMTP Port -->
                    <div class="col-md-6">
                        <label class="form-label">SMTP Port</label>
                        <input type="number" name="mail_port" value="{{ old('mail_port', $settings['mail_port'] ?? 465) }}"
                            class="form-control" placeholder="465" min="1" max="65535">
                    </div>

                    <!-- SMTP Username -->
                    <div class="col-md-6">
                        <label class="form-label">SMTP Username</label>
                        <input type="text" name="mail_username" value="{{ old('mail_username', $settings['mail_username'] ?? '') }}"
                            class="form-control" placeholder="your-email@example.com">
                    </div>

                    <!-- SMTP Password -->
                    <div class="col-md-6">
                        <label class="form-label">SMTP Password</label>
                        <input type="password" name="mail_password" value="{{ old('mail_password', $settings['mail_password'] ?? '') }}"
                            class="form-control" placeholder="Your SMTP password">
                    </div>
                </div>
            </div>

            <!-- Social Links -->
            <div class="mb-4 pb-4 border-bottom">
                <h5 class="fw-semibold mb-3">
                    <i class="bx bx-share-alt me-2 text-primary"></i> Social Media Links
                </h5>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Facebook</label>
                        <input type="url" name="facebook_url" value="{{ old('facebook_url', $settings['facebook_url'] ?? '') }}"
                            class="form-control" placeholder="https://facebook.com/...">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Twitter</label>
                        <input type="url" name="twitter_url" value="{{ old('twitter_url', $settings['twitter_url'] ?? '') }}"
                            class="form-control" placeholder="https://twitter.com/...">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">LinkedIn</label>
                        <input type="url" name="linkedin_url" value="{{ old('linkedin_url', $settings['linkedin_url'] ?? '') }}"
                            class="form-control" placeholder="https://linkedin.com/...">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Instagram</label>
                        <input type="url" name="instagram_url" value="{{ old('instagram_url', $settings['instagram_url'] ?? '') }}"
                            class="form-control" placeholder="https://instagram.com/...">
                    </div>
            </div>

            <!-- SEO Settings -->
            <div class="mb-4 pb-4 border-bottom">
                <h5 class="fw-semibold mb-3">
                    <i class="bx bx-search me-2 text-primary"></i> SEO Settings
                </h5>

                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label">Meta Title</label>
                        <input type="text" name="meta_title" value="{{ old('meta_title', $settings['meta_title'] ?? '') }}"
                            class="form-control" placeholder="Site title for search engines">
                    </div>

                    <div class="col-12">
                        <label class="form-label">Meta Keywords</label>
                        <input type="text" name="meta_keywords" value="{{ old('meta_keywords', $settings['meta_keywords'] ?? '') }}"
                            class="form-control" placeholder="keyword1, keyword2, keyword3">
                    </div>

                    <div class="col-12">
                        <label class="form-label">Meta Description</label>
                        <textarea name="meta_description" rows="2" class="form-control" placeholder="Site description for search engines">{{ old('meta_description', $settings['meta_description'] ?? '') }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Submit -->
            <div class="pt-3">
                <button type="submit" class="btn btn-primary">
                    <i class="bx bx-check me-1"></i> Save Settings
                </button>
                <form action="{{ route('admin.settings.test-email') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-info ms-2">
                        <i class="bx bx-envelope me-1"></i> Send Test Email
                    </button>
                </form>
            </div>
        </form>
    </div>
</div>

@endsection
