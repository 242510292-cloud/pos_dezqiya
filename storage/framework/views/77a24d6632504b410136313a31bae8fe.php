

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

                    <label for="foto"
                           class="form-label fw-bold">

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
                            style="
                                display:none;
                                max-width:200px;
                                max-height:200px;
                                object-fit:cover;
                            "
                            class="img-thumbnail"
                        >

                    </div>

                </div>



                
                
                

                <div class="mb-3">

                    <label for="name"
                           class="form-label fw-bold">

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

                    <label for="jenis_produk_id"
                           class="form-label fw-bold">

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

                    <label for="purchase_price"
                           class="form-label fw-bold">

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
                        min="0"
                        step="1"
                    >


                    <small class="text-muted">

                        Masukkan harga modal produk.

                    </small>


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

                    <label for="selling_price"
                           class="form-label fw-bold">

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
                        placeholder="Harga jual otomatis"
                        min="0"
                        step="1"
                        readonly
                    >


                    

                    <small class="text-success">

                        <i class="bi bi-check-circle"></i>

                        Harga jual otomatis dengan keuntungan 30%.

                    </small>


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



                
                
                

                <div id="profit-info"
                     class="alert alert-success"
                     style="display:none;">

                    <div class="d-flex justify-content-between">

                        <span>
                            Harga Pokok
                        </span>

                        <strong id="display-purchase-price">
                            Rp 0
                        </strong>

                    </div>


                    <div class="d-flex justify-content-between">

                        <span>
                            Keuntungan 30%
                        </span>

                        <strong id="display-profit">
                            Rp 0
                        </strong>

                    </div>


                    <hr>


                    <div class="d-flex justify-content-between">

                        <span class="fw-bold">
                            Harga Jual
                        </span>

                        <strong id="display-selling-price"
                                class="fs-5">

                            Rp 0

                        </strong>

                    </div>

                </div>



                
                
                

                <div class="mb-3">

                    <label for="stock"
                           class="form-label fw-bold">

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
                        min="0"
                        step="1"
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



                
                
                

                <div class="mt-4">

                    <button
                        type="submit"
                        class="btn btn-info text-white fw-bold"
                    >

                        <i class="bi bi-check-lg"></i>

                        Simpan

                    </button>


                    <a
                        href="<?php echo e(route('produk.index')); ?>"
                        class="btn btn-secondary fw-bold"
                    >

                        <i class="bi bi-arrow-left"></i>

                        Kembali

                    </a>

                </div>


            </form>

        </div>

    </div>

</div>







<script>

document.addEventListener('DOMContentLoaded', function () {

    // =========================================================
    // ELEMENT
    // =========================================================

    const hargaPokok =
        document.getElementById('purchase_price');

    const hargaJual =
        document.getElementById('selling_price');

    const profitInfo =
        document.getElementById('profit-info');

    const displayPurchasePrice =
        document.getElementById('display-purchase-price');

    const displayProfit =
        document.getElementById('display-profit');

    const displaySellingPrice =
        document.getElementById('display-selling-price');


    // =========================================================
    // FORMAT RUPIAH
    // =========================================================

    function formatRupiah(angka) {

        return 'Rp ' +
            Number(angka).toLocaleString('id-ID');

    }


    // =========================================================
    // HITUNG HARGA JUAL
    // =========================================================

    function hitungHargaJual() {

        // Ambil harga pokok
        const pokok =
            parseFloat(hargaPokok.value) || 0;


        // Jika harga pokok kosong
        if (pokok <= 0) {

            hargaJual.value = '';

            profitInfo.style.display = 'none';

            return;
        }


        // =====================================================
        // HITUNG KEUNTUNGAN 30%
        // =====================================================

        const keuntungan =
            pokok * 30 / 100;


        // =====================================================
        // HARGA JUAL
        // =====================================================

        const jual =
            pokok + keuntungan;


        // Bulatkan ke rupiah
        const jualBulat =
            Math.round(jual);


        // =====================================================
        // MASUKKAN KE INPUT HARGA JUAL
        // =====================================================

        hargaJual.value =
            jualBulat;


        // =====================================================
        // TAMPILKAN INFORMASI
        // =====================================================

        profitInfo.style.display =
            'block';


        displayPurchasePrice.textContent =
            formatRupiah(pokok);


        displayProfit.textContent =
            formatRupiah(keuntungan);


        displaySellingPrice.textContent =
            formatRupiah(jualBulat);

    }


    // =========================================================
    // KETIKA HARGA POKOK DIKETIK
    // =========================================================

    hargaPokok.addEventListener(
        'input',
        hitungHargaJual
    );


    // =========================================================
    // JALANKAN SAAT HALAMAN DIBUKA
    // =========================================================

    hitungHargaJual();

});



// =============================================================
// PREVIEW GAMBAR
// =============================================================

function previewImage(input) {

    const preview =
        document.getElementById('preview');


    // Jika ada file
    if (
        input.files &&
        input.files[0]
    ) {

        const file =
            input.files[0];


        // Pastikan file adalah gambar
        if (!file.type.startsWith('image/')) {

            alert(
                'File yang dipilih harus berupa gambar.'
            );

            input.value = '';

            preview.src = '#';

            preview.style.display = 'none';

            return;
        }


        // FileReader
        const reader =
            new FileReader();


        reader.onload =
            function (e) {

                preview.src =
                    e.target.result;

                preview.style.display =
                    'block';

            };


        reader.readAsDataURL(file);

    } else {

        preview.src = '#';

        preview.style.display =
            'none';

    }

}

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\pos_dezqiya\resources\views/produk/create.blade.php ENDPATH**/ ?>