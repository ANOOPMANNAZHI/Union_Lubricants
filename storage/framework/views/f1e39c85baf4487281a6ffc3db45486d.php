<?php $__env->startSection('title', $service->title . ' - Union Lubricants'); ?>

<?php $__env->startSection('content'); ?>
<!-- PAGE TITLE BANNER -->
<div class="section banner-page about" style="background: url(<?php echo e(asset('frontend/images/bgoverlay.jpg')); ?>);background-attachment: fixed;background-size: cover;">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12">
				<div class="title-page"><?php echo e($service->title); ?></div>
				<ol class="breadcrumb">
					<li><a href="<?php echo e(route('home')); ?>">Home</a></li>
					<li><a href="<?php echo e(route('services.index')); ?>">Services</a></li>
					<li class="active"><?php echo e($service->title); ?></li>
				</ol>
			</div>
		</div>
	</div>
</div>

<!-- SERVICE DETAIL SECTION -->
<div class="section why overlap">
	<div class="container">
		<div class="row">
			<!-- SIDEBAR -->
			<div class="col-sm-4 col-md-4 col-md-push-8">
				<!-- Services Categories Widget -->
				<div class="widget categories">
					<ul class="category-nav">
						<?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $svc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li <?php if($svc->id === $service->id): ?> class="active" <?php endif; ?>>
							<a href="<?php echo e(route('services.show', $svc->id)); ?>">
								<?php if($svc->icon): ?>
									<i class="fa <?php echo e($svc->icon); ?>"></i>
								<?php endif; ?>
								<?php echo e($svc->title); ?>

							</a>
						</li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ul>
				</div>

				<!-- Company Brochure Download -->
				<?php if($service->pdf_path ?? false): ?>
				<div class="widget download">
					<a href="<?php echo e(asset('storage/' . $service->pdf_path)); ?>" target="_blank" class="btn btn-secondary btn-block btn-sidebar">
						<span class="fa fa-file-pdf-o"></span> Download Brochure
					</a>
				</div>
				<?php endif; ?>


			</div>

			<!-- MAIN CONTENT -->
			<div class="col-sm-8 col-md-8 col-md-pull-4">
				<div class="single-page">
					<!-- Service Image -->
					<?php if($service->image_path): ?>
					<img src="<?php echo e(asset('storage/' . $service->image_path)); ?>" alt="<?php echo e($service->title); ?>" class="img-responsive">
					<?php else: ?>
					<img src="<?php echo e(asset('images/800x500.jpg')); ?>" alt="<?php echo e($service->title); ?>" class="img-responsive">
					<?php endif; ?>

					<div class="margin-bottom-30"></div>

					<!-- Service Title -->
					<h2 class="section-heading">
						<?php echo e($service->title); ?>

					</h2>

					<!-- Service Description -->
					<p><?php echo e($service->description); ?></p>

					<!-- Service Content Quote -->
					

					<div class="margin-bottom-50"></div>

					<!-- Two Column Section -->
					

					<div class="margin-bottom-50"></div>

					<!-- FAQ Section -->
					<h2 class="section-heading">
						Frequently Asked Questions
					</h2>
					<div class="section-subheading">Learn more about our services and products</div>

					<div class="panel-group panel-faq" id="accordion" role="tablist" aria-multiselectable="true">
						<!-- FAQ Item 1 -->
						<div class="panel panel-default active">
							<div class="panel-heading" role="tab" id="heading1">
								<h4 class="panel-title">
									<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1">
										What makes our lubricants superior?
									</a>
								</h4>
							</div>
							<div id="collapse1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading1">
								<div class="panel-body">
									<p>Our lubricants are engineered using advanced formulations that provide superior protection, longer service life, and better performance across a wide range of industrial applications. Each product is rigorously tested to meet the highest quality standards.</p>
								</div>
							</div>
						</div>

						<!-- FAQ Item 2 -->
						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="heading2">
								<h4 class="panel-title">
									<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="false" aria-controls="collapse2">
										Do you offer customized solutions?
									</a>
								</h4>
							</div>
							<div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
								<div class="panel-body">
									<p>Yes, we understand that every industry has unique requirements. Our expert team works closely with clients to develop customized lubrication solutions that optimize equipment performance and minimize downtime.</p>
									<ul class="list-unstyled">
										<li><i class="fa fa-check"></i> Personalized consultation services</li>
										<li><i class="fa fa-check"></i> Custom formulation options</li>
										<li><i class="fa fa-check"></i> Technical support and training</li>
										<li><i class="fa fa-check"></i> Bulk supply agreements</li>
										<li><i class="fa fa-check"></i> Competitive pricing</li>
									</ul>
								</div>
							</div>
						</div>

						<!-- FAQ Item 3 -->
						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="heading3">
								<h4 class="panel-title">
									<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="false" aria-controls="collapse3">
										What is your delivery timeframe?
									</a>
								</h4>
							</div>
							<div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
								<div class="panel-body">
									<p>We pride ourselves on fast and reliable delivery. For standard orders, we typically deliver within 3-5 business days. For bulk orders or special formulations, delivery timelines can be customized based on your requirements.</p>
									<p>Contact our sales team to discuss your specific delivery needs and to learn about our available shipping options.</p>
								</div>
							</div>
						</div>

						<!-- FAQ Item 4 -->
						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="heading4">
								<h4 class="panel-title">
									<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="false" aria-controls="collapse4">
										How can I get technical support?
									</a>
								</h4>
							</div>
							<div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
								<div class="panel-body">
									<p>Our technical support team is available to assist you with product selection, application guidance, troubleshooting, and optimization recommendations. You can reach us by phone, email, or through our online contact form.</p>
									<p>We also offer on-site consultations for major clients to ensure optimal implementation of our products.</p>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>

		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\union\union_lubricants\union_lubricants\resources\views/frontend/service-detail.blade.php ENDPATH**/ ?>