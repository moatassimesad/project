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

            .footer-clean {
                padding:50px 0;
                color:#4b4c4d;
            }

            .footer-clean h3 {
                margin-top:0;
                margin-bottom:12px;
                font-weight:bold;
                font-size:16px;
            }

            .footer-clean ul {
                padding:0;
                list-style:none;
                line-height:1.6;
                font-size:14px;
                margin-bottom:0;
            }

            .footer-clean ul a {
                color:inherit;
                text-decoration:none;
                opacity:0.8;
            }

            .footer-clean ul a:hover {
                opacity:1;
            }

            .footer-clean .item.social {
                text-align:right;
            }

            @media (max-width:767px) {
                .footer-clean .item {
                    text-align:center;
                    padding-bottom:20px;
                }
            }

            @media (max-width: 768px) {
                .footer-clean .item.social {
                    text-align:center;
                }
            }

            .footer-clean .item.social > a {
                font-size:24px;
                width:40px;
                height:40px;
                line-height:40px;
                display:inline-block;
                text-align:center;
                border-radius:50%;
                border:1px solid #ccc;
                margin-left:10px;
                margin-top:22px;
                color:inherit;
                opacity:0.75;
            }

            .footer-clean .item.social > a:hover {
                opacity:0.9;
            }

            @media (max-width:991px) {
                .footer-clean .item.social > a {
                    margin-top:40px;
                }
            }

            @media (max-width:767px) {
                .footer-clean .item.social > a {
                    margin-top:10px;
                }
            }

            .footer-clean .copyright {
                margin-top:14px;
                margin-bottom:0;
                font-size:13px;
                opacity:0.6;
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

        @for($i=0;$i<$collections->count();$i++)
            <div class="row justify-content-around">

                @if($collections->getNth($i)!=null)
                    <div class="mt-5 flex-column">
                        <a href="/product_collection/{{ $store->id }}/{{$collections->getNth($i)->id}}"> <img src="../images/{{ $collections->getNth($i)->image }}" alt="" class="images"></a>
                        <div  style="text-align: center">{{$collections->getNth($i)->name}}</div>
                    </div>
                @endif


                <input type="hidden" value="{{ $i++ }}">
                @if($collections->getNth($i)!=null)
                    <div class="mt-5 flex-column">
                        <a href="/product_collection/{{ $store->id }}/{{$collections->getNth($i)->id}}"> <img src="../images/{{ $collections->getNth($i)->image}}" alt="" class="images"></a>
                        <div  style="text-align: center">{{$collections->getNth($i)->name}}</div>
                    </div>
                @endif
                <input type="hidden" value="{{ $i++ }}">
                @if($collections->getNth($i)!=null)
                    <div class="mt-5 flex-column">
                        <a href="/product_collection/{{ $store->id }}/{{$collections->getNth($i)->id}}"> <img src="../images/{{ $collections->getNth($i)->image}}" alt="" class="images"></a>
                        <div  style="text-align: center">{{$collections->getNth($i)->name}}</div>
                    </div>
                @endif
                <input type="hidden" value="{{ $i++ }}">
                @if($collections->getNth($i)!=null)
                    <div class="mt-5 flex-column">
                        <a href="/product_collection/{{ $store->id }}/{{$collections->getNth($i)->id}}"> <img src="../images/{{ $collections->getNth($i)->image}}" alt="" class="images"></a>
                        <div  style="text-align: center">{{$collections->getNth($i)->name}}</div>
                    </div>
                @endif
            </div>
        @endfor

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
    <div class="footer-clean mt-5">
        <footer>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-4 col-md-3 item">
                        <h3>About Us</h3>
                        <ul>
                            <li> Address :{{ $user->city }}</li>
                            <li>Phone : +212 {{ $user->phone }}</li>
                            <li>Email :{{ $user->email }}</li>
                        </ul>
                    </div>


                    <div class="col-lg-3 item social">
                        <a href="{{ $store->facebookLink }}"><i class="icon ion-social-facebook"></i></a><a href="{{ $store->twitterLink }}"><i class="icon ion-social-twitter"></i></a>
                        <p class="copyright">Company Name © 2021</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>











@endsection
