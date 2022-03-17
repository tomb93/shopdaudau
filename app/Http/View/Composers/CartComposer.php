<?php

namespace App\Http\View\Composers;

use App\Models\menu;
// use Illuminate\Support\Facades\View;
use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;

class CartComposer
{

    protected $users;


    public function __construct()
    {
    }


    public function compose(View $view)
    {
        $carts = Session::get('carts');
        if (is_null($carts)) return [];
        $product_id = array_keys($carts);
        $products = Product::select('id', 'name', 'slug', 'price', 'price_sale', 'thumb')
            ->whereIn('id', $product_id)
            ->where('active', 1)
            ->get();
        $view->with('products', $products)->with('carts', $carts);
    }
}
