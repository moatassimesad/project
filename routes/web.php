<?php


use App\Http\Controllers\auth\logOutController;
use App\Http\Controllers\auth\SignInController;
use App\Http\Controllers\auth\SignUpController;
use App\Http\Controllers\auth\StoreNameController;
use App\Http\Controllers\shop\HomeController;
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
Route::post('/', [WelcomeController::class,'feedback'])->name('feedback');

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

Route::post('/edit_store_info', [StoreController::class,'edit_store_info'])->name('edit_store_info');

Route::post('/add_store_images', [StoreController::class,'add_store_images'])->name('add_store_images');

Route::get('/condition_of_use', [SettingsController::class,'index_condition'])->name('condition_of_use');

Route::post('/save_condition_of_use', [SettingsController::class,'save_condition_of_use'])->name('save_condition_of_use');

Route::get('/contact', [SettingsController::class,'index_contact'])->name('contact');

Route::post('/save_contact', [SettingsController::class,'save_contact'])->name('save_contact');

Route::get('/store-menu', [SettingsController::class,'index_templates'])->name('templates');

Route::get('/add_product', [ProductController::class,'index_add'])->name('add_product');

Route::get('/list_product', [ProductController::class,'index_list'])->name('list_product');

Route::get('/delete_product/{id}', [ProductController::class,'delete'])->name('delete');

Route::get('/product_info/{id}', [ProductController::class,'index_product_info'])->name('index_product_info');

Route::get('/product_providers_info/{id}', [ProductController::class,'index_product_providers_info'])->name('index_product_providers_info');

Route::post('/edit_product', [ProductController::class,'edit'])->name('edit_product');

Route::post('/add_product', [ProductController::class,'store']);

Route::get('/list_provider', [ProviderController::class,'index_list'])->name('list_provider');

Route::get('/add_provider', [ProviderController::class,'index_add'])->name('add_provider');
Route::post('/add_provider', [ProviderController::class,'store']);

Route::get('/provider_info/{id}', [ProviderController::class,'index_provider_info'])->name('provider_info');
Route::post('/edit_provider', [ProviderController::class,'edit'])->name('edit_provider');
Route::get('/delete_provider/{id}', [ProviderController::class,'delete']);

Route::get('/themes', [StoreController::class,'index_themes'])->name('themes');
Route::get('/edit_store', [StoreController::class,'index_edit_store_1'])->name('edit_store');




/**********************************shop***********************************/



Route::get('/home/{id}', [HomeController::class,'index'])->name('home');


Route::get('/shop/{id}', [HomeController::class,'index_shop'])->name('shop');

Route::get('/product_preview/{store_id}/{product_id}', [HomeController::class,'product_preview'])->name('product_preview');

Route::post('/add_to_card', [HomeController::class,'add_to_card'])->name('add_to_card');

Route::get('/cart/{id}', [HomeController::class,'index_cart'])->name('cart');

Route::get('/cart_change_color/{id}/{old_color}/{new_color}', [HomeController::class,'change_color'])->name('cart_change_color');


Route::get('/checkout/{id}', [HomeController::class,'index_checkout'])->name('checkout');


Route::put('/cart_change_quantity', [HomeController::class,'change_quantity'])->name('cart_change_quantity');

Route::delete('/cart_delete', [HomeController::class,'delete'])->name('cart_delete');





