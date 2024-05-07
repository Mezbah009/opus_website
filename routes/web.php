<?php

use App\Http\Controllers\admin\AccreditationController;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\AwardController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\ClientController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\HomeFirstSectionController;
use App\Http\Controllers\admin\HomeSecondSectionController;
use App\Http\Controllers\admin\HomeServicesSectionController;
use App\Http\Controllers\admin\JobController;
use App\Http\Controllers\admin\ManagementController;
use App\Http\Controllers\admin\NumberController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ProductFirstSectionController;
use App\Http\Controllers\admin\QualityController;
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
Route::get('/jobs', [FrontController::class, 'job'])->name('front.jobs');
Route::get('products/{slug}', [FrontController::class, 'showProduct'])->name('product.show');
Route::get('blogs/{slug}', [FrontController::class, 'showBlogPost'])->name('blog.show');
Route::get('jobs/{slug}', [FrontController::class, 'showJobPost'])->name('job.show');
Route::get('leaders/{link}', [FrontController::class, 'showLeaderPost'])->name('leader.show');

Route::get('/fintech', [FrontController::class, 'fintech'])->name('front.fintech');
Route::get('/clients', [FrontController::class, 'clients'])->name('front.clients');
Route::get('/blog', [FrontController::class, 'blog'])->name('front.blog');
Route::get('/services', [FrontController::class, 'services'])->name('front.services');


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

        // Product First section
        Route::get('/products/{id}/product_first_section', [ProductController::class, 'indexFirstSection'])->name('product_first_section.index');
        Route::get('/products/{id}/product_first_section/create', [ProductController::class, 'createFirstSection'])->name('product_first_section.create');
        Route::post('/products/{id}/product_first_section', [ProductController::class, 'storeFirstSection'])->name('product_first_section.store');
        Route::get('/product_first_sections/{section_id}/edit', [ProductController::class, 'editFirstSection'])->name('product_first_section.edit');
        Route::put('/products/product_first_sections/{section_id}', [ProductController::class, 'updateFirstSection'])->name('product_first_section.update');
        Route::delete('/products/{product_id}/product_first_sections/{section_id}', [ProductController::class, 'destroyFirstSection'])->name('product_first_section.delete');

        // Product Second section
        Route::get('/products/{id}/product_second_section', [ProductController::class, 'indexSecondSection'])->name('product_second_section.index');
        Route::get('/products/{id}/product_second_section/create', [ProductController::class, 'createSecondSection'])->name('product_second_section.create');
        Route::post('/products/{id}/product_second_section', [ProductController::class, 'storeSecondSection'])->name('product_second_section.store');
        Route::get('/product_second_section/{section_id}/edit', [ProductController::class, 'editSecondSection'])->name('product_second_section.edit');
        Route::put('/products/product_second_section/{section_id}', [ProductController::class, 'updateSecondSection'])->name('product_second_section.update');
        Route::delete('/products/{product_id}/product_second_section/{section_id}', [ProductController::class, 'destroySecondSection'])->name('product_second_section.delete');

        // Product Third section
        Route::get('/products/{id}/product_third_section', [ProductController::class, 'indexThirdSection'])->name('product_third_section.index');
        Route::get('/products/{id}/product_third_section/create', [ProductController::class, 'createThirdSection'])->name('product_third_section.create');
        Route::post('/products/{id}/product_third_section', [ProductController::class, 'storeThirdSection'])->name('product_third_section.store');
        Route::get('/product_third_section/{section_id}/edit', [ProductController::class, 'editThirdSection'])->name('product_third_section.edit');
        Route::put('/products/product_third_section/{section_id}', [ProductController::class, 'updateThirdSection'])->name('product_third_section.update');
        Route::delete('/products/{product_id}/product_third_section/{section_id}', [ProductController::class, 'destroyThirdSection'])->name('product_third_section.delete');

        // Product Fourth section
        Route::get('/products/{id}/product_fourth_section', [ProductController::class, 'indexFourthSection'])->name('product_fourth_section.index');
        Route::get('/products/{id}/product_fourth_section/create', [ProductController::class, 'createFourthSection'])->name('product_fourth_section.create');
        Route::post('/products/{id}/product_fourth_section', [ProductController::class, 'storeFourthSection'])->name('product_fourth_section.store');
        Route::get('/product_fourth_section/{section_id}/edit', [ProductController::class, 'editFourthSection'])->name('product_fourth_section.edit');
        Route::put('/products/product_fourth_section/{section_id}', [ProductController::class, 'updateFourthSection'])->name('product_fourth_section.update');
        Route::delete('/products/{product_id}/product_fourth_section/{section_id}', [ProductController::class, 'destroyFourthSection'])->name('product_fourth_section.delete');

        // Product Fifth section
        Route::get('/products/{id}/product_fifth_section', [ProductController::class, 'indexFifthSection'])->name('product_fifth_section.index');
        Route::get('/products/{id}/product_fifth_section/create', [ProductController::class, 'createFifthSection'])->name('product_fifth_section.create');
        Route::post('/products/{id}/product_fifth_section', [ProductController::class, 'storeFifthSection'])->name('product_fifth_section.store');
        Route::get('/product_fifth_section/{section_id}/edit', [ProductController::class, 'editFifthSection'])->name('product_fifth_section.edit');
        Route::put('/products/product_fifth_section/{section_id}', [ProductController::class, 'updateFifthSection'])->name('product_fifth_section.update');
        Route::delete('/products/{product_id}/product_fifth_section/{section_id}', [ProductController::class, 'destroyFifthSection'])->name('product_fifth_section.delete');

        // Product Sixth section
        Route::get('/products/{id}/product_sixth_section', [ProductController::class, 'indexSixthSection'])->name('product_sixth_section.index');
        Route::get('/products/{id}/product_sixth_section/create', [ProductController::class, 'createSixthSection'])->name('product_sixth_section.create');
        Route::post('/products/{id}/product_sixth_section', [ProductController::class, 'storeSixthSection'])->name('product_sixth_section.store');
        Route::get('/product_sixth_section/{section_id}/edit', [ProductController::class, 'editSixthSection'])->name('product_sixth_section.edit');
        Route::put('/products/product_sixth_section/{section_id}', [ProductController::class, 'updateSixthSection'])->name('product_sixth_section.update');
        Route::delete('/products/{product_id}/product_sixth_section/{section_id}', [ProductController::class, 'destroySixthSection'])->name('product_sixth_section.delete');

        // Product Seventh section
        Route::get('/products/{id}/product_seventh_section', [ProductController::class, 'indexSeventhSection'])->name('product_seventh_section.index');
        Route::get('/products/{id}/product_seventh_section/create', [ProductController::class, 'createSeventhSection'])->name('product_seventh_section.create');
        Route::post('/products/{id}/product_seventh_section', [ProductController::class, 'storeSeventhSection'])->name('product_seventh_section.store');
        Route::get('/product_seventh_section/{section_id}/edit', [ProductController::class, 'editSeventhSection'])->name('product_seventh_section.edit');
        Route::put('/products/product_seventh_section/{section_id}', [ProductController::class, 'updateSeventhSection'])->name('product_seventh_section.update');
        Route::delete('/products/{product_id}/product_seventh_section/{section_id}', [ProductController::class, 'destroySeventhSection'])->name('product_seventh_section.delete');

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

        // about management section
        Route::get('/managements', [ManagementController::class, 'index'])->name('managements.index');
        Route::get('/managements/create', [ManagementController::class, 'create'])->name('managements.create');
        Route::post('/managements', [ManagementController::class, 'store'])->name('managements.store');
        Route::get('/managements/{id}', [ManagementController::class, 'show'])->name('managements.show');
        Route::get('/managements/{managements}/edit', [ManagementController::class, 'edit'])->name('managements.edit');
        Route::put('/managements/{managements}', [ManagementController::class, 'update'])->name('managements.update');
        Route::delete('/managements/{managements}', [ManagementController::class, 'destroy'])->name('managements.delete');

        // about Accreditation section
        Route::get('/accreditation', [AccreditationController::class, 'index'])->name('accreditation.index');
        Route::get('/accreditation/create', [AccreditationController::class, 'create'])->name('accreditation.create');
        Route::post('/accreditation', [AccreditationController::class, 'store'])->name('accreditation.store');
        Route::get('/accreditation/{accreditation}/edit', [AccreditationController::class, 'edit'])->name('accreditation.edit');
        Route::put('/accreditation/{accreditation}', [AccreditationController::class, 'update'])->name('accreditation.update');
        Route::delete('/accreditation/{accreditation}', [AccreditationController::class, 'destroy'])->name('accreditation.delete');

        // about Awards section
        Route::get('/awards', [AwardController::class, 'index'])->name('awards.index');
        Route::get('/awards/create', [AwardController::class, 'create'])->name('awards.create');
        Route::post('/awards', [AwardController::class, 'store'])->name('awards.store');
        Route::get('/awards/{awards}/edit', [AwardController::class, 'edit'])->name('awards.edit');
        Route::put('/awards/{awards}', [AwardController::class, 'update'])->name('awards.update');
        Route::delete('/awards/{awards}', [AwardController::class, 'destroy'])->name('awards.delete');

        // about Quality Management section
        Route::get('/quality', [QualityController::class, 'index'])->name('quality.index');
        Route::get('/quality/create', [QualityController::class, 'create'])->name('quality.create');
        Route::post('/quality', [QualityController::class, 'store'])->name('quality.store');
        Route::get('/quality/{quality}/edit', [QualityController::class, 'edit'])->name('quality.edit');
        Route::put('/quality/{quality}', [QualityController::class, 'update'])->name('quality.update');
        Route::delete('/quality/{quality}', [QualityController::class, 'destroy'])->name('quality.delete');

        // Jobs
        Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
        Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');
        Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store');
        Route::get('/jobs/{jobs}/edit', [JobController::class, 'edit'])->name('jobs.edit');
        Route::put('/jobs/{jobs}', [JobController::class, 'update'])->name('jobs.update');
        Route::delete('/jobs/{jobs}', [JobController::class, 'destroy'])->name('jobs.delete');



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
