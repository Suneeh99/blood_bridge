<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EligibilityFormController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CheckInController;
use App\Http\Controllers\CustomizeCampaignController;
use App\Http\Controllers\CampaignRequestController;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return view('bloodBridge.home');
})->name('home');

Route::get('/Process/Donate', function () {
    return view('bloodBridge.Process.donate');
})->name('process.donate');

Route::get('/Process/Organize', function () {
    return view('bloodBridge.Process.organize');
})->name('process.organize'); 

Route::get('/Process/Check-In/{campaign_id}', [CheckInController::class, 'index'])->name('process.checkin.index');
Route::get('/Process/Check-In/Completed/{campaign_name}', [CheckInController::class, 'update'])->name('process.checkin.update');
Route::get('/Process/Check-In/Rejected/{campaign_name}', [CheckInController::class, 'reject'])->name('process.checkin.reject');

Route::get('/Login', [AuthController::class,'login'])->name('login');   
Route::post('/Login', [AuthController::class,'loginPost'])->name('login.post');   
Route::get('/Register', [AuthController::class,'register'])->name('register');   
Route::post('/Register', [AuthController::class,'registerPost'])->name('register.post');   
Route::get('/logout', [AuthController::class,'logout'])->name('logout');   
Route::get('/Dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/Available-Campaigns', [CampaignController::class, 'index'])->name('campaigns');
Route::post('/Available-Campaigns/enroll/{campaign_id}', [CampaignController::class, 'enroll'])->name('campaigns.enroll');

Route::post('/Dashboard', [ContactUsController::class, 'store'])->name('contactus.store');

Route::get('/Form/Campaign-Request', [CampaignRequestController::class, 'index'])->name('form.campaign.index');
Route::post('/Form/Campaign-Request', [CampaignRequestController::class, 'store'])->name('form.campaign.store');
                
Route::get('/Form/Eligibility-Form/{campaign_name}`', [EligibilityFormController::class, 'index'])->name('eligibilityForm.index');
Route::post('/Form/Eligibility-Form/{campaign_name}', [EligibilityFormController::class, 'store'])->name('eligibilityForm.store');


Route::get('/Form/Contact-Us', function () {
    return view('bloodBridge.Forms.contactUs');
})->name('form.contact');

Route::get('/Form/Customize-Campaign/{campaign_id}', [CustomizeCampaignController::class,'index'])->name('customize.index');
Route::post('/Form/Customize-Campaign', [CustomizeCampaignController::class,'update'])->name('customize.update');


Route::get('/Payment/{campaign_id}', [PaymentController::class, 'index'])->name('payment.index');
Route::post('/Payment', [PaymentController::class, 'process'])->name('payment.process');
