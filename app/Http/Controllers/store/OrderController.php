<?php

namespace App\Http\Controllers\store;

use App\Http\Controllers\Controller;
use App\Mail\OrderDetails;
use App\Models\Cart;

use App\Models\Client;
use App\Models\Order;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified'])->except('store','index_checkout');
    }

    public function index_list(){
        $user = User::find(auth()->user()->id);
        $store = $user->store;
        $orders = $store->orders;
        $status = ['Confirmed','Shipped','Payed','Delivered'];
        return view('store.list_order', compact('orders','status'));
    }

    public function index_order_products_info($id){
        $order = Order::find($id);
        $delivery = $order->delivery;
        $client = $order->client;
        return view('store.order_products',compact('order','delivery','client'));
    }



    public function index_checkout($id){
        $store = Store::find($id);
        $user = $store->user;
        if (session()->has('cart'.$store->id)) {
            $cart = new Cart(session()->get('cart'.$store->id));
        } else {
            $cart = null;
        }
        return view('shop.checkout',compact('cart','store','user'));
    }


    public function store(Request $request)
    {


//
        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'address' => 'required',
            'postCode' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ]);

        $client = DB::table('clients')->where([
            ['firstName', '=', $request->firstName],
            ['lastName', '=', $request->lastName],
            ['address', '=', $request->address],
            ['postCode', '=', $request->postCode],
            ['city', '=', $request->city],
            ['phone', '=', $request->phone],
            ['email', '=', $request->email],
            ['store_id', '=', $request->store_id],
            ])->first();
        if ($client == null) {
            $client = new Client();
            $client->firstName = $request->firstName;
            $client->lastName = $request->lastName;
            $client->address = $request->address;
            $client->optionalAddress = $request->optionalAddress;
            $client->postCode = $request->postCode;
            $client->city = $request->city;
            $client->phone = $request->phone;
            $client->email = $request->email;
            $client->store_id = $request->store_id;
            $client->save();
        }
        $store = Store::find($request->store_id);

        if (session()->has('cart'.$store->id)) {
            $cart = new Cart(session()->get('cart'.$store->id));

            $order = new Order();
            $order->status = "Confirmed";
            $order->payedTotal = $cart->totalPrice;
            $order->delivery_id = 1;
            $order->store_id = $request->store_id;
            $order->client_id = $client->id;
            $order->save();

            foreach ($cart->items as $item) {
                $order->products()->attach($item['id'], ['quantity' => $item['quantity'], 'unitCost' => $item['price'], 'shippingCost' => 0, 'color' => $item['color']]);
                $product = Product::find($item['id']);
                $product->quantity -= $item['quantity'];
                $product->save();
            }
            $user = $store->user;
            Mail::to($client->email)->send(new OrderDetails($order, $store, $user, $client->firstName,$client->lastName,$client->address));
            session()->forget('cart');
            return view('shop.order_details', compact('order', 'store', 'user','client'));
        }
    }

    public function edit(Request $request){
        $order = Order::find($request->order_id);
        $order->status = $request->status;
        $order->save();
        return back()->with('status', 'Changed successfully');
    }
    public function delete($id){
        $order = Order::find($id);
        if ($order->store->id == auth()->user()->store->id) {
            $order->delete();
            return back()->with('status1', 'Deleted successfully');
        }
        else{
            dd("Hehe maybe next time");
        }
    }

}
