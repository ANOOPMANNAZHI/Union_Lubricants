<?php $__env->startSection('title', 'Upload Product Catalog'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Page Header -->
    <div class="mb-4">
        <h4 class="mb-1">Upload New Product Catalog</h4>
        <p class="text-muted">Upload a product catalog file (PDF, Excel, or CSV)</p>
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
                    <form action="<?php echo e(route('admin.catalogs.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <!-- File Upload Field -->
                        <div class="mb-4">
                            <label class="form-label" for="file">
                                <strong>Catalog File</strong>
                                <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <input type="file" class="form-control <?php $__errorArgs = ['file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    id="file" name="file" accept=".pdf,.xlsx,.xls,.csv" required
                                    onchange="updateFileInfo(this)">
                                <label class="input-group-text" for="file">
                                    <i class="bx bx-cloud-upload"></i> Browse
                                </label>
                            </div>

                            <?php $__errorArgs = ['file'];
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
                                <strong>Accepted formats:</strong> PDF, Excel (.xlsx, .xls), CSV
                                <br>
                                <strong>Maximum file size:</strong> 10 MB
                            </small>
                        </div>

                        <!-- File Info Display -->
                        <div id="fileInfo" class="alert alert-info d-none mb-4" role="alert">
                            <strong>File Information:</strong>
                            <div class="mt-2">
                                <p class="mb-1"><strong>Name:</strong> <span id="fileName">—</span></p>
                                <p class="mb-1"><strong>Size:</strong> <span id="fileSize">—</span></p>
                                <p class="mb-0"><strong>Type:</strong> <span id="fileType">—</span></p>
                            </div>
                        </div>

                        <!-- Brand Selection -->
                        <div class="mb-4">
                            <label class="form-label" for="brand_id">
                                Associated Brand
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
                                    <option value="<?php echo e($brand->id); ?>" <?php echo e(old('brand_id') == $brand->id ? 'selected' : ''); ?>>
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
                                Description (Optional)
                            </label>
                            <textarea class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                id="description" name="description" rows="4"
                                placeholder="Enter catalog description, notes, or version information..."><?php echo e(old('description')); ?></textarea>

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
                                Max 1000 characters. Use this field to add notes about the catalog content or version details.
                            </small>
                        </div>

                        <!-- Submit Buttons -->
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bx bx-upload"></i> Upload Catalog
                            </button>
                            <a href="<?php echo e(route('admin.catalogs.index')); ?>" class="btn btn-secondary">
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
                        <i class="bx bx-info-circle"></i> Upload Guidelines
                    </h6>

                    <div class="mb-3">
                        <h6 class="text-muted">File Formats</h6>
                        <ul class="list-unstyled small">
                            <li><i class="bx bx-check text-success"></i> PDF (.pdf)</li>
                            <li><i class="bx bx-check text-success"></i> Excel (.xlsx, .xls)</li>
                            <li><i class="bx bx-check text-success"></i> CSV (.csv)</li>
                        </ul>
                    </div>

                    <div class="mb-3">
                        <h6 class="text-muted">File Size</h6>
                        <p class="small mb-0">Maximum: <strong>10 MB</strong></p>
                    </div>

                    <div class="mb-3">
                        <h6 class="text-muted">Version Control</h6>
                        <p class="small mb-0">Each upload automatically increments the version number. Previous versions are kept for reference.</p>
                    </div>

                    <div class="alert alert-info small mb-0">
                        <strong>Tip:</strong> Use descriptive names and add notes in the description field to help track catalog updates.
                    </div>
                </div>
            </div>

            <!-- Recent Uploads -->
            <div class="card mt-3">
                <div class="card-body">
                    <h6 class="card-title mb-3">
                        <i class="bx bx-history"></i> Recent Uploads
                    </h6>

                    <?php
                        $recentCatalogs = App\Models\ProductCatalog::latest('created_at')->limit(5)->get();
                    ?>

                    <?php $__empty_1 = true; $__currentLoopData = $recentCatalogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="mb-2 pb-2 border-bottom">
                            <p class="small mb-1">
                                <strong>v<?php echo e($recent->version); ?></strong>
                            </p>
                            <small class="text-muted d-block"><?php echo e($recent->created_at->diffForHumans()); ?></small>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p class="small text-muted mb-0">No previous uploads</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function updateFileInfo(input) {
        if (input.files && input.files[0]) {
            const file = input.files[0];
            const fileInfo = document.getElementById('fileInfo');
            const fileName = document.getElementById('fileName');
            const fileSize = document.getElementById('fileSize');
            const fileType = document.getElementById('fileType');

            fileName.textContent = file.name;
            fileSize.textContent = formatBytes(file.size);
            fileType.textContent = file.type || 'Unknown';

            fileInfo.classList.remove('d-none');
        }
    }

    function formatBytes(bytes, decimals = 2) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const dm = decimals < 0 ? 0 : decimals;
        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\union\union_lubricants\union_lubricants\resources\views/admin/catalogs/create.blade.php ENDPATH**/ ?>