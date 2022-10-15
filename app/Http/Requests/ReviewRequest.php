<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'file_review' => 'required|file|mimes:doc,docx|max:1024',
        ];
    }

	public function messages()
	{
		return [
			'file_review.required' => 'Dokumen review wajib diisi',
			'file_review.file' => 'Dokumen yang diupload harus berupa file',
			'file_review.mimes' => 'Dokumen yang diijinkan adalah doc/docx',
			'file_review.max' => 'Dokumen yang diunggah terlalu besar. Maksimal 1MB',
		];
	}
}
