<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\KondisiController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\ProfileController;
use App\Models\barang;
use App\Models\barangkeluar;
use App\Models\barangmasuk;
use App\Models\kategori;
use App\Models\kondisi;
use App\Models\lokasi;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $totalBarang = barang::count();
        $totalKategori = kategori::count();
        $totalLokasi = lokasi::count();
        $totalKondisi = kondisi::count();
        $totalMasuk = barangmasuk::sum('jumlah');
        $totalKeluar = barangkeluar::sum('jumlah');
        $barangs = barang::with(['kategori', 'lokasi', 'kondisi'])->latest()->take(5)->get();

        return view('dashboard', compact(
            'totalBarang',
            'totalKategori',
            'totalLokasi',
            'totalKondisi',
            'totalMasuk',
            'totalKeluar',
            'barangs'
        ));
    })->name('dashboard');

    Route::resource('barang', BarangController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('lokasi', LokasiController::class);
    Route::resource('kondisi', KondisiController::class);
    Route::resource('barang-masuk', BarangMasukController::class);
    Route::resource('barang-keluar', BarangKeluarController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
