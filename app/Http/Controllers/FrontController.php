<?php

namespace App\Http\Controllers;

use App\Models\HomeFirstSection;
use App\Models\HomeSecondSection;
use App\Models\HomeServicesSection;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $sliders = Slider::where('active','Yes')
                ->orderBy('id','desc')->take(3)
                ->get();
        $data['slider']= $sliders;


        $home_first_section = HomeFirstSection::all();
        $data['home_first_section']= $home_first_section;

        $home_second_section = HomeSecondSection::all();
        $data['home_second_section']= $home_second_section;

        $home_services_section = HomeServicesSection::all();
        $data['home_services_section']= $home_services_section;

        $teamMembers = User::where('role', '!=', 2)->get();
        $data['teamMembers']= $teamMembers;


        return view('front.home',$data);
    }


}
