

<?php $__env->startSection('title', 'POS'); ?>

<?php $__env->startSection('content'); ?>

<?php if($errors->any()): ?>
<div class="alert alert-danger">
    <ul class="mb-0">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php endif; ?>

<h4 class="mb-3">Tambah dan Edit</h4>

<div class="row">

    
    
    
    <div class="col-md-6">

        <div class="card">

            <div class="card-body"
                 style="max-height:70vh; overflow:auto">

                
                <form method="GET"
                      action="<?php echo e(route('penjualan.create')); ?>">

                    <input type="text"
                           name="search"
                           value="<?php echo e(request('search')); ?>"
                           class="form-control mb-3"
                           placeholder="Cari produk..."
                           onkeyup="this.form.submit()">

                </form>


                
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <form method="POST"
                      action="<?php echo e(route('itempenjualan.store')); ?>"
                      class="row mb-2">

                    <?php echo csrf_field(); ?>

                    <input type="hidden"
                           name="product_id"
                           value="<?php echo e($product->id); ?>">

                    
                    <div class="col-7">

                        <div class="btn btn-outline-primary w-100 text-start p-2">

                            <div class="d-flex align-items-center gap-2">

                                <img src="<?php echo e(asset('storage/'.$product->foto)); ?>"
                                     class="rounded-circle"
                                     style="width:45px;
                                            height:45px;
                                            object-fit:cover;">

                                <div>

                                    <div class="fw-semibold">
                                        <?php echo e($product->nama); ?>

                                    </div>

                                    <small class="text-muted">
                                        Rp <?php echo e(number_format($product->harga_jual, 0, ',', '.')); ?>

                                    </small>

                                </div>

                            </div>

                        </div>

                    </div>

                    
                    <div class="col-3">

                        <input type="number"
                               name="quantity"
                               value="1"
                               min="1"
                               class="form-control">

                    </div>

                    
                    <div class="col-2">

                        <button type="submit"
                                class="btn btn-primary w-100">
                            +
                        </button>

                    </div>

                </form>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

        </div>

    </div>


    
    
    
    <div class="col-md-6">

        <div class="card">

            
            <table class="table table-bordered mb-0">

                <thead>

                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>

                </thead>

                <tbody>

                <?php $__empty_1 = true; $__currentLoopData = $sale->itemPenjualan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                <tr>

                    
                    <td>
                        <?php echo e($item->produk->nama); ?>

                    </td>

                    
                    <td>
                        Rp <?php echo e(number_format($item->produk->harga_jual, 0, ',', '.')); ?>

                    </td>

                    
                    <td>

                        <form method="POST"
                              action="<?php echo e(route('itempenjualan.update', $item->id)); ?>">

                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>

                            <input type="number"
                                   name="quantity"
                                   value="<?php echo e($item->kuantitas); ?>"
                                   min="1"
                                   class="form-control form-control-sm"
                                   onchange="this.form.submit()">

                        </form>

                    </td>

                    
                    <td>
                        Rp <?php echo e(number_format($item->subtotal, 0, ',', '.')); ?>

                    </td>

                    
                    <td>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $item)): ?>

                        <form method="POST"
                              action="<?php echo e(route('itempenjualan.destroy', $item->id)); ?>">

                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>

                            <button type="submit"
                                    class="btn btn-danger btn-sm">
                                Hapus
                            </button>

                        </form>

                        <?php endif; ?>

                    </td>

                </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <tr>

                    <td colspan="5"
                        class="text-center">

                        Keranjang Kosong

                    </td>

                </tr>

                <?php endif; ?>

                </tbody>

            </table>


            
            
            
            <div class="card-footer">

                
                <div class="mb-3">

                    <span class="text-muted">
                        Total Belanja
                    </span>

                    <h5 class="fw-bold mb-0">

                        Rp <?php echo e(number_format($sale->total_pembayaran, 0, ',', '.')); ?>


                    </h5>

                </div>


                
                
                

                <form method="POST"
                      action="<?php echo e(route('penjualan.update', $sale->id)); ?>"
                      id="checkout-form"
                      onsubmit="return confirmCheckout()">

                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>


                    
                    
                    

                    <label for="discount_percent"
                           class="form-label fw-bold">

                        Diskon

                    </label>

                    <select name="discount_percent"
                            id="discount_percent"
                            class="form-select mb-3">

                        <option value="0">
                            Tanpa Diskon
                        </option>

                        <option value="5">
                            Diskon 5%
                        </option>

                        <option value="10">
                            Diskon 10%
                        </option>

                    </select>


                    
                    <div class="alert alert-warning mb-2">

                        <div class="d-flex justify-content-between">

                            <span>
                                Diskon
                            </span>

                            <strong id="discount-amount">
                                Rp 0
                            </strong>

                        </div>

                    </div>


                    
                    <div class="alert alert-primary">

                        <div class="d-flex justify-content-between align-items-center">

                            <span class="fw-bold">
                                Total Bayar
                            </span>

                            <strong id="final-total"
                                    class="fs-4">

                                Rp <?php echo e(number_format($sale->total_pembayaran, 0, ',', '.')); ?>


                            </strong>

                        </div>

                    </div>


                    
                    <input type="hidden"
                           name="discount_amount"
                           id="discount_amount"
                           value="0">


                    
                    
                    

                    <label for="payment_method"
                           class="form-label fw-bold">

                        Metode Pembayaran

                    </label>

                    <select name="payment_method"
                            id="payment_method"
                            class="form-select mb-3"
                            required>

                        <option value="">
                            Pilih Pembayaran
                        </option>

                        <option value="CASH">
                            Cash
                        </option>

                        <option value="QRIS">
                            QRIS
                        </option>

                    </select>


                    
                    
                    

                    <div id="cash-payment"
                         style="display:none;">

                        <label for="uang_dibayar"
                               class="form-label fw-bold">

                            Uang Dibayar

                        </label>

                        <input type="number"
                               name="uang_dibayar"
                               id="uang_dibayar"
                               class="form-control mb-2"
                               placeholder="Masukkan uang dibayar"
                               min="0"
                               step="1">


                        
                        <div class="alert alert-success">

                            <div class="fw-bold">
                                Kembalian
                            </div>

                            <div id="kembalian"
                                 class="fs-5">

                                Rp 0

                            </div>

                        </div>


                        
                        <div id="uang-kurang"
                             class="alert alert-danger"
                             style="display:none;">

                        </div>

                    </div>


                    
                    
                    

                    <button type="submit"
                            id="checkout-button"
                            class="btn btn-success w-100">

                        Checkout

                    </button>

                </form>


                
                
                

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $sale)): ?>

                <form method="POST"
                      action="<?php echo e(route('penjualan.destroy', $sale->id)); ?>"
                      onsubmit="return confirm('Yakin ingin membatalkan transaksi?')">

                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>

                    <button type="submit"
                            class="btn btn-outline-danger w-100 mt-2">

                        Batal Transaksi

                    </button>

                </form>

                <?php endif; ?>


                
                
                

                <div class="mt-4">

                    <a href="<?php echo e(url('/penjualan')); ?>"
                       class="btn btn-primary fw-bold">

                        ← Kembali

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>






