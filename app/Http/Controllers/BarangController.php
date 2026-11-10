<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use App\Models\barang;
use App\Models\kategori;
use App\Models\lokasi;
use App\Models\kondisi;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = barang::with(['kategori', 'lokasi', 'kondisi'])->get();

        return view('barang.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = kategori::all();
        $lokasis = lokasi::all();
        $kondisis = kondisi::all();

        return view('barang.create', compact('kategoris', 'lokasis', 'kondisis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBarangRequest $request)
    {
        barang::create($request->validated());

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $barang = barang::with(['kategori', 'lokasi', 'kondisi'])->findOrFail($id);

        return view('barang.show', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $barang = barang::findOrFail($id);
        $kategoris = kategori::all();
        $lokasis = lokasi::all();
        $kondisis = kondisi::all();

        return view('barang.edit', compact('barang', 'kategoris', 'lokasis', 'kondisis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBarangRequest $request, string $id)
    {
        $barang = barang::findOrFail($id);
        $barang->update($request->validated());

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barang = barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus.');
    }
}
