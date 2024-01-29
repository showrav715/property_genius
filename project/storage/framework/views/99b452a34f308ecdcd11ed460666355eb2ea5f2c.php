<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Banner -->
    <section class="banner-section bg--gradient overflow-hidden position-relative border-bottom">
        <div class="hero-bg bg_img" data-img="<?php echo e(asset('assets/images/'.$gs->breadcumb_banner)); ?>"></div>
        <div class="container">
            <div class="hero-text">
                <h2 class="hero-text-title"><?php echo app('translator')->get('About US'); ?></h2>
                <ul class="breadcrumb">
                    <li>
                        <a href="<?php echo e(route('front.index')); ?>"><?php echo app('translator')->get('Home'); ?></a>
                    </li>
                    <li>
                        <?php echo app('translator')->get('About US'); ?>
                    </li>
                </ul>
            </div>
        </div>
        </div>
    </section>
    <!-- Banner -->


    <!-- About -->
    <section class="about-section overflow-hidden pt-100 pb-100 position-relative">
        <div class="container">
            <div class="row gy-4 gy-sm-5 flex-wrap-reverse align-items-center">
                <div class="col-lg-6">
                    <div class="about--img">
                        <img src="<?php echo e(asset('assets/images/'.$ps->about_photo)); ?>" alt="about">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about--content">
                        <div class="section-header mb-4">
                            <h6 class="section-header__subtitle"><?php echo app('translator')->get('Who We are'); ?></h6>
                            <h2 class="section-header__title"><?php echo e($ps->about_title); ?></h2>
                        </div>
                        <p class="about-txt m-0 mb-4">
                            <?php
                                echo $ps->about_text;
                            ?>
                        </p>
                        <a href="<?php echo e($ps->about_link); ?>" class="cmn--btn"><?php echo app('translator')->get('Read More'); ?> <span class="round-effect">
                                <i class="fas fa-long-arrow-alt-right"></i>
                            </span></a>
                    </div>
                    <div class="border-top mt-4">
                        <div class="counter-area">
                            <?php $__currentLoopData = $counters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="counter-item">
                                    <div class="counter-thumb">
                                        <img src="<?php echo e(asset('assets/images/'.$data->photo)); ?>" alt="about">
                                    </div>
                                    <div class="counter-content">
                                        <div class="counter-header">
                                            <h4 class="title odometer" data-odometer-final="<?php echo e($data->count); ?>">0</h4>
                                            <h4 class="title"><?php echo e($data->messurement); ?></h4>
                                        </div>
                                        <h6 class="text--base"><?php echo e($data->title); ?></h6>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About -->

    <!-- About Content -->
    <section class="about-content-section pt-100 pb-100 bg--section border-top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-9">
                    <div class="about-text-item">
                       <?php
                           echo $ps->about_details;
                       ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Content -->

    <!-- Choose -->
    <?php if ($__env->exists('partials.front.choose')) echo $__env->make('partials.front.choose', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Choose -->


<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\property-genius\project\resources\views/frontend/about.blade.php ENDPATH**/ ?>