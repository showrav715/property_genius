<footer class="dark-footer skin-dark-footer">
    <div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="footer-widget">
                        <img src="<?php echo e(asset('assets/images/'.$gs->footer_logo)); ?>" class="img-footer" alt="" />
                        <div class="footer-add">
                            <p>
                                <?php
                                    echo $ps->street;
                                ?>
                            </p>
                            <p><?php echo e($ps->phone); ?></p>
                            <p><?php echo e($ps->email); ?></p>
                        </div>

                    </div>
                </div>

                <div class="col-lg-3 col-md-4">
                    <div class="footer-widget">
                        <h4 class="widget-title"><?php echo app('translator')->get('Navigations'); ?></h4>
                        <ul class="footer-menu">
                            <?php $__currentLoopData = DB::table('pages')->whereStatus(1)->orderBy('id','desc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="<?php echo e(route('front.page',$data->slug)); ?>"><?php echo e($data->title); ?></a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h4 class="widget-title"><?php echo app('translator')->get('My Account'); ?></h4>
                        <ul class="footer-menu">
                            <li><a href="<?php echo e(route('front.become.agent')); ?>"><?php echo app('translator')->get('Become an agent'); ?></a></li>
                            <li><a href="<?php echo e(route('agent.login')); ?>"><?php echo app('translator')->get('agent login'); ?></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h4 class="widget-title"><?php echo app('translator')->get('Download Apps'); ?></h4>
                        <a href="<?php echo e($ps->google_play_link); ?>" class="other-store-link">
                            <div class="other-store-app">
                                <div class="os-app-icon">
                                    <i class="lni-playstore theme-cl"></i>
                                </div>
                                <div class="os-app-caps">
                                    <?php echo app('translator')->get('Google Play'); ?>
                                    <span><?php echo app('translator')->get('Get It Now'); ?></span>
                                </div>
                            </div>
                        </a>
                        <a href="<?php echo e($ps->app_store_link); ?>" class="other-store-link">
                            <div class="other-store-app">
                                <div class="os-app-icon">
                                    <i class="lni-apple theme-cl"></i>
                                </div>
                                <div class="os-app-caps">
                                    <?php echo app('translator')->get('App Store'); ?>
                                    <span><?php echo app('translator')->get('Now it Available'); ?></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6 col-md-6">
                    <p class="mb-0">
                        <?php
                            echo $gs->copyright;
                        ?>
                    </p>
                </div>

                <div class="col-lg-6 col-md-6 text-right">
                    <ul class="footer-bottom-social">
                        <?php if($sociallinks): ?>
                            <?php $__currentLoopData = $sociallinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="<?php echo e($social->link); ?>"><i class="<?php echo e($social->icon); ?>"></i></a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</footer>
<?php /**PATH C:\xampp\htdocs\listing\project\resources\views/partials/front/footer.blade.php ENDPATH**/ ?>