<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemPenjualanController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JenisProdukController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\InfoController;




// =========================================================
// ROUTE UNTUK USER YANG BELUM LOGIN
// =========================================================

Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'index'])
        ->name('login');

    Route::post('/auth', [AuthController::class, 'login'])
        ->name('auth');
});


// =========================================================
// ROUTE UNTUK USER YANG SUDAH LOGIN
// =========================================================

Route::middleware('auth')->group(function () {

    // =====================================================
    // DASHBOARD
    // =====================================================

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');


    // =====================================================
    // LOGOUT
    // =====================================================

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');


    // =====================================================
    // USERS
    // KHUSUS ADMIN
    // =====================================================

    Route::middleware('role:admin')
        ->prefix('admin')
        ->name('admin.')
        ->group(function () {

            // daftar users
            Route::get('/users', [UserController::class, 'index'])
                ->name('users');

            // form tambah user
            Route::get('/users/create', [UserController::class, 'create'])
                ->name('users.create');

            // simpan user
            Route::post('/users/store', [UserController::class, 'store'])
                ->name('users.store');

            // form edit user
            Route::get('/users/edit/{user}', [UserController::class, 'edit'])
                ->name('users.edit');

            // update user
            Route::put('/users/update/{user}', [UserController::class, 'update'])
                ->name('users.update');

            // hapus user
            Route::delete('/users/destroy/{user}', [UserController::class, 'destroy'])
                ->name('users.destroy');
        });


    // =====================================================
    // ADMIN + KASIR
    // =====================================================

    Route::middleware('role:admin,kasir')->group(function () {


        // =================================================
        // PRODUK
        // =================================================

        Route::resource('/produk', ProdukController::class);


        // =================================================
        // PENJUALAN
        // =================================================

        Route::resource('/penjualan', PenjualanController::class);


        // =================================================
        // KONFIRMASI PEMBAYARAN QRIS
        // =================================================

        Route::post(
            '/penjualan/{penjualan}/confirm-qris',
            [PenjualanController::class, 'confirmQris']
        )->name('penjualan.confirm-qris');


        // =================================================
        // CETAK STRUK
        // =================================================

        Route::get(
            '/penjualan/{penjualan}/struk',
            [PenjualanController::class, 'struk']
        )->name('penjualan.struk');


        // =================================================
        // ITEM PENJUALAN
        // =================================================

        Route::resource(
            '/itempenjualan',
            ItemPenjualanController::class
        );


        // =================================================
        // TENTANG
        // =================================================

        Route::get(
            '/tentang',
            [TentangController::class, 'index']
        )->name('tentang');


        // =================================================
        // JENIS PRODUK
        // ADMIN + KASIR
        // HANYA BISA MELIHAT
        // =================================================

        Route::get(
            '/jenis-produk',
            [JenisProdukController::class, 'index']
        )->name('jenis-produk.index');
    });


    // =====================================================
    // JENIS PRODUK
    // KHUSUS ADMIN
    // =====================================================

    Route::middleware('role:admin')->group(function () {


        // =================================================
        // TAMBAH JENIS PRODUK
        // =================================================

        Route::get(
            '/jenis-produk/create',
            [JenisProdukController::class, 'create']
        )->name('jenis-produk.create');


        // =================================================
        // SIMPAN JENIS PRODUK
        // =================================================

        Route::post(
            '/jenis-produk',
            [JenisProdukController::class, 'store']
        )->name('jenis-produk.store');


        // =================================================
        // FORM EDIT JENIS PRODUK
        // =================================================

        Route::get(
            '/jenis-produk/{jenisProduk}/edit',
            [JenisProdukController::class, 'edit']
        )->name('jenis-produk.edit');


        // =================================================
        // UPDATE JENIS PRODUK
        // =================================================

        Route::put(
            '/jenis-produk/{jenisProduk}',
            [JenisProdukController::class, 'update']
        )->name('jenis-produk.update');


        // =================================================
        // HAPUS JENIS PRODUK
        // =================================================

        Route::delete(
            '/jenis-produk/{jenisProduk}',
            [JenisProdukController::class, 'destroy']
        )->name('jenis-produk.destroy');

 Route::get(
            '/info',
            [InfoController::class, 'index']
        )->name('info');

    });

});
