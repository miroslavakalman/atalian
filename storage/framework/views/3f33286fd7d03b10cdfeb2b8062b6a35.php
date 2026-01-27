        <div class="stats" >
            <img src="/img/home/stats-img.webp" alt="<?php echo e(__('about.img_card2_alt')); ?>">
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
<?php /**PATH C:\Users\miros\atalian\resources\views/components/stats.blade.php ENDPATH**/ ?>