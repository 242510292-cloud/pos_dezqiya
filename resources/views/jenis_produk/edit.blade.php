@extends('layouts.app')

@section('title', 'Edit Jenis Produk')

@section('content')

@include('layouts.navbar')

<div class="container mt-4">

    <div class="mb-4">
        <h1 class="fw-bold text-primary">
            <i class="bi bi-pencil-square me-2"></i>
            Edit Jenis Produk
        </h1>

        <p class="text-muted">
            Perbarui informasi jenis produk.
        </p>
    </div>

    <div class="card border-0 shadow-sm" style="border-radius: 25px;">

        <div class="card-header text-white fw-bold"
             style="background: linear-gradient(135deg, #42b9e9, #20aeea);">
            Form Edit Jenis Produk
        </div>

        <div class="card-body p-4">

            <form action="{{ route('jenis-produk.update', $jenisProduk->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label for="nama" class="form-label fw-bold">
                        Nama Jenis Produk
                    </label>

                    <input
                        type="text"
                        name="nama"
                        id="nama"
                        class="form-control @error('nama') is-invalid @enderror"
                        value="{{ old('nama', $jenisProduk->nama) }}"
                        placeholder="Masukkan nama jenis produk"
                        required
                        autofocus
                    >

                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="mt-4">

                    <a href="{{ route('jenis-produk.index') }}"
                       class="btn btn-secondary">
                        <i class="bi bi-arrow-left me-1"></i>
                        Kembali
                    </a>

                    <button type="submit"
                            class="btn btn-info text-white">
                        <i class="bi bi-check-lg me-1"></i>
                        Update
                    </button>

                </div>

            </form>

        </div>
    </div>

</div>

@endsection
