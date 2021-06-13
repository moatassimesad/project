<?php

namespace App\Http\Controllers\store;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CollectionController extends Controller
{
    public function __construct()
    {
        // unaccessable without auth
        $this->middleware(['auth','verified']);
    }

    public function index_add(){
        return view('store.add_collection');
    }
    public function index_list(){
        $user = User::find(auth()->user()->id);
        $store = $user->store;
        $collections = $store->collections;
        return view('store.list_collection',compact('collections'));
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required|max:255',
            'reference'=>'required|max:255|unique:collections',
            'image'=>'required',
        ]);
        $collection = new Collection();
        $collection->name = $request->name;
        $collection->reference = $request->reference;
        $user = User::find(auth()->user()->id);
        $store = $user->store;
        $collection->store_id = $store->id;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extesion = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extesion;
            $file->move('images/',$fileName);
            $collection->image = $fileName;
        }
        $collection->save();
        return redirect()->route('list_collection');

    }
    public function index_collection_info($id){
        $collection = Collection::find($id);
        return view('store.collection_info',compact('collection','id'));
    }

    public function delete($id){
        $collection = Collection::find($id);
        if ($collection->store->id==auth()->user()->store->id){
        $collection->delete();
        $path = 'images/' . $collection->image;
        File::delete($path);
        return redirect()->route('list_collection');
    }
        else{
            dd("Hehe maybe next time");
        }
    }
    public function edit(Request $request){
        $this->validate($request,[
            'name'=>'required|max:255',
            'reference'=>'required|max:255',
        ]);


        $collection = Collection::find($request->id);

        $exist = DB::table('collections')->where('reference',$request->reference)->first();
        if ($exist) {
            if ($collection->id == $exist->id) {
                $collection->name = $request->name;
                $collection->reference = $request->reference;
                if ($request->hasFile('image')) {
                    $path = 'images/' . $collection->image;
                    File::delete($path);
                    $file = $request->file('image');
                    $extesion = $file->getClientOriginalExtension();
                    $fileName = time() . '.' . $extesion;
                    $file->move('images/', $fileName);
                    $collection->image = $fileName;
                }
                $collection->save();
                return redirect()->route('list_collection');
            } else {
               return back()->with('duplicate','The reference has already been taken.');
            }
        }
        else{
            $collection->name = $request->name;
            $collection->reference = $request->reference;
            if ($request->hasFile('image')) {
                $path = 'images/' . $collection->image;
                File::delete($path);
                $file = $request->file('image');
                $extesion = $file->getClientOriginalExtension();
                $fileName = time() . '.' . $extesion;
                $file->move('images/', $fileName);
                $collection->image = $fileName;
            }
            $collection->save();
            return redirect()->route('list_collection');
        }



    }
}
