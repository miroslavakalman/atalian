<div class="slider">
    <div class="slides-container">
        <?php $__currentLoopData = trans('messages.slides'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="slide slide-<?php echo e($index + 1); ?> <?php echo e($index === 0 ? 'active' : ''); ?>">
                <div class="txt">
                    <h1><?php echo $slide['title']; ?></h1>
                    <p class="desc"><?php echo e($slide['desc']); ?></p>

                    <a
                        href="<?php echo e(route($slide['route'], ['locale' => app()->getLocale()])); ?>"
                        class="btn-primary"
                    >
                        <?php echo e($slide['btn']); ?>

                    </a>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php /**PATH C:\Users\miros\atalian\resources\views/components/slider.blade.php ENDPATH**/ ?>