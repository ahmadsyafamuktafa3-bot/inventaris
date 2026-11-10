<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreBarangKeluarRequest extends FormRequest
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
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function($validator) {
            $barang = \App\Models\barang::find($this->barang_id);
            if ($barang && $this->jumlah > $barang->jumlah) {
                $validator->errors()->add('jumlah', 'Stok tidak mencukupi. Stok tersedia: ' . $barang->jumlah);
            }
        });
    }
}
