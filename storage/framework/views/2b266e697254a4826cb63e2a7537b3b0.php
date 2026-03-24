<?php $__env->startSection('title', 'Latest News & Blogs - Union Lubricants'); ?>

<?php $__env->startSection('content'); ?>
<!-- PAGE TITLE BANNER -->
<div class="section banner-page about" style="background: url(<?php echo e(asset('frontend/images/bgoverlay.jpg')); ?>);background-attachment: fixed;background-size: cover;">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12">
				<div class="title-page">Latest News</div>
				<ol class="breadcrumb">
					<li><a href="<?php echo e(route('home')); ?>">Home</a></li>
					<li class="active">News</li>
				</ol>
			</div>
		</div>
	</div>
</div>

<!-- NEWS GRID SECTION -->
<div class="section why overlap">
	<div class="container">
		<div class="row">
			<?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
			<div class="col-sm-6 col-md-4">
				<!-- NEWS BOX -->
				<div class="box-news-1">
					<div class="media gbr">
						<?php if($post->featured_image): ?>
						<img src="<?php echo e(asset('storage/' . $post->featured_image)); ?>" alt="<?php echo e($post->title); ?>" class="img-responsive">
						<?php else: ?>
						<img src="<?php echo e(asset('images/600x400.jpg')); ?>" alt="<?php echo e($post->title); ?>" class="img-responsive">
						<?php endif; ?>
					</div>
					<div class="body">
						<div class="title"><a href="<?php echo e(route('news.show', $post->slug)); ?>" title=""><?php echo e($post->title); ?></a></div>
						<div class="meta">
							<span class="date"><i class="fa fa-clock-o"></i> <?php echo e($post->created_at->format('M d, Y')); ?></span>
							
						</div>
					</div>
				</div>
			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
			<div class="col-md-12">
				<p class="text-center">No blog posts available at the moment.</p>
			</div>
			<?php endif; ?>
		</div>

		<!-- PAGINATION -->
		<?php if($posts->hasPages()): ?>
		<div class="row">
			<div class="col-sm-12 col-md-12">
				<ul class="pagination">
					<?php echo e($posts->links()); ?>

				</ul>
			</div>
		</div>
		<?php endif; ?>
	</div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\union\union_lubricants\union_lubricants\resources\views/frontend/news/index.blade.php ENDPATH**/ ?>