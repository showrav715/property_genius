<?php $__env->startSection('content'); ?>
<div class="card">
  <div class="d-sm-flex align-items-center justify-content-between">
    <h5 class=" mb-0 text-gray-800 pl-3"><?php echo e(__('Edit Post')); ?> <a class="btn btn-primary btn-rounded btn-sm" href="<?php echo e(route('admin.blog.index')); ?>"><i class="fas fa-arrow-left"></i> <?php echo e(__('Back')); ?></a></h5>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
        <li class="breadcrumb-item"><a href="javascript:;"><?php echo e(__('Blog')); ?></a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.blog.index')); ?>"><?php echo e(__('Post')); ?></a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.blog.edit',$data->id)); ?>"><?php echo e(__('Edit Post')); ?></a></li>
    </ol>
  </div>
</div>

<div class="row justify-content-center mt-3">
  <div class="col-md-10">
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary"><?php echo e(__('Edit Post Form')); ?></h6>
      </div>

      <div class="card-body">
        <div class="gocover" style="background: url(<?php echo e(asset('assets/images/'.$gs->admin_loader)); ?>) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
        <form class="geniusform" action="<?php echo e(route('admin.blog.update',$data->id)); ?>" method="POST" enctype="multipart/form-data">

            <?php echo $__env->make('includes.admin.form-both', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo e(csrf_field()); ?>


            <div class="form-group">
                <label for="title"><?php echo e(__('Title')); ?></label>
                <input type="text" class="form-control" id="title" name="title"  placeholder="<?php echo e(__('Enter Title')); ?>" value="<?php echo e($data->title); ?>" required>
            </div>

            <div class="form-group">
                <label for="title"><?php echo e(__('SLUG')); ?></label>
                <input type="text" class="form-control" id="slug" name="slug"  placeholder="<?php echo e(__('Enter Slug')); ?>" value="<?php echo e($data->slug); ?>" required>
            </div>

            <div class="form-group">
                <label for="inp-name"><?php echo e(__('Category')); ?></label>
                <select class="form-control mb-3" name="category_id">
                    <option value="" selected><?php echo e(__('Select Category')); ?></option>
                    <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($cat->id); ?>" <?php echo e($data->category_id == $cat->id ? 'selected' : ''); ?>><?php echo e($cat->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="form-group">
                <label><?php echo e(__('Set Picture')); ?> </label>
                <div class="wrapper-image-preview">
                    <div class="box">
                        <div class="back-preview-image" style="background-image: url(<?php echo e($data->photo ? asset('assets/images/'.$data->photo) : asset('assets/images/placeholder.jpg')); ?>);"></div>
                        <div class="upload-options">
                            <label class="img-upload-label" for="img-upload"> <i class="fas fa-camera"></i> <?php echo e(__('Upload Picture')); ?> </label>
                            <input id="img-upload" type="file" class="image-upload" name="photo" accept="image/*">
                        </div>
                    </div>
                </div>
            </div>


            <div class="form-group">
              <label for="details"><?php echo e(__('Description')); ?></label>
              <textarea class="form-control summernote"  id="details" required name="details" rows="3" placeholder="<?php echo e(__('Description')); ?>"><?php echo e($data->details); ?></textarea>
            </div>

            <div class="form-group">
              <label for="tags"><?php echo e(__('Tags')); ?></label>
              <input type="text" class="form-control mytags" id="tags" name="tags" placeholder="<?php echo e(__('Tags')); ?>" value="<?php echo e($data->tags); ?>">
            </div>


            <div class="form-group">
              <label for="source"><?php echo e(__('Source')); ?></label>
              <input type="text" class="form-control" id="source" name="source"  placeholder="<?php echo e(__('Source')); ?>" value="<?php echo e($data->source); ?>" required>
            </div>

            <div class="form-group">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" name="secheck" class="custom-control-input" <?php echo e($data->meta_tag != null || $data->meta_description != null ? 'checked' : ''); ?> id="seo">
                <label class="custom-control-label" for="seo"> <?php echo e(__('Allow Blog SEO')); ?></label>
              </div>
            </div>

            <div class="showbox d-none">
                <div class="form-group">
                    <label for="meta_tag"><?php echo e(__('Meta Tags')); ?></label>
                    <input type="text" class="form-control mytags" id="meta_tag" name="meta_tag" placeholder="<?php echo e(__('Meta Tags')); ?>" value="<?php echo e($data->meta_tag); ?>">
                </div>

                <div class="form-group">
                    <label for="meta_description"><?php echo e(__('Meta Description')); ?></label>
                    <textarea class="form-control summernote"  id="meta_description" name="meta_description"  placeholder="<?php echo e(__('Meta Description')); ?>" rows="3"></textarea>
                </div>
            </div>

            <button type="submit" id="submit-btn" class="btn btn-primary w-100"><?php echo e(__('Submit')); ?></button>

        </form>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
  <script>
    'use strict';
    if($('#seo').is(':checked')){
      $('.showbox').removeClass('d-none');
    }
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\listing\project\resources\views/admin/blog/edit.blade.php ENDPATH**/ ?>