<script>

document.addEventListener('DOMContentLoaded', function () {

    const discountPercent =
        document.getElementById('discount_percent');

    const discountAmount =
        document.getElementById('discount-amount');

    const discountAmountInput =
        document.getElementById('discount_amount');

    const finalTotal =
        document.getElementById('final-total');

    const paymentMethod =
        document.getElementById('payment_method');

    const cashPayment =
        document.getElementById('cash-payment');

    const uangDibayar =
        document.getElementById('uang_dibayar');

    const kembalian =
        document.getElementById('kembalian');

    const uangKurang =
        document.getElementById('uang-kurang');

    const checkoutButton =
        document.getElementById('checkout-button');


    // =========================================================
    // TOTAL AWAL
    // =========================================================

    const totalAwal =
        <?php echo e((int) $sale->total_pembayaran); ?>;


    // =========================================================
    // FORMAT RUPIAH
    // =========================================================

    function formatRupiah(angka) {

        return 'Rp ' +
            Number(angka).toLocaleString('id-ID');

    }


    // =========================================================
    // HITUNG TOTAL SETELAH DISKON
    // =========================================================

    function hitungTotal() {

        const persen =
            Number(discountPercent.value) || 0;

        const diskon =
            Math.round(
                totalAwal * persen / 100
            );

        const totalAkhir =
            totalAwal - diskon;


        // Tampilkan diskon
        discountAmount.textContent =
            formatRupiah(diskon);


        // Tampilkan total
        finalTotal.textContent =
            formatRupiah(totalAkhir);


        // Simpan nilai diskon
        discountAmountInput.value =
            diskon;


        // Hitung kembali uang cash
        hitungKembalian();

    }


    // =========================================================
    // HITUNG KEMBALIAN
    // =========================================================

    function hitungKembalian() {

        const persen =
            Number(discountPercent.value) || 0;

        const diskon =
            Math.round(
                totalAwal * persen / 100
            );

        const totalAkhir =
            totalAwal - diskon;

        const dibayar =
            Number(uangDibayar.value) || 0;


        if (paymentMethod.value !== 'CASH') {

            return;

        }


        if (dibayar <= 0) {

            kembalian.textContent =
                'Rp 0';

            uangKurang.style.display =
                'none';

            checkoutButton.disabled =
                true;

            return;

        }


        // UANG KURANG
        if (dibayar < totalAkhir) {

            const kurang =
                totalAkhir - dibayar;

            kembalian.textContent =
                'Rp 0';

            uangKurang.textContent =
                'Uang masih kurang ' +
                formatRupiah(kurang);

            uangKurang.style.display =
                'block';

            checkoutButton.disabled =
                true;

            return;

        }


        // UANG CUKUP
        const hasil =
            dibayar - totalAkhir;

        kembalian.textContent =
            formatRupiah(hasil);

        uangKurang.style.display =
            'none';

        checkoutButton.disabled =
            false;

    }


    // =========================================================
    // SAAT DISKON BERUBAH
    // =========================================================

    discountPercent.addEventListener(
        'change',
        function () {

            hitungTotal();

        }
    );


    // =========================================================
    // SAAT PEMBAYARAN BERUBAH
    // =========================================================

    paymentMethod.addEventListener(
        'change',
        function () {

            if (this.value === 'CASH') {

                cashPayment.style.display =
                    'block';

                uangDibayar.required =
                    true;

                checkoutButton.disabled =
                    true;

                uangDibayar.focus();

                hitungKembalian();

            } else {

                cashPayment.style.display =
                    'none';

                uangDibayar.required =
                    false;

                uangDibayar.value =
                    '';

                kembalian.textContent =
                    'Rp 0';

                uangKurang.style.display =
                    'none';

                checkoutButton.disabled =
                    false;

            }

        }
    );


    // =========================================================
    // SAAT UANG DIBAYAR BERUBAH
    // =========================================================

    uangDibayar.addEventListener(
        'input',
        function () {

            hitungKembalian();

        }
    );


    // =========================================================
    // JALANKAN SAAT PERTAMA DIBUKA
    // =========================================================

    hitungTotal();

});


