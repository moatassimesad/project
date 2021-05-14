<?php


use App\Http\Controllers\auth\logOutController;
use App\Http\Controllers\auth\SignInController;
use App\Http\Controllers\auth\SignUpController;
use App\Http\Controllers\auth\StoreNameController;
use App\Http\Controllers\store\categoryController;
use App\Http\Controllers\store\DashboardController;
use App\Http\Controllers\store\DeliveryController;
use App\Http\Controllers\welcome\WelcomeController;
use Illuminate\Support\Facades\Route;





Route::get('/', [WelcomeController::class,'index'])->name('welcome');

Route::get('/store_name', [StoreNameController::class,'index'])->name('store_name');
Route::post('/store_name', [StoreNameController::class,'store']);

Route::get('/sign_up', [SignUpController::class,'index'])->name('sign_up');
Route::post('/sign_up', [SignUpController::class,'store']);

Route::get('/sign_in', [SignInController::class,'index'])->name('sign_in');
Route::post('/sign_in', [SignInController::class,'signin']);

Route::post('/logout', [logOutController::class,'logout'])->name('logout');
Route::get('/logout', [logOutController::class,'logout'])->name('logout');

Route::get('/stats', [DashboardController::class,'index'])
    ->name('stats')/*->middleware('auth');*/; //to be accessible just for authenticated users. check the authenticate.php in middleware.

Route::get('/add_category', [CategoryController::class,'index_add'])->name('add_category');
Route::post('/add_category', [CategoryController::class,'store']);

Route::get('/list_category', [CategoryController::class,'index_list'])->name('list_category');

Route::get('/category_info/{id}', [CategoryController::class,'index_category_info'])->name('category_info');

Route::get('/delete_category/{id}', [CategoryController::class,'delete']);

Route::post('/edit_category', [CategoryController::class,'edit'])->name('edit_category');

Route::get('/add_delivery', [DeliveryController::class,'index_add'])->name('add_delivery');

Route::post('/add_delivery', [DeliveryController::class,'store']);

Route::get('/list_delivery', [DeliveryController::class,'index_list'])->name('list_delivery');

