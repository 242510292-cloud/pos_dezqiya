<?php

namespace App\Http\Controllers;

use App\Http\Requests\Produk\StoreRequest;
use App\Http\Requests\Produk\UpdateRequest;
use App\Http\Requests\SearchRequest;
use App\Models\JenisProduk;
use App\Models\Produk;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Menampilkan daftar produk.
     */
    public function index(SearchRequest $request)
    {
        $this->authorize('viewAny', Produk::class);

        $keyword = $request->input('search');

        $products = Produk::with(['jenisProduk', 'user'])
            ->when($keyword, function ($query) use ($keyword) {
                $query->where('nama', 'like', '%' . $keyword . '%');
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('produk.index', compact('products'));
    }

    /**
     * Menampilkan form tambah produk.
     */
    public function create()
    {
        $this->authorize('create', Produk::class);

        $jenisProduks = JenisProduk::orderBy('nama_jenis', 'asc')->get();

        return view('produk.create', compact('jenisProduks'));
    }

    /**
     * Menyimpan produk baru.
     */
    public function store(StoreRequest $request)
    {
        $this->authorize('create', Produk::class);

        $dataReq = $request->validated();

        $data = [
            'nama'             => $dataReq['name'],
            'jenis_produk_id'  => $dataReq['jenis_produk_id'],
            'harga_beli'       => $dataReq['purchase_price'],
            'harga_jual'       => $dataReq['selling_price'],
            'stok'              => $dataReq['stock'],
            'user_id'           => auth()->id(),
        ];

        /**
         * Upload foto jika ada.
         */
        if ($request->hasFile('foto')) {
            $data['foto'] = $request
                ->file('foto')
                ->store('products', 'public');
        }

        Produk::create($data);

        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail produk.
     */
    public function show(Produk $produk)
    {
        $this->authorize('view', $produk);

        $produk->load([
            'user',
            'jenisProduk',
        ]);

        return view('produk.show', compact('produk'));
    }

    /**
     * Menampilkan form edit produk.
     */
    public function edit(Produk $produk)
    {
        $this->authorize('update', $produk);

        $jenisProduks = JenisProduk::orderBy('nama_jenis', 'asc')->get();

        return view('produk.edit', compact(
            'produk',
            'jenisProduks'
        ));
    }

    /**
     * Mengupdate produk.
     */
    public function update(
        UpdateRequest $request,
        Produk $produk
    ) {
        $this->authorize('update', $produk);

        $dataReq = $request->validated();

        $data = [
            'nama'             => $dataReq['name'],
            'jenis_produk_id'  => $dataReq['jenis_produk_id'],
            'harga_beli'       => $dataReq['purchase_price'],
            'harga_jual'       => $dataReq['selling_price'],
            'stok'              => $dataReq['stock'],
        ];

        /**
         * Jika upload foto baru.
         */
        if ($request->hasFile('foto')) {

            /**
             * Hapus foto lama.
             */
            if (
                $produk->foto &&
                Storage::disk('public')->exists($produk->foto)
            ) {
                Storage::disk('public')->delete($produk->foto);
            }

            /**
             * Simpan foto baru.
             */
            $data['foto'] = $request
                ->file('foto')
                ->store('products', 'public');
        }

        $produk->update($data);

        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk berhasil diupdate.');
    }

    /**
     * Menghapus produk.
     */
    public function destroy(Produk $produk)
    {
        $this->authorize('delete', $produk);

        /**
         * Hapus foto produk.
         */
        if (
            $produk->foto &&
            Storage::disk('public')->exists($produk->foto)
        ) {
            Storage::disk('public')->delete($produk->foto);
        }

        $produk->delete();

        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk berhasil dihapus.');
    }
}
