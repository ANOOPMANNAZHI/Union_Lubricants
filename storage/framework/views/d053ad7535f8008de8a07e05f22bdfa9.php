<?php $__env->startSection('title', 'View Enquiry - Admin'); ?>

<?php $__env->startSection('content'); ?>
<div class="row mb-4">
    <div class="col-12 d-flex justify-content-between align-items-start">
        <div>
            <h4 class="py-3 mb-0"><span class="text-muted fw-light">Admin / Enquiries /</span> #<?php echo e($enquiry->id); ?></h4>
            <p class="text-muted small"><?php echo e($enquiry->created_at->format('M d, Y \a\t H:i')); ?></p>
        </div>
        <a href="<?php echo e(route('admin.enquiries.index')); ?>" class="btn btn-outline-primary">
            <i class="bx bx-arrow-back me-1"></i> Back to Enquiries
        </a>
    </div>
</div>

<div class="row g-4">
    <!-- Main Content -->
    <div class="col-lg-8">
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="mb-0"><?php echo e($enquiry->subject); ?></h5>
            </div>
            <div class="card-body">
                <div class="row g-4 mb-4 pb-4 border-bottom">
                    <div class="col-md-6">
                        <p class="text-muted small text-uppercase fw-semibold mb-1">Name</p>
                        <p class="fw-semibold"><?php echo e($enquiry->name); ?></p>
                    </div>
                    <div class="col-md-6">
                        <p class="text-muted small text-uppercase fw-semibold mb-1">Email</p>
                        <p class="fw-semibold"><?php echo e($enquiry->email); ?></p>
                    </div>
                    <div class="col-md-6">
                        <p class="text-muted small text-uppercase fw-semibold mb-1">Phone</p>
                        <p class="fw-semibold"><?php echo e($enquiry->phone ?? '—'); ?></p>
                    </div>
                    <div class="col-md-6">
                        <p class="text-muted small text-uppercase fw-semibold mb-1">Date</p>
                        <p class="fw-semibold"><?php echo e($enquiry->created_at->format('M d, Y H:i')); ?></p>
                    </div>
                </div>

                <?php if($enquiry->product): ?>
                <div class="mb-4 pb-4 border-bottom">
                    <p class="text-muted small mb-2">Related Product</p>
                    <a href="<?php echo e(route('admin.products.show', $enquiry->product->id)); ?>" class="text-decoration-none fw-semibold">
                        <?php echo e($enquiry->product->name); ?>

                    </a>
                </div>
                <?php endif; ?>

                <div>
                    <h6 class="fw-semibold mb-3">Message</h6>
                    <p class="text-body"><?php echo e(nl2br(e($enquiry->message))); ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="col-lg-4">
        <!-- Status Card -->
        <div class="card mb-3">
            <div class="card-header">
                <h6 class="mb-0">Status</h6>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('admin.enquiries.update-status', $enquiry->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>
                    <div class="mb-3">
                        <select name="status" class="form-select">
                            <option value="new" <?php echo e($enquiry->status === 'new' ? 'selected' : ''); ?>>New</option>
                            <option value="in_progress" <?php echo e($enquiry->status === 'in_progress' ? 'selected' : ''); ?>>In Progress</option>
                            <option value="resolved" <?php echo e($enquiry->status === 'resolved' ? 'selected' : ''); ?>>Resolved</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bx bx-check me-1"></i> Update Status
                    </button>
                </form>
            </div>
        </div>

        <!-- Actions Card -->
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Actions</h6>
            </div>
            <div class="card-body">
                <a href="mailto:<?php echo e($enquiry->email); ?>" class="btn btn-info w-100 mb-2">
                    <i class="bx bx-envelope me-1"></i> Send Email
                </a>
                <form action="<?php echo e(route('admin.enquiries.destroy', $enquiry->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Are you sure you want to delete this enquiry?')">
                        <i class="bx bx-trash me-1"></i> Delete Enquiry
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\union\union_lubricants\union_lubricants\resources\views/admin/enquiries/show.blade.php ENDPATH**/ ?>