@extends('layouts.frontend')

@section('title', $brand->name . ' - Union Lubricants')

@section('content')
<!-- PAGE TITLE BANNER -->
<div class="section banner-page about" style="background: url({{ asset('frontend/images/bgoverlay.jpg') }});background-attachment: fixed;background-size: cover;">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12">
				<div class="title-page">{{ $brand->name }}</div>
				<ol class="breadcrumb">
					<li><a href="{{ route('home') }}">Home</a></li>
					<li><a href="{{ route('brands.index') }}">Brands</a></li>
					<li class="active">{{ $brand->name }}</li>
				</ol>
			</div>
		</div>
	</div>
</div>

<!-- BRAND DETAIL SECTION -->
<div class="section why overlap">
	<div class="container">
		<div class="row">
			<!-- SIDEBAR -->
			<div class="col-sm-4 col-md-4 col-md-push-8">
				<!-- Brands Widget -->
				<div class="widget categories">
					<h4 class="widget-title">Our Brands</h4>
					<ul class="category-nav">
						@foreach($brands as $brnd)
						<li @if($brnd->id === $brand->id) class="active" @endif>
							<a href="{{ route('brands.show', $brnd->id) }}">
								{{ $brnd->name }}
							</a>
						</li>
						@endforeach
					</ul>
				</div>

			</div>

			<!-- MAIN CONTENT -->
			<div class="col-sm-8 col-md-8 col-md-pull-4">
				<div class="single-page">
					<!-- Brand Logo -->
					@if($brand->logo_path)
					<img src="{{ asset('storage/' . $brand->logo_path) }}" alt="{{ $brand->name }}" class="img-responsive" style="max-width: 300px; margin-bottom: 30px;">
					@endif

					<div class="margin-bottom-30"></div>

					<!-- Brand Title -->
					<h2 class="section-heading">
						{{ $brand->name }}
					</h2>

					<!-- Brand Description -->
					<p>{{ $brand->description }}</p>

					<div class="margin-bottom-50"></div>

				</div>
			</div>

		</div>
	</div>
</div>

<!-- BRAND CATALOGS SECTION -->
@if($catalogs->count() > 0)
<div class="section products bg-light">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="block-title text-center">
					<h2>{{ $brand->name }} Product Catalogs</h2>
					<p>Explore our complete range of products</p>
				</div>
			</div>
		</div>

		<div class="row">
			@foreach($catalogs as $catalog)
			<div class="col-md-4 col-sm-6">
				<div class="box-product">
					@if($catalog->image_path)
					<div class="product-image">
						<img src="{{ asset('storage/' . $catalog->image_path) }}" alt="{{ $catalog->name }}" class="img-responsive">
					</div>
					@else
						<img src="{{ asset('images/600x400.jpg') }}" alt="{{ $catalog->name }}" class="img-responsive">
					@endif
					<div class="product-info">
						<h4>{{ $catalog->name }}</h4>
						<p class="price">{{ $catalog->description ? Str::limit($catalog->description, 50) : 'Premium Product' }}</p>
						<a href="{{ route('brands.download', $brand->id) . '?catalog_id=' . $catalog->id }}" target="_blank" style="color: #0054a6; font-weight: 600;">
							<span class="fa fa-file-pdf-o"></span> Download {{ $brand->name }} Catalog
						</a>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
@endif

@endsection
