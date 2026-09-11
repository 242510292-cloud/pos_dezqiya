<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SearchRequest $request)
    {
        $user = Auth::user();
        $keyword = $request->input('search');

        $sales = Penjualan::query()

            ->when($user->role->name === 'kasir', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })

            ->when($keyword, function ($query) use ($keyword) {
                $query->whereHas('user', function ($q) use ($keyword) {
                    $q->where(
                        'name',
                        'like',
                        '%' . $keyword . '%'
                    );
                });
            })

            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'penjualan.index',
            compact('sales')
        );
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(SearchRequest $request)
    {
        $sale = Penjualan::firstOrCreate(
            [
                'user_id' => Auth::id(),
                'status' => 'OPEN'
            ],
            [
                'total_pembayaran' => 0,
                'metode_pembayaran' => 'CASH'
            ]
        );

        $keyword = $request->input('search');

        if ($keyword) {

            $products = Produk::where(
                'nama',
                'like',
                '%' . $keyword . '%'
            )
            ->orderBy('nama')
            ->get();

        } else {

            $products = Produk::orderBy('nama')->get();

        }

        $mode = 'create';

        return view(
            'penjualan.pos',
            compact(
                'sale',
                'products',
                'mode'
            )
        );
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Display the specified resource.
     */
    public function show(Penjualan $penjualan)
    {
        $penjualan->load(
            'user',
            'itemPenjualan.produk'
        );

        return view(
            'penjualan.show',
            compact('penjualan')
        );
    }


    /**
     * CETAK STRUK PENJUALAN
     */
    public function struk(Penjualan $penjualan)
    {
        $penjualan->load(
            'user',
            'itemPenjualan.produk'
        );

        return view(
            'penjualan.struk',
            compact('penjualan')
        );
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penjualan $penjualan)
    {
        $sale = $penjualan;

        abort_if(
            $sale->status === 'COMPLETED',
            403
        );

        $sale->load('itemPenjualan');

        $products = Produk::orderBy('nama')->get();

        $mode = 'edit';

        return view(
            'penjualan.pos',
            compact(
                'sale',
                'products',
                'mode'
            )
        );
    }


    /**
     * UPDATE / CHECKOUT
     */
    public function update(
        Request $request,
        Penjualan $penjualan
    ) {
        /*
        |--------------------------------------------------------------------------
        | VALIDASI
        |--------------------------------------------------------------------------
        */

        $request->validate([
            'payment_method' => 'required|in:CASH,QRIS'
        ]);


        /*
        |--------------------------------------------------------------------------
        | CEK STATUS
        |--------------------------------------------------------------------------
        */

        if ($penjualan->status !== 'OPEN') {

            return back()->with(
                'errors',
                'Transaksi sudah diproses'
            );

        }


        /*
        |--------------------------------------------------------------------------
        | CEK KERANJANG
        |--------------------------------------------------------------------------
        */

        if (
            $penjualan
                ->itemPenjualan()
                ->count() === 0
        ) {

            return back()->with(
                'errors',
                'Keranjang masih kosong'
            );

        }


        /*
        |--------------------------------------------------------------------------
        | HITUNG TOTAL
        |--------------------------------------------------------------------------
        */

        $total = $penjualan
            ->itemPenjualan()
            ->sum('subtotal');


        /*
        |--------------------------------------------------------------------------
        | PEMBAYARAN QRIS
        |--------------------------------------------------------------------------
        */

        if ($request->payment_method === 'QRIS') {

            /*
             * Simpan metode pembayaran dan total.
             *
             * STATUS MASIH OPEN.
             */

            $penjualan->update([
                'metode_pembayaran' => 'QRIS',
                'total_pembayaran' => $total
            ]);


            /*
             |--------------------------------------------------------------------------
             | DATA QR
             |--------------------------------------------------------------------------
             |
             | Data ini akan dikirim ke qris.blade.php.
             | QR Code dibuat menggunakan JavaScript.
             |
             */

            $qrData = json_encode([
                'merchant' => 'POS INVENTORY',
                'transaction_id' => $penjualan->id,
                'amount' => $total,
                'currency' => 'IDR'
            ]);


            /*
             |--------------------------------------------------------------------------
             | TAMPILKAN HALAMAN QRIS
             |--------------------------------------------------------------------------
             */

            return view(
                'penjualan.qris',
                compact(
                    'penjualan',
                    'total',
                    'qrData'
                )
            );
        }


        /*
        |--------------------------------------------------------------------------
        | PEMBAYARAN CASH
        |--------------------------------------------------------------------------
        */

        DB::transaction(function () use (
            $penjualan,
            $total
        ) {

            $penjualan->update([
                'metode_pembayaran' => 'CASH',
                'total_pembayaran' => $total,
                'status' => 'COMPLETED'
            ]);

        });


        return redirect()
            ->route('penjualan.index')
            ->with(
                'success',
                'Transaksi berhasil diselesaikan'
            );
    }


    /**
     * KONFIRMASI PEMBAYARAN QRIS
     */
    public function confirmQris(
        Penjualan $penjualan
    ) {
        /*
        |--------------------------------------------------------------------------
        | CEK STATUS
        |--------------------------------------------------------------------------
        */

        if ($penjualan->status !== 'OPEN') {

            return redirect()
                ->route('penjualan.index')
                ->with(
                    'errors',
                    'Transaksi sudah diproses'
                );

        }


        /*
        |--------------------------------------------------------------------------
        | CEK METODE PEMBAYARAN
        |--------------------------------------------------------------------------
        */

        if (
            $penjualan->metode_pembayaran !== 'QRIS'
        ) {

            return redirect()
                ->route('penjualan.index')
                ->with(
                    'errors',
                    'Metode pembayaran bukan QRIS'
                );

        }


        /*
        |--------------------------------------------------------------------------
        | CEK ITEM
        |--------------------------------------------------------------------------
        */

        if (
            $penjualan
                ->itemPenjualan()
                ->count() === 0
        ) {

            return redirect()
                ->route('penjualan.index')
                ->with(
                    'errors',
                    'Keranjang masih kosong'
                );

        }


        /*
        |--------------------------------------------------------------------------
        | SELESAIKAN TRANSAKSI
        |--------------------------------------------------------------------------
        */

        DB::transaction(function () use (
            $penjualan
        ) {

            $total = $penjualan
                ->itemPenjualan()
                ->sum('subtotal');


            $penjualan->update([
                'metode_pembayaran' => 'QRIS',
                'total_pembayaran' => $total,
                'status' => 'COMPLETED'
            ]);

        });


        return redirect()
            ->route('penjualan.index')
            ->with(
                'success',
                'Pembayaran QRIS berhasil dikonfirmasi'
            );
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Penjualan $penjualan
    ) {
        $this->authorize(
            'delete',
            $penjualan
        );


        if ($penjualan->status !== 'OPEN') {

            return redirect()
                ->route('penjualan.index')
                ->with(
                    'errors',
                    'Transaksi sudah selesai tidak bisa dibatalkan'
                );

        }


        DB::transaction(function () use (
            $penjualan
        ) {

            /*
             * Kembalikan stok
             */

            foreach (
                $penjualan->itemPenjualan as $item
            ) {

                $item->produk->increment(
                    'stok',
                    $item->kuantitas
                );

            }


            /*
             * Hapus item
             */

            $penjualan
                ->itemPenjualan()
                ->delete();


            /*
             * Hapus penjualan
             */

            $penjualan->delete();

        });


        return redirect()
            ->route('penjualan.index')
            ->with(
                'success',
                'Transaksi berhasil dibatalkan'
            );
    }
}
