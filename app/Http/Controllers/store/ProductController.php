<?php

namespace App\Http\Controllers\store;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Models\Product;
use App\Models\Provider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\User;
use Illuminate\Http\Request;



class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index_add()
    {
        $user = User::find(auth()->user()->id);
        $store = $user->store;
        $collections = $store->collections;
        $providers = $store->providers;
        return view('store.add_product', compact('collections', 'providers'));
    }

    public function index_list()
    {
        $user = User::find(auth()->user()->id);
        $store = $user->store;
        $products = $store->products;
        return view('store.list_product', compact('products'));
    }
    public function index_product_info($id){
        $product = Product::find($id);
        $user = auth()->user();
        $store = $user->store;
        $collections = $store->collections;
        $exluded_providers_ids = array();
        foreach ($product->providers as $provider){
            array_push($exluded_providers_ids,$provider->id);
        }

        $excluded_providers = Provider::select('*')->whereNotIn('id', $exluded_providers_ids)->get();
        return view('store.product_info',compact('product','collections','excluded_providers'));
    }


    public function index_product_providers_info($id){
        $product = Product::find($id);
        $colors = $product->getColors();
        return view('store.product_providers',compact('product','colors'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required',
            'name' => 'required',
            'reference' => 'required|unique:products',
            'price' => 'required',
            'collection_name' => 'required',
            'description' => 'required',
        ]);
        $collection = Collection::where('name', $request->collection_name)->first();
        $user = User::find(auth()->user()->id);
        $store = $user->store;
        $product = new Product();
        $product->name = $request->name;
        $product->reference = $request->reference;
        $product->price = $request->price;
        $item = "";
        if ($request->colors==null){
            $request->colors = ["none"];
        }
         foreach ($request->colors as $color){
             $item .=$color;
             $item .= ",";
    }
         $product->colors = $item;
        $product->description = $request->description;
        $product->collection_id = $collection->id;
        $product->store_id = $store->id;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extesion = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extesion;
            $file->move('images/', $fileName);
            $product->image = $fileName;
        }
        $quantityTotal = 0;
        $unitCosts = $request->providers_unitCost;
        if ($request->providers_quantity){
            if (array_values($request->providers_quantity)[0]) {
                foreach ($request->providers_quantity as $key => $quantity) {
                    if ($unitCosts[$key] == null) {
                        continue;
                    }
                    $quantityTotal += $quantity;
                }
                $product->quantity = $quantityTotal;
            }
            else{
                $product->quantity = $request->quantity;
            }
        }
        else{
            $product->quantity = $request->quantity;
        }
        if ($request->providers_quantity) {
            if ($product->quantity == 0 && array_values($request->providers_quantity)[0]) {
                return back()->with('status1', 'you must enter the unit cost for every single provider you entered');
            }
        }
        if ($product->quantity == null){
            return back()->with('status','you must enter the quantity or select your providers with provided quantities');
        }
        $product->save();
        //$product->providers()->sync(array_keys($request->providers),[]);
        $unitCosts = $request->providers_unitCost;
        if($request->providers_quantity) {
            foreach ($request->providers_quantity as $key => $quantity) {
                $product->providers()->attach($key, ['quantity' => $quantity, 'unitCost' => $unitCosts[$key]]);
            }
        }


        return redirect()->route('list_product');

    }
    public function edit(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'reference' => 'required',
            'price' => 'required',
            'collection_name' => 'required',
            'description' => 'required',
        ]);
        $collection = Collection::where('name', $request->collection_name)->first();
        $product = Product::find($request->product_id);

        $exist = DB::table('products')->where('reference', $request->reference)->first();
        if ($exist) {
            if ($product->id == $exist->id) {
                $product->name = $request->name;
                $product->reference = $request->reference;
                $product->price = $request->price;
                $item = "";
                if ($request->colors == null) {
                    $request->colors = ["none"];
                }
                foreach ($request->colors as $color) {
                    $item .= $color;
                    $item .= ",";
                }
                $product->colors = $item;
                $product->description = $request->description;
                $product->collection_id = $collection->id;
                if ($request->hasFile('image')) {
                    $path = 'images/' . $product->image;
                    File::delete($path);
                    $file = $request->file('image');
                    $extesion = $file->getClientOriginalExtension();
                    $fileName = time() . '.' . $extesion;
                    $file->move('images/', $fileName);
                    $product->image = $fileName;
                }
                $quantityTotal = 0;
                $unitCosts = $request->providers_unitCost;
                if ($request->providers_quantity) {
                    if (array_values($request->providers_quantity)[0]) {
                        foreach ($request->providers_quantity as $key => $quantity) {
                            if ($unitCosts[$key] == null) {
                                continue;
                            }
                            $quantityTotal += $quantity;
                        }
                        $product->quantity = $quantityTotal;
                    } else {
                        $product->quantity = $request->quantity;
                    }
                } else {
                    $product->quantity = $request->quantity;
                }
                if ($request->providers_quantity) {
                    if ($product->quantity == 0 && array_values($request->providers_quantity)[0]) {
                        return back()->with('status1', 'you must enter the unit cost for every single provider you entering');
                    }
                }
                if ($product->quantity == null) {
                    return back()->with('status', 'you must enter the quantity or select your providers with provided quantities');
                }


                $product->save();
                if ($product->providers) {
                    foreach ($product->providers as $provider) {
                        $provider->pivot->delete();
                    }
                }
                if ($request->providers_quantity) {
                    foreach ($request->providers_quantity as $key => $quantity) {
                        if ($quantity == null || $unitCosts[$key] == null) {
                            continue;
                        }
                        $product->providers()->attach($key, ['quantity' => $quantity, 'unitCost' => $unitCosts[$key]]);
                    }
                }


                return redirect()->route('list_product');
            } else {
                return back()->with('duplicate', 'The reference has already been taken.');
            }
        } else {
            $product->name = $request->name;
            $product->reference = $request->reference;
            $product->price = $request->price;
            $item = "";
            if ($request->colors == null) {
                $request->colors = ["none"];
            }
            foreach ($request->colors as $color) {
                $item .= $color;
                $item .= ",";
            }
            $product->colors = $item;
            $product->description = $request->description;
            $product->collection_id = $collection->id;
            if ($request->hasFile('image')) {
                $path = 'images/' . $product->image;
                File::delete($path);
                $file = $request->file('image');
                $extesion = $file->getClientOriginalExtension();
                $fileName = time() . '.' . $extesion;
                $file->move('images/', $fileName);
                $product->image = $fileName;
            }
            $quantityTotal = 0;
            $unitCosts = $request->providers_unitCost;
            if ($request->providers_quantity) {
                if (array_values($request->providers_quantity)[0]) {
                    foreach ($request->providers_quantity as $key => $quantity) {
                        if ($unitCosts[$key] == null) {
                            continue;
                        }
                        $quantityTotal += $quantity;
                    }
                    $product->quantity = $quantityTotal;
                } else {
                    $product->quantity = $request->quantity;
                }
            } else {
                $product->quantity = $request->quantity;
            }
            if ($request->providers_quantity) {
                if ($product->quantity == 0 && array_values($request->providers_quantity)[0]) {
                    return back()->with('status1', 'you must enter the unit cost for every single provider you entering');
                }
            }
            if ($product->quantity == null) {
                return back()->with('status', 'you must enter the quantity or select your providers with provided quantities');
            }


            $product->save();
            if ($product->providers) {
                foreach ($product->providers as $provider) {
                    $provider->pivot->delete();
                }
            }
            if ($request->providers_quantity) {
                foreach ($request->providers_quantity as $key => $quantity) {
                    if ($quantity == null || $unitCosts[$key] == null) {
                        continue;
                    }
                    $product->providers()->attach($key, ['quantity' => $quantity, 'unitCost' => $unitCosts[$key]]);
                }
            }


            return redirect()->route('list_product');
        }


    }

    public function delete($id)
    {
        $product = Product::find($id);
        if ($product->store->id == auth()->user()->store->id) {
            $product->delete();
            $path = 'images/' . $product->image;
            File::delete($path);
            return redirect()->route('list_product');
        }
        else{
            dd("Hehe maybe next time");
        }
    }




}
