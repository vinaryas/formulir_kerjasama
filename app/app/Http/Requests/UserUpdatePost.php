<?php

namespace App\Http\Requests;

use App\Rules\UpdateEmail;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Auth;
use Illuminate\Http\Request;

class UserUpdatePost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        return [
            // 'password' => ['sometimes', 'string', 'min:8', 'confirmed'],
            'password' => 'sometimes|nullable|min:8|confirmed',
			'email' => [new UpdateEmail($request)]
        ];
    }
}
