<?php

namespace App\Http\Controllers;

use App\Models\lokasi;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    public function index()
    {
        $lokasis = lokasi::withCount('barang')->get();

        return view('lokasi.index', compact('lokasis'));
    }

    public function create()
    {
        return view('lokasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:225',
            'keterangan' => 'nullable|string',
        ]);

        lokasi::create($request->only('nama', 'keterangan'));

        return redirect()->route('lokasi.index')->with('success', 'Lokasi berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $lokasi = lokasi::findOrFail($id);

        return view('lokasi.edit', compact('lokasi'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|string|max:225',
            'keterangan' => 'nullable|string',
        ]);

        $lokasi = lokasi::findOrFail($id);
        $lokasi->update($request->only('nama', 'keterangan'));

        return redirect()->route('lokasi.index')->with('success', 'Lokasi berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $lokasi = lokasi::findOrFail($id);
        $lokasi->delete();

        return redirect()->route('lokasi.index')->with('success', 'Lokasi berhasil dihapus.');
    }
}
