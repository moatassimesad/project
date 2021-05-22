<?php

namespace App\Http\Controllers\shop;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($id){
        $store = Store::find($id);
        $collections = $store->collections;
        return view('shop.home',compact('collections'));

    }
}
