<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!-- ============================ Page Title Start================================== -->
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <h2 class="ipt-title"><?php echo app('translator')->get('Our Articles'); ?></h2>
                    <span class="ipn-subtitle"><?php echo app('translator')->get('See Our Latest Articles & News'); ?></span>

                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Page Title End ================================== -->

    <!-- ============================ Agency List Start ================================== -->
    <section>
        <div class="container">
            <?php if(count($blogs) > 0): ?>
                <div class="row">
                    <div class="col text-center">
                        <div class="sec-heading center">
                            <h2><?php echo app('translator')->get('Latest News'); ?></h2>
                            <p><?php echo app('translator')->get("We post regulary most powerful articles for help and support."); ?></p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="row">
				<?php if(count($blogs) == 0): ?>
					<div class="col-12 text-center">
						<h3 class="m-0"><?php echo e(__('No Blog Found')); ?></h3>
					</div>
				<?php else: ?>
                    <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="blog-wrap-grid">
                                <div class="blog-thumb">
                                    <a href="<?php echo e(route('blog.details',$data->slug)); ?>"><img src="<?php echo e(asset('assets/images/'.$data->photo)); ?>" class="img-fluid" alt="" /></a>
                                </div>

                                <div class="blog-info">
                                    <span class="post-date"><i class="ti-calendar"></i><?php echo e($data->created_at->format(' d M Y')); ?></span>
                                </div>

                                <div class="blog-body">
                                    <h4 class="bl-title"><a href="<?php echo e(route('blog.details',$data->slug)); ?>"><?php echo e(Str::limit($data->title,30)); ?></a></h4>
                                    <p><?php echo e(Str::limit($data->details,100)); ?></p>
                                    <a href="<?php echo e(route('blog.details',$data->slug)); ?>" class="bl-continue"><?php echo app('translator')->get('Continue'); ?></a>
                                </div>

                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>
            </div>

            <!-- Pagination -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <?php if($blogs->hasPages()): ?>
                        <?php echo e($blogs->links()); ?>

                    <?php endif; ?>
                </div>
            </div>

        </div>

    </section>
    <!-- ============================ Agency List End ================================== -->

    <!-- ============================ Call To Action ================================== -->
    <?php if ($__env->exists('partials.front.cta')) echo $__env->make('partials.front.cta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- ============================ Call To Action End ================================== -->



<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\listing\project\resources\views/frontend/blog.blade.php ENDPATH**/ ?>