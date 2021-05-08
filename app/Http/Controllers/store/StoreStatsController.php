<?php

namespace App\Http\Controllers\store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreStatsController extends Controller
{
    public function index(){
        return view('store.store_stats');
    }
}
