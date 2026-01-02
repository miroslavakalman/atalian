

<?php $__env->startSection('title', __('career.page_title')); ?>

<?php $__env->startSection('meta'); ?>
    <meta name="description" content="<?php echo e(__('career.meta_description')); ?>">
    <meta name="keywords" content="<?php echo e(__('career.meta_keywords')); ?>">
    <meta property="og:title" content="<?php echo e(__('career.og_title')); ?>">
    <meta property="og:description" content="<?php echo e(__('career.og_description')); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo e(url()->current()); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="slider">
    <div class="slides-container">
        <div class="slide-career">
            <div class="txt">
                <h1><?php echo __('career.hero_title'); ?></h1>
                <p class="desc"><?php echo __('career.hero_desc'); ?></p>
                <button
                    class="btn-primary"
                    id="scroll-to-vacancies"
                >
                    <?php echo __('career.hero_button'); ?>

                </button>
            </div>
    </div>
</div>
</div>
<div class="stats" id="career-wrapper">
    <div class="column-txt">
        <h2><?php echo e(__('career.choice_label')); ?></h2>
        <div class="cards-row">
            <?php $__currentLoopData = __('career.cards'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="career-card">
                    <img src="<?php echo e($card['image']); ?>" alt="<?php echo e($card['title']); ?>">
                    <h3><?php echo e($card['title']); ?></h3>
                    <p><?php echo e($card['desc']); ?></p>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>

<div class="positions" id="open-vacancies">
    <h2><?php echo e(__('career.vacancies_title')); ?></h2>

    <?php if(count($vacancies) === 0): ?>
        <p class="no-vacancies">На данный момент открытых вакансий нет.</p>
    <?php else: ?>
        <div class="vac-slider-wrapper">
        <button class="vac-arrow" id="vac-prev">
            <img src="/img/career/arrow-left.png" alt="→">
        </button>

            <div class="vac-slider" id="vac-slider">
                <?php $__currentLoopData = $vacancies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="vac-card <?php echo e($index >= 3 ? 'vac-hidden-mobile' : ''); ?>">
        <h3><?php echo e($v['name']); ?></h3>
        <p class="city"><?php echo e($v['city']); ?></p>

        <?php if($v['salary']): ?>
            <p class="salary">от <?php echo e(number_format($v['salary'], 0, ',', ' ')); ?> ₽</p>
        <?php else: ?>
            <p class="salary empty">Зарплата не указана</p>
        <?php endif; ?>

        <?php
            $responsibility = strip_tags($v['responsibility'] ?? '');
        ?>

        <?php if($responsibility): ?>
            <p class="vacancy-resp">
                <?php echo e(\Illuminate\Support\Str::limit($responsibility, 120, '…')); ?>

            </p>
        <?php endif; ?>

        <div class="vac-actions">
            <button class="btn-respond"><?php echo __('career.button_main'); ?></button>
            <a href="<?php echo e($v['url']); ?>" target="_blank" class="vac-more"><?php echo __('career.read_more'); ?></a>
        </div>
    </div>
    </a>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
<button id="show-more-btn" class="btn-primary" style="display:none; margin-top:20px;"><?php echo __('career.button_more'); ?></button>

    <button class="vac-arrow-right" id="vac-next">
            <img src="/img/career/arrow-right.png" alt="→">
        </button>        
    </div>
    <?php endif; ?>
</div>
<?php if(session('success')): ?>
    <p class="success-msg"><?php echo e(session('success')); ?></p>
<?php endif; ?>

<div class="no-vacancy-form">
    <h3><?php echo e(__('career.form_not_found_title')); ?></h3>
    <p><?php echo e(__('career.form_not_found_desc')); ?></p>
    
    <form action="<?php echo e(route('career.submit', app()->getLocale())); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <input type="text" name="website" style="display:none" autocomplete="off">

        <input type="text" name="name" placeholder="<?php echo e(__('career.form_name')); ?>" required>
        <input type="email" name="email" placeholder="<?php echo e(__('career.form_email')); ?>" required>

        <div class="file-input-wrapper">
            <input type="file" name="resume" id="resume-input" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png" required>
            <label for="resume-input" class="file-label">
                <span class="file-text"><?php echo e(__('career.form_resume')); ?></span>
            </label>
            <span id="file-name" class="file-name">
                <?php echo e(__('career.form_no_file')); ?>

            </span>
        </div>

        <textarea name="message" placeholder="<?php echo e(__('career.form_message')); ?>"></textarea>

        <div class="consent-checkboxes">
            <div class="checkbox-group">
                <input type="checkbox" id="consent-pd" name="consent_pd" required>
                <label for="consent-pd">
                    <?php echo __('career.consent_pd', [
                        'link' => route('policy', app()->getLocale())
                    ]); ?>

                </label>
            </div>

            <div class="checkbox-group">
                <input type="checkbox" id="consent-marketing" name="consent_marketing">
                <label for="consent-marketing">
                    <?php echo e(__('career.consent_marketing')); ?>

                </label>
            </div>

            <p class="age-notice">
                <?php echo e(__('career.age_notice')); ?>

            </p>
        </div>

        <button type="submit" class="btn-primary" id="submit-btn" disabled>
            <?php echo e(__('career.form_submit')); ?>

        </button>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const consentPd = document.getElementById('consent-pd');
    const submitBtn = document.getElementById('submit-btn');
    const form = document.querySelector('.no-vacancy-form form');
    
    consentPd.addEventListener('change', function() {
        submitBtn.disabled = !this.checked;
    });
    
    form.addEventListener('submit', function(e) {
        if (!consentPd.checked) {
            e.preventDefault();
            alert('Необходимо согласие на обработку персональных данных');
            consentPd.focus();
            return false;
        }
    });
    
    const resumeInput = document.getElementById('resume-input');
    const fileNameSpan = document.getElementById('file-name');
    
    if (resumeInput && fileNameSpan) {
        resumeInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                fileNameSpan.textContent = this.files[0].name;
                fileNameSpan.style.color = '#333';
            } else {
                fileNameSpan.textContent = '<?php echo e(__('career.form_no_file')); ?>';
                fileNameSpan.style.color = '#666';
            }
        });
    }
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\miros\atalian\resources\views/career.blade.php ENDPATH**/ ?>