<?php

namespace App\Http\Controllers\store;

use App\Http\Controllers\Controller;
use App\Models\Delivery;
use App\Models\User;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function __construct()
    {
        // unaccessable without auth
        $this->middleware(['auth']);
    }

    public function index_add(){
        return view('store.add_delivery');
    }

    public function index_list(){
        $user = User::find(auth()->user()->id);
        $deliveries = $user->deliveries;
        return view('store.list_delivery',compact('deliveries'));
    }
    public function store(Request $request){
        //validation
        $this->validate($request,[
            'name'=>'required|max:255',
            'reference'=>'required|max:255',
            'address'=>'required|max:255',
            'phone'=>'required|max:255',
        ]);
        //store data
        Delivery::create([
            'name'=>$request->name,
            'reference'=>$request->reference,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'user_id'=>auth()->user()->id,
        ]);
        return redirect()->route('list_delivery');

    }
}
