<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Service\Slider\SliderService;

class SliderController extends Controller
{
    protected $slider;
    public function __construct(SliderService $slider)
    {
        $this->slider = $slider;
    }
    public function create()
    {
        return view('admin.slider.add', [
            'title' => 'Thêm mới Silder'

        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'thumb' => 'required',
            'url' => 'required',
        ]);
        $this->slider->insert($request);
        return redirect()->back();
    }
    public function index()
    {
        return view('admin.slider.list', [
            'title' => 'Danh sách Slider mới nhất',
            'sliders' => $this->slider->get()
        ]);
    }
    public function show(Slider $slider)
    {
        return view('admin.slider.edit', [
            'title' => 'Chỉnh sửa Silder ' . $slider->name,
            'slider' => $slider
        ]);
    }

    public function update(Request $request, Slider $slider)
    {
        $this->validate($request, [
            'name' => 'required',
            'thumb' => 'required',
            'url' => 'required',
        ]);
        $result = $this->slider->update($request, $slider);
        if ($result === false) {
            return redirect()->back();
        }
        return redirect('/admin/sliders/list');
    }

    public function destroy(Request $request)
    {
        $result = $this->slider->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xoá Slider thành công'
            ]);
            return response()->json(['error' => true]);
        }
    }
}
