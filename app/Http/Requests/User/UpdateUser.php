<?php

namespace App\Http\Requests\User;

use App\Http\Requests\ApiRequest;

class UpdateUser extends ApiRequest
{
    public function rules(): array
    {
        return [
            'id'          => 'required|integer',
            'name'        => 'nullable|string',
            'email'       => 'nullable|string',
            'phoneNumber' => 'nullable|string',
        ];
    }
}
