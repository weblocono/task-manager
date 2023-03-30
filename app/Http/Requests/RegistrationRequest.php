<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => ['required', 'min:3', 'max:50'],
            'email' => ['required', 'email', 'unique,users.email'],
            'password' => ['required', 'confirmed', 'min:8'],
            'avatar' => ['mimes:png,jpg,jpeg'],
        ];
    }
}
