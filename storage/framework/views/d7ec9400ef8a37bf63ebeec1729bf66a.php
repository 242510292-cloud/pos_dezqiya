


<?php $__env->startSection('content'); ?>


<div class="container mt-5">


    <div class="text-center mb-4">

        <h2 class="fw-bold text-primary">
            <i class="bi bi-person-vcard me-2"></i>
            identitas diri
        </h2>

        <p class="text-muted">
            Biodata Pengembang Aplikasi POS
        </p>

    </div>


    <div class="card shadow-lg border-0">


        <div class="card-body">


            <div class="row">


                <div class="col-md-4 text-center">


                    <img src="<?php echo e(asset('images/foto.jpg')); ?>"
                         class="img-thumbnail rounded-circle"
                         width="200"
                         alt="Foto Saya">


                </div>


                <div class="col-md-8">


                    <table class="table">


                        <tr>
                            <th width="200">Nama :</th>
                            <td>DEZQIYA NUR ANNISA</td>
                        </tr>


                        <tr>
                            <th>NIM :</th>
                            <td>242510292</td>
                        </tr>


                        <tr>
                            <th>Kelas :</th>
                            <td>XII PPLG 4</td>
                        </tr>


                        <tr>
                            <th>Program Studi :</th>
                            <td>Pengembangan Perangkat Lunak dan Gim</td>
                        </tr>


                        <tr>
                            <th>Universitas :</th>
                            <td>SMKN 4 TASIKMALAYA</td>
                        </tr>


                       <tr>
                       <th>Email :</th>
                            <td><?php echo e(auth()->user()->email); ?></td>
                        </tr>


                        <tr>
                            <th>No. HP :</th>
                            <td>0856-2444-8838</td>
                        </tr>


                        <tr>
                            <th>Alamat :</th>
                            <td>jln.bebedahan1,kp.sukasirna.</td>
                        </tr>


                        <tr>
                            <th>Tentang :</th>

                            <td>
                                Saya merupakan mahasiswa Program Studi Sistem Informasi
                                yang sedang mengembangkan aplikasi POS Inventory System
                                menggunakan Laravel sebagai tugas pelajar.
                            </td>

                      </tr>


                    </table>


                </div>

              
    <div class="col-12 mt-3">

        <table class="table w-100">

            <tr>
                <th style="width: 200px;">
                    Tentang aplikasi :
                </th>

                <td style="text-align: justify; line-height: 1.7;">

                    Aplikasi POS (Point of Sale) adalah sistem kasir
                    berbasis web yang digunakan untuk mengelola produk,
                    stok, pengguna, dan transaksi penjualan.

                    Pada halaman Dashboard, pengguna dapat melihat
                    ringkasan penjualan harian, jumlah transaksi,
                    total pembayaran tunai dan non-tunai, serta
                    kondisi stok produk.

                    Menu Users digunakan untuk mengelola pengguna,
                    Jenis Produk untuk mengatur kategori, dan Produk
                    untuk mengelola data serta stok barang.

                    Menu <strong>Penjualan</strong> digunakan untuk
                    memilih produk, menentukan jumlah barang,
                    menghitung subtotal dan total pembayaran,
                    memilih metode pembayaran Cash atau QRIS,
                    serta melakukan checkout.

                    Untuk pembayaran Cash, sistem dapat menghitung
                    uang yang dibayar dan kembalian secara otomatis.

                    Aplikasi juga menyediakan fitur Detail, Edit,
                    Hapus/Batal Transaksi, Profile, dan Logout
                    sehingga proses pengelolaan penjualan menjadi
                    lebih mudah, cepat, dan terorganisir.

                </td>
            </tr>

        </table>

    </div>

</div>

            </div>


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
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\pos_dezqiya\resources\views/tentang.blade.php ENDPATH**/ ?>