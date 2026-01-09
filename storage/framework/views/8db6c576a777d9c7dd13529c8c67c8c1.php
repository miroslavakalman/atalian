<div class="wrapper" id="wrapper-adv">
<div class="advantages">
    <h2 class="black"><?php echo e(__('messages.advantages_title')); ?></h2>
    <p class="secondary-p-black"><?php echo e(__('messages.advantages_desc')); ?></p>
    <div class="adv-row">
        <?php $__currentLoopData = __('messages.advantages'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $adv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="advantage">
                <img src="img/icons/ellipse-<?php echo e($loop->iteration); ?>.webp" alt="0<?php echo e($loop->iteration); ?>" class="ellipse">
                <h4><?php echo $adv['title']; ?></h4>
                <p class="small"><?php echo e($adv['desc']); ?></p>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
</div><?php /**PATH C:\Users\miros\atalian\resources\views/components/advantages.blade.php ENDPATH**/ ?>