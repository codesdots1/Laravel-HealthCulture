<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Coach\CoachClassController;
use App\Http\Controllers\User\ClassController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { return redirect()->route("code");});

Route::get('/code', [HomeController::class, 'code'])->name('code');

Route::post('/check_code', [HomeController::class, 'check_code'])->name('check_code');


//Route::get('/', function () {
     //return redirect()->route("login");
// });

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Auth::routes([
//     'register' => false, // Registration Routes...
//     'reset' => false, // Password Reset Routes...
//     'verify' => false, // Email Verification Routes...
// ]);

// Route::group(['prefix' => 'coach', 'middleware' => ['role:coach', 'auth']], function () {

//     Route::get('/dashboard', [DashboardController::class, 'coach'])->name('coach.dashboard');

//     // On demand class
//     Route::get('/on-demand-video-upload', [CoachClassController::class, 'onDemandVideoUpload'])->name('onDemandVideoUpload');
//     Route::post('/save-on-demand-video-upload', [CoachClassController::class, 'saveOnDemandVideoUpload'])->name('saveOnDemandVideoUpload');
//     Route::post('/upload-coach-class-video', [CoachClassController::class, 'uploadCoachClassVideo'])->name('uploadCoachClassVideo');
//     Route::get('/upload-success', [CoachClassController::class, 'uploadsuccess'])->name('uploadsuccess');

//     // Schedule live class
//     Route::get('/schedule-live-video', [CoachClassController::class, 'scheduleLiveVideo'])->name('scheduleLiveVideo');
//     Route::post('/save-schedule-live-video', [CoachClassController::class, 'saveScheduleLiveVideo'])->name('saveScheduleLiveVideo');
//     Route::post('/upload-coach-class-image', [CoachClassController::class, 'uploadCoachClassImage'])->name('uploadCoachClassImage');

//     Route::get('/create-meal-recipe', [CoachClassController::class, 'createMealRecipe'])->name('createMealRecipe');
//     Route::post('/save-meal-recipe', [CoachClassController::class, 'saveMealRecipe'])->name('saveMealRecipe');
//     Route::get('/scan-qr-code', [CoachClassController::class, 'scanQRCode'])->name('scanQRCode');

// });

// Route::group(['prefix' => 'user', 'middleware' => ['role:user']], function () {
//     Route::get('/dashboard', [DashboardController::class, 'user'])->name('user.dashboard');
//     Route::get('/start-class/{id}', [ClassController::class, 'startOnDemandClass'])->name('startOnDemandClass');
// });

Route::get('home', [HomeController::class, 'index'])->name('home');

Route::post('/save-coach-info', [HomeController::class, 'saveCoachInfo'])->name('saveCoachInfo');
Route::get('/sign-up-as-coach', [HomeController::class, 'signUpAsCoach'])->name('signUpAsCoach');
Route::get('/invite-only', [HomeController::class, 'code'])->name('code');
Route::get('/successfully-sign-up', [HomeController::class, 'successfullysigningup'])->name('successfullysigningup');
Route::get('/goal-reached', [HomeController::class, 'goalreached'])->name('goalreached');
Route::get('/Thank-you-for-registering', [HomeController::class, 'Thankyouforregistering'])->name('Thankyouforregistering');
Route::get('/Register-your-Interest', [HomeController::class, 'RegisteryourInterest'])->name('RegisteryourInterest');
Route::post('/save-interest-info', [HomeController::class, 'saveInterestInfo'])->name('saveInterestInfo');

Route::get('/newsletter-unsubscribe', [HomeController::class, 'NewsletterUnsubscribe'])->name('NewsletterUnsubscribe');
Route::post('/save-newsletter-unsubscribe', [HomeController::class, 'saveNewsletterUnsubscribe'])->name('saveNewsletterUnsubscribe');

Route::get('/newsletter-resubscribe', [HomeController::class, 'NewsletterResubscribe'])->name('NewsletterResubscribe');
Route::post('/save-newsletter-resubscribe', [HomeController::class, 'saveNewsletterResubscribe'])->name('saveNewsletterResubscribe');


Route::get('/invite-only/code/{code}', [HomeController::class, 'CheckInviteCode'])->name('CheckInviteCode');
Route::get('/email_image/code/{code}', [HomeController::class, 'CheckEmailImageCode'])->name('CheckEmailImageCode');
Route::get('/trailer_url/code/{code}',[HomeController::class, 'CheckTrailerCounterCode'])->name('CheckTrailerCounterCode');
   

Route::get('/subscribe-to-newsletter', [HomeController::class, 'BecomeInsider'])->name('BecomeInsider');
Route::post('/save-become-insider', [HomeController::class, 'saveBecomeInsider'])->name('saveBecomeInsider');


Route::get('/code-list', [HomeController::class, 'CheckLoginCodeList']);