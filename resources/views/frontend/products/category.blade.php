@extends('layouts.frontend')

<style>
.product-section {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 25px;
    margin-bottom: 30px;
}

@media (max-width: 768px) {
    .product-section {
        grid-template-columns: 1fr;
    }
}

.product-card {
    background: #ffffff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    transition: all .3s ease;
}

.product-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 16px rgba(0,0,0,0.15);
}

.product-img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.product-content {
    padding: 15px;
}

.product-title {
    font-size: 16px;
    font-weight: 700;
    color: #0d2c54;
    margin-bottom: 8px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.product-desc {
    font-size: 13px;
    color: #666;
    margin-bottom: 12px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    min-height: 32px;
}

.product-btn {
    display: inline-block;
    padding: 8px 16px;
    background: #0d2c54;
    color: #fff;
    border-radius: 4px;
    text-decoration: none;
    font-size: 12px;
    font-weight: 600;
    transition: 0.3s ease;
    width: 100%;
    text-align: center;
}

.product-btn:hover {
    background: #ed1c24;
    color: #fff;
}


</style>

@section('content')
<!-- PAGE TITLE BANNER -->
<div class="section banner-page about" style="background: url({{ asset('frontend/images/bgoverlay.jpg') }});background-attachment: fixed;background-size: cover;">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12">
				<div class="title-page">{{ $category->name }} Products</div>
				<ol class="breadcrumb">
					<li><a href="{{ route('home') }}">Home</a></li>
					<li><a href="{{ route('products.index') }}">Products</a></li>
					<li class="active">{{ $category->name }}</li>
				</ol>
			</div>
		</div>
	</div>
</div>


<!-- PRODUCTS SECTION -->
<div class="section why overlap">
	<div class="container">
		<div class="row">
			<!-- SIDEBAR -->
			<div class="col-sm-4 col-md-4 col-md-push-8">
				<!-- Product Categories Widget -->
				<div class="widget categories">
					<h4 class="widget-title">Categories</h4>
					<ul class="category-nav">
						@if($latestCatalog)
						<li style="margin-bottom: 20px;">
							<a href="{{ route('catalog.download-public', $latestCatalog->id) }}" target="_blank" style="color: #0054a6; font-weight: 600;">
								<span class="fa fa-file-pdf-o"></span> Download Vortoil Product List
							</a>
						</li>
						@else
						<li><a href="{{ route('products.index') }}">All Products</a></li>
						@endif
						@foreach($categories as $cat)
						<li @if($category->id === $cat->id) class="active" @endif>
							<a href="{{ route('products.by-category', $cat->slug) }}">{{ $cat->name }}</a>
						</li>
						@endforeach
					</ul>
				</div>


			</div>

			<!-- MAIN CONTENT -->
			<div class="col-sm-8 col-md-8 col-md-pull-4" >
				<div class="products-list">
					<h2 class="section-heading" style=" padding-bottom: 0; ">{{ $category->name }}</h2>
					{{-- <p class="section-subheading">Browse our selection of {{ strtolower($category->name) }} products</p> --}}

					<div class="product-section">
						@forelse($products as $product)
						<div class="product-card">
							@if($product->image_path)
							<img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="product-img">
							@else
							<img src="{{ asset('images/600x400.jpg') }}" alt="{{ $product->name }}" class="product-img">
							@endif

							<div class="product-content">
								<h3 class="product-title">{{ $product->name }}</h3>
								<p class="product-desc">{{ Str::limit($product->description, 100) }}</p>
								<a href="{{ route('products.show', $product->slug) }}" class="product-btn">VIEW DETAILS</a>
							</div>
						</div>
						@empty
						<div style="width: 100%; text-align: center; padding: 40px 20px;">
							<p>No products available in this category.</p>
						</div>
						@endforelse
					</div>

					<!-- PAGINATION -->
					@if($products->hasPages())
					<div style="margin-top: 30px; text-align: center;">
						{{ $products->links() }}
					</div>
					@endif
				</div>
			</div>

		</div>
	</div>
</div>


@endsection
