<?php $__empty_1 = true; $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <!-- Single Property Start -->


        <div class="col-lg-12 col-md-12">
            <a  href="<?php echo e(route('front.property.details',$data->slug)); ?>">
                <div class="property-listing property-1">

                    <div class="listing-img-wrapper">

                        <img src="<?php echo e(asset('assets/images/'.$data->photo)); ?>" class="img-fluid mx-auto" alt="" />

                        <div class="listing-like-top wishList" data-property="<?php echo e($data->id); ?>" data-user=<?php echo e(auth()->id()); ?>>
                            <i class="ti-heart <?php echo e($data->checkFavourite(auth()->id(),$data->id) ? 'active' : ''); ?>"></i>
                        </div>

                        <?php if($data->reviews->count()>0): ?>
                            <div class="listing-rating">
                                <?php
                                    $review = $data->reviews->sum('rate')/$data->reviews->count();
                                ?>

                                <?php for($i = 1; $i <= $review; $i++): ?>
                                    <i class="ti-star filled"></i>
                                <?php endfor; ?>

                                <?php if(is_float($review)): ?>
                                    <i class="ti-star"></i>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <span class="property-type"><?php echo e($data->type == 'for_rent' ? __('For Rent') : __('For Sale')); ?></span>
                    </div>

                    <div class="listing-content">

                        <div class="listing-detail-wrapper">
                            <div class="listing-short-detail">
                                <h4 class="listing-name"><?php echo e($data->name); ?></h4>
                                <span class="listing-location"><i class="ti-location-pin"></i><?php echo e($data->real_address); ?></span>
                            </div>
                            <div class="list-author">
                                <img src="assets/img/add-user.png" class="img-fluid img-circle avater-30" alt="">
                            </div>
                        </div>

                        <div class="listing-features-info">
                            <ul>
                                <li><strong><?php echo app('translator')->get('Bed'); ?>:</strong><?php echo e($data->bed); ?></li>
                                <li><strong><?php echo app('translator')->get('Bath'); ?>:</strong><?php echo e($data->bathroom); ?></li>
                                <li><strong><?php echo app('translator')->get('Sqft'); ?>:</strong><?php echo e($data->square); ?></li>
                            </ul>
                        </div>

                        <div class="listing-footer-wrapper d-flex justify-content-between">
                            <div class="listing-price">
                                <h4 class="list-pr"><?php echo e(showAmount($data->price)); ?></h4>
                            </div>
                            <div class="listing-detail-btn">
                                <button type="button" class="more-btn"><?php echo app('translator')->get('More Info'); ?></button>
                            </div>
                        </div>

                    </div>

                </div>
            </a>
        </div>

    <!-- Single Property End -->
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <div class="col-lg-12 col-md-12">
        <h5 class="text-center">
            <?php echo app('translator')->get('No Product Found!'); ?>
        </h5>
    </div>
<?php endif; ?>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <?php if($properties->hasPages()): ?>
            <?php echo e($properties->links()); ?>

        <?php endif; ?>
    </div>
</div>
<?php /**PATH C:\laragon\www\property_genius\project\resources\views/partials/front/property.blade.php ENDPATH**/ ?>