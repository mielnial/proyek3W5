<?php

namespace App\Http\Controllers;

use App\Models\Barang;

class KeranjangController extends Controller
{
    // Keranjang di session berbentuk: [id_barang => jumlah]
    // Harga TIDAK disimpan di sini, selalu diambil dari database.

    public function index()
    {
        $keranjang = session('keranjang', []);
        $barang = Barang::whereIn('id', array_keys($keranjang))->get();

        $items = [];
        $total = 0;
        foreach ($barang as $b) {
            $jumlah = $keranjang[$b->id];
            $subtotal = $b->harga * $jumlah;
            $total += $subtotal;
            $items[] = ['barang' => $b, 'jumlah' => $jumlah, 'subtotal' => $subtotal];
        }

        return view('keranjang', compact('items', 'total'));
    }

    public function tambah(Barang $barang)
    {
        $keranjang = session('keranjang', []);
        $jumlah = ($keranjang[$barang->id] ?? 0) + 1;

        if ($jumlah > $barang->stok) {
            return back()->with('error', 'Stok ' . $barang->nama . ' tidak cukup.');
        }

        $keranjang[$barang->id] = $jumlah;
        session(['keranjang' => $keranjang]);

        return back()->with('sukses', $barang->nama . ' masuk keranjang.');
    }

    public function kurang(Barang $barang)
    {
        $keranjang = session('keranjang', []);

        if (isset($keranjang[$barang->id])) {
            $keranjang[$barang->id]--;
            if ($keranjang[$barang->id] <= 0) {
                unset($keranjang[$barang->id]);
            }
            session(['keranjang' => $keranjang]);
        }

        return back();
    }

    public function hapus(Barang $barang)
    {
        $keranjang = session('keranjang', []);
        unset($keranjang[$barang->id]);
        session(['keranjang' => $keranjang]);

        return back()->with('sukses', $barang->nama . ' dihapus dari keranjang.');
    }

    public function kosongkan()
    {
        session()->forget('keranjang');
        return back()->with('sukses', 'Keranjang dikosongkan.');
    }
}