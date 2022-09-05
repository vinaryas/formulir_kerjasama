<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Auth;

class UserPost extends FormRequest
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
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email', 
                        Rule::unique('users')->where(function ($query) {
                            return $query->where('username', Auth::user()->username);
                        })],
            'username' => ['required', 'string', 'max:15', 
                        Rule::unique('users')->where(function ($query) {
                            return $query->where('username', Auth::user()->username);
                        })],
            'role_id' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }
}
