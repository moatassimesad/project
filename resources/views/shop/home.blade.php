@extends('layouts.shop')

@section('content2')

    <head>

        <title>unti</title>
        @if($store->designName == 'sand')

        <style>
            img{

            }

            .card  .card-img-overlay h1{
                letter-spacing: 3px;
                font-weight: bold !important;
            }

            .txt-ovr{
                color: #413C3C;
            }

           #allCollections{
               margin-top: 5rem;
               font-family: Helvetica,"Helvetica Neue",sans-serif;
               text-transform: uppercase;
               letter-spacing: 1px;
               color: #413C3C;
               text-align: center;

           }


           .collectionName{
               padding-top: 0.5rem;
               text-align: center;
               font-family: Helvetica,"Helvetica Neue",Arial,"Lucida Grande",sans-serif;
               font-weight: bold;
               font-size: medium;

           }
           .img-collection img{
               width: 220px;
               height: 220px;
               border: 1px solid #707070;

           }

            @media (max-width:992px) {
                .img-collection img{
                    width: 170px;
                    height: 170px;

                }
                .collectionName{
                    font-size: 15px;
                }
            }



        </style>
        @else







        <style>
            img{

            }

            .card  .card-img-overlay h1{
                letter-spacing: 3px;
                font-weight: bold !important;
            }

            .txt-ovr{
                color: #413C3C;
            }

            #allCollections{
                margin-top: 5rem;
                font-family: Helvetica,"Helvetica Neue",Arial,"Lucida Grande",sans-serif;
                text-transform: uppercase;
                letter-spacing: 1px;
                color:#e3dede;
                text-align: center;

            }


            .collectionName{
                padding-top: 0.5rem;
                text-align: center;
                font-family: Helvetica,"Helvetica Neue",Arial,"Lucida Grande",sans-serif;
                font-weight: bold;
                font-size: medium;
                color: #e3dede;

            }
            .img-collection img{
                width: 220px;
                height: 220px;
                border: 1px solid #e3dede;

            }

            @media (max-width:992px) {
                .img-collection img{
                    width: 170px;
                    height: 170px;

                }
                .collectionName{
                    font-size: 15px;
                }
            }




        </style>
        @endif
        <style>
            div.scrollmenu {
                overflow: auto;
                white-space: nowrap;

            }

            div.scrollmenu a {
                display: inline-block;
                text-align: center;
                text-decoration: none;
            }

            div.scrollmenu a:hover {

            }
        </style>
    </head>


    <div class="container-fluid mt-5">
        <div class="card  text-center" >
            @if($store->image_top)
                <img class="card-img" src="/images/{{$store->image_top}}" style="height: 60vh; " alt="Card image">
                @else
            <img class="card-img" src="/images/shop_main_page.png" style="height: 60vh; " alt="Card image">
            @endif
            <div class="card-img-overlay mt-5 txt-ovr" style="padding-top: 10vh; letter-spacing:2px; padding-left:25%; padding-right:25%;"  >
                <h3 style="color: white; text-shadow: 0 0 8px #000;" class="card-text">
                    {{ $store->textLayer_top }}
                </h3>
            </div>
        </div>
    </div>

    <div class="container">

       <div class="row">
           <div class="col-12 " id="allCollections"  >
               <h4><strong>All Categories</strong></h4>
           </div>
       </div>

        <div id="scrollmenu" class="scrollmenu img-collection mt-5 mb-5">


            @if($collections->count())
                @for($i=0;$i<$collections->count();$i++)
                    <a href="/shop/{{ $store->id }}/{{$collections->getNth($i)->name}}"> <img src="../images/{{ $collections->getNth($i)->image }}" alt="" class="images mr-5 ml-5"> <div class="collectionName ml-5 mr-5" >{{$collections->getNth($i)->name}}</div></a>

                @endfor
        </div>


        @else
            <div class="row my-4 img-collection ">
                @for($i=0;$i<4;$i++)

                    <div class="col-md-3 col-sm-6 col-6 text-center mt-3 ">
                        <a href="#"> <img style="border: 1px solid #707070" src="{{ asset('images/celloction_logo.png') }}" alt="" class="images"></a>
                        <div class="collectionName">Collection Name</div>
                    </div>

                @endfor
            </div>
        @endif
    </div>


    <div class="container-fluid mt-5">
        <div class="card  text-center" >
            @if($store->image_bottom)
                <img class="card-img" src="/images/{{$store->image_bottom}}" style="height: 60vh; " alt="Card image">
            @else
                <img class="card-img" src="/images/shop_main_page.png" style="height: 60vh; " alt="Card image">
            @endif
            <div class="card-img-overlay mt-5 txt-ovr " style="padding-top: 10vh; letter-spacing:2px; padding-left:25%; padding-right:25%;"  >
                <h3 style="color: white; text-shadow: 0 0 8px #000;" class="card-text">
                    {{ $store->textLayer_bottom }}
                </h3>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>



    <script>
        $("#homelink").css("border-bottom","2px solid #2E8AD0");
    </script>
    <script>
        var x = document.getElementById("scrollmenu").clientWidth;
        const buttonRight = document.getElementById('slideRight');
        const buttonLeft = document.getElementById('slideLeft');

        buttonRight.onclick = function () {
            document.getElementById('scrollmenu').scrollLeft += x;
        };
        buttonLeft.onclick = function () {
            document.getElementById('scrollmenu').scrollLeft -= x;
        };
    </script>








@endsection
