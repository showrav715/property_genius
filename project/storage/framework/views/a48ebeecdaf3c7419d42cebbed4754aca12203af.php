<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(in_array('Banner', $home_modules)): ?>
        <!-- ============================ Hero Banner  Start================================== -->
        <div class="image-cover hero-banner" style="background:url(<?php echo e(asset('assets/images/'.$ps->hero_photo)); ?>) no-repeat;" data-overlay="6">
            <div class="container">

                <h1 class="big-header-capt mb-0"><?php echo e($ps->banner_title); ?></h1>
                <p class="text-center mb-5"><?php echo e($ps->banner_subtitle); ?></p>
                <!-- Type -->
                <form action="<?php echo e(route('front.listing')); ?>" method="get">
                    <div class="property-search-type">
                        <label class="active"><input name="type" type="radio" value="for_buy"><?php echo app('translator')->get('For Sale'); ?></label>
                        <label><input name="type" type="radio" value="for_rent"><?php echo app('translator')->get('For Rent'); ?></label>
                        <div class="property-search-type-arrow"></div>
                    </div>
                    <div class="full-search-2 eclip-search italian-search hero-search-radius">
                        <div class="hero-search-content">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-12 small-padd">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input type="text" class="form-control b-r" name="name" placeholder="<?php echo app('translator')->get('Neighborhood'); ?>">
                                            <i class="ti-search"></i>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-3 col-md-3 col-sm-12 small-padd">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <select id="ptypes" class="form-control" name="category_id">
                                                <option value="">&nbsp;</option>
                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($data->id); ?>"><?php echo e($data->title); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <i class="ti-briefcase"></i>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-3 col-md-3 col-sm-12 small-padd">
                                    <div class="form-group">
                                        <div class="input-with-icon b-l b-r">
                                            <select id="location" class="form-control" name="location_id">
                                                <option value="">&nbsp;</option>
                                                <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($data->id); ?>"><?php echo e($data->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <i class="ti-location-pin"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-1 col-md-1 col-sm-12 small-padd">

                                </div>

                                <div class="col-lg-2 col-md-2 col-sm-12 small-padd">
                                    <div class="form-group">
                                        <button type="submit" class="btn search-btn"><?php echo app('translator')->get('Search'); ?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- ============================ Hero Banner End ================================== -->
    <?php endif; ?>

    <?php if(in_array('Explore Property', $home_modules)): ?>
        <!-- ============================ Latest Property For Sale Start ================================== -->
            <section class="gray">
                <div class="container">

                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="sec-heading center mb-3">
                                <h2><?php echo e($ps->explore_ptitle); ?></h2>
                                <p><?php echo e($ps->explore_psub); ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="property-slide">
                                <?php $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <!-- Single Property -->
                                    <div class="single-items">
                                        <a href="<?php echo e(route('front.property.details',$data->slug)); ?>">
                                            <div class="property_item classical-list">
                                                <div class="image">
                                                    <img src="<?php echo e(asset('assets/images/'.$data->photo)); ?>" alt="latest property" class="img-fluid">
                                                    <div class="sb-date">
                                                        <span class="tag"><i class="ti-calendar"></i><?php echo e($data->created_at->diffForHumans()); ?></span>
                                                    </div>
                                                    <span class="tag_t"><?php echo e($data->type == 'for_rent' ? __('For Rent') : __('For Sale')); ?></span>
                                                </div>

                                                    <div class="proerty_content">
                                                        <div class="proerty_text">
                                                            <h3 class="captlize"><?php echo e($data->name); ?></h3>
                                                            <p class="proerty_price"><?php echo e(showAmount($data->price)); ?></p>
                                                        </div>
                                                        <p class="property_add"><?php echo e($data->real_address); ?></p>

                                                        <div class="property_meta">
                                                            <div class="list-fx-features">
                                                                <div class="listing-card-info-icon">
                                                                    <span class="inc-fleat inc-bed"><?php echo e($data->bed); ?> <?php echo app('translator')->get('Beds'); ?></span>
                                                                </div>
                                                                <div class="listing-card-info-icon">
                                                                    <span class="inc-fleat inc-type"><?php echo e($data->year_built); ?> <?php echo app('translator')->get('Built'); ?></span>
                                                                </div>
                                                                <div class="listing-card-info-icon">
                                                                    <span class="inc-fleat inc-area"><?php echo e($data->square); ?> <?php echo app('translator')->get('sqft'); ?></span>
                                                                </div>
                                                                <div class="listing-card-info-icon">
                                                                    <span class="inc-fleat inc-bath"><?php echo e($data->bathroom); ?> <?php echo app('translator')->get('Bath'); ?></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="property_links">
                                                            <button type="button" class="btn btn-theme-light"><?php echo app('translator')->get('Property Detail'); ?></button>
                                                        </div>
                                                    </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        <!-- ============================ Latest Property For Sale End ================================== -->
    <?php endif; ?>

    <?php if(in_array('Location', $home_modules)): ?>
        <!-- ============================ Property Location Start ================================== -->
        <section>
            <div class="container">

                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="sec-heading center">
                            <h2><?php echo e($ps->location_title); ?></h2>
                            <p><?php echo e($ps->location_subtitle); ?></p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <!-- Single Location Listing -->
                        <div class="col-lg-3 col-md-3 col-sm-6">
                            <div class="location-listing">
                                <div class="location-listing-thumb">
                                    <a href="<?php echo e(route('front.listing',['location_id'=>$data->id])); ?>"><img src="<?php echo e(asset('assets/images/'.$data->photo)); ?>" class="img-fluid" alt="" /></a>
                                </div>
                                <div class="location-listing-caption">
                                    <h4><a href="<?php echo e(route('front.listing',['location_id'=>$data->id])); ?>"><?php echo e($data->name); ?></a></h4>
                                    <span class="theme-cl"><?php echo e(count($data->properties)); ?> <?php echo app('translator')->get('Property'); ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
        </section>
        <!-- ============================ Property Location End ================================== -->
    <?php endif; ?>

    <?php if(in_array('Testimonials', $home_modules)): ?>
        <!-- ============================ Smart Testimonials ================================== -->
        <section class="image-cover pb-0" style="background:#122947 url(<?php echo e(asset('assets/front/img/pattern.png')); ?>) no-repeat;">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-lg-6 col-md-7">
                        <h2 class="text-light"><?php echo e($ps->review_title); ?></h2>

                        <div class="smart-textimonials smart-light" id="smart-textimonials">
                            <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <!-- Single Item -->
                                <div class="item">
                                    <div class="smart-tes-content">
                                        <p>
                                            <?php
                                                echo $data->details;
                                            ?>
                                        </p>
                                    </div>

                                    <div class="smart-tes-author">
                                        <div class="st-author-box">
                                            <div class="st-author-thumb">
                                                <img src="<?php echo e(asset('assets/images/'.$data->photo)); ?>" class="img-fluid" alt="" />
                                            </div>
                                            <div class="st-author-info">
                                                <h4 class="st-author-title"><?php echo e($data->title); ?></h4>
                                                <span class="st-author-subtitle"><?php echo e($data->subtitle); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    </div>

                    <div class="col-lg-6 col-md-5">
                        <img src="<?php echo e(asset('assets/images/'.$ps->review_photo)); ?>" class="img-fluid" alt="">
                    </div>

                </div>
            </div>
        </section>
        <!-- ============================ Smart Testimonials End ================================== -->
    <?php endif; ?>

    <?php if(in_array('Blogs', $home_modules)): ?>
        <!-- ================================= Blog Grid ================================== -->
        <section>
            <div class="container">

                <div class="row">
                    <div class="col text-center">
                        <div class="sec-heading center">
                            <h2><?php echo e($ps->blog_title); ?></h2>
                            <p>
                                <?php
                                    echo $ps->blog_subtitle;
                                ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <!-- Single blog Grid -->
                        <div class="col-lg-4 col-md-6">
                            <div class="blog-wrap-grid">

                                <div class="blog-thumb">
                                    <a href="<?php echo e(route('blog.details',$data->slug)); ?>">
                                        <img src="<?php echo e(asset('assets/images/'.$data->photo)); ?>" class="img-fluid" alt="" />
                                    </a>
                                </div>

                                <div class="blog-info">
                                    <span class="post-date"><i class="ti-calendar"></i><?php echo e($data->created_at->format('d M Y')); ?></span>
                                </div>

                                <div class="blog-body">
                                    <h4 class="bl-title"><a href="<?php echo e(route('blog.details',$data->slug)); ?>"><?php echo e($data->title); ?></a></h4>
                                    <p>
                                        <?php echo e(Str::limit(strip_tags($data->details),100)); ?>

                                    </p>
                                    <a href="<?php echo e(route('blog.details',$data->slug)); ?>" class="bl-continue"><?php echo app('translator')->get('Continue'); ?></a>
                                </div>

                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>

            </div>
        </section>
        <!-- ================= Blog Grid End ================= -->
    <?php endif; ?>

    <?php if(in_array('CTAs', $home_modules)): ?>
        <!-- ============================ Call To Action ================================== -->
        <?php if ($__env->exists('partials.front.cta')) echo $__env->make('partials.front.cta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- ============================ Call To Action End ================================== -->
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script>
        'use strict';
        let affiliate_visit = '<?php echo e(Session::get('affliate_visited')); ?>';
        let modal = document.getElementById('signup');
        let modalRoute = '<?php echo e(route('front.signup.session')); ?>';
        modal.addEventListener('hidden.bs.modal', function (event) {
            $.get(modalRoute,function(data){
                window.location.href = '<?php echo e(route('front.index')); ?>';
            });
        })

        if(affiliate_visit == 1){
             let modall = bootstrap.Modal.getOrCreateInstance(document.getElementById('signup'));
             modall.show();
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\property-genius\project\resources\views/frontend/index.blade.php ENDPATH**/ ?>