<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="d-sm-flex align-items-center py-3 justify-content-between">
    <h5 class=" mb-0 text-gray-800 pl-3"><?php echo e(__('Other Pages')); ?></h5>
    <ol class="breadcrumb py-0 m-0">
        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
        <li class="breadcrumb-item"><a href="javascript:;"><?php echo e(__('Menu Page Settings')); ?></a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.page.index')); ?>"><?php echo e(__('Other Pages')); ?></a></li>
    </ol>
    </div>
</div>


<!-- Row -->
<div class="row mt-3">
  <!-- Datatables -->
  <div class="col-lg-12">

	<?php echo $__env->make('includes.admin.form-success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	<div class="card mb-4">
	  <div class="table-responsive p-3">
		<table id="geniustable" class="table table-hover dt-responsive" cellspacing="0" width="100%">
		  <thead class="thead-light">
			<tr>
			  <th><?php echo e(__('Name')); ?></th>
			  <th><?php echo e(__('Status')); ?></th>
			  <th><?php echo e(__('Options')); ?></th>
			</tr>
		  </thead>
		</table>
	  </div>
	</div>
  </div>
  <!-- DataTable with Hover -->

</div>
<!--Row-->

<?php if ($__env->exists('partials.admin.status')) echo $__env->make('partials.admin.status', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="modal fade confirm-modal" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(__("Confirm Delete")); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-center"><?php echo e(__("You are about to delete this Page. Every informtation under this page will be deleted.")); ?></p>
                <p class="text-center"><?php echo e(__("Do you want to proceed?")); ?></p>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__("Cancel")); ?></a>
                <a href="javascript:;" class="btn btn-danger btn-ok"><?php echo e(__("Delete")); ?></a>
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
               ajax: '<?php echo e(route('admin.page.datatables')); ?>',
               columns: [
                        { data: 'title', name: 'title' },
                        { data: 'status', name: 'status' },
            			{ data: 'action', searchable: false, orderable: false }

                     ],
               language: {
                	processing: '<img src="<?php echo e(asset('assets/images/'.$gs->admin_loader)); ?>">'
                },

            });

			$(function() {
            $(".btn-area").append('<div class="col-sm-12 col-md-4 text-right">'+
                '<a class="btn btn-primary" href="<?php echo e(route('admin.page.create')); ?>">'+
            '<i class="fas fa-plus"></i> Add New Page'+
            '</a>'+
            '</div>');
        });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\property-genius\project\resources\views/admin/page/index.blade.php ENDPATH**/ ?>