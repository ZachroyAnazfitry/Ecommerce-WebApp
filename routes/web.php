<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    // return view('frontend.main');
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

// Admin routes only
// Route::controller(AdminController::class)->group(function () {
//     Route::get('/admin/logout', 'destroy')->name('admin.logout');
//     Route::get('/admin/profile', 'profile')->name('admin.profile');
//     Route::get('/admin/profile/edit', 'editProfile')->name('admin.edit');
//     Route::post('/admin/profile/store', 'storeProfile')->name('store.profile');
//     Route::get('/admin/profile/change-password', 'changePasswordProfile')->name('change.password');
//     Route::post('/admin/profile/update-password-profile', 'updatePasswordProfile')->name('password.profile');
// });

// create middleware route, check if logged in
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard',[AdminController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout',[AdminController::class, 'destroy'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class])->name('admin.profile');
    Route::get('/admin/profile/edit', [AdminController::class])->name('admin.edit');
    Route::post('/admin/profile/store', [AdminController::class])->name('store.profile');
    Route::get('/admin/profile/change-password',[AdminController::class])->name('change.password');
    Route::post('/admin/profile/update-password-profile', [AdminController::class])->name('password.profile');
    
});

// Vendor routes
Route::middleware(['auth', 'role:vendor'])->group(function () {
    Route::get('/vendor/dashboard', [VendorController::class, 'vendorDashboard'])->name('vendor.dashboard');
    Route::get('/vendor/logout',[VendorController::class, 'destroy'])->name('vendor.logout');
    Route::get('/vendor/profile', [VendorController::class])->name('vendor.profile');
    Route::get('/vendor/profile/edit', [VendorController::class])->name('vendor.edit');
    Route::post('/vendor/profile/store', [VendorController::class])->name('store.profile');
    Route::get('/vendor/profile/change-password',[VendorController::class])->name('change.password');
    Route::post('/vendor/profile/update-password-profile', [VendorController::class])->name('password.profile');

});

// login page for roles
Route::get('/admin/login',[AdminController::class, 'adminDashboard'])->name('admin.dashboard');
Route::get('/vendor/login', [VendorController::class, 'vendorLogin'])->name('vendor.login');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
