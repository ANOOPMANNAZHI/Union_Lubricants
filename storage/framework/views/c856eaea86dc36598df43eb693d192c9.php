<?php $__env->startSection('title', $brand->name . ' - Union Lubricants'); ?>

<?php $__env->startSection('content'); ?>
<!-- PAGE TITLE BANNER -->
<div class="section banner-page about" style="background: url(<?php echo e(asset('frontend/images/bgoverlay.jpg')); ?>);background-attachment: fixed;background-size: cover;">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12">
				<div class="title-page"><?php echo e($brand->name); ?></div>
				<ol class="breadcrumb">
					<li><a href="<?php echo e(route('home')); ?>">Home</a></li>
					<li><a href="<?php echo e(route('brands.index')); ?>">Brands</a></li>
					<li class="active"><?php echo e($brand->name); ?></li>
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
						<?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brnd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li <?php if($brnd->id === $brand->id): ?> class="active" <?php endif; ?>>
							<a href="<?php echo e(route('brands.show', $brnd->id)); ?>">
								<?php echo e($brnd->name); ?>

							</a>
						</li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ul>
				</div>

			</div>

			<!-- MAIN CONTENT -->
			<div class="col-sm-8 col-md-8 col-md-pull-4">
				<div class="single-page">
					<!-- Brand Logo -->
					<?php if($brand->logo_path): ?>
					<img src="<?php echo e(asset('storage/' . $brand->logo_path)); ?>" alt="<?php echo e($brand->name); ?>" class="img-responsive" style="max-width: 300px; margin-bottom: 30px;">
					<?php endif; ?>

					<div class="margin-bottom-30"></div>

					<!-- Brand Title -->
					<h2 class="section-heading">
						<?php echo e($brand->name); ?>

					</h2>

					<!-- Brand Description -->
					<p><?php echo e($brand->description); ?></p>

					<div class="margin-bottom-50"></div>

				</div>
			</div>

		</div>
	</div>
</div>

<!-- BRAND CATALOGS SECTION -->
<?php if($catalogs->count() > 0): ?>
<div class="section products bg-light">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="block-title text-center">
					<h2><?php echo e($brand->name); ?> Product Catalogs</h2>
					<p>Explore our complete range of products</p>
				</div>
			</div>
		</div>

		<div class="row">
			<?php $__currentLoopData = $catalogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catalog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="col-md-4 col-sm-6">
				<div class="box-product">
					<?php if($catalog->image_path): ?>
					<div class="product-image">
						<img src="<?php echo e(asset('storage/' . $catalog->image_path)); ?>" alt="<?php echo e($catalog->name); ?>" class="img-responsive">
					</div>
					<?php else: ?>
						<img src="<?php echo e(asset('images/600x400.jpg')); ?>" alt="<?php echo e($catalog->name); ?>" class="img-responsive">
					<?php endif; ?>
					<div class="product-info">
						<h4><?php echo e($catalog->name); ?></h4>
						<p class="price"><?php echo e($catalog->description ? Str::limit($catalog->description, 50) : 'Premium Product'); ?></p>
						<a href="javascript:void(0);" class="btn btn-secondary btn-sm">View Details</a>
					</div>
				</div>
			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	</div>
</div>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\union\union_lubricants\union_lubricants\resources\views/frontend/brands/show.blade.php ENDPATH**/ ?>