

<?php $__env->startSection('title', 'Login POS'); ?>

<?php $__env->startSection('content'); ?>

<style>
    body{
        background: linear-gradient(135deg,#87CEEB,#4FC3F7,#2196F3);
        min-height:100vh;
    }

    .login-card{
        width:400px;
        border:none;
        border-radius:20px;
        overflow:hidden;
        box-shadow:0 15px 35px rgba(0,0,0,.2);
        animation:fadeIn .6s;
    }

    .login-header{
        background:#2196F3;
        color:white;
        text-align:center;
        padding:20px;
    }

    .login-header h3{
        margin:0;
        font-weight:bold;
    }

    .login-body{
        padding:30px;
        background:white;
    }

    .form-label{
        font-weight:600;
        color:#555;
    }

    .form-control{
        height:48px;
        border-radius:10px;
        border:1px solid #90caf9ff;
    }

    .form-control:focus{
        border-color:#2196F3;
        box-shadow:0 0 10px rgba(33,150,243,.3);
    }

    .btn-login{
        width:100%;
        height:48px;
        border:none;
        border-radius:10px;
        background:#29B6F6;
        color:white;
        font-size:17px;
        font-weight:bold;
        transition:.3s;
    }

    .btn-login:hover{
        background:#0288D1;
        transform:translateY(-2px);
    }

    .logo{
        font-size:60px;
        text-align:center;
        margin-bottom:10px;
    }

    @keyframes fadeIn{
        from{
            opacity:0;
            transform:translateY(30px);
        }
        to{
            opacity:1;
            transform:translateY(0);
        }
    }
</style>

<div class="container vh-100 d-flex justify-content-center align-items-center">

    <div class="card login-card">

        <div class="login-header">
            <div class="logo">🛒</div>
            <h1 style="color: orange;">DailyMart⭐</h1>
            <small>Silakan login untuk melanjutkan</small>
        </div>

        <div class="login-body">

            <form action="<?php echo e(route('auth')); ?>" method="POST">
                <?php echo csrf_field(); ?>

                <div class="mb-3">
                    <label class="form-label">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        placeholder="Masukkan Email">

                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <small class="text-danger"><?php echo e($message); ?></small>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="mb-4">
                    <label class="form-label">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        placeholder="Masukkan Password">

                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <small class="text-danger"><?php echo e($message); ?></small>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <button type="submit" class="btn btn-login">
                    Login
                </button>

            </form>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\pos_dezqiya\resources\views/login.blade.php ENDPATH**/ ?>