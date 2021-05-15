<?php

namespace App\Http\Controllers\store;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function __construct()
    {
        // unaccessable without auth
        $this->middleware(['auth']);
    }

    public function index_add(){
        return view('store.add_category');
    }
    public function index_list(){
        $user = User::find(auth()->user()->id);
        $categories = $user->categories;
        return view('store.list_category',compact('categories'));
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required|max:255',
            'reference'=>'required|max:255',
            'image'=>'required',
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->reference = $request->reference;
        $category->user_id = auth()->user()->id;
            if($request->hasFile('image')){
                $file = $request->file('image');
                $extesion = $file->getClientOriginalExtension();
                $fileName = time() . '.' . $extesion;
                $file->move('images/',$fileName);
                $category->image = $fileName;
            }
            $category->save();
            return redirect()->route('list_category');

    }
    public function index_category_info($id){
        $category = Category::find($id);
        return view('store.category_info',compact('category','id'));
    }

    public function delete($id){
        $category = Category::find($id);
        $category->delete();
        $path = 'images/'.$category->image;
        File::delete($path);
        return redirect()->route('list_category');
    }
    public function edit(Request $request){
        $this->validate($request,[
            'name'=>'required|max:255',
            'reference'=>'required|max:255',
        ]);

        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->reference = $request->reference;
        $category->save();
        return redirect()->route('list_category');
    }
}
