<?php

namespace App\Http\Controllers\store;

use App\Http\Controllers\Controller;
use App\Models\Delivery;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeliveryController extends Controller
{
    public function __construct()
    {
        // unaccessable without auth
        $this->middleware(['auth','verified']);
    }

    public function index_add(){
        return view('store.add_delivery');
    }

    public function index_list(){
        $user = User::find(auth()->user()->id);
        $store = $user->store;
        $deliveries = $store->deliveries;
        return view('store.list_delivery',compact('deliveries'));
    }
    public function store(Request $request){
        //validation
        $this->validate($request,[
            'name'=>'required|max:255',
            'reference'=>'required|max:255|unique:deliveries',
            'address'=>'required|max:255',
            'phone'=>'required|max:255',
        ]);
        $user = User::find(auth()->user()->id);
        $store = $user->store;
        //store data
        Delivery::create([
            'name'=>$request->name,
            'reference'=>$request->reference,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'store_id'=>$store->id,
        ]);
        return redirect()->route('list_delivery');

    }
    public function index_delivery_info($id){
        $delivery = Delivery::find($id);
        return view('store.delivery_info',compact('delivery','id'));
    }
    public function edit(Request $request){
        $this->validate($request,[
           'name'=>'required',
           'reference'=>'required',
           'address'=>'required',
           'phone'=>'required',
        ]);


        $delivery = Delivery::find($request->id);

        $exist = DB::table('deliveries')->where('reference',$request->reference)->first();
        if ($exist) {
            if ($delivery->id == $exist->id) {
                $delivery->name = $request->name;
                $delivery->reference = $request->reference;
                $delivery->address = $request->address;
                $delivery->phone = $request->phone;
                $delivery->save();
                return redirect()->route('list_delivery');
            } else {
                return back()->with('duplicate','The reference has already been taken.');
            }
        }
        else{
            $delivery->name = $request->name;
            $delivery->reference = $request->reference;
            $delivery->address = $request->address;
            $delivery->phone = $request->phone;
            $delivery->save();
            return redirect()->route('list_delivery');
        }


        $delivery->name = $request->name;
        $delivery->reference = $request->reference;
        $delivery->address = $request->address;
        $delivery->phone = $request->phone;
        $delivery->save();
        return redirect()->route('list_delivery');
    }
    public function delete($id){
        $delivery = Delivery::find($id);
        if($delivery->store->id==auth()->user()->store->id) {
            $delivery->delete();
            return redirect()->route('list_delivery');
        }
        else{
            dd("Hehe maybe next time");
        }
    }
}
