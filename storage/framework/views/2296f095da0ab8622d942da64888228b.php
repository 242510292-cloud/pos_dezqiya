

<?php $__env->startSection('title', 'Detail Penjualan'); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>


<style>
    .total-pembayaran {
        margin-top: 15px;
        margin-bottom: 15px;
        padding: 15px 20px;
        background: linear-gradient(135deg, #e8f7ff, #d5f1ff);
        border: 2px solid #0d9fe8;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(13, 159, 232, 0.20);

        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .total-label {
        display: inline-block;
        background: #0077b6;
        color: white;
        padding: 8px 14px;
        border-radius: 8px;
        font-size: 16px;
        font-weight: 800;
    }

    .total-nominal {
        font-size: 26px;
        font-weight: 900;
        color: #0077b6;
    }
</style>

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


        
        <div class="total-pembayaran">

            <div class="total-label">
                TOTAL PEMBAYARAN
            </div>

            <div class="total-nominal">
                Rp <?php echo e(number_format($penjualan->total_pembayaran)); ?>

            </div>

        </div>


        <a href="<?php echo e(route('penjualan.index')); ?>"
           class="btn btn-secondary">
            Kembali
        </a>

        <a href="<?php echo e(route('penjualan.struk', $penjualan)); ?>"
           target="_blank"
           class="btn btn-primary">
            🖨 Cetak Struk
        </a>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\pos_dezqiya\resources\views/penjualan/show.blade.php ENDPATH**/ ?>