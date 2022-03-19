<?php

namespace App\Http\Controllers\Admin;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Service\Cart\CartService;

class CartAdminController extends Controller
{
    protected $cartService;
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }
    public function index()
    {
        return view('admin.cart.orderList', [
            'title' => 'Danh sách đơn đặt hàng',
            'orders' => $this->cartService->getOrderList()
        ]);
    }
    public function showOrderDetail(Customer $customer)
    {
        $carts = $this->cartService->getProductForCart($customer);
        return view('admin.cart.orderDetail', [
            'title' => 'Chi tiết đơn hàng số ' . $customer->id,
            'customer' => $customer,
            'carts' => $carts
        ]);
    }
}
