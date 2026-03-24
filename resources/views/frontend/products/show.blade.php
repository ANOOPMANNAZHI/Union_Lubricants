@extends('layouts.frontend')

@section('title', $product->name . ' - Union Lubricants')

@section('content')
<!-- PAGE TITLE BANNER -->
<div class="section banner-page about" style="background: url({{ asset('frontend/images/bgoverlay.jpg') }});background-attachment: fixed;background-size: cover;">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12">
				<div class="title-page">{{ $product->name }}</div>
				<ol class="breadcrumb">
					<li><a href="{{ route('home') }}">Home</a></li>
					<li><a href="{{ route('products.index') }}">Products</a></li>
					<li class="active">{{ $product->name }}</li>
				</ol>
			</div>
		</div>
	</div>
</div>

<!-- PRODUCT DETAIL SECTION -->
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
						<li>
							<a href="{{ route('catalog.download-public', $latestCatalog->id) }}" target="_blank" style="color: #0054a6; font-weight: 600;">
								<span class="fa fa-file-pdf-o"></span> Download Product Catalog
							</a>
						</li>
						@else
						<li><a href="{{ route('products.index') }}">All Products</a></li>
						@endif
						@foreach($categories as $cat)
						<li @if($product->category_id === $cat->id) class="active" @endif>
							<a href="{{ route('products.by-category', $cat->slug) }}">{{ $cat->name }}</a>
						</li>
						@endforeach
					</ul>
				</div>

				<!-- Downloads Widget -->
				<div class="widget download">
					@if($product->tds_pdf)
					<a href="{{ asset('storage/' . $product->tds_pdf) }}" target="_blank" class="btn btn-secondary btn-block btn-sidebar" style="margin-bottom: 10px;">
						<span class="fa fa-file-pdf-o"></span> Download TDS
					</a>
					@endif
					@if($product->msds_pdf)
					<a href="{{ asset('storage/' . $product->msds_pdf) }}" target="_blank" class="btn btn-secondary btn-block btn-sidebar" style="margin-bottom: 10px;">
						<span class="fa fa-file-pdf-o"></span> Download MSDS
					</a>
					@endif
				</div>


			</div>

			<!-- MAIN CONTENT -->
			<div class="col-sm-8 col-md-8 col-md-pull-4">
				<div class="single-page">
					<!-- Product Image -->
					@if($product->image_path)
					<img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="img-responsive">
					@else
					<img src="{{ asset('images/800x500.jpg') }}" alt="{{ $product->name }}" class="img-responsive">
					@endif

					<div class="margin-bottom-30"></div>

					<!-- Product Title -->
					<h2 class="section-heading">
						{{ $product->name }}
					</h2>

					<!-- Product Category -->
					@if($product->category)
					<p class="section-subheading">
						<strong>Category:</strong>
						<a href="{{ route('products.by-category', $product->category->slug) }}" style="color: #0054a6;">
							{{ $product->category->name }}
						</a>
					</p>
					@endif

					<!-- Product Description -->
					<p>{{ $product->description }}</p>



					<div class="margin-bottom-50"></div>

					<!-- FAQ Section -->
					<h2 class="section-heading">
						Product Information
					</h2>
					<div class="section-subheading">Learn more about this product</div>

					<div class="panel-group panel-faq" id="accordion" role="tablist" aria-multiselectable="true">
						<!-- FAQ Item 1 -->
						<div class="panel panel-default active">
							<div class="panel-heading" role="tab" id="heading1">
								<h4 class="panel-title">
									<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1">
										What are the key specifications?
									</a>
								</h4>
							</div>
							<div id="collapse1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading1">
								<div class="panel-body">
									<p>This product is engineered to the highest specifications to ensure optimal performance. Download our technical data sheet (TDS) for detailed specifications, viscosity grades, and performance characteristics.</p>
								</div>
							</div>
						</div>

						<!-- FAQ Item 2 -->
						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="heading2">
								<h4 class="panel-title">
									<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="false" aria-controls="collapse2">
										Is this product available in bulk?
									</a>
								</h4>
							</div>
							<div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
								<div class="panel-body">
									<p>Yes, we offer bulk supply options for industrial customers. Contact our sales team to discuss volume orders and negotiate favorable pricing for your business needs.</p>
									<ul class="list-unstyled">
										<li><i class="fa fa-check"></i> Custom packaging available</li>
										<li><i class="fa fa-check"></i> Competitive bulk pricing</li>
										<li><i class="fa fa-check"></i> Dedicated account manager</li>
										<li><i class="fa fa-check"></i> Fast delivery options</li>
										<li><i class="fa fa-check"></i> Technical support included</li>
									</ul>
								</div>
							</div>
						</div>

						<!-- FAQ Item 3 -->
						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="heading3">
								<h4 class="panel-title">
									<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="false" aria-controls="collapse3">
										Are there safety considerations?
									</a>
								</h4>
							</div>
							<div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
								<div class="panel-body">
									<p>Safety is paramount. We provide complete Material Safety Data Sheet (MSDS) information for all our products. Please download the MSDS from the sidebar to review safety precautions, handling instructions, and disposal guidelines.</p>
									<p>Our products comply with international safety and environmental standards.</p>
								</div>
							</div>
						</div>

						<!-- FAQ Item 4 -->
						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="heading4">
								<h4 class="panel-title">
									<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="false" aria-controls="collapse4">
										How do I place an order or inquiry?
									</a>
								</h4>
							</div>
							<div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
								<div class="panel-body">
									<p>You can submit a product inquiry through our contact form, and our sales team will get back to you promptly with pricing, availability, and delivery information.</p>
									<p>We're ready to help you find the perfect lubrication solution for your needs!</p>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>

		</div>
	</div>
</div>

<!-- RELATED PRODUCTS SECTION -->
@if($relatedProducts->count() > 0)
<div class="section services bg-light">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="block-title text-center">
					<h2>Related Products</h2>
					<p>Other products in the {{ $product->category->name ?? 'same category' }}</p>
				</div>
			</div>
		</div>

		<div class="row">
			@foreach($relatedProducts->take(3) as $related)
			<div class="col-md-4 col-sm-6">
				<div class="feature-box-8">
					<div class="media">
						@if($related->image_path)
						<img src="{{ asset('storage/' . $related->image_path) }}" alt="{{ $related->name }}" class="img-responsive">
						@else
						<img src="{{ asset('images/600x400.jpg') }}" alt="{{ $related->name }}" class="img-responsive">
						@endif
					</div>
					<div class="body">
						<a href="{{ route('products.show', $related->slug) }}" class="title">{{ $related->name }}</a>
						<p>{{ Str::limit($related->description, 100) }}</p>
						<a href="{{ route('products.show', $related->slug) }}" class="readmore">VIEW DETAILS</a>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
@endif


@endsection
