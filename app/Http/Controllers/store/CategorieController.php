<?php

namespace App\Http\Controllers\store;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\User;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function __construct()
    {
        // unaccessable without auth
        $this->middleware(['auth']);
    }

    public function index_add(){
        return view('store.add_categorie');
    }
    public function index_list(){
        $user = User::find(auth()->user()->id);
        $categories = $user->categories;
        return view('store.list_categorie',compact('categories'));
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required|max:255',
            'reference'=>'required|max:255',
            'image'=>'required',
        ]);
        $categorie = new Categorie();
        $categorie->name = $request->name;
        $categorie->reference = $request->reference;
        $categorie->user_id = auth()->user()->id;
            if($request->hasFile('image')){
                $file = $request->file('image');
                $extesion = $file->getClientOriginalExtension();
                $fileName = time() . '.' . $extesion;
                $file->move('images/',$fileName);
                $categorie->image = $fileName;
            }
            $categorie->save();
            return redirect()->route('list_categorie');

    }
    public function index_categorie_info($id){
        $categorie = Categorie::find($id);
        return view('store.categorie_info',compact('categorie','id'));
    }

    public function delete($id){
        $categorie = Categorie::find($id);
        $categorie->delete();
        return redirect()->route('list_categorie');
    }
    public function edit(Request $request){

        $categorie = Categorie::find($request->id);
        $categorie->name = $request->name;
        $categorie->reference = $request->reference;
        $categorie->save();
        return redirect()->route('list_categorie');
    }
}
