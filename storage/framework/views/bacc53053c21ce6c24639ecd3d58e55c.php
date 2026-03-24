 <?php
    $phones = array_map('trim', explode(',', $companyPhone));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=9">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $__env->yieldContent('title', $metaTitle); ?></title>
    <meta name="description" content="<?php echo $__env->yieldContent('description', $metaDescription); ?>">
    <meta name="keywords" content="<?php echo e($metaKeywords); ?>">

    <!-- Favicons -->
    <link rel="shortcut icon" href="<?php echo e(asset('frontend/images/favicon.ico')); ?>">
    <link rel="apple-touch-icon" href="<?php echo e(asset('frontend/images/apple-touch-icon.png')); ?>">

    <!-- CSS VENDOR -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/css/vendor/bootstrap.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/css/vendor/font-awesome.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/css/vendor/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/css/vendor/owl.theme.default.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/css/vendor/magnific-popup.css')); ?>">

    <!-- Custom Stylesheet -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/css/style.css')); ?>">

    <script type="text/javascript" src="<?php echo e(asset('frontend/js/vendor/modernizr.min.js')); ?>"></script>

    <style>

        .navbar-main .navbar-brand {
    position: absolute;
    left: 40px;
    top: -100px;
}

        @media (max-width: 479px) {
            .navbar-main .navbar-brand {
                top: 7px;
                width: 70%;
                left: 10px;
            }
        }

        /* WhatsApp Button Styles */
        .whatsapp-button {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background-color: #25d366;
            color: white;
            border-radius: 50px;
            padding: 12px 25px;
            font-size: 14px;
            font-weight: 600;
            z-index: 999;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            white-space: nowrap;
        }

        .whatsapp-button i {
            font-size: 20px;
        }

        .whatsapp-button:hover {
            background-color: #20ba5a;
            box-shadow: 0 4px 20px rgba(37, 211, 102, 0.4);
            transform: scale(1.05);
            text-decoration: none;
            color: white;
        }

        .whatsapp-button:active {
            transform: scale(0.98);
        }

        @media (max-width: 767px) {
            .whatsapp-button {
                bottom: 20px;
                right: 20px;
                padding: 10px 20px;
                font-size: 12px;
            }

            .whatsapp-button i {
                font-size: 18px;
            }
        }

    </style>
    <?php echo $__env->yieldContent('page_css'); ?>
