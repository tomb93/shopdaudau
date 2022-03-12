<?php

namespace App\Http\Controllers\Admin;

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
}
