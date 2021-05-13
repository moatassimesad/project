<?php


use App\Http\Controllers\auth\logOutController;
use App\Http\Controllers\auth\SignInController;
use App\Http\Controllers\auth\SignUpController;
use App\Http\Controllers\auth\StoreNameController;
use App\Http\Controllers\store\CategorieController;
use App\Http\Controllers\store\StoreStatsController;
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

Route::get('/stats', [StoreStatsController::class,'index'])
    ->name('stats')/*->middleware('auth');*/; //to be accessible just for authenticated users. check the authenticate.php in middleware.

Route::get('/add_categorie', [CategorieController::class,'index_add'])->name('add_categorie');
Route::post('/add_categorie', [CategorieController::class,'store']);

Route::get('/list_categorie', [CategorieController::class,'index_list'])->name('list_categorie');

Route::get('/categorie_info/{id}', [CategorieController::class,'index_categorie_info']);

Route::get('/delete_categorie/{id}', [CategorieController::class,'delete']);

Route::post('/edit_categorie', [CategorieController::class,'edit'])->name('edit_categorie');

