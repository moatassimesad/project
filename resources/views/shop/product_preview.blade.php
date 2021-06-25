@extends('layouts.shop')
@section('content2')
<head>

    @if($store->designName == 'sand')
    <style>
        .image{
            width : 100%;
            height: 400px;
        }
        .link{
            margin-left: 6vw;
            margin-right: 6vw;
        }
        .name{
            width: 120px;
            height: 30px;
            border: solid 1px #707070;
            border-radius: 15px;;
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
        .color{
            border : none;
            width: 20px;
            height: 20px;
            border-radius: 50%;
        }

        .mtop{
            margin-top: 0;
        }

        @media (max-width:1200px) {
            .image{
                width : 100%;
                height: 290px;
            }


        }

        @media (max-width:992px) {

            .image{
                width : 100%;
                height: 450px;
            }
            .link{
                margin-left: 2%;
                margin-right: 2%;
            }

            .mtop{
                margin-top: 10px;
            }
        }

        @media (max-width:576px) {
            .image{
                width : 100%;
                height: 400px;
            }
            .link{
                margin-left: 2vw;
                margin-right: 2vw;
            }

            .mtop{
                margin-top: 10px;
            }
        }

        .productName{
            font-size: large;
            font-family: Helvetica, sans-serif;
            font-weight: bold;
            color: #413C3C;
            text-transform: capitalize;
        }

        .collection{
            color: #413C3C;
            font-family: Roboto, sans-serif;
            font-size: 12px;
            font-weight: 500;
            text-transform: uppercase;
        }

        .price{
            color: #413C3C;
            font-family: Roboto, sans-serif;
            font-size: 15px;
            font-weight: 500;
            line-height: 24px;

        }

        .description{

            font-family: Roboto, sans-serif;
            font-size: 16px;
            font-weight: 300;
            color: #413C3C;
        }

        .hmlink{
            font-family: Roboto, sans-serif;
            font-size: 13px;
            font-weight: 300;
            color: #413C3C;
        }

        .splink{
            font-family: Roboto, sans-serif;
            font-size: 13px;
            font-weight: 500;
            color: #413C3C;
        }
        .lnlink{
            font-size: 13px;
        }

        .pickcolor{
            font-family: Roboto, sans-serif;
            font-size: 16px;
            font-weight: 550;
            color: #413C3C;
        }

        #nav_line2{

        }

        .hrproduct{
            border-top: 1.5px solid #707070;
            opacity: 0.3;
        }

        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }

        /* Firefox */
        input[type=number] {
        -moz-appearance: textfield;}


    </style>
    @else


    <style>
        .image{
            width : 100%;
            height: 400px;
        }
        .link{
            margin-left: 6vw;
            margin-right: 6vw;
        }
        .name{
            width: 120px;
            height: 30px;
            border: solid 1px #707070;
            border-radius: 15px;;
            background: none;
            color: #e3dede;
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
        .color{
            border : none;
            width: 20px;
            height: 20px;
            border-radius: 50%;
        }

        .mtop{
            margin-top: 0;
        }

        @media (max-width:1200px) {
            .image{
                width : 100%;
                height: 290px;
            }


        }

        @media (max-width:992px) {

            .image{
                width : 100%;
                height: 450px;
            }
            .link{
                margin-left: 2%;
                margin-right: 2%;
            }

            .mtop{
                margin-top: 10px;
            }
        }

        @media (max-width:576px) {
            .image{
                width : 100%;
                height: 400px;
            }
            .link{
                margin-left: 2vw;
                margin-right: 2vw;
            }

            .mtop{
                margin-top: 10px;
            }
        }

        .productName{
            font-size: large;
            font-family: Helvetica, sans-serif;
            font-weight: bold;
            color: #e3dede;
            text-transform: capitalize;
        }

        .collection{
            color: #e3dede;
            font-family: Roboto, sans-serif;
            font-size: 12px;
            font-weight: 500;
            text-transform: uppercase;
        }

        .price{
            color: #e3dede;
            font-family: Roboto, sans-serif;
            font-size: 15px;
            font-weight: 500;
            line-height: 24px;

        }

        .description{

            font-family: Roboto, sans-serif;
            font-size: 16px;
            font-weight: 300;
            color: #e3dede;
        }

        .hmlink{
            font-family: Roboto, sans-serif;
            font-size: 13px;
            font-weight: 300;
            color: #e3dede;
            opacity: 0.7;
        }

        .splink{
            font-family: Roboto, sans-serif;
            font-size: 13px;
            font-weight: 500;
            color: #e3dede;
        }
        .lnlink{
            font-size: 13px;
            color: #e3dede;
        }

        .pickcolor{
            font-family: Roboto, sans-serif;
            font-size: 16px;
            font-weight: 550;
            color: #e3dede;
        }

        #nav_line2{

        }

        .hrproduct{
            border-top: 1.5px solid #707070;
            opacity: 0.3;
        }



        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;}



    </style>
    @endif
