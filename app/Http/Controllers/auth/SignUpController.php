<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Input\Input;

class SignUpController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index(){
        return view('sign.sign_up');
    }
    public function store(Request $request){

        //validation
        $this->validate($request, [
            'firstName'=> 'required|max:255|string',
            'lastName'=> 'required|max:255|string',
            'email'=> 'required|email|max:255|string|unique:users',
            'city'=> 'required',
            'phone'=> 'required',
            'password'=> 'required|confirmed|min:8|string',
        ]);
        //storing_data


        //first way
        /*$user = new User();
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->email = $request->email;
        $user->city = $request->city;
        $user->phone = $phone;
        $user->password = Hash::make($request->password);
        $user->save();*/


        //another way ⬇️
        User::create([
            'firstName'=>$request->firstName,
            'lastName'=>$request->lastName,
            'email'=>$request->email,
            'city'=>$request->city,
            'phone'=>$request->phone,
            'password'=>Hash::make($request->password),
        ]);



        //sign the user in

        auth()->attempt($request->only('email','password'));
        //redirect user
        return redirect()->route('store_name');


    }
}
