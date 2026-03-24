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

<?php $__env->startSection('content'); ?>
<!-- PAGE TITLE BANNER -->
<div class="section banner-page about" style="background: url(<?php echo e(asset('frontend/images/bgoverlay.jpg')); ?>);background-attachment: fixed;background-size: cover;">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12">
				<div class="title-page"><?php echo e($category->name); ?> Products</div>
				<ol class="breadcrumb">
					<li><a href="<?php echo e(route('home')); ?>">Home</a></li>
					<li><a href="<?php echo e(route('products.index')); ?>">Products</a></li>
					<li class="active"><?php echo e($category->name); ?></li>
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
						<?php if($latestCatalog): ?>
						<li style="margin-bottom: 20px;">
							<a href="<?php echo e(route('catalog.download-public', $latestCatalog->id)); ?>" target="_blank" style="color: #0054a6; font-weight: 600;">
								<span class="fa fa-file-pdf-o"></span> Download Vortoil Product List
							</a>
						</li>
						<?php else: ?>
						<li><a href="<?php echo e(route('products.index')); ?>">All Products</a></li>
						<?php endif; ?>
						<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li <?php if($category->id === $cat->id): ?> class="active" <?php endif; ?>>
							<a href="<?php echo e(route('products.by-category', $cat->slug)); ?>"><?php echo e($cat->name); ?></a>
						</li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ul>
				</div>


			</div>

			<!-- MAIN CONTENT -->
			<div class="col-sm-8 col-md-8 col-md-pull-4" >
				<div class="products-list">
					<h2 class="section-heading" style=" padding-bottom: 0; "><?php echo e($category->name); ?></h2>
					

					<div class="product-section">
						<?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
						<div class="product-card">
							<?php if($product->image_path): ?>
							<img src="<?php echo e(asset('storage/' . $product->image_path)); ?>" alt="<?php echo e($product->name); ?>" class="product-img">
							<?php else: ?>
							<img src="<?php echo e(asset('images/600x400.jpg')); ?>" alt="<?php echo e($product->name); ?>" class="product-img">
							<?php endif; ?>

							<div class="product-content">
								<h3 class="product-title"><?php echo e($product->name); ?></h3>
								<p class="product-desc"><?php echo e(Str::limit($product->description, 100)); ?></p>
								<a href="<?php echo e(route('products.show', $product->slug)); ?>" class="product-btn">VIEW DETAILS</a>
							</div>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
						<div style="width: 100%; text-align: center; padding: 40px 20px;">
							<p>No products available in this category.</p>
						</div>
						<?php endif; ?>
					</div>

					<!-- PAGINATION -->
					<?php if($products->hasPages()): ?>
					<div style="margin-top: 30px; text-align: center;">
						<?php echo e($products->links()); ?>

					</div>
					<?php endif; ?>
				</div>
			</div>

		</div>
	</div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\union\union_lubricants\union_lubricants\resources\views/frontend/products/category.blade.php ENDPATH**/ ?>