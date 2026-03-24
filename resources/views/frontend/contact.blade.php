@extends('layouts.frontend')

@section('title', 'Contact Us - Union Lubricants')

@section('content')
<!-- PAGE TITLE BANNER -->
<div class="section banner-page about" style="background: url({{ asset('frontend/images/bgoverlay.jpg') }});background-attachment: fixed;background-size: cover;">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12">
				<div class="title-page">Contact Us</div>
				<ol class="breadcrumb">
					<li><a href="{{ route('home') }}">Home</a></li>
					<li class="active">Contact</li>
				</ol>
			</div>
		</div>
	</div>
</div>

<!-- CONTACT SECTION -->
<div class="section contact overlap">
	<div class="container">
		<div class="row">
			<!-- SIDEBAR -->
			<div class="col-sm-4 col-md-4 col-md-push-8">
				<!-- Embedded Map Widget -->
				<div class="widget map-widget" style="margin-bottom: 30px;">
					<div class="widget-title">
						Find Us On Map
					</div>
					<!-- Google Map Embed -->
					<div class="map-container" style="position: relative; overflow: hidden; padding-bottom: 56.25%; height: 0; border-radius: 5px;">
						<iframe
							src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3604.8943704652397!2d55.462999688855!3d25.374856400000006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f594a846696a1%3A0x2229eb0bdf816d57!2sIndustrial%20area%202!5e0!3m2!1sen!2sin!4v1765171154401!5m2!1sen!2sin"
							width="100%"
							height="100%"
							style="position: absolute; top: 0; left: 0; border: none;"
							allowfullscreen=""
							loading="lazy"
							referrerpolicy="no-referrer-when-downgrade">
						</iframe>
                        {{-- <iframe
                         src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3604.8943704652397!2d55.462999688855!3d25.374856400000006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f594a846696a1%3A0x2229eb0bdf816d57!2sIndustrial%20area%202!5e0!3m2!1sen!2sin!4v1765171154401!5m2!1sen!2sin" width="400" height="300" style="border:0;"
                          allowfullscreen="" loading="lazy"
                          referrerpolicy="no-referrer-when-downgrade">
                        </iframe> --}}
					</div>
				</div>

				<!-- Contact Info Widget -->
				{{-- <div class="widget contact-info-sidebar">
					<div class="widget-title">
						Contact Info
					</div>
					<ul class="list-info">
						<li>
							<div class="info-icon">
								<span class="fa fa-map-marker"></span>
							</div>
							<div class="info-text">{{ $settings['company_address'] ?? 'Contact us for more info' }}</div>
						</li>
						<li>
							<div class="info-icon">
								<span class="fa fa-phone"></span>
							</div>
							<div class="info-text">{{ $settings['company_phone'] ?? '+1 (555) 123-4567' }}</div>
						</li>
						<li>
							<div class="info-icon">
								<span class="fa fa-envelope"></span>
							</div>
							<div class="info-text">{{ $settings['company_email'] ?? 'info@unionlubricants.com' }}</div>
						</li>
						<li>
							<div class="info-icon">
								<span class="fa fa-clock-o"></span>
							</div>
							<div class="info-text">Mon - Fri 09:00 - 18:00</div>
						</li>
					</ul>
				</div> --}}
			</div>

			<!-- MAIN CONTENT -->
			<div class="col-sm-8 col-md-8 col-md-pull-4">
				<div class="content">
					<h3 class="section-heading-2">Contact Details</h3>

					@if($errors->any())
					<div class="alert alert-danger" style="margin-bottom: 20px;">
						<ul style="margin-bottom: 0;">
							@foreach($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif

					@if(session('success'))
					<div class="alert alert-success" style="margin-bottom: 20px;">
						{{ session('success') }}
					</div>
					@endif

					<form action="{{ route('contact.store') }}" method="POST" class="form-contact">
						@csrf

						<div class="form-group">
							<input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
								placeholder="Full Name..." required value="{{ old('name') }}">
							@error('name')
							<span class="invalid-feedback d-block">{{ $message }}</span>
							@enderror
						</div>

						<div class="form-group">
							<input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
								placeholder="Email Address..." required value="{{ old('email') }}">
							@error('email')
							<span class="invalid-feedback d-block">{{ $message }}</span>
							@enderror
						</div>

						<div class="form-group">
							<input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror"
								placeholder="Phone Number..." value="{{ old('phone') }}">
							@error('phone')
							<span class="invalid-feedback d-block">{{ $message }}</span>
							@enderror
						</div>

						<div class="form-group">
							<input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror"
								placeholder="Subject..." required value="{{ old('subject') }}">
							@error('subject')
							<span class="invalid-feedback d-block">{{ $message }}</span>
							@enderror
						</div>

						<div class="form-group">
							<textarea name="message" class="form-control @error('message') is-invalid @enderror"
								rows="6" placeholder="Write message..." required>{{ old('message') }}</textarea>
							@error('message')
							<span class="invalid-feedback d-block">{{ $message }}</span>
							@enderror
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-secondary">SEND MESSAGE</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection
