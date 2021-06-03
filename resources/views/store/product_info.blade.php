@extends('layouts.store_admin')
@section('content1')
<head>
    <link href="{{ asset('css/product_info.css') }}" rel="stylesheet">
</head>
@if($product->store->id == auth()->user()->store->id)
    <form action="{{ route('edit_product') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <div class="container">
            <div class="contenus pb-5 bg-light">
                <div  class="category_info row justify-content-center align-items-center cat_info">Add your product's pictures</div>
                <hr>
                <div  class="row justify-content-center files mt-2" style="@error('image') border:1px solid red; @enderror">
                    <input type="file" class="bg-light fl" id="image" name="image">
                </div>
                @error('image')
                <div style="color: red; text-align: center; margin-top: 50px;">{{ $message }}</div>
                @enderror


            </div>

        </div>

        <div class="container">
            <div class="contenus bg-light">
                <div  class="category_info row justify-content-center align-items-center cat_info">Product informations</div>
                <hr>
                <div  class="infos row justify-content-center align-items-center">
                    <input class="name"  name="name" type="text" style="@error('name') border-bottom:1px solid red; @enderror" placeholder="Untitled product" value="{{ $product->name }}">
                </div>
                @error('name')
                <div style="color: red; text-align: center;">{{ $message }}</div>
                @enderror
                <div  class="infos row justify-content-center align-items-center">
                    <input class="name"  name="reference" type="text" style="@error('reference') border-bottom:1px solid red; @enderror" placeholder="Reference" value="{{ $product->reference }}">
                </div>
                @error('reference')
                <div style="color: red; text-align: center;">{{ $message }}</div>
                @enderror
                <div  class="infos row justify-content-center align-items-center">
                    <input class="name"  name="price" type="number" style="@error('price') border-bottom:1px solid red; @enderror" placeholder="Price" value="{{ $product->price }}">
                </div>
                @error('price')
                <div style="color: red; text-align: center;">{{ $message }}</div>
                @enderror
                <div  class="infos row justify-content-center align-items-center">
                    <input class="reference"  name="shippingCost" type="number" style="@error('shippingCost') border-bottom:1px solid red; @enderror" placeholder="Shipping" value="{{ $product->shippingCost }}">
                </div>
                @error('shippingCost')
                <div style="color: red; text-align: center;">{{ $message }}</div>
                @enderror
                <div  class="infos row justify-content-center align-items-center">
                    <input class="reference" name="quantity" type="number" placeholder="Quantity (No providers)" value="{{ old('quantity') }}">
                </div>
                <div class="text-center mb-3">
                    Pick the colors
                </div>
                <div class="align-items-center row justify-content-center">
                    <select id="colors" multiple class="commits2 bg-dark" size="4" style="width: 30%; text-align: center; color: white; border-radius: 10px;" name="colors[]">

                    </select>
                </div>
                <div  class=" align-items-center row justify-content-center" style="height: 100px">
                    <select id="city" name="collection_name" style="height: 30px; border: none; border-bottom: solid 1px; background: none;@error('collection_name') border-bottom:solid 1px red; @enderror" required value="{{ old('collection_name') }}">
                        <option value="{{$product->collection->name}}" selected>{{$product->collection->name}}</option>
                        @foreach($collections as $collection)
                            @continue($collection == $product->collection)
                            <option value="{{ $collection->name }}">{{ $collection->name }}</option>
                        @endforeach
                    </select>

                </div>
                @error('collection_name')
                <div class="error">{{ $message }}</div>
                @enderror


                {{-- all the providers as a collection of checkboxes --}}
                <div style="text-align: center"><p><i>Select providers for your product</i></p></div>



                <div class="container">

                    <div class="row justify-content-center">
                        <table>
                            @foreach($product->providers as $provider)
                                <tr class="mb-3">
                                    <td>{{ $provider->name }}</td>
                                    <td><input style="width: 90px; height: 30px; border: none; border-bottom: solid 1px; background: none;" value="{{ $provider->pivot->quantity }}" name="providers_quantity[{{ $provider->id }}]" type="number" class="ml-2 mr-2" placeholder="Quantity"></td>
                                    <td><input style="width: 90px; height: 30px; border: none; border-bottom: solid 1px; background: none;" value="{{ $provider->pivot->unitCost }}" name="providers_unitCost[{{ $provider->id }}]" type="number" class="ml-2 mr-2" placeholder="unitCost"></td>
                                </tr>
                            @endforeach
                            @foreach($excluded_providers as $provider)
                                <tr class="mb-3">
                                    <td>{{ $provider->name }}</td>
                                    <td><input style="width: 90px; height: 30px; border: none; border-bottom: solid 1px; background: none;" value="" name="providers_quantity[{{ $provider->id }}]" type="number" class="ml-2 mr-2" placeholder="Quantity"></td>
                                    <td><input style="width: 90px; height: 30px; border: none; border-bottom: solid 1px; background: none;" value="" name="providers_unitCost[{{ $provider->id }}]" type="number" class="ml-2 mr-2" placeholder="unitCost"></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

                </div>




                <div class="text_area align-items-center row justify-content-center mt-5 mr-2 ml-2">
                    <textarea class="form-control" style="  @error('description') border:1px solid red;  @enderror" placeholder="Description..." name="description" rows="3">{{ $product->description }}</textarea>
                </div>
                @error('description')
                <div style="color: red; text-align: center; margin-top: 50px;">
                    {{$message}}

                </div>
                @enderror
                <div style="height: 100px;" class="row justify-content-center mt-4">
                    <div><button type="submit" id="submit" name="submit"   class="btn btn-primary"><i class="fas fa-save"></i>&emsp;&emsp;Save&emsp;&emsp;</button></div>
                </div>


            </div>
        </div>

    </form>
@else
    <div class="container">
        <div class="row mt-5 justify-content-center text-muted"><h1 style="margin-top: 100px;">No such product to edit</h1></div>
    </div>
@endif
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>
    let tab=["red","green","yellow","black","blue","white","orange"];
    for(let i =1; i<=tab.length;i++){
        let option= document.createElement("option");
        option.value=tab[i-1];
        option.classList.add("mb-1");
        let text=document.createTextNode(tab[i-1]);
        option.appendChild(text);
        document.getElementById("colors").appendChild(option);
    }
</script>
<script>
    $('option').mousedown(function(e) {
        e.preventDefault();
        $(this).prop('selected', $(this).prop('selected') ? false : true);
        return false;
    });
</script>
@endsection
