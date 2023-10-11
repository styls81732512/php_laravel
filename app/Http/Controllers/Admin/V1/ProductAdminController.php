<?php

namespace App\Http\Controllers\Admin\V1;

use App\Http\Controllers\AdminController;
use App\Http\Requests\Product\CreateProduct;
use App\Http\Requests\Product\GetProductList;
use App\Http\Requests\Product\UpdateProduct;
use App\Services\ProductService;

class ProductAdminController extends AdminController
{

    public function __construct(
        private ProductService $productService,
    ) {
    }

    public function list(GetProductList $request)
    {
        $list = $this->productService->findAll($request);

        return $this->respondOk($list);
    }

    public function show($id)
    {
        $product = $this->productService->findOne($id);

        return $this->respondOk($product);
    }

    public function create(CreateProduct $request)
    {
        $id = $this->productService->create($request);

        return $this->respondCreated($id);
    }

    public function update(UpdateProduct $request)
    {
        $this->productService->findOne($request->id);

        $this->productService->update($request);

        return $this->respondNoContent();
    }

    public function softDelete($id)
    {
        $this->productService->findOne($id);

        $this->productService->softDelete($id);

        return $this->respondNoContent();
    }
}
