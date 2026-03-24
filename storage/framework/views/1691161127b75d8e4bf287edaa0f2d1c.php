<?php $__env->startSection('title', 'Products - Admin'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="py-3 mb-0"><span class="text-muted fw-light">eCommerce /</span> Products</h4>
            <a href="<?php echo e(route('admin.products.create')); ?>" class="btn btn-primary">
                <i class="bx bx-plus me-2"></i> Add Product
            </a>
        </div>
    </div>
</div>

<!-- Filter Card -->
<div class="card mb-4">
    <div class="card-body">
        <form action="<?php echo e(route('admin.products.index')); ?>" method="GET" class="row g-3">
            <div class="col-md-3">
                <label class="form-label">Search</label>
                <input type="text" name="search" placeholder="Product name, code..." value="<?php echo e(request('search')); ?>" class="form-control">
            </div>
            <div class="col-md-3">
                <label class="form-label">Category</label>
                <select name="category" class="form-select">
                    <option value="">All Categories</option>
                    <?php if(isset($categories)): ?>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($cat->id); ?>" <?php echo e(request('category') == $cat->id ? 'selected' : ''); ?>><?php echo e($cat->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="">All Status</option>
                    <option value="active" <?php echo e(request('status') === 'active' ? 'selected' : ''); ?>>Active</option>
                    <option value="inactive" <?php echo e(request('status') === 'inactive' ? 'selected' : ''); ?>>Inactive</option>
                </select>
            </div>
            <div class="col-md-3 d-flex align-items-end gap-2">
                <button type="submit" class="btn btn-primary flex-grow-1">
                    <i class="bx bx-search me-1"></i> Filter
                </button>
            <?php if(request()->anyFilled(['search', 'category', 'status'])): ?>
                <a href="<?php echo e(route('admin.products.index')); ?>" class="btn btn-secondary">
                    <i class="bx bx-x me-1"></i> Clear
                </a>
            <?php endif; ?>
            </div>
        </form>
    </div>
</div>

<!-- Products Table -->
<?php if($products->count() > 0): ?>
<div class="card">
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>Product</th>
                    <th>Code</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Featured</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-sm me-3">
                                    <?php if($product->image_path): ?>
                                        <img src="<?php echo e(asset('storage/' . $product->image_path)); ?>" alt="<?php echo e($product->name); ?>" class="rounded-circle">
                                    <?php else: ?>
                                        <span class="avatar-initial rounded-circle bg-label-primary">
                                            <i class="icon-base bx bx-image"></i>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div>
                                    <p class="mb-0"><strong><?php echo e($product->name); ?></strong></p>
                                    <small class="text-muted"><?php echo e(Str::limit($product->short_description, 30)); ?></small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-label-info"><?php echo e($product->code); ?></span>
                        </td>
                        <td><?php echo e($product->category->name ?? 'N/A'); ?></td>
                        <td>
                            <?php if($product->is_active): ?>
                                <span class="badge bg-label-success">Active</span>
                            <?php else: ?>
                                <span class="badge bg-label-secondary">Inactive</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($product->is_featured): ?>
                                <i class="bx bxs-star text-warning"></i> Featured
                            <?php else: ?>
                                <span class="text-muted">—</span>
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($product->created_at->format('M d, Y')); ?></td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm btn-icon btn-text-secondary rounded-pill" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?php echo e(route('admin.products.show', $product->id)); ?>">
                                        <i class="bx bx-show me-1"></i> View
                                    </a>
                                    <a class="dropdown-item" href="<?php echo e(route('admin.products.edit', $product->id)); ?>">
                                        <i class="bx bx-edit-alt me-1"></i> Edit
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <form method="POST" action="<?php echo e(route('admin.products.destroy', $product->id)); ?>" style="display: inline;" onclick="return confirm('Delete this product?')">
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

<!-- Pagination -->
<div class="d-flex justify-content-center mt-4">
    <?php echo e($products->links()); ?>

</div>
<?php else: ?>
<div class="card">
    <div class="card-body text-center py-5">
        <h5>No products found</h5>
        <p class="text-muted">Get started by creating your first product.</p>
        <a href="<?php echo e(route('admin.products.create')); ?>" class="btn btn-primary">
            <i class="bx bx-plus me-1"></i> Create Product
        </a>
    </div>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\union\union_lubricants\union_lubricants\resources\views/admin/products/index.blade.php ENDPATH**/ ?>