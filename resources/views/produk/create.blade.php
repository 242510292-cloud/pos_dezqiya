@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')

@include('layouts.navbar')

<div class="container mt-4">

    {{-- ===================================================== --}}
    {{-- JUDUL --}}
    {{-- ===================================================== --}}

    <h1 class="fw-bold text-primary mb-4">
        <i class="bi bi-box-seam me-2"></i>
        Tambah Produk
    </h1>


    {{-- ===================================================== --}}
    {{-- FORM --}}
    {{-- ===================================================== --}}

    <div class="card shadow-sm border-0">

        <div class="card-header bg-info text-white">
            <strong>Form Tambah Produk</strong>
        </div>


        <div class="card-body">

            <form action="{{ route('produk.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf


                {{-- ================================================= --}}
                {{-- FOTO --}}
                {{-- ================================================= --}}

                <div class="mb-3">

                    <label for="foto"
                           class="form-label fw-bold">

                        Gambar

                    </label>


                    <input
                        type="file"
                        name="foto"
                        id="foto"
                        class="form-control @error('foto') is-invalid @enderror"
                        accept="image/*"
                        onchange="previewImage(this)"
                    >


                    @error('foto')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror


                    {{-- PREVIEW FOTO --}}

                    <div class="mt-3">

                        <label class="form-label">
                            Preview Foto
                        </label>

                        <br>

                        <img
                            id="preview"
                            src="#"
                            alt="Preview Foto"
                            style="
                                display:none;
                                max-width:200px;
                                max-height:200px;
                                object-fit:cover;
                            "
                            class="img-thumbnail"
                        >

                    </div>

                </div>



                {{-- ================================================= --}}
                {{-- NAMA PRODUK --}}
                {{-- ================================================= --}}

                <div class="mb-3">

                    <label for="name"
                           class="form-label fw-bold">

                        Nama Produk

                    </label>


                    <input
                        type="text"
                        name="name"
                        id="name"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name') }}"
                        placeholder="Masukkan nama produk"
                    >


                    @error('name')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>



                {{-- ================================================= --}}
                {{-- JENIS PRODUK --}}
                {{-- ================================================= --}}

                <div class="mb-3">

                    <label for="jenis_produk_id"
                           class="form-label fw-bold">

                        Jenis Produk

                    </label>


                    <select
                        name="jenis_produk_id"
                        id="jenis_produk_id"
                        class="form-select @error('jenis_produk_id') is-invalid @enderror"
                    >

                        <option value="">
                            -- Pilih Jenis Produk --
                        </option>


                        @foreach($jenisProduks as $jenis)

                            <option
                                value="{{ $jenis->id }}"
                                {{ old('jenis_produk_id') == $jenis->id ? 'selected' : '' }}
                            >

                                {{ $jenis->nama }}

                            </option>

                        @endforeach

                    </select>


                    @error('jenis_produk_id')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>



                {{-- ================================================= --}}
                {{-- HARGA POKOK --}}
                {{-- ================================================= --}}

                <div class="mb-3">

                    <label for="purchase_price"
                           class="form-label fw-bold">

                        Harga Pokok

                    </label>


                    <input
                        type="number"
                        name="purchase_price"
                        id="purchase_price"
                        class="form-control @error('purchase_price') is-invalid @enderror"
                        value="{{ old('purchase_price') }}"
                        placeholder="Masukkan harga pokok"
                        min="0"
                        step="1"
                    >


                    <small class="text-muted">

                        Masukkan harga modal produk.

                    </small>


                    @error('purchase_price')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>



                {{-- ================================================= --}}
                {{-- HARGA JUAL --}}
                {{-- ================================================= --}}

                <div class="mb-3">

                    <label for="selling_price"
                           class="form-label fw-bold">

                        Harga Jual

                    </label>


                    <input
                        type="number"
                        name="selling_price"
                        id="selling_price"
                        class="form-control @error('selling_price') is-invalid @enderror"
                        value="{{ old('selling_price') }}"
                        placeholder="Harga jual otomatis"
                        min="0"
                        step="1"
                        readonly
                    >


                    {{-- KETERANGAN --}}

                    <small class="text-success">

                        <i class="bi bi-check-circle"></i>

                        Harga jual otomatis dengan keuntungan 30%.

                    </small>


                    @error('selling_price')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>



                {{-- ================================================= --}}
                {{-- INFORMASI KEUNTUNGAN --}}
                {{-- ================================================= --}}

                <div id="profit-info"
                     class="alert alert-success"
                     style="display:none;">

                    <div class="d-flex justify-content-between">

                        <span>
                            Harga Pokok
                        </span>

                        <strong id="display-purchase-price">
                            Rp 0
                        </strong>

                    </div>


                    <div class="d-flex justify-content-between">

                        <span>
                            Keuntungan 30%
                        </span>

                        <strong id="display-profit">
                            Rp 0
                        </strong>

                    </div>


                    <hr>


                    <div class="d-flex justify-content-between">

                        <span class="fw-bold">
                            Harga Jual
                        </span>

                        <strong id="display-selling-price"
                                class="fs-5">

                            Rp 0

                        </strong>

                    </div>

                </div>



                {{-- ================================================= --}}
                {{-- STOK --}}
                {{-- ================================================= --}}

                <div class="mb-3">

                    <label for="stock"
                           class="form-label fw-bold">

                        Stok

                    </label>


                    <input
                        type="number"
                        name="stock"
                        id="stock"
                        class="form-control @error('stock') is-invalid @enderror"
                        value="{{ old('stock') }}"
                        placeholder="Masukkan jumlah stok"
                        min="0"
                        step="1"
                    >


                    @error('stock')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>



                {{-- ================================================= --}}
                {{-- BUTTON --}}
                {{-- ================================================= --}}

                <div class="mt-4">

                    <button
                        type="submit"
                        class="btn btn-info text-white fw-bold"
                    >

                        <i class="bi bi-check-lg"></i>

                        Simpan

                    </button>


                    <a
                        href="{{ route('produk.index') }}"
                        class="btn btn-secondary fw-bold"
                    >

                        <i class="bi bi-arrow-left"></i>

                        Kembali

                    </a>

                </div>


            </form>

        </div>

    </div>

