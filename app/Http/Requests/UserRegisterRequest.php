<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRegisterRequest extends  FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:24',
            'email' => 'required|email|max:256',
            'password' => 'required|string|max:64',
        ];
    }
}
