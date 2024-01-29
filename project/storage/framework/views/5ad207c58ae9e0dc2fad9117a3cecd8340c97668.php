<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!-- ============================ Hero Banner  Start================================== -->
    <div class="search-header-banner">
        <div class="container">
            <div class="full-search-2 transparent">
                <div class="hero-search">
                    <h1><?php echo app('translator')->get('Search Your Dream'); ?></h1>
                </div>
                <div class="hero-search-content">
                    <form action="<?php echo e(route('front.invests')); ?>" method="get">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <div class="input-with-icon">
                                        <input type="text" class="form-control" name="name" placeholder="<?php echo app('translator')->get('Neighborhood'); ?>" value="<?php echo e(request()->name ? request()->name : ''); ?>">
                                        <i class="ti-search"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <div class="input-with-icon">
                                        <select id="cities"  name="location_id" class="form-control">
                                            <option value="">&nbsp;</option>
                                            <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($data->id); ?>" <?php echo e(request()->location_id == $data->id ? 'selected' : ''); ?>><?php echo e($data->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <i class="ti-briefcase"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-2 col-sm-6">
                                <div class="form-group">
                                    <div class="input-with-icon">
                                        <input type="number" name="min" class="form-control" placeholder="<?php echo app('translator')->get('Minimum'); ?>" value="<?php echo e(request()->min ? request()->min : ''); ?>">
                                        <i class="ti-money"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-2 col-sm-6">
                                <div class="form-group">
                                    <div class="input-with-icon">
                                        <input type="number" class="form-control" name="max" placeholder="<?php echo app('translator')->get('Maximum'); ?>" value="<?php echo e(request()->max ? request()->max : ''); ?>">
                                        <i class="ti-money"></i>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row my-3">
                            <div class="col-lg-4 col-md-4 col-sm-12">

                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <div class="form-group">
                                        <a href="<?php echo e(route('front.invests')); ?>" class="btn reset-btn-outline"><?php echo app('translator')->get('Search Reset'); ?></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <button type="submit" class="btn search-btn-outline"><?php echo app('translator')->get('Search Result'); ?></button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Hero Banner End ================================== -->

    <!-- ============================ All Property ================================== -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 list-layout">
                    <?php if(count($properties) === 0): ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <h3><?php echo app('translator')->get('NO DATA FOUND'); ?></h3>
                            </div>
                        </div>
                    <?php else: ?>

                        <div class="row">

                            <div class="col-lg-12 col-md-12">
                                <div class="filter-fl">
                                    <h4><?php echo app('translator')->get('Total Property Find is'); ?>: <span class="theme-cl"><?php echo e(count($properties)); ?></span></h4>
                                </div>
                            </div>

                            <?php $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <!-- Single Property Start -->
                                <div class="col-lg-12 col-md-12">
                                    <a href="<?php echo e(route('front.property.details',$data->slug)); ?>">
                                        <div class="property-listing property-1">

                                            <div class="listing-img-wrapper">
                                                <img src="<?php echo e(asset('assets/images/'.$data->photo)); ?>" class="img-fluid mx-auto" alt="" />
                                                <div class="listing-like-top">
                                                    <i class="ti-heart"></i>
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
                                                <span class="property-type">For Sale</span>
                                            </div>

                                            <div class="listing-content">

                                                <div class="listing-detail-wrapper">
                                                    <div class="listing-short-detail">
                                                        <h4 class="listing-name"><?php echo e($data->name); ?></h4>
                                                        <span class="listing-location"><i class="ti-location-pin"></i><?php echo e($data->real_address); ?></span>
                                                    </div>
                                                    <div class="list-author">
                                                        <a href="#"><img src="assets/img/add-user.png" class="img-fluid img-circle avater-30" alt=""></a>
                                                    </div>
                                                </div>

                                                <div class="listing-features-info">
                                                    <ul>
                                                        <li><strong><?php echo app('translator')->get('Bed'); ?>:</strong><?php echo e($data->bed); ?></li>
                                                        <li><strong><?php echo app('translator')->get('Bath'); ?>:</strong><?php echo e($data->bathroom); ?></li>
                                                        <li><strong><?php echo app('translator')->get('Sqft'); ?>:</strong><?php echo e($data->square); ?></li>
                                                    </ul>
                                                </div>

                                                <div class="listing-footer-wrapper">
                                                    <div class="listing-price">
                                                        <h4 class="list-pr"><?php echo e(showAmount($data->price)); ?></h4>
                                                    </div>
                                                    <div class="listing-detail-btn">
                                                        <a href="<?php echo e(route('front.property.details',$data->slug)); ?>" class="more-btn"><?php echo app('translator')->get('More Info'); ?></a>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </a>
                                </div>
                                <!-- Single Property End -->
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>

                        <!-- Pagination -->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <?php if($properties->hasPages()): ?>
                                    <?php echo e($properties->links()); ?>

                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>

            </div>
        </div>
    </section>
    <!-- ============================ All Property ================================== -->

    <!-- ============================ Call To Action ================================== -->
    <?php if ($__env->exists('partials.front.cta')) echo $__env->make('partials.front.cta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<!-- ============================ Call To Action End ================================== -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\listing\project\resources\views/frontend/invest_properties.blade.php ENDPATH**/ ?>