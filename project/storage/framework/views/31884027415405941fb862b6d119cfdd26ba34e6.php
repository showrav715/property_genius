<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
	<!-- Banner -->
	<section class="banner-section bg--gradient overflow-hidden position-relative border-bottom">
		<div class="hero-bg bg_img" data-img="<?php echo e(asset('assets/images/'.$gs->breadcumb_banner)); ?>"></div>
		<div class="container">
			<div class="hero-text">
				<h2 class="hero-text-title"><?php echo e($page->title); ?></h2>
				<ul class="breadcrumb">
					<li>
						<a href="<?php echo e(route('front.index')); ?>"><?php echo app('translator')->get('Home'); ?></a>
					</li>
					<li>
						<?php echo app('translator')->get('Pages'); ?>
					</li>
				</ul>
			</div>
		</div>
		</div>
	</section>
	<!-- Banner -->


	<!-- About -->
	<section class="about-section pt-100 pb-50">
		<div class="container">
			<div class="row gy-5">
				<div class="col-lg-12">
					<div class="about-content">
						<div class="section-title">
							<p>
								<?php
									echo $page->details;
								?>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- About -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\property-genius\project\resources\views/frontend/page.blade.php ENDPATH**/ ?>