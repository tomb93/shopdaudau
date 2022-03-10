<?php
namespace App\Http\Service\Menu;

use App\Models\menu;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
class MenuService{
    public function getParent()
    {
        return menu::where('parent_id',0)->get();
    }
    public function getAll()
    {
        return menu::orderbyDesc('id')->paginate(20);
    }
    public function create($request){
        try{
            menu::create([
                'name'=>(string) $request->input('txtTenDM'),
                'parent_id'=>(int) $request->input('selParent_id'),
                'description'=>(string) $request->input('txtDesc'),
                'content'=>(string) $request->input('txtContent'),
                'slug'=> Str::slug($request->input('txtTenDM'),'-'),
                'active' => (string) $request->input('active')
            ]);

            Session::flash('success','Tạo danh mục thành công');
        }catch (\Exception $err){
            Session::flash('error',$err->getMessage());
            return false;
        }
    }

    public function destroy($request)
    {
        $id= (int) $request->input('id');
        $menu= menu::where('id',$id)->first();
        if($menu){
            return menu::where('id',$id)->orWhere('parent_id',$id)->delete();
        }
        return false;
    }
}