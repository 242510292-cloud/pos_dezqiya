<?php

namespace App\Http\Controllers;

use App\Models\JenisProduk;
use Illuminate\Http\Request;

class JenisProdukController extends Controller
{
    /**
     * Menampilkan daftar jenis produk.
     */
    public function index()
    {
        $jenisProduks = JenisProduk::with('user')
            ->latest()
            ->get();

        return view('jenis_produk.index', compact('jenisProduks'));
    }

    /**
     * Menampilkan form tambah.
     */
    public function create()
    {
        return view('jenis_produk.create');
    }

    /**
     * Menyimpan jenis produk baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        JenisProduk::create([
            'nama' => $request->nama,
            'user_id' => auth()->id(),
        ]);

        return redirect()
            ->route('jenis-produk.index')
            ->with('success', 'Jenis produk berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit.
     */
    public function edit(JenisProduk $jenisProduk)
    {
        return view('jenis_produk.edit', compact('jenisProduk'));
    }

    /**
     * Mengupdate jenis produk.
     */
    public function update(Request $request, JenisProduk $jenisProduk)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $jenisProduk->update([
            'nama' => $request->nama,
        ]);

        return redirect()
            ->route('jenis-produk.index')
            ->with('success', 'Jenis produk berhasil diperbarui.');
    }

    /**
     * Menghapus jenis produk.
     */
    public function destroy(JenisProduk $jenisProduk)
    {
        $jenisProduk->delete();

        return redirect()
            ->route('jenis-produk.index')
            ->with('success', 'Jenis produk berhasil dihapus.');
    }
}