

<?php $__env->startSection('title', 'Jenis Produk'); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h1 class="fw-bold text-primary">
                <i class="bi bi-tags me-2"></i>
                Jenis Produk
            </h1>

            <p class="text-muted mb-0">
                Kelola jenis produk pada aplikasi POS.
            </p>
        </div>

        
        <?php if(auth()->user()->role_id == 1): ?>
            <a href="<?php echo e(route('jenis-produk.create')); ?>"
               class="btn btn-info text-white fw-bold">
                + Tambah Jenis Produk
            </a>
        <?php endif; ?>

    </div>

    
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    
    <div class="card shadow-sm border-0">

        <div class="card-header bg-info text-white">
            <strong>Daftar Jenis Produk</strong>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-striped align-middle mb-0">

                    <thead class="table-primary">
                        <tr>

                            
                            <th width="70" class="text-center">
                                No
                            </th>

                            
                            <th width="180" class="text-center">
                                Diinput Oleh
                            </th>

                            
                            <th class="text-center">
                                Nama Jenis Produk
                            </th>

                            
                            <?php if(auth()->user()->role_id == 1): ?>
                                <th width="180" class="text-center">
                                    Aksi
                                </th>
                            <?php endif; ?>

                        </tr>
                    </thead>

                    <tbody>

                        <?php $__empty_1 = true; $__currentLoopData = $jenisProduks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jenis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                            <tr>

                                
                                <td class="text-center">
                                    <?php echo e($loop->iteration); ?>

                                </td>

                                
                                <td class="text-center">

                                    <?php if($jenis->user): ?>

                                        <strong>
                                            <?php echo e($jenis->user->name); ?>

                                        </strong>

                                    <?php else: ?>

                                        <span class="text-muted">
                                            Data lama
                                        </span>

                                    <?php endif; ?>

                                </td>

                                
                                <td>

                                    <strong>
                                        <?php echo e($jenis->nama); ?>

                                    </strong>

                                </td>

                                
                                <?php if(auth()->user()->role_id == 1): ?>

                                    <td class="text-center">

                                        <a href="<?php echo e(route('jenis-produk.edit', $jenis->id)); ?>"
                                           class="btn btn-sm btn-info text-white fw-bold">
                                            Edit
                                        </a>

                                        <form action="<?php echo e(route('jenis-produk.destroy', $jenis->id)); ?>"
                                              method="POST"
                                              class="d-inline">

                                            <?php echo csrf_field(); ?>

                                            <?php echo method_field('DELETE'); ?>

                                            <button type="submit"
                                                    class="btn btn-sm btn-primary fw-bold"
                                                    onclick="return confirm('Yakin ingin menghapus jenis produk ini?')">
                                                Hapus
                                            </button>

                                        </form>

                                    </td>

                                <?php endif; ?>

                            </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                            <tr>

                                <td colspan="<?php echo e(auth()->user()->role_id == 1 ? 4 : 3); ?>"
                                    class="text-center text-muted py-4">

                                    Belum ada jenis produk.

                                </td>

                            </tr>

                        <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\pos_dezqiya\resources\views/jenis_produk/index.blade.php ENDPATH**/ ?>