
<div class="header  <?php echo e(request()->path() == '/' ? 'header-transparent change-logo' : 'header-light head-shadow'); ?>">
    <div class="container">
        <nav id="navigation" class="navigation navigation-landscape">
            <div class="nav-header">
                <?php if( request()->path() == '/'): ?>
                    <a class="nav-brand static-logo" href="<?php echo e(route('front.index')); ?>"><img src="<?php echo e(asset('assets/images/'.$gs->footer_logo)); ?>" class="logo" alt="" /></a>
                    <a class="nav-brand fixed-logo" href="<?php echo e(route('front.index')); ?>"><img src="<?php echo e(asset('assets/images/'.$gs->logo)); ?>" class="logo" alt="" /></a>
                <?php else: ?>
                    <a class="nav-brand" href="<?php echo e(route('front.index')); ?>">
                        <img src="<?php echo e(asset('assets/images/'.$gs->logo)); ?>" class="logo" alt="" />
                    </a>
                <?php endif; ?>
                <div class="nav-toggle"></div>
            </div>
            <div class="nav-menus-wrapper" style="transition-property: none;">
                <ul class="nav-menu">

                    <li class="<?php echo e(request()->routeIs('front.index') ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('/')); ?>"><?php echo app('translator')->get('Home'); ?></a>
                    </li>

                    <li class="<?php echo e(request()->routeIs('front.listing') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('front.listing')); ?>"><?php echo app('translator')->get('Listings'); ?></a>
                    </li>

                    <li class="<?php echo e(request()->routeIs('front.invests') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('front.invests')); ?>"><?php echo app('translator')->get('Invest Properties'); ?></a>
                    </li>

                    <li class="<?php echo e(request()->routeIs('front.agents') ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('front.agents')); ?>"><?php echo app('translator')->get('Agents'); ?></a>
                    </li>

                    <li><a href="<?php echo e(request()->routeIs('front.blog') || request()->routeIs('front.plans') ? 'active' : ''); ?>"><?php echo app('translator')->get('Pages'); ?><span class="submenu-indicator"></span></a>
                        <ul class="nav-dropdown nav-submenu">
                            <li><a href="<?php echo e(route('front.blog')); ?>"><?php echo app('translator')->get('Blogs'); ?></a></li>
                            <li><a href="<?php echo e(route('front.plans')); ?>"><?php echo app('translator')->get('Pricing'); ?></a></li>
                            <li><a href="<?php echo e(route('front.contact')); ?>"><?php echo app('translator')->get('Contact Us'); ?></a></li>
                            <li><a href="<?php echo e(route('front.become.agent')); ?>"><?php echo app('translator')->get('Become an agent'); ?></a></li>
                        </ul>
                    </li>

                </ul>

                <ul class="nav-menu nav-menu-social align-to-right">
                    <?php if(auth()->guard()->guest()): ?>
                        <li>
                            <a href="<?php echo e(route('user.login')); ?>">
                                <i class="fas fa-user-circle mr-1"></i><?php echo app('translator')->get('Signin'); ?></a>
                        </li>
                    <?php endif; ?>

                    <?php if(auth()->guard()->check()): ?>
                        <li><a href="JavaScript:Void(0);"><?php echo app('translator')->get('My Account'); ?><span class="submenu-indicator"></span></a>
                            <ul class="nav-dropdown nav-submenu">
                                <li><a href="<?php echo e(route('user.dashboard')); ?>"><?php echo app('translator')->get('User Dashboard'); ?></a></li>
                                <li><a href="<?php echo e(route('user.change.password.form')); ?>"><?php echo app('translator')->get('Change Password'); ?></a></li>
                                <li><a href="<?php echo e(route('user.logout')); ?>"><?php echo app('translator')->get('Sign Out'); ?></a></li>
                            </ul>
                        </li>
                    <?php endif; ?>

                        <li class="add-listing theme-bg">
                            <a href="<?php echo e(route('front.property.create')); ?>"><?php echo app('translator')->get('Add Property'); ?></a>
                        </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<?php /**PATH C:\laragon\www\property_genius\project\resources\views/partials/front/nav.blade.php ENDPATH**/ ?>