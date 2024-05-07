<?php

namespace App\Http\Controllers;

use App\Models\Accreditation;
use App\Models\Award;
use App\Models\Blog;
use App\Models\Client;
use App\Models\Contact;
use App\Models\HomeFirstSection;
use App\Models\HomeSecondSection;
use App\Models\HomeServicesSection;
use App\Models\Job;
use App\Models\Leader;
use App\Models\Number;
use App\Models\Product;
use App\Models\ProductFifthSection;
use App\Models\ProductFirstSection;
use App\Models\ProductFourthSection;
use App\Models\ProductSecondSection;
use App\Models\ProductSeventhSection;
use App\Models\ProductSixthSection;
use App\Models\ProductThirdSection;
use App\Models\Quality;
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

        $managements = Leader::all();
        $data['managements']= $managements;

        $accreditations= Accreditation::all();
        $data['accreditations']= $accreditations;

        $awards= Award::all();
        $data['awards']= $awards;

        $qualities= Quality::all();
        $data['qualities']= $qualities;

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

        // Retrieve the product based on the slug
        $sections = Product::where('link', $slug)->firstOrFail();

        // Retrieve the first sections related to the product
        $product_first_sections = ProductFirstSection::where('product_id', $sections->id)->get();
        $product_second_sections = ProductSecondSection::where('product_id', $sections->id)->get();
        $product_third_sections = ProductThirdSection::where('product_id', $sections->id)->get();
        $product_fourth_sections = ProductFourthSection::where('product_id', $sections->id)->get();
        $product_fifth_sections = ProductFifthSection::where('product_id', $sections->id)->get();
        $product_sixth_sections = ProductSixthSection::where('product_id', $sections->id)->get();
        $product_seventh_sections = ProductSeventhSection::where('product_id', $sections->id)->get();



        // Pass the retrieved data to the view
        return view('front.product-post', compact('sections', 'product_first_sections','product_second_sections','product_third_sections','product_fourth_sections','product_fifth_sections','product_sixth_sections','product_seventh_sections'));
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

    public function showLeaderPost($link, Request $request){
        $query = Leader::where('link', $link);
        $leaderPost = $query->firstOrFail();

        return view('front.leader-post', compact('leaderPost'));
    }

    public function showJobPost($slug, Request $request){
        $query = Job::where('slug', $slug);
        $job = $query->firstOrFail();

        return view('front.job-post', compact('job'));
    }


    public function services(){

        return view('front.services');
    }

    public function job(){
        $jobs=Job::all();
        $data['jobs']= $jobs;

        return view('front.jobs',$data);
    }


}
