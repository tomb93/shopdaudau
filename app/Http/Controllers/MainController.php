<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Service\Slider\SliderService;
use App\Http\Service\product\ProductService;

class MainController extends Controller
{
    protected  $sliderService, $productService;

    public function __construct(SliderService $sliders, ProductService $productService)
    {
        $this->sliderService = $sliders;
        $this->productService = $productService;
    }
    public function index()
    {
        return view('home', [
            'title' => 'Shop Đậu Đậu',
            'sliders' => $this->sliderService->showSlider(1),
            'menuBanners' => $this->sliderService->showSlider(2),
            'productsHome' => $this->productService->getProducts()
        ]);
    }
    public function loadProduct(Request $request)
    {
        $page = $request->input('productPage', 0);
        $result = $this->productService->getProducts($page);
        if (Count($result) > 0) {
            $html = view('products.list', ['productsHome' => $result])->render();
            return response()->json(['html' => $html]);
        }
        return response()->json(['html' => '']);
    }
}
