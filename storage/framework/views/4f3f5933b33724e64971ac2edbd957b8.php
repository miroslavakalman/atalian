

<?php $__env->startSection('title', __('policy.title')); ?>

<?php $__env->startSection('content'); ?>
<div class="container policy-page">
    <h1><?php echo e(__('policy.title')); ?></h1>
    <p class="policy-update"><?php echo e(__('policy.last_updated', ['date' => date('d.m.Y')])); ?></p>
    
    <div class="policy-content">
        <section>
            <h2><?php echo e(__('policy.general_provisions')); ?></h2>
            <p><?php echo __('policy.general_text'); ?></p>
        </section>
        
        <section>
            <h2><?php echo e(__('policy.basic_concepts')); ?></h2>
            <ul>
                <li><strong><?php echo e(__('policy.personal_data')); ?></strong> - <?php echo e(__('policy.personal_data_def')); ?></li>
                <li><strong><?php echo e(__('policy.processing')); ?></strong> - <?php echo e(__('policy.processing_def')); ?></li>
                <li><strong><?php echo e(__('policy.operator')); ?></strong> - <?php echo e(__('policy.operator_def')); ?></li>
                <li><strong><?php echo e(__('policy.subject')); ?></strong> - <?php echo e(__('policy.subject_def')); ?></li>
            </ul>
        </section>
        
        <section>
            <h2><?php echo e(__('policy.processing_purposes')); ?></h2>
            <p><?php echo e(__('policy.company_info')); ?> <?php echo e(__('policy.processing_purposes')); ?>:</p>
            <ul>
                <?php $__currentLoopData = __('policy.purposes_list'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purpose): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($purpose); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </section>
        
        <section>
            <h2><?php echo e(__('policy.legal_basis')); ?></h2>
            <p><?php echo __('policy.legal_basis_text'); ?></p>
        </section>
        
        <section>
            <h2><?php echo e(__('policy.data_categories')); ?></h2>
            <p><?php echo __('policy.clients_data'); ?></p>
            <ul>
                <?php $__currentLoopData = __('policy.clients_list'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($data); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            
            <p><?php echo __('policy.candidates_data'); ?></p>
            <ul>
                <?php $__currentLoopData = __('policy.candidates_list'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($data); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            
            <p><?php echo __('policy.visitors_data'); ?></p>
            <ul>
                <?php $__currentLoopData = __('policy.visitors_list'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($data); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </section>
        
        <section>
            <h2><?php echo e(__('policy.processing_principles')); ?></h2>
            <ul>
                <?php $__currentLoopData = __('policy.principles_list'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $principle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($principle); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </section>
        
        <section>
            <h2><?php echo e(__('policy.processing_conditions')); ?></h2>
            <ul>
                <?php $__currentLoopData = __('policy.conditions_list'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $condition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($condition); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </section>
        
        <section>
            <h2><?php echo e(__('policy.storage_period')); ?></h2>
            <p><?php echo __('policy.storage_text'); ?></p>
        </section>
        
        <section>
            <h2><?php echo e(__('policy.security_measures')); ?></h2>
            <ul>
                <?php $__currentLoopData = __('policy.security_list'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $measure): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($measure); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </section>
        
        <section>
            <h2><?php echo e(__('policy.rights_of_subjects')); ?></h2>
            <ul>
                <?php $__currentLoopData = __('policy.rights_list'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $right): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($right); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </section>
        
        <section>
            <h2><?php echo e(__('policy.cross_border_transfer')); ?></h2>
            <p><?php echo __('policy.cross_border_text'); ?></p>
        </section>
        
        <section>
            <h2><?php echo e(__('policy.final_provisions')); ?></h2>
            <p><?php echo __('policy.final_provisions_text', [
                'email' => __('policy.company_email'),
                'policy_url' => url('/policy')
            ]); ?></p>
        </section>
        
        <section class="contacts-section">
            <h2><?php echo e(__('policy.contacts')); ?></h2>
            <p><?php echo __('policy.contacts_text', ['email' => __('policy.company_email')]); ?></p>
        </section>
    </div>
</div>

<style>
.policy-page {
    max-width: 1000px;  
    margin: 40px auto;
    padding: 0 20px;
}

.policy-page h1 {
    color: #012615;
    margin-bottom: 15px;
    text-align: center;
    font-size: 28px;
}

.policy-update {
    text-align: center;
    color: #666;
    margin-bottom: 40px;
    font-style: italic;
}

.policy-content section {
    margin-bottom: 30px;
}

.policy-content h2 {
    color: #ec732c;
    font-size: 20px;
    margin-bottom: 15px;
    border-bottom: 2px solid #f0f0f0;
    padding-bottom: 8px;
}

.policy-content p {
    line-height: 1.6;
    color: #555;
    margin-bottom: 15px;
}

.policy-content ul {
    margin-left: 25px;
    margin-bottom: 15px;
}

.policy-content li {
    margin-bottom: 8px;
    line-height: 1.5;
}

.contacts-section {
    background: #f9f9f9;
    padding: 20px;
    border-radius: 10px;
    border-left: 4px solid #ec732c;
}
    .policy-content li{
        color: #666 !important;
    }
@media (max-width: 768px) {
    .policy-page {
        margin: 20px auto;
        padding: 0 15px;
    }
    
    .policy-page h1 {
        font-size: 24px;
    }
    
    .policy-content h2 {
        font-size: 18px;
    }
    
    .policy-content ul {
        margin-left: 20px;
    }


}
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\miros\atalian\resources\views/policy.blade.php ENDPATH**/ ?>