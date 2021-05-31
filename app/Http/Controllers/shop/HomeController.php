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
        $colors = $product->getColors();
        return view('shop.product_preview',compact('product','store','user','colors'));
    }

    public function index_cart($store_id){
        $store = Store::find($store_id);
        $user = $store->user;
        if (session()->has('cart')) {
            $cart = new Cart(session()->get('cart'));
        } else {
            $cart = null;
        }
        return view('shop.cart',compact('cart','store','user'));
    }









    public function add_to_card(Request $request){
        $product = Product::find($request->product_id);

        $this->validate($request,[
            'quantity'=>'required',
        ]);
        if ($product->colors != "none,"){
            $this->validate($request,[
                'color'=>'required',
            ]);
        }
        else{
            $request->color = "none";
        }

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
    public function change_color($id,$old_color,$new_color){
        $cart = new Cart(session()->get('cart'));
        $response = $cart->update_color($id,$old_color,$new_color);
        session()->put('cart', $cart);
        if($response == -1){
            return back()->with('status', 'Already exist');
        }
        return back()->with('status1', 'Color changed successfully');

    }

    public function change_quantity(Request $request){
        $this->validate($request,[
            'quantity'=>'required'
        ]);
        $cart = new Cart(session()->get('cart'));
        $cart->update_quantity($request->product_id,$request->color, $request->quantity);
        session()->put('cart', $cart);
        return back()->with('status2', 'Quantity updated successfully');
    }

    public function delete(Request $request){
        $cart = new Cart(session()->get('cart'));
        $cart->remove($request->product_id,$request->color);

        if ($cart->totalQty <= 0) {
            session()->forget('cart');
        } else {
            session()->put('cart', $cart);
        }
        return back()->with('status3', 'Product was removed successfully');

}

}
