<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function getPopularProduct($limit = 5) // default limit
    {
        return Product::where('is_popular', true)->take($limit)->get();
    }

    public function getAllNewProduct()
    {
        return Product::latest()->get();
    }

    public function find($id)
    {
        return Product::find($id);
    }

    public function getPrice($productId)
    {
        $product = $this->find($productId);
        return $product ? $product->price : 0;
    }
}