<?php

namespace App\Http\Controllers\Admin;

use App\Models\menu;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Service\Menu\MenuService;
use App\Http\Requests\Menu\CreateFormRequest;

class MenuController extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService= $menuService;
    }
    public function create()
    {
        return view('admin.menu.add', [
            'title' => 'Thêm Danh Mục',
            'menus'=> $this->menuService->getParent()
        ]);
    }
    public function store(CreateFormRequest $request)
    {
       $result= $this->menuService->create($request);
       return redirect()->back();
    }

    public function index()
    {
        return view('admin.menu.list',[
            'title'=>"Danh sách danh mục mới nhất",
            'menus'=>$this->menuService->getAll()
        ]);
    }
     public function destroy(Request $request):JsonResponse
     {
         $result=$this->menuService->destroy($request);
         if($result){
             return  response()->json([
                 'error'=>false,
                 'message'=>"Xóa thành công danh mục"
             ]);
         }
         return response()->json(['error'=>true]);
     }

     public function show(menu $menu)
     {
        return view('admin.menu.edit',[
            'title'=>"Chỉnh sửa danh mục ".$menu->name,
            'menu'=>$menu,
            'menus'=> $this->menuService->getParent()
        ]);
     }

     public function update(menu $menu,CreateFormRequest $request)
     {
        $this->menuService->update($request,$menu);
        return redirect('/admin/menu/list');
     }
}
