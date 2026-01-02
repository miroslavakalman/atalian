<div class="services wrapper" id="wrapper-adv">
    <h2 class="black"><?php echo e(__('messages.services_title')); ?></h2>

    <div class="services-row">
        <img src="img/service-1.png" class="service-img" alt="<?php echo e(__('messages.services_img_alt')); ?>">

        <div class="dropdown-column">
         <?php $__currentLoopData = __('messages.services_list'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="dropdown-item">
        <div class="dropdown-closed">
            <p class="secondary-p-black"><?php echo $service['title']; ?></p>
            <img src="img/arrow.png" class="arrow-down" alt="<?php echo e(__('messages.arrow_down_alt')); ?>">
        </div>
        <div class="dropdown-opened">
            <div class="dropdown-opened-row">
                <p class="secondary-p-white"><?php echo $service['title']; ?></p>
                <img src="img/arrow-up.png" class="arrow-up" alt="<?php echo e(__('messages.arrow_up_alt')); ?>">
            </div>
            <ul class="dropdown-list">
                <?php $__currentLoopData = $service['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($item); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
</div>
<?php /**PATH C:\Users\miros\atalian\resources\views/components/services.blade.php ENDPATH**/ ?>