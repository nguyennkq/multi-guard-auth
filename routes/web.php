<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/admin/register', [RegisterController::class, 'showAdminRegisterForm'])->name('admin.register-view');
Route::post('/admin/register', [RegisterController::class, 'createAdmin'])->name('admin.register');

Route::get('/admin', [LoginController::class, 'showAdminLoginForm'])->name('admin.login-view');
Route::post('/admin', [LoginController::class, 'adminLogin'])->name('admin.login');
// ⬆️⬆️⬆️ Admin


Route::get('/vendor/register', [RegisterController::class, 'showVendorRegisterForm'])->name('vendor.register-view');
Route::post('/vendor/register', [RegisterController::class, 'createVendor'])->name('vendor.register');

Route::get('/vendor', [LoginController::class, 'showVendorLoginForm'])->name('vendor.login-view');
Route::post('/vendor', [LoginController::class, 'vendorLogin'])->name('vendor.login');
// ⬆️⬆️⬆️ Vendor

Route::get('/vendor/dashboard', function () {
    return view('vendor');
})->middleware('auth:vendor');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/save-token', [HomeController::class, 'saveToken'])->name('save-token');
Route::post('/send-notification', [HomeController::class, 'sendNotification'])->name('send.notification');

Route::get('/admin/dashboard', function () {
    return view('admin');
})->middleware('auth:admin');