</head>

<div class="container">
    @if(session('status'))
        <div class="link alert alert-success mb-4 text-center" role="alert">
            {{ session('status') }}
        </div>

    @endif
    <div class="row link mt-4">

        <a  class="hmlink" href="/home/{{$store->id}}">
                 Home
        </a>
        <span class="lnlink">&ensp;\&ensp;</span>
        <a class="splink" href="/shop/{{$store->id}}">
                Shop
        </a>

    </div>


        @if($product->store->id == $store->id)


    <div class="row link mt-3">




        <div class="col-lg-6 col-md-12 col-sm-12 col-12">
            <img src="../../images/{{ $product->image }}" alt="image" class="image">
        </div>

        <div class="col-lg-6 col-md-12 col-sm-12 col-12 mtop ">

                <div class="text-left ml-1 ">
                    <div class="productName" >{{$product->name}}</div>
                </div>
                 <div class="text-left ml-1 collection">
                    {{$product->collection->name}}
                </div>
            <div class="text-left ml-1">
                    {{$product->quantity}}<span> lefts</span>
                </div>
                <div class="text-left ml-1 mt-2 price">
                     $ {{$product->price}}
                </div>
                <div class="text-left ml-1 mt-2 description">
                    {{ $product->description }}
                </div>

                <div class="nav_line3  mt-3 mx-2">
                <hr class="hrproduct">
                </div>

                <div class="text-left ml-1 mt-1">
                    @if($max != 0)
                    <form action="{{ route('add_to_card') }}" method="post">
                        @csrf
                        <div  class="row justify-content-center align-items-center mt-4">
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <input type="hidden" name="store_id" value="{{$store->id}}">
                            <input type="hidden" id="couleur" name="color" value="">

                            <input id="qtelb" class="name" min="1" max="{{$max}}"  name="quantity" type="number" style="@error('quantity') border-bottom:1px solid red; @enderror" placeholder="Quantity" autocomplete="off" value="{{old('quantity')}}" @if($max <= 0) disabled @endif>
                        </div>
                        @error('quantity')
                        <div style="color: red; text-align: center;">Please enter a quantity</div>
                        @enderror
                        @if(array_values($colors)[0]!="none")
                        <div class="row justify-content-center mt-4">
                            <div style="text-align: center;" class="pickcolor" >Pick a color</div>
                        </div>
                        @endif
                        <div class="row justify-content-center" >
                            @foreach($colors as $color)
                                @if($color == "none")
                                    <div class="mt-3">No colors to pick </div>
                                @else
                                    <input type="button" class="color mt-3 mr-2" style="background-color: {{$color}};" name="{{$color}}">
                                @endif
                            @endforeach
                        </div>
                        @error('color')
                        <div style="color: red; text-align: center;">Please pick a color</div>
                        @enderror
                        <div  class="row justify-content-center align-items-center mt-5">
                            <button type="submit" name="submit" class="bouton btn btn-dark"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                        </div>
                        <div  class="row justify-content-center align-items-center mt-2">
                            <a  href="/cart/{{$store->id}}" class="bouton btn btn-dark"><i class="fa fa-shopping-cart"></i> Cart</a>
                        </div>
                    </form>
                    @else
                        <h4 style="font-family: 'Academy Engraved LET'; color: red">Sorry, this product isn't available !</h4>
                    @endif
                </div>


        </div>


    </div>




        @endif
</div>



    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>



    <script type="text/javascript">

        $(document).ready(function () {
          $(".color").on("click",function (){
              if ($(this).css("border")==="1px solid rgb(0, 0, 0)"){
                  $(this).css("border","none");
                  $(this).css("width","20px");
                  $(this).css("height","20px");
                  $("#couleur").val("");
              }
              else{
                  $(".color").css("border","none");
                  $(".color").css("width","20px");
                  $(".color").css("height","20px");
                  $(this).css("border","1px solid black");
                  $(this).css("width","25px");
                  $(this).css("height","25px");
                  let color = this.name;
                  $("#couleur").val(color);
              }

          });
            $(".shop").css("background-color","#2E8AD0");
        });
    </script>




<script>
    $("#shoplink").css("border-bottom","2px solid #2E8AD0");
</script>
@endsection
