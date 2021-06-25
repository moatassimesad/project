<?php

namespace App\Http\Controllers\store;

use App\Http\Controllers\Controller;
use App\Mail\OrderDetails;
use App\Models\Cart;

use App\Models\Client;
use App\Models\Delivery;
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
            $max = 0;
            foreach( $cart->items as $item){
                $product = Product::find($item['id']);
                $colors = $product->getColors();
                foreach ($colors as $color){
                    try {
                        $max += $cart->items[$product->id.$color]['quantity'];
                    }
                    catch (\Exception $e){}
                }

                if ($product->quantity < $max){
                    if ($product->quantity == 0){
                        return back()->with('status4','Sorry! the product titled "'.$product->name.'" is expired');
                    }
                    else{
                        return back()->with('status4','Sorry! the quantity you wanna purchase for the product titled "'.$product->name.'" is out of stock, max is '.$product->quantity);
                    }
                }
                $max = 0;
            }
        } else {
            $cart = null;
            return back();
        }
        return view('shop.checkout',compact('cart','store','user'));
    }


    public function store(Request $request)
    {



        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'address' => 'required',
            'postCode' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ]);
        $store = Store::find($request->store_id);
        if (session()->has('cart'.$store->id)) {
            $cart = new Cart(session()->get('cart'.$store->id));
            foreach ($cart->items as $item) {
                $product = Product::find($item['id']);
                if ($product->quantity < $item['quantity']){
                    return back()->with('status','The quantity that you are picking for the product titled "'.$product->name.'" is out of stock');
                }
            }
        }


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
            $client->postCode = $request->postCode;
            $client->city = $request->city;
            $client->phone = $request->phone;
            $client->email = $request->email;
            $client->store_id = $request->store_id;
            $client->save();
        }


        if (session()->has('cart'.$store->id)) {
            $cart = new Cart(session()->get('cart'.$store->id));

            $order = new Order();
            $order->status = "Confirmed";
            $order->payedTotal = $cart->totalPrice;
            if(Delivery::all()->count()!=0){
                $order->delivery_id = Delivery::all()->first()->id;
            }
            else{
                $delivery = new Delivery();
                $delivery->name = 'Delivery 1';
                $delivery->reference = 'Del 1';
                $delivery->phone = '+212654438764';
                $delivery->address = 'Gueliz';
                $delivery->store_id = $store->id;
                $delivery->save();
                $order->delivery_id = $delivery->id;
            }
            $order->store_id = $request->store_id;
            $order->client_id = $client->id;
            $order->number = rand(100,100000);
            $order->save();

            foreach ($cart->items as $item) {
                $order->products()->attach($item['id'], ['quantity' => $item['quantity'], 'unitCost' => $item['price'], 'shippingCost' => 0, 'color' => $item['color']]);
            }
            $user = $store->user;
            if($request->paypal){
                return redirect()->route('paypal.checkout', $order->id);
            }
            $status = 'but there s something wrong while sending you the confirmation email !';
            try {
                Mail::to($client->email)->send(new OrderDetails($order, $store, $user, $client->firstName,$client->lastName,$client->address,'confirmed'));
            }
            catch (\Exception $e){
                session()->forget('cart'.$store->id);
                return view('shop.order_details', compact('order', 'store', 'user','client','status'));
            }
            foreach ($cart->items as $item) {
                $product = Product::find($item['id']);
                $product->quantity -= $item['quantity'];
                $product->save();
            }
            session()->forget('cart'.$store->id);
            $status = '';
            return view('shop.order_details', compact('order', 'store', 'user','client','status'));

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

    //*******************        set paypal credentials  ************************//

    public function index_paypal_credentials(){
        return view('payment.set_payment_credentials');
    }

    public function index_change_paypal_credentials(){
        $store = auth()->user()->store;
        return view('payment.change_paypal_credentials',compact('store'));
    }


    public function save_paypal_credentials(Request $request){
        $this->validate($request,[
            'client_id'=>'required|string',
            'client_secret'=>'required|string',
        ]);
        $store = auth()->user()->store;
        $store->client_id = $request->client_id;
        $store->client_secret = $request->client_secret;
        $store->save();
        return back()->with('status','Saved successfully !');

    }

    public function update_paypal_credentials(Request $request){
        $store = auth()->user()->store;
        $store->client_id = $request->client_id;
        $store->client_secret = $request->client_secret;
        $store->save();
        return back()->with('status','Updated successfully');


    }
}
