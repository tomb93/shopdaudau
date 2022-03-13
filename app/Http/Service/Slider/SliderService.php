<?php

namespace App\Http\Service\Slider;

use App\Models\Slider;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class SliderService
{
    public function insert($request)
    {
        try {
            Slider::create($request->input());
            Session::flash('success', 'Thêm Slider mới thành công');
        } catch (\Exception $e) {
            Session::flash('error', 'Thêm Slider lỗi !!');
            Log::info($e->getMessage);
            return false;
        }
        return true;
    }

    public function get()
    {
        return Slider::orderbyDesc('id')->paginate(15);
    }
    public function update($request, $slider)
    {
        try {
            $slider->fill($request->input());
            $slider->save();
            Session::flash('success', 'Cập nhật Slider thành công');
        } catch (\Exception $ex) {
            Session::flash('error', 'Cập nhật Slider lỗi');
            Log::error($ex->getMessage());
            return false;
        }
        return true;
    }

    public function destroy($request)
    {
        $slider = Slider::where('id', $request->input('id'))->first();
        if ($slider) {
            $path = str_replace('storage', 'public', $slider->thumb);
            Storage::delete($path);
            $slider->delete();
            return true;
        }
        return false;
    }
}
