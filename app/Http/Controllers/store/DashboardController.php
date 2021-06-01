<?php

namespace App\Http\Controllers\store;


use App\Http\Controllers\Controller;
use App\Models\Order;
use Database\Seeders\ProductsChart;
use Illuminate\Http\Request;
use App\Charts\SaleProductChart;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(){
        $values = [];

        $days = [];

        $user = auth()->user();
        $store = $user->store;
        $orders = Order::select("*")->where("store_id",$store->id)->orderBy("created_at")->get();
        foreach ($orders as $order){
            array_push($values,$order->payedTotal);
            array_push($days,$order->created_at);
        }
        $orders = $store->orders;
        $total = 0;
        foreach ($orders as $order){
            $total+=$order->payedTotal;
        }
        $clients = $store->clients;
        $products = $store->products;
        $chart = new SaleProductChart();
        $chart->labels($days);
        $chart->dataset('products sale', 'line', $values)->backgroundColor('rgba(52, 130, 255, 0.2)');
        return view('store.stats',compact('chart','products','orders','clients','total'));

    }
}
