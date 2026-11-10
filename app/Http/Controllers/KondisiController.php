<?php

namespace App\Http\Controllers;

use App\Models\kondisi;
use Illuminate\Http\Request;

class KondisiController extends Controller
{
    public function index()
    {
        $kondisis = kondisi::withCount('barang')->get();

        return view('kondisi.index', compact('kondisis'));
    }

    public function create()
    {
        return view('kondisi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:225',
        ]);

        kondisi::create($request->only('nama'));

        return redirect()->route('kondisi.index')->with('success', 'Kondisi berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $kondisi = kondisi::findOrFail($id);

        return view('kondisi.edit', compact('kondisi'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|string|max:225',
        ]);

        $kondisi = kondisi::findOrFail($id);
        $kondisi->update($request->only('nama'));

        return redirect()->route('kondisi.index')->with('success', 'Kondisi berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $kondisi = kondisi::findOrFail($id);
        $kondisi->delete();

        return redirect()->route('kondisi.index')->with('success', 'Kondisi berhasil dihapus.');
    }
}
