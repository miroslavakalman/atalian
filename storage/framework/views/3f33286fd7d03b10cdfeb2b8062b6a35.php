<div class="stats">
    <img src="/img/home/stats-img.webp" alt="<?php echo e(__('messages.stats_img_alt')); ?>" class="main-stat-img">
    <div class="column-txt">
        <p class="disclaimer"><?php echo e(__('messages.stats_label')); ?></p>
        <h2 class="main-stat-h2"><?php echo e(__('messages.stats_title')); ?></h2>
        <p class="secondary-p"><?php echo e(__('messages.stats_desc')); ?></p>
        <div class="stats-row">
            <?php $__currentLoopData = __('messages.stats'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="stat">
                    <h3 data-target="<?php echo e($stat['value']); ?>" data-suffix="<?php echo e($stat['suffix']); ?>">0</h3>
                    <p class="secondary-p"><?php echo e($stat['label']); ?></p>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\miros\atalian\resources\views/components/stats.blade.php ENDPATH**/ ?>