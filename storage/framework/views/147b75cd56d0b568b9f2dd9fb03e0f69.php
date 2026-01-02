<div class="partners">
    <h2 class="black"><?php echo e(__('messages.partners_title')); ?></h2>
    <p class="secondary-p-black"><?php echo e(__('messages.partners_desc')); ?></p>

    <div class="partners-static"> 
        <div class="partners-t">
            <div class="partners-static">
                <?php $__currentLoopData = range(1,2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($i == 2): ?>
                        <a href="https://proffadmin.ru" 
                           target="_blank" 
                           rel="noopener noreferrer" 
                           class="partner-link">
                            <img src="img/logo-<?php echo e($i); ?>.png" class="partner-logo" alt="<?php echo e(__('messages.partner_logo_alt', ['num' => $i])); ?>">
                        </a>
                    <?php else: ?>
                        <img src="img/logo-<?php echo e($i); ?>.png" class="partner-logo" alt="<?php echo e(__('messages.partner_logo_alt', ['num' => $i])); ?>">
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\miros\atalian\resources\views/components/partners.blade.php ENDPATH**/ ?>