

<?php $__env->startSection('title', __('cleaning.page_title')); ?>

<?php $__env->startSection('meta'); ?>
    <meta name="description" content="<?php echo e(__('cleaning.meta_description')); ?>">
    <meta name="keywords" content="<?php echo e(__('cleaning.meta_keywords')); ?>">
    <meta property="og:title" content="<?php echo e(__('cleaning.og_title')); ?>">
    <meta property="og:description" content="<?php echo e(__('cleaning.og_description')); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo e(url()->current()); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="slider">
    <div class="slides-container">
        <div class="slide-cleaning">
            <div class="txt">
                <h1><?php echo __('cleaning.hero_title'); ?></h1>
                <p class="desc"><?php echo __('cleaning.hero_desc'); ?></p>
            </div>
        </div>
    </div>
</div>
<div class="key-routes" id="career-wrapper">
    <h2 class="orange-h2"><?php echo e(__('cleaning.main')); ?></h2>
    <div class="cards-row">
         <?php $__currentLoopData = __('cleaning.cards'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="career-card">
                    <img src="<?php echo e($card['image']); ?>" alt="<?php echo e($card['title']); ?>">
                    <h3><?php echo e($card['title']); ?></h3>
                    <p><?php echo e($card['desc']); ?></p>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
    </div>
</div>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\miros\atalian\resources\views/services/cleaning.blade.php ENDPATH**/ ?>