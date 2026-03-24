<?php $__env->startSection('title', 'Enquiries - Admin'); ?>

<?php $__env->startSection('content'); ?>
<div class="row mb-4">
    <div class="col-12">
        <h4 class="py-3 mb-0"><span class="text-muted fw-light">Admin /</span> Enquiries</h4>
        <p class="text-muted small">View and manage customer enquiries</p>
    </div>
</div>

<!-- Filter Section -->
<div class="card mb-3">
    <div class="card-body">
        <form method="GET" action="<?php echo e(route('admin.enquiries.index')); ?>" class="row g-3">
            <div class="col-md-4">
                <label class="form-label">Filter by Status</label>
                <select name="status" class="form-select">
                    <option value="">All Statuses</option>
                    <option value="new" <?php echo e(request('status') === 'new' ? 'selected' : ''); ?>>New</option>
                    <option value="in_progress" <?php echo e(request('status') === 'in_progress' ? 'selected' : ''); ?>>In Progress</option>
                    <option value="resolved" <?php echo e(request('status') === 'resolved' ? 'selected' : ''); ?>>Resolved</option>
                </select>
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="bx bx-filter me-1"></i> Filter
                </button>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th class="text-center">Status</th>
                    <th>Date</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $enquiries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enquiry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td>
                        <strong><?php echo e($enquiry->name); ?></strong>
                    </td>
                    <td>
                        <a href="mailto:<?php echo e($enquiry->email); ?>" class="text-decoration-none"><?php echo e($enquiry->email); ?></a>
                    </td>
                    <td>
                        <small class="text-muted"><?php echo e(Str::limit($enquiry->subject, 40)); ?></small>
                    </td>
                    <td class="text-center">
                        <?php if($enquiry->status === 'new'): ?>
                            <span class="badge bg-label-info">New</span>
                        <?php elseif($enquiry->status === 'in_progress'): ?>
                            <span class="badge bg-label-warning">In Progress</span>
                        <?php else: ?>
                            <span class="badge bg-label-success">Resolved</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <small class="text-muted"><?php echo e($enquiry->created_at->format('M d, Y')); ?></small>
                    </td>
                    <td class="text-end">
                        <a href="<?php echo e(route('admin.enquiries.show', $enquiry->id)); ?>" class="btn btn-sm btn-outline-primary me-2">
                            <i class="bx bx-show"></i> View
                        </a>
                        <form action="<?php echo e(route('admin.enquiries.destroy', $enquiry->id)); ?>" method="POST" class="d-inline"
                            onsubmit="return confirm('Are you sure you want to delete this enquiry?');">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                <i class="bx bx-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="6" class="text-center py-5">
                        <p class="text-muted mb-3">No enquiries found</p>
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php if($enquiries->hasPages()): ?>
<div class="mt-3">
    <?php echo e($enquiries->links()); ?>

</div>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\union\union_lubricants\union_lubricants\resources\views/admin/enquiries/index.blade.php ENDPATH**/ ?>