// =============================================================
// KONFIRMASI CHECKOUT
// =============================================================

function confirmCheckout() {

    const discountPercent =
        Number(
            document.getElementById('discount_percent').value
        ) || 0;


    const totalAwal =
        <?php echo e((int) $sale->total_pembayaran); ?>;


    const diskon =
        Math.round(
            totalAwal * discountPercent / 100
        );


    const totalAkhir =
        totalAwal - diskon;


    const paymentMethod =
        document.getElementById('payment_method').value;


    // METODE PEMBAYARAN BELUM DIPILIH
    if (!paymentMethod) {

        alert(
            'Silakan pilih metode pembayaran.'
        );

        return false;

    }


    // CASH
    if (paymentMethod === 'CASH') {

        const uangDibayar =
            Number(
                document.getElementById('uang_dibayar').value
            ) || 0;


        if (uangDibayar <= 0) {

            alert(
                'Silakan masukkan uang yang dibayar.'
            );

            return false;

        }


        if (uangDibayar < totalAkhir) {

            alert(
                'Uang yang dibayar masih kurang.\n\n' +
                'Total bayar: ' +
                formatRupiah(totalAkhir)
            );

            return false;

        }

    }


    // KONFIRMASI
    return confirm(

        'Konfirmasi Transaksi\n\n' +

        'Total belanja: ' +
        formatRupiah(totalAwal) +

        '\nDiskon ' +
        discountPercent +
        '%: ' +
        formatRupiah(diskon) +

        '\nTotal bayar: ' +
        formatRupiah(totalAkhir) +

        '\n\nLanjutkan checkout?'

    );

}


// =============================================================
// FORMAT RUPIAH
// =============================================================

function formatRupiah(angka) {

    return 'Rp ' +
        Number(angka).toLocaleString('id-ID');

}

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\pos_dezqiya\resources\views/penjualan/pos.blade.php ENDPATH**/ ?>