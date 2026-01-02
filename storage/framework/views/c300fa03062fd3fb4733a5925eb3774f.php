<?php $__env->startSection('title', __('messages.home_title')); ?>

<?php $__env->startSection('meta'); ?>
    <meta name="description" content="<?php echo e(__('messages.home_meta_description')); ?>">
    <meta name="keywords" content="<?php echo e(__('messages.home_meta_keywords')); ?>">
    <meta property="og:title" content="<?php echo e(__('messages.home_og_title')); ?>">
    <meta property="og:description" content="<?php echo e(__('messages.home_og_description')); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo e(url()->current()); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('components.slider', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('components.stats', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('components.advantages', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('components.services', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('components.partners', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('components.compliance', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>   
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\miros\atalian\resources\views/welcome.blade.php ENDPATH**/ ?>