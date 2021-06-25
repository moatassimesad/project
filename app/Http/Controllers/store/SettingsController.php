<?php

namespace App\Http\Controllers\store;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index()
    {
        return view('store.settings');
    }
    public function index_condition(){
        return view('store.condition_of_use');
    }

    public function index_contact(){
        $user = User::find(auth()->user()->id);
        $store = $user->store;
        return view('store.contact',compact('store'));
    }

    public function index_templates(){
        return view('store.templates');
    }


    public function edit_basic_info(Request $request)
    {

        $this->validate($request, [
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'city' => 'required',
            'phone' => 'required|',
        ]);

        $user = User::find(auth()->user()->id);
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->phone = $request->phone;
        $user->city = $request->city;
        $user->save();
        return back()->with('status', 'Changed successfully');
    }

    public function edit_login_info(Request $request)
    {


        $this->validate($request, [
            'password' => 'confirmed|required|different:old_password|min:8|string',
            'old_password' => 'required',
        ]);

        if (Hash::check($request->old_password, auth()->user()->password)) {
            $user = User::find(auth()->user()->id);
            $user->password = Hash::make($request->password);
            $user->save();
            return back()->with('status1', 'Password changed successfully');
        } else {
            return back()->with('status1', 'Invalid password');
        }

    }

    public function save_condition_of_use(Request $request){
        $this->validate($request,[
            'conditionOfUse'=>'required',
        ]);
        $user = User::find(auth()->user()->id);
        $store = $user->store;
        $store->conditionOfUse = $request->conditionOfUse;
        $store->save();
        return back()->with('status', 'Saved successfully');
    }

    public function save_contact(Request $request){
        $user = User::find(auth()->user()->id);
        $store = $user->store;
        $store->facebookLink = $request->facebookLink;
        $store->twitterLink = $request->twitterLink;
        $store->save();
        return back()->with('status', 'Saved successfully');
    }
}
