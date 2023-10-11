<?php

namespace App\Http\Requests\Product;

use App\Enums\ProductType;
use App\Http\Requests\ApiRequest;
use Illuminate\Validation\Rules\Enum;

class UpdateProduct extends ApiRequest
{
    public function rules(): array
    {
        return [
            'id'          => 'required|integer',
            'name'        => 'required|string|between:1,40',
            'subTitle'    => 'nullable|string|between:1,40',
            'type'        => ['required', new Enum(ProductType::class)],
            'photoSid'    => 'nullable|string',
            'description' => 'required|string',
            'price'       => 'nullable|integer',
            'finalPrice'  => 'nullable|integer',
        ];
    }
}
