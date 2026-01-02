

<?php $__env->startSection('title', __('ethics.page_title')); ?>

<?php $__env->startSection('meta'); ?>
    <meta name="description" content="<?php echo e(__('ethics.meta_description')); ?>">
    <meta name="keywords" content="<?php echo e(__('ethics.meta_keywords')); ?>">
    <meta property="og:title" content="<?php echo e(__('ethics.og_title')); ?>">
    <meta property="og:description" content="<?php echo e(__('ethics.og_description')); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo e(url()->current()); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="../css/pages/_ethics.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->startSection('body-class', 'ethics-page-active'); ?>

<div class="ethics-page">

    <div class="slider">
        <div class="slides-container">
            <div class="slide-ethics">
                <div class="txt">
                    <h1><?php echo __('ethics.hero_title'); ?></h1>
                    <p class="desc"><?php echo nl2br(__('ethics.hero_secondary')); ?></p>
                </div>
            </div>
        </div>
    </div>

    
    <section class="ethics-content">
        <div class="ethics-wrapper">
            <div class="advantages">
                <h2 class="black"><?php echo __('ethics.wrapper_title'); ?></h2>
                <p class="secondary-p-black"><?php echo nl2br(__('ethics.wrapper_desc')); ?></p>
                <div class="adv-row">
                    <?php $__currentLoopData = __('ethics.cards'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $adv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="advantage">
                            <img src="/img/ellipse-<?php echo e($loop->iteration); ?>.png" alt="0<?php echo e($loop->iteration); ?>" class="ellipse">
                            <h4><?php echo $adv['title']; ?></h4>
                            <p class="small"><?php echo nl2br($adv['desc']); ?></p>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>

    <div class="program">
        <div class="txt-column">
            <h2 class="black"><?php echo __('ethics.program_title'); ?></h2>
            <p class="secondary-p-black"><?php echo nl2br(__('ethics.program_desc')); ?></p>
        </div>
       <div class="pdfs">
            <a
                href="/docs/Политика информирования о нарушениях.pdf"
                target="_blank"
                rel="noopener noreferrer"
            >
                <img src="/img/ethics/pdf-1.png" alt="<?php echo e(__('ethics.pdf1_alt')); ?>">
            </a>

            <a
                href="/docs/Кодекс деловой этики.pdf"
                target="_blank"
                rel="noopener noreferrer"
            >
                <img src="/img/ethics/pdf-2.png" alt="<?php echo e(__('ethics.pdf2_alt')); ?>">
            </a>
        </div>
    </div>

    <div class="compliance">
        <div class="compliance-column">
            <h2 class="black"><?php echo __('messages.compliance.title'); ?></h2>
            <p class="secondary-p-black"><?php echo nl2br(__('messages.compliance.desc1')); ?></p>
            <p class="secondary-p-black"><?php echo nl2br(__('messages.compliance.desc2')); ?></p>
            <a href="mailto:larissa.silkina@atalianworld.com" class="btn-primary"><?php echo __('messages.compliance.btn'); ?></a>
            <p class="disclaimer-black"><?php echo nl2br(__('messages.compliance.notice')); ?></p>
        </div>
        <img src="/img/compliance.png" alt="" class="compliance-img">
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\miros\atalian\resources\views/ethics.blade.php ENDPATH**/ ?>