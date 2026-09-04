<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Struk #<?php echo e($penjualan->id); ?></title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 20px;
            background: #eeeeee;
            font-family: "Courier New", Courier, monospace;
            color: #000;
        }

        .struk {
            width: 80mm;
            margin: 0 auto;
            padding: 12px;
            background: white;
        }

        .center {
            text-align: center;
        }

        .header h2 {
            margin: 0;
            font-size: 20px;
        }

        .header p {
            margin: 3px 0;
            font-size: 12px;
        }

        .garis {
            border-top: 1px dashed #000;
            margin: 10px 0;
        }

        .info {
            font-size: 12px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            gap: 8px;
            margin-bottom: 4px;
        }

        .produk {
            font-size: 12px;
        }

        .produk-item {
            margin-bottom: 9px;
        }

        .produk-nama {
            font-weight: bold;
            margin-bottom: 3px;
            word-break: break-word;
        }

        .produk-detail {
            display: flex;
            justify-content: space-between;
            gap: 5px;
        }

        .total {
            font-size: 13px;
            font-weight: bold;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            margin-top: 15px;
        }

        .tombol {
            width: 80mm;
            margin: 10px auto;
            display: block;
            padding: 10px;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            font-size: 14px;
        }

        .print {
            background: #0d6efd;
        }

        .close {
            background: #6c757d;
        }

        @media print {

            body {
                padding: 0;
                background: white;
            }

            .struk {
                width: 80mm;
                padding: 5px;
            }

            .tombol {
                display: none;
            }
        }
    </style>
</head>

<body>

    <div class="struk">

        
        <div class="header center">

            <h2>DailyMart⭐</h2>

            <p>STRUK PENJUALAN</p>

        </div>


        <div class="garis"></div>


        
        <div class="info">

            <div class="info-row">
                <span>No. Transaksi</span>

                <span>
                    #<?php echo e($penjualan->id); ?>

                </span>
            </div>


            <div class="info-row">
                <span>Tanggal</span>

                <span>
                    <?php echo e($penjualan->created_at->format('d/m/Y H:i')); ?>

                </span>
            </div>


            <div class="info-row">
                <span>Kasir</span>

                <span>
                    <?php echo e($penjualan->user->name ?? '-'); ?>

                </span>
            </div>


            <div class="info-row">
                <span>Metode</span>

                <span>
                    <?php echo e($penjualan->metode_pembayaran ?? '-'); ?>

                </span>
            </div>

        </div>


        <div class="garis"></div>


        
        <div class="produk">

            <?php $__empty_1 = true; $__currentLoopData = $penjualan->itemPenjualan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                <div class="produk-item">

                    <div class="produk-nama">
                        <?php echo e($item->produk->nama ?? '-'); ?>

                    </div>


                    <div class="produk-detail">

                        <span>
                            <?php echo e($item->kuantitas); ?> x
                            Rp
                            <?php echo e(number_format(
                                $item->kuantitas > 0
                                    ? $item->subtotal / $item->kuantitas
                                    : 0,
                                0,
                                ',',
                                '.'
                            )); ?>

                        </span>


                        <span>
                            Rp
                            <?php echo e(number_format(
                                $item->subtotal,
                                0,
                                ',',
                                '.'
                            )); ?>

                        </span>

                    </div>

                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <div class="center">
                    Tidak ada produk
                </div>

            <?php endif; ?>

        </div>


        <div class="garis"></div>


        
        <div class="total">

            <div class="info-row">

                <span>TOTAL</span>

                <span>
                    Rp
                    <?php echo e(number_format(
                        $penjualan->total_pembayaran,
                        0,
                        ',',
                        '.'
                    )); ?>

                </span>

            </div>

        </div>


        <div class="garis"></div>


        
        <div class="footer">

            <p>Terima Kasih</p>

            <p>Selamat berbelanja kembali</p>

        </div>

    </div>


    
    <button
        type="button"
        class="tombol print"
        onclick="window.print()">

        🖨 Cetak Struk

    </button>


    
    <button
        type="button"
        class="tombol close"
        onclick="window.close()">

        Tutup

    </button>

</body>

</html>
<?php /**PATH C:\laragon\www\pos_dezqiya\resources\views/penjualan/struk.blade.php ENDPATH**/ ?>