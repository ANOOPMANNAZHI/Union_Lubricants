<?php $__env->startSection('title', 'Brands - Union Lubricants'); ?>

<?php $__env->startSection('content'); ?>
<!-- PAGE TITLE BANNER -->
<div class="section banner-page about" style="background: url(<?php echo e(asset('frontend/images/bgoverlay.jpg')); ?>);background-attachment: fixed;background-size: cover;">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12">
				<div class="title-page">Our Brands</div>
				<ol class="breadcrumb">
					<li><a href="<?php echo e(route('home')); ?>">Home</a></li>
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
						<?php $__empty_1 = true; $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
						<!-- item -->
						<div class="item">
							<div class="box-image">
								<div class="client-img">
									<a href="<?php echo e(route('brands.show', $brand->id)); ?>">
										<?php if($brand->logo_path): ?>
											<img src="<?php echo e(asset('storage/' . $brand->logo_path)); ?>" alt="<?php echo e($brand->name); ?>" class="img-responsive">
										<?php else: ?>
											<img src="<?php echo e(asset('images/600x400.jpg')); ?>" alt="<?php echo e($brand->name); ?>" class="img-responsive">
										<?php endif; ?>
									</a>
								</div>
							</div>
							<div class="box-info">
								<div class="heading"><?php echo e($brand->name); ?></div>
								<p><?php echo e(Str::limit($brand->description, 150)); ?></p>

								<!-- Product Catalogs List -->
								<?php
									$catalogs = $brand->catalogs()->get();
								?>

								<?php if($catalogs->count() > 0): ?>
									<div class="catalog-list" style="margin-top: 10px;">
										<?php $__currentLoopData = $catalogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catalog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<div style="margin-bottom: 6px;">
												<a href="<?php echo e(route('catalog.download-public', $catalog->id)); ?>" target="_blank" style="color: #0054a6; font-weight: 600;">
													<span class="fa fa-file-pdf-o"></span> Download <?php echo e($brand->name); ?> Product List
												</a>
											</div>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</div>
								<?php else: ?>
									<p style="font-size: 12px; color: #999; margin-top: 10px;">No catalogs available</p>
								<?php endif; ?>
							</div>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
						<!-- No brands -->
						<div class="item">
							<div class="box-info">
								<p class="text-center">No brands available at the moment.</p>
							</div>
						</div>
						<?php endif; ?>

					</div>
				</div>

			</div>
		</div>
	</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\union\union_lubricants\union_lubricants\resources\views/frontend/brands/index.blade.php ENDPATH**/ ?>