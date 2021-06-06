<?php

namespace App\Http\Controllers\store;


use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Charts\SaleProductChart;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index(){
        $values = [];
        $days = [];
        $values1 = [];
        $days1 = [];
        $values2 = [];
        $days2 = [];
        $user = auth()->user();
        $store = $user->store;
        $orders = $store->orders;
        //  /////////////////////////// logic for the sales chart
        $payedTotal = 0;
        $biggestTotal = 0;
        for ($i = 30 ; $i>=0 ; $i--) {
            foreach ($orders as $order) {
                if($order->created_at->toDateString() == date('Y-m-d', strtotime(date('Y-m-d'). ' - '.$i .' day'))){
                    $payedTotal += $order->payedTotal;
                }
            }
            $biggestTotal += $payedTotal;
            array_push($values, $payedTotal);
            array_push($days, date('Y-m-d', strtotime(date('Y-m-d'). ' - '.$i .' day')));
            $payedTotal = 0;
        }
        // ////////////////////////// logic for revenue chart

        $payedTotal = 0;
        $bigTotal = 0;
        for ($i = 30 ; $i>=0 ; $i--) {
            foreach ($orders as $order) {
                if ($order->status == 'Confirmed'){
                    continue;
                }
                if($order->created_at->toDateString() == date('Y-m-d', strtotime(date('Y-m-d'). ' - '.$i .' day'))){
                    $payedTotal += $order->payedTotal;
                }
            }
            $bigTotal += $payedTotal;
            array_push($values2, $payedTotal);
            array_push($days2, date('Y-m-d', strtotime(date('Y-m-d'). ' - '.$i .' day')));
            $payedTotal = 0;
        }
        //   //////////////// logic for the revenue total
        $total = 0;
        foreach ($orders as $order){
            if($order->status == 'Confirmed'){
                continue;
            }
            $total+=$order->payedTotal;
        }
        $clients = $store->clients;

        //            logic for client chart !!
        $bigTotalClients = 0;
        $totalClients = 0;
        for ($i = 30; $i>=0; $i--) {
            foreach ($clients as $client) {
                if ($client->created_at->toDateString() == date('Y-m-d', strtotime(date('Y-m-d'). ' - '.$i .' day')))
                    $totalClients += 1;
            }
            $bigTotalClients += $totalClients;
            array_push($values1, $totalClients);
            array_push($days1, date('Y-m-d', strtotime(date('Y-m-d'). ' - '.$i .' day')));
            $totalClients = 0;
        }



        $products = $store->products;
        $chart = new SaleProductChart();
        $chart->labels($days);
        $chart->dataset('Orders chart', 'line', $values)->options(['fill'=>'true','borderColor'=>'#f8fcf9'])->backgroundcolor('#f8fcf9');
        $chart1 = new SaleProductChart();
        $chart1->labels($days1);
        $chart1->dataset('Clients chart', 'bar', $values1)->options(['fill'=>'true','borderColor'=>'#f8fcf9'])->backgroundcolor('#f8fcf9');
        $chart2 = new SaleProductChart();
        $chart2->labels($days2);
        $chart2->dataset('Revenue chart', 'bar', $values2)->options(['fill'=>'true','borderColor'=>'#51C1C0'])->backgroundcolor('#f8fcf9');
        return view('store.stats',compact('chart','chart1','chart2','products','orders','clients','total','biggestTotal','bigTotal','bigTotalClients'));

    }








    public function search(Request $request){
        if($request->date_start > $request->date_end){
            return redirect()->route('stats')->with('status','invalid date');
        }
        $values = [];
        $days = [];
        $values1 = [];
        $days1 = [];
        $values2 = [];
        $days2 = [];
        $user = auth()->user();
        $store = $user->store;
        $products = $store->products;
        $orders = $store->orders;


        /*******     logic for sales chart      ******/



        $payedTotal = 0;
        $biggestTotal = 0;
        for ($i = 0; date('Y-m-d', strtotime($request->date_start. ' + '.$i .' day'))  <= $request->date_end; $i++) {
            foreach ($orders as $order) {
                if ($order->created_at->toDateString() == date('Y-m-d',strtotime($request->date_start."+".$i." days")))
                    $payedTotal += $order->payedTotal;
            }
            $biggestTotal += $payedTotal;
            array_push($values, $payedTotal);
            array_push($days,date('m/d h:m',strtotime($request->date_start."+".$i." days")));
            $payedTotal = 0;
        }


        /*****************   logic for revenue chart   *********************/


        $payedTotal = 0;
        $bigTotal = 0;
        for ($i = 0; date('Y-m-d', strtotime($request->date_start. ' + '.$i .' day'))  <= $request->date_end; $i++) {
            foreach ($orders as $order) {
                if($order->status == 'Confirmed'){
                    continue;
                }
                if ($order->created_at->toDateString() == date('Y-m-d',strtotime($request->date_start."+".$i." days")))
                    $payedTotal += $order->payedTotal;
            }
            $bigTotal += $payedTotal;
            array_push($values2, $payedTotal);
            array_push($days2,date('m/d h:m',strtotime($request->date_start."+".$i." days")));
            $payedTotal = 0;
        }
        // ///////////////////// logic for revenue total
        $total = 0;
        foreach ($orders as $order){
            if($order->status == 'Confirmed'){
                continue;
            }
            $total+=$order->payedTotal;
        }
        $clients = $store->clients;

        //                   logic for client chart !!

        $bigTotalClients = 0;
        $totalClients = 0;
        for ($i = 0; date('Y-m-d', strtotime($request->date_start. ' + '.$i .' day'))  <= $request->date_end; $i++) {
            foreach ($clients as $client) {
                if ($client->created_at->toDateString() == date('Y-m-d',strtotime($request->date_start."+".$i." days")))
                    $totalClients += 1;
            }
            $bigTotalClients += $totalClients;
            array_push($values1, $totalClients);
            array_push($days1,date('m/d h:m',strtotime($request->date_start."+".$i." days")));
            $totalClients = 0;
        }


        $chart = new SaleProductChart();
        $chart->labels($days);
        $chart->dataset('Orders chart', 'line', $values)->options(['fill'=>'true','borderColor'=>'#f8fcf9'])->backgroundcolor('#f8fcf9');


        $chart1 = new SaleProductChart();
        $chart1->labels($days1);
        $chart1->dataset('Client chart', 'bar', $values1)->options(['fill'=>'true','borderColor'=>'#f8fcf9'])->backgroundcolor('#f8fcf9');


        $chart2 = new SaleProductChart();
        $chart2->labels($days2);
        $chart2->dataset('Revenue chart', 'bar', $values2)->options(['fill'=>'true','borderColor'=>'#51C1C0'])->backgroundcolor('#f8fcf9');


        return view('store.stats',compact('chart','chart1','chart2','products','orders','clients','total','biggestTotal','bigTotal','bigTotalClients'));

    }
}
