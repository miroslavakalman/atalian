

<?php $__env->startSection('title', __('industries.page_title')); ?>

<?php $__env->startSection('meta'); ?>
    <meta name="description" content="<?php echo e(__('industries.meta_description')); ?>">
    <meta name="keywords" content="<?php echo e(__('industries.meta_keywords')); ?>">
    <meta property="og:title" content="<?php echo e(__('industries.og_title')); ?>">
    <meta property="og:description" content="<?php echo e(__('industries.og_description')); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo e(url()->current()); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="slider">
 <div class="slides-container">
        <div class="slide-industries">
            <div class="txt">
                <h1><?php echo e(__('industries.header')); ?></h1>
                <p class="desc"><?php echo e(__('industries.subheader')); ?></p>
                <button
                    class="btn-primary"
                    onclick="window.open('https://cloud.mail.ru/public/doks/oxZ5kWAdx', '_blank')"
                >
                    <?php echo e(__('industries.presentation_btn')); ?> ↗
                </button>
            </div>
        </div>
</div>
</div>

<div class="industries-page">

    <?php $__currentLoopData = config('industries'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $industry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <?php
            $id = $industry['key']; 
        ?>

        <section id="<?php echo e($id); ?>" class="industry-block <?php echo e($i >= 3 ? 'hidden-mobile' : ''); ?> <?php echo e($i % 2 === 1 ? 'reverse' : ''); ?>">
            <div class="industry-image">
                <img src="<?php echo e(asset($industry['img'])); ?>" alt="<?php echo e(__('industries.' . $id . '.title')); ?>">
            </div>

            <div class="industry-text">
                <h2><?php echo e(__('industries.' . $id . '.title')); ?></h2>
                <p><?php echo e(__('industries.' . $id . '.desc')); ?></p>
            </div>
        </section>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <button id="showMore" class="btn-primary"><?php echo e(__('industries.showmore')); ?></button>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\miros\atalian\resources\views/industries.blade.php ENDPATH**/ ?>