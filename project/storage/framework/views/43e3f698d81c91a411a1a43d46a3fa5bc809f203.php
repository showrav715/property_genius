<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('title'); ?>
<!-- ============================ Page Title Start================================== -->
<div class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <h2 class="ipt-title"><?php echo app('translator')->get('Change Password'); ?></h2>
                <span class="ipn-subtitle"><?php echo app('translator')->get('Dashboard'); ?></span>

            </div>
        </div>
    </div>
</div>
<!-- ============================ Page Title End ================================== -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<form id="request-form" action="" method="POST" enctype="multipart/form-data">
    <?php if ($__env->exists('includes.flash')) echo $__env->make('includes.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo csrf_field(); ?>
    <div class="form-submit">
        <h4><?php echo app('translator')->get('Change Your Password'); ?></h4>
        <div class="submit-section">
            <div class="row">
                <div class="form-group col-lg-12 my-3 col-md-6">
                    <label class="form-label"><?php echo app('translator')->get('Old Password'); ?></label>
                    <input type="password" name="cpass" class="form-control">
                </div>

                <div class="form-group mb-3 col-md-6">
                    <label class="form-label"><?php echo app('translator')->get('New Password'); ?></label>
                    <input type="password" name="newpass" class="form-control">
                </div>

                <div class="form-group mb-3 col-md-6">
                    <label class="form-label"><?php echo app('translator')->get('Confirm Password'); ?></label>
                    <input type="password" name="renewpass" class="form-control">
                </div>

                <div class="form-group col-md-12">
                    <button class="btn btn-theme rounded" type="submit"><?php echo app('translator')->get('Submit'); ?></button>
                </div>

            </div>
        </div>
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\property-genius\project\resources\views/user/changepassword.blade.php ENDPATH**/ ?>