</head>
<body>
    <!-- Load page -->
    <div class="animationload">
        <div class="loader"></div>
    </div>

    <!-- BACK TO TOP SECTION -->
    

    <!-- WHATSAPP BUTTON -->
    <a href="https://wa.me/971504791079" target="_blank" class="whatsapp-button " title="Chat with us on WhatsApp">
        <svg width="24px" height="24px" viewBox="0 0 24 24" role="img" xmlns="http://www.w3.org/2000/svg"><title>WhatsApp icon</title><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" fill="white"/></svg>
        <span>How can we help you?</span>
    </a>

    <!-- HEADER -->
    <div class="header">
        <!-- TOPBAR -->
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5 col-md-6">
                        <div class="topbar-left">
                            <div class="welcome-text">
                                We help the world growing since 1982
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7 col-md-6">
                        <div class="topbar-right">
                            
                            <ul class="topbar-sosmed">
                                <li><a href="<?php echo e($facebookUrl); ?>"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="<?php echo e($twitterUrl); ?>"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="<?php echo e($instagramUrl); ?>"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="<?php echo e($linkedinUrl); ?>"><i class="fa fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- TOPBAR LOGO SECTION -->
        <div class="topbar-logo">
            <div class="container">
                <div class="contact-info">
                    <!-- INFO 1 -->
                    <div class="box-icon-1">
                        <div class="icon">
                            <div class="fa fa-envelope-o"></div>
                        </div>
                        <div class="body-content">
                            <div class="heading">Email Support</div>
                            <?php echo e($companyEmail); ?>

                        </div>
                    </div>
                    <!-- INFO 2 -->
                    <div class="box-icon-1">
                        <div class="icon">
                            <div class="fa fa-phone"></div>
                        </div>
                        <div class="body-content">
                            <div class="heading">Call Support</div>
                             <?php $__currentLoopData = $phones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $phone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div><?php echo e($phone); ?></div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <!-- INFO 3 -->
                    <a href="<?php echo e(route('contact.show')); ?>" title="" class="btn btn-cta pull-right">GET A QUOTE</a>
                </div>
            </div>
        </div>

        <!-- NAVBAR SECTION -->
        <div class="navbar navbar-main">
            <div class="container container-nav">
                <div class="rowe">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <a class="navbar-brand" href="<?php echo e(route('home')); ?>">
                        <img src="<?php echo e(asset('frontend/images/logo.png')); ?>" alt="Union Lubricants" />
                    </a>

                    <nav class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-left">
                            <li class="dropdown <?php echo e(Request::routeIs('home') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('home')); ?>" title="Home">HOME</a>
                            </li>
                            <li class="dropdown <?php echo e(Request::routeIs('about') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('about')); ?>" title="About Us">ABOUT US</a>
                            </li>
                            <li class="dropdown <?php echo e(Request::routeIs('services.index') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('services.index')); ?>" title="Services">SERVICES</a>
                            </li>
                            <li class="dropdown <?php echo e(Request::routeIs('products.index', 'products.by-category') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('products.index')); ?>" data-toggle="dropdown" data-hover="dropdown" role="button" aria-haspopup="true" aria-expanded="false" title="Products">PRODUCTS <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e(route('products.by-category', $cat->slug)); ?>"><?php echo e(strtoupper($cat->name)); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </li>
                            <li class="dropdown <?php echo e(Request::routeIs('brands.index', 'brands.show') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('brands.index')); ?>" title="Our Brands">OUR BRANDS</a>
                            </li>
                            <li class="dropdown <?php echo e(Request::routeIs('news.index', 'news.show') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('news.index')); ?>" title="Blogs">BLOGS</a>
                            </li>
                            <li class="dropdown <?php echo e(Request::routeIs('contact.show', 'contact.store') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('contact.show')); ?>" title="Contact Us">CONTACT</a>
                            </li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                
                                <ul class="dropdown-menu">
                                    <li>
                                        
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- PAGE CONTENT -->
    <?php echo $__env->yieldContent('content'); ?>

    <!-- FOOTER -->
    
