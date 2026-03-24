@extends('layouts.frontend')

@section('title', 'Brands - Union Lubricants')

@section('content')
<!-- PAGE TITLE BANNER -->
<div class="section banner-page about" style="background: url({{ asset('frontend/images/bgoverlay.jpg') }});background-attachment: fixed;background-size: cover;">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12">
				<div class="title-page">Our Brands</div>
				<ol class="breadcrumb">
					<li><a href="{{ route('home') }}">Home</a></li>
					<li class="active">Brands</li>
				</ol>
			</div>
		</div>
	</div>
</div>

<!-- BRANDS GRID SECTION -->
<div class="section why overlap">
		<div class="container">

			<div class="row">

				<div class="col-sm-12 col-md-12">
					<div class="box-partner">
						@forelse($brands as $brand)
						<!-- item -->
						<div class="item">
							<div class="box-image">
								<div class="client-img">
									<a href="{{ route('brands.show', $brand->id) }}">
										@if($brand->logo_path)
											<img src="{{ asset('storage/' . $brand->logo_path) }}" alt="{{ $brand->name }}" class="img-responsive">
										@else
											<img src="{{ asset('images/600x400.jpg') }}" alt="{{ $brand->name }}" class="img-responsive">
										@endif
									</a>
								</div>
							</div>
							<div class="box-info">
								<div class="heading">{{ $brand->name }}</div>
								<p>{{ Str::limit($brand->description, 150) }}</p>

								<!-- Product Catalogs List -->
								@php
									$catalogs = $brand->catalogs()->get();
								@endphp

								@if($catalogs->count() > 0)
									<div class="catalog-list" style="margin-top: 10px;">
										@foreach($catalogs as $catalog)
											<div style="margin-bottom: 6px;">
												<a href="{{ route('catalog.download-public', $catalog->id) }}" target="_blank" style="color: #0054a6; font-weight: 600;">
													<span class="fa fa-file-pdf-o"></span> Download {{ $brand->name }} Product List
												</a>
											</div>
										@endforeach
									</div>
								@else
									<p style="font-size: 12px; color: #999; margin-top: 10px;">No catalogs available</p>
								@endif
							</div>
						</div>
						@empty
						<!-- No brands -->
						<div class="item">
							<div class="box-info">
								<p class="text-center">No brands available at the moment.</p>
							</div>
						</div>
						@endforelse

					</div>
				</div>

			</div>
		</div>
	</div>



@endsection
