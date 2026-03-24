<?php $__env->startSection('title', 'Edit Catalog - ' . $catalog->file_name); ?>

<?php $__env->startSection('content'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Page Header -->
    <div class="mb-4">
        <h4 class="mb-1">Edit Catalog</h4>
        <p class="text-muted">Update catalog details and description</p>
    </div>

    <!-- Error Messages -->
    <?php if($errors->any()): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Validation Errors!</strong>
            <ul class="mb-0 mt-2">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo e(route('admin.catalogs.update', $catalog->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PATCH'); ?>

                        <!-- File Information Display -->
                        <div class="mb-4 p-3 bg-light rounded">
                            <h6 class="mb-3"><i class="bx bx-file"></i> Current File</h6>
                            <table class="table table-sm mb-0">
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
                                        <td><strong>Uploaded</strong></td>
                                        <td><?php echo e($catalog->created_at->format('F j, Y \a\t g:i A')); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Brand Selection -->
                        <div class="mb-4">
                            <label class="form-label" for="brand_id">
                                <strong>Associated Brand</strong>
                            </label>
                            <select class="form-select <?php $__errorArgs = ['brand_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                id="brand_id" name="brand_id">
                                <option value="">-- Select a brand (optional) --</option>
                                <?php $__empty_1 = true; $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <option value="<?php echo e($brand->id); ?>" <?php echo e(old('brand_id', $catalog->brand_id) == $brand->id ? 'selected' : ''); ?>>
                                        <?php echo e($brand->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <option disabled>No brands available</option>
                                <?php endif; ?>
                            </select>

                            <?php $__errorArgs = ['brand_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                            <small class="text-muted d-block mt-2">
                                Optionally associate this catalog with a brand.
                            </small>
                        </div>

                        <!-- Description Field -->
                        <div class="mb-4">
                            <label class="form-label" for="description">
                                <strong>Description</strong>
                            </label>
                            <textarea class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                id="description" name="description" rows="6"
                                placeholder="Enter or update the catalog description..."><?php echo e(old('description', $catalog->description)); ?></textarea>

                            <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                            <small class="text-muted d-block mt-2">
                                Max 1000 characters. You can update the description without replacing the file.
                            </small>
                        </div>

                        <!-- Submit Buttons -->
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bx bx-save"></i> Save Changes
                            </button>
                            <a href="<?php echo e(route('admin.catalogs.show', $catalog->id)); ?>" class="btn btn-secondary">
                                <i class="bx bx-x"></i> Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Info Sidebar -->
        <div class="col-md-4">
            <div class="card bg-light">
                <div class="card-body">
                    <h6 class="card-title mb-3">
                        <i class="bx bx-info-circle"></i> Editing Tips
                    </h6>

                    <div class="mb-3">
                        <h6 class="text-muted small">File Replacement</h6>
                        <p class="small mb-0">
                            To replace this file with a newer version, go back to the catalog list and upload a new file. The version number will be automatically incremented.
                        </p>
                    </div>

                    <div class="mb-3">
                        <h6 class="text-muted small">Description Updates</h6>
                        <p class="small mb-0">
                            Update the description to add version notes, changelog information, or other relevant details about this catalog.
                        </p>
                    </div>

                    <div class="alert alert-info small mb-0">
                        <strong>Note:</strong> Previous versions of this catalog are preserved in the version history for reference and audit purposes.
                    </div>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="card mt-3">
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="<?php echo e(route('admin.catalogs.show', $catalog->id)); ?>" class="btn btn-sm btn-outline-primary">
                            <i class="bx bx-show"></i> View Catalog
                        </a>
                        <a href="<?php echo e(route('admin.catalogs.download', $catalog->id)); ?>" class="btn btn-sm btn-outline-success"
                            download>
                            <i class="bx bx-download"></i> Download
                        </a>
                        <a href="<?php echo e(route('admin.catalogs.index')); ?>" class="btn btn-sm btn-outline-secondary">
                            <i class="bx bx-list-ul"></i> All Catalogs
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\union\union_lubricants\union_lubricants\resources\views/admin/catalogs/edit.blade.php ENDPATH**/ ?>