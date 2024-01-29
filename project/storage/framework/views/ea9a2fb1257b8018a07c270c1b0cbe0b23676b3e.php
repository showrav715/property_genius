
    <li class="<?php echo e(request()->routeIs('user.dashboard') ? 'active' : ''); ?>"><a href="<?php echo e(route('user.dashboard')); ?>"><i class="ti-layout-grid3-alt"></i><?php echo app('translator')->get('Dashboard'); ?></a></li>
    <li class="<?php echo e(request()->routeIs('user.transaction') ? 'active' : ''); ?>"><a href="<?php echo e(route('user.transaction')); ?>"><i class="ti-layout-cta-btn-left"></i><?php echo app('translator')->get('Transactions'); ?></a></li>
    <?php if(auth()->user()->is_agent == 2 ): ?>
        <li><a href="<?php echo e(route('agent.dashboard')); ?>"><i class="ti-dashboard"></i><?php echo app('translator')->get('Agent Dashboard'); ?></a></li>
        <li><a href="<?php echo e(route('front.agent.details',auth()->user()->username)); ?>"><i class="ti-layers"></i><?php echo app('translator')->get('Profile public view'); ?></a></li>
    <?php endif; ?>
    <li class="<?php echo e(request()->routeIs('user.property.bookmark') ? 'active' : ''); ?>"><a href="<?php echo e(route('user.property.bookmark')); ?>"><i class="ti-bookmark"></i><?php echo app('translator')->get('Bookmarked Listing'); ?></a></li>
    <li class="<?php echo e(request()->routeIs('user.buy.rent') ? 'active' : ''); ?>"><a href="<?php echo e(route('user.buy.rent')); ?>"><i class="ti-target"></i><?php echo app('translator')->get('Buy/Rent Properties'); ?></a></li>
    <li class="<?php echo e(request()->routeIs('user.all.invest.property') ? 'active' : ''); ?>"><a href="<?php echo e(route('user.all.invest.property')); ?>"><i class="ti-wheelchair"></i><?php echo app('translator')->get('Invest'); ?></a></li>
    <li class="<?php echo e(request()->routeIs('user.invest.history') ? 'active' : ''); ?>"><a href="<?php echo e(route('user.invest.history')); ?>"><i class="ti-time"></i><?php echo app('translator')->get('My Investment'); ?></a></li>
    <li class="<?php echo e(request()->routeIs('user.deposit.create') ? 'active' : ''); ?>"><a href="<?php echo e(route('user.deposit.create')); ?>"><i class="ti-arrow-up"></i><?php echo app('translator')->get('Deposit'); ?></a></li>
    <li class="<?php echo e(request()->routeIs('user.deposit.index') ? 'active' : ''); ?>"><a href="<?php echo e(route('user.deposit.index')); ?>"><i class="ti-loop"></i><?php echo app('translator')->get('Deposit history'); ?></a></li>
    <li class="<?php echo e(request()->routeIs('user.withdraw.index') ? 'active' : ''); ?>"><a href="<?php echo e(route('user.withdraw.index')); ?>"><i class="ti-arrow-down"></i><?php echo app('translator')->get('Payout'); ?></a></li>
    <li class="<?php echo e(request()->routeIs('user.withdraw.history') ? 'active' : ''); ?>"><a href="<?php echo e(route('user.withdraw.history')); ?>"><i class="ti-arrow-down"></i><?php echo app('translator')->get('Payout History'); ?></a></li>
    <li class="<?php echo e(request()->routeIs('user.package.index') ? 'active' : ''); ?>"><a href="<?php echo e(route('user.package.index')); ?>"><i class="ti-layers"></i><?php echo app('translator')->get('Pricing Plan'); ?></a></li>
    <?php if($ticket = DB::table('admin_user_conversations')->orderBy('id','desc')->first()): ?>
        <li class="<?php echo e(request()->routeIs('user.message.index') ? 'active' : ''); ?>"><a href="<?php echo e(route('user.message.index',['ticket' => $ticket->id])); ?>"><i class="ti-ticket"></i><?php echo app('translator')->get('Support'); ?></a></li>
    <?php else: ?>
        <li><a href="<?php echo e(route('user.message.index')); ?>"><i class="ti-ticket"></i><?php echo app('translator')->get('Support'); ?></a></li>
    <?php endif; ?>
    <li class="<?php echo e(request()->routeIs('user.referral.index') ? 'active' : ''); ?>"><a href="<?php echo e(route('user.referral.index')); ?>"><i class="ti-user"></i><?php echo app('translator')->get('Referred Users'); ?></a></li>
    <li class="<?php echo e(request()->routeIs('user.referral.commissions') ? 'active' : ''); ?>"><a href="<?php echo e(route('user.referral.commissions')); ?>"><i class="ti-user"></i><?php echo app('translator')->get('Referral Commissions'); ?></a></li>
    <li class="<?php echo e(request()->routeIs('user.profile.index') ? 'active' : ''); ?>"><a href="<?php echo e(route('user.profile.index')); ?>"><i class="ti-user"></i><?php echo app('translator')->get('My Profile'); ?></a></li>
    <li class="<?php echo e(request()->routeIs('user.change.password.form') ? 'active' : ''); ?>"><a href="<?php echo e(route('user.change.password.form')); ?>"><i class="ti-unlock"></i><?php echo app('translator')->get('Change Password'); ?></a></li>
    <li class="<?php echo e(request()->routeIs('user.logout') ? 'active' : ''); ?>"><a href="<?php echo e(route('user.logout')); ?>"><i class="ti-power-off"></i><?php echo app('translator')->get('Log Out'); ?></a></li>
<?php /**PATH C:\xampp\htdocs\property-genius\project\resources\views/partials/user/sidebar.blade.php ENDPATH**/ ?>