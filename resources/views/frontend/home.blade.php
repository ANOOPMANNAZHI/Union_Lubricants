@extends('layouts.frontend')

@section('title', 'Home - Union Lubricants')

@section('content')


<!-- BANNER SECTION -->
<div id="slides" class="section banner">
    <ul class="slides-container">
        @foreach($banners as $banner)
        <li>
            <img src="{{ asset('storage/' . $banner->image_path) }}" alt="{{ $banner->heading }}">
            <div class="overlay-bg"></div>
            <div class="container">
                <div class="wrap-caption">
                    <h2 class="caption-heading">{{ $banner->heading }}</h2>
                    <p class="excerpt">{{ $banner->description }}</p>
                    <a href="{{ route('contact.show') }}" class="btn btn-primary" title="GET A QUOTE">GET A QUOTE</a>
                    <a href="{{ route('services.index') }}" class="btn btn-secondary" title="EXPLORE SERVICES">EXPLORE SERVICES</a>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
    <nav class="slides-navigation">
			<div class="container">
				<a href="#" class="next">
					<i class="fa fa-chevron-right"></i>
				</a>
				<a href="#" class="prev">
					<i class="fa fa-chevron-left"></i>
				</a>
	      	</div>
	    </nav>
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
						ABOUT US
					</h2>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-5 col-md-5">
					<div class="jumbo-heading">
						<h2>{{ $about->title }}</h2>
						<span class="fa fa-paper-plane-o"></span>
					</div>
				</div>
				<div class="col-sm-7 col-md-7">
					<p class="lead">{{ Str::limit($about->content, 500) }}</p>

                    <a href="{{ route('about') }}" class="btn btn-primary">Read More</a>
                </div>

			</div>

		</div>
	</div>


<!-- SERVICES SECTION -->
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
            @foreach($featuredServices as $service)
            <div class="col-md-4 col-sm-6">
                {{-- <div class="box-icon-3">
                    <div class="line-t"></div>
                    @if($service->icon)
                    <div class="icon">

                        <div class="fa {{ $service->icon }}"></div>
                    </div>
                    @endif
                    <div class="body-content">
                        <div class="heading">{{ $service->title }}</div>
                        {{ Str::limit($service->description, 100) }}
                        <a href="{{ route('services.index') }}" class="readmore">READ MORE</a>
                    </div>
                    <div class="line-b"></div>

                </div> --}}

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

{{-- <div class="section cta" style="background: url('{{ asset('frontend/images/locations.jpg') }}') bottom center no-repeat; background-attachment: fixed; background-size: cover;">
		<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12">
				<div class="cta-info">
					<h3>Our Products Globally</h3>
					<div style="text-align: center; color: #fff; line-height: 1.8; font-size: 14px; margin: 20px 0;">
						<p>
							Egypt, Nigeria, Morocco, Iraq, Syria, Bahrain, Benin, Ivory coast, Gambia, Rwanda, Ghana,
							Tanzania, Niger, Uzbekistan, Myanmar, Oman, Chad, Burkina Faso, Kongo, Namibia, Afghanistan,
							Jordan, Lebanon, Liberia, Sudan, Genia, Zimbabwe, Saudi, Canada, Russia, Gabon, Mozambique,
							Angola, Senegal, Togo, Cameron, Israel, Singapore, Taiwan, Vietnam, Philippines, Eritrea,
							Burundi, Mali, Kazakhstan, India & UAE
						</p>
					</div>
					<a href="{{ route('contact.show') }}" title="" class="btn btn-cta">CONTACT US</a>
			</div>
		</div>
	</div> --}}



