@extends('layouts.app')

@section('title', 'Produk')

@section('content')

@include('layouts.navbar')

<div class="container mt-4">


<h1 class="fw-bold text-primary mb-4">
    <i class="bi bi-box-seam me-2"></i>
    Produk
</h1>

@can('create', App\Models\Produk::class)
    <a href="{{ route('produk.create') }}" class="btn btn-primary mb-3">
        <i class="bi bi-plus-circle me-1"></i>
        Create
    </a>
@endcan

{{-- Search --}}
<form action="{{ route('produk.index') }}" method="GET" class="mb-3">
    <div class="input-group">
        <input
            type="text"
            name="search"
            value="{{ request()->search }}"
            class="form-control"
            placeholder="Search nama produk">

        <button class="btn btn-sm btn-info text-white" type="submit">
            Search
        </button>
    </div>
</form>

{{-- Table --}}
<div class="table-responsive">
    <table class="table table-bordered table-hover align-middle">

        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>Jenis</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            @forelse ($products as $product)

                <tr>

                    {{-- Nomor --}}
                    <th>
                        {{ $products->firstItem() + $loop->index }}
                    </th>

                    {{-- FOTO --}}
                    <td>
                        @if ($product->foto)

                            <img
                                src="{{ asset('storage/' . $product->foto) }}"
                                width="100"
                                height="100"
                                class="img-thumbnail"
                                style="object-fit: cover;"
                                alt="{{ $product->nama }}">

                        @else

                            <span class="text-muted">
                                Tidak ada foto
                            </span>

                        @endif
                    </td>

                    {{-- NAMA --}}
                    <td>
                        {{ $product->nama }}
                    </td>

                    {{-- JENIS PRODUK --}}
                   <td>
    {{ $product->jenisProduk?->nama_jenis ?? '-' }}
</td>


                    {{-- HARGA BELI --}}
                    <td>
                        Rp {{ number_format($product->harga_beli, 0, ',', '.') }}
                    </td>

                    {{-- HARGA JUAL --}}
                    <td>
                        Rp {{ number_format($product->harga_jual, 0, ',', '.') }}
                    </td>

                    {{-- STOK --}}
                    <td>
                        {{ $product->stok }}
                    </td>

                    {{-- AKSI --}}
                    <td>
                        <div class="d-flex gap-1">

                            {{-- DETAIL --}}
                            <a
                                href="{{ route('produk.show', $product) }}"
                                class="btn btn-info text-white">
                                Detail
                            </a>

                            {{-- EDIT --}}
                            @can('update', $product)
                                <a
                                    href="{{ route('produk.edit', $product) }}"
                                    class="btn btn-info text-white">
                                    Edit
                                </a>
                            @endcan

                            {{-- HAPUS --}}
                            @can('delete', $product)
                                <form
                                    action="{{ route('produk.destroy', $product) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-primary fw-bold"
                                        onclick="return confirm('Apakah anda yakin akan menghapus produk ini?')">
                                        Hapus
                                    </button>

                                </form>
                            @endcan

                        </div>
                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="8" class="text-center">
                        <h4 class="py-3">
                            Data tidak tersedia.
                        </h4>
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>
</div>

{{-- Pagination --}}
<div class="d-flex justify-content-end">
    {{ $products->links() }}
</div>


</div>

@endsection
