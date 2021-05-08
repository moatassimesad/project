<?php


use App\Http\Controllers\auth\logOutController;
use App\Http\Controllers\auth\SignInController;
use App\Http\Controllers\auth\SignUpController;
use App\Http\Controllers\auth\StoreNameController;
use App\Http\Controllers\store\StoreStatsController;
use Illuminate\Support\Facades\Route;





Route::get('/', function () {return view('home.welcome');});
Route::get('/store_name', [StoreNameController::class,'index'])->name('store_name');
Route::post('/store_name', [StoreNameController::class,'store']);
Route::get('/sign_up', [SignUpController::class,'index'])->name('sign_up');
Route::post('/sign_up', [SignUpController::class,'store']);
Route::get('/sign_in', [SignInController::class,'index'])->name('sign_in');
Route::post('/sign_in', [SignInController::class,'signin']);
Route::post('/logout', [logOutController::class,'logout'])->name('logout');
Route::get('/store_stats', [StoreStatsController::class,'index'])->name('store_stats');

