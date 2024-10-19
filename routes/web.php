<?php

use App\Http\Controllers\Admin\CampaignController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TempImagesController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
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

Route::controller(HomeController::class)->group(function(){
    Route::get('/', 'index');
    Route::get('/pro', 'program');
    Route::get('/elements', 'elements');
    Route::get('/events', 'events');
    Route::get('/contact', 'contact');
    Route::get('/blogs', 'blog');
    Route::get('/blog_details', 'blog_details');
    Route::get('/about', 'about');

});



Route::group(['middleware' => 'guest'],function(){


    Route::get('/register',[LoginController::class,'create'])->name('auth.register');
    Route::post('/authentication',[LoginController::class,'register'])->name('register.store');

});

Route::group(['middleware' => 'guest'],function(){

    Route::get('/login',[LoginController::class,'index'])->name('auth.login');
    Route::post('/authenticate',[LoginController::class,'authenticate'])->name('auth.authenticate');


});

Route::group(['middleware' => 'auth'],function(){
   
    Route::group(['prefix' => 'admin'],function(){

        Route::get('/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');
        Route::get('/logout',[DashboardController::class,'logout'])->name('admin.logout');
        
        //Category Route
        Route::get('/categories',[CategoryController::class,'index'])->name('categories.index');
        Route::get('/categories/create',[CategoryController::class,'create'])->name('categories.create');
        Route::post('/categories',[CategoryController::class,'store'])->name('categories.store');
        Route::get('/categories/{category}/edit',[CategoryController::class,'edit'])->name('categories.edit');
        Route::put('/categories/{category}',[CategoryController::class,'update'])->name('categories.update');
        Route::delete('/categories/{category}',[CategoryController::class,'destroy'])->name('categories.delete');

        //Campaign Route
        Route::get('/campaigns',[CampaignController::class,'index'])->name('campaigns.index');
        Route::get('/campaigns/create',[CampaignController::class,'create'])->name('campaigns.create');
        Route::post('/campaigns',[CampaignController::class,'store'])->name('campaigns.store');
        Route::get('/campaigns/{campaign}/edit',[CampaignController::class,'edit'])->name('campaigns.edit');
        Route::put('/campaigns/{campaign}',[CampaignController::class,'update'])->name('campaigns.update');
        Route::delete('/campaigns/{campaign}',[CampaignController::class,'destroy'])->name('campaigns.delete');

        //temp-images route
        Route::post('/upload-temp-images',[TempImagesController::class,'create'])->name('temp-images.create');

    });

    Route::group(['prefix' => 'user'],function(){

        Route::get('/dashboard',[UserDashboardController::class,'index'])->name('user.dashboard');
        Route::get('/logout',[UserDashboardController::class,'logout'])->name('user.logout');
        
    });

});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__.'/auth.php';
