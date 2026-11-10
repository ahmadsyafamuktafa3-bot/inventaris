<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBarangKeluarRequest;
use App\Models\barang;
use App\Models\barangkeluar;
use App\Models\riwayatinventaris;
use Illuminate\Support\Facades\DB;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $barangKeluars = barangkeluar::with('barang')->latest()->get();

        return view('barang-keluar.index', compact('barangKeluars'));
    }

    public function create()
    {
        $barangs = barang::all();

        return view('barang-keluar.create', compact('barangs'));
    }

    public function store(StoreBarangKeluarRequest $request)
    {
        DB::transaction(function () use ($request) {
            $barang = barang::findOrFail($request->barang_id);
            $stokAwal = $barang->jumlah;
            $barang->jumlah -= $request->jumlah;
            $barang->save();

            barangkeluar::create([
                'barang_id' => $barang->id,
                'jumlah' => $request->jumlah,
                'tanggal' => $request->tanggal,
                'keterangan' => $request->keterangan,
                'user_id' => auth()->id(),
            ]);

            riwayatinventaris::create([
                'barang_id' => $barang->id,
                'tipe' => 'keluar',
                'jumlah' => $request->jumlah,
                'stok_awal' => $stokAwal,
                'stok_akhir' => $barang->jumlah,
                'tanggal' => $request->tanggal,
                'keterangan' => $request->keterangan,
                'user_id' => auth()->id(),
            ]);
        });

        return redirect()->route('barang-keluar.index')->with('success', 'Barang keluar berhasil dicatat.');
    }
}
