

<?php $__env->startSection('title', 'Produk'); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<h1 class="fw-bold text-primary">
    <i class="bi bi-box-seam me-2"></i>
    Produk
</h1>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\Models\Produk::class)): ?>
    <a href="<?php echo e(route('produk.create')); ?>" class="btn btn-primary mb-3">
        Create
    </a>
<?php endif; ?>

<form action="<?php echo e(route('produk.index')); ?>" method="GET" class="mb-3">
    <div class="input-group">
        <input
            type="text"
            name="search"
            value="<?php echo e(request()->search); ?>"
            class="form-control"
            placeholder="Search nama produk">

        <button class="btn btn-sm btn-info text-white" type="submit">
            Search
        </button>
    </div>
</form>

<table class="table align-middle">

    <thead>
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>Jenis</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>

        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

            <tr>

                <th>
                    <?php echo e($products->firstItem() + $loop->index); ?>

                </th>

                <td>
                    <?php if($product->foto): ?>
                        <img
                            src="<?php echo e(asset('storage/' . $product->foto)); ?>"
                            width="100"
                            height="100"
                            class="img-thumbnail"
                            style="object-fit: cover">
                    <?php else: ?>
                        <span class="text-muted">
                            Tidak ada foto
                        </span>
                    <?php endif; ?>
                </td>

                <td>
                    <?php echo e($product->nama); ?>

                </td>

                
                <td>
                    <?php echo e($product->jenisProduk->nama ?? '-'); ?>

                </td>

                <td>
                    Rp <?php echo e(number_format($product->harga_beli, 0, ',', '.')); ?>

                </td>

                <td>
                    Rp <?php echo e(number_format($product->harga_jual, 0, ',', '.')); ?>

                </td>

                <td>
                    <?php echo e($product->stok); ?>

                </td>

                <td>

                    <div class="d-flex gap-1">

                        <a
                            href="<?php echo e(route('produk.show', $product)); ?>"
                            class="btn btn-info text-white">
                            Detail
                        </a>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $product)): ?>

                            <a
                                href="<?php echo e(route('produk.edit', $product)); ?>"
                                class="btn btn-info text-white">
                                Edit
                            </a>

                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $product)): ?>

                            <form
                                action="<?php echo e(route('produk.destroy', $product)); ?>"
                                method="POST"
                                class="d-inline">

                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>

                                <button
                                    type="submit"
                                    class="btn btn-primary fw-bold"
                                    onclick="return confirm('Apakah anda yakin akan menghapus produk ini?')">
                                    Hapus
                                </button>

                            </form>

                        <?php endif; ?>

                    </div>

                </td>

            </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

            <tr>

                <td colspan="8" class="text-center">

                    <h4 class="py-3">
                        Data tidak tersedia.
                    </h4>

                </td>

            </tr>

        <?php endif; ?>

    </tbody>

</table>


<div class="d-flex justify-content-end">
    <?php echo e($products->links()); ?>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\pos_dezqiyaa\resources\views/produk/index.blade.php ENDPATH**/ ?>