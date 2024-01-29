<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!-- ============================ Hero Banner  Start================================== -->
    <div class="featured-slick">
        <div class="featured-slick-slide">
            <?php if($data->galleries): ?>
                <?php $__currentLoopData = $data->galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div>
                        <a href="<?php echo e(asset('assets/images/'.$gallery->photo)); ?>" class="mfp-gallery">
                            <img src="<?php echo e(asset('assets/images/'.$gallery->photo)); ?>" class="img-fluid mx-auto" alt="" />
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>

    <section class="spd-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="slide-property-detail">
                        <div class="slide-property-first">
                            <div class="pr-price-into">
                                <h2>
                                    <?php echo e(showAmount($data->price)); ?>

                                    <i>/ <?php echo e($data->payment_duration); ?></i>
                                    <?php if($data->type == 'for_buy'): ?>
                                        <span class="prt-type rent"><?php echo app('translator')->get('For Buy'); ?></span>
                                    <?php else: ?>
                                        <span class="prt-type rent"><?php echo app('translator')->get('For Sell'); ?></span>
                                    <?php endif; ?>
                                </h2>
                                <span><i class="lni-map-marker"></i> <?php echo e($data->real_address); ?></span>
                            </div>
                        </div>

                        <div class="slide-property-sec">
                            <div class="pr-all-info">
                                <div class="pr-single-info">
                                    <a href="JavaScript:Void(0);" id="propertyPrint" data-bs-toggle="tooltip" data-original-title="Get Print"><i class="ti-printer"></i></a>
                                </div>

                                <div class="pr-single-info">
                                    <a href="JavaScript:Void(0);" id="wishList" class="<?php echo e($data->checkFavourite(auth()->id(),$data->id) ? 'like-bitt' : ''); ?> add-to-favorite" data-property="<?php echo e($data->id); ?>" data-user=<?php echo e(auth()->id()); ?> data-bs-toggle="tooltip" data-original-title="Add To Favorites"><i class="lni-heart-filled"></i></a>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Hero Banner End ================================== -->

    <!-- ============================ Property Detail Start ================================== -->
    <section class="gray">
        <div class="container">
            <div class="row">

                <!-- property main detail -->
                <div class="col-lg-8 col-md-12 col-sm-12">

                    <!-- Single Block Wrap -->
                    <div class="block-wrap">

                        <div class="block-header">
                            <h4 class="block-title"><?php echo app('translator')->get('Property Info'); ?></h4>
                        </div>

                        <div class="block-body">
                            <ul class="dw-proprty-info">
                                <li><strong><?php echo app('translator')->get('Bedrooms'); ?>:</strong><?php echo e($data->bed); ?> <?php echo app('translator')->get('Beds'); ?></li>
                                <li><strong><?php echo app('translator')->get('Bathrooms'); ?>:</strong><?php echo e($data->bathroom); ?> <?php echo app('translator')->get('Bath'); ?></li>
                                <li><strong><?php echo app('translator')->get('Square feet'); ?>:</strong><?php echo e($data->square); ?> <?php echo app('translator')->get('sq ft'); ?></li>
                                <li><strong><?php echo app('translator')->get('Areas'); ?>:</strong><?php echo e($data->area); ?> sq ft</li>
                                <li><strong><?php echo app('translator')->get('Garage'); ?></strong><?php echo e($data->garage == 0 ? 'N/A' : $data->garage); ?></li>
                                <li><strong><?php echo app('translator')->get('Built Year'); ?>:</strong><?php echo e($data->year_built); ?></li>
                                <li><strong><?php echo app('translator')->get('Remodel Year'); ?>:</strong><?php echo e($data->remodel_year); ?></li>
                                <li><strong><?php echo app('translator')->get('Pool Size'); ?>:</strong><?php echo e($data->pool_size == 0 ? 'N/A' : $data->pool_size.'sq ft'); ?></li>
                                <li><strong><?php echo app('translator')->get('Additional Rooms'); ?>:</strong><?php echo e($data->additional_room); ?></li>
                                <li><strong><?php echo app('translator')->get('Amenities'); ?>:</strong><?php echo e($data->amenities); ?></li>
                                <li><strong><?php echo app('translator')->get('Equipment'); ?>:</strong><?php echo e($data->equipment); ?></li>
                            </ul>
                        </div>

                    </div>

                    <!-- Single Block Wrap -->
                    <div class="block-wrap">

                        <div class="block-header">
                            <h4 class="block-title"><?php echo app('translator')->get('Description'); ?></h4>
                        </div>

                        <div class="block-body">
                            <p>
                                <?php
                                    echo $data->description;
                                ?>
                            </p>
                        </div>

                    </div>

                    <?php if($data->attributes): ?>
                        <?php $__currentLoopData = $attribute_name = json_decode($data->attributes,true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $attributes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <!-- Single Block Wrap -->
                            <div class="block-wrap">

                                <div class="block-header">
                                    <h4 class="block-title"><?php echo e($key); ?></h4>
                                </div>

                                <div class="block-body">
                                    <ul class="avl-features third">
                                        <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e(DB::table('attribute_options')->where('id',$id)->first()->name); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                    <?php if(count($data->floorplans)>0): ?>
                        <!-- Single Block Wrap -->
                        <div class="block-wrap">

                            <div class="block-header">
                                <h4 class="block-title"><?php echo app('translator')->get('Floor Plan'); ?></h4>
                            </div>

                            <div class="block-body">
                                <div class="accordion" id="floor-option">
                                    <?php $__currentLoopData = $data->floorplans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="card">
                                            <div class="card-header" id="firstFloor<?php echo e($key); ?>">
                                                <h2 class="mb-0">
                                                    <button type="button" class="btn btn-link" data-bs-toggle="collapse" data-bs-target="#firstfloor<?php echo e($key); ?>"><?php echo e($plan->name); ?><span><?php echo e($plan->size); ?></span></button>
                                                </h2>
                                            </div>
                                            <div id="firstfloor<?php echo e($key); ?>" class="collapse <?php echo e($key == 0 ? 'show': ''); ?>" aria-labelledby="firstFloor<?php echo e($key); ?>" data-parent="#floor-option">
                                                <div class="card-body">
                                                    <img src="<?php echo e(asset('assets/images/'.$plan->photo)); ?>" class="img-fluid" alt="" />
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>

                        </div>
                    <?php endif; ?>


                    <!-- Single Block Wrap -->
                    <div class="block-wrap">

                        <div class="block-header">
                            <h4 class="block-title"><?php echo app('translator')->get('Location'); ?></h4>
                        </div>

                        <div class="block-body">
                            <div class="map-container">
                                <div id="singleMap" class="mb-0" data-latitude="<?php echo e($data->latitude); ?>" data-longitude="<?php echo e($data->longitude); ?>" data-mapTitle="Our Location"></div>
                            </div>

                        </div>

                    </div>

                    <!-- Property Reviews -->
                    <div class="block-wrap">

                        <div class="block-header">
                            <h4 class="block-title"><?php echo e(count($reviews)); ?> <?php echo app('translator')->get('Reviews'); ?></h4>
                        </div>

                        <div class="block-body">
                            <div class="author-review">
                                <div class="comment-list">
                                    <ul>
                                        <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="article_comments_wrap">
                                                <article>
                                                    <div class="article_comments_thumb">
                                                        <img src="<?php echo e(asset('assets/images/'.$review->user->photo)); ?>" alt="">
                                                    </div>
                                                    <div class="comment-details">
                                                        <div class="comment-meta">
                                                            <div class="comment-left-meta">
                                                                <h4 class="author-name"><?php echo e($review->user->name); ?></h4>
                                                                <div class="comment-date"><?php echo e($review->created_at->format('d M Y')); ?></div>
                                                            </div>
                                                        </div>
                                                        <div class="comment-text">
                                                            <p><?php echo e($review->message); ?></p>
                                                        </div>
                                                    </div>
                                                </article>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>

                        </div>

                    </div>


                    <!-- Single Block Wrap -->
                    <div class="block-wrap">

                        <div class="block-header">
                            <h4 class="block-title"><?php echo app('translator')->get('Write A Review'); ?></h4>
                        </div>

                        <div class="block-body">
                            <form class="simple-form" action="<?php echo e(route('user.property.review')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="row gy-3">

                                    <input type="hidden" name="user_id" value="<?php echo e(auth()->id()); ?>">
                                    <input type="hidden" name="property_id" value="<?php echo e($data->id); ?>">
                                    <input type="hidden" id="reviewRate" name="rate" value="">

                                    <div class="form-group review-items review-icon sspd_review w-auto">
                                        <div class="item">
                                            <div class="fr-can-rating">
                                                <i class="fas fa-star rate_item" data-value="1"></i>
                                                <i class="fas fa-star rate_item" data-value="2"></i>
                                                <i class="fas fa-star rate_item" data-value="3"></i>
                                                <i class="fas fa-star rate_item" data-value="4"></i>
                                                <i class="fas fa-star rate_item" data-value="5"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="title" placeholder="<?php echo app('translator')->get('Subject Title'); ?>">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <textarea class="form-control ht-80" name="message" placeholder="<?php echo app('translator')->get('Messages'); ?>"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <button class="btn btn-theme" type="submit"><?php echo app('translator')->get('Submit Review'); ?></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>

                <!-- property Sidebar -->
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="like_share_wrap b-0">
                        <?php if($data->is_invest == 1): ?>

                            <div class="d-flex flex-row">
                                <div class="col-md-6">
                                    <?php echo app('translator')->get('Property Price'); ?>
                                </div>

                                <div class="col-md-6 prt-price-fix">
                                    <?php echo e(showAmount($data->price)); ?>

                                </div>
                            </div>


                            <div class="d-flex flex-row mt-3">
                                <div class="col-md-6">
                                    <?php echo app('translator')->get('Min invest amount'); ?>
                                </div>

                                <div class="col-md-6 prt-price-fix">
                                    <?php echo e(showAmount($data->min_invest)); ?>

                                </div>
                            </div>

                            <div class="d-flex flex-row mt-3">
                                <div class="col-md-6">
                                    <?php echo app('translator')->get('Max invest amount'); ?>
                                </div>

                                <div class="col-md-6 prt-price-fix">
                                    <?php echo e(showAmount($data->max_invest)); ?>

                                </div>
                            </div>

                            <div class="d-flex flex-row mt-3">
                                <div class="col-md-6">
                                    <?php echo app('translator')->get('Future value'); ?>
                                </div>

                                <div class="col-md-6 prt-price-fix">
                                    <?php echo e(showAmount($data->funding_amount)); ?>

                                </div>
                            </div>

                            <div class="d-flex flex-row mt-3">
                                <div class="col-md-6">
                                    <?php echo app('translator')->get('Total Invest amount'); ?>
                                </div>

                                <div class="col-md-6 prt-price-fix">
                                    <?php echo e(showAmount($data->invest_amount)); ?>

                                </div>
                            </div>

                            <div class="d-flex flex-row mt-3">
                                <div class="col-md-6">
                                    <?php echo app('translator')->get('Hold Years'); ?>
                                </div>

                                <div class="col-md-6 prt-price-fix">
                                    <?php echo e($data->hold_years); ?> <?php echo app('translator')->get(' Years'); ?>
                                </div>
                            </div>

                            <div class="d-flex flex-row mt-3">
                                <button type="button" class="btn btn-theme full-width" data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><?php echo app('translator')->get('Invest Now'); ?></button>
                            </div>
                        <?php else: ?>
                            <ul class="like_share_list d-flex justify-content-center">
                                <?php if($data->type == 'for_campaign'): ?>
                                    <li><a href="<?php echo e(route('user.crowdfunding.checkout',$data->slug)); ?>" class="btn btn-likes" data-toggle="tooltip" data-original-title="Share"><i class="ti-money"></i> <?php echo app('translator')->get('Invest'); ?></a></li>
                                <?php else: ?>
                                    <li><a href="<?php echo e(route('user.property.buy.rent',$data->slug)); ?>" class="btn btn-likes" data-toggle="tooltip" data-original-title="Share"><i class="fas fa-share"></i> <?php echo e($data->type == 'for_rent' ? __('Rent') : __('Buy')); ?></a></li>
                                <?php endif; ?>
                            </ul>
                        <?php endif; ?>
                    </div>

                    <div class="page-sidebar">

                        <!-- Agent Detail -->
                        <div class="agent-widget">
                            <div class="agent-title">
                                <?php if($data->admin): ?>
                                    <div class="agent-photo"><img src="<?php echo e(asset('assets/images/'.$data->admin->photo)); ?>" alt=""></div>
                                <?php else: ?>
                                    <?php if($data->user && $data->user->photo): ?>
                                        <div class="agent-photo"><img src="<?php echo e(asset('assets/images/'.$data->user->photo)); ?>" alt=""></div>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <div class="agent-details">
                                    <?php if($data->admin): ?>
                                        <h4><a href="#"><?php echo e($data->admin->name); ?></a></h4>
                                        <span><i class="lni-phone-handset"></i><?php echo e($data->admin->phone); ?></span>
                                    <?php else: ?>
                                        <?php if($data->user): ?>
                                            <h4><a href="#"><?php echo e($data->user->name); ?></a></h4>
                                            <span><i class="lni-phone-handset"></i><?php echo e($data->user->phone); ?></span>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <form action="<?php echo e(route('user.property.enquiry')); ?>" method="post">
                                <?php echo csrf_field(); ?>

                                <input type="hidden" name="property_id" value="<?php echo e($data->id); ?>">
                                <?php if($data->admin): ?>
                                    <input type="hidden" name="admin_id" value="<?php echo e($data->admin->id); ?>">
                                <?php else: ?>
                                    <input type="hidden" name="user_id" value="<?php echo e($data->user ? $data->user->id : ''); ?>">
                                <?php endif; ?>

                                <div class="row gy-3">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="<?php echo app('translator')->get('Your Email'); ?>">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="phone" placeholder="<?php echo app('translator')->get('Your Phone'); ?>">
                                    </div>

                                    <div class="form-group">
                                        <textarea class="form-control" name="details"><?php echo app('translator')->get("I'm interested in this property."); ?></textarea>
                                    </div>
                                    <button class="btn btn-theme full-width" type="submit"><?php echo app('translator')->get('Send Message'); ?></button>
                                </div>
                            </form>
                        </div>

                        <!-- Featured Property -->
                        <div class="sidebar-widgets">

                            <h4><?php echo app('translator')->get('Featured Property'); ?></h4>

                            <div class="sidebar_featured_property">
                                <?php $__currentLoopData = $featured_properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $fproperty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <!-- List Sibar Property -->
                                    <div class="sides_list_property">
                                        <div class="sides_list_property_thumb">
                                            <img src="<?php echo e(asset('assets/images/'.$fproperty->photo)); ?>" class="img-fluid" alt="">
                                        </div>
                                        <div class="sides_list_property_detail">
                                            <h4><a href="<?php echo e(route('front.property.details',$fproperty->slug)); ?>"><?php echo e($fproperty->name); ?></a></h4>
                                            <span>
                                                <i class="ti-location-pin"></i>
                                                <?php echo e(($fproperty->location != NULL) ? ($fproperty->location->parent_id != NULL ? $fproperty->location->name.', '.$fproperty->location->parent->name : $fproperty->location->name) : 'N/A'); ?>

                                            </span>
                                            <div class="lists_property_price">
                                                <div class="lists_property_types">
                                                    <div class="property_types_vlix sale"><?php echo e($fproperty->type == 'for_rent' ? __('For Rent') : __('For Sale')); ?></div>
                                                </div>
                                                <div class="lists_property_price_value">
                                                    <h4><?php echo e(showAmount($fproperty->price)); ?></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ============================ Property Detail End ================================== -->


    <!-- ============================ Invest Modal ================================== -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle"><?php echo app('translator')->get('Invest Now'); ?></h5>
                    <button type="button" class="close border-0" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="wrap-modal-slider">
                                <div class="your-class">
                                    <?php if($data->galleries): ?>
                                        <?php $__currentLoopData = $data->galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <a href="<?php echo e(asset('assets/images/'.$gallery->photo)); ?>" class="mfp-gallery"><img src="<?php echo e(asset('assets/images/'.$gallery->photo)); ?>" class="img-fluid mx-auto" alt="" /></a>
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <form action="<?php echo e(route('user.invest.property')); ?>" method="post">
                                <?php echo csrf_field(); ?>

                                <div class="form-group">
                                    <label><?php echo app('translator')->get('Amount'); ?></label>
                                    <input type="number" class="form-control" id="investAmount" name="amount" placeholder="<?php echo app('translator')->get('Enter amount'); ?>">
                                </div>
                                <input type="hidden" name="property_id" value="<?php echo e($data->id); ?>">
                                <input type="hidden" id="form_profit" name="return_amount" value="">

                                <p class="text-danger" id="profitFinalAmount"></p>

                                <button class="btn btn-theme full-width" id="investBtn"><?php echo app('translator')->get('Invest'); ?></button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Invest Modal End ================================== -->

    <!-- Video Modal -->
    <div class="modal fade" id="popup-video" tabindex="-1" role="dialog" aria-labelledby="popupvideo" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" id="popupvideo">
                <iframe class="embed-responsive-item" class="full-width" height="480" src="https://www.youtube.com/embed/qN3OueBm9F4?rel=0" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
    <!-- End Video Modal -->


    <!-- ============================ Call To Action ================================== -->
    <?php if ($__env->exists('partials.front.cta')) echo $__env->make('partials.front.cta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- ============================ Call To Action End ================================== -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<script src="http://maps.google.com/maps/api/js?key="></script>
<script src="<?php echo e(asset('assets/front/js/map_infobox.js')); ?>"></script>
<script src="<?php echo e(asset('assets/front/js/markerclusterer.js')); ?>"></script>
<script src="<?php echo e(asset('assets/front/js/map.js')); ?>"></script>

<script>
    'use strict';

    $(document).ready(function(){
        $('.your-class').slick();
    });

    $('.modal').on('shown.bs.modal', function (e) {
        $('.your-class').slick('setPosition');
        $('.wrap-modal-slider').addClass('open');
        $("#investAmount").val('');
        $("#profitFinalAmount").text('');
    })

    $(".rate_item").on('click',function(){
        let n = $(this).data('value');

        $(".rate_item").each(function(i){
            $(this).removeClass('filled');
        })

        $(".rate_item").each(function(i){
            if(i <= n-1){
                $(this).addClass('filled');
            }
        })
        $("#reviewRate").val(n);
    })

    $("#investAmount").on('input',function(){
        let amount = parseFloat($(this).val());
        let minAmount = '<?php echo e($data->min_invest); ?>';
        let maxAmount = '<?php echo e($data->max_invest); ?>';
        let property_price = '<?php echo e($data->price); ?>';
        let finalAmount = '<?php echo e($data->funding_amount); ?>';

        let ProfitAmount = parseFloat(finalAmount - property_price);
        let profitPercentage = parseFloat((ProfitAmount * 100)/property_price);
        let finalProfit = parseFloat((amount/100)*profitPercentage) + amount;

        if(amount>=minAmount && amount<=maxAmount){
            $("#profitFinalAmount").text(`You will get return ${finalProfit}`);
            $("#form_profit").val(finalProfit);
        }else{
            $("#profitFinalAmount").text('');
        }
    })

    $("#propertyPrint").on('click',function(){
        window.print();
    })

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click','#wishList',function(){
        let $this = $(this);
        let propertyId = $(this).data('property');
        let userId = $(this).data('user');
        if(userId == ''){
            window.location.href = mainurl+'/user/login'
        }

        $.ajax({
            method:"POST",
            url: mainurl+'/property/wishlist',
            data: {
                property_id : propertyId,
                user_id : userId
            },
            success:function(data)
            {
                if(data.success){
                    $this.prop('class','');
                    $this.prop('class','like-bitt add-to-favorite');
                    toastr.success(data.success);
                }else{
                    $this.prop('class','');
                    $this.prop('class','add-to-favorite');
                    toastr.error(data.error);
                }
            }

        });

    })
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\property-genius\project\resources\views/frontend/property_details.blade.php ENDPATH**/ ?>