<?php

use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\ClientController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\HomeFirstSectionController;
use App\Http\Controllers\admin\HomeSecondSectionController;
use App\Http\Controllers\admin\HomeServicesSectionController;
use App\Http\Controllers\admin\NumberController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ProductFirstSectionController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\TeamController;
use App\Http\Controllers\admin\TempImagesController;
use App\Http\Controllers\admin\TestimonialController;
use App\Http\Controllers\FrontController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontController::class, 'index'])->name('front.home');
Route::get('/contact-us', [FrontController::class, 'contact'])->name('front.contact');
Route::get('/about-us', [FrontController::class, 'about'])->name('front.about');
Route::get('/products', [FrontController::class, 'products'])->name('front.products');
Route::get('products/{slug}', [FrontController::class, 'showProduct'])->name('product.show');

Route::get('/fintech', [FrontController::class, 'fintech'])->name('front.fintech');
Route::get('/clients', [FrontController::class, 'clients'])->name('front.clients');
Route::get('/blog', [FrontController::class, 'blog'])->name('front.blog');

Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'admin.guest'], function () {
        Route::get('/login', [AdminLoginController::class, 'index'])->name('admin.login');
        Route::post('/authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');
    });

    Route::group(['middleware' => 'admin.auth'], function () {
        Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
        Route::get('/change-password', [SettingController::class, 'showChangePassword'])->name('admin.showChangePassword');
        Route::post('/process-change-password', [SettingController::class, 'processChangePassword'])->name('admin.processChangePassword');
        Route::get('/logout', [HomeController::class, 'logout'])->name('admin.logout');

        /*slider*/
        Route::get('/sliders', [SliderController::class, 'index'])->name('sliders.index');
        Route::get('/sliders/create', [SliderController::class, 'create'])->name('sliders.create');
        Route::post('/sliders', [SliderController::class, 'store'])->name('sliders.store');
        Route::get('/sliders/{sliders}/edit', [SliderController::class, 'edit'])->name('sliders.edit');
        Route::put('/sliders/{sliders}', [SliderController::class, 'update'])->name('sliders.update');
        Route::delete('/sliders/{sliders}', [SliderController::class, 'destroy'])->name('sliders.delete');
        // temp-image create
        Route::post('/upload-temp-image', [TempImagesController::class, 'create'])->name('temp-images.create');

        /* Team Members */
        Route::get('/team-members', [TeamController::class, 'index'])->name('team_members.index');
        Route::get('/team-members/create', [TeamController::class, 'create'])->name('team_members.create');
        Route::post('/team-members', [TeamController::class, 'store'])->name('team_members.store');
        Route::get('/team-members/{teamMember}/edit', [TeamController::class, 'edit'])->name('team_members.edit');
        Route::put('/team-members/{teamMember}', [TeamController::class, 'update'])->name('team_members.update');
        Route::delete('/team-members/{teamMember}', [TeamController::class, 'destroy'])->name('team_members.delete');

        // Home first section
        Route::get('/home_first_sections', [HomeFirstSectionController::class, 'index'])->name('home_first_sections.index');
        Route::get('/home_first_sections/create', [HomeFirstSectionController::class, 'create'])->name('home_first_sections.create');
        Route::post('/home_first_sections', [HomeFirstSectionController::class, 'store'])->name('home_first_sections.store');
        Route::get('/home_first_sections/{first_section}/edit', [HomeFirstSectionController::class, 'edit'])->name('home_first_sections.edit');
        Route::put('/home_first_sections/{first_section}', [HomeFirstSectionController::class, 'update'])->name('home_first_sections.update');
        Route::delete('/home_first_sections/{first_section}', [HomeFirstSectionController::class, 'destroy'])->name('home_first_sections.delete');
        // Home second section
        Route::get('/home_second_section', [HomeSecondSectionController::class, 'index'])->name('home_second_sections.index');
        Route::get('/home_second_section/create', [HomeSecondSectionController::class, 'create'])->name('home_second_sections.create');
        Route::post('/home_second_section', [HomeSecondSectionController::class, 'store'])->name('home_second_sections.store');
        Route::get('/home_second_section/{second_section}/edit', [HomeSecondSectionController::class, 'edit'])->name('home_second_sections.edit');
        Route::put('/home_second_section/{second_section}', [HomeSecondSectionController::class, 'update'])->name('home_second_sections.update');
        Route::delete('/home_second_section/{second_section}', [HomeSecondSectionController::class, 'destroy'])->name('home_second_sections.delete');

        // Home Product section
        Route::get('/products', [ProductController::class, 'index'])->name('products.index');
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/products', [ProductController::class, 'store'])->name('products.store');
        Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
        Route::get('/products/{products}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{products}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/products/{products}', [ProductController::class, 'destroy'])->name('products.delete');

        // Home Service section
        Route::get('/home_services', [HomeServicesSectionController::class, 'index'])->name('home_services_section.index');
        Route::get('/home_services/create', [HomeServicesSectionController::class, 'create'])->name('home_services_section.create');
        Route::post('/home_services', [HomeServicesSectionController::class, 'store'])->name('home_services_section.store');
        Route::get('/home_services/{home_services}/edit', [HomeServicesSectionController::class, 'edit'])->name('home_services_section.edit');
        Route::put('/home_services/{home_services}', [HomeServicesSectionController::class, 'update'])->name('home_services_section.update');
        Route::delete('/home_services/{home_services}', [HomeServicesSectionController::class, 'destroy'])->name('home_services_section.delete');

         // Testimonials
        Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');
        Route::get('/testimonials/create', [TestimonialController::class, 'create'])->name('testimonials.create');
        Route::post('/testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');
        Route::get('/testimonials/{testimonials}/edit', [TestimonialController::class, 'edit'])->name('testimonials.edit');
        Route::put('/testimonials/{testimonials}', [TestimonialController::class, 'update'])->name('testimonials.update');
        Route::delete('/testimonials/{testimonials}', [TestimonialController::class, 'destroy'])->name('testimonials.delete');

        // Clients
        Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
        Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
        Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
        Route::get('/clients/{clients}/edit', [ClientController::class, 'edit'])->name('clients.edit');
        Route::put('/clients/{clients}', [ClientController::class, 'update'])->name('clients.update');
        Route::delete('/clients/{clients}', [ClientController::class, 'destroy'])->name('clients.delete');

        // Blog
        Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
        Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
        Route::post('/blog', [BlogController::class, 'store'])->name('blog.store');
        Route::get('/blog/{blog}/edit', [BlogController::class, 'edit'])->name('blog.edit');
        Route::put('/blog/{blog}', [BlogController::class, 'update'])->name('blog.update');
        Route::delete('/blog/{blog}', [BlogController::class, 'destroy'])->name('blog.delete');

        // Contact
        Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
        Route::get('/contact/create', [ContactController::class, 'create'])->name('contact.create');
        Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
        Route::get('/contact/{contact}/edit', [ContactController::class, 'edit'])->name('contact.edit');
        Route::put('/contact/{contact}', [ContactController::class, 'update'])->name('contact.update');
        Route::delete('/contact/{contact}', [ContactController::class, 'destroy'])->name('contact.delete');

        // Number
        Route::get('/numbers', [NumberController::class, 'index'])->name('numbers.index');
        Route::get('/numbers/create', [NumberController::class, 'create'])->name('numbers.create');
        Route::post('/numbers', [NumberController::class, 'store'])->name('numbers.store');
        Route::get('/numbers/{numbers}/edit', [NumberController::class, 'edit'])->name('numbers.edit');
        Route::put('/numbers/{numbers}', [NumberController::class, 'update'])->name('numbers.update');
        Route::delete('/numbers/{numbers}', [NumberController::class, 'destroy'])->name('numbers.delete');


        // Product First section
        Route::get('/product_first_section', [ProductFirstSectionController::class, 'index'])->name('product_first_section.index');
        Route::get('/product_first_section/create', [ProductFirstSectionController::class, 'create'])->name('product_first_section.create');
        Route::post('/product_first_section', [ProductFirstSectionController::class, 'store'])->name('product_first_section.store');
        Route::get('/product_first_section/{product_first_section}/edit', [ProductFirstSectionController::class, 'edit'])->name('product_first_section.edit');
        Route::put('/product_first_section/{product_first_section}', [ProductFirstSectionController::class, 'update'])->name('product_first_section.update');
        Route::delete('/product_first_section/{product_first_section}', [ProductFirstSectionController::class, 'destroy'])->name('product_first_section.delete');

        Route::get('/getSlug', function (Request $request) {
            $slug = '';
            if (!empty($request->title)) {
                $slug = Str::slug($request->title);  // Corrected to Str::slug
            }
            return response()->json([
                'status' => true,
                'slug' => $slug,
            ]);
        })->name('getSlug');

    });

});
