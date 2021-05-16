<?php


use App\Http\Controllers\auth\logOutController;
use App\Http\Controllers\auth\SignInController;
use App\Http\Controllers\auth\SignUpController;
use App\Http\Controllers\auth\StoreNameController;
use App\Http\Controllers\store\categoryController;
use App\Http\Controllers\store\DashboardController;
use App\Http\Controllers\store\DeliveryController;
use App\Http\Controllers\store\SettingsController;
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

Route::get('/delivery_info/{id}', [DeliveryController::class,'index_delivery_info'])->name('delivery_info');

Route::post('/edit_delivery', [DeliveryController::class,'edit'])->name('edit_delivery');

Route::get('/delete_delivery/{id}', [DeliveryController::class,'delete']);

Route::get('/settings', [SettingsController::class,'index'])->name('settings');



Route::post('/edit_basic_info', [SettingsController::class,'edit_basic_info'])->name('edit_basic_info');

Route::post('/edit_login_info', [SettingsController::class,'edit_login_info'])->name('edit_login_info');

Route::post('/edit_store_info', [SettingsController::class,'edit_store_info'])->name('edit_store_info');

Route::post('/add_store_images', [SettingsController::class,'add_store_images'])->name('add_store_images');

Route::get('/condition_of_use', [SettingsController::class,'index_condition'])->name('condition_of_use');

Route::post('/save_condition_of_use', [SettingsController::class,'save_condition_of_use'])->name('save_condition_of_use');

Route::get('/contact', [SettingsController::class,'index_contact'])->name('contact');

Route::post('/save_contact', [SettingsController::class,'save_contact'])->name('save_contact');

Route::get('/templates', [SettingsController::class,'index_templates'])->name('templates');
