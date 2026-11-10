<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBarangMasukRequest;
use App\Models\barang;
use App\Models\barangmasuk;
use App\Models\riwayatinventaris;
use Illuminate\Support\Facades\DB;

class BarangMasukController extends Controller
{
    public function index()
    {
        $barangMasuks = barangmasuk::with('barang')->latest()->get();

        return view('barang-masuk.index', compact('barangMasuks'));
    }

    public function create()
    {
        $barangs = barang::all();

        return view('barang-masuk.create', compact('barangs'));
    }

    public function store(StoreBarangMasukRequest $request)
    {
        DB::transaction(function () use ($request) {
            $barang = barang::findOrFail($request->barang_id);
            $stokAwal = $barang->jumlah;
            $barang->jumlah += $request->jumlah;
            $barang->save();

            barangmasuk::create([
                'barang_id' => $barang->id,
                'jumlah' => $request->jumlah,
                'tanggal' => $request->tanggal,
                'keterangan' => $request->keterangan,
                'user_id' => auth()->id(),
            ]);

            riwayatinventaris::create([
                'barang_id' => $barang->id,
                'tipe' => 'masuk',
                'jumlah' => $request->jumlah,
                'stok_awal' => $stokAwal,
                'stok_akhir' => $barang->jumlah,
                'tanggal' => $request->tanggal,
                'keterangan' => $request->keterangan,
                'user_id' => auth()->id(),
            ]);
        });

        return redirect()->route('barang-masuk.index')->with('success', 'Barang masuk berhasil dicatat.');
    }
}
