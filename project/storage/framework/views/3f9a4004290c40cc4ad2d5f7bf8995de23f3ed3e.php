

<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('title'); ?>
    <!-- ============================ Page Title Start================================== -->
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h2 class="ipt-title"><?php echo app('translator')->get('Welcome'); ?>!</h2>
                    <span class="ipn-subtitle"><?php echo app('translator')->get('Welcome To Your Account'); ?></span>

                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Page Title End ================================== -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <!-- ============================ User Dashboard ================================== -->
    <div class="dashboard-wraper mb-3">
        <div class="mb-3">
            <h4><?php echo app('translator')->get('Your Current Package'); ?>: <span class="pc-title theme-cl"><?php echo e(auth()->user()->plan != NULL ? auth()->user()->plan->title.'('.auth()->user()->plan_end_date->format('d-m-Y').')' : 'N/A'); ?></span></h4>
            <?php if(auth()->user()->plan == NULL): ?>
                <p class="text-danger"><?php echo app('translator')->get('To be an agent, you should under a subscription package.'); ?></p>
            <?php endif; ?>
        </div>

        <div class="row g-3">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="dashboard-stat mb-0 widget-1">
                    <div class="dashboard-stat-content"><h4><?php echo e(showNameAmount(auth()->user()->balance)); ?></h4> <span><?php echo app('translator')->get('Balance'); ?></span></div>
                    <div class="dashboard-stat-icon"><i class="ti-location-pin"></i></div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="dashboard-stat mb-0 widget-6">
                    <div class="dashboard-stat-content"><h4><?php echo e(showNameAmount(auth()->user()->interest_balance)); ?></h4> <span><?php echo app('translator')->get('Interest Balance'); ?></span></div>
                    <div class="dashboard-stat-icon"><i class="ti-location-pin"></i></div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="dashboard-stat mb-0 widget-5">
                    <div class="dashboard-stat-content"><h4><?php echo e(showNameAmount($total_payouts)); ?></h4> <span><?php echo app('translator')->get('Total Payouts'); ?></span></div>
                    <div class="dashboard-stat-icon"><i class="ti-pie-chart"></i></div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="dashboard-stat mb-0 widget-2">
                    <div class="dashboard-stat-content"><h4><?php echo e(showNameAmount($total_deposits)); ?></h4> <span><?php echo app('translator')->get('Total Deposit'); ?></span></div>
                    <div class="dashboard-stat-icon"><i class="ti-pie-chart"></i></div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="dashboard-stat mb-0 widget-3">
                    <div class="dashboard-stat-content"><h4><?php echo e(showNameAmount($total_invests)); ?></h4> <span><?php echo app('translator')->get('Total Invest'); ?></span></div>
                    <div class="dashboard-stat-icon"><i class="ti-user"></i></div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="dashboard-stat mb-0 widget-4">
                    <div class="dashboard-stat-content"><h4><?php echo e(showNameAmount($total_transactions)); ?></h4> <span><?php echo app('translator')->get('Total transactions'); ?></span></div>
                    <div class="dashboard-stat-icon"><i class="ti-location-pin"></i></div>
                </div>
            </div>
        </div>
    </div>

    <div class="dashboard-wraper">
        <div class="row">
            <div class="dashboard--content-item">
                <div class="row gy-4">
                    <div class="col-md-12">
                        <div class="dashboard--content-item">
                            <h5 class="dashboard-title"><?php echo app('translator')->get('Referral URL'); ?></h5>
                            <div class="dashboard-refer">
                                <div class="input-group input--group">
                                    <input type="text" class="form-control form--control" readonly
                                        value="<?php echo e(url('/').'?reff='.$user->affilate_code); ?>" id="cronjobURL">
                                    <button class="input-group-text px-3 btn--primary border-0" type="button" id="copyBoard" onclick="myFunction()">
                                        <i class="far fa-copy"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dashboard--content-item">
                <div class="table-responsive table--mobile-lg">
                    <table class="table bg--body">
                        <thead>
                            <tr>
                            <th><?php echo app('translator')->get('No'); ?></th>
                            <th><?php echo app('translator')->get('Type'); ?></th>
                            <th><?php echo app('translator')->get('Txnid'); ?></th>
                            <th><?php echo app('translator')->get('Amount'); ?></th>
                            <th><?php echo app('translator')->get('Date'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(count($transactions) == 0): ?>
                            <tr>
                            <td colspan="12">
                                <h4 class="text-center m-0 py-2"><?php echo e(__('No Data Found')); ?></h4>
                            </td>
                            </tr>
                        <?php else: ?>
                        <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td data-label="<?php echo app('translator')->get('No'); ?>">
                                    <div>

                                    <span class="text-muted"><?php echo e($loop->iteration); ?></span>
                                    </div>
                                </td>

                                <td data-label="<?php echo app('translator')->get('Type'); ?>">
                                    <div>
                                    <?php echo e(strtoupper($data->type)); ?>

                                    </div>
                                </td>

                                <td data-label="<?php echo app('translator')->get('Txnid'); ?>">
                                    <div>
                                    <?php echo e($data->txnid); ?>

                                    </div>
                                </td>

                                <td data-label="<?php echo app('translator')->get('Amount'); ?>">
                                    <div>
                                    <p class="text-<?php echo e($data->profit == 'plus' ? 'success' : 'danger'); ?>"><?php echo e(showNameAmount($data->amount)); ?></p>
                                    </div>
                                </td>

                                <td data-label="<?php echo app('translator')->get('Date'); ?>">
                                    <div>
                                    <?php echo e(date('d M Y',strtotime($data->created_at))); ?>

                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================ User Dashboard End ================================== -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script>
      'use strict';

      function myFunction() {
        var copyText = document.getElementById("cronjobURL");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        document.execCommand("copy");
        $.notify("Referral url copied", "info");
    }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\property_genius\project\resources\views/user/dashboard.blade.php ENDPATH**/ ?>