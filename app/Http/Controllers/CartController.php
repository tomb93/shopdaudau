<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Service\Cart\CartService;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected $cartService;
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }
    public function index(Request $request)
    {
        $result = $this->cartService->create($request);
        // dd(Session::get('carts'));
        if ($result === false) {
            //
        }
        return redirect()->back();
    }
    public function show()
    {
        $product = $this->cartService->getProducts();
        return view('carts.list', [
            'title' => 'Giỏ hàng',
            'products' => $product,
            'carts' => Session::get('carts')
        ]);
    }
    public function update(Request $request)
    {
        $this->cartService->update($request);
        return redirect('/gio-hang');
    }
    public function removeProduct($id = 0)
    {
        $this->cartService->remove($id);
        return redirect('/gio-hang');
    }
    public function removeProductCart($id = 0)
    {
        $this->cartService->remove($id);
        return redirect()->back();
    }
    public function order(Request $request)
    {
        $this->cartService->CustomerOrder($request);
        return redirect()->back();
    }
}
