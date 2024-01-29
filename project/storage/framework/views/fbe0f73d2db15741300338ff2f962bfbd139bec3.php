<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!-- ============================ User Dashboard ================================== -->
    <section class="error-wrap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <div class="text-center">
                        <img src="<?php echo e(asset('assets/images/'.$gs->error_photo)); ?>" class="img-fluid" alt="">
                        <p>
                            <?php
                                echo $gs->error_text;
                            ?>
                        </p>
                        <a class="btn btn-theme" href="<?php echo e(route('front.index')); ?>"><?php echo app('translator')->get('Back To Home'); ?></a>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ============================ User Dashboard End ================================== -->

    <!-- ============================ Call To Action ================================== -->
    <?php if ($__env->exists('partials.front.cta')) echo $__env->make('partials.front.cta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- ============================ Call To Action End ================================== -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\listing\project\resources\views/errors/404.blade.php ENDPATH**/ ?>