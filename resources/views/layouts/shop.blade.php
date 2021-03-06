<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">

    <!-- CSS  -->
    <link rel="stylesheet" href="{{URL:: asset('css/shop.css') }}">

    <link rel="icon" href="{{ asset('images/logo.png') }}" sizes="32x32" type="image/png">

    <title>Store/home</title>


    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Our Custom CSS -->


    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    @if($store->designName == 'sand')
    <style>

        body{
            background-color: #F7F5EE;
        }

        #store-name{
            font-size: x-large;
            font-family: "Times New Roman", Times, serif;
            font-variant-caps: petite-caps;
            text-transform: capitalize;
            letter-spacing: 2px;
            color: #413C3C;
        }

        #nav_line{
            margin-left: 10vw;
            margin-right: 10vw;
        }

        hr{
            border-top: 1px solid #707070;
        }

        #nav-link{
            font-size: medium;
            font-family: "Times New Roman", Times, serif;

        }
        a{
            color: #413C3C;
        }

        #homelink, #shoplink{
            padding-bottom: 3px;
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

        .fbicon i:hover{
            color: #4267B2;
        }

        .twicon i:hover{
            color: #1DA1F2;
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
            font-variant-caps: petite-caps;
        }

        .logo{
            max-width: 45px;
            max-height: 45px;

        }


        @media (max-width:767px) {

            .logo{
                width: 30px;
                height: 30px;
            }
        }
        a, u {
            text-decoration: none; !important;
        }
        a {
            text-decoration: none !important;
        }

        .fa-stack[data-count]:after{
            position:absolute;
            right:0%;
            top:0%;
            content: attr(data-count);
            font-size:50%;
            padding:.6em;
            border-radius:999px;
            line-height:.75em;
            color:#2E8AD0;
            text-align:center;
            min-width:2em;
            font-weight:bold;
            background: #F7F5EE;
            border-style:solid;
        }


        .panier-logo {
            color: #2E8AD0;
            opacity: 0.8;
            background:#F7F5EE;
        }



    </style>
    @else


    <style>


        body{
            background-color: #25292d;
        }

        #store-name{
            font-size: x-large;
            font-family: "Times New Roman", Times, serif;
            font-variant-caps: petite-caps;
            text-transform: capitalize;
            letter-spacing: 2px;
            color: #ffffff;
        }

        #nav_line{
            margin-left: 10vw;
            margin-right: 10vw;
        }

        hr{
            border-top: 1px solid #e3dede;
        }

        #nav-link{
            font-size: medium;
            font-family: "Times New Roman", Times, serif;

        }
        a{
            color: #ffffff;
        }

        #homelink, #shoplink{
            padding-bottom: 3px;
        }

        .footer-clean {
            padding:50px 0;
            color:#e3dede;
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

        .fbicon i:hover{
            color: #4267B2;
        }

        .twicon i:hover{
            color: #1DA1F2;
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
        pre{
            color: white;
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
            font-variant-caps: petite-caps;
        }

        .logo{
            max-width: 45px;
            max-height: 45px;

        }


        @media (max-width:767px) {

            .logo{
                width: 30px;
                height: 30px;
            }
        }
        a, u {
            text-decoration: none; !important;
        }
        a {
            text-decoration: none !important;
        }

        .fa-stack[data-count]:after{
            position:absolute;
            right:0%;
            top:0%;
            content: attr(data-count);
            font-size:50%;
            padding:.6em;
            border-radius:999px;
            line-height:.75em;
            color:#2E8AD0;
            text-align:center;
            min-width:2em;
            font-weight:bold;
            background: #F7F5EE;
            border-style:solid;
        }


        .panier-logo {
            color: #ffffff;
            opacity: 0.8;
            background:#25292d;
        }








    </style>
    @endif

</head>

<body>


<div class="content">

    <div class="container-fluid">
        <div class="row mt-4 mb-2 ">
            <div class="col-md-3 col-sm-3 col-3">
                <img class="logo " src="{{ asset('images/logo.png') }}" alt="logo">
            </div>
            <div class="col-md-6  col-sm-6 col-6" >
                <div class="text-center" id="store-name">
                    {{ $store->name }}
                </div>
            </div>
           <div class="col-md-3 col-sm-3 col-3"></div>
        </div>

        <div id="nav_line">
            <hr class="mb-2">
        </div>
        <div class="row" id="nav-link">
            <div class="col-md-3  col-sm-3 col-3"></div>
            <div class="col-md-6  col-sm-6 col-6 mt-2">
                <div class="text-center">

                        <a class="mr-2" style="border: none;" id="homelink" href="/home/{{$store->id}}">
                            Home
                        </a>
                        <a class="ml-2" style="border: none;" id="shoplink" href="/shop/{{$store->id}}/all">
                            Shop
                        </a>

                </div>

            </div>
            <div class="col-md-3  col-sm-3 col-3">
                <div class="text-center">
                    <a href="/cart/{{$store->id}}">
{{--                        <img class="panier-logo " src="{{ asset('images/panier_logo.png') }}" alt="ShopCrad">--}}
{{--                        <i class="fas fa-shopping-bag fa-lg"></i>--}}
{{--                        <span class="cart-basket d-flex align-items-center justify-content-center">--}}
{{--                             0--}}
{{--                        </span>--}}
                        <span class="fa-stack fa-sm has-badge" data-count="@if($cart??''){{$cart->totalQty}}@else 0 @endif">
                            <i class="fas fa-stack-sm "></i>
                            <i style="" class="fas fa-shopping-bag fa-stack-2x panier-logo"></i>
                        </span>
                    </a>
                </div>
            </div>

        </div>
    </div>

    @yield('content2')

    <div class="footer-clean mt-5">
        <footer>
            <div class="container ">
                <div class="row justify-content-center">
                    <div class="col-sm-6 col-md-4 item">
                        <h3>About Us</h3>
                        <ul>
                            <li><pre>Address :  {{ $user->city }}</pre></li>
                            <li><pre>Phone   :  {{ $user->phone }}</pre></li>
                            <li><pre>Email   :  {{ $user->email }}</pre></li>
                        </ul>
                    </div>
                    <div class="col-md-4"></div>


                    <div class=" col-md-4 col-sm-6 item social ">
                        <a class="fbicon" target="_blank" href="{{ $store->facebookLink }}"><i class="icon ion-social-facebook"></i></a><a class="twicon" target="_blank" href="{{ $store->twitterLink }}"><i class="icon ion-social-twitter"></i></a>
                        <p class="copyright">{{ $store->name }} ?? 2021</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

</div>






<!-- jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>
