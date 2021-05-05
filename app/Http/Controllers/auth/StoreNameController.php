<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreNameController extends Controller
{
    public function index(){
        return view('sign.store_name');
    }
    public function store(){
        //
    }
}
