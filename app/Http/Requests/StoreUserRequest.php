<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name'       => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password'       => 'required|min:8'
        ];
    }
}



