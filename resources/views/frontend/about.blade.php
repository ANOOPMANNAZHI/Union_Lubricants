@extends('layouts.frontend')

@section('title', 'About Us - Union Lubricants')

@section('content')
<!-- BANNER -->
	<div class="section banner-page about" style="background: url({{ asset('storage/' . $about->image_path) }});background-attachment: fixed;background-size: cover;">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12">
					<div class="title-page">Our Company</div>
					<ol class="breadcrumb">
						<li><a href="index.html">About Us</a></li>
						<li class="active">Our Company</li>
					</ol>
				</div>
			</div>
		</div>
	</div>

	<!-- ABOUT FEATURE -->
	<div class="section feature overlap">
		<div class="container">

			<div class="row">

				<div class="col-sm-4 col-md-4">
					<!-- BOX 1 -->
					<div class="box-icon-2">
						<div class="icon">
							<div class="fa fa-star-o"></div>
						</div>
						<div class="body-content">
							<div class="heading">PREMIUM QUALITY BLENDS</div>
							High-grade base oils and advanced additives ensuring peak performance and longer drain intervals.
						</div>
					</div>
				</div>
				<div class="col-sm-4 col-md-4">
					<!-- BOX 2 -->
					<div class="box-icon-2">
						<div class="icon">
							<div class="fa fa-umbrella"></div>
						</div>
						<div class="body-content">
							<div class="heading">ENGINE & MACHINERY PROTECTION</div>
							Reduces wear, resists oxidation, and protects against corrosion even in extreme conditions.
						</div>
					</div>
				</div>
				<div class="col-sm-4 col-md-4">
					<!-- BOX 3 -->
					<div class="box-icon-2">
						<div class="icon">
							<div class="fa fa-users"></div>
						</div>
						<div class="body-content">
							<div class="heading">RELIABLE SUPPLY & SUPPORT</div>
							Fast delivery, technical assistance, and dedicated customer support for all lubricant needs.
						</div>
					</div>
				</div>

			</div>

			<div class="row">
				<div class="col-sm-12 col-md-12">
					<h2 class="section-heading">
						Who We Are
					</h2>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12 col-md-12">
					{{-- <div class="jumbo-heading">
						<h2>{{ $about->title }}</h2>

					</div> --}}
                    <blockquote>
						<p>{{ $about->title }}</p>
					</blockquote>
				</div>
				<div class="col-sm-12 col-md-8">
                <p class="lead">{!! nl2br(e($about->content)) !!}</p>                    {{-- <a href="{{ route('about') }}" class="btn btn-primary">Read More</a> --}}
                </div>
                <div class="col-sm-4 col-md-4">
                    <h2 class="section-heading" style="padding-bottom: 0px;">
						Our Certifications
					</h2>
					<div class="widget categories">
						<ul class="category-nav">
							@forelse($certifications as $cert)
								<li>
									<a href="{{ asset('storage/' . $cert->pdf_path) }}#toolbar=0&navpanes=0"
									   target="_blank"
									   onclick="return !window.open(this.href, '_blank', 'width=900,height=700');"
									   style="display: flex; align-items: center; gap: 8px;">
										<i class="fa fa-file-pdf-o" style="color: #d9534f; font-size: 16px;"></i>
										<span>{{ $cert->title }}</span>
									</a>
								</li>
							@empty
								<li class="text-muted">No certificates available</li>
							@endforelse
						</ul>
					</div>

				</div>

			</div>

		</div>
	</div>




<!-- Statistic -->
	<div class="section statistic bgsection" style="background: url({{ asset('frontend/images/bgoverlay.jpg') }});background-attachment: fixed;background-size: cover;">
		<div class="container">
			<div class="row">

				<div class="col-sm-3 col-md-3">
					<div class="counter-1">
			            <div class="counter-number">
			              1982
			            </div>
			            <div class="counter-title">Founded<br> year </div>
		          	</div>
				</div>
				<div class="col-sm-3 col-md-3">
					<div class="counter-1">
			            <div class="counter-number">
			              50+
			            </div>
			            <div class="counter-title">Products</div>
		          	</div>
				</div>
				<div class="col-sm-3 col-md-3">
					<div class="counter-1">
			            <div class="counter-number">
			              100+
			            </div>
			            <div class="counter-title">Clients</div>
		          	</div>
				</div>
				<div class="col-sm-3 col-md-3">
					<div class="counter-1">
			            <div class="counter-number">
			              ISO
			            </div>
			            <div class="counter-title">Certified</div>
		          	</div>
				</div>

			</div>
		</div>
	</div>


<div class="section services section-border bglight">
    <div class="container">
        <div class="row">
				<div class="col-sm-12 col-md-12">
					<h2 class="section-heading">
						SERVICES
					</h2>
				</div>
			</div>

        <div class="row">
             @foreach($services->take(6) as $service)
            <div class="col-md-4 col-sm-6">

                <div class="feature-box-8">
                    <div class="media">
                    @if($service->image_path)
                        <img src="{{ asset('storage/' . $service->image_path) }}" alt="{{ $service->title }}" class="img-responsive">
                    @else
                        <img src="{{ asset('images/600x400.jpg') }}" alt="{{ $service->title }}" class="img-responsive">
                    @endif
                    </div>
                    <div class="body">
                    <div class="icon-holder">
                        <span class="fa {{ $service->icon }}"></span>
                    </div>
                    <a href="{{ route('services.index') }}" class="title">{{ $service->title }}</a>
                    <p>{{ Str::limit($service->description, 100) }}</p>
                    <a href="{{ route('services.index') }}" class="readmore">READ MORE</a>
                    </div>
                </div>


            </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-md-12 text-center">
                <a href="{{ route('services.index') }}" class="btn btn-primary">View All Services</a>
            </div>
        </div>
    </div>
</div>


@endsection
