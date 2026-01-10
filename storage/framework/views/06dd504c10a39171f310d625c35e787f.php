<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход в админ-панель</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: white;           
             height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            width: 100%;
            max-width: 400px;
            padding: 40px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        .login-title {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        button{
            background-color: #F46F1F !important;
            border: none !important;
            outline: none !important;
        }

        a{
            color: #F46F1F;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <h2 class="login-title">Вход в админ-панель</h2>
        
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div><?php echo e($error); ?></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
        
        <form method="POST" action="<?php echo e(route('login')); ?>">
            <?php echo csrf_field(); ?>
            
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" 
                       value="<?php echo e(old('email')); ?>" required autofocus>
            </div>
            
            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Запомнить меня</label>
            </div>
            
            <button type="submit" class="btn btn-primary w-100">Войти</button>
        </form>
        
        <div class="mt-3 text-center">
            <a href="/" class="text-decoration-none">
                ← Вернуться на сайт
            </a>
        </div>
    </div>
</body>
</html><?php /**PATH C:\Users\miros\atalian\resources\views/admin/auth/login.blade.php ENDPATH**/ ?>