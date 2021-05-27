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
        $colors = explode(",",$product->colors);
        array_pop($colors);
        return view('shop.product_preview',compact('product','store','user','colors'));
    }

    public function index_cart(){
        return view('shop.cart');
    }



    public function add_to_card(Request $request){
        $product = Product::find($request->product_id);
        if (session()->has('cart')) {
            $cart = new Cart(session()->get('cart'));
        } else {
            $cart = new Cart();
        }
        $cart->add($product,$request->color,$request->quantity);
        session()->put('cart', $cart);
        return back()->with('status', 'Added successfully');
    }
}
