<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadFinalRequest extends FormRequest
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
            'file_final' => 'required|file|mimes:doc,docx|max:1024',
        ];
    }

	public function messages()
	{
		return [
			'file_final.required' => 'Dokumen final wajib diisi',
			'file_final.file' => 'Dokumen yang diupload harus berupa file',
			'file_final.mimes' => 'Dokumen yang diijinkan adalah doc/docx',
			'file_final.max' => 'Dokumen yang diunggah terlalu besar. Maksimal 1MB',
		];
	}
}
