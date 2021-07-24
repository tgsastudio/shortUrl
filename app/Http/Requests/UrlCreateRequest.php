<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UrlCreateRequest extends  FormRequest
{
    public function rules(): array
    {
        return [
            'url' => 'bail|required|url|max:256',
        ];
    }

    public function messages(): array
    {
        return [
            'url.required' => 'An url is required',
        ];
    }

    /*protected function failedValidation(Validator $validator)
    {
        $message = $validator->errors();
        throw new HttpResponseException(response()->json(['status' => false, 'error' => $message->first()], 400));
    }*/
}
