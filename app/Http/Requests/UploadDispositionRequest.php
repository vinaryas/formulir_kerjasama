<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadDispositionRequest extends FormRequest
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
            'file_disposition' => 'required|file|mimes:doc,docx|max:1024',
        ];
    }

	public function messages()
	{
		return [
			'file_disposition.required' => 'Dokumen disposisi wajib diisi',
			'file_disposition.file' => 'Dokumen yang diupload harus berupa file',
			'file_disposition.mimes' => 'Dokumen yang diijinkan adalah doc/docx',
			'file_disposition.max' => 'Dokumen yang diunggah terlalu besar. Maksimal 1MB',
		];
	}
}
