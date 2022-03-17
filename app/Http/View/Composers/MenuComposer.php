<?php

namespace App\Http\View\Composers;

use App\Models\menu;
// use Illuminate\Support\Facades\View;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;

class MenuComposer
{

    protected $users;


    public function __construct()
    {
    }


    public function compose(View $view)
    {
        $carts = Session::get('carts');
        if (is_null($carts)) $numCart = 0;
        else $numCart = count($carts);
        $menu = menu::select('id', 'name', 'parent_id', 'slug')->where('active', 1)->orderBy('id')->get();
        $view->with('menus1', $menu)->with('numCart', $numCart);
    }
}
