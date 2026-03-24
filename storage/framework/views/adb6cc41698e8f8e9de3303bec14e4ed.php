<!DOCTYPE html>
<html lang="en" class="layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-skin="default" data-assets-path="<?php echo e(asset('admin/assets/')); ?>" data-template="vertical-menu-template" data-bs-theme="light">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'Admin Dashboard'); ?></title>

    <!-- Favicon -->
    <link rel="icon" type="image/jpeg" href="<?php echo e(asset('logo.jpg')); ?>" />
    <link rel="apple-touch-icon" href="<?php echo e(asset('logo.jpg')); ?>" />
    <link rel="apple-touch-icon" href="<?php echo e(asset('apple-touch-icon.png')); ?>" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/fonts/iconify-icons.css')); ?>" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/css/core.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/css/demo.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/libs/select2/select2.css')); ?>" />

    <!-- Quill Rich Text Editor -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/libs/quill/katex.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/libs/quill/editor.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/vendor/libs/quill/typography.css')); ?>" />

    <!-- Helpers -->
    <script src="<?php echo e(asset('admin/assets/vendor/js/helpers.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/js/config.js')); ?>"></script>
    <style>
        .app-brand-text.demo {
            font-size: 1.1rem;
            letter-spacing: -0.5px;
        }

    </style>

    <?php echo $__env->yieldContent('page_css'); ?>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Sidebar Menu -->
            <aside id="layout-menu" class="layout-menu menu-vertical menu">
                <div class="app-brand demo">
                    <a href="/admin/dashboard" class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <img src="<?php echo e(asset('logo.jpg')); ?>" alt="Union Lubricants Logo" style="height: 40px; width: auto;">
                        </span>
                        <span class="app-brand-text demo menu-text fw-bold ms-2">Union Lubricants</span>
                    </a>
                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                        <i class="icon-base bx bx-chevron-left"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li class="menu-item <?php echo e(Request::routeIs('admin.dashboard') ? 'active' : ''); ?>">
                        <a href="/admin/dashboard" class="menu-link">
                            <i class="menu-icon icon-base bx bx-home-smile"></i>
                            <div>Dashboard</div>
                        </a>
                    </li>

                    <!-- eCommerce -->
                    <li class="menu-item <?php echo e(Request::routeIs('admin.products.*', 'admin.categories.*', 'admin.industries.*', 'admin.brands.*') ? 'active open' : ''); ?>">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon icon-base bx bx-cart-alt"></i>
                            <div>eCommerce</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item <?php echo e(Request::routeIs('admin.products.*') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('admin.products.index')); ?>" class="menu-link">
                                    <div>Products</div>
                                </a>
                            </li>
                            <li class="menu-item <?php echo e(Request::routeIs('admin.categories.*') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('admin.categories.index')); ?>" class="menu-link">
                                    <div>Categories</div>
                                </a>
                            </li>
                            <li class="menu-item <?php echo e(Request::routeIs('admin.industries.*') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('admin.industries.index')); ?>" class="menu-link">
                                    <div>Industries</div>
                                </a>
                            </li>
                            <li class="menu-item <?php echo e(Request::routeIs('admin.brands.*') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('admin.brands.index')); ?>" class="menu-link">
                                    <div>Brands</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Content -->
                    <li class="menu-item <?php echo e(Request::routeIs('admin.posts.*', 'admin.about.*', 'admin.certifications.*', 'admin.testimonials.*', 'admin.services.*') ? 'active open' : ''); ?>">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon icon-base bx bx-file-blank"></i>
                            <div>Content</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item <?php echo e(Request::routeIs('admin.posts.*') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('admin.posts.index')); ?>" class="menu-link">
                                    <div>Blog Posts</div>
                                </a>
                            </li>
                            <li class="menu-item <?php echo e(Request::routeIs('admin.about.*') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('admin.about.index')); ?>" class="menu-link">
                                    <div>About Us</div>
                                </a>
                            </li>
                            <li class="menu-item <?php echo e(Request::routeIs('admin.certifications.*') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('admin.certifications.index')); ?>" class="menu-link">
                                    <div>Certifications</div>
                                </a>
                            </li>
                            <li class="menu-item <?php echo e(Request::routeIs('admin.testimonials.*') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('admin.testimonials.index')); ?>" class="menu-link">
                                    <div>Testimonials</div>
                                </a>
                            </li>
                            <li class="menu-item <?php echo e(Request::routeIs('admin.services.*') ? 'active' : ''); ?>">
                                <a href="<?php echo e(route('admin.services.index')); ?>" class="menu-link">
                                    <div>Services</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Banners -->
                    <li class="menu-item <?php echo e(Request::routeIs('admin.banners.*') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('admin.banners.index')); ?>" class="menu-link">
                            <i class="menu-icon icon-base bx bx-image"></i>
                            <div>Banners</div>
                        </a>
                    </li>

                    <!-- Product Catalogs -->
                    <li class="menu-item <?php echo e(Request::routeIs('admin.catalogs.*') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('admin.catalogs.index')); ?>" class="menu-link">
                            <i class="menu-icon icon-base bx bx-collection"></i>
                            <div>Product Catalogs</div>
                        </a>
                    </li>

                    <!-- Management -->
                    <li class="menu-item <?php echo e(Request::routeIs('admin.enquiries.*') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('admin.enquiries.index')); ?>" class="menu-link">
                            <i class="menu-icon icon-base bx bx-mail-send"></i>
                            <div>Enquiries</div>
                        </a>
                    </li>

                    <!-- Settings -->
                    <li class="menu-item <?php echo e(Request::routeIs('admin.settings.*') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('admin.settings.index')); ?>" class="menu-link">
                            <i class="menu-icon icon-base bx bx-cog"></i>
                            <div>Settings</div>
                        </a>
                    </li>

                    <!-- Account -->
                    <li class="menu-item <?php echo e(Request::routeIs('admin.profile.*') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('admin.profile.edit')); ?>" class="menu-link">
                            <i class="menu-icon icon-base bx bx-user"></i>
                            <div>Profile</div>
                        </a>
                    </li>

                    <!-- Logout -->
                    <li class="menu-item">
                        <form action="<?php echo e(route('logout')); ?>" method="POST" id="logout-form" style="display: inline;">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="menu-link" style="background: none; border: none; width: 100%; text-align: left; cursor: pointer; padding: 0.5rem 1rem;">
                                <i class="menu-icon icon-base bx bx-log-out"></i>
                                <div>Logout</div>
                            </button>
                        </form>
                    </li>
                </ul>
            </aside>

            <!-- Layout page -->
            <div class="layout-page">
                <!-- Navbar -->
                <nav class="layout-navbar container-xxl navbar-detached navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
                            <i class="icon-base bx bx-menu icon-md"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center justify-content-end" id="navbar-collapse">
                        <!-- User -->
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                            <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);" data-bs-toggle="dropdown">
                                <div class="avatar avatar-online">
                                    <img src="<?php echo e(asset('admin/assets/img/avatars/1.png')); ?>" alt class="rounded-circle" />
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="<?php echo e(route('admin.profile.edit')); ?>">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar avatar-online">
                                                    <img src="<?php echo e(asset('admin/assets/img/avatars/1.png')); ?>" alt class="w-px-40 h-auto rounded-circle" />
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-0"><?php echo e(Auth::user()->name); ?></h6>
                                                <small class="text-body-secondary">Admin</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider my-1"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?php echo e(route('admin.profile.edit')); ?>">
                                        <i class="icon-base bx bx-user icon-md me-3"></i><span>My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?php echo e(route('admin.settings.index')); ?>">
                                        <i class="icon-base bx bx-cog icon-md me-3"></i><span>Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider my-1"></div>
                                </li>
                                <li>
                                    <form action="<?php echo e(route('logout')); ?>" method="POST" id="navbar-logout-form" style="display: inline;">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="dropdown-item" style="background: none; border: none; width: 100%; text-align: left; cursor: pointer; padding: 0.5rem 1rem;">
                                            <i class="icon-base bx bx-log-out icon-md me-3"></i><span>Log Out</span>
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </div>
                </nav>

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <h6 class="alert-heading">Error!</h6>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div><?php echo e($error); ?></div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <?php if(session('success')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php echo e(session('success')); ?>

                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <?php echo $__env->yieldContent('content'); ?>
                    </div>

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl">
                            <div class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                                <div class="mb-2 mb-md-0">
                                    © <script>document.write(new Date().getFullYear());</script> Union Lubricants. All Rights Reserved.
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
        <div class="drag-target"></div>
    </div>

    <!-- Core JS -->
    <script src="<?php echo e(asset('admin/assets/vendor/libs/jquery/jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/vendor/libs/popper/popper.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/vendor/js/bootstrap.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/vendor/js/menu.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/js/main.js')); ?>"></script>

    <!-- Quill Rich Text Editor -->
    <script src="<?php echo e(asset('admin/assets/vendor/libs/quill/quill.js')); ?>"></script>

    <?php echo $__env->yieldContent('page_js'); ?>
</body>
</html>

</html>
<?php /**PATH C:\laragon\www\union\union_lubricants\union_lubricants\resources\views/layouts/admin.blade.php ENDPATH**/ ?>