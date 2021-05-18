<?php

namespace App\Http\Controllers\store;

use App\Http\Controllers\Controller;
use App\Models\Provider;
use App\Models\User;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index_add(){
        return view('store.add_provider');
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'reference'=>'required',
            'phone'=>'required',
            'address'=>'required',
        ]);
        $provider = new Provider();
        $user = User::find(auth()->user()->id);
        $store = $user->store;
        $provider->store_id = $store->id;
        $provider->name = $request->name;
        $provider->reference = $request->reference;
        $provider->phone = $request->phone;
        $provider->address = $request->address;
        $provider->save();
        return redirect()->route('stats');
    }

}
