<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreBarangRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'kode_barang' => 'required|unique:barangs,kode_barang',
            'nama' => 'required|string|max:225',
            'kategori_id' => 'required|exists:kategoris,id',
            'lokasi_id' => 'required|exists:lokasis,id',
            'kondisi_id' => 'required|exists:kondisis,id',
            'jumlah' => 'required|integer|min:0',
            'satuan' => 'required|string|max:50',
            'keterangan' => 'nullable|string',
        ];
    }
}
