<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Service\Menu\MenuService;

class MenuHomeController extends Controller
{
    protected $menuService;
    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }
    public function index(Request $request, $id, $slug = '')
    {
        $menu = $this->menuService->getID($id);
        $products = $this->menuService->getProducts($menu);
        return view('products/index', [
            'title' => $menu->name,
            'productsHome' => $products,
            'menu' => $menu
        ]);
    }
}
