<div class="modal fade confirm-modal" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="statusModalTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(__("Update Status")); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <p class="text-center"><?php echo e(__("You are about to change the status.")); ?></p>
                <p class="text-center"><?php echo e(__("Do you want to proceed?")); ?></p>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__("Cancel")); ?></a>
                <a href="javascript:;" class="btn btn-success btn-ok"><?php echo e(__("Update")); ?></a>
            </div>
        </div>
	</div>
</div>
<?php /**PATH C:\xampp\htdocs\listing\project\resources\views/partials/admin/status.blade.php ENDPATH**/ ?>