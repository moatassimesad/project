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
        $this->middleware(['auth']);
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
        return view('store.product_providers',compact('product'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'image' => 'required',
            'name' => 'required',
            'reference' => 'required',
            'price' => 'required',
            'shippingCost' => 'required',
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

        $product->shippingCost = $request->shippingCost;
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
        if($request->providers_quantity) {
            foreach ($request->providers_quantity as $key => $quantity) {
                $quantityTotal += $quantity;
            }
        }
        $product->quantity = $quantityTotal;
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
            'shippingCost' => 'required',
            'collection_name' => 'required',
            'description' => 'required',
        ]);
        $collection = Collection::where('name', $request->collection_name)->first();
        $user = User::find(auth()->user()->id);
        $product = Product::find($request->product_id);
        $product->name = $request->name;
        $product->reference = $request->reference;
        $product->price = $request->price;

        $product->shippingCost = $request->shippingCost;
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
        foreach ($request->providers_quantity as $key => $quantity) {
            if ($unitCosts[$key] == null) {
                continue;
            }
            $quantityTotal += $quantity;
        }
    }
        $product->quantity = $quantityTotal;
        $product->save();
        if($product->providers) {
            foreach ($product->providers as $provider) {
                $provider->pivot->delete();
            }
        }
        if($request->providers_quantity) {
            foreach ($request->providers_quantity as $key => $quantity) {
                if ($quantity == null || $unitCosts[$key] == null) {
                    continue;
                }
                $product->providers()->attach($key, ['quantity' => $quantity, 'unitCost' => $unitCosts[$key]]);
            }
        }


        return redirect()->route('list_product');
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
