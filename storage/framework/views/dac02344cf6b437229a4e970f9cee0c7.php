

<?php $__env->startSection('title', 'Brands - Admin'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="py-3 mb-0"><span class="text-muted fw-light">eCommerce /</span> Brands</h4>
            <a href="<?php echo e(route('admin.brands.create')); ?>" class="btn btn-primary">
                <i class="bx bx-plus me-2"></i> Add Brand
            </a>
        </div>
    </div>
</div>

<?php if($brands->count() > 0): ?>
    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Logo</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Catalogs</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php if($brand->logo_path): ?>
                                    <img src="<?php echo e($brand->logo_url); ?>" alt="<?php echo e($brand->name); ?>" height="40" class="rounded">
                                <?php else: ?>
                                    <span class="badge bg-label-secondary">No Logo</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <strong><?php echo e($brand->name); ?></strong>
                            </td>
                            <td>
                                <code><?php echo e($brand->slug); ?></code>
                            </td>
                            <td>
                                <span class="badge bg-label-info"><?php echo e($brand->catalogs_count ?? 0); ?></span>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-sm btn-icon btn-text-secondary rounded-pill" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?php echo e(route('admin.brands.show', $brand->id)); ?>">
                                            <i class="bx bx-show me-1"></i> View
                                        </a>
                                        <a class="dropdown-item" href="<?php echo e(route('admin.brands.edit', $brand->id)); ?>">
                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <form action="<?php echo e(route('admin.brands.destroy', $brand->id)); ?>" method="POST" style="display: inline;" onclick="return confirm('Delete this brand?')">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="dropdown-item text-danger">
                                                <i class="bx bx-trash me-1"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12 d-flex justify-content-center">
            <?php echo e($brands->links()); ?>

        </div>
    </div>
<?php else: ?>
    <div class="card">
        <div class="card-body py-5">
            <div class="text-center">
                <p class="text-muted mb-0">
                    <i class="bx bx-package" style="font-size: 48px; opacity: 0.3;"></i>
                </p>
                <p class="text-muted mt-3">No brands found. <a href="<?php echo e(route('admin.brands.create')); ?>">Create the first brand</a></p>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\union\union_lubricants\union_lubricants\resources\views/admin/brands/index.blade.php ENDPATH**/ ?>