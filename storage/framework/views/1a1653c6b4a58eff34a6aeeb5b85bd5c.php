

<?php $__env->startSection('title', 'Penjualan'); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<?php if(session('errors')): ?>
<div class="alert alert-danger">
    <?php echo e(session('errors')); ?>

</div>
<?php endif; ?>

 <h1 class="fw-bold text-primary">
        <i class="bi bi-cart-check me-2"></i>
       Penjualan
    </h1>

<a href="<?php echo e(route('penjualan.create')); ?>" class="btn btn-primary mb-3">
    Create
</a>

<form action="<?php echo e(route('penjualan.index')); ?>" method="GET" class="mb-3">

    <div class="input-group">

        <input
            type="text"
            name="search"
            value="<?php echo e(request()->search); ?>"
            class="form-control"
            placeholder="Search penjualan">

        <button class="btn btn-sm btn-info text-white" type="submit">
            Search
        </button>

    </div>

</form>

<table class="table align-middle">

    <thead>

        <tr>

            <th scope="col">#</th>
            <th scope="col">Tanggal Transaksi</th>
            <th scope="col">Kasir</th>
            <th scope="col">Total Pembayaran</th>
            <th scope="col">Metode Pembayaran</th>
            <th scope="col">Status</th>
            <th scope="col">Aksi</th>

        </tr>

    </thead>

    <tbody>

        <?php $__empty_1 = true; $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

        <tr>

            <th scope="row">

                <?php echo e($loop->iteration); ?>


            </th>

            <td>

                <?php echo e($sale->created_at->translatedFormat('d F Y H:i:s')); ?>


            </td>

            <td>

                <?php echo e($sale->user->name); ?>


            </td>

            <td>

                Rp <?php echo e(number_format($sale->total_pembayaran)); ?>


            </td>

            <td>

                <?php echo e($sale->metode_pembayaran); ?>


            </td>

            <td>

                <?php echo e($sale->status); ?>


            </td>

            <td>

                <div class="d-flex gap-2 align-items-center">

                    <a href="<?php echo e(route('penjualan.show', $sale)); ?>"
                        class="btn btn-info text-white">
                        Detail
                    </a>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $sale)): ?>

                    <a href="<?php echo e(route('penjualan.edit', $sale)); ?>"
                        class="btn btn-info text-white">
                        Edit
                    </a>

                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $sale)): ?>

                    <form action="<?php echo e(route('penjualan.destroy', $sale)); ?>"
                        method="POST">

                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>

                        <button class="btn btn-primary fw-bold"
                            onclick="return confirm('Apakah anda yakin akan menghapus penjualan ini?')">
                            Hapus
                        </button>

                    </form>

                    <?php endif; ?>

                </div>

            </td>

        </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

        <tr>

            <td colspan="7">

                Data Tidak Ditemukan

            </td>

        </tr>

        <?php endif; ?>

    </tbody>

</table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\pos_dezqiyaa\resources\views/penjualan/index.blade.php ENDPATH**/ ?>