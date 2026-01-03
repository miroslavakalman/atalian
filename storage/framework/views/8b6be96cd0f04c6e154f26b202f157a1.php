    

    <?php $__env->startSection('title', __('about.page_title')); ?>

    <?php $__env->startSection('meta'); ?>
        <meta name="description" content="<?php echo e(__('about.meta_description')); ?>">
        <meta name="keywords" content="<?php echo e(__('about.meta_keywords')); ?>">
        <meta property="og:title" content="<?php echo e(__('about.og_title')); ?>">
        <meta property="og:description" content="<?php echo e(__('about.og_description')); ?>">
        <meta property="og:type" content="website">
        <meta property="og:url" content="<?php echo e(url()->current()); ?>">
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('content'); ?>
    <div class="slider">
        <div class="slides-container">
            <div class="slide-about">
                <div class="txt">
                    <h1><?php echo __('about.hero_title'); ?></h1>
                    <p class="desc"><?php echo __('about.hero_desc'); ?></p>
                    <button class="btn-primary"><?php echo __('about.hero_button'); ?></button>
                </div>
            </div>
        </div>
    </div>
    <div class="about-company">
        <div>
            <h2 class="black"><?php echo __('about.block-1-title'); ?></h2>
            <p class="secondary-p-black"><?php echo __('about.block-1-desc'); ?></p>
        </div>
        <img src="/img/about/card-1.png" alt="<?php echo e(__('about.img_card1_alt')); ?>">
    </div>
    <div class="stats" id="stats-rus">
        <img src="/img/about/card-2.png" alt="<?php echo e(__('about.img_card2_alt')); ?>">
        <div class="column-txt">
            <p class="disclaimer"><?php echo e(__('about.stats_label')); ?></p>
            <h2><?php echo e(__('about.stats_title')); ?></h2>
            <div class="stats-row" id="stats-rus-row">
                <?php $__currentLoopData = __('about.stats'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="stat">
                        <h3 data-target="<?php echo e($stat['value']); ?>" data-suffix="<?php echo e($stat['suffix']); ?>">0</h3>
                        <p class="secondary-p"><?php echo e($stat['label']); ?></p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <hr class="stats-separator">

            <div class="stats-row" id="stats-rus-row">
                <?php $__currentLoopData = __('about.stats-2'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="stat">
                        <h3 data-target="<?php echo e($stat['value']); ?>" data-suffix="<?php echo e($stat['suffix']); ?>">0</h3>
                        <p class="secondary-p"><?php echo e($stat['label']); ?></p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

        </div>
    </div>
    <div class="mission">
        <h2 class="black"><?php echo e(__('about.mission_title')); ?></h2>

        <div class="mission-row row">
            <h3><?php echo __('about.mission_row_title'); ?></h3>
            <p class="secondary-p-black"><?php echo __('about.mission_row'); ?></p>
        </div>

        <div class="values-row row">
            <h3><?php echo __('about.values_title'); ?></h3>
            <div class="values-column">
                <div class="column">
                    <p class="orange-secondary"><?php echo __('about.values_card_1'); ?></p>
                    <p class="secondary-p-black"><?php echo __('about.values_card_1_desc'); ?></p>
                </div>
                <div class="column">
                    <p class="orange-secondary"><?php echo __('about.values_card_2'); ?></p>
                    <p class="secondary-p-black"><?php echo __('about.values_card_2_desc'); ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="licenses">
        <h2 class="black"><?php echo __('about.license_title'); ?></h2>
        <div class="pdf-row">
            <iframe src="/docs/Сертификат ISO 9001-2015.pdf" frameborder="0"></iframe>
            <iframe src="/docs/Выписка из реестра МЧС.pdf" frameborder="0"></iframe>
            <iframe src="/docs/Лицензия МЧС №8-Б 01369.pdf" frameborder="0"></iframe>
        </div>
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\miros\atalian\resources\views/about.blade.php ENDPATH**/ ?>