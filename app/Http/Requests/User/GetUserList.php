<?php

namespace App\Http\Requests\User;

use App\Http\Requests\ApiRequest;

class GetUserList extends ApiRequest
{
    public function rules(): array
    {
        return [
            'page'        => 'required|integer',
            'limit'       => 'required|integer',
            'name'        => 'nullable|string',
            'email'       => 'nullable|string',
            'uid'         => 'nullable|string',
            'phoneNumber' => 'nullable|string',
        ];
    }
}
