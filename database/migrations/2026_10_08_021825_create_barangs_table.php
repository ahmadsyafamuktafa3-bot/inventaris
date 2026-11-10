<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang')->unique();
            $table->string('nama');
            $table->foreignId('kategori_id')->constrained('kategoris')->onDelete('restrict');
            $table->foreignId('lokasi_id')->constrained('lokasis')->onDelete('restrict');
            $table->foreignId('kondisi_id')->constrained('kondisis')->onDelete('restrict');
            $table->integer('jumlah')->default(0);
            $table->string('satuan')->default('Unit');
            $table->text('keterangan')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
