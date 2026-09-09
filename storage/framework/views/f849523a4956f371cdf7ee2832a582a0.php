

<?php $__env->startSection('title', 'Tambah Jenis Produk'); ?>

<?php $__env->startSection('content'); ?>

<div class="container mt-4">

    <h1>Tambah Jenis Produk</h1>

    <form action="<?php echo e(route('jenis-produk.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <div class="mb-3">

            <label for="nama" class="form-label">
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
                value="<?php echo e(old('nama')); ?>"
                placeholder="Masukkan nama jenis produk"
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

        <button type="submit" class="btn btn-primary">
            Simpan
        </button>

        <a href="<?php echo e(route('jenis-produk.index')); ?>" class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\pos_dezqiya\resources\views/jenis_produk/create.blade.php ENDPATH**/ ?>