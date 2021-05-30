<?php

namespace App\Http\Controllers\auth;

use App\Charts\SaleProductChart;
use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreNameController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index(){
        if(auth()->user()->store){
            $values = [19,3,5,1,19,6,19];
            $days = ['Monday', 'Tuesday', 'Wednesday', 'thursday','Friday','Saturday','Sunday'];
            $user = auth()->user();
            $store = $user->store;
            $products = $store->products;
            $chart = new SaleProductChart();
            $chart->labels($days);
            $chart->dataset('products sale', 'line', $values)->backgroundColor('rgba(52, 130, 255, 0.2)');
            return view('store.stats',compact('chart','products'));
        }
        else {
            return view('sign.store_name');
        }
    }
    public function store(Request $request){
        //validation
        $this->validate($request,[
            'storeName'=>'required|max:255',
            'storeActivityType'=>'required',
        ]);

        Store::create([
        'name'=>$request->storeName,
        'storeActivityType'=>$request->storeActivityType,
        'designName'=>$request->storeActivityType,
        'user_id'=>auth()->user()->id,
        ]);
        /*auth()->user()->stores->create([
            'storeName'=>''
        ]);*/

        return redirect()->route('stats');
    }
}
