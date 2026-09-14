<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Pembayaran QRIS</title>

    <script src="https://cdn.jsdelivr.net/npm/qrcodejs@1.0.0/qrcode.min.js"></script>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #eef8ff;

            font-family: Arial, sans-serif;
        }

        .qris-card {
            width: 450px;
            max-width: 95%;

            padding: 35px;

            background: #ffffff;

            border-radius: 20px;

            text-align: center;

            box-shadow: 0 10px 35px rgba(0, 0, 0, 0.12);
        }

        .logo {
            color: #087dc1;

            font-size: 22px;

            font-weight: bold;
        }

        .title {
            margin-top: 5px;

            font-size: 28px;

            font-weight: bold;
        }

        .transaction {
            color: #777;

            font-size: 14px;

            margin-bottom: 20px;
        }

        .total-label {
            color: #777;

            font-size: 14px;
        }

        .total {
            color: #087dc1;

            font-size: 30px;

            font-weight: bold;

            margin-bottom: 20px;
        }

        #qrcode {
            width: fit-content;

            margin: 0 auto 20px;

            padding: 15px;

            background: #ffffff;

            border: 1px solid #ddd;

            border-radius: 15px;
        }

        #qrcode img {
            display: block;
        }

        .instruction {
            color: #666;

            font-size: 14px;

            line-height: 1.6;

            margin-bottom: 25px;
        }

        .btn-confirm {
            width: 100%;

            padding: 14px;

            border: none;

            border-radius: 10px;

            background: #198754;

            color: white;

            font-size: 16px;

            font-weight: bold;

            cursor: pointer;
        }

        .btn-confirm:hover {
            background: #157347;
        }

        .btn-back {
            display: block;

            width: 100%;

            margin-top: 10px;

            padding: 12px;

            border: 1px solid #ccc;

            border-radius: 10px;

            color: #555;

            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="qris-card">

    <div class="logo">
       DailyMart
    </div>

    <div class="title">
        Pembayaran QRIS
    </div>

    <div class="transaction">
        Transaksi #<?php echo e($penjualan->id); ?>

    </div>

    <div class="total-label">
        Total Pembayaran
    </div>

    <div class="total">
        Rp <?php echo e(number_format($total, 0, ',', '.')); ?>

    </div>

    
    <div id="qrcode"></div>

    <div class="instruction">

        Silakan scan QR Code menggunakan
        aplikasi pembayaran Anda.

        <br>

        Pastikan nominal pembayaran sesuai.

    </div>

    
    <form
        action="<?php echo e(route('penjualan.confirm-qris', $penjualan->id)); ?>"
        method="POST"
    >

        <?php echo csrf_field(); ?>

        <button
            type="submit"
            class="btn-confirm"
        >
            ✓ Pembayaran Sudah Dilakukan
        </button>

    </form>

    
    <a
        href="<?php echo e(route('penjualan.edit', $penjualan->id)); ?>"
        class="btn-back"
    >
        ← Kembali ke Transaksi
    </a>

</div>


<script>

    /*
    |--------------------------------------------------------------------------
    | DATA QR
    |--------------------------------------------------------------------------
    */

    const qrData = <?php echo json_encode($qrData, 15, 512) ?>;


    /*
    |--------------------------------------------------------------------------
    | GENERATE QR CODE
    |--------------------------------------------------------------------------
    */

    new QRCode(
        document.getElementById('qrcode'),
        {
            text: qrData,

            width: 280,

            height: 280,

            colorDark: '#000000',

            colorLight: '#ffffff',

            correctLevel: QRCode.CorrectLevel.H
        }
    );

</script>

</body>

</html>
<?php /**PATH C:\laragon\www\pos_dezqiya\resources\views/penjualan/qris.blade.php ENDPATH**/ ?>