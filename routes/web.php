<?php

use App\Http\Controllers\Admin\CampaignController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DonationController as AdminDonationController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\TempImagesController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\VolunteerController;
use App\Http\Controllers\Admin\WithdrawLogsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\User\CampaignController as UserCampaignController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\DonationController;
use App\Http\Controllers\User\GalleryController as UserGalleryController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\WithdrawController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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
    Route::get('/', 'index')->name('home');
    Route::get('/pro', 'program');
    Route::get('/elements', 'elements');
    Route::get('/events', 'events');
    Route::get('/contact', 'contact');
    Route::get('/blogs', 'blog');
    Route::get('/blog_details', 'blog_details');
    Route::get('/about', 'about');
    // Route::get('/donate_now/{campaign}', 'donate')->name('donate');
    Route::post('/donate_now', 'donation_store')->name('donation.store');
    Route::get('/volunteer', 'volunteers')->name('home.volunteer');
    Route::post('/volunteer', 'volunteer_store')->name('volunteer.store');

});



Route::group(['middleware' => 'guest'],function(){
    Route::get('/register',[LoginController::class,'create'])->name('auth.register');
    Route::post('/authentication',[LoginController::class,'register'])->name('register.store');
});

Route::group(['middleware' => 'guest'],function(){
    Route::get('/login',[LoginController::class,'index'])->name('login');
    Route::post('/authenticate',[LoginController::class,'authenticate'])->name('auth.authenticate');
    Route::post('/send-otp', [OtpController::class, 'sendOtp']);
    Route::post('/verify-otp', [OtpController::class, 'verifyOtp']);
    Route::post('/check-password', function(Request $request) {
        $user = User::where('email', $request->email)->first();
    
        if ($user && Hash::check($request->password, $user->password)) {
            return response()->json(['valid' => true]);
        } else {
            return response()->json(['valid' => false], 401);
        }
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('/donate/{campaign}', [PaymentController::class, 'donate'])->name('donate');
    Route::post('/payment', [PaymentController::class, 'processPayment'])->name('process.payment');
    Route::get('/payment/success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
    Route::get('/payment/fail', [PaymentController::class, 'paymentFail'])->name('payment.fail');
});
//temp-images route
Route::post('/upload-temp-images',[TempImagesController::class,'create'])->name('temp-images.create');

Route::group(['prefix' => 'admin'],function(){

    Route::group(['middleware' => 'admin.guest'],function(){
        Route::get('/login',[AdminLoginController::class,'index'])->name('admin.login');
        Route::post('/authenticate',[AdminLoginController::class,'authenticate'])->name('admin.authenticate');
    });
   
    Route::group(['middleware' => 'admin.auth'],function(){

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
        Route::post('/campaigns/{id}/approve', [CampaignController::class, 'approve'])->name('campaigns.approve');


        //Gallery Route
        Route::get('/galleries',[GalleryController::class,'index'])->name('galleries.index');
        Route::get('/galleries/create',[GalleryController::class,'create'])->name('galleries.create');
        Route::post('/galleries',[GalleryController::class,'store'])->name('galleries.store');
        Route::get('/galleries/{gallery}/edit',[GalleryController::class,'edit'])->name('galleries.edit');
        Route::put('/galleries/{gallery}',[GalleryController::class,'update'])->name('galleries.update');
        Route::delete('/galleries/{gallery}',[GalleryController::class,'destroy'])->name('galleries.delete');

        //Donation route
        Route::get('/donation',[AdminDonationController::class,'index'])->name('admin.donation');
        Route::delete('/donation/{donation}',[GalleryController::class,'destroy'])->name('donation.delete');

        //Volunteers route
        Route::get('/volunteers',[VolunteerController::class,'index'])->name('volunteers.index');
        Route::get('/volunteers/{volunteer}/edit',[VolunteerController::class,'edit'])->name('volunteers.edit');
        Route::put('/volunteers/{volunteer}',[VolunteerController::class,'update'])->name('volunteers.update');
        Route::delete('/volunteers/{volunteer}',[VolunteerController::class,'destroy'])->name('volunteers.delete');

        //Withdraw route
        Route::get('/withdrawlogs',[WithdrawLogsController::class,'index'])->name('admin.withdrawlogs');
        Route::post('/withdrawlogs/{id}/approve', [WithdrawLogsController::class, 'approve'])->name('admin.withdrawlogs.approve');
        Route::post('/withdrawlogs/{id}/reject', [WithdrawLogsController::class, 'reject'])->name('admin.withdrawlogs.reject');
        Route::get('/withdrawlogs/{id}/edit', [WithdrawLogsController::class, 'edit'])->name('admin.withdrawlogs.edit');
        Route::post('/withdrawlogs/{id}/update', [WithdrawLogsController::class, 'update'])->name('admin.withdrawlogs.update');

        //Users route
        Route::get('/users',[UserManagementController::class,'index'])->name('usermanagement.index');
        Route::delete('/users/{user}',[UserManagementController::class,'destroy'])->name('usermanagement.delete');

        //Users route
        Route::get('/report',[ReportController::class,'index'])->name('report');

    });

    

});

Route::group(['prefix' => 'user'],function(){
   
    Route::group(['middleware' => 'web'],function(){

        Route::get('/dashboard',[UserDashboardController::class,'index'])->name('user.dashboard');
        Route::get('/logout',[UserDashboardController::class,'logout'])->name('user.logout');
        
        //Campaign Controller
        Route::get('/campaigns',[UserCampaignController::class,'index'])->name('campaign.index');
        Route::get('/campaigns/create',[UserCampaignController::class,'create'])->name('campaign.create');
        Route::post('/campaigns',[UserCampaignController::class,'store'])->name('campaign.store');
        Route::get('/campaigns/{campaign}/edit',[UserCampaignController::class,'edit'])->name('campaign.edit');
        Route::put('/campaigns/{campaign}',[UserCampaignController::class,'update'])->name('campaign.update');
        Route::delete('/campaigns/{campaign}',[UserCampaignController::class,'destroy'])->name('campaign.delete');

        //Gallery Route
        Route::get('/galleries',[UserGalleryController::class,'index'])->name('usergalleries.index');
        Route::get('/galleries/create',[UserGalleryController::class,'create'])->name('usergalleries.create');
        Route::post('/galleries',[UserGalleryController::class,'store'])->name('usergalleries.store');
        Route::get('/galleries/{gallery}/edit',[UserGalleryController::class,'edit'])->name('usergalleries.edit');
        Route::put('/galleries/{gallery}',[UserGalleryController::class,'update'])->name('usergalleries.update');
        Route::delete('/galleries/{gallery}',[UserGalleryController::class,'destroy'])->name('usergalleries.delete');

        //Profile Route
        Route::get('/profile',[ProfileController::class,'index'])->name('user.profile');
        Route::get('/profile/{user}/update',[ProfileController::class,'edit'])->name('profile.update');
        Route::put('/profile/{user}',[ProfileController::class,'store'])->name('profile.store');

        //Donation Route
        Route::get('/donations',[DonationController::class,'index'])->name('user.donations');

        //Withdraw Request Route
        Route::get('/withdraw',[WithdrawController::class,'index'])->name('user.withdraw');
        // Route::get('/withdraw/request',[WithdrawController::class,'request'])->name('withdraw.request');
        Route::post('/withdraw',[WithdrawController::class,'store'])->name('withdraw.store');
        
    });
});

Route::get('/phonepe/payment',[PaymentController::class,'makePhonePePayment'])->name('phonepe.payment');
Route::get('/phonepe/payment/callback',[PaymentController::class,'phonePeCallback'])->name('phonepe.payment.callback');

require __DIR__.'/auth.php';
