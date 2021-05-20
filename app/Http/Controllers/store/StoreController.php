<?php

namespace App\Http\Controllers\store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index_themes()
    {


        return view('store.themes');
    }
    public function index_templates_1( )
    {
        return view('store.templates');
    }
    public function index_edit_store_1( )
    {
        return view('store.edit_store');
    }
}
