<?php

namespace App\Http\Requests\Product;

use App\Enums\ProductType;
use App\Http\Requests\ApiRequest;
use Illuminate\Validation\Rules\Enum;

class GetProductList extends ApiRequest
{
    public function rules(): array
    {
        return [
            'page'    => 'required|integer',
            'limit'   => 'required|integer',
            'name'    => 'nullable|string',
            'type'    => ['nullable', new Enum(ProductType::class)],
            'enabled' => 'nullable|boolean',
        ];
    }
}
