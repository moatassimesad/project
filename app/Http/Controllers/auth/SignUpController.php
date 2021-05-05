<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SignUpController extends Controller
{
    public function index(){
        return view('sign.sign_up');
    }
    public function store(){
//
    }
}
