<?php

namespace App\Http\Controllers;

use App\Mail\OrderDetails;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Services\PaypalService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PaypalController extends Controller
{
    public function __construct()
    {

    }

    public function getExpressCheckout($orderId)
    {
        $order = Order::find($orderId);
        $this->store_id = $order->store->id;
        $store = $order->store;
        $order->status = 'Paypal checkout failed';
        $paypalService = new PaypalService($order->store->client_id,$order->store->client_secret);
        $response = $paypalService->createOrder($orderId);

        if($response->statusCode !== 201) {
            abort(500);
        }


        $order->paypal_orderid = $response->result->id;
        $order->save();

        foreach ($response->result->links as $link) {
            if($link->rel == 'approve') {
                return redirect($link->href);
            }
        }

    }



    public function cancelPage()
    {
        return view('payment.failed');
    }


    public function getExpressCheckoutSuccess(Request $request, $orderId)
    {
        $order = Order::find($orderId);
        $paypalService = new PaypalService($order->store->client_id,$order->store->client_secret);
        $response = $paypalService->captureOrder($order->paypal_orderid);

        if ($response->result->status == 'COMPLETED') {
            $order->status = 'Payed';
            $order->save();
            $client = $order->client;
            $store = $order->store;
            $user = $store->user;
            try {
                Mail::to($client->email)->send(new OrderDetails($order, $store, $user, $client->firstName,$client->lastName,$client->address,'payed via paypal'));
            }
            catch (\Exception $e){
                if (session()->has('cart'.$store->id)) {
                    $cart = new Cart(session()->get('cart' . $store->id));
                    foreach ($cart->items as $item) {
                        $product = Product::find($item['id']);
                        $product->quantity -= $item['quantity'];
                        $product->save();
                    }
                }
                session()->forget('cart'.$store->id);
                return redirect()->route('shop',['id'=>$store->id,'collection_id'=>'all'])->with('status','Payment successful, but there s something wrong with sending you the confirmation email!  ⚠️️️ ⚠️️ ⚠️️');
            }
            if (session()->has('cart'.$store->id)) {
                $cart = new Cart(session()->get('cart' . $store->id));
                foreach ($cart->items as $item) {
                    $product = Product::find($item['id']);
                    $product->quantity -= $item['quantity'];
                    $product->save();
                }
            }
            session()->forget('cart'.$store->id);
            return redirect()->route('shop',['id'=>$store->id,'collection_id'=>'all'])->with('status','Payment successful!');

        }

        return view('payment.failed');


    }
}
