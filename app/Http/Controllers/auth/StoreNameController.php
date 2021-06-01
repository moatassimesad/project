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
        $this->middleware(['auth']);
    }

    public function index(){
        if(auth()->user()->store){
            return redirect()->route('stats');
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
        'designName'=>'sand',
        'user_id'=>auth()->user()->id,
        ]);
        /*auth()->user()->stores->create([
            'storeName'=>''
        ]);*/

        return redirect()->route('stats');
    }
    public function edit_theme($id,$theme){
        $store = Store::find($id);
        $store->designName = $theme;
        $store->save();
        return back()->with('status','Theme changed successfully');
    }
}
