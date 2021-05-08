<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreNameController extends Controller
{
    public function index(){
        return view('sign.store_name');
    }
    public function store(Request $request){
        //validation
        $this->validate($request,[
            'storeName'=>'required|max:255',
            'storeActivityType'=>'required',
        ]);
        //store data
        $store = new Store();

        return redirect()->route('store_stats');
    }
}
