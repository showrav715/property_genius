<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('title'); ?>
    <!-- ============================ Page Title Start================================== -->
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <h2 class="ipt-title"><?php echo app('translator')->get('My Profile'); ?></h2>
                    <span class="ipn-subtitle"><?php echo app('translator')->get('Dashboard'); ?></span>

                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Page Title End ================================== -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- ============================ User Dashboard ================================== -->
        <div class="form-submit">
            <h4><?php echo app('translator')->get('My Account'); ?></h4>
            <?php if ($__env->exists('partials.flash')) echo $__env->make('partials.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <form action="<?php echo e(route('user.profile.update')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="submit-section">
                    <div class="row gy-3">
                        <div class="form-group col-md-12">
                            <div class="user--profile mb-5">
                                <div class="thumb">
                                    <img src="<?php echo e(auth()->user()->photo ? asset('assets/images/'.auth()->user()->photo) : asset('assets/images/1671448068p-4.jpg')); ?>" alt="clients">
                                </div>
                                <div class="remove-thumb">
                                    <i class="fas fa-times"></i>
                                </div>
                                <div class="content">
                                    <div>
                                        <h3 class="title">
                                            <?php echo e(auth()->user()->name); ?>

                                        </h3>
                                        <a href="#0" class="text--base">
                                            <?php echo e(auth()->user()->email); ?>

                                        </a>
                                    </div>
                                    <div class="mt-4">
                                        <label class="btn btn-sm btn-primary border-0">
                                            <?php echo app('translator')->get('Update Profile Picture'); ?>
                                            <input type="file" id="profile-image-upload" name="photo" hidden>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label><?php echo app('translator')->get('Your Name'); ?></label>
                            <input type="text" name="name" class="form-control" value="<?php echo e($user->name); ?>">
                        </div>

                        <div class="form-group col-md-6">
                            <label><?php echo app('translator')->get('Email'); ?></label>
                            <input type="email" class="form-control" value="<?php echo e($user->email); ?>" readonly>
                        </div>

                        <div class="form-group col-md-6">
                            <label><?php echo app('translator')->get('Fax'); ?></label>
                            <input type="text" class="form-control" name="fax" value="<?php echo e($user->fax); ?>">
                        </div>

                        <div class="form-group col-md-6">
                            <label><?php echo app('translator')->get('Country'); ?></label>
                            <select class="js-example-basic-single" name="country_id">
                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($country->id); ?>" <?php echo e($country->id == $user->country_id ? 'selected' : ''); ?>><?php echo e($country->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label><?php echo app('translator')->get('Phone'); ?></label>
                            <input type="text" class="form-control" name="phone" value="<?php echo e($user->phone); ?>">
                        </div>

                        <div class="form-group col-md-6">
                            <label><?php echo app('translator')->get('Address'); ?></label>
                            <input type="text" class="form-control" name="address" value="<?php echo e($user->address); ?>">
                        </div>

                        <div class="form-group col-md-6">
                            <label><?php echo app('translator')->get('City'); ?></label>
                            <input type="text" class="form-control" name="city" value="<?php echo e($user->city); ?>">
                        </div>

                        <div class="form-group col-md-6">
                            <label><?php echo app('translator')->get('Zip'); ?></label>
                            <input type="text" class="form-control" name="zip" value="<?php echo e($user->zip); ?>">
                        </div>

                        <div class="form-group col-md-6">
                            <label><?php echo app('translator')->get('Skype Name'); ?></label>
                            <input type="text" class="form-control" name="skype_name" value="<?php echo e($user->skype_name); ?>">
                        </div>


                        <div class="form-group col-md-12">
                            <label><?php echo app('translator')->get('About'); ?></label>
                            <textarea class="form-control" name="about">
                                <?php echo e($user->about); ?>

                            </textarea>
                        </div>

                        <div class="form-submit">
                            <h4><?php echo app('translator')->get('Social Accounts'); ?></h4>
                            <div class="submit-section">
                                <div class="row gy-3">

                                    <div class="form-group col-md-6">
                                        <label><?php echo app('translator')->get('Facebook'); ?></label>
                                        <input type="text" class="form-control" name="fb_link" value="<?php echo e($user->fb_link); ?>">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label><?php echo app('translator')->get('Twitter'); ?></label>
                                        <input type="text" class="form-control" name="twitter_link" value="<?php echo e($user->twitter_link); ?>">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label><?php echo app('translator')->get('Instagram'); ?></label>
                                        <input type="text" class="form-control" name="instagram_link" value="<?php echo e($user->instagram_link); ?>">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label><?php echo app('translator')->get('Linkedin'); ?></label>
                                        <input type="text" class="form-control" name="linkedin_link" value="<?php echo e($user->linkedin_link); ?>">
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <button class="btn btn-theme rounded" type="submit"><?php echo app('translator')->get('Submit'); ?></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    <!-- ============================ User Dashboard End ================================== -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<script>
  "use strict"
  var prevImg = $('.user--profile .thumb').html();
    function proPicURL(input) {
        if (input.files && input.files[0]) {
          var uploadedFile = new FileReader();
          uploadedFile.onload = function (e) {
              var preview = $('.user--profile').find('.thumb');
              preview.html(`<img src="${e.target.result}" alt="user">`);
              preview.addClass('image-loaded');
              preview.hide();
              preview.fadeIn(650);
              $(".image-view").hide();
              $(".remove-thumb").show();
          }
          uploadedFile.readAsDataURL(input.files[0]);
        }
    }

    $("#profile-image-upload").on('change', function () {
        proPicURL(this);
    });

    $(".remove-thumb").on('click', function () {
        $(".user--profile .thumb").html(prevImg);
        $(".user--profile .thumb").removeClass('image-loaded');
        $(".image-view").show();
        $(this).hide();
    })

    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\property-genius\project\resources\views/user/profile.blade.php ENDPATH**/ ?>