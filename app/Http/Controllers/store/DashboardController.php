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
        $chart->labels(['One', 'Two', 'Three', 'Four']);
        $chart->dataset('products sale', 'line', [3, 2, 3, 5])->backgroundColor('#ADD8E6');
        return view('store.stats',compact('chart'));

    }
}
