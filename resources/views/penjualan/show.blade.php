@extends('layouts.app')

@section('title', 'Detail Penjualan')

@section('content')

@include('layouts.navbar')

{{-- CSS untuk menonjolkan Total Pembayaran --}}
<style>
    .total-pembayaran {
        margin-top: 15px;
        margin-bottom: 15px;
        padding: 15px 20px;
        background: linear-gradient(135deg, #e8f7ff, #d5f1ff);
        border: 2px solid #0d9fe8;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(13, 159, 232, 0.20);

        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .total-label {
        display: inline-block;
        background: #0077b6;
        color: white;
        padding: 8px 14px;
        border-radius: 8px;
        font-size: 16px;
        font-weight: 800;
    }

    .total-nominal {
        font-size: 26px;
        font-weight: 900;
        color: #0077b6;
    }
</style>

<h1>Detail Penjualan</h1>

<div class="card">

    <div class="card-body">

        <table class="table">

            <tr>
                <th>Tanggal Transaksi</th>
                <td>
                    {{ $penjualan->created_at->translatedFormat('d F Y H:i:s') }}
                </td>
            </tr>

            <tr>
                <th>Kasir</th>
                <td>
                    {{ $penjualan->user->name }}
                </td>
            </tr>

            <tr>
                <th>Metode Pembayaran</th>
                <td>
                    {{ $penjualan->metode_pembayaran }}
                </td>
            </tr>

            <tr>
                <th>Status</th>
                <td>
                    {{ $penjualan->status }}
                </td>
            </tr>

        </table>


        <h4>Daftar Produk</h4>

        <table class="table table-bordered">

            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                </tr>
            </thead>

            <tbody>

            @foreach($penjualan->itemPenjualan as $item)

                <tr>
                    <td>
                        {{ $item->produk->nama }}
                    </td>

                    <td>
                        {{ $item->kuantitas }}
                    </td>

                    <td>
                        Rp {{ number_format($item->harga) }}
                    </td>

                    <td>
                        Rp {{ number_format($item->subtotal) }}
                    </td>
                </tr>

            @endforeach

            </tbody>

        </table>


        {{-- TOTAL PEMBAYARAN --}}
        <div class="total-pembayaran">

            <div class="total-label">
                TOTAL PEMBAYARAN
            </div>

            <div class="total-nominal">
                Rp {{ number_format($penjualan->total_pembayaran) }}
            </div>

        </div>


        <a href="{{ route('penjualan.index') }}"
           class="btn btn-secondary">
            Kembali
        </a>

        <a href="{{ route('penjualan.struk', $penjualan) }}"
           target="_blank"
           class="btn btn-primary">
            🖨 Cetak Struk
        </a>

    </div>

</div>

@endsection