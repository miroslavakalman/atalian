

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Дашборд</h2>
    <div class="text-muted">
        Последнее обновление: <?php echo e(now()->format('d.m.Y H:i')); ?>

    </div>
</div>

<div class="row mb-4">
    <div class="col-md-3">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <h5 class="card-title">Всего откликов</h5>
                <h2><?php echo e($stats['total']); ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-info">
            <div class="card-body">
                <h5 class="card-title">Новые</h5>
                <h2><?php echo e($stats['new']); ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-success">
            <div class="card-body">
                <h5 class="card-title">Приглашены</h5>
                <h2><?php echo e($stats['invited']); ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-warning">
            <div class="card-body">
                <h5 class="card-title">За неделю</h5>
                <h2><?php echo e($stats['last_week']); ?></h2>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Последние отклики</h5>
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Имя</th>
                            <th>Email</th>
                            <th>Вакансия</th>
                            <th>Статус</th>
                            <th>Дата</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $recentSubmissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td>
                                    <a href="<?php echo e(route('admin.career.show', $submission)); ?>">
                                        <?php echo e($submission->name); ?>

                                    </a>
                                </td>
                                <td><?php echo e($submission->email); ?></td>
                                <td><?php echo e($submission->vacancy_name ?? '-'); ?></td>
                                <td>
                                    <span class="badge status-<?php echo e($submission->status); ?>">
                                        <?php echo e($submission->status_label); ?>

                                    </span>
                                </td>
                                <td><?php echo e($submission->created_at->format('d.m.Y')); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5" class="text-center text-muted py-3">
                                    Нет откликов
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Быстрые действия</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="<?php echo e(route('admin.career.export')); ?>" class="btn btn-outline-success">
                        <i class="bi bi-download"></i> Экспорт в CSV
                    </a>
                    <a href="<?php echo e(url('/')); ?>" class="btn btn-outline-secondary">
                        <i class="bi bi-globe"></i> Перейти на сайт
                    </a>
                </div>
            </div>
        </div>
        
        <div class="card mt-4">
            <div class="card-header">
                <h5 class="mb-0">Статистика по статусам</h5>
            </div>
            <div class="card-body">
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <span class="badge bg-primary">Всего</span>
                        <span class="float-end"><?php echo e($stats['total']); ?></span>
                    </li>
                    <li class="mb-2">
                        <span class="badge bg-info">Новые</span>
                        <span class="float-end"><?php echo e($stats['new']); ?></span>
                    </li>
                    <li class="mb-2">
                        <span class="badge bg-secondary">Рассмотрены</span>
                        <span class="float-end"><?php echo e($stats['reviewed']); ?></span>
                    </li>
                    <li class="mb-2">
                        <span class="badge bg-success">Приглашены</span>
                        <span class="float-end"><?php echo e($stats['invited']); ?></span>
                    </li>
                    <li class="mb-2">
                        <span class="badge bg-danger">Отклонены</span>
                        <span class="float-end"><?php echo e($stats['rejected']); ?></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\miros\atalian\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>