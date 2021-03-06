<?php

namespace App\Http\Controllers\shop;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{


    public function index($id){
        $store = Store::find($id);
        $collections = $store->collections;
        $user = $store->user;
        if (session()->has('cart'.$store->id)) {
            $cart = new Cart(session()->get('cart'.$store->id));
        } else {
            $cart = null;
        }
        return view('shop.home',compact('collections','store','user','cart'));


    }
    public function index_shop($id,$collection){
        $search = '';
        $store = Store::find($id);
        $selectedCollection = $collection;
        if ($collection == 'all') {
            $products = $store->products;
        }
        else{
            $coll = DB::table('collections')->where('name', $collection)->first();
            $products = DB::table('products')->where('collection_id', $coll->id)->get();
        }
        $collections = $store->collections;
        $user = $store->user;
        if (session()->has('cart'.$store->id)) {
            $cart = new Cart(session()->get('cart'.$store->id));
        } else {
            $cart = null;
        }
        return view('shop.shop',compact('products','user','store','collections','selectedCollection','cart','search'));
    }



    public function search_shop($id,$collection_name,Request $request){
        $search = $request->product_name;
        $store = Store::find($id);
        $selectedCollection = $collection_name;
        if ($collection_name == 'all') {
            $products = Product::query()->where('name','like',"%{$request->product_name}%")->get();
        }
        else{
            $coll = DB::table('collections')->where('name', $collection_name)->first();
            $products = Product::query()->where('collection_id','=',$coll->id)->where('name','like',"%{$request->product_name}%")->get();
        }
        $collections = $store->collections;
        $user = $store->user;
        if (session()->has('cart'.$store->id)) {
            $cart = new Cart(session()->get('cart'.$store->id));
        } else {
            $cart = null;
        }
        return view('shop.shop',compact('products','user','store','collections','selectedCollection','cart','search'));
    }



    public function product_preview($store_id,$product_id){
        $product = Product::find($product_id);
        $store = Store::find($store_id);
        $user = $store->user;
        $colors = $product->getColors();
        $max = $product->quantity;
        if (session()->has('cart'.$store->id)) {
            $max = 0;
            $cart = new Cart(session()->get('cart'.$store->id));
            $colors = $product->getColors();
            foreach ($colors as $color){
                try {

                    $max += $cart->items[$product->id.$color]['quantity'];

                }
            catch (\Exception $e){

            }
            }
            $max = $product->quantity - $max;
        }
        else{
            $cart = null;
        }

        return view('shop.product_preview',compact('product','store','user','colors','max','cart'));
    }

    public function index_cart($store_id){
        $store = Store::find($store_id);
        $user = $store->user;
        if (session()->has('cart'.$store->id)) {
            $cart = new Cart(session()->get('cart'.$store->id));
        } else {
            $cart = null;
        }
        return view('shop.cart',compact('cart','store','user'));
    }









    public function add_to_card(Request $request){
        $product = Product::find($request->product_id);
        $store = Store::find($request->store_id);
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

        if (session()->has('cart'.$store->id)) {
            $cart = new Cart(session()->get('cart'.$store->id));
        } else {
            $cart = new Cart();
        }
        $cart->add($product,$request->color,$request->quantity);
        session()->put('cart'.$store->id, $cart);
        return back()->with('status', 'Added successfully');
    }


    public function change_color($store_id,$id,$old_color,$new_color){
        $store = Store::find($store_id);
        $cart = new Cart(session()->get('cart'.$store->id));
        $response = $cart->update_color($id,$old_color,$new_color);
        session()->put('cart'.$store->id, $cart);
        if($response == -1){
            return back()->with('status', 'Already exist');
        }
        return back()->with('status1', 'Color changed successfully');

    }

    public function change_quantity(Request $request){
        $this->validate($request,[
            'quantity'=>'required'
        ]);


        $store = Store::find($request->store_id);
        $cart = new Cart(session()->get('cart'.$store->id));
        $product = Product::find($request->product_id);
        $colors = $product->getColors();
        $max = 0;
        foreach ($colors as $color){
            try {
                if ($color == $request->color){
                    continue;
                }
                $max += $cart->items[$product->id.$color]['quantity'];

            }
            catch (\Exception $e){}
        }
        $max += $request->quantity;
        if ($max > $product->quantity){
            return back()->with('status3', 'Max quantity you can purchase for this product is '.$product->quantity);
        }
        $cart->update_quantity($request->product_id,$request->color, $request->quantity);
        session()->put('cart'.$store->id, $cart);
        return back()->with('status2', 'Quantity updated successfully');
    }

    public function delete(Request $request){
        $store = Store::find($request->store_id);
        $cart = new Cart(session()->get('cart'.$store->id));
        $cart->remove($request->product_id,$request->color);

        if ($cart->totalQty <= 0) {
            session()->forget('cart'.$store->id);
        } else {
            session()->put('cart'.$store->id, $cart);
        }
        return back()->with('status3', 'Product was removed successfully');

}



}
