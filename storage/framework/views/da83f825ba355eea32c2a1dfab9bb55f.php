

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Обращения с сайта</h2>
    <div>
        <a href="<?php echo e(route('admin.contact.export')); ?>" class="btn btn-outline-success btn-sm">
            <i class="bi bi-download"></i> Экспорт CSV
        </a>
    </div>
</div>

<div class="card mb-4">
    <div class="card-body">
        <form method="GET" class="row g-3">
            <div class="col-md-3">
                <input type="text" name="search" class="form-control form-control-sm" 
                       placeholder="Поиск по имени, email..." value="<?php echo e(request('search')); ?>">
            </div>
            <div class="col-md-2">
                <select name="status" class="form-select form-select-sm">
                    <option value="">Все статусы</option>
                    <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>" <?php echo e(request('status') == $key ? 'selected' : ''); ?>>
                            <?php echo e($label); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="col-md-2">
                <select name="subject" class="form-select form-select-sm">
                    <option value="">Все темы</option>
                    <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>" <?php echo e(request('subject') == $key ? 'selected' : ''); ?>>
                            <?php echo e($label); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="col-md-2">
                <input type="date" name="date_from" class="form-control form-control-sm" 
                       value="<?php echo e(request('date_from')); ?>">
            </div>
            <div class="col-md-2">
                <input type="date" name="date_to" class="form-control form-control-sm" 
                       value="<?php echo e(request('date_to')); ?>">
            </div>
            <div class="col-md-1">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="bi bi-funnel"></i>
                </button>
                <a href="<?php echo e(route('admin.contact.index')); ?>" class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-x"></i>
                </a>
            </div>
        </form>
    </div>
</div>

<form id="bulk-form" method="POST" action="<?php echo e(route('admin.contact.bulk')); ?>">
    <?php echo csrf_field(); ?>
    <?php echo method_field('POST'); ?>
    <input type="hidden" name="ids" id="bulk-ids">

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div class="form-check mb-0">
                <input class="form-check-input" type="checkbox" id="select-all">
                <label class="form-check-label" for="select-all">Выбрать все</label>
            </div>
            
            <div class="d-flex gap-2">
                <select name="new_status" class="form-select form-select-sm" style="width: auto;">
                    <option value="">Изменить статус на...</option>
                    <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>"><?php echo e($label); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <button type="button" class="btn btn-sm btn-outline-primary" 
                        onclick="submitBulkAction('change_status')">
                    Применить
                </button>
                <button type="button" class="btn btn-sm btn-outline-danger" 
                        onclick="if(confirm('Удалить выбранные?')) submitBulkAction('delete')">
                    <i class="bi bi-trash"></i> Удалить
                </button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="30"></th>
                        <th>Дата</th>
                        <th>Тема</th>
                        <th>Имя</th>
                        <th>Email</th>
                        <th>Телефон</th>
                        <th>Статус</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $submissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="<?php echo e($submission->status === 'new' ? 'table-info' : ''); ?>">
                            <td>
                                <input class="form-check-input submission-checkbox" type="checkbox" 
                                       value="<?php echo e($submission->id); ?>">
                            </td>
                            <td>
                                <?php echo e($submission->created_at->format('d.m.Y H:i')); ?>

                                <?php if($submission->status === 'new'): ?>
                                    <span class="badge bg-danger">NEW</span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($submission->subject_label); ?></td>
                            <td>
                                <strong><?php echo e($submission->name); ?></strong>
                                <?php if($submission->company): ?>
                                    <br><small class="text-muted"><?php echo e($submission->company); ?></small>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="mailto:<?php echo e($submission->email); ?>"><?php echo e($submission->email); ?></a>
                            </td>
                            <td><?php echo e($submission->phone ?? '-'); ?></td>
                            <td>
                                <span class="badge 
                                    <?php if($submission->status === 'new'): ?> bg-info
                                    <?php elseif($submission->status === 'read'): ?> bg-secondary
                                    <?php elseif($submission->status === 'replied'): ?> bg-success
                                    <?php elseif($submission->status === 'closed'): ?> bg-dark
                                    <?php endif; ?>">
                                    <?php echo e($submission->status_label); ?>

                                </span>
                            </td>
                            <td>
                                <a href="<?php echo e(route('admin.contact.show', $submission)); ?>" 
                                   class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <form action="<?php echo e(route('admin.contact.destroy', $submission)); ?>" 
                                      method="POST" class="d-inline delete-form">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="8" class="text-center text-muted py-4">
                                Обращений не найдено
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        
        <div class="card-footer">
            <?php echo e($submissions->links()); ?>

            <div class="text-muted">
                Всего: <?php echo e($submissions->total()); ?>

                <span class="ms-3">Новых: <?php echo e($submissions->where('status', 'new')->count()); ?></span>
            </div>
        </div>
    </div>
</form>

<script>
function submitBulkAction(action) {
    const checkboxes = document.querySelectorAll('.submission-checkbox:checked');
    if (checkboxes.length === 0) {
        alert('Выберите хотя бы одно обращение');
        return;
    }
    
    const ids = Array.from(checkboxes).map(cb => cb.value);
    document.getElementById('bulk-ids').value = JSON.stringify(ids);
    
    const form = document.getElementById('bulk-form');
    const actionInput = document.createElement('input');
    actionInput.type = 'hidden';
    actionInput.name = 'action';
    actionInput.value = action;
    form.appendChild(actionInput);
    
    form.submit();
}

document.addEventListener('DOMContentLoaded', function() {
    const selectAll = document.getElementById('select-all');
    if (selectAll) {
        selectAll.addEventListener('change', function() {
            document.querySelectorAll('.submission-checkbox').forEach(cb => {
                cb.checked = this.checked;
            });
        });
    }
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\miros\atalian\resources\views/admin/contact/index.blade.php ENDPATH**/ ?>