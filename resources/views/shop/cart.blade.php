@extends('layouts.shop')


@section('content2')
<head>
    <style>
        .color{
            border : 1px solid black;
            width: 20px;
            height: 20px;
            border-radius: 50%;
        }

        .cartempty{
            margin-top: 45px;
        }
        .cartempty img{
            width: 120px;
            height: 120px;
        }

        .cartempty2 h3{
            color: #707070;


        }

        @media (max-width:768px) {
            .cartempty img{
                width: 100px;
                height: 100px;
            }
        }
    </style>
</head>
    <div class="container">
        @if(session('status2'))
            <div class="link alert alert-success mb-4 text-center" role="alert">
                {{ session('status2') }}
            </div>

        @endif

        @if(session('status3'))
            <div class="link alert alert-danger mb-4 text-center" role="alert">
                {{ session('status3') }}
            </div>

        @endif
            @if(session('status4'))
            <div class="link alert alert-danger mb-4 text-center" role="alert">
                {{ session('status4') }}
            </div>

        @endif

        <section>


            <!--Cart empty-->
        @if($cart == null)

                <div class="row cartempty justify-content-center">
                    @if($store->designName == 'sand')
                     <img  src="{{ asset('images/emptycart.png') }}" alt="empty cart">
                    @else
                    <img  src="{{ asset('images/emptycart2.png') }}" alt="empty cart">
                    @endif

                </div>
                <div class="row mt-3 cartempty2  justify-content-center">
                    <h3>YOUR CART IS EMPTY.</h3>
                </div>
                <div class="row mt-3 justify-content-center">
                    <a href="/shop/{{$store->id}}/all" ><button type="button" class="btn btn-primary btn-block waves-effect waves-light mt-2">Continue shopping</button></a>
                </div>

        @else

            <!--Grid row-->
            <div class="row mt-4">




                <!--Grid column-->
                <div class="col-lg-8">

                    <!-- Card -->
                    <div class="card wish-list mb-3">
                        <div class="card-body">

                                <h5 class="mb-4">Cart (<span>{{$cart->totalQty}}</span> items)</h5>
                                @foreach( $cart->items as $product)
                                    <div style="display: none;">{{$produit = \App\Models\Product::find($product['id'])}}</div>
                                    <div style="display: none;">{{$collection = $produit->collection }}</div>
                            <div class="row mb-4">
                                <div class="col-md-5 col-lg-3 col-xl-3">
                                    <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                                        <img class="img-fluid w-100"
                                             src="../images/{{ $product['image'] }}" alt="Sample">

                                    </div>
                                </div>
                                <div class="col-md-7 col-lg-9 col-xl-9">
                                    <div>
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h5>{{ $product['name'] }}</h5>
                                                <p class="mb-3 text-muted text-uppercase small">Category: {{ $collection->name }}</p>
                                                @if($product['color']!='none')
                                                <p class="mb-2 text-muted text-uppercase small">Color: {{ $product['color'] }}</p>
                                                @endif
                                                <div class="mb-2 text-muted text-uppercase small">
                                                    @foreach($produit->getColors() as $color)
                                                        @if($color == "none")
                                                            <div class="mt-3">No available colors for this product</div>
                                                        @else
                                                            <a type="button" href="@if($color == $product['color']) @else/cart_change_color/{{$store->id}}/{{$product['id']}}/{{$product['color']}}/{{$color}}@endif" class="color mt-3 mr-2" style="background-color: {{$color}}; @if($color == $product['color']) width: 25px; height: 25px;@endif"></a>
                                                        @endif
                                                    @endforeach
                                                </div>

                                            </div>
                                            <div>


                                                <form action="{{ route('cart_change_quantity') }}" method="post" id="quantityForm">
                                                    @csrf
                                                    @method('put')
                                                <div class="form-group mb-0 w-100 ">
                                                    <input type="hidden" name="product_id" id="product_id" value="{{$product['id']}}">
                                                    <input type="hidden" name="store_id" value="{{$store->id}}">
                                                    <input type="hidden" name="color" value="{{$product['color']}}">
                                                    <select name="quantity" class="form-control" id="exampleFormControlSelect1">
                                                        <option value="{{ $product['quantity'] }}" selected>{{ $product['quantity'] }}</option>
                                                        @for($i=1;$i<=$produit->quantity;$i++)
                                                        <option value="{{$i}}">{{$i}}</option>
                                                        @endfor
                                                    </select>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light mt-1">Submit</button>
                                                </div>
                                                </form>

                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">


                                            <form action="{{ route('cart_delete') }}" method="post">

                                                @csrf
                                                @method('delete')
                                            <div>
                                                <input type="hidden" name="product_id" value="{{$product['id']}}">
                                                <input type="hidden" name="store_id" value="{{$store->id}}">
                                                <input type="hidden" name="color" value="{{$product['color']}}">
                                                <button type="submit" style="background: none; border: none; padding: 0 !important;color: red" class="card-link-secondary small text-uppercase mr-3"><i
                                                        class="fas fa-trash-alt mr-1"></i> Remove item </button>
                                            </div>

                                            </form>
                                            <p class="mb-0"><span><strong>$ {{$product['price']}}</strong></span></p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-4">
                                @endforeach







                            <p class="text-primary mb-0"><i class="fas fa-info-circle mr-1"></i> Do not delay the purchase, adding
                                items to your cart does not mean booking them.</p>

                        </div>
                    </div>
                    <!-- Card -->

                    <!-- Card -->
                    <div class="card mb-3">
                        <div class="card-body">

                            <h5 class="mb-4">Delivery</h5>

                            <p class="mb-0"> Estimated shipping delivery: {{ \Carbon\Carbon::now()->addDays(2)->toDateString()}} - {{ \Carbon\Carbon::now()->addDays(3)->toDateString()}}.</p>
                            <p class="mb-0"> {{$store->name}} </p>
                            <p class="mb-0"><strong>Free</strong></p>

                        </div>
                    </div>
                    <!-- Card -->

                    <!-- Card -->

                    <div class="card mb-3">
                        <div class="card-body">

                            <h5 class="mb-4">We accept</h5>
                            @if($store->client_id != "")
                            <img class="mr-2" width="45px"
                                 src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/pp-acceptance-small.png" alt="Buy now with PayPal" />
                            @endif
                            <div>Cash on delivery</div>

                        </div>
                    </div>
                    <!-- Card -->

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4">

                    <!-- Card -->
                    <div class="card mb-3">
                        <div class="card-body">

                            <h5 class="mb-3">The total amount of</h5>

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                    Subtotal
                                    @if($cart)
                                    <span>$ {{$cart->totalPrice}}</span>
                                    @else
                                        <span>$ 0</span>
                                    @endif
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    Shipping
                                    <span><strong>Free</strong></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                    <div>
                                        <strong>Total</strong>
                                        <strong>
                                            <p class="mb-0">(including VAT)</p>
                                        </strong>
                                    </div>
                                    @if($cart)
                                        <span><strong>$ {{$cart->totalPrice}}</strong></span>
                                    @else
                                        <span><strong>$ 0</strong></span>
                                    @endif

                                </li>
                            </ul>


                            <a href="/checkout/{{ $store->id }}" target="_blank"><button type="button" class="btn btn-primary btn-block waves-effect waves-light mb-2 ">Go to checkout</button></a>

                            <a href="/shop/{{$store->id}}/all" ><button type="button" class="btn btn-primary btn-block waves-effect waves-light mt-2">Continue shopping</button></a>


                        </div>
                    </div>
                    <!-- Card -->



                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

            @endif

        </section>
    </div>
    <!--Section: Block Content-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>



    <script>
        $("#shoplink").css("border-bottom","2px solid #2E8AD0");
    </script>
@endsection
