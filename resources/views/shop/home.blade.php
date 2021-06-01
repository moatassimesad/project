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
               font-family: Helvetica,"Helvetica Neue",Arial,"Lucida Grande",sans-serif;
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
    </head>


    <div class="container-fluid mt-5">
        <div class="card  text-center" >
            <img class="card-img" src="/images/shop_main_page.png" style="height: 60vh; " alt="Card image">
            <div class="card-img-overlay mt-5 txt-ovr" style="padding-top: 10vh; letter-spacing:2px"  >
                <h1 class="card-title" style="font-weight: bold; ">IMAGE WITH TEXT LAYER</h1>
                <h5 class="card-text">
                    Use the text overlay to give your customers an overview of your brand.
                    <br/>
                    Use an image and text that relates to your brand’s style and story.
                </h5>
            </div>
        </div>
    </div>

    <div class="container">

       <div class="row">
           <div class="col-12 " id="allCollections"  >
               <h4><strong>All Categories</strong></h4>
           </div>
       </div>

        @if($collections->count())
        @for($i=0;$i<$collections->count();$i++)


            <div class="row my-4 img-collection " >
                @if($collections->getNth($i)!=null)
                    <div class=" col-md-3 col-sm-6 col-6 text-center mt-3">
                        <a href="/shop/{{ $store->id }}/{{$collections->getNth($i)->name}}"> <img src="../images/{{ $collections->getNth($i)->image }}" alt="" class="images"></a>
                        <div class="collectionName" >{{$collections->getNth($i)->name}}</div>
                    </div>
                @endif


                <input type="hidden" value="{{ $i++ }}">
                @if($collections->getNth($i)!=null)
                    <div class="col-md-3 col-sm-6 col-6 text-center mt-3 ">
                        <a href="/shop/{{ $store->id }}/{{$collections->getNth($i)->name}}"> <img src="../images/{{ $collections->getNth($i)->image}}" alt="" class="images"></a>
                        <div class="collectionName" >{{$collections->getNth($i)->name}}</div>
                    </div>
                @endif
                <input type="hidden" value="{{ $i++ }}">
                @if($collections->getNth($i)!=null)
                    <div class="col-md-3 col-sm-6 col-6 text-center mt-3 ">
                        <a href="/shop/{{ $store->id }}/{{$collections->getNth($i)->name}}"> <img src="../images/{{ $collections->getNth($i)->image}}" alt="" class="images" ></a>
                        <div class="collectionName" >{{$collections->getNth($i)->name}}</div>
                    </div>
                @endif
                <input type="hidden" value="{{ $i++ }}">
                @if($collections->getNth($i)!=null)
                    <div class="col-md-3 col-sm-6 col-6 text-center mt-3">
                        <a href="/shop/{{ $store->id }}/{{$collections->getNth($i)->name}}"> <img src="../images/{{ $collections->getNth($i)->image}}" alt="" class="images"></a>
                        <div class="collectionName" >{{$collections->getNth($i)->name}}</div>
                    </div>
                @endif
            </div>
        @endfor

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
            <img class="card-img" src="/images/shop_main_page.png" style="height: 60vh; " alt="Card image">
            <div class="card-img-overlay mt-5 txt-ovr " style="padding-top: 10vh; letter-spacing:2px"  >
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
