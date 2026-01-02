

<?php $__env->startSection('title', 'Ошибка'); ?>

<?php $__env->startSection('content'); ?>
<div class="error-404">
        <h1><?php echo __('error.404_title'); ?></h1>
        <p class="desc"><?php echo __('error.404_desc'); ?></p>
        <button class="btn-white"><?php echo __('error.404_button'); ?></button>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['hideFooter' => true], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\miros\atalian\resources\views/errors/404.blade.php ENDPATH**/ ?>