<?php

namespace App\Http\Controllers\store;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index_list(){
        $user = User::find(auth()->user()->id);
        $store = $user->store;
        $clients = $store->clients;
        return view('store.list_customer',compact('clients'));
    }
    public function delete($id){
        $client = Client::find($id);
        if ($client->store->id == auth()->user()->store->id) {
            $client->delete();
            return back()->with('status', 'Deleted successfully');
        }
        else{
            dd("Hehe maybe next time");
        }
    }
}
