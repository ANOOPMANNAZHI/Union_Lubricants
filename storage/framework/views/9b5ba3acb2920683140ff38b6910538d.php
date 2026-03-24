<?php $__env->startSection('title', 'Home - Union Lubricants'); ?>

<?php $__env->startSection('content'); ?>


<!-- BANNER SECTION -->
<div id="slides" class="section banner">
    <ul class="slides-container">
        <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li>
            <img src="<?php echo e(asset('storage/' . $banner->image_path)); ?>" alt="<?php echo e($banner->heading); ?>">
            <div class="overlay-bg"></div>
            <div class="container">
                <div class="wrap-caption">
                    <h2 class="caption-heading"><?php echo e($banner->heading); ?></h2>
                    <p class="excerpt"><?php echo e($banner->description); ?></p>
                    <a href="<?php echo e(route('contact.show')); ?>" class="btn btn-primary" title="GET A QUOTE">GET A QUOTE</a>
                    <a href="<?php echo e(route('services.index')); ?>" class="btn btn-secondary" title="EXPLORE SERVICES">EXPLORE SERVICES</a>
                </div>
            </div>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
						<h2><?php echo e($about->title); ?></h2>
						<span class="fa fa-paper-plane-o"></span>
					</div>
				</div>
				<div class="col-sm-7 col-md-7">
					<p class="lead"><?php echo e(Str::limit($about->content, 500)); ?></p>

                    <a href="<?php echo e(route('about')); ?>" class="btn btn-primary">Read More</a>
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
            <?php $__currentLoopData = $featuredServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 col-sm-6">
                

                <div class="feature-box-8">
                    <div class="media">
                    <?php if($service->image_path): ?>
                        <img src="<?php echo e(asset('storage/' . $service->image_path)); ?>" alt="<?php echo e($service->title); ?>" class="img-responsive">
                    <?php else: ?>
                        <img src="<?php echo e(asset('images/600x400.jpg')); ?>" alt="<?php echo e($service->title); ?>" class="img-responsive">
                    <?php endif; ?>
                    </div>
                    <div class="body">
                    <div class="icon-holder">
                        <span class="fa <?php echo e($service->icon); ?>"></span>
                    </div>
                    <a href="<?php echo e(route('services.index')); ?>" class="title"><?php echo e($service->title); ?></a>
                    <p><?php echo e(Str::limit($service->description, 100)); ?></p>
                    <a href="<?php echo e(route('services.index')); ?>" class="readmore">READ MORE</a>
                    </div>
                </div>


            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="row">
            <div class="col-md-12 text-center">
                <a href="<?php echo e(route('services.index')); ?>" class="btn btn-primary">View All Services</a>
            </div>
        </div>
    </div>
</div>





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
        <img style=" margin-top: 33px; margin-left: 5%; " src="<?php echo e(asset('frontend/images/locations.jpg')); ?>" class="img-fluid" alt="Global Presence">
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
            <?php $__currentLoopData = $featuredProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="featured-product-card">
                <?php if($product->image_path): ?>
                    <img src="<?php echo e(asset('storage/' . $product->image_path)); ?>" alt="<?php echo e($product->name); ?>" class="featured-product-img">
                <?php else: ?>
                    <img src="<?php echo e(asset('frontend/images/600x400.jpg')); ?>" alt="Placeholder" class="featured-product-img">
                <?php endif; ?>

                <div class="featured-product-content">
                    <h3 class="featured-product-title"><?php echo e($product->name); ?></h3>
                    <p class="featured-product-desc"><?php echo e(Str::limit($product->description, 100)); ?></p>
                    <a href="<?php echo e(route('products.show', $product->slug)); ?>" class="featured-product-btn">VIEW DETAILS</a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div style="margin-top: 40px; text-align: center;">
            <a href="<?php echo e(route('products.index')); ?>" class="btn btn-secondary">VIEW ALL PRODUCTS</a>
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
                    <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="item">
                        <div class="testimonial-1">
                            <div class="media"><img src="images/600x600.jpg" alt="" class="img-responsive"></div>
                            <div class="body">
                            <div class="title"><?php echo e($testimonial->author_name); ?></div>
                            <?php if($testimonial->author_company): ?>
                                <div class="company"><?php echo e($testimonial->author_company); ?></div>
                            <?php endif; ?>
                            <div class="rating text-primary">
                                <?php for($i = 0; $i < $testimonial->rating; $i++): ?>
                                <i class="fa fa-star"></i>
                                <?php endfor; ?>
                            </div>

                            <p><?php echo e($testimonial->content); ?> </p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
            <?php $__currentLoopData = $latestPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="blog-news-box">
                <?php if($post->featured_image): ?>
                <img src="<?php echo e(asset('storage/' . $post->featured_image)); ?>" alt="<?php echo e($post->title); ?>" class="blog-news-img">
                <?php else: ?>
                <img src="<?php echo e(asset('images/600x400.jpg')); ?>" alt="<?php echo e($post->title); ?>" class="blog-news-img">
                <?php endif; ?>

                <div class="blog-news-body">
                    <div class="blog-news-title"><a href="<?php echo e(route('news.show', $post->slug)); ?>"><?php echo e($post->title); ?></a></div>
                    <div class="blog-news-meta">
                        <i class="fa fa-clock-o"></i> <?php echo e($post->created_at->format('M d, Y')); ?>

                    </div>
                    <p class="blog-news-desc"><?php echo e(Str::limit($post->excerpt ?? $post->description, 100)); ?></p>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div style="margin-top: 40px; text-align: center;">
            <a href="<?php echo e(route('news.index')); ?>" class="btn btn-secondary">VIEW ALL POSTS</a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\union\union_lubricants\union_lubricants\resources\views/frontend/home.blade.php ENDPATH**/ ?>