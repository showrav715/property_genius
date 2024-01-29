<?php $__currentLoopData = $conv->messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($message->user_id != null): ?>
<div class="single-reply-area user">
<div class="row">
    <div class="col-lg-12">
        <div class="reply-area">
            <div class="left">
                <p><?php echo e($message->message); ?></p>
                <?php if($message->photo != NULL): ?>
                    <a href="<?php echo e(asset('assets/images/'.$message->photo)); ?>" download="" class=""><i class="fas fa-paperclip"></i> <?php echo app('translator')->get('attachment'); ?>-<?php echo e($key +=1); ?></a>
                <?php endif; ?>
            </div>
            <div class="right">
                <?php if($message->conversation->user): ?>
                <img class="img-circle" src="<?php echo e($message->conversation->user->photo != null ? asset('assets/images/'.$message->conversation->user->photo) : asset('assets/images/noimage.png')); ?>" alt="">
                <?php else: ?>

                <img class="img-circle" src="<?php echo e(Auth::guard('admin')->user()->photo != null ? asset('assets/images/'.Auth::guard('admin')->user()->photo) : asset('assets/images/noimage.png')); ?>" alt="">

                <?php endif; ?>
                <a class="d-block profile-btn" href="<?php echo e(route('admin-user-show',$message->conversation->user->id)); ?>" class="d-block">View Profile</a>
                <p class="ticket-date"><?php echo e($message->created_at->diffForHumans()); ?></p>
            </div>
        </div>
    </div>
</div>
</div>

<br>

<?php else: ?>

<div class="single-reply-area admin">
<div class="row">
    <div class="col-lg-12">
        <div class="reply-area">
            <div class="left">
                <img class="img-circle" src="<?php echo e(Auth::guard('admin')->user()->photo ? asset('assets/images/'.Auth::guard('admin')->user()->photo ):asset('assets/images/noimage.png')); ?>" alt="">
                <p class="ticket-date"><?php echo e($message->created_at->diffForHumans()); ?></p>
            </div>
            <div class="right">
                <p><?php echo e($message->message); ?></p>
                <?php if($message->photo != NULL): ?>
                    <a href="<?php echo e(asset('assets/images/'.$message->photo)); ?>" download="" class=""><i class="fas fa-paperclip"></i> <?php echo app('translator')->get('attachment'); ?>-<?php echo e($key +=1); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
</div>

<br>

<?php endif; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\property-genius\project\resources\views/load/message.blade.php ENDPATH**/ ?>