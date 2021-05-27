
@extends('layouts.shop')


@section('content2')
    <style>
        .image{
            width: 150px;
            height: 150px;
        }
    </style>
    <div class="container">
        <div class="row">
            @if($cart)
                <div class="col-md-8">
                    @foreach( $cart->items as $product)
                        <div class="card mb-2">
                            <div class="card-body">
                                <h5 class="card-title">
                                    {{ $product['name'] }} ({{$product['color']}})
                                </h5>
                                <div class="card-img mb-2">
                                    <img src="../images/{{ $product['image'] }}" alt="image" class="image">
                                    Here the user can change the color !
                                </div>
                                <div class="card-text">
                                    MAD {{ $product['price'] }}

                                    <input type="text" name="qty" id="qty" value={{ $product['quantity']}}>
                                    <a href="#" class="btn btn-secondary btn-sm">Change</a>

                                    <form action="" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm ml-4 float-right" style="margin-top: -30px;">Remove</button>


                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <p><strong>Total : MAD {{$cart->totalPrice}}</strong></p>

                </div>

                <div class="col-md-4">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h3 class="card-titel">
                                Your Cart
                                <hr>
                            </h3>
                            <div class="card-text">
                                <p>
                                    Total Amount is MAD {{$cart->totalPrice}}
                                </p>
                                <p>
                                    Total Quantities is {{$cart->totalQty}}
                                </p>
                                <a href="" class="btn btn-info">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <p>There are no items in the cart</p>

            @endif
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>



    <script>
        $("#shoplink").css("border-bottom","2px solid #2E8AD0");
    </script>
@endsection

