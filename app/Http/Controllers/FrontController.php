<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $sliders = Slider::where('active','Yes')
                ->orderBy('id','desc')->take(3)
                ->get();
        $data['slider']= $sliders;
        return view('front.home',$data);
    }
}