<section class="py-5 bg-light" style=" background-color: #041e41; ">
  <div class="container">
    <div class="row align-items-center">

      <div class="col-md-5">
        <h2 class="fw-bold" style="color: #ffffff;">Our Products, Worldwide</h2>
        <p class="text-muted" style="color: #cccccc;">
          Trusted across 50+ countries worldwide including the Middle East, Africa, Asia, and North America.
        </p>
        <div class="d-flex flex-wrap gap-2" style=" margin-bottom: 20px; ">
            <span class="badge bg-dark">Afghanistan</span>
            <span class="badge bg-dark">Angola</span>
            <span class="badge bg-dark">Bahrain</span>
            <span class="badge bg-dark">Benin</span>
            <span class="badge bg-dark">Burkina Faso</span>
            <span class="badge bg-dark">Burundi</span>
            <span class="badge bg-dark">Cameroon</span>
            <span class="badge bg-dark">Canada</span>
            <span class="badge bg-dark">Chad</span>
            <span class="badge bg-dark">Congo</span>
            <span class="badge bg-dark">Egypt</span>
            <span class="badge bg-dark">Eritrea</span>
            <span class="badge bg-dark">Gabon</span>
            <span class="badge bg-dark">Gambia</span>
            <span class="badge bg-dark">Ghana</span>
            <span class="badge bg-dark">Guinea</span>
            <span class="badge bg-dark">India</span>
            <span class="badge bg-dark">Iraq</span>
            <span class="badge bg-dark">Israel</span>
            <span class="badge bg-dark">Ivory Coast</span>
            <span class="badge bg-dark">Jordan</span>
            <span class="badge bg-dark">Kazakhstan</span>
            <span class="badge bg-dark">Lebanon</span>
            <span class="badge bg-dark">Liberia</span>
            <span class="badge bg-dark">Mali</span>
            <span class="badge bg-dark">Morocco</span>
            <span class="badge bg-dark">Mozambique</span>
            <span class="badge bg-dark">Myanmar</span>
            <span class="badge bg-dark">Namibia</span>
            <span class="badge bg-dark">Niger</span>
            <span class="badge bg-dark">Nigeria</span>
            <span class="badge bg-dark">Oman</span>
            <span class="badge bg-dark">Philippines</span>
            <span class="badge bg-dark">Russia</span>
            <span class="badge bg-dark">Rwanda</span>
            <span class="badge bg-dark">Saudi Arabia</span>
            <span class="badge bg-dark">Senegal</span>
            <span class="badge bg-dark">Singapore</span>
            <span class="badge bg-dark">Sudan</span>
            <span class="badge bg-dark">Syria</span>
            <span class="badge bg-dark">Taiwan</span>
            <span class="badge bg-dark">Tanzania</span>
            <span class="badge bg-dark">Togo</span>
            <span class="badge bg-dark">United Arab Emirates</span>
            <span class="badge bg-dark">Uzbekistan</span>
            <span class="badge bg-dark">Vietnam</span>
            <span class="badge bg-dark">Zimbabwe</span>
        </div>
      </div>

      <div class="col-md-7 text-center">
        <img style=" margin-top: 33px; margin-left: 5%; " src="{{ asset('frontend/images/locations.jpg') }}" class="img-fluid" alt="Global Presence">
      </div>

    </div>
  </div>
</section>






