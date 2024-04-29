<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Client;
use App\Models\Contact;
use App\Models\HomeFirstSection;
use App\Models\HomeSecondSection;
use App\Models\HomeServicesSection;
use App\Models\Number;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Testimonial;
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

        $testimonials = Testimonial::all();
        $data['testimonials']= $testimonials;

        $clients = Client::all();
        $data['clients']= $clients;

        $teamMembers = User::where('role', '!=', 2)->get();
        $data['teamMembers']= $teamMembers;

        // $sections = Product::all()->take(6);
        // $data['sections']= $sections;

        $sectionsFilterFin = Product::where('button_name', 'filter-fin')->take(3)->get();
        $sectionsFilterSig = Product::where('button_name', 'filter-sig')->take(3)->get();
        $sections = $sectionsFilterFin->merge($sectionsFilterSig);

        $data['sections'] = $sections;

        return view('front.home',$data);
    }

    public function contact(){
        $contacts = Contact::all();
        $numbers = Number::all();
        $data['numbers']= $numbers;
        $data['contacts']= $contacts;
        return view('front.contact',$data);

    }

    public function about(){

        $home_second_section = HomeSecondSection::all();
        $data['home_second_section']= $home_second_section;

        $teamMembers = User::where('role', '!=', 2)->get();
        $data['teamMembers']= $teamMembers;

        return view('front.about',$data);

    }

    public function products(){
        $sections = Product::where("button_name", "filter-sig")->get();
        $data['sections']= $sections;
        return view('front.products',$data);
    }

    public function showProduct($slug){

        $query = Product::where('link', $slug);
        $home_first_section = HomeFirstSection::all();

        $sections = $query->firstOrFail();
        return view('front.product-post', compact('sections','home_first_section'));
    }

    public function fintech(){
        $sections = Product::where("button_name", "filter-fin")->get();
        $data['sections']= $sections;
        return view('front.fintech',$data);
    }

    public function clients(){

        $clients = Client::all();
        $data['clients']= $clients;

        return view('front.clients',$data);
    }

    public function blog(){
        $blogPosts=Blog::all();
        $data['blogPosts']= $blogPosts;

        return view('front.blog',$data);
    }

    public function showBlogPost($slug, Request $request){
        $query = Blog::where('slug', $slug);

        if(!empty($request->get('keyword'))){
            $query->where('description', 'like', '%' . $request->get('keyword') . '%');
        }

        $blogPost = $query->firstOrFail();
        return view('front.blog-post', compact('blogPost'));
    }


}
