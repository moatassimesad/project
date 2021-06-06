<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class logOutController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    public function logout(){
        return redirect()->route('welcome')->with(Auth::logout());
    }
}
