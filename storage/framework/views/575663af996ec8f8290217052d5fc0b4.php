<?php $__env->startSection('title', 'Contact Us - Union Lubricants'); ?>

<?php $__env->startSection('content'); ?>
<!-- PAGE TITLE BANNER -->
<div class="section banner-page about" style="background: url(<?php echo e(asset('frontend/images/bgoverlay.jpg')); ?>);background-attachment: fixed;background-size: cover;">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12">
				<div class="title-page">Contact Us</div>
				<ol class="breadcrumb">
					<li><a href="<?php echo e(route('home')); ?>">Home</a></li>
					<li class="active">Contact</li>
				</ol>
			</div>
		</div>
	</div>
</div>

<!-- CONTACT SECTION -->
<div class="section contact overlap">
	<div class="container">
		<div class="row">
			<!-- SIDEBAR -->
			<div class="col-sm-4 col-md-4 col-md-push-8">
				<!-- Embedded Map Widget -->
				<div class="widget map-widget" style="margin-bottom: 30px;">
					<div class="widget-title">
						Find Us On Map
					</div>
					<!-- Google Map Embed -->
					<div class="map-container" style="position: relative; overflow: hidden; padding-bottom: 56.25%; height: 0; border-radius: 5px;">
						<iframe
							src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3604.8943704652397!2d55.462999688855!3d25.374856400000006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f594a846696a1%3A0x2229eb0bdf816d57!2sIndustrial%20area%202!5e0!3m2!1sen!2sin!4v1765171154401!5m2!1sen!2sin"
							width="100%"
							height="100%"
							style="position: absolute; top: 0; left: 0; border: none;"
							allowfullscreen=""
							loading="lazy"
							referrerpolicy="no-referrer-when-downgrade">
						</iframe>
                        
					</div>
				</div>

				<!-- Contact Info Widget -->
				
			</div>

			<!-- MAIN CONTENT -->
			<div class="col-sm-8 col-md-8 col-md-pull-4">
				<div class="content">
					<h3 class="section-heading-2">Contact Details</h3>

					<?php if($errors->any()): ?>
					<div class="alert alert-danger" style="margin-bottom: 20px;">
						<ul style="margin-bottom: 0;">
							<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li><?php echo e($error); ?></li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</ul>
					</div>
					<?php endif; ?>

					<?php if(session('success')): ?>
					<div class="alert alert-success" style="margin-bottom: 20px;">
						<?php echo e(session('success')); ?>

					</div>
					<?php endif; ?>

					<form action="<?php echo e(route('contact.store')); ?>" method="POST" class="form-contact">
						<?php echo csrf_field(); ?>

						<div class="form-group">
							<input type="text" name="name" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
								placeholder="Full Name..." required value="<?php echo e(old('name')); ?>">
							<?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
							<span class="invalid-feedback d-block"><?php echo e($message); ?></span>
							<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
						</div>

						<div class="form-group">
							<input type="email" name="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
								placeholder="Email Address..." required value="<?php echo e(old('email')); ?>">
							<?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
							<span class="invalid-feedback d-block"><?php echo e($message); ?></span>
							<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
						</div>

						<div class="form-group">
							<input type="tel" name="phone" class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
								placeholder="Phone Number..." value="<?php echo e(old('phone')); ?>">
							<?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
							<span class="invalid-feedback d-block"><?php echo e($message); ?></span>
							<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
						</div>

						<div class="form-group">
							<input type="text" name="subject" class="form-control <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
								placeholder="Subject..." required value="<?php echo e(old('subject')); ?>">
							<?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
							<span class="invalid-feedback d-block"><?php echo e($message); ?></span>
							<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
						</div>

						<div class="form-group">
							<textarea name="message" class="form-control <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
								rows="6" placeholder="Write message..." required><?php echo e(old('message')); ?></textarea>
							<?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
							<span class="invalid-feedback d-block"><?php echo e($message); ?></span>
							<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-secondary">SEND MESSAGE</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\union\union_lubricants\union_lubricants\resources\views/frontend/contact.blade.php ENDPATH**/ ?>