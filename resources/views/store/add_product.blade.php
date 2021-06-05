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
                <div  class="row justify-content-center files mt-2" style="@error('image') border:1px solid red; @enderror">
                    <input type="file" class="bg-light fl" id="image" name="image">
                </div>
                @error('image')
                <div style="color: red; text-align: center; margin-top: 50px;">{{ $message }}</div>
                @enderror


            </div>

        </div>

        <div class="container">

            <section class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Product info</h3>
                </div>
                <div class="panel-body">






                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" id="name" style="@error('name') border-bottom:1px solid red; @enderror"  placeholder="Untitled product" value="{{ old('name') }}">
                            </div>
                            @error('name')
                            <div style="color: red; text-align: center;">{{ $message }}</div>
                            @enderror
                        </div> <!-- form-group // -->



                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Reference</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="reference" id="name"  style="@error('name') border-bottom:1px solid red; @enderror" placeholder="Reference" value="{{ old('reference') }}">
                            </div>
                            @error('reference')
                            <div style="color: red; text-align: center;">{{ $message }}</div>
                            @enderror
                        </div> <!-- form-group // -->

                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Price</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="price" id="name" placeholder="Price" style="@error('name') border-bottom:1px solid red; @enderror" value="{{ old('price') }}">
                            </div>
                            @error('price')
                            <div style="color: red; text-align: center;">{{ $message }}</div>
                            @enderror
                        </div> <!-- form-group // -->

                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Quantity </label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="quantity" id="name" placeholder="quantity" style="@error('quantity') border-bottom:1px solid red; @enderror" value="{{ old('quantity') }}">
                            </div>
                        </div> <!-- form-group // -->


                        <div class="form-group">
                            <label for="about" class="col-sm-3 control-label">Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control"  name="description" placeholder="Description"  style="@error('name') border-bottom:1px solid red; @enderror" value="{{ old('description') }}"></textarea>
                            </div>
                            @error('description')
                            <div style="color: red; text-align: center;">{{ $message }}</div>
                            @enderror
                        </div> <!-- form-group // -->



                        <div class="text-center mb-3">
                            Pick the colors
                        </div>
                        <div class="align-items-center row justify-content-center">
                            <select id="colors" multiple class="commits2 bg-dark" size="4" style="width: 30%; text-align: center; color: white; border-radius: 10px;" name="colors[]">

                            </select>
                        </div>








                        {{--                    <div class="form-group">--}}
                        {{--                        <label for="name" class="col-sm-3 control-label">Загрузить</label>--}}
                        {{--                        <div class="col-sm-3">--}}
                        {{--                            <label class="control-label small" for="file_img">Картинка (jpg/png):</label> <input type="file" name="file_img">--}}
                        {{--                        </div>--}}
                        {{--                        <div class="col-sm-3">--}}
                        {{--                            <label class="control-label small" for="file_img">Файлы:</label>  <input type="file" name="file_archive">--}}
                        {{--                        </div>--}}
                        {{--                    </div> <!-- form-group // -->--}}





                        {{-- all the providers as a collection of checkboxes --}}
                        <div style="text-align: center"><p><i>Select providers for your product</i></p></div>
                        <div class="row justify-content-center">
                            <table>
                                @foreach($providers as $provider)
                                    <tr class="mb-3">
                                        <td class="pt-3 pb-3"><input  data-id="{{ $provider->id }}" type="checkbox" class="provider-enable mr-2"></td>
                                        <td>{{ $provider->name }}</td>
                                        <td><input value="" {{ $provider->value ? null : 'disabled' }} data-id="{{ $provider->id }}" name="providers_quantity[{{ $provider->id }}]" type="number" class="provider-amount sm city ml-2 mr-2" placeholder="Quantity"></td>
                                        <td><input value="" {{ $provider->value ? null : 'disabled' }} data-id="{{ $provider->id }}" name="providers_unitCost[{{ $provider->id }}]" type="number" class="provider-amount sm city ml-2 mr-2" placeholder="unitCost"></td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>

                        <div class="form-group">
                            <label for="tech" class="col-sm-3 control-label">Category</label>
                            <div class="col-sm-3">
                                <select class="form-control" name="collection_name"  style="@error('collection_name') border-bottom:solid 1px red; @enderror" required value=" {{ old('collection_name') }} ">
                                    <option value="Pick a category" disabled selected>Pick a category</option>
                                    @foreach($collections as $collection)
                                        <option value="{{ $collection->name }}">{{ $collection->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('collection_name')
                            <div class="error">{{ $message }}</div>
                            @enderror
                        </div> <!-- form-group // -->


                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Shipping Cost</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="shippingCost" id="name" placeholder="Shipping Cost"   style="@error('name') border-bottom:1px solid red; @enderror" value="{{ old('shippingCost') }}">
                            </div>
                            @error('shippingCost')
                            <div style="color: red; text-align: center;">{{ $message }}</div>
                            @enderror
                        </div> <!-- form-group // -->



                        <hr>
                        <div style="height: 100px;" class="row justify-content-center mt-4">
                            <div><button type="submit" id="submit" name="submit"   class="btn btn-primary"><i class="fas fa-save"></i>&emsp;&emsp;Save&emsp;&emsp;</button></div>
                        </div>



                </div><!-- panel-body // -->
            </section><!-- panel// -->


        </div> <!-- container// -->

    </form>
















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
        $('document').ready(function () {
            $("#title").html("Product");
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
