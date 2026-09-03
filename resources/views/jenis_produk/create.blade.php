@extends('layouts.app')

@section('title', 'Tambah Jenis Produk')

@section('content')

<div class="container mt-4">

    <h1>Tambah Jenis Produk</h1>

    <form action="{{ route('jenis-produk.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama" class="form-label">
                Nama Jenis Produk
            </label>

            <input
                type="text"
                name="nama"
                id="nama"
                class="form-control @error('nama') is-invalid @enderror"
                value="{{ old('nama') }}"
                placeholder="Masukkan nama jenis produk"
            >

            @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            Simpan
        </button>

        <a href="{{ route('jenis-produk.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </form>

</div>

@endsection