<!-- INFO BOX -->
	<div class="section info overlap-bottom">
		<div class="container">
			<div class="row">

				<div class="col-sm-4 col-md-4">
					<!-- BOX 1 -->
					<div class="box-icon-4">
						<div class="icon"><i class="fa fa-phone"></i></div>
						<div class="body-content">
							<div class="heading">CALL US NOW</div>

							 <?php $__currentLoopData = $phones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $phone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div><?php echo e($phone); ?></div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
					</div>
				</div>
				<div class="col-sm-4 col-md-4">
					<!-- BOX 2 -->
					<div class="box-icon-4">
						<div class="icon"><i class="fa fa-map-marker"></i></div>
						<div class="body-content">
							<div class="heading">COME VISIT US</div>
							<?php echo e($companyAddress); ?>

						</div>
					</div>
				</div>
				<div class="col-sm-4 col-md-4">
					<!-- BOX 3 -->
					<div class="box-icon-4">
						<div class="icon"><i class="fa fa-envelope"></i></div>
						<div class="body-content">
							<div class="heading">SEND US A MESSAGE</div>
							General: <?php echo e($companyEmail); ?>

						</div>
					</div>
				</div>

			</div>

		</div>
	</div>

    <!-- FOOTER SECTION -->
	<div class="footer">

		<div class="container">

			<div class="row">
				<div class="col-sm-3 col-md-3">
					<div class="footer-item">
						<img src="<?php echo e(asset('frontend/images/logo-light.png')); ?>" alt="Union Lubricants" style="max-width: 180px; margin-bottom: 15px;">
						<p>Union Lubricants - Premium industrial lubricants and specialty fluids for diverse applications.</p>
						<div class="footer-sosmed">
							<a href="<?php echo e($facebookUrl); ?>" title="Facebook">
								<div class="item">
									<i class="fa fa-facebook"></i>
								</div>
							</a>
							<a href="<?php echo e($twitterUrl); ?>" title="Twitter">
								<div class="item">
									<i class="fa fa-twitter"></i>
								</div>
							</a>
							<a href="<?php echo e($instagramUrl); ?>" title="Instagram">
								<div class="item">
									<i class="fa fa-instagram"></i>
								</div>
							</a>
							<a href="<?php echo e($linkedinUrl); ?>" title="LinkedIn">
								<div class="item">
									<i class="fa fa-linkedin"></i>
								</div>
							</a>
						</div>
					</div>
				</div>
				<div class="col-sm-3 col-md-3">
					<div class="footer-item">
						<div class="footer-title">
							Quick Links
						</div>
						<ul class="list">
							<li><a href="<?php echo e(route('home')); ?>" title="">Home</a></li>
							<li><a href="<?php echo e(route('about')); ?>" title="">About Us</a></li>
							<li><a href="<?php echo e(route('services.index')); ?>" title="">Services</a></li>
							<li><a href="<?php echo e(route('products.index')); ?>" title="">Products</a></li>
							<li><a href="<?php echo e(route('news.index')); ?>" title="">Blog</a></li>
							<li><a href="<?php echo e(route('contact.show')); ?>" title="">Contact</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-3 col-md-3">
					<div class="footer-item">
						<div class="footer-title">
							Our Products
						</div>
						<ul class="list">
							<li><a href="<?php echo e(route('products.index')); ?>" title="">Engine Oils</a></li>
							<li><a href="<?php echo e(route('products.index')); ?>" title="">Industrial Oils</a></li>
							<li><a href="<?php echo e(route('products.index')); ?>" title="">Hydraulic Fluids</a></li>
							<li><a href="<?php echo e(route('products.index')); ?>" title="">Coolants</a></li>
							<li><a href="<?php echo e(route('products.index')); ?>" title="">Specialty Lubricants</a></li>
							<li><a href="<?php echo e(route('products.index')); ?>" title="">Greases</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-3 col-md-3">
					<div class="footer-item">
						<div class="footer-title">
							Contact Info
						</div>
						<ul class="list" style="list-style: none; padding: 0;">
							<li style="margin-bottom: 12px;">


									 <?php $__currentLoopData = $phones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $phone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <i class="fa fa-phone" style="color: #0054a6; margin-right: 8px;"></i>
                                        <a href="tel:<?php echo e($phone); ?>" title=""><?php echo e($phone); ?></a><br>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</li>
							<li style="margin-bottom: 12px;">
								<i class="fa fa-envelope" style="color: #0054a6; margin-right: 8px;"></i>
									<a href="mailto:<?php echo e($companyEmail); ?>" title=""><?php echo e($companyEmail); ?></a>
							</li>
							<li style="margin-bottom: 12px;">
								<i class="fa fa-map-marker" style="color: #0054a6; margin-right: 8px;"></i>
									<span><?php echo e($companyAddress); ?></span>
							</li>
							<li>
								<i class="fa fa-clock-o" style="color: #0054a6; margin-right: 8px;"></i>
								<span>Sun - Thu: 08:00 AM - 06:00 PM</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

	<div class="fcopy">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12">
					<p class="ftex">&copy; <?php echo e(date('Y')); ?> Union Lubricants. All Rights Reserved. | <a href="#" style="color: inherit;">Privacy Policy</a> | <a href="#" style="color: inherit;">Terms & Conditions</a></p>
				</div>
			</div>
		</div>
	</div>	</div>

    <!-- JS VENDOR -->
    <script type="text/javascript" src="<?php echo e(asset('frontend/js/vendor/jquery.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('frontend/js/vendor/bootstrap.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('frontend/js/vendor/jquery.magnific-popup.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('frontend/js/vendor/jquery.counterup.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('frontend/js/vendor/waypoints.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('frontend/js/vendor/jquery.superslides.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('frontend/js/vendor/owl.carousel.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('frontend/js/vendor/isotope.pkgd.min.js')); ?>"></script>

    <!-- Custom JS -->
    <script type="text/javascript" src="<?php echo e(asset('frontend/js/script.js')); ?>"></script>

    <?php echo $__env->yieldContent('page_js'); ?>
</body>
</html>
<?php /**PATH C:\laragon\www\union\union_lubricants\union_lubricants\resources\views/layouts/frontend.blade.php ENDPATH**/ ?>