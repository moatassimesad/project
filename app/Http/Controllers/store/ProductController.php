<?php

namespace App\Http\Controllers\store;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Models\Product;
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
        return view('store.add_product', compact('collections'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'images' => 'required',
            'name' => 'required',
            'reference' => 'required',
            'price' => 'required',
            'quantity' => 'required',
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
        $product->quantity = $request->quantity;
        $product->shippingCost = $request->shippingCost;
        $product->description = $request->description;
        $product->collection_id = $collection->id;
        $product->store_id = $store->id;
        if ($request->hasfile('images')) {
            $i = rand(1,10000);
            foreach ($request->file('images') as $file) {
                $extension = $file->getClientOriginalExtension();
                $name = $i . time() . '.' . $extension;
                $file->move('images/', $name);
                $imgData[] = $name;
                $i++;
            }


            $product->image = json_encode($imgData);
        }
        $product->save();
        return redirect()->route('stats');

    }
}
