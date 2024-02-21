<?php

use App\Http\Controllers\Admin\AdminCategoriesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CategoriesController;

use App\Http\Controllers\Api\SpController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Htsp;




use App\Http\Controllers\AccountController;


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

// Route::get('/', function () {
//     return view('home.index');
// });
Route::get('/', 'Htsp@index')->name('products');
Route::get('/detail', 'Htsp@index1')->name('products');
Route::get('/shop', 'Shop@index')->name('shop');


Route::get('/san-pham-chi-tiet', [SpController::class, 'index'])->name('sanphamchitiet');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
// Route::get('/', [Htsp::class, 'index'])->name('prd');






// Route::prefix('/')->group(function () {
//     Route::get('/', [AdminController::class, 'index'])->name('admin.index');
// });

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::resource('categories', CategoriesController::class);
    Route::resource('products', ProductController::class);
    Route::resource('order', AdminOrderController::class);
});

Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'check_login']);
Route::get('/admin/register', [AdminController::class, 'register'])->name('admin.register');
Route::post('/admin/register', [AdminController::class, 'check_register']);


Route::group(['prefix' => 'account'], function(){
    Route::get('/login',[AccountController::class,'login'])->name('account.login');
    Route::post('/login',[AccountController::class,'check_login']);

    Route::get('/register',[AccountController::class,'register'])->name('account.register');
    Route::post('/register',[AccountController::class,'check_register']);

    Route::get('/profile',[AccountController::class,'profile'])->name('account.profile');
    Route::post('/profile',[AccountController::class,'check_profile']);

    Route::get('/change-password',[AccountController::class,'change_password'])->name('account.change_password');
    Route::post('/change-password',[AccountController::class,'check_change_password']);

    Route::get('/forgot-password',[AccountController::class,'forgot_password'])->name('account.forgot_password');
    Route::post('/forgot-password',[AccountController::class,'check_forgot_password']);

    Route::get('/reset-password',[AccountController::class,'reset_password'])->name('account.reset_password');
    Route::post('/reset-password',[AccountController::class,'check_reset_password']);

});