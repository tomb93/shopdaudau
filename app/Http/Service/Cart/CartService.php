<?php

namespace App\Http\Service\Cart;

use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;

class CartService
{
    public function create($request)
    {
        $qty = (int)$request->input('num-product');

        $product_id = (int)$request->input('product_id');

        if ($qty <= 0 || $product_id <= 0) {
            Session::flash('error', 'Số lượng sản phẩm không chính xác !!');
            return false;
        }
        // Session::forget('carts');
        $carts = Session::get('carts');
        Session::save();
        if (Session::missing('carts')) {
            Session::put('carts', array(
                $product_id => $qty
            ));
            Session::save();
            return  true;
        }
        if (Arr::exists($carts, $product_id)) {
            $carts[$product_id] = $qty + $carts[$product_id];
            Session::put('carts', $carts);
            Session::save();

            return  true;
        }
        $carts[$product_id] = $qty;
        Session::put('carts', $carts);
        Session::save();
        return  true;
    }
    public function getProducts()
    {
        $carts = Session::get('carts');
        if (is_null($carts)) return [];
        $product_id = array_keys($carts);
        return Product::select('id', 'name', 'slug', 'price', 'price_sale', 'thumb')
            ->whereIn('id', $product_id)
            ->where('active', 1)
            ->get();
    }
    public function update($request)
    {
        Session::put('carts', $request->input('num-product'));
        Session::save();

        return  true;
    }
    public function remove($id)
    {
        $carts = Session::get('carts');
        unset($carts[$id]);
        Session::put('carts', $carts);
        Session::save();
        return true;
    }
}
