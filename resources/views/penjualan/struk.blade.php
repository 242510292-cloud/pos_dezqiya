<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Struk #{{ $penjualan->id }}</title>

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

        {{-- HEADER --}}
        <div class="header center">

            <h2>DailyMart⭐</h2>

            <p>STRUK PENJUALAN</p>

        </div>


        <div class="garis"></div>


        {{-- INFORMASI TRANSAKSI --}}
        <div class="info">

            <div class="info-row">
                <span>No. Transaksi</span>

                <span>
                    #{{ $penjualan->id }}
                </span>
            </div>


            <div class="info-row">
                <span>Tanggal</span>

                <span>
                    {{ $penjualan->created_at->format('d/m/Y H:i') }}
                </span>
            </div>


            <div class="info-row">
                <span>Kasir</span>

                <span>
                    {{ $penjualan->user->name ?? '-' }}
                </span>
            </div>


            <div class="info-row">
                <span>Metode</span>

                <span>
                    {{ $penjualan->metode_pembayaran ?? '-' }}
                </span>
            </div>

        </div>


        <div class="garis"></div>


        {{-- DAFTAR PRODUK --}}
        <div class="produk">

            @forelse ($penjualan->itemPenjualan as $item)

                <div class="produk-item">

                    <div class="produk-nama">
                        {{ $item->produk->nama ?? '-' }}
                    </div>


                    <div class="produk-detail">

                        <span>
                            {{ $item->kuantitas }} x
                            Rp
                            {{ number_format(
                                $item->kuantitas > 0
                                    ? $item->subtotal / $item->kuantitas
                                    : 0,
                                0,
                                ',',
                                '.'
                            ) }}
                        </span>


                        <span>
                            Rp
                            {{ number_format(
                                $item->subtotal,
                                0,
                                ',',
                                '.'
                            ) }}
                        </span>

                    </div>

                </div>

            @empty

                <div class="center">
                    Tidak ada produk
                </div>

            @endforelse

        </div>


        <div class="garis"></div>


        {{-- TOTAL --}}
        <div class="total">

            <div class="info-row">

                <span>TOTAL</span>

                <span>
                    Rp
                    {{ number_format(
                        $penjualan->total_pembayaran,
                        0,
                        ',',
                        '.'
                    ) }}
                </span>

            </div>

        </div>


        <div class="garis"></div>


        {{-- FOOTER --}}
        <div class="footer">

            <p>Terima Kasih</p>

            <p>Selamat berbelanja kembali</p>

        </div>

    </div>


    {{-- TOMBOL CETAK --}}
    <button
        type="button"
        class="tombol print"
        onclick="window.print()">

        🖨 Cetak Struk

    </button>


    {{-- TOMBOL TUTUP --}}
    <button
        type="button"
        class="tombol close"
        onclick="window.close()">

        Tutup

    </button>

</body>

</html>
