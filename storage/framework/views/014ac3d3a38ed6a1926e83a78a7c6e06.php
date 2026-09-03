

<?php $__env->startSection('title', 'Detail Produk'); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<h2>Detail Produk</h2>

<div class="card">
    <div class="card-body">

        
        <?php if($produk->foto): ?>
            <img
                src="<?php echo e(asset('storage/' . $produk->foto)); ?>"
                width="200"
                class="img-thumbnail mb-3"
                alt="<?php echo e($produk->nama); ?>"
            >
        <?php else: ?>
            <p class="text-muted">
                Tidak ada foto
            </p>
        <?php endif; ?>


        <table class="table table-bordered">

            
            <tr>
                <th width="200">ID</th>
                <td>
                    <?php echo e($produk->id); ?>

                </td>
            </tr>





            
            <tr>
                <th>Nama</th>
                <td>
                    <?php echo e($produk->nama); ?>

                </td>
            </tr>


          
<tr>
    <th>Jenis</th>
    <td>
        <?php echo e($produk->jenisProduk?->nama ?? '-'); ?>

    </td>
</tr>


            
            <tr>
                <th>Harga Beli</th>
                <td>
                    Rp <?php echo e(number_format($produk->harga_beli, 0, ',', '.')); ?>

                </td>
            </tr>


            
            <tr>
                <th>Harga Jual</th>
                <td>
                    Rp <?php echo e(number_format($produk->harga_jual, 0, ',', '.')); ?>

                </td>
            </tr>


            
            <tr>
                <th>Stok</th>
                <td>
                    <?php echo e($produk->stok); ?>

                </td>
            </tr>


            
            <tr>
                <th>Dibuat</th>
                <td>
                    <?php echo e($produk->created_at?->format('d-m-Y H:i:s')); ?>

                </td>
            </tr>


            
            <tr>
                <th>Diupdate</th>
                <td>
                    <?php echo e($produk->updated_at?->format('d-m-Y H:i:s')); ?>

                </td>
            </tr>

        </table>


        <div class="mt-3">

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $produk)): ?>

                <a
                    href="<?php echo e(route('produk.edit', $produk)); ?>"
                    class="btn btn-info text-white"
                >
                    Edit
                </a>

            <?php endif; ?>

            <a
                href="<?php echo e(route('produk.index')); ?>"
                class="btn btn-secondary"
            >
                Kembali
            </a>

        </div>

    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\pos_dezqiyaa\resources\views/produk/show.blade.php ENDPATH**/ ?>