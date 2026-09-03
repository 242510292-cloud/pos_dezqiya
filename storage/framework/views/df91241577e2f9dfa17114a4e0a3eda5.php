

<?php $__env->startSection('title', 'Detail Penjualan'); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<h1>Detail Penjualan</h1>

<div class="card">
    <div class="card-body">

        <table class="table">

            <tr>
                <th>Tanggal Transaksi</th>
                <td>
                    <?php echo e($penjualan->created_at->translatedFormat('d F Y H:i:s')); ?>

                </td>
            </tr>

            <tr>
                <th>Kasir</th>
                <td>
                    <?php echo e($penjualan->user->name); ?>

                </td>
            </tr>

            <tr>
                <th>Total Pembayaran</th>
                <td>
                    Rp <?php echo e(number_format($penjualan->total_pembayaran)); ?>

                </td>
            </tr>

            <tr>
                <th>Metode Pembayaran</th>
                <td>
                    <?php echo e($penjualan->metode_pembayaran); ?>

                </td>
            </tr>

            <tr>
                <th>Status</th>
                <td>
                    <?php echo e($penjualan->status); ?>

                </td>
            </tr>

        </table>


        <h4>Daftar Produk</h4>

        <table class="table table-bordered">

            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                </tr>
            </thead>


            <tbody>

            <?php $__currentLoopData = $penjualan->itemPenjualan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <tr>

                    <td>
                        <?php echo e($item->produk->nama); ?>

                    </td>

                    <td>
                        <?php echo e($item->kuantitas); ?>

                    </td>

                    <td>
                        Rp <?php echo e(number_format($item->harga)); ?>

                    </td>

                    <td>
                        Rp <?php echo e(number_format($item->subtotal)); ?>

                    </td>

                </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>

        </table>


        <a href="<?php echo e(route('penjualan.index')); ?>" 
           class="btn btn-secondary">
            Kembali
        </a>

    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\pos_dezqiyaa\resources\views/penjualan/show.blade.php ENDPATH**/ ?>