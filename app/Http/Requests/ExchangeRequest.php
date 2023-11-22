<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;

class ExchangeRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'source' => 'required|string',
            'target' => 'required|string',
            'amount' => 'required|integer',
        ];
    }
}