<!-- PRODUCTS SECTION -->
<div class="section products">
    <div class="container">
        <div class="row">
			<div class="col-sm-12 col-md-12">
				<h2 class="section-heading">
					FEATURED PRODUCTS
				</h2>
			</div>
		</div>

        <style>
            .featured-product-section {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 25px;
                margin-bottom: 30px;
            }

            @media (max-width: 992px) {
                .featured-product-section {
                    grid-template-columns: repeat(2, 1fr);
                }
            }

            @media (max-width: 768px) {
                .featured-product-section {
                    grid-template-columns: 1fr;
                }
            }

            .featured-product-card {
                background: #ffffff;
                border-radius: 8px;
                overflow: hidden;
                box-shadow: 0 2px 8px rgba(0,0,0,0.1);
                transition: all .3s ease;
            }

            .featured-product-card:hover {
                transform: translateY(-4px);
                box-shadow: 0 8px 16px rgba(0,0,0,0.15);
            }

            .featured-product-img {
                width: 100%;
                height: 220px;
                object-fit: cover;
            }

            .featured-product-content {
                padding: 15px;
            }

            .featured-product-title {
                font-size: 16px;
                font-weight: 700;
                color: #0d2c54;
                margin-bottom: 8px;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }

            .featured-product-desc {
                font-size: 13px;
                color: #666;
                margin-bottom: 12px;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
                min-height: 32px;
            }

            .featured-product-btn {
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

            .featured-product-btn:hover {
                background: #ed1c24;
                color: #fff;
            }
        </style>

        <div class="featured-product-section">
            @foreach($featuredProducts as $product)
            <div class="featured-product-card">
                @if($product->image_path)
                    <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="featured-product-img">
                @else
                    <img src="{{ asset('frontend/images/600x400.jpg') }}" alt="Placeholder" class="featured-product-img">
                @endif

                <div class="featured-product-content">
                    <h3 class="featured-product-title">{{ $product->name }}</h3>
                    <p class="featured-product-desc">{{ Str::limit($product->description, 100) }}</p>
                    <a href="{{ route('products.show', $product->slug) }}" class="featured-product-btn">VIEW DETAILS</a>
                </div>
            </div>
            @endforeach
        </div>

        <div style="margin-top: 40px; text-align: center;">
            <a href="{{ route('products.index') }}" class="btn btn-secondary">VIEW ALL PRODUCTS</a>
        </div>
    </div>
</div><!-- TESTIMONIALS SECTION -->
<div class="section testimonials bg-light">
    <div class="container">
        <div class="row">
				<div class="col-sm-12 col-md-12">
					<h2 class="section-heading">
						WHAT OUR CLIENTS SAY
					</h2>
				</div>
			</div>

        <div class="row">
            <div class="col-md-12">
                <div id="owl-testimony">
                    @foreach($testimonials as $testimonial)

                    <div class="item">
                        <div class="testimonial-1">
                            <div class="media"><img src="images/600x600.jpg" alt="" class="img-responsive"></div>
                            <div class="body">
                            <div class="title">{{ $testimonial->author_name }}</div>
                            @if($testimonial->author_company)
                                <div class="company">{{ $testimonial->author_company }}</div>
                            @endif
                            <div class="rating text-primary">
                                @for($i = 0; $i < $testimonial->rating; $i++)
                                <i class="fa fa-star"></i>
                                @endfor
                            </div>

                            <p>{{ $testimonial->content }} </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>

<!-- BLOG SECTION -->
<div class="section blog">
    <div class="container">
        <div class="row">
			<div class="col-sm-12 col-md-12">
				<h2 class="section-heading">
					LATEST BLOGS
				</h2>
			</div>
		</div>

        <style>
            .blog-news-section {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 25px;
                margin-bottom: 30px;
            }

            @media (max-width: 992px) {
                .blog-news-section {
                    grid-template-columns: repeat(2, 1fr);
                }
            }

            @media (max-width: 768px) {
                .blog-news-section {
                    grid-template-columns: 1fr;
                }
            }

            .blog-news-box {
                background: #ffffff;
                border-radius: 8px;
                overflow: hidden;
                box-shadow: 0 2px 8px rgba(0,0,0,0.1);
                transition: all .3s ease;
            }

            .blog-news-box:hover {
                transform: translateY(-4px);
                box-shadow: 0 8px 16px rgba(0,0,0,0.15);
            }

            .blog-news-img {
                width: 100%;
                height: 220px;
                object-fit: cover;
            }

            .blog-news-body {
                padding: 15px;
            }

            .blog-news-title {
                font-size: 16px;
                font-weight: 700;
                color: #0d2c54;
                margin-bottom: 8px;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }

            .blog-news-title a {
                color: #0d2c54;
                text-decoration: none;
            }

            .blog-news-title a:hover {
                color: #ed1c24;
            }

            .blog-news-meta {
                font-size: 12px;
                color: #999;
                margin-bottom: 8px;
            }

            .blog-news-desc {
                font-size: 13px;
                color: #666;
                margin-bottom: 12px;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
                min-height: 32px;
            }
        </style>

        <div class="blog-news-section">
            @foreach($latestPosts as $post)
            <div class="blog-news-box">
                @if($post->featured_image)
                <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="blog-news-img">
                @else
                <img src="{{ asset('images/600x400.jpg') }}" alt="{{ $post->title }}" class="blog-news-img">
                @endif

                <div class="blog-news-body">
                    <div class="blog-news-title"><a href="{{ route('news.show', $post->slug) }}">{{ $post->title }}</a></div>
                    <div class="blog-news-meta">
                        <i class="fa fa-clock-o"></i> {{ $post->created_at->format('M d, Y') }}
                    </div>
                    <p class="blog-news-desc">{{ Str::limit($post->excerpt ?? $post->description, 100) }}</p>
                </div>
            </div>
            @endforeach
        </div>

        <div style="margin-top: 40px; text-align: center;">
            <a href="{{ route('news.index') }}" class="btn btn-secondary">VIEW ALL POSTS</a>
        </div>
    </div>
</div>
@endsection
