<?php

use App\Http\Controllers\Admin\AdminCategoriesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;

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
    return view('sanphamchitiet');
});

// Route::prefix('admin')->group(function () {
//     Route::get('/', [AdminController::class, 'index'])->name('admin.index');
// });

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::resource('categories', AdminCategoriesController::class);
    Route::resource('products', ProductController::class);
});

Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'check_login']);