</div>



{{-- ============================================================= --}}
{{-- JAVASCRIPT --}}
{{-- ============================================================= --}}

<script>

document.addEventListener('DOMContentLoaded', function () {

    // =========================================================
    // ELEMENT
    // =========================================================

    const hargaPokok =
        document.getElementById('purchase_price');

    const hargaJual =
        document.getElementById('selling_price');

    const profitInfo =
        document.getElementById('profit-info');

    const displayPurchasePrice =
        document.getElementById('display-purchase-price');

    const displayProfit =
        document.getElementById('display-profit');

    const displaySellingPrice =
        document.getElementById('display-selling-price');


    // =========================================================
    // FORMAT RUPIAH
    // =========================================================

    function formatRupiah(angka) {

        return 'Rp ' +
            Number(angka).toLocaleString('id-ID');

    }


    // =========================================================
    // HITUNG HARGA JUAL
    // =========================================================

    function hitungHargaJual() {

        // Ambil harga pokok
        const pokok =
            parseFloat(hargaPokok.value) || 0;


        // Jika harga pokok kosong
        if (pokok <= 0) {

            hargaJual.value = '';

            profitInfo.style.display = 'none';

            return;
        }


        // =====================================================
        // HITUNG KEUNTUNGAN 30%
        // =====================================================

        const keuntungan =
            pokok * 30 / 100;


        // =====================================================
        // HARGA JUAL
        // =====================================================

        const jual =
            pokok + keuntungan;


        // Bulatkan ke rupiah
        const jualBulat =
            Math.round(jual);


        // =====================================================
        // MASUKKAN KE INPUT HARGA JUAL
        // =====================================================

        hargaJual.value =
            jualBulat;


        // =====================================================
        // TAMPILKAN INFORMASI
        // =====================================================

        profitInfo.style.display =
            'block';


        displayPurchasePrice.textContent =
            formatRupiah(pokok);


        displayProfit.textContent =
            formatRupiah(keuntungan);


        displaySellingPrice.textContent =
            formatRupiah(jualBulat);

    }


    // =========================================================
    // KETIKA HARGA POKOK DIKETIK
    // =========================================================

    hargaPokok.addEventListener(
        'input',
        hitungHargaJual
    );


    // =========================================================
    // JALANKAN SAAT HALAMAN DIBUKA
    // =========================================================

    hitungHargaJual();

});



// =============================================================
// PREVIEW GAMBAR
// =============================================================

function previewImage(input) {

    const preview =
        document.getElementById('preview');


    // Jika ada file
    if (
        input.files &&
        input.files[0]
    ) {

        const file =
            input.files[0];


        // Pastikan file adalah gambar
        if (!file.type.startsWith('image/')) {

            alert(
                'File yang dipilih harus berupa gambar.'
            );

            input.value = '';

            preview.src = '#';

            preview.style.display = 'none';

            return;
        }


        // FileReader
        const reader =
            new FileReader();


        reader.onload =
            function (e) {

                preview.src =
                    e.target.result;

                preview.style.display =
                    'block';

            };


        reader.readAsDataURL(file);

    } else {

        preview.src = '#';

        preview.style.display =
            'none';

    }

}

</script>

@endsection
