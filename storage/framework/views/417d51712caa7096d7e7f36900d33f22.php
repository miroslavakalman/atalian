

<?php $__env->startSection('meta'); ?>
    <meta name="description" content="<?php echo e(__('sust.meta_description')); ?>">
    <meta name="keywords" content="<?php echo e(__('sust.meta_keywords')); ?>">
    <meta property="og:title" content="<?php echo e(__('sust.og_title')); ?>">
    <meta property="og:description" content="<?php echo e(__('sust.og_description')); ?>">
    <meta property="og:image" content="<?php echo e(asset('img/sustainability/og-image.jpg')); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo e(url()->current()); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title', __('sust.page_title')); ?>

<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/pages/_sustainability.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->startSection('body-class', 'sust-page-active'); ?>

<div class="sust-page">

    <section class="sust-hero" aria-labelledby="sustainability-hero-title">
        <div class="sust-wide">
            <div class="container">

                <h1 class="sust-title" id="sustainability-hero-title">
                    <?php echo __('sust.hero_title'); ?>

                </h1>

                <div class="sust-img-grid" role="img" aria-label="<?php echo e(__('sust.hero_grid_alt')); ?>">
                    <img src="/img/sustainability/part-1.png" 
                         alt="<?php echo e(__('sust.img_part1_alt')); ?>" 
                         class="img-1"
                         loading="lazy">
                    <img src="/img/sustainability/part-2.png" 
                         alt="<?php echo e(__('sust.img_part2_alt')); ?>" 
                         class="img-2"
                         loading="lazy">
                    <img src="/img/sustainability/part-3.png" 
                         alt="<?php echo e(__('sust.img_part3_alt')); ?>" 
                         class="img-3"
                         loading="lazy">
                    <img src="/img/sustainability/part-4.png" 
                         alt="<?php echo e(__('sust.img_part4_alt')); ?>"
                         class="img-4"
                         loading="lazy">
                </div>

                <div class="sust-row">
                    <div class="sust-col" role="article" aria-labelledby="ecology-title">
                        <h3 id="ecology-title"><?php echo e(__('sust.ecology_title')); ?></h3>
                        <p><?php echo e(__('sust.ecology_text')); ?></p>
                    </div>

                    <div class="sust-col" role="article" aria-labelledby="employees-title">
                        <h3 id="employees-title"><?php echo e(__('sust.employees_title')); ?></h3>
                        <p><?php echo e(__('sust.employees_text')); ?></p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="sust-light" aria-label="<?php echo e(__('sust.section_light_aria')); ?>">
        <div class="container sust-two-col">

            <div class="sust-light-img">
                <img src="/img/sustainability/sust-big.png" 
                     alt="<?php echo e(__('sust.main_image_alt')); ?>"
                     loading="lazy">
            </div>

            <div class="sust-light-text" role="list">
                
                <div class="sust-item" role="listitem">
                    <span><?php echo e(__('sust.item_01_title')); ?></span>
                    <p><?php echo e(__('sust.item_01_text')); ?></p>
                </div>

                <div class="sust-item" role="listitem">
                    <span><?php echo e(__('sust.item_02_title')); ?></span>
                    <p><?php echo e(__('sust.item_02_text')); ?></p>
                </div>

                <div class="sust-item" role="listitem">
                    <span><?php echo e(__('sust.item_03_title')); ?></span>
                    <p><?php echo e(__('sust.item_03_text')); ?></p>
                </div>

                <div class="sust-item" role="listitem">
                    <span><?php echo e(__('sust.item_04_title')); ?></span>
                    <p><?php echo e(__('sust.item_04_text')); ?></p>
                </div>

                <div class="sust-item" role="listitem">
                    <span><?php echo e(__('sust.item_05_title')); ?></span>
                    <p><?php echo e(__('sust.item_05_text')); ?></p>
                </div>

            </div>
        </div>
    </section>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\miros\atalian\resources\views/sustainability.blade.php ENDPATH**/ ?>