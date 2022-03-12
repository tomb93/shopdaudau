<?php

namespace App\Http\Service\Slider;

use App\Models\Slider;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

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
}
