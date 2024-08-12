<?php

namespace App\Repositories;

use App\Repositories\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAllProducts()
    {
        return Product::all();
    }

    public function getProductById($id)
    {
        return Product::findOrFail($id);
    }
    public function create(array $data)
    {
        return Product::create($data);
    }

    public function update(array $data, $id)
    {
        $product = Product::findOrfail($id);
        $product->update($data);
        return $product;
    }


    public function delete($id)
    {
        return Product::findOrFail($id)->delete();
    }
}
