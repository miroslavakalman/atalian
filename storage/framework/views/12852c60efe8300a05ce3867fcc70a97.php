<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ-панель | Atalian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/admin.css">
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <h4>Админ-панель</h4>
        </div>
        
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?php echo e(request()->is('admin/dashboard') ? 'active' : ''); ?>" 
                   href="<?php echo e(route('admin.dashboard')); ?>">
                    <i class="bi bi-speedometer2"></i> Дашборд
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo e(request()->is('admin/career*') ? 'active' : ''); ?>" 
                   href="<?php echo e(route('admin.dashboard')); ?>">
                    <i class="bi bi-person-badge"></i> Отклики на вакансии
                    <?php
                        $newCount = \App\Models\CareerSubmission::where('status', 'new')->count();
                    ?>
                    <?php if($newCount > 0): ?>
                        <span class="badge-notification"><?php echo e($newCount); ?></span>
                    <?php endif; ?>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo e(request()->is('admin/contact*') ? 'active' : ''); ?>" 
                   href="<?php echo e(route('admin.contact.index')); ?>">
                    <i class="bi bi-envelope"></i> Обращения с сайта
                    <?php
                        $newContacts = \App\Models\ContactSubmission::where('status', 'new')->count();
                    ?>
                    <?php if($newContacts > 0): ?>
                        <span class="badge-notification"><?php echo e($newContacts); ?></span>
                    <?php endif; ?>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo e(request()->is('admin/content*') ? 'active' : ''); ?>" 
                href="<?php echo e(route('admin.content.index')); ?>">
                    <i class="bi bi-textarea-t"></i> Управление контентом
                </a>
            </li>
            
            <li class="nav-item back-to-site">
                <a class="nav-link" href="<?php echo e(url('/')); ?>">
                    <i class="bi bi-arrow-left"></i> Вернуться на сайт
                </a>
            </li>
        </ul>
    </div>

    <!-- Основной контент -->
    <div class="main-content">
        <!-- Хедер -->
        <header class="admin-header">
            <div class="d-flex align-items-center gap-3">
                <button class="menu-toggle d-lg-none">
                    <i class="bi bi-list"></i>
                </button>
                <span class="brand">Управление заявками</span>
            </div>
            
            <div class="user-info">
                <div class="user-avatar">
                    <?php echo e(strtoupper(substr(Auth::user()->name, 0, 2))); ?>

                </div>
                <div>
                    <div class="user-name"><?php echo e(Auth::user()->name); ?></div>
                    <div class="user-email text-muted small"><?php echo e(Auth::user()->email); ?></div>
                </div>
                <a href="<?php echo e(route('logout')); ?>" class="logout-btn"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Выйти
                </a>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                    <?php echo csrf_field(); ?>
                </form>
            </div>
        </header>

        <div class="content-wrapper">
            <?php if(session('success')): ?>
                <div class="alert alert-admin alert-admin-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-2"></i>
                    <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?php if(session('error')): ?>
                <div class="alert alert-admin alert-admin-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    <?php echo e(session('error')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.querySelector('.menu-toggle');
            const sidebar = document.querySelector('.sidebar');
            
            if (menuToggle) {
                menuToggle.addEventListener('click', function() {
                    sidebar.classList.toggle('active');
                });
            }
            
            document.querySelectorAll('.delete-form').forEach(form => {
                form.addEventListener('submit', function(e) {
                    if (!confirm('Вы уверены, что хотите удалить эту запись?')) {
                        e.preventDefault();
                    }
                });
            });

            const selectAll = document.getElementById('select-all');
            if (selectAll) {
                selectAll.addEventListener('change', function() {
                    document.querySelectorAll('.submission-checkbox').forEach(cb => {
                        cb.checked = this.checked;
                    });
                });
            }
            
            if (window.innerWidth < 992) {
                document.querySelectorAll('.nav-link').forEach(link => {
                    link.addEventListener('click', function() {
                        sidebar.classList.remove('active');
                    });
                });
            }
        });
    </script>
</body>
</html><?php /**PATH C:\Users\miros\atalian\resources\views/admin/layout.blade.php ENDPATH**/ ?>