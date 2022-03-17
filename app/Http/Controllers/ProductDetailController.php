<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Service\product\ProductService;

class ProductDetailController extends Controller
{
    protected $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    public function index($id = '', $slug = '')
    {
        $product = $this->productService->show($id);
        $productRelated = $this->productService->getRelate($id);
        return view('products.product-detail', [
            'title' => $product->name,
            'product' => $product,
            'productRelated' => $productRelated
        ]);
    }
}
