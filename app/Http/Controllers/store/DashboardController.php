<?php

namespace App\Http\Controllers\store;


use App\Http\Controllers\Controller;
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
        $values = [9,3,5,1,9,6,8];
        $days = ['Monday', 'Tuesday', 'Wednesday', 'thursday','Friday','Saturday','Sunday'];
        $user = auth()->user();
        $store = $user->store;
        $products = $store->products;
        $chart = new SaleProductChart();
        $chart->labels($days);
        $chart->dataset('products sale', 'line', $values)->backgroundColor('rgba(52, 130, 255, 0.2)');
        return view('store.stats',compact('chart','products'));

    }
}
