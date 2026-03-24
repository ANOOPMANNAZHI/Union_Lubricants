<?php $__env->startSection('title', 'Dashboard - Admin'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Sales Overview</h4>
    </div>
</div>

<!-- Statistics Cards -->
<div class="row">
    <div class="col-sm-6 col-lg-3 mb-4">
        <div class="card card-border-shadow-primary h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <div>
                        <span class="text-muted">Total Products</span>
                        <h3 class="card-title mb-0"><?php echo e($totalProducts ?? 0); ?></h3>
                        <small class="text-success fw-semibold">
                            <i class="bx bx-chevron-up"></i> Active Products
                        </small>
                    </div>
                    <div class="avatar">
                        <span class="avatar-initial rounded bg-label-primary">
                            <i class="icon-base bx bx-package icon-lg"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3 mb-4">
        <div class="card card-border-shadow-success h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <div>
                        <span class="text-muted">Total Categories</span>
                        <h3 class="card-title mb-0"><?php echo e($totalCategories ?? 0); ?></h3>
                        <small class="text-success fw-semibold">
                            <i class="bx bx-chevron-up"></i> Updated
                        </small>
                    </div>
                    <div class="avatar">
                        <span class="avatar-initial rounded bg-label-success">
                            <i class="icon-base bx bx-list-ul icon-lg"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3 mb-4">
        <div class="card card-border-shadow-warning h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <div>
                        <span class="text-muted">Blog Posts</span>
                        <h3 class="card-title mb-0"><?php echo e($totalPosts ?? 0); ?></h3>
                        <small class="text-success fw-semibold">
                            <i class="bx bx-chevron-up"></i> Published
                        </small>
                    </div>
                    <div class="avatar">
                        <span class="avatar-initial rounded bg-label-warning">
                            <i class="icon-base bx bx-book icon-lg"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3 mb-4">
        <div class="card card-border-shadow-info h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <div>
                        <span class="text-muted">Enquiries</span>
                        <h3 class="card-title mb-0"><?php echo e($totalEnquiries ?? 0); ?></h3>
                        <small class="text-danger fw-semibold">
                            <i class="bx bx-chevron-down"></i> Pending
                        </small>
                    </div>
                    <div class="avatar">
                        <span class="avatar-initial rounded bg-label-info">
                            <i class="icon-base bx bx-envelope icon-lg"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Enquiries Table -->
<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Recent Enquiries</h5>
                <a href="<?php echo e(route('admin.enquiries.index')); ?>" class="btn btn-sm btn-primary">View All</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $recentEnquiries ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enquiry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td>
                                    <strong><?php echo e($enquiry->name ?? 'N/A'); ?></strong>
                                </td>
                                <td><?php echo e($enquiry->email ?? 'N/A'); ?></td>
                                <td><?php echo e(Str::limit($enquiry->subject ?? 'N/A', 30)); ?></td>
                                <td>
                                    <span class="badge
                                        <?php if($enquiry->status === 'new'): ?> bg-label-info
                                        <?php elseif($enquiry->status === 'in_progress'): ?> bg-label-warning
                                        <?php else: ?> bg-label-success
                                        <?php endif; ?>">
                                        <?php echo e(ucfirst(str_replace('_', ' ', $enquiry->status ?? 'new'))); ?>

                                    </span>
                                </td>
                                <td><?php echo e($enquiry->created_at?->format('M d, Y') ?? 'N/A'); ?></td>
                                <td>
                                    <a href="<?php echo e(route('admin.enquiries.show', $enquiry->id ?? '#')); ?>" class="btn btn-sm btn-icon btn-text-primary">
                                        <i class="icon-base bx bx-show"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">No enquiries yet</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\union\union_lubricants\union_lubricants\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>