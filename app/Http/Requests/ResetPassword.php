<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPassword extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [

            //'token' => 'required',
            //'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ];

    }
}