@extends('layouts.store_admin')
@section('content1')
    <head>
        <link rel="stylesheet" href="css/add_product.css">
    </head>
    <form action="{{route('add_product')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="container">
            <div class="contenus pb-5 bg-light">
                <div  class="category_info row justify-content-center align-items-center cat_info">Add your product's pictures</div>
                <hr>
                <div  class="row justify-content-center files mt-2" style="@error('images') border:1px solid red; @enderror">
                    <input type="file" class="bg-light fl" id="image" name="images[]" multiple="multiple">
                </div>
                @error('images')
                <div style="color: red; text-align: center; margin-top: 50px;">{{ $message }}</div>
                @enderror


            </div>

        </div>

        <div class="container">
            <div class="contenus bg-light">
                <div  class="category_info row justify-content-center align-items-center cat_info">Product informations</div>
                <hr>
                <div  class="infos row justify-content-center align-items-center">
                    <input class="name"  name="name" type="text" style="@error('name') border-bottom:1px solid red; @enderror" placeholder="Untitled product" value="{{ old('name') }}">
                </div>
                @error('name')
                <div style="color: red; text-align: center;">{{ $message }}</div>
                @enderror
                <div  class="infos row justify-content-center align-items-center">
                    <input class="name"  name="reference" type="text" style="@error('reference') border-bottom:1px solid red; @enderror" placeholder="Reference" value="{{ old('reference') }}">
                </div>
                @error('reference')
                <div style="color: red; text-align: center;">{{ $message }}</div>
                @enderror
                <div  class="infos row justify-content-center align-items-center">
                    <input class="name"  name="price" type="number" style="@error('price') border-bottom:1px solid red; @enderror" placeholder="Price" value="{{ old('price') }}">
                </div>
                @error('price')
                <div style="color: red; text-align: center;">{{ $message }}</div>
                @enderror
                <div  class="infos row justify-content-center align-items-center">
                    <input class="name"  name="quantity" type="number" style="@error('quantity') border-bottom:1px solid red; @enderror" placeholder="Quantity" value="{{ old('quantity') }}">
                </div>
                @error('quantity')
                <div style="color: red; text-align: center;">{{ $message }}</div>
                @enderror
                <div  class="infos row justify-content-center align-items-center">
                    <input class="reference"  name="shippingCost" type="number" style="@error('shippingCost') border-bottom:1px solid red; @enderror" placeholder="Shipping" value="{{ old('shippingCost') }}">
                </div>
                @error('shippingCost')
                <div style="color: red; text-align: center;">{{ $message }}</div>
                @enderror
                <div  class="city_div align-items-center row justify-content-center">
                    <select id="city" name="collection_name" class="city" style="@error('collection_name') border-bottom:solid 1px red; @enderror" required value="{{ old('collection_name') }}">
                        <option value="Pick a collection" disabled selected>Pick a collection</option>
                        @foreach($collections as $collection)
                        <option value="{{ $collection->name }}">{{ $collection->name }}</option>
                        @endforeach
                    </select>

                </div>
                @error('collection_name')
                <div class="error">{{ $message }}</div>
                @enderror


                {{-- all the providers as a collection of checkboxes --}}
                <br><br><div style="text-align: center"><p><i>Here's all the providers as a collection of checkboxes</i></p></div>
                <br><br><br>
                <div class="row">
                    @foreach($providers as $provider)
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="">
                            <label class="form-check-label" for="defaultCheck2">
                                <input class="city sm"  name="shippingCost" type="number" style="@error('shippingCost') border-bottom:1px solid red; @enderror" placeholder="Shipping" value="{{ old('shippingCost') }}" disabled>
                                {{ $provider->name }}
                            </label>
                        </div>
                    </div>
                    @endforeach
                </div>



                <div class="text_area align-items-center row justify-content-center">
                    <textarea class="form-control" style="  @error('description') border:1px solid red;  @enderror" placeholder="Description..." name="description" rows="3"></textarea>
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


@endsection
