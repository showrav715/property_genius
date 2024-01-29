<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <!-- ============================ Page Title Start================================== -->
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h2 class="ipt-title"><?php echo app('translator')->get('All Agents'); ?></h2>
                    <span class="ipn-subtitle"><?php echo app('translator')->get('Lists of our all expert agents'); ?></span>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Page Title End ================================== -->


    <!-- ============================ Agent List Start ================================== -->
    <section>
        <div class="container">
            <!-- row Start -->
            <form action="<?php echo e(route('front.agents')); ?>" method="get">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <div class="input-with-icon">
                                <input type="text" class="form-control" name="agent" placeholder="<?php echo app('translator')->get('Search agents'); ?>">
                                <i class="ti-search"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <button type="submit" class="btn search-btn"><?php echo app('translator')->get('Find Agents'); ?></button>
                    </div>
                </div>
            </form>
            <!-- /row -->

            <div class="row">
                <?php if(count($agents)>0): ?>
                    <?php $__currentLoopData = $agents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <!-- Single Agent -->
						<div class="col-lg-4 col-md-6 col-sm-12">
							<div class="agents-grid">

								<div class="jb-bookmark"><a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Bookmark"><i class="ti-bookmark"></i></a></div>
								<div class="agent-call"><a href="#"><i class="lni-phone-handset"></i></a></div>
								<div class="agents-grid-wrap">

									<div class="fr-grid-thumb">
										<a href="<?php echo e(route('front.agent.details',$data->username)); ?>">
											<div class="overall-rate"><?php echo e(App\Models\PropertyReview::agentRatingCount($data->id)); ?></div>
											<img src="<?php echo e(asset('assets/images/'.$data->photo)); ?>" class="img-fluid mx-auto" alt="" />
										</a>
									</div>
									<div class="fr-grid-deatil">
										<h5 class="fr-can-name"><a href="<?php echo e(route('front.agent.details',$data->username)); ?>"><?php echo e($data->name); ?></a></h5>
										<span class="fr-position"><i class="lni-map-marker"></i><?php echo e($data->address); ?></span>

                                        <?php
                                            $review = App\Models\PropertyReview::agentRatings($data->id);
                                        ?>

                                        <?php if(isset($review) && $review>0): ?>
                                            <div class="fr-can-rating">
                                                <?php for($i = 1; $i <= $review; $i++): ?>
                                                    <i class="ti-star filled"></i>
                                                <?php endfor; ?>

                                                <?php if(is_float($review)): ?>
                                                    <i class="ti-star"></i>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
									</div>

								</div>

								<div class="fr-grid-info">
									<ul>
										<li><?php echo app('translator')->get('Property'); ?><span><?php echo e(count($data->properties)); ?></span></li>
										<li><?php echo app('translator')->get('Name'); ?><span><?php echo e($data->name); ?></span></li>
										<li><?php echo app('translator')->get('Phone'); ?><span><?php echo e($data->phone); ?></span></li>
									</ul>
								</div>

								<div class="fr-grid-footer">
									<a href="<?php echo e(route('front.agent.details',$data->username)); ?>" class="btn btn-outline-theme full-width"><?php echo app('translator')->get('View Profile'); ?><i class="ti-arrow-right ml-1"></i></a>
								</div>

							</div>
						</div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <p><?php echo app('translator')->get('No Agent Found!'); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- ============================ Agent List End ================================== -->

    <!-- ============================ Call To Action ================================== -->
    <?php if ($__env->exists('partials.front.cta')) echo $__env->make('partials.front.cta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<!-- ============================ Call To Action End ================================== -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\property-genius\project\resources\views/frontend/agents.blade.php ENDPATH**/ ?>