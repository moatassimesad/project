<?php


use App\Http\Controllers\auth\logOutController;
use App\Http\Controllers\auth\SignInController;
use App\Http\Controllers\auth\SignUpController;
use App\Http\Controllers\auth\StoreNameController;
use App\Http\Controllers\store\CollectionController;
use App\Http\Controllers\store\DashboardController;
use App\Http\Controllers\store\StoreController;
use App\Http\Controllers\store\DeliveryController;
use App\Http\Controllers\store\ProductController;
use App\Http\Controllers\store\ProviderController;
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

Route::get('/add_collection', [CollectionController::class,'index_add'])->name('add_collection');
Route::post('/add_collection', [CollectionController::class,'store']);

Route::get('/list_collection', [CollectionController::class,'index_list'])->name('list_collection');

Route::get('/collection_info/{id}', [CollectionController::class,'index_collection_info'])->name('collection_info');

Route::get('/delete_collection/{id}', [CollectionController::class,'delete']);

Route::post('/edit_collection', [CollectionController::class,'edit'])->name('edit_collection');

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

Route::get('/store-menu', [SettingsController::class,'index_templates'])->name('templates');

Route::get('/add_product', [ProductController::class,'index_add'])->name('add_product');
Route::post('/add_product', [ProductController::class,'store']);

Route::get('/add_provider', [ProviderController::class,'index_add'])->name('add_provider');
Route::post('/add_provider', [ProviderController::class,'store']);

Route::get('/themes', [StoreController::class,'index_themes'])->name('themes');
Route::get('/templates', [StoreController::class,'index_templates_1'])->name('templates');
Route::get('/edit_store', [StoreController::class,'index_edit_store_1'])->name('edit_store');
