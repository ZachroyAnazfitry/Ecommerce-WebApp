<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
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
    return view('landing-page');
    // return view('welcome');
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
    Route::get('/admin/profile', [AdminController::class,'profile'])->name('admin.profile');
    Route::get('/admin/profile/edit', [AdminController::class, 'editProfile'])->name('admin.edit');
    Route::post('/admin/profile/store', [AdminController::class,'storeProfile'])->name('store.profile');
    Route::get('/admin/profile/change-password',[AdminController::class,'changePasswordProfile'])->name('change.password');
    Route::post('/admin/profile/update-password-profile', [AdminController::class, 'updatePasswordProfile'])->name('password.profile');

    // Brand - calling BrandController once
    Route::controller(BrandController::class)->group(function () {
        Route::get('/brands', 'brands')->name('brands');
        Route::post('/brands/new', 'storeNewBrands')->name('brands.new');
        Route::get('/brands/edit/{id}', 'editNewBrands')->name('brands.edit');
        Route::put('/brands/update/{id}', 'updateNewBrands')->name('brands.update');
        Route::get('/brands/delete/{id}', 'deleteNewBrands')->name('brands.delete');
    });

    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category', 'showCategory')->name('category');
        Route::get('/category/add', 'addCategory')->name('category.add');
        Route::post('/category/store', 'storeCategory')->name('category.store');
        Route::get('/category/edit/{id}', 'editCategory')->name('category.edit');
        Route::put('/category/update/{id}', 'updateNewCategory')->name('category.update');
        Route::get('/category/delete/{id}', 'deleteCategory')->name('category.delete');

    });
    
});

// Vendor routes
Route::middleware(['auth', 'role:vendor'])->group(function () {
    Route::post('/vendor/dashboard', [VendorController::class, 'vendorDashboard'])->name('vendor.dashboard');
    Route::get('/vendor/logout',[VendorController::class, 'vendorLogout'])->name('vendor.logout');
    // Route::get('/vendor/profile', [VendorController::class])->name('vendor.profile');
    // Route::get('/vendor/profile/edit', [VendorController::class])->name('vendor.edit');
    // Route::post('/vendor/profile/store', [VendorController::class])->name('store.profile');
    // Route::get('/vendor/profile/change-password',[VendorController::class])->name('change.password');
    // Route::post('/vendor/profile/update-password-profile', [VendorController::class])->name('password.profile');

});

// Customer routes
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/customer/home', [CustomerController::class, 'customerPage'])->name('customer.home');
    Route::get('/customer/logout',[CustomerController::class, 'destroy'])->name('customer.logout');
    Route::get('/customer/profile',[CustomerController::class, 'customerProfile'])->name('customer.profile');
    Route::put('/customer/profile/edit',[CustomerController::class, 'customerEditProfile'])->name('customer.edit');
    
});

// login page for the 3 roles without authentication permission
// Route::get('/admin/login',[AdminController::class, 'adminDashboard'])->name('admin.dashboard');
Route::get('/vendor/login', [VendorController::class, 'vendorLogin'])->name('vendor.login');
Route::get('/vendor/register', [VendorController::class, 'vendorRegister'])->name('vendor.register');
Route::post('/vendor/new/register', [VendorController::class, 'vendorNewRegister'])->name('vendor.newRegister');

Route::get('/customer/register', [CustomerController::class, 'customerRegister'])->name('customer.register');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
