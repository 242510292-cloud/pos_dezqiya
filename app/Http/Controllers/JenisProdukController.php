<?php

namespace App\Http\Controllers;

use App\Models\JenisProduk;
use Illuminate\Http\Request;

class JenisProdukController extends Controller
{
    /**
     * Menampilkan daftar jenis produk.
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', JenisProduk::class);

        $keyword = $request->input('search');

        $jenisProduks = JenisProduk::with('user')
            ->when($keyword, function ($query) use ($keyword) {
                $query->where(
                    'nama_jenis',
                    'like',
                    '%' . $keyword . '%'
                );
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'jenis_produk.index',
            compact('jenisProduks')
        );
    }

    /**
     * Menampilkan form tambah jenis produk.
     */
    public function create()
    {
        $this->authorize('create', JenisProduk::class);

        return view('jenis_produk.create');
    }

    /**
     * Menyimpan jenis produk baru.
     */
    public function store(Request $request)
    {
        $this->authorize('create', JenisProduk::class);

        $validated = $request->validate([
            'nama_jenis' => [
                'required',
                'string',
                'max:255',
                'unique:jenis_produks,nama_jenis',
            ],
        ]);

        JenisProduk::create([
            'nama_jenis' => $validated['nama_jenis'],
            'user_id' => auth()->id(),
        ]);

        return redirect()
            ->route('jenis-produk.index')
            ->with(
                'success',
                'Jenis produk berhasil ditambahkan.'
            );
    }

    /**
     * Menampilkan detail jenis produk.
     */
    public function show(JenisProduk $jenisProduk)
    {
        $this->authorize('view', $jenisProduk);

        $jenisProduk->load([
            'user',
            'produks',
        ]);

        return view(
            'jenis_produk.show',
            compact('jenisProduk')
        );
    }

    /**
     * Menampilkan form edit.
     */
    public function edit(JenisProduk $jenisProduk)
    {
        $this->authorize('update', $jenisProduk);

        return view(
            'jenis_produk.edit',
            compact('jenisProduk')
        );
    }

    /**
     * Mengupdate jenis produk.
     */
    public function update(
        Request $request,
        JenisProduk $jenisProduk
    ) {
        $this->authorize('update', $jenisProduk);

        $validated = $request->validate([
            'nama_jenis' => [
                'required',
                'string',
                'max:255',
                'unique:jenis_produks,nama_jenis,' . $jenisProduk->id,
            ],
        ]);

        $jenisProduk->update([
            'nama_jenis' => $validated['nama_jenis'],
        ]);

        return redirect()
            ->route('jenis-produk.index')
            ->with(
                'success',
                'Jenis produk berhasil diupdate.'
            );
    }

    /**
     * Menghapus jenis produk.
     */
    public function destroy(JenisProduk $jenisProduk)
    {
        $this->authorize('delete', $jenisProduk);

        // Jangan hapus jika masih digunakan oleh produk
        if ($jenisProduk->produks()->exists()) {
            return redirect()
                ->route('jenis-produk.index')
                ->with(
                    'error',
                    'Jenis produk tidak dapat dihapus karena masih digunakan oleh produk.'
                );
        }

        $jenisProduk->delete();

        return redirect()
            ->route('jenis-produk.index')
            ->with(
                'success',
                'Jenis produk berhasil dihapus.'
            );
    }
}
