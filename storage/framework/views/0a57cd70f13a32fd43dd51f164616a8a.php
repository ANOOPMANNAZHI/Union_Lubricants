<?php $__env->startSection('title', 'Banners - Admin'); ?>

<?php $__env->startSection('content'); ?>
<div class="row mb-4">
    <div class="col-12 d-flex justify-content-between align-items-center">
        <div>
            <h4 class="py-3 mb-0"><span class="text-muted fw-light">Admin /</span> Banners</h4>
            <p class="text-muted small">Manage website banners (1920x960px recommended)</p>
        </div>
        <a href="<?php echo e(route('admin.banners.create')); ?>" class="btn btn-primary">
            <i class="bx bx-plus me-1"></i> New Banner
        </a>
    </div>
</div>


<div class="row">
    <?php $__empty_1 = true; $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="col-lg-6 mb-4">
        <div class="card h-100">
            <img src="<?php echo e(asset('storage/' . $banner->image_path)); ?>" alt="<?php echo e($banner->heading); ?>"
                class="card-img-top" style="height: 200px; object-fit: cover;">
            <div class="card-body">
                <h5 class="card-title"><?php echo e($banner->heading); ?></h5>
                <p class="card-text text-muted small"><?php echo e(Str::limit($banner->description, 100)); ?></p>
                <div class="text-muted small mb-3">
                    <i class="bx bx-calendar"></i> <?php echo e($banner->created_at->format('M d, Y')); ?>

                </div>
            </div>
            <div class="card-footer bg-transparent">
                <div class="d-flex gap-2">
                    <a href="<?php echo e(route('admin.banners.edit', $banner->id)); ?>" class="btn btn-sm btn-outline-primary flex-grow-1">
                        <i class="bx bx-pencil"></i> Edit
                    </a>
                    <form action="<?php echo e(route('admin.banners.destroy', $banner->id)); ?>" method="POST" class="flex-grow-1"
                        onsubmit="return confirm('Are you sure you want to delete this banner?');">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-sm btn-outline-danger w-100">
                            <i class="bx bx-trash"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <div class="col-12">
        <div class="card">
            <div class="card-body text-center py-5">
                <p class="text-muted mb-3">No banners yet</p>
                <a href="<?php echo e(route('admin.banners.create')); ?>" class="btn btn-primary">
                    <i class="bx bx-plus me-1"></i> Create First Banner
                </a>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>

<?php if($banners->hasPages()): ?>
<div class="mt-4">
    <?php echo e($banners->links()); ?>

</div>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\union\union_lubricants\union_lubricants\resources\views/admin/banners/index.blade.php ENDPATH**/ ?>