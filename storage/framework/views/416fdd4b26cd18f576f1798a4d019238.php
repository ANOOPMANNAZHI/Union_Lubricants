<?php $__env->startSection('title', 'Product Catalog - ' . $catalog->file_name); ?>

<?php $__env->startSection('content'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-1"><?php echo e($catalog->file_name); ?></h4>
            <p class="text-muted mb-0">Version <?php echo e($catalog->version); ?></p>
        </div>
        <div class="btn-group" role="group">
            <a href="<?php echo e(route('admin.catalogs.edit', $catalog->id)); ?>" class="btn btn-primary">
                <i class="bx bx-edit"></i> Edit
            </a>
            <a href="<?php echo e(route('admin.catalogs.download', $catalog->id)); ?>" class="btn btn-success" download>
                <i class="bx bx-download"></i> Download
            </a>
            <a href="<?php echo e(route('admin.catalogs.index')); ?>" class="btn btn-secondary">
                <i class="bx bx-arrow-back"></i> Back
            </a>
        </div>
    </div>

    <div class="row">
        <!-- Catalog Details -->
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">File Information</h5>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td class="w-25"><strong>File Name</strong></td>
                                <td><?php echo e($catalog->file_name); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Version</strong></td>
                                <td>
                                    <span class="badge bg-label-primary">v<?php echo e($catalog->version); ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>File Type</strong></td>
                                <td>
                                    <span class="badge bg-label-info"><?php echo e(strtoupper($catalog->file_type)); ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Uploaded By</strong></td>
                                <td><?php echo e($catalog->uploadedByUser?->name ?? 'Unknown'); ?></td>
                            </tr>
                            <tr>
                                <td><strong>Uploaded Date</strong></td>
                                <td>
                                    <?php echo e($catalog->created_at->format('F j, Y \a\t g:i A')); ?>

                                    <br>
                                    <small class="text-muted"><?php echo e($catalog->created_at->diffForHumans()); ?></small>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Last Updated</strong></td>
                                <td>
                                    <?php echo e($catalog->updated_at->format('F j, Y \a\t g:i A')); ?>

                                    <br>
                                    <small class="text-muted"><?php echo e($catalog->updated_at->diffForHumans()); ?></small>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Description -->
            <?php if($catalog->description): ?>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Description</h5>
                    </div>
                    <div class="card-body">
                        <p class="mb-0"><?php echo e(nl2br(e($catalog->description))); ?></p>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <!-- Actions Sidebar -->
        <div class="col-md-4">
            <!-- Quick Actions -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Quick Actions</h5>
                </div>
                <div class="card-body d-grid gap-2">
                    <a href="<?php echo e(route('admin.catalogs.download', $catalog->id)); ?>" class="btn btn-lg btn-success"
                        download>
                        <i class="bx bx-download"></i> Download File
                    </a>
                    <a href="<?php echo e(route('admin.catalogs.edit', $catalog->id)); ?>" class="btn btn-lg btn-primary">
                        <i class="bx bx-edit"></i> Edit Details
                    </a>

                    <form method="POST" action="<?php echo e(route('admin.catalogs.destroy', $catalog->id)); ?>"
                        onsubmit="return confirm('Are you sure you want to delete this catalog? This action cannot be undone.');"
                        class="mt-2">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-lg btn-danger w-100">
                            <i class="bx bx-trash"></i> Delete Catalog
                        </button>
                    </form>
                </div>
            </div>

            <!-- Version History -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Version History</h5>
                </div>
                <div class="card-body">
                    <?php
                        $allVersions = App\Models\ProductCatalog::orderByDesc('version')->limit(10)->get();
                    ?>

                    <?php $__empty_1 = true; $__currentLoopData = $allVersions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $version): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="mb-3 pb-3 <?php if(!$loop->last): ?> border-bottom <?php endif; ?>">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <p class="mb-1">
                                        <strong>
                                            v<?php echo e($version->version); ?>

                                            <?php if($version->id === $catalog->id): ?>
                                                <span class="badge bg-success">Current</span>
                                            <?php endif; ?>
                                        </strong>
                                    </p>
                                    <small class="text-muted d-block"><?php echo e($version->created_at->format('M d, Y')); ?></small>
                                </div>
                                <?php if($version->id !== $catalog->id): ?>
                                    <a href="<?php echo e(route('admin.catalogs.show', $version->id)); ?>" class="btn btn-sm btn-text-primary">
                                        View
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p class="small text-muted mb-0">No previous versions</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\union\union_lubricants\union_lubricants\resources\views/admin/catalogs/show.blade.php ENDPATH**/ ?>