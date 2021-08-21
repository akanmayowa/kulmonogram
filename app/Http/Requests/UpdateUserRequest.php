<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Validation\Rule;
use App\Models\User;

class UpdateUserRequest extends FormRequest
{
 
    public function authorize()
    {
        return true;
    
    }

 
    public function rules()
    {
        return [
            'email' => 'required|email|unique:users,email,'.$this->user->id,
                 'name'       => 'required|max:255',
            ];
    }
}
