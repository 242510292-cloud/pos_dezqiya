

<?php $__env->startSection('content'); ?>

<div class="container py-5">

    <div class="text-center mb-5">
        <h1 class="fw-bold text-primary">
            Tentang Aplikasi POS
        </h1>

        <p class="text-muted">
            Sistem Point of Sale untuk membantu mengelola bisnis
            dengan lebih mudah dan terorganisir.
        </p>
    </div>

    <div class="card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-body p-5">

            <h3 class="fw-bold text-primary mb-3">
                <i class="bi bi-shop me-2"></i>
                Apa itu POS?
            </h3>

            <p class="text-muted">
                POS atau <strong>Point of Sale</strong> merupakan aplikasi
                yang digunakan untuk membantu proses transaksi penjualan,
                pengelolaan produk, stok, dan data penjualan.
            </p>

            <p class="text-muted mb-0">
                Dengan aplikasi ini, proses pengelolaan penjualan menjadi
                lebih cepat, mudah, dan terorganisir.
            </p>

        </div>
    </div>

    <div class="row g-4">

        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body text-center p-4">

                    <i class="bi bi-box-seam text-primary"
                       style="font-size: 45px;"></i>

                    <h5 class="fw-bold mt-3">
                        Manajemen Produk
                    </h5>

                    <p class="text-muted">
                        Mengelola data produk dan informasi harga
                        dengan mudah.
                    </p>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body text-center p-4">

                    <i class="bi bi-cart-check text-primary"
                       style="font-size: 45px;"></i>

                    <h5 class="fw-bold mt-3">
                        Transaksi Penjualan
                    </h5>

                    <p class="text-muted">
                        Membantu mencatat dan mengelola transaksi
                        penjualan.
                    </p>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body text-center p-4">

                    <i class="bi bi-bar-chart-line text-primary"
                       style="font-size: 45px;"></i>

                    <h5 class="fw-bold mt-3">
                        Laporan Penjualan
                    </h5>

                    <p class="text-muted">
                        Memudahkan dalam melihat dan memantau
                        hasil penjualan.
                    </p>

                </div>
            </div>
        </div>

    </div>

    <div class="text-center mt-5">
        <p class="text-muted">
            <i class="bi bi-info-circle me-1"></i>
            Aplikasi POS &copy; <?php echo e(date('Y')); ?>

        </p>
    </div>

</div>

  

    <div class="mt-4">

        <a href="<?php echo e(url('/dashboard')); ?>"
           class="btn btn-primary fw-bold">

            ← Kembali

        </a>

    </div>


</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\pos_dezqiya\resources\views/info.blade.php ENDPATH**/ ?>