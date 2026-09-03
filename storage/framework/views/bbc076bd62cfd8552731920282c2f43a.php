

<?php $__env->startSection('title', 'Manajemen User'); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold text-primary">
            <i class="bi bi-people me-2"></i>
            Manajemen User
        </h2>

        <a href="<?php echo e(route('admin.users.create')); ?>"
           class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i>
            Tambah User
        </a>
    </div>

    
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    
    <form action="<?php echo e(route('admin.users')); ?>"
          method="GET"
          class="mb-3">

        <div class="input-group">

            <input
                type="text"
                name="search"
                value="<?php echo e(request('search')); ?>"
                class="form-control"
                placeholder="Cari nama atau email">

            <button
                type="submit"
                class="btn btn-info text-white">
                <i class="bi bi-search"></i>
                Search
            </button>

        </div>

    </form>

    
    <div class="table-responsive">

        <table class="table table-bordered table-hover align-middle">

            <thead class="table-primary">

                <tr>
                    <th width="60">#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th width="220">Aksi</th>
                </tr>

            </thead>

            <tbody>

                <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr>

                        <td>
                            <?php echo e($users->firstItem() + $loop->index); ?>

                        </td>

                        <td>
                            <?php echo e($user->name); ?>

                        </td>

                        <td>
                            <?php echo e($user->email); ?>

                        </td>

                        <td>

                            <?php if($user->role): ?>

                                <?php if($user->role->code === 'ADM'): ?>

                                    <span class="">
                                        <?php echo e($user->role->name); ?>

                                    </span>

                                <?php else: ?>

                                    <span class="">
                                        <?php echo e($user->role->name); ?>

                                    </span>

                                <?php endif; ?>

                            <?php else: ?>

                                <span class="badge bg-secondary">
                                    Tidak ada role
                                </span>

                            <?php endif; ?>

                        </td>

                        <td>

                            <div class="d-flex gap-1">

                                
                                <a href="<?php echo e(route('admin.users.edit', $user)); ?>"
                                   class="btn btn-info text-white">

                                    <i class="bi bi-pencil"></i>
                                    Edit

                                </a>

                                
                                <?php if(auth()->id() !== $user->id): ?>

                                    <form
                                        action="<?php echo e(route('admin.users.destroy', $user)); ?>"
                                        method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?')">

                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>

                                        <button
                                            type="submit"
                                            class="btn btn-info text-white">

                                            <i class="bi bi-trash"></i>
                                            Hapus

                                        </button>

                                    </form>

                                <?php endif; ?>

                            </div>

                        </td>

                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <tr>

                        <td colspan="5"
                            class="text-center py-4">

                            <h5 class="text-muted">
                                Data user tidak tersedia.
                            </h5>

                        </td>

                    </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>

    
    <div class="mt-3">

        <?php echo e($users->links()); ?>


    </div>

</div>

 


</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\pos_dezqiyaa\resources\views/admin/users/index.blade.php ENDPATH**/ ?>