<?php

namespace App\Http\Controllers\store;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $user = User::find(auth()->user()->id);
        $store = $user->store;
        return view('store.settings',compact('store'));
    }


    public function edit_basic_info(Request $request)
    {

        $this->validate($request, [
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'city' => 'required',
            'phone' => 'required|',
        ]);

        $user = User::find(auth()->user()->id);
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->phone = $request->phone;
        $user->city = $request->city;
        $user->save();
        return back()->with('status', 'Changed successfully');
    }

    public function edit_login_info(Request $request)
    {


        $this->validate($request, [
            'password' => 'confirmed|required|different:old_password',
            'old_password' => 'required',
        ]);

        if (Hash::check($request->old_password, auth()->user()->password)) {
            $user = User::find(auth()->user()->id);
            $user->password = Hash::make($request->password);
            $user->save();
            return back()->with('status1', 'Password changed successfully');
        } else {
            return back()->with('status1', 'Invalid password');
        }

    }

    public function add_store_images(Request $request)
    {
        $request->validate([
            'images' => 'required',
        ]);

        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $file) {
                $extension = $file->getClientOriginalExtension();
                $name = time().$extension;
                $file->move('images/',$name);
                $imgData[] = $name;
            }
            $user = User::find(auth()->user()->id);
            $store = $user->store;
            $store->image = json_encode($imgData);


            $store->save();

            return back()->with('status2', 'File has successfully uploaded!');
        }

    }

    public function edit_store_info(Request $request){
        $this->validate($request,[
            'storeName'=>'required',
            'storeActivityType'=>'required',
            'textLayer'=>'required',
        ]);
        $user = User::find(auth()->user()->id);
        $store = $user->store;
        $store->name = $request->storeName;
        $store->storeActivityType = $request->storeActivityType;
        $store->textLayer = $request->textLayer;
        $store->save();
        return back()->with('status3', 'Informations have been updated successfully');
    }
}
