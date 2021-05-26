@extends('layouts.shop')


@section('content2')
<head>
    <style>
        .images{
            border-radius: 10px;
            height: 200px;
            width: 200px;
        }




    </style>
</head>

    <div class="container">
        <div class="row ml-5">
            <i class="fa fa-cubes"></i>
            <div class="ml-1">All products</div>
        </div>
    </div>
    <div class="container">


        @for($i=0;$i<$products->count();$i++)
            <div class="row justify-content-around">
                @if($products->getNth($i)!=null)
                <div class="mt-5 flex-column">
                    <a href="/product_preview/{{ $store->id }}/{{$products->getNth($i)->id}}"> <img src="../images/{{ $products->getNth($i)->image }}" alt="" class="images"></a>
                    <div  style="text-align: center">{{$products->getNth($i)->name}}</div>
                    <div  style="text-align: center">{{$products->getNth($i)->price}} MAD</div>
                    <div style="margin-left: 17%">
                    <a href="/product_preview/{{ $store->id }}/{{$products->getNth($i)->id}}" class="btn btn-dark mt-1"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                    </div>
                </div>
                @endif
                <input type="hidden" value="{{ $i++ }}">
                @if($products->getNth($i)!=null)
                    <div class="mt-5 flex-column">
                        <a href="/product_preview/{{ $store->id }}/{{$products->getNth($i)->id}}"> <img src="../images/{{ $products->getNth($i)->image}}" alt="" class="images"></a>
                        <div  style="text-align: center">{{$products->getNth($i)->name}}</div>
                        <div  style="text-align: center">{{$products->getNth($i)->price}} MAD</div>
                        <div style="margin-left: 17%">
                            <a href="/product_preview/{{ $store->id }}/{{$products->getNth($i)->id}}" class="btn btn-dark mt-1"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                        </div>
                    </div>
                @endif
                <input type="hidden" value="{{ $i++ }}">
                @if($products->getNth($i)!=null)
                    <div class="mt-5 flex-column">
                        <a href="/product_preview/{{ $store->id }}/{{$products->getNth($i)->id}}"> <img src="../images/{{ $products->getNth($i)->image}}" alt="" class="images"></a>
                        <div  style="text-align: center">{{$products->getNth($i)->name}}</div>
                        <div  style="text-align: center">{{$products->getNth($i)->price}} MAD</div>
                        <div style="margin-left: 17%">
                            <a href="/product_preview/{{ $store->id }}/{{$products->getNth($i)->id}}" class="btn btn-dark mt-1"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                        </div>
                    </div>
                @endif
                <input type="hidden" value="{{ $i++ }}">
                @if($products->getNth($i)!=null)
                    <div class="mt-5 flex-column">
                        <a href="/product_preview/{{ $store->id }}/{{$products->getNth($i)->id}}"> <img src="../images/{{ $products->getNth($i)->image}}" alt="" class="images"></a>
                        <div  style="text-align: center">{{$products->getNth($i)->name}}</div>
                        <div  style="text-align: center">{{$products->getNth($i)->price}} MAD</div>
                        <div style="margin-left: 17%">
                            <a href="/product_preview/{{ $store->id }}/{{$products->getNth($i)->id}}" class="btn btn-dark mt-1"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                        </div>
                    </div>
                @endif
            </div>
        @endfor



    </div>
<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>



<script type="text/javascript">
    $(document).ready(function () {
        $(".shop").css("background-color","#2E8AD0");
    });
</script>

@endsection
