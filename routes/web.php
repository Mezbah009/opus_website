<?php

use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\HomeFirstSectionController;
use App\Http\Controllers\admin\HomeSecondSectionController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\TeamController;
use App\Http\Controllers\admin\TempImagesController;
use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

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
        Route::get('/products/{products}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{products}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/products/{products}', [ProductController::class, 'destroy'])->name('products.delete');

    });
});
