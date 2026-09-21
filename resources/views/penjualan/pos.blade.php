@extends('layouts.app')

@section('title', 'POS')

@section('content')

@if($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<h4 class="mb-3">Tambah dan Edit</h4>

<div class="row">

    {{-- ========================================================= --}}
    {{-- PRODUK --}}
    {{-- ========================================================= --}}
    <div class="col-md-6">

        <div class="card">

            <div class="card-body"
                 style="max-height:70vh; overflow:auto">

                {{-- SEARCH PRODUK --}}
                <form method="GET"
                      action="{{ route('penjualan.create') }}">

                    <input type="text"
                           name="search"
                           value="{{ request('search') }}"
                           class="form-control mb-3"
                           placeholder="Cari produk..."
                           onkeyup="this.form.submit()">

                </form>


                {{-- DAFTAR PRODUK --}}
                @foreach($products as $product)

                <form method="POST"
                      action="{{ route('itempenjualan.store') }}"
                      class="row mb-2">

                    @csrf

                    <input type="hidden"
                           name="product_id"
                           value="{{ $product->id }}">


                    {{-- PRODUK --}}
                    <div class="col-7">

                        <div class="btn btn-outline-primary w-100 text-start p-2">

                            <div class="d-flex align-items-center gap-2">

                                <img src="{{ asset('storage/'.$product->foto) }}"
                                     class="rounded-circle"
                                     style="width:45px;
                                            height:45px;
                                            object-fit:cover;">

                                <div>

                                    <div class="fw-semibold">
                                        {{ $product->nama }}
                                    </div>

                                    <small class="text-muted">
                                        Rp {{ number_format($product->harga_jual, 0, ',', '.') }}
                                    </small>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- QUANTITY --}}
                    <div class="col-3">

                        <input type="number"
                               name="quantity"
                               value="1"
                               min="1"
                               class="form-control">

                    </div>


                    {{-- TOMBOL TAMBAH --}}
                    <div class="col-2">

                        <button type="submit"
                                class="btn btn-primary w-100">

                            +

                        </button>

                    </div>

                </form>

                @endforeach

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- KERANJANG --}}
    {{-- ========================================================= --}}
    <div class="col-md-6">

        <div class="card">


            {{-- TABEL KERANJANG --}}
            <table class="table table-bordered mb-0">

                <thead>

                    <tr>

                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>

                    </tr>

                </thead>


                <tbody>

                @forelse($sale->itemPenjualan as $item)

                <tr>

                    {{-- NAMA PRODUK --}}
                    <td>
                        {{ $item->produk->nama }}
                    </td>


                    {{-- HARGA --}}
                    <td>
                        Rp {{ number_format($item->produk->harga_jual, 0, ',', '.') }}
                    </td>


                    {{-- QTY --}}
                    <td>

                        <form method="POST"
                              action="{{ route('itempenjualan.update', $item->id) }}">

                            @csrf
                            @method('PUT')

                            <input type="number"
                                   name="quantity"
                                   value="{{ $item->kuantitas }}"
                                   min="1"
                                   class="form-control form-control-sm"
                                   onchange="this.form.submit()">

                        </form>

                    </td>


                    {{-- SUBTOTAL --}}
                    <td>

                        Rp {{ number_format($item->subtotal, 0, ',', '.') }}

                    </td>


                    {{-- HAPUS --}}
                    <td>

                        @can('delete', $item)

                        <form method="POST"
                              action="{{ route('itempenjualan.destroy', $item->id) }}">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger btn-sm">

                                Hapus

                            </button>

                        </form>

                        @endcan

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="5"
                        class="text-center">

                        Keranjang Kosong

                    </td>

                </tr>

                @endforelse

                </tbody>

            </table>


            {{-- ================================================= --}}
            {{-- PEMBAYARAN --}}
            {{-- ================================================= --}}
            <div class="card-footer">

                {{-- TOTAL --}}
                <h5 class="fw-bold">

                    Total:
                    Rp {{ number_format($sale->total_pembayaran, 0, ',', '.') }}

                </h5>


                {{-- FORM CHECKOUT --}}
                <form method="POST"
                      action="{{ route('penjualan.update', $sale->id) }}"
                      id="checkout-form"
                      onsubmit="return confirmCheckout()">

                    @csrf
                    @method('PUT')

                    {{-- DISKON --}}
                    <select name="payment_method"
                            id="payment_method"
                            class="form-select mb-3"
                            required>

                        <option value="">
                            Pilih Diskon
                        </option>

                        <option value="CASH">
                           5%
                        </option>

                        <option value="CASH">
                           10%
                        </option>


                    </select>

                    {{-- ================================================= --}}
                    {{-- DISKON 5% --}}
                    {{-- ================================================= --}}
                   Discount 5%: Rp {{ number_format($sale->total_pembayaran * 0.05, 0, ',', '.') }}

                    {{-- ================================================= --}}
                    {{-- DISKON 10% --}}
                    {{-- ================================================= --}}
                     Discount 10%: Rp {{ number_format($sale->total_pembayaran * 0.10, 0, ',', '.') }}

                    {{-- METODE PEMBAYARAN --}}
                    <select name="payment_method"
                            id="payment_method"
                            class="form-select mb-3"
                            required>

                        <option value="">
                            Pilih Pembayaran
                        </option>

                        <option value="CASH">
                            Cash
                        </option>

                        <option value="QRIS">
                            QRIS
                        </option>

                    </select>

                  
                    {{-- ================================================= --}}
                    {{-- PEMBAYARAN CASH --}}
                    {{-- ================================================= --}}
                    <div id="cash-payment"
                         style="display:none;">

                        <label for="uang_dibayar"
                               class="form-label fw-bold">

                            Uang Dibayar

                        </label>


                        <input type="number"
                               name="uang_dibayar"
                               id="uang_dibayar"
                               class="form-control mb-2"
                               placeholder="Masukkan uang dibayar"
                               min="0"
                               step="1">

                              

                        {{-- KEMBALIAN --}}
                        <div class="alert alert-success">

                            <div class="fw-bold">
                                Kembalian
                            </div>

                            <div id="kembalian"
                                 class="fs-5">

                                Rp 0

                            </div>

                        </div>


                        {{-- UANG KURANG --}}
                        <div id="uang-kurang"
                             class="alert alert-danger"
                             style="display:none;">

                        </div>

                    </div>


                    {{-- ================================================= --}}
                    {{-- TOMBOL CHECKOUT --}}
                    {{-- ================================================= --}}
                    <button type="submit"
                            id="checkout-button"
                            class="btn btn-success w-100">

                        Checkout

                    </button>

                </form>


                {{-- ================================================= --}}
                {{-- BATAL TRANSAKSI --}}
                {{-- ================================================= --}}
                @can('delete', $sale)

                <form method="POST"
                      action="{{ route('penjualan.destroy', $sale->id) }}"
                      onsubmit="return confirm('Yakin ingin membatalkan transaksi?')">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="btn btn-outline-danger w-100 mt-2">

                        Batal Transaksi

                    </button>

                </form>

                @endcan


                {{-- ================================================= --}}
                {{-- TOMBOL KEMBALI --}}
                {{-- ================================================= --}}
                <div class="mt-4">

                    <a href="{{ url('/penjualan') }}"
                       class="btn btn-primary fw-bold">

                        ← Kembali

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- ============================================================= --}}
{{-- JAVASCRIPT PEMBAYARAN --}}
{{-- ============================================================= --}}

