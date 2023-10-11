<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    public function findAll($request)
    {
        $limit = (int) ($request->limit);

        $builder = Product::query();

        if ($request->name) {
            $builder->where('name', 'like', $request->name . '%');
        }

        if ($request->type) {
            $builder->where('type', $request->type);
        }

        if ($request->enabled != null) {
            $builder->where('enabled', $request->enabled);
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
        return Product::findOrFail($id);
    }

    public function create($request)
    {
        $product              = new Product();
        $product->name        = $request->name;
        $product->subTitle    = $request->subTitle;
        $product->type        = $request->type;
        $product->photoSid    = $request->photoSid;
        $product->description = $request->description;
        $product->price       = $request->price;
        $product->finalPrice  = $request->finalPrice;

        $product->save();

        return $product->id;
    }

    public function update($request)
    {
        $product = Product::query()->where("id", $request->id)->update([
            'name'        => $request->name,
            'subTitle'    => $request->subTitle,
            'type'        => $request->type,
            'photoSid'    => $request->photoSid,
            'description' => $request->description,
            'price'       => $request->price,
            'finalPrice'  => $request->finalPrice,
        ]);

        return $product;
    }

    public function softDelete($id)
    {
        $product = Product::find($id)->delete();

        return $product;
    }
}
