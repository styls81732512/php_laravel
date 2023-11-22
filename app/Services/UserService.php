<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function findAll($request)
    {
        $limit = (int) ($request->limit);

        $builder = User::query();

        if ($request->name) {
            $builder->where('name', 'like', $request->name . '%');
        }

        if ($request->email) {
            $builder->where('email', 'like', $request->type . '%');
        }

        if ($request->uid) {
            $builder->where('uid', $request->uid);
        }

        if ($request->phoneNumber) {
            $builder->where('phoneNumber', $request->phoneNumber);
        }

        $results = $builder->paginate($limit);

        return [
            'total'   => $results->total(),
            'current' => $results->currentPage(),
            'limit'   => $limit,
            'data'    => $results->items(),
        ];
    }

    public function findOne($id)
    {
        return User::findOrFail($id);
    }

    public function update($request)
    {
        $product = User::query()->where("id", $request->id)->update([
            'name'        => $request->name,
            'email'       => $request->email,
            'phoneNumber' => $request->phoneNumber,
        ]);

        return $product;
    }
}
