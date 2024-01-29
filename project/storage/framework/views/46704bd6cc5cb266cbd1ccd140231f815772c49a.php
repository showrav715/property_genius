

<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="d-sm-flex align-items-center justify-content-between py-3">
    <h5 class=" mb-0 text-gray-800 pl-3"><?php echo e(__('Edit Page')); ?> <a class="btn btn-primary btn-rounded btn-sm" href="<?php echo e(route('admin.page.index')); ?>"><i class="fas fa-arrow-left"></i> <?php echo e(__('Back')); ?></a></h5>
    <ol class="breadcrumb py-0 m-0">
        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
        <li class="breadcrumb-item"><a href="javascript:;"><?php echo e(__('Menu Page Settings')); ?></a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.page.index')); ?>"><?php echo e(__('Other Pages')); ?></a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.page.create',$data->id)); ?>"><?php echo e(__('Edit Page')); ?></a></li>
    </ol>
    </div>
</div>

<div class="row justify-content-center mt-3">
  <div class="col-md-10">
    <!-- Form Basic -->
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary"><?php echo e(__('Edit Page Form')); ?></h6>
      </div>

      <div class="card-body">
        <div class="gocover" style="background: url(<?php echo e(asset('assets/images/'.$gs->admin_loader)); ?>) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
        <form class="geniusform" action="<?php echo e(route('admin.page.update',$data->id)); ?>" method="POST" enctype="multipart/form-data">

            <?php echo $__env->make('includes.admin.form-both', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo e(csrf_field()); ?>



            <div class="form-group">
                <label for="title"><?php echo e(__('Title')); ?></label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo e($data->title); ?>"  placeholder="<?php echo e(__('Title')); ?>" value="" required>
            </div>

            <div class="form-group">
                <label for="inp-slug"><?php echo e(__('Slug')); ?></label>
                <input type="text" class="form-control" id="inp-slug" value="<?php echo e($data->slug); ?>" name="slug"  placeholder="<?php echo e(__('Enter Slug')); ?>" value="" required>
            </div>

            <div class="form-group">
              <label for="details"><?php echo e(__('Description')); ?></label>
              <textarea class="form-control "  id="details" name="details" required rows="3" placeholder="<?php echo e(__('Description')); ?>"><?php echo e($data->details); ?></textarea>
          </div>

          <div class="form-group">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="secheck" class="custom-control-input" <?php echo e($data->meta_tag != null || $data->meta_description != null ? 'checked' : ''); ?> id="seo">
              <label class="custom-control-label" for="seo"> <?php echo e(__('Allow Page SEO')); ?></label>
            </div>
          </div>

          <div class="showbox d-none">
            <div class="form-group">
              <label for="meta_tag"><?php echo e(__('Meta Tags')); ?></label>
              <input type="text" class="form-control" id="meta_tag" name="meta_tag" value="<?php echo e($data->meta_tag); ?>" placeholder="<?php echo e(__('Meta Tags')); ?>">
            </div>

            <div class="form-group">
              <label for="meta_description"><?php echo e(__('Meta Description')); ?></label>
              <textarea class="form-control"  id="meta_description" name="meta_description" rows="3"  placeholder="<?php echo e(__('Meta Description')); ?>"><?php echo e($data->meta_description); ?></textarea>
          </div>
          </div>

            <button type="submit" id="submit-btn" class="btn btn-primary w-100"><?php echo e(__('Submit')); ?></button>

        </form>
      </div>
    </div>

    <!-- Form Sizing -->

    <!-- Horizontal Form -->

  </div>

</div>
<!--Row-->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
  "use strict";
  
 $('#meta_tag').tagify();

 $(document).on('click','#seo',function(){
            if($(this).is(':checked')){
              $('.showbox').removeClass('d-none');
            }else{
              $('.showbox').addClass('d-none');
            }
  });


  $(document).ready(function(){
        if($('#seo').is(':checked')){
           $('.showbox').removeClass('d-none');
            }else{
                $('.showbox').addClass('d-none');
            }
    });


</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\property-genius\project\resources\views/admin/page/edit.blade.php ENDPATH**/ ?>