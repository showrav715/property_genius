

<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!-- ============================ Page Title Start================================== -->
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h2 class="ipt-title"><?php echo app('translator')->get('Property List'); ?></h2>
                    <span class="ipn-subtitle"><?php echo app('translator')->get('All Properties'); ?></span>

                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Page Title End ================================== -->

    <!-- ============================ All Property ================================== -->
    <section>

        <div class="container">

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="filter_search_opt">
                        <a id="toogle-sm-sidebar-btn" href="javascript:void(0);"><?php echo app('translator')->get('Search Property'); ?><i
                                class="ml-2 ti-menu"></i></a>
                    </div>
                </div>
            </div>

            <div class="row">

                <!-- property Sidebar -->
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="simple-sidebar sm-sidebar" id="filter_search">

                        <div class="search-sidebar_header">
                            <h4 class="ssh_heading"><?php echo app('translator')->get('Close Filter'); ?></h4>

                            <button class="w3-bar-item w3-button w3-large"><i
                                    class="ti-close close-btn-listing"></i></button>
                        </div>

                        <!-- Find New Property -->
                        <div class="sidebar-widgets">

                            <h5 class="mb-3"><?php echo app('translator')->get('Find New Property'); ?></h5>

                            <form action="<?php echo e(route('front.listing')); ?>" method="get">
                                <div class="row gy-3">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input type="text" class="form-control b-r" name="name"
                                                placeholder="<?php echo app('translator')->get('Neighborhood'); ?>"
                                                value="<?php echo e(request()->name ? request()->name : ''); ?>">
                                            <i class="ti-search"></i>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <select id="ptypes" class="form-control" name="category_id">
                                                <option value="">&nbsp;</option>
                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($data->id); ?>"
                                                        <?php echo e(request()->category_id == $data->id ? 'selected' : ''); ?>>
                                                        <?php echo e($data->title); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <i class="ti-briefcase"></i>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <select id="location" class="form-control" name="location_id">
                                                <option value="">&nbsp;</option>
                                                <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($data->id); ?>"
                                                        <?php echo e(request()->location_id == $data->id ? 'selected' : ''); ?>>
                                                        <?php echo e($data->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <i class="ti-location-pin"></i>
                                        </div>
                                    </div>

                                    <div class="row gy-2">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="input-with-icon">
                                                    <input type="text" class="form-control" name="min"
                                                        value="<?php echo e(request()->min ? request()->min : ''); ?>"
                                                        placeholder="<?php echo app('translator')->get('Minimum'); ?>">
                                                    <i class="ti-money"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="input-with-icon">
                                                    <input type="text" class="form-control" name="max"
                                                        value="<?php echo e(request()->max ? request()->max : ''); ?>"
                                                        placeholder="<?php echo app('translator')->get('Maximum'); ?>">
                                                    <i class="ti-money"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input type="number" min="1" placeholder="<?php echo e(__('Enter Bed Number')); ?>"
                                                class="form-control" value="<?php echo e(request()->bed ? request()->bed : ''); ?>"
                                                name="bed" id="">
                                            <i class="fas fa-bed"></i>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input type="number" min="1"
                                                placeholder="<?php echo e(__('Enter Bath Number')); ?>" class="form-control"
                                                value="<?php echo e(request()->bathroom ? request()->bathroom : ''); ?>"
                                                name="bathroom" id="">
                                            <i class="fas fa-bath"></i>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-theme full-width mt-3"><?php echo app('translator')->get('Find New Home'); ?></button>
                            </form>

                        </div>
                    </div>
                    <!-- Sidebar End -->

                </div>

                <div class="col-lg-8 col-md-12 col-md-12 list-layout">
                    <div class="row">

                        <div class="col-lg-12 col-md-12">
                            <div class="filter-fl">
                                <h4><?php echo app('translator')->get('Total Property Find is'); ?>: <span class="theme-cl"><?php echo e(count($properties)); ?></span></h4>
                            </div>
                        </div>


                        <?php if ($__env->exists('partials.front.property')) echo $__env->make('partials.front.property', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>



                </div>

            </div>
        </div>
    </section>
    <!-- ============================ All Property ================================== -->

    <?php if ($__env->exists('partials.front.cta')) echo $__env->make('partials.front.cta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <form id="__search" class="d-none" action="<?php echo e(route('front.listing')); ?>" method="get">
        <input type="text" name="location"
            value="<?php echo e(request()->input('location') ? request()->input('location') : ''); ?>" id="location">
        <input type="text" name="type" id="type"
            value="<?php echo e(request()->input('type') ? request()->input('type') : ''); ?>">
        <input type="text" name="bed" id="bed"
            value="<?php echo e(request()->input('bed') ? request()->input('bed') : ''); ?>">
        <input type="text" name="range" id="range"
            value="<?php echo e(request()->input('range') ? request()->input('range') : ''); ?>">
        <input type="text" name="shorty" id="shorty_val"
            value="<?php echo e(request()->input('shorty') ? request()->input('shorty') : ''); ?>">
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('assets/front/js/map_infobox.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/front/js/markerclusterer.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/front/js/map.js')); ?>"></script>
    <script>
        'use strict';
        $(document).on('click', '.search__by__location', function() {
            var location = $(this).val();
            $('#location').val(location);
            doSubmit();
        })

        $(document).on('click', '.search__by__type', function() {
            var type = $(this).val();
            $('#type').val(type);
            doSubmit();
        })

        $(document).on('click', '.search__by__bed', function() {
            var bed = $(this).val();
            $('#bed').val(bed);
            doSubmit();
        })

        $(document).on('click', '.search__by__range', function() {
            var range = $(this).val();
            $('#range').val(range);
            doSubmit();
        })

        $(document).on('change', '#shorty', function() {
            var shorty = $(this).val();
            $('#shorty_val').val(shorty);
            doSubmit();
        })

        function doSubmit() {
            $('#__search').submit();
        }


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click', '.wishList', function() {
            let $this = $(this);
            let propertyId = $(this).data('property');
            let userId = $(this).data('user');
            if (userId == '') {
                window.location.href = mainurl + '/user/login'
            }

            $.ajax({
                method: "POST",
                url: mainurl + '/property/wishlist',
                data: {
                    property_id: propertyId,
                    user_id: userId
                },
                success: function(data) {
                    if (data.success) {
                        $this.children().prop('class', '');
                        $this.children().prop('class', 'ti-heart active');
                        toastr.success(data.success);
                    } else {
                        $this.children().prop('class', '');
                        $this.children().prop('class', 'ti-heart');
                        toastr.error(data.error);
                    }
                }

            });

        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\property_genius\project\resources\views/frontend/list.blade.php ENDPATH**/ ?>