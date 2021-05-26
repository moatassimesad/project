@extends('layouts.shop')
@section('content2')
<head>
    <style>
        .image{
            width : 60vw;
            height: 50vh;
        }
        .link{
            margin-left: 18vw;
            margin-right: 18vw;
        }
        .name{
            width: 120px;
            height: 30px;
            border: none;
            border-bottom: solid 1px;
            background: none;
        }
        input{
            text-align:center;
        }
        input:focus, textarea:focus, select:focus{
            outline: none;
        }
        .bouton{
            width: 150px;
        }
    </style>
</head>

<div class="container pl-5">
    <pre class="row link">
        <pre style="color: dimgrey;">Home</pre> / Shop
    </pre>
    <div class="row justify-content-center">
        <img src="../../images/{{ $product->image }}" alt="image" class="image">
    </div>
    <div class="row link justify-content-between">
        <div class="mt-3 flex-column">
            <div>{{$product->name}}</div>
            <div class="mt-3">{{$product->description}}</div>
        </div>
        <div class="mt-3">
            <div>{{$product->price}} MAD</div>
        </div>
    </div>
        <form action="{{ route('add_to_card') }}" method="post">
            @csrf
            <div  class="row justify-content-center align-items-center mt-5">
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <input class="name"  name="quantity" type="number" style="@error('quantity') border-bottom:1px solid red; @enderror" placeholder="Quantity" value="{{old('quantity')}}">
            </div>
            @error('quantity')
            <div style="color: red; text-align: center;">{{ $message }}</div>
            @enderror
            <div  class="row justify-content-center align-items-center mt-5">
                <button type="submit" name="submit" class="bouton btn btn-dark"><i class="fa fa-shopping-cart"></i> Add to card</button>
            </div>
        </form>
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
