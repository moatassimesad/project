<?php

namespace App\Http\Controllers\shop;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
class HomeController extends Controller
{

    public function index($id){
        $store = Store::find($id);
        $collections = $store->collections;
        $user = $store->user;

        return view('shop.home',compact('collections','store','user'));

    }
    public function index_shop($id){
        $store = Store::find($id);
        $products = $store->products;
        $user = $store->user;
        return view('shop.shop',compact('products','user','store'));
    }
    public function product_preview($store_id,$product_id){
        $product = Product::find($product_id);
        $store = Store::find($store_id);
        $user = $store->user;
        return view('shop.product_preview',compact('product','store','user'));
    }
    public function add_to_card(Request $request){
        dd($request);
    }
}
