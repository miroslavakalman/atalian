

<?php $__env->startSection('title', __('sitemap.page_title')); ?>

<?php $__env->startSection('meta'); ?>
    <meta name="description" content="<?php echo e(__('sitemap.meta_description')); ?>">
    <meta name="keywords" content="<?php echo e(__('sitemap.meta_keywords')); ?>">
    <meta property="og:title" content="<?php echo e(__('sitemap.og_title')); ?>">
    <meta property="og:description" content="<?php echo e(__('sitemap.og_description')); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo e(url()->current()); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container sitemap-page">
    <h1><?php echo e(__('sitemap.title')); ?></h1>
    <p class="sitemap-description"><?php echo e(__('sitemap.description')); ?></p>
    
    <div class="sitemap-content">
        <!-- Main Pages -->
        <section class="sitemap-section">
            <h2><?php echo e(__('sitemap.main_pages')); ?></h2>
            <ul class="sitemap-list">
                <li><a href="<?php echo e(url(app()->getLocale() . '/')); ?>"><?php echo e(__('sitemap.home')); ?></a></li>
                <li><a href="<?php echo e(route('about', app()->getLocale())); ?>"><?php echo e(__('sitemap.about')); ?></a></li>
                <li><a href="<?php echo e(url(app()->getLocale() . '/contact')); ?>"><?php echo e(__('sitemap.contact')); ?></a></li>
                <li><a href="<?php echo e(route('career', app()->getLocale())); ?>"><?php echo e(__('sitemap.career')); ?></a></li>
            </ul>
        </section>
        
        <!-- Services -->
        <section class="sitemap-section">
            <h2><?php echo e(__('sitemap.services')); ?></h2>
            <ul class="sitemap-list">
                <li><a href="<?php echo e(route('services.index', app()->getLocale())); ?>"><?php echo e(__('sitemap.all_services')); ?></a></li>
                <li><a href="<?php echo e(url(app()->getLocale() . '/services/cleaning')); ?>"><?php echo e(__('sitemap.cleaning')); ?></a></li>
                <li><a href="<?php echo e(url(app()->getLocale() . '/services/technical')); ?>"><?php echo e(__('sitemap.technical')); ?></a></li>
                <li><a href="<?php echo e(url(app()->getLocale() . '/services/facility')); ?>"><?php echo e(__('sitemap.facility')); ?></a></li>
                <li><a href="<?php echo e(url(app()->getLocale() . '/services/logistics')); ?>"><?php echo e(__('sitemap.logistics')); ?></a></li>
                <li><a href="<?php echo e(url(app()->getLocale() . '/services/administrative')); ?>"><?php echo e(__('sitemap.administrative')); ?></a></li>
                <li><a href="<?php echo e(url(app()->getLocale() . '/services/custom')); ?>"><?php echo e(__('sitemap.custom')); ?></a></li>
            </ul>
        </section>
        
        <!-- Industries -->
        <section class="sitemap-section">
            <h2><?php echo e(__('sitemap.industries')); ?></h2>
            <ul class="sitemap-list">
                <li><a href="<?php echo e(url(app()->getLocale() . '/industries')); ?>"><?php echo e(__('sitemap.industries_page')); ?></a></li>
                <li><a href="<?php echo e(url(app()->getLocale() . '/industries/#offices')); ?>"><?php echo e(__('sitemap.offices')); ?></a></li>
                <li><a href="<?php echo e(url(app()->getLocale() . '/industries/#industrial')); ?>"><?php echo e(__('sitemap.industrial')); ?></a></li>
                <li><a href="<?php echo e(url(app()->getLocale() . '/industries/#retail_service')); ?>"><?php echo e(__('sitemap.retail_service')); ?></a></li>
                <li><a href="<?php echo e(url(app()->getLocale() . '/industries/#public')); ?>"><?php echo e(__('sitemap.public')); ?></a></li>
                <li><a href="<?php echo e(url(app()->getLocale() . '/industries/#transport')); ?>"><?php echo e(__('sitemap.transport')); ?></a></li>
                <li><a href="<?php echo e(url(app()->getLocale() . '/industries/#healthcare')); ?>"><?php echo e(__('sitemap.healthcare')); ?></a></li>
                <li><a href="<?php echo e(url(app()->getLocale() . '/industries/#premium_housing')); ?>"><?php echo e(__('sitemap.premium_housing')); ?></a></li>
            </ul>
        </section>
        
        <!-- Company Information -->
        <section class="sitemap-section">
            <h2><?php echo e(__('sitemap.company_info')); ?></h2>
            <ul class="sitemap-list">
                <li><a href="<?php echo e(route('ethics', app()->getLocale())); ?>"><?php echo e(__('sitemap.ethics')); ?></a></li>
                <li><a href="<?php echo e(url(app()->getLocale() . '/sustainability')); ?>"><?php echo e(__('sitemap.sustainability')); ?></a></li>
            </ul>
        </section>
        
        <!-- Legal Documents -->
        <section class="sitemap-section">
            <h2><?php echo e(__('sitemap.legal')); ?></h2>
            <ul class="sitemap-list">
                <li><a href="<?php echo e(route('cookies', app()->getLocale())); ?>"><?php echo e(__('sitemap.cookies')); ?></a></li>
                <li><a href="<?php echo e(route('policy', app()->getLocale())); ?>"><?php echo e(__('sitemap.privacy_policy')); ?></a></li>
            </ul>
        </section>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\miros\atalian\resources\views/sitemap.blade.php ENDPATH**/ ?>