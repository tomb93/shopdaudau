<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Service\Slider\SliderService;

class MainController extends Controller
{
    protected  $sliders;

    public function __construct(SliderService $sliders)
    {
        $this->sliders = $sliders;
    }
    public function index()
    {
        return view('main', [
            'title' => 'Shop Đậu Đậu',
            'sliders' => $this->sliders->showSlider(1),
            'menuBanners' => $this->sliders->showSlider(2)
        ]);
    }
}
