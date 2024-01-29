<?php $__env->startSection('content'); ?>

    <div class="d-sm-flex align-items-center justify-content-between mb-4 py-3">
        <h1 class="h3 mb-0 text-gray-800"><?php echo e(__('Dashboard')); ?></h1>
        <ol class="breadcrumb m-0 py-0">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
        </ol>
    </div>

    <?php if(Session::has('cache')): ?>
        <div class="alert alert-success validation">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h3 class="text-center"><?php echo e(Session::get("cache")); ?></h3>
        </div>
    <?php endif; ?>

  <div class="row mb-3">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1"><?php echo e(__('Active Customers')); ?></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo e(count($acustomers)); ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1"><?php echo e(__('Blocked Customers')); ?></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo e(count($bcustomers)); ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-danger"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1"><?php echo e(__('Total Properties')); ?></div>
                        <div class="h6 mb-0 mt-2 font-weight-bold text-gray-800"><?php echo e(count($properties)); ?> </div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-home fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1"><?php echo e(__('Invest Properties')); ?></div>
                        <div class="h6 mb-0 mt-2 font-weight-bold text-gray-800"><?php echo e(count($invest_properties)); ?> </div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-home fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1"><?php echo e(__('Total Plans')); ?></div>
                        <div class="h6 mb-0 mt-2 font-weight-bold text-gray-800"><?php echo e(count($plans)); ?> </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-fw fa-newspaper fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1"><?php echo e(__('Total Orders')); ?></div>
                        <div class="h6 mb-0 mt-2 font-weight-bold text-gray-800"><?php echo e(count($orders)); ?> </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1"><?php echo e(__('Total Order Amount')); ?></div>
                        <div class="h6 mb-0 mt-2 font-weight-bold text-gray-800"><?php echo e(showAdminAmount($orders->sum('amount'))); ?> </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1"><?php echo e(__('Total Invests')); ?></div>
                        <div class="h6 mb-0 mt-2 font-weight-bold text-gray-800"><?php echo e(count($invests)); ?> </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1"><?php echo e(__('Total Invest Amount')); ?></div>
                        <div class="h6 mb-0 mt-2 font-weight-bold text-gray-800"><?php echo e(showAdminAmount($invests->sum('amount'))); ?> </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1"><?php echo e(__('Total Deposits')); ?></div>
                        <div class="h6 mb-0 mt-2 font-weight-bold text-gray-800"><?php echo e(count($deposits)); ?> </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1"><?php echo e(__('Total Deposit Amount')); ?></div>
                        <div class="h6 mb-0 mt-2 font-weight-bold text-gray-800"><?php echo e(showAdminAmount($deposits->sum('amount'))); ?> </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1"><?php echo e(__('Total Withdraw Amount')); ?></div>
                        <div class="h6 mb-0 mt-2 font-weight-bold text-gray-800"><?php echo e(showAdminAmount($withdrawAmount)); ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1"><?php echo e(__('Total Withdraw Charge Amount')); ?></div>
                        <div class="h6 mb-0 mt-2 font-weight-bold text-gray-800"><?php echo e(showAdminAmount($withdrawChargeAmount)); ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1"><?php echo e(__('Total Referral Bonus')); ?></div>
                        <div class="h6 mb-0 mt-2 font-weight-bold text-gray-800"><?php echo e(showAdminAmount($bonus)); ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1"><?php echo e(__('Total Transactions')); ?></div>
                        <div class="h6 mb-0 mt-2 font-weight-bold text-gray-800"><?php echo e(count($transactions)); ?> </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1"><?php echo e(__('Total Tickets')); ?></div>
                        <div class="h6 mb-0 mt-2 font-weight-bold text-gray-800"><?php echo e(count($tickets)); ?> </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

  </div>
  <!--Row-->

  <div class="row mb-3">
    <div class="col-xl-12 col-lg-12 mb-4">
      <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary"><?php echo app('translator')->get('Recent Joined Users'); ?></h6>
        </div>
        <?php if(count($users)>0): ?>

          <div class="table-responsive table--mobile-lg">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th><?php echo app('translator')->get('Serial No'); ?></th>
                  <th><?php echo app('translator')->get('Name'); ?></th>
                  <th><?php echo app('translator')->get('Email'); ?></th>
                  <th><?php echo app('translator')->get('Status'); ?></th>
                  <th><?php echo app('translator')->get('Action'); ?></th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td data-label="<?php echo app('translator')->get('Serial No'); ?>"><?php echo e($loop->iteration); ?></td>
                    <td data-label="<?php echo app('translator')->get('Name'); ?>"><?php echo e($data->name); ?></td>
                    <td data-label="<?php echo app('translator')->get('Email'); ?>"><?php echo e($data->email); ?></td>
                    <td data-label="<?php echo app('translator')->get('Status'); ?>"><span class="badge badge-<?php echo e($data->is_banned == 0 ? 'success' : 'danger'); ?>"><?php echo e($data->is_banned == 0 ? 'activated' : 'deactivated'); ?></span></td>
                    <td data-label="<?php echo app('translator')->get('Action'); ?>"><a href="<?php echo e(route('admin-user-show',$data->id)); ?>" class="btn btn-sm btn-primary"><?php echo app('translator')->get('Detail'); ?></a></td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
          <div class="card-footer"></div>
          <?php else: ?>
            <p class="text-center"><?php echo app('translator')->get('NO USER FOUND'); ?></p>
        <?php endif; ?>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\property-genius\project\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>