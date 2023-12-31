<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\RegisterController;
use App\Http\Controllers\frontend\AuthController;
use App\Http\Controllers\frontend\DashboardController;
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

//Route::get('/', function () {
//    return view('frontend/index');
//});
//Route::get('/register', function () {
//    return view('frontend/register');
//});
//Route::get('/route-clear', function () {
//    \Illuminate\Support\Facades\Artisan::call('route:clear');
//    return "route cleared successfully";
//});
Route::get('/', function () {
    return view('frontend/index');
});
Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
Route::get('/activate-user', [DashboardController::class,'activateUser'])->name('activate-user');
Route::get('/dashboard/matrix', [DashboardController::class,'matrix']);
Route::get('/dashboard/member-active', [DashboardController::class,'memberActive']);
Route::post('/dashboard/verify', [DashboardController::class,'verify']);
Route::get('/register',[RegisterController::class,'index']);
Route::get('/compose-email',[RegisterController::class,'composeEmail']);
Route::post('/save-user',[RegisterController::class,'create']);
Route::get('/verification/{user_id}',[RegisterController::class,'verification'])->name('verification');
Route::get('/verification-for-forgot/{user_id}',[RegisterController::class,'verificationForForgot'])->name('verification-for-forgot');
Route::post('/send-Otp-on-mail',[RegisterController::class,'sendOTPOnMail'])->name('send-Otp-on-mail');
Route::post('/create-new-password',[RegisterController::class,'createNewPassword'])->name('create-new-password');
Route::get('/new-password/{user_id}',[RegisterController::class,'newPassword'])->name('new-password');
Route::post('/save-new-password',[RegisterController::class,'saveNewPassword'])->name('save-new-password');
Route::post('/loginWithOtp',[RegisterController::class,'loginWithOtp'])->name('loginWithOtp');
Route::get('/re-send-otp/{user_id}',[RegisterController::class,'reSendOTP'])->name('re-send-otp');
Route::get('/forgot-password',[RegisterController::class,'forgotPassword'])->name('forgot-password');

Route::post('/login-auth',[AuthController::class,'customLogin'])->name('login-auth');
Route::get('/login',[AuthController::class,'login'])->name('login');
Route::get('/signOut',[AuthController::class,'signOut'])->name('signOut');

