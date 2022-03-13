<?php

namespace App\Http\Service\product;

use App\Models\menu;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductAdminService
{
    public function getMenu()
    {
        return menu::where('active', 1)->get();
    }
    public function isValidPrice($request)
    {
        if (
            $request->input('txtGiaSP') != 0 && $request->input('txtGiaSaleSP') != 0
            && (int)$request->input('txtGiaSP') <= (int)$request->input('txtGiaSaleSP')
        ) {
            Session::flash('error', 'Giá giảm phải nhỏ hơn giá gốc');
            return false;
        }
        if ($request->input('txtGiaSaleSP') != 0 && (int)$request->input('txtGiaSP') == 0) {
            Session::flash('error', 'Vui lòng nhập giá gốc');
            return false;
        }
        return true;
    }
    public function insert($request)
    {

        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice === false) return false;
        try {
            // $request->except('_token');
            // Product::create($request->all());
            Product::create([
                'name' => (string) $request->input('txtTenSP'),
                'decription' => (string) $request->input('txtDesc'),
                'content' => (string) $request->input('txtContent'),
                'menu_id' => (int) $request->input('selDMmenu'),
                'price' => (int) $request->input('txtGiaSP'),
                'price_sale' => (int) $request->input('txtGiaSaleSP'),
                'active' => (string) $request->input('active'),
                'thumb' => (string) $request->input('thumb')
            ]);
            Session::flash('success', 'Thêm sản phẩm thành công');
        } catch (\Exception $ex) {
            Session::flash('error', 'Thêm sản phẩm lỗi');
            Log::error($ex->getMessage());
            return false;
        }
    }

    public function get()
    {
        return  Product::with('menu')->orderbyDesc('id')->paginate(15);
    }

    public function update($product, $request)
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice === false) return false;
        try {
            // $product->fill($request->input()); //cach 1
            $product->name = (string) $request->input('txtTenSP');
            $product->menu_id = (int) $request->input('selDMmenu');
            $product->price = (int) $request->input('txtGiaSP');
            $product->price_sale = (int) $request->input('txtGiaSaleSP');
            $product->decription = (string) $request->input('txtDesc');
            $product->content = (string) $request->input('txtContent');
            $product->thumb = (string) $request->input('thumb');
            $product->active = (string) $request->input('active');
            $product->save();
            $request->session()->flash('success', 'Cập nhật thành công');
        } catch (\Exception $ex) {
            Log::info($ex->getMessage());
            return false;
        }
        return true;
    }

    public function delete($request)
    {
        $product = Product::where('id', $request->input('id'))->first();
        if ($product) {
            $path = str_replace('storage', 'public', $product->thumb);
            Storage::delete($path);
            $product->delete();
            return true;
        } else return false;
    }
}
