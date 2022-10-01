<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBarangRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'kode' => 'required',
            'nama' => 'required',
            'id_jenis_barang' => 'required',
            'no_registrasi' => 'required',
            'id_type_barang' => 'required',
            'harga' => 'required|numeric',
        ];
    }

	public function messages()
	{
		return [
			'kode.required' => 'Kode barang harus diisi',
			'nama.required' => 'Nama barang harus diisi',
			'id_jenis_barang.required' => 'Jenis barang harus dipilih',
			'no_registrasi.required' => 'No registrasi harus diisi',
			'id_type_barang.required' => 'Type Barang harus dipilih',
			'harga.required' => 'Harga Barang harus diisi',
			'harga.numeric' => 'Harga Barang harus numeric',
		];
	}
}
