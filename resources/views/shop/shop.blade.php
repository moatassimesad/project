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

            <br><br><br>
            <div class="row justify-content-between">
               <div class="flex-column ml-5 mb-1 mt-5">
                   <div style="font-weight: bold; font-size: large"><i style="margin-bottom: 1px;" class="fa fa-commenting"></i> Contact us</div>
                   <pre>Address : {{ $user->city }}</pre>
                   <pre>Phone   : +212 {{ $user->phone }}</pre>
                   <pre>Email   : {{ $user->email }}</pre>
               </div>
                <div class="flex-column mr-5 ml-5 mt-5">
                    <div style="font-weight: bold; font-size: large"><i class="fa fa-share-alt"></i> community</div>
                    <div><a href="{{ $store->facebookLink }}" target="_blank">
                            <i class="fa fa-facebook-official" style="font-size:30px;color:blue"></i>
                        </a></div>
                    <div><a href="/{{ $store->twitterLink }}" target="_blank">
                            <i class="fa fa-twitter" style="font-size:30px;color:blue"></i>
                        </a></div>
                </div>
            </div>
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
