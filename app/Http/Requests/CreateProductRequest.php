<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;

class CreateProductRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'name'  => 'required|string|between:1,40',
            'title' => 'required|string',
        ];
    }
}