<script>

document.addEventListener('DOMContentLoaded', function () {

    const paymentMethod =
        document.getElementById('payment_method');

    const cashPayment =
        document.getElementById('cash-payment');

    const uangDibayar =
        document.getElementById('uang_dibayar');

    const kembalian =
        document.getElementById('kembalian');

    const uangKurang =
        document.getElementById('uang-kurang');

    const checkoutButton =
        document.getElementById('checkout-button');


    // Total transaksi dari Laravel
    const total =
        {{ (int) $sale->total_pembayaran }};


    // =============================================================
    // FORMAT RUPIAH
    // =============================================================

    function formatRupiah(angka) {

        return 'Rp ' + Number(angka).toLocaleString('id-ID');

    }


    // =============================================================
    // PILIH METODE PEMBAYARAN
    // =============================================================

    paymentMethod.addEventListener('change', function () {

        if (this.value === 'CASH') {

            // Tampilkan pembayaran cash
            cashPayment.style.display = 'block';

            uangDibayar.required = true;

            // Checkout awalnya disabled
            checkoutButton.disabled = true;

            // Fokus ke input uang
            uangDibayar.focus();

        } else {

            // Sembunyikan pembayaran cash
            cashPayment.style.display = 'none';

            uangDibayar.required = false;

            uangDibayar.value = '';

            kembalian.textContent =
                'Rp 0';

            uangKurang.style.display =
                'none';

            // QRIS bisa checkout
            checkoutButton.disabled = false;

        }

    });


    // =============================================================
    // HITUNG KEMBALIAN
    // =============================================================

    uangDibayar.addEventListener('input', function () {

        const dibayar =
            Number(this.value) || 0;


        // Jika belum ada uang
        if (dibayar <= 0) {

            kembalian.textContent =
                'Rp 0';

            uangKurang.style.display =
                'none';

            checkoutButton.disabled =
                true;

            return;

        }


        // =========================================================
        // UANG KURANG
        // =========================================================

        if (dibayar < total) {

            const kurang =
                total - dibayar;


            kembalian.textContent =
                'Rp 0';


            uangKurang.textContent =
                'Uang masih kurang ' +
                formatRupiah(kurang);


            uangKurang.style.display =
                'block';


            checkoutButton.disabled =
                true;


            return;

        }


        // =========================================================
        // UANG CUKUP / LEBIH
        // =========================================================

        const hasil =
            dibayar - total;


        kembalian.textContent =
            formatRupiah(hasil);


        uangKurang.style.display =
            'none';


        checkoutButton.disabled =
            false;

    });


});


// =============================================================
// VALIDASI CHECKOUT
// =============================================================

function confirmCheckout() {

    const paymentMethod =
        document.getElementById('payment_method').value;

    const total =
        {{ (int) $sale->total_pembayaran }};


    // Jika Cash
    if (paymentMethod === 'CASH') {

        const uangDibayar =
            Number(
                document.getElementById('uang_dibayar').value
            ) || 0;


        // Uang belum dimasukkan
        if (uangDibayar <= 0) {

            alert(
                'Silakan masukkan uang yang dibayar.'
            );

            return false;

        }


        // Uang kurang
        if (uangDibayar < total) {

            alert(
                'Uang yang dibayar masih kurang.'
            );

            return false;

        }

    }


    return true;

}

</script>

@endsection
