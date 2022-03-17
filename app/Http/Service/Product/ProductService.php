<?php

namespace App\Http\Service\product;

use App\Models\Product;

class ProductService
{
    const LIMIT = 12;
    public function getProducts($page = null)
    {
        return Product::select('id', 'name', 'slug', 'price', 'price_sale', 'thumb')
            ->where('active', 1)
            ->orderbyDesc('id')
            ->when($page != null, function ($query) use ($page) {
                $query->offset($page * self::LIMIT);
            })
            ->limit(self::LIMIT)
            ->get();
    }
    public function show($id)
    {
        return Product::where('id', $id)
            ->where('active', 1)
            ->with('menu')
            ->firstOrFail();
    }
    public function getRelate($id)
    {
        return Product::select('id', 'name', 'slug', 'price', 'price_sale', 'thumb')
            ->where('id', '!=', $id)
            ->where('active', 1)
            ->orderbyDesc('id')
            ->limit(8)
            ->get();
    }
}
