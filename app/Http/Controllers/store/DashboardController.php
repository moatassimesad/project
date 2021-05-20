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
        $chart = new SaleProductChart();
        $chart->labels(['Monday', 'Tuesday', 'Wednesday', 'thursday','Friday','Saturday','Sunday']);
        $chart->dataset('products sale', 'line', [9,3,5,1,9,6,8])->backgroundColor('pink');
        return view('store.stats',compact('chart'));

    }
}
