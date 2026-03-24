@extends('layouts.frontend')

@section('title', 'Services - Union Lubricants')

@section('content')
<!-- PAGE TITLE BANNER -->
<div class="section banner-page about" style="background: url({{ asset('frontend/images/bgoverlay.jpg') }});background-attachment: fixed;background-size: cover;">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12">
					<div class="title-page">Our Services</div>
					<ol class="breadcrumb">
						<li><a href="{{ route('home') }}">Home</a></li>
						<li class="active">Services</li>
					</ol>
				</div>
			</div>
		</div>
	</div>

<!-- SERVICES GRID SECTION -->
<div class="section services">
    <div class="container">
        <div class="row">
            @foreach($services as $service)
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
                    <a href="{{ route('services.show', $service->id) }}" class="title">{{ $service->title }}</a>
                    <p>{{ Str::limit($service->description, 100) }}</p>
                    <a href="{{ route('services.show', $service->id) }}" class="readmore">READ MORE</a>
                    </div>
                </div>


            </div>
            @endforeach
        </div>

        @if($services->isEmpty())
        <div class="row">
            <div class="col-md-12">
                <p class="text-center">No services available at the moment.</p>
            </div>
        </div>
        @endif
    </div>
</div>

<!-- CALL TO ACTION SECTION -->
<div class="section cta bg-primary">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="cta-content text-center">
                    <h2>Ready to Get Started?</h2>
                    <p>Contact us today to discuss your lubricant needs</p>
                    <a href="{{ route('contact.show') }}" class="btn btn-secondary">Get In Touch</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- PRODUCTS SECTION -->
<div class="section products bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block-title text-center">
                    <h2>Featured Products</h2>
                    <p>Explore our range of products</p>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($products->take(6) as $product)
            <div class="col-md-4 col-sm-6">
                <div class="box-product">
                    @if($product->image_path)
                    <div class="product-image">
                        <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="img-responsive">
                    </div>
                    @else
                        <img src="{{ asset('images/600x400.jpg') }}" alt="{{ $product->name }}" class="img-responsive">
                    @endif
                    <div class="product-info">
                        <h4>{{ $product->name }}</h4>
                        <p class="category">{{ $product->category->name ?? 'General' }}</p>
                        <p>{{ Str::limit($product->description, 80) }}</p>
                        <a href="{{ route('products.show', $product->slug) }}" class="btn btn-sm btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-md-12 text-center">
                <a href="{{ route('products.index') }}" class="btn btn-primary">View All Products</a>
            </div>
        </div>
    </div>
</div>

<!-- WHY CHOOSE US SECTION -->
<div class="section why-choose-us">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block-title text-center">
                    <h2>Why Choose Union Lubricants?</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="why-item">
                    <div class="why-icon">
                        <i class="fa fa-check-circle"></i>
                    </div>
                    <h4>Quality Products</h4>
                    <p>All our lubricants meet international quality standards and are tested thoroughly.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="why-item">
                    <div class="why-icon">
                        <i class="fa fa-headphones"></i>
                    </div>
                    <h4>Expert Support</h4>
                    <p>Our team of experts is always ready to help you find the right solution.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="why-item">
                    <div class="why-icon">
                        <i class="fa fa-truck"></i>
                    </div>
                    <h4>Fast Delivery</h4>
                    <p>We ensure quick and reliable delivery to all locations.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="why-item">
                    <div class="why-icon">
                        <i class="fa fa-shield"></i>
                    </div>
                    <h4>Certified</h4>
                    <p>ISO certified products and services with proven track record.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
