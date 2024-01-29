<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="gray">
        <div class="container">
            <div class="row align-items-start justify-content-center">
                <div class="col-xl-5 col-lg-8 col-md-12">

                    <div class="signup-screen-wrap">
                        <div class="signup-screen-single">
                            <div class="text-center mb-4">
                                <h4 class="m-0 ft-medium"><?php echo app('translator')->get('Login Your Account'); ?></h4>
                            </div>

                            <form class="submit-form" id="loginform" action="<?php echo e(route('user.login.submit')); ?>" method="POST">
                                <?php if ($__env->exists('includes.user.form-both')) echo $__env->make('includes.user.form-both', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php echo csrf_field(); ?>
                                <div class="row gy-3">
                                    <div class="form-group">
                                        <label class="mb-1"><?php echo app('translator')->get('Your Email'); ?></label>
                                        <input type="email" name="email" class="form-control rounded" placeholder="<?php echo app('translator')->get('Email'); ?>*">
                                    </div>

                                    <div class="form-group">
                                        <label class="mb-1"><?php echo app('translator')->get('Password'); ?></label>
                                        <input type="password" name="password" class="form-control rounded" placeholder="<?php echo app('translator')->get('Password'); ?>*">
                                    </div>

                                    <div class="form-group">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="flex-1">
                                                <input id="dd" class="checkbox-custom" name="remember" type="checkbox">
                                                <label for="dd" class="checkbox-custom-label"><?php echo app('translator')->get('Remember Me'); ?></label>
                                            </div>
                                            <div class="eltio_k2">
                                                <a href="<?php echo e(route('user.forgot')); ?>" class="theme-cl"><?php echo app('translator')->get('Lost Your Password'); ?>?</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-md full-width theme-bg text-light rounded ft-medium">
                                            <?php echo app('translator')->get('Sign In'); ?> <div class="spinner-border formSpin" role="status"></div>
                                        </button>
                                    </div>

                                    <div class="form-group text-center mt-4 mb-0">
                                        <p class="mb-0">
                                            <?php echo app('translator')->get("You Don't have any account"); ?>?
                                            <a href="<?php echo e(route('user.register')); ?>" class="ft-medium text-success"><?php echo app('translator')->get('Sign Up'); ?></a>
                                        </p>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- ============================ Call To Action ================================== -->
        <?php if ($__env->exists('partials.front.cta')) echo $__env->make('partials.front.cta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- ============================ Call To Action End ================================== -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\property-genius\project\resources\views/user/login.blade.php ENDPATH**/ ?>