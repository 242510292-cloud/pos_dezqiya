

<?php $__env->startSection('title', 'Edit Jenis Produk'); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<div class="container mt-4">

    <div class="mb-4">
        <h1 class="fw-bold text-primary">
            <i class="bi bi-pencil-square me-2"></i>
            Edit Jenis Produk
        </h1>

        <p class="text-muted">
            Perbarui informasi jenis produk.
        </p>
    </div>

    <div class="card border-0 shadow-sm" style="border-radius: 25px;">

        <div class="card-header text-white fw-bold"
             style="background: linear-gradient(135deg, #42b9e9, #20aeea);">
            Form Edit Jenis Produk
        </div>

        <div class="card-body p-4">

            <form action="<?php echo e(route('jenis-produk.update', $jenisProduk->id)); ?>"
                  method="POST">

                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="mb-3">

                    <label for="nama" class="form-label fw-bold">
                        Nama Jenis Produk
                    </label>

                  <input
    type="text"
    name="nama"
    id="nama"
    class="form-control <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
    value="<?php echo e(old('nama', $jenisProduk->nama)); ?>"
    required
>

                    <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback">
                            <?php echo e($message); ?>

                        </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                </div>

                <div class="mt-4">

                    <a href="<?php echo e(route('jenis-produk.index')); ?>"
                       class="btn btn-secondary">
                        <i class="bi bi-arrow-left me-1"></i>
                        Kembali
                    </a>

                    <button type="submit"
                            class="btn btn-info text-white">
                        <i class="bi bi-check-lg me-1"></i>
                        Update
                    </button>

                </div>

            </form>

        </div>
    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\pos_dezqiya\resources\views/jenis_produk/edit.blade.php ENDPATH**/ ?>