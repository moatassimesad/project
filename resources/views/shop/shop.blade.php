@extends('layouts.shop')


@section('content2')
<head>
{{--    <style>--}}
{{--        .images{--}}
{{--            border-radius: 10px;--}}
{{--            height: 200px;--}}
{{--            width: 200px;--}}
{{--        }--}}

{{--        .img-product img{--}}
{{--            width: 200px;--}}
{{--            height: 200px;--}}
{{--        }--}}

{{--        #allProducts{--}}
{{--            margin-top: 3rem;--}}
{{--            margin-left: 1rem;--}}
{{--            font-family: Helvetica, sans-serif;--}}
{{--            font-weight: 400;--}}
{{--            letter-spacing: 1px;--}}
{{--            color: #413C3C;--}}


{{--        }--}}
{{--        .price{--}}
{{--            color: #413C3C;--}}
{{--            font-size: small;--}}
{{--            font-family: Helvetica, sans-serif;--}}
{{--        }--}}
{{--        .productName{--}}
{{--            font-size: medium;--}}
{{--            font-family: Helvetica, sans-serif;--}}
{{--            font-weight: bold;--}}
{{--            color: #413C3C;--}}
{{--        }--}}



{{--        @media (max-width:992px) {--}}
{{--            .img-product img{--}}
{{--                width: 170px;--}}
{{--                height: 170px;--}}
{{--            }--}}

{{--            .productName{--}}
{{--                font-size: 15px;--}}
{{--            }--}}

{{--            .price{--}}
{{--                font-size: 13px;--}}
{{--            }--}}
{{--        }--}}








{{--    </style>--}}


    <style>
        .images{
            border-radius: 10px;
            height: 200px;
            width: 200px;
        }

        .img-product img{
            width: 200px;
            height: 200px;
        }

        #allProducts{
            margin-top: 3rem;
            margin-left: 1rem;
            font-family: Helvetica, sans-serif;
            font-weight: 400;
            letter-spacing: 1px;
            color: #e3dede;


        }
        .price{
            color: #e3dede;
            font-size: small;
            font-family: Helvetica, sans-serif;
        }
        .productName{
            font-size: medium;
            font-family: Helvetica, sans-serif;
            font-weight: bold;
            color: #e3dede;
        }



        @media (max-width:992px) {
            .img-product img{
                width: 170px;
                height: 170px;
            }

            .productName{
                font-size: 15px;
            }

            .price{
                font-size: 13px;
            }
        }








    </style>
</head>


    <div class="container">

        <div class="row " id="allProducts">
            <div class="col-12">
                <h4 >Products</h4>
            </div>
        </div>

        @if($products->count())
        @for($i=0;$i<$products->count();$i++)
            <div class="row img-product">
                @if($products->getNth($i)!=null)
                <div class="col-md-3 col-sm-6 col-6 text-center mt-3 productInfo">
                    <a href="/product_preview/{{ $store->id }}/{{$products->getNth($i)->id}}"> <img src="../images/{{ $products->getNth($i)->image }}" alt="" class="images"></a>
                    <div  class="productName">{{$products->getNth($i)->name}}</div>
                    <div class="price" >MAD {{$products->getNth($i)->price}} </div>
                    <div>
                    <a href="/product_preview/{{ $store->id }}/{{$products->getNth($i)->id}}" class="btn btn-dark mt-1"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                    </div>
                </div>
                @endif
                <input type="hidden" value="{{ $i++ }}">
                @if($products->getNth($i)!=null)
                    <div class="col-md-3 col-sm-6 col-6 text-center mt-3">
                        <a href="/product_preview/{{ $store->id }}/{{$products->getNth($i)->id}}"> <img src="../images/{{ $products->getNth($i)->image}}" alt="" class="images"></a>
                        <div class="productName" >{{$products->getNth($i)->name}}</div>
                        <div class="price" >MAD {{$products->getNth($i)->price}} </div>
                        <div >
                            <a href="/product_preview/{{ $store->id }}/{{$products->getNth($i)->id}}" class="btn btn-dark mt-1"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                        </div>
                    </div>
                @endif
                <input type="hidden" value="{{ $i++ }}">
                @if($products->getNth($i)!=null)
                    <div class="col-md-3 col-sm-6 col-6 text-center mt-3">
                        <a href="/product_preview/{{ $store->id }}/{{$products->getNth($i)->id}}"> <img src="../images/{{ $products->getNth($i)->image}}" alt="" class="images"></a>
                        <div class="productName" >{{$products->getNth($i)->name}}</div>
                        <div class="price" >MAD {{$products->getNth($i)->price}} </div>
                        <div>
                            <a href="/product_preview/{{ $store->id }}/{{$products->getNth($i)->id}}" class="  btn btn-dark mt-1"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                        </div>
                    </div>
                @endif
                <input type="hidden" value="{{ $i++ }}">
                @if($products->getNth($i)!=null)
                    <div class="col-md-3 col-sm-6 col-6 text-center mt-3">
                        <a href="/product_preview/{{ $store->id }}/{{$products->getNth($i)->id}}"> <img src="../images/{{ $products->getNth($i)->image}}" alt="" class="images"></a>
                        <div class="productName" >{{$products->getNth($i)->name}}</div>
                        <div class="price" >MAD {{$products->getNth($i)->price}} </div>
                        <div >
                            <a href="/product_preview/{{ $store->id }}/{{$products->getNth($i)->id}}" class="btn btn-dark mt-1"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                        </div>
                    </div>
                @endif
            </div>
        @endfor

        @else
            <div class="row img-product">
                @for($i=0;$i<4;$i++)

                    <div class="col-md-3 col-sm-6 col-6 text-center mt-3 ">
                        <a href="/product_preview/{{ $store->id }}}"> <img style="border: 1px solid #707070" src="{{ asset('images/celloction_logo.png') }}" alt="" class="images"></a>
                        <div class="productName">Product Name</div>
                        <div class="price" >MAD 1.00</div>
                        <div >
                            <a href="/product_preview/{{ $store->id }}" class=" btn btn-dark mt-1 disabled"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                        </div>
                    </div>

                @endfor
            </div>
        @endif



    </div>
<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>







<script>
    $("#shoplink").css("border-bottom","2px solid #2E8AD0");
</script>

@endsection
