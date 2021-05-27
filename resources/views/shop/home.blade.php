@extends('layouts.shop')

@section('content2')

    <head>

        <title>unti</title>
        <style>
            img{

            }

            .card  .card-img-overlay h1{
                letter-spacing: 3px;
                font-weight: bold !important;
            }

           #allCollections{
               margin-top: 1rem;
               margin-left: 2rem;
               font-family: Helvetica, sans-serif;
               letter-spacing: 2px;
               color: #413C3C;

           }

           #collectionName{
               text-align: center;
               margin-top: 0.5rem;
           }
           .img-collection img{
               width: 9vw;
               height: 9vw;
           }

        </style>
    </head>


    <div class="container-fluid mt-5">
        <div class="card  text-center" >
            <img class="card-img" src="/images/shop_main_page.png" style="height: 60vh; " alt="Card image">
            <div class="card-img-overlay mt-5" style="padding-top: 10vh; letter-spacing:2px; color: #413C3C"  >
                <h1 class="card-title" style="font-weight: bold; ">IMAGE WITH TEXT LAYER</h1>
                <h5 class="card-text">
                    Use the text overlay to give your customers an overview of your brand.
                    <br/>
                    Use an image and text that relates to your brand’s style and story.
                </h5>
            </div>
        </div>
    </div>

    <div class="wrapper">

       <div class="row " id="allCollections">
           <div class="col-12">
               <h4 >All Collections</h4>
           </div>
       </div>

        @if($collections->count())
        @for($i=0;$i<$collections->count();$i++)


            <div class="row img-collection ">
                @if($collections->getNth($i)!=null)
                    <div class="col-md-3 col-sm-6 col-12 text-center mt-2">
                        <a href="/product_collection/{{ $store->id }}/{{$collections->getNth($i)->id}}"> <img src="../images/{{ $collections->getNth($i)->image }}" alt="" class="images"></a>
                        <div  style="text-align: center">{{$collections->getNth($i)->name}}</div>
                    </div>
                @endif


                <input type="hidden" value="{{ $i++ }}">
                @if($collections->getNth($i)!=null)
                    <div class="col-md-3 col-sm-6 col-12 text-center mt-2">
                        <a href="/product_collection/{{ $store->id }}/{{$collections->getNth($i)->id}}"> <img src="../images/{{ $collections->getNth($i)->image}}" alt="" class="images"></a>
                        <div  style="text-align: center">{{$collections->getNth($i)->name}}</div>
                    </div>
                @endif
                <input type="hidden" value="{{ $i++ }}">
                @if($collections->getNth($i)!=null)
                    <div class="col-md-3 col-sm-6 col-12 text-center mt-2">
                        <a href="/product_collection/{{ $store->id }}/{{$collections->getNth($i)->id}}"> <img src="../images/{{ $collections->getNth($i)->image}}" alt="" class="images" ></a>
                        <div  style="text-align: center">{{$collections->getNth($i)->name}}</div>
                    </div>
                @endif
                <input type="hidden" value="{{ $i++ }}">
                @if($collections->getNth($i)!=null)
                    <div class="col-md-3 col-sm-6 col-12 text-center mt-2">
                        <a href="/product_collection/{{ $store->id }}/{{$collections->getNth($i)->id}}"> <img src="../images/{{ $collections->getNth($i)->image}}" alt="" class="images"></a>
                        <div  style="text-align: center">{{$collections->getNth($i)->name}}</div>
                    </div>
                @endif
            </div>
        @endfor

        @else
            <div class="row">
                @for($i=0;$i<4;$i++)

                    <div class="col-md-3 col-sm-6 col-12 text-center mt-2 ">
                        <a href="/product_collection/{{ $store->id }}}"> <img style="border: 1px solid #707070" src="{{ asset('images/celloction_logo.png') }}" alt="" class="images"></a>
                        <div id="collectionName">Collection Name</div>
                    </div>

                @endfor
            </div>
        @endif
    </div>

    <div class="container-fluid mt-5">
        <div class="card  text-center" >
            <img class="card-img" src="/images/shop_main_page.png" style="height: 60vh; " alt="Card image">
            <div class="card-img-overlay mt-5" style="padding-top: 10vh; letter-spacing:2px; color: #413C3C"  >
                <h1 class="card-title" style="font-weight: bold; ">IMAGE WITH TEXT LAYER</h1>
                <h5 class="card-text">
                    Use the text overlay to give your customers an overview of your brand.
                    <br/>
                    Use an image and text that relates to your brand’s style and story.
                </h5>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>



    <script>
        $("#homelink").css("border-bottom","2px solid #2E8AD0");
    </script>








@endsection
