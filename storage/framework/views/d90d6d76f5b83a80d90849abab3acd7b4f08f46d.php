<?php $__env->startComponent('mail::message'); ?>
# Introduction
<h3><?php echo e($liker->name); ?> has liked your post of</h3>

<div class="card">
    <div class="card-header">post</div>
    <div class="card-body">
        <?php echo e($post->post); ?>

    </div>
</div>


<?php $__env->startComponent('mail::button', ['url' => route("post")]); ?>
View Post
<?php if (isset($__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e)): ?>
<?php $component = $__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e; ?>
<?php unset($__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>

Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php if (isset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d)): ?>
<?php $component = $__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d; ?>
<?php unset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\xampp\htdocs\test_app\resources\views/=mails/posts/post_like.blade.php ENDPATH**/ ?>