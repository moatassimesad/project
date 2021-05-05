<?php


use App\Http\Controllers\auth\SignInController;
use App\Http\Controllers\auth\SignUpController;
use App\Http\Controllers\auth\StoreNameController;
use Illuminate\Support\Facades\Route;





Route::get('/', function () {return view('home.welcome');});
Route::get('/store_name', [StoreNameController::class,'index'])->name('store_name');
Route::post('/store_name', [StoreNameController::class,'store']);
Route::get('/sign_up', [SignUpController::class,'index'])->name('sign_up');
Route::get('/sign_in', [SignInController::class,'index'])->name('sign_in');

