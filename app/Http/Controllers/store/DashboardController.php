<?php

namespace App\Http\Controllers\store;


use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Charts\SaleProductChart;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(){
        $monday = strtotime("last monday");
        $monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
        $sunday = strtotime(date("Y-m-d",$monday)." +6 days");
        $this_week_sd = date("Y-m-d",$monday);
        $this_week_ed = date("Y-m-d",$sunday);
        $values = [];
        $days = [];
        $values1 = [];
        $days1 = [];
        $values2 = [];
        $days2 = ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'];
        $user = auth()->user();
        $store = $user->store;
        $orders = Order::select("*")->where("store_id",$store->id)->orderBy("created_at")->get();
        //$clients = $store->clients;
        foreach ($orders as $order){
            array_push($values,$order->payedTotal);
            array_push($days,$order->created_at->format('m/d h:m').' ('.$order->status.')');
        }
        $i = 0;
        $payedTotal = 0;
        for ($i = 0; $i<7; $i++) {
            foreach ($orders as $order) {
                if ($order->status == 'Confirmed') {
                    continue;
                }
                if ($order->created_at->toDateString() == date('Y-m-d',strtotime($this_week_sd."+".$i." days")))
                    $payedTotal += $order->payedTotal;
            }
            array_push($values2, $payedTotal);
            $payedTotal = 0;
        }
        $orders = $store->orders;
        $total = 0;
        foreach ($orders as $order){
            if($order->status == 'Confirmed'){
                continue;
            }
            $total+=$order->payedTotal;
        }
        $clients = $store->clients;

        //logic for client chart !!






        $products = $store->products;
        $chart = new SaleProductChart();
        $chart->labels($days);
        $chart->dataset('Orders chart', 'line', $values)->options(['fill'=>'true','borderColor'=>'#f8fcf9'])->backgroundcolor('#f8fcf9');
        $chart1 = new SaleProductChart();
        $chart1->labels($days1);
        $chart1->dataset('Orders chart', 'bar', $values1)->options(['fill'=>'true','borderColor'=>'#f8fcf9'])->backgroundcolor('#f8fcf9');
        $chart2 = new SaleProductChart();
        $chart2->labels($days2);
        $chart2->dataset('Orders chart', 'bar', $values2)->options(['fill'=>'true','borderColor'=>'#51C1C0'])->backgroundcolor('#f8fcf9');
        return view('store.stats',compact('chart','chart1','chart2','products','orders','clients','total'));

    }
}
