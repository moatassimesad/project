@extends('layouts.store_admin')
@section('content1')
@if($product->store->id == auth()->user()->store->id)
    <form action="{{ route('edit_product') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">

        <div class="container">
            @if(session('status'))
                <div class="success alert alert-danger" role="alert">{{ session('status') }}</div>

            @endif
            @if(session('status1'))
                <div class="success alert alert-danger" role="alert">{{ session('status1') }}</div>

            @endif
            <div class="contenus bg-light">
                <div  class="row justify-content-center align-items-center cat_info">Product info</div>
                <hr>
                <div class="form-group m-5">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" style="@error('name') border:1px solid red; @enderror" placeholder="Untitled product" value="{{$product->name}}">
                </div>
                @error('name')
                <div style="color: red; text-align: center;">{{ $message }}</div>
                @enderror
                <div class="form-group m-5">
                    <label for="name">Reference</label>
                    <input type="text" class="form-control" name="reference" style="@error('reference') border:1px solid red; @enderror" placeholder="Reference" value="{{$product->reference}}">
                </div>
                @error('reference')
                <div style="color: red; text-align: center;">{{ $message }}</div>
                @enderror
                @if(session('duplicate'))
                    <div style="color: red; text-align: center;">{{ session('duplicate') }}</div>
                @endif
                <div class="form-group m-5">
                    <label for="name">Price ($)</label>
                    <input type="number" min="0" class="form-control" name="price" style="@error('price') border:1px solid red; @enderror" placeholder="Price ($)" value="{{$product->price}}">
                </div>
                @error('price')
                <div style="color: red; text-align: center;">{{ $message }}</div>
                @enderror
                <div class="form-group m-5">
                    <label for="name">Quantity</label>
                    <input type="number" min="0" class="form-control" name="quantity" placeholder="if you have any provider the quantity will be calculated automatically..." value="@if($product->providers->count()==0)  {{ $product->quantity }}   @endif">
                </div>
                <div class="mb-3">
                    <div style="text-align: center"><p><i>Select colors you have for your product</i></p></div>
                </div>
                <div class="align-items-center row justify-content-center">
                    <select id="colors" multiple class="bg-dark" style="width: 30%; text-align: center; color: white; border-radius: 10px;" name="colors[]">

                    </select>
                </div>
                <div class="form-group m-4">
                    <label for="collection_name">Collection</label>
                    <select id="city" name="collection_name" class="form-control" id="city">
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
                @if($product->providers->count() || $excluded_providers->count())
                <div style="text-align: center"><p><i>Select providers for your product</i></p></div>



                <div class="container">

                    <div class="row justify-content-center">
                        <table class="table table-sm table-borderless mr-1 ml-1 mt-4">
                            <thead>
                            <tr>
                                <th style="font-size: smaller" scope="col">NAME</th>
                                <th style="font-size: smaller" scope="col">QUANTITY</th>
                                <th style="font-size: smaller" scope="col">UNIT COST</th>
                            </tr>
                            </thead>
                            @foreach($product->providers as $provider)
                                <tr class="mb-3">

                                    <td style="font-size: smaller">{{ $provider->name }}</td>
                                    <td style="font-size: smaller"><input min="0" value="{{ $provider->pivot->quantity }}" name="providers_quantity[{{ $provider->id }}]" type="number" class="form-control form-control-sm ml-2 mr-2"></td>
                                    <td style="font-size: smaller"><input min="0" value="{{ $provider->pivot->unitCost }}" name="providers_unitCost[{{ $provider->id }}]" type="number" class="form-control form-control-sm ml-2 mr-2"></td>
                                </tr>
                            @endforeach
                            @foreach($excluded_providers as $provider)
                                <tr class="mb-3">
                                    <td style="font-size: smaller">{{ $provider->name }}</td>
                                    <td style="font-size: smaller"><input min="0" value="" name="providers_quantity[{{ $provider->id }}]" type="number" class="form-control form-control-sm ml-2 mr-2" placeholder="Quantity"></td>
                                    <td style="font-size: smaller"><input min="0" value="" name="providers_unitCost[{{ $provider->id }}]" type="number" class="form-control form-control-sm ml-2 mr-2" placeholder="unitCost"></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

                </div>
                @endif



                <div  class="row justify-content-center files mt-3" style="@error('image') border:1px solid red; @enderror">
                    <input type="file" class="bg-light fl" id="image" name="image">
                </div>
                @error('image')
                <div style="color: red; text-align: center; margin-top: 50px;">{{ $message }}</div>
                @enderror

                <div class="align-items-center row justify-content-center mt-5 mr-3 ml-3">
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
    let tab=["red","green","yellow","black","blue","white","orange","pink"];
    document.getElementById("colors").setAttribute("size",tab.length+1);
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
    $('document').ready(function () {
        $("#title").html("Product");
        $(".products").addClass('active');
        $(".products_toggle").addClass('active');
        $('.provider-enable').on('click', function () {
            let id = $(this).attr('data-id')
            let enabled = $(this).is(":checked")
            $('.provider-amount[data-id="' + id + '"]').attr('disabled', !enabled)
            $('.provider-amount[data-id="' + id + '"]').val(null)
        })
    });
</script>
<script>
    $('option').mousedown(function(e) {
        e.preventDefault();
        $(this).prop('selected', $(this).prop('selected') ? false : true);
        return false;
    });
</script>
@endsection
