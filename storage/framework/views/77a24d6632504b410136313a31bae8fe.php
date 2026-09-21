

<?php $__env->startSection('title', 'Tambah Produk'); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<div class="container mt-4">

    <h1 class="fw-bold text-primary mb-4">
        <i class="bi bi-box-seam me-2"></i>
        Tambah Produk
    </h1>

    <div class="card shadow-sm border-0">

        <div class="card-header bg-info text-white">
            <strong>Form Tambah Produk</strong>
        </div>

        <div class="card-body">

            <form action="<?php echo e(route('produk.store')); ?>"
                  method="POST"
                  enctype="multipart/form-data">

                <?php echo csrf_field(); ?>

                
                <div class="mb-3">
                    <label for="foto" class="form-label fw-bold">
                        Gambar
                    </label>

                    <input
                        type="file"
                        name="foto"
                        id="foto"
                        class="form-control <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        accept="image/*"
                        onchange="previewImage(this)"
                    >

                    <?php $__errorArgs = ['foto'];
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

                    <div class="mt-3">
                        <label class="form-label">
                            Preview Foto
                        </label>

                        <br>

                        <img
                            id="preview"
                            src="#"
                            alt="Preview Foto"
                            style="display:none; max-width:200px;"
                            class="img-thumbnail"
                        >
                    </div>
                </div>

                
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">
                        Nama Produk
                    </label>

                    <input
                        type="text"
                        name="name"
                        id="name"
                        class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        value="<?php echo e(old('name')); ?>"
                        placeholder="Masukkan nama produk"
                    >

                    <?php $__errorArgs = ['name'];
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

           
<div class="mb-3">
    <label for="jenis_produk_id" class="form-label fw-bold">
        Jenis Produk
    </label>

    <select
        name="jenis_produk_id"
        id="jenis_produk_id"
        class="form-select <?php $__errorArgs = ['jenis_produk_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
    >
        <option value="">
            -- Pilih Jenis Produk --
        </option>

        <?php $__currentLoopData = $jenisProduks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jenis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option
                value="<?php echo e($jenis->id); ?>"
                <?php echo e(old('jenis_produk_id') == $jenis->id ? 'selected' : ''); ?>

            >
                <?php echo e($jenis->nama); ?>

            </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>

    <?php $__errorArgs = ['jenis_produk_id'];
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


                
                <div class="mb-3">
                    <label for="purchase_price" class="form-label fw-bold">
                        Harga Pokok
                    </label>

                    <input
                        type="number"
                        name="purchase_price"
                        id="purchase_price"
                        class="form-control <?php $__errorArgs = ['purchase_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        value="<?php echo e(old('purchase_price')); ?>"
                        placeholder="Masukkan harga pokok"
                    >

                    <?php $__errorArgs = ['purchase_price'];
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

                
                <div class="mb-3">
                    <label for="selling_price" class="form-label fw-bold">
                        Harga Jual
                    </label>

                    <input
                        type="number"
                        name="selling_price"
                        id="selling_price"
                        class="form-control <?php $__errorArgs = ['selling_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        value="<?php echo e(old('selling_price')); ?>"
                        placeholder="Masukkan harga jual"
                        readonly="readonly"
                    >

                    <?php $__errorArgs = ['selling_price'];
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

                
                <div class="mb-3">
                    <label for="stock" class="form-label fw-bold">
                        Stok
                    </label>

                    <input
                        type="number"
                        name="stock"
                        id="stock"
                        class="form-control <?php $__errorArgs = ['stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        value="<?php echo e(old('stock')); ?>"
                        placeholder="Masukkan jumlah stok"
                    >

                    <?php $__errorArgs = ['stock'];
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

                
                <button type="submit" class="btn btn-info text-white fw-bold">
                    <i class="bi bi-check-lg"></i>
                    Simpan
                </button>

                <a href="<?php echo e(route('produk.index')); ?>"
                   class="btn btn-secondary fw-bold">
                    <i class="bi bi-arrow-left"></i>
                    Kembali
                </a>

            </form>

        </div>
    </div>

</div>

<script>
function previewImage(input) {
    const preview = document.getElementById('preview');

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        };

        reader.readAsDataURL(input.files[0]);
    }
}
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\pos_dezqiya\resources\views/produk/create.blade.php ENDPATH**/ ?>