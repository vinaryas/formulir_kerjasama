<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubmissionStoreRequest extends FormRequest
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
			'jenis_kerjasama' => 'required',
			'jenis_pengajuan' => 'required',
			'nama_mitra_kerjasama' => 'required',
			'alamat_mitra_kerjasama' => 'required',
			'kategori_mitra' => 'required',
			'pic_mitra' => 'required',
			'no_telp' => 'required',
			'email' => 'required|email',
			'lingkup_kerjasama' => 'required',
			'rencana_kegiatan' => 'required',
			'rencana_formalisasi' => 'required',
			'tgl' => 'required',
			'tempat' => 'required',
            'file_kerjasama' => 'required|file|mimes:doc,docx|max:1024',
            'file_perjanjian_kerjasama' => 'required|file|mimes:pdf|max:1024',
        ];
    }
	
	public function messages()
	{
		return [
			'jenis_kerjasama.required' => 'Jenis kerjasama wajib diisi',
			'jenis_pengajuan.required' => 'Jenis pengajuan wajib diisi',
			'nama_mitra_kerjasama.required' => 'Nama mitra wajib diisi',
			'alamat_mitra_kerjasama.required' => 'Alamat mitra wajib diisi',
			'kategori_mitra.required' => 'Kategori mitra wajib dipilih',
			'pic_mitra.required' => 'PIC mitra wajib diisi',
			'no_telp.required' => 'No telp mitra wajib diisi',
			'email.required' => 'Email mitra wajib diisi',
			'email.email' => 'Format email tidak sesuai',
			'lingkup_kerjasama.required' => 'Lingkup kerjasama wajib diisi',
			'rencana_kegiatan.required' => 'Rencana kegiatan wajib diisi',
			'rencana_formalisasi.required' => 'Rencana formalisasi wajib dipilih',
			'tgl.required' => 'Tanggal pengajuan wajib diisi',
			'tempat.required' => 'Tempat pengajuan wajib diisi',
			'file_kerjasama.required' => 'Dokumen pegantar kerjasama wajib diisi',
			'file_kerjasama.file' => 'Dokumen pengantar kerjasama yang diunggah harus berupa file',
			'file_kerjasama.mimes' => 'Dokumen pengantar kerjasama yang diijinkan adalah doc/docx',
			'file_kerjasama.max' => 'Dokumen pengantar kerjasama yang diunggah terlalu besar. Maksimal 1MB',
			'file_perjanjian_kerjasama.required' => 'Dokumen perjanjian kerjasama wajib diisi',
			'file_perjanjian_kerjasama.file' => 'Dokumen perjanjian kerjasama yang diunggah harus berupa file',
			'file_perjanjian_kerjasama.mimes' => 'Dokumen perjanjian kerjasama yang diijinkan adalah PDF',
			'file_perjanjian_kerjasama.max' => 'Dokumen perjanjian kerjasama yang diunggah terlalu besar. Maksimal 1MB',
		];
	}
}
