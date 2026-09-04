@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')

@include('layouts.navbar')

<div class="container mt-4">

    <h1 class="fw-bold text-primary mb-4">
        <i class="bi bi-box-seam me-2"></i>
        Tambah Produk
    </h1>

    <div class="card shadow-sm border-0">

        <div class="card-header bg-info text-white">
            <strong>Form Tambah Produk</strong>
        </div>

        <div class="card-body">

            <form action="{{ route('produk.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                {{-- FOTO --}}
                <div class="mb-3">
                    <label for="foto" class="form-label fw-bold">
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

                    <div class="mt-3">
                        <label class="form-label">
                            Preview Foto
                        </label>

                        <br>

                        <img
                            id="preview"
                            src="#"
                            alt="Preview Foto"
                            style="display:none; max-width:200px;"
                            class="img-thumbnail"
                        >
                    </div>
                </div>

                {{-- NAMA PRODUK --}}
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">
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

           {{-- JENIS PRODUK --}}
<div class="mb-3">
    <label for="jenis_produk_id" class="form-label fw-bold">
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
                {{ $jenis->nama_jenis }}
            </option>
        @endforeach
    </select>

    @error('jenis_produk_id')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>


                {{-- HARGA BELI --}}
                <div class="mb-3">
                    <label for="purchase_price" class="form-label fw-bold">
                        Harga Beli
                    </label>

                    <input
                        type="number"
                        name="purchase_price"
                        id="purchase_price"
                        class="form-control @error('purchase_price') is-invalid @enderror"
                        value="{{ old('purchase_price') }}"
                        placeholder="Masukkan harga beli"
                    >

                    @error('purchase_price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- HARGA JUAL --}}
                <div class="mb-3">
                    <label for="selling_price" class="form-label fw-bold">
                        Harga Jual
                    </label>

                    <input
                        type="number"
                        name="selling_price"
                        id="selling_price"
                        class="form-control @error('selling_price') is-invalid @enderror"
                        value="{{ old('selling_price') }}"
                        placeholder="Masukkan harga jual"
                    >

                    @error('selling_price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- STOK --}}
                <div class="mb-3">
                    <label for="stock" class="form-label fw-bold">
                        Stok
                    </label>

                    <input
                        type="number"
                        name="stock"
                        id="stock"
                        class="form-control @error('stock') is-invalid @enderror"
                        value="{{ old('stock') }}"
                        placeholder="Masukkan jumlah stok"
                    >

                    @error('stock')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- BUTTON --}}
                <button type="submit" class="btn btn-info text-white fw-bold">
                    <i class="bi bi-check-lg"></i>
                    Simpan
                </button>

                <a href="{{ route('produk.index') }}"
                   class="btn btn-secondary fw-bold">
                    <i class="bi bi-arrow-left"></i>
                    Kembali
                </a>

            </form>

        </div>
    </div>

</div>

<script>
function previewImage(input) {
    const preview = document.getElementById('preview');

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        };

        reader.readAsDataURL(input.files[0]);
    }
}
</script>

@endsection