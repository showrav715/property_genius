<?php $__env->startSection('content'); ?>

    <div class="card">
        <div class="d-sm-flex align-items-center justify-content-between py-3">
            <h5 class=" mb-0 text-gray-800 pl-3"><?php echo e(__('Transactions')); ?></h5>
            <ol class="breadcrumb m-0 py-0">
                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                <li class="breadcrumb-item"><a href="javascript:;"><?php echo e(__('Transactions')); ?></a></li>
            </ol>
        </div>
    </div>


    <div class="row mt-3">
        <div class="col-lg-12">
            <?php echo $__env->make('includes.admin.form-success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="card mb-4">
                <div class="table-responsive p-3">
                    <table id="geniustable" class="table table-hover dt-responsive" cellspacing="0" width="100%">
                        <thead class="thead-light">
                            <tr>
                                <th><?php echo e(__('Customer Email')); ?></th>
                                <th><?php echo e(__('Amount')); ?></th>
                                <th><?php echo e(__('Type')); ?></th>
                                <th><?php echo e(__('Txnid')); ?></th>
                                <th><?php echo e(__('Date')); ?></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>



<?php $__env->startSection('scripts'); ?>

<script type="text/javascript">
	"use strict";

    var table = $('#geniustable').DataTable({
           ordering: false,
           processing: true,
           serverSide: true,
           searching: true,
           ajax: '<?php echo e(route('admin.transactions.datatables')); ?>',
           columns: [
                { data: 'email', name: 'email' },
                { data: 'amount', name: 'amount' },
                { data: 'type', name: 'type' },
                { data: 'txnid', name: 'txnid' },
                { data: 'created_at', name: 'created_at' },
            ],
            language : {
                processing: '<img src="<?php echo e(asset('assets/images/'.$gs->admin_loader)); ?>">'
            }
        });

</script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\listing\project\resources\views/admin/transaction/index.blade.php ENDPATH**/ ?>