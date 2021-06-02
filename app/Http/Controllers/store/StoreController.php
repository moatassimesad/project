<?php

namespace App\Http\Controllers\store;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

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
        $user = auth()->user();
        $store = $user->store;
        return view('store.edit_store',compact('store'));
    }


    public function add_store_images(Request $request)
    {
        $request->validate([
            'image_top' => 'required',
        ]);


        $user = User::find(auth()->user()->id);
        $store = $user->store;

        if($request->hasFile('image_top')){
            $file = $request->file('image_top');
            $extesion = $file->getClientOriginalExtension();
            $fileName =rand(0,10000). time() . '.' . $extesion;
            $file->move('images/',$fileName);
            $store->image_top = $fileName;
        }
        if($request->hasFile('image_bottom')){
            $file = $request->file('image_bottom');
            $extesion = $file->getClientOriginalExtension();
            $fileName =rand(0,10000). time() . '.' . $extesion;
            $file->move('images/',$fileName);
            $store->image_bottom = $fileName;
        }
        $store->save();
        return back()->with('status2', 'File has successfully uploaded!');
    }



    public function edit_store_info(Request $request){
        $this->validate($request,[
            'storeName'=>'required',
            'storeActivityType'=>'required',
        ]);
        $user = User::find(auth()->user()->id);
        $store = $user->store;
        $store->name = $request->storeName;
        $store->storeActivityType = $request->storeActivityType;
        $store->textLayer_top = $request->textLayer_top;
        $store->textLayer_bottom = $request->textLayer_bottom;
        $store->save();
        return back()->with('status3', 'Informations have been updated successfully');
    }
}
