<?php $__env->startSection("title"); ?>
posts
<?php $__env->stopSection(); ?>

<?php $__env->startSection("content"); ?>
<div class="container">
    <div class="card text-left col-md-6 offset-md-3 my-1 shadow-lg p-3 mb-5 bg-white rounded">
      <div class="card-body">
        <h4 class="card-title text-info">Posts</h4>
        <div class="card-text">
            <div class="card border-info p-2">
                <h5 class="card-title text-info">Create Post</h5>
                <div class="card-body">
                    <form action="<?php echo e(route("post")); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <textarea name="post" id="" placeholder="Type Your post" class="form-control <?php $__errorArgs = ["post"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                border-danger
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e(old("post", "")); ?></textarea>
                        </div>
                        <?php $__errorArgs = ["post"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div>
                                <small class="text-danger">
                                    <?php echo e($message); ?>

                                </small>
                            </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <button type="submit" class="btn btn-info text-white">Submit</button>
                    </form>
                </div>
            </div>
            <?php if($posts->count()): ?>
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card my-1 shadow-lg p-3  bg-white rounded" >
                    <div class="card-body">
                      <div class="card-title d-flex justify-content-between">
                          <h5>
                              <?php echo e($post->user->username); ?>

                          </h5>
                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("delete",$post)): ?>
                          <form  action="<?php echo e(route('deletepost', [$post->id])); ?>" method="POST">
                              <?php echo csrf_field(); ?>
                              <?php echo method_field("DELETE"); ?>
                              <button type="submit" class="btn btn-danger">
                                 delete
                              </button>
                          </form>
                          <?php endif; ?>





                    </div>
                      <h6 class="card-subtitle mb-2 text-muted"><?php echo e($post->created_at->diffForHumans()); ?></h6>
                      <p class="card-text"><?php echo e($post->post); ?>.</p>
                      <div >
                            <span class="badge badge-info text-white"><?php echo e($post->like->count()); ?>

                            </span>
                            <?php if(!$post->likedBy(auth()->user()->id)): ?>
                            <form action="<?php echo e(route('like',[$post->id])); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <button type="submit" oncanplay="prevent"  class="btn btn-info text-white">like </button>
                            </form>

                            <?php endif; ?>
                      </div>

                        <?php if($post->likedBy(auth()->user()->id)): ?>
                        <form action="<?php echo e(route('unlike',[$post->id])); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field("DELETE"); ?>
                        <button type="submit" oncanplay="prevent"  class="btn btn-danger">Unlike </button>
                        </form>
                        <?php endif; ?>

                    </div>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

        </div>


        <?php echo e($posts->links('vendor.pagination.custom')); ?>











      </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layout.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\test_app\resources\views/posts/index.blade.php ENDPATH**/ ?>