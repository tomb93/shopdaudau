<?php

namespace App\Http\View\Composers;

use App\Models\menu;
// use Illuminate\Support\Facades\View;
use Illuminate\View\View;

class MenuComposer
{

    protected $users;


    public function __construct()
    {
    }


    public function compose(View $view)
    {
        $menu = menu::select('id', 'name', 'parent_id', 'slug')->where('active', 1)->orderbyDesc('id')->get();
        $view->with('menus1', $menu);
    }
}
