<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SignInController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index(){
        return view('sign.sign_in');
    }
    public function signin(Request $request){
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required',
        ]);
        if(!auth()->attempt($request->only('email','password'),$request->remember)){
            return back()->with('status','invalid login');
        }
        return redirect()->route('store_stats');
    }
}
