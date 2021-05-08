@extends('layouts.app')
@section('content')
    <head>
<title>MyStore</title>
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <style>
            img {
                max-width: 100%; height: auto;
            }
            .backgrou {
                background: url("images/home.jpg") no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }


            a, u {
                text-decoration: none;
            }
            a {
                text-decoration: none !important;
            }
        </style>
    </head>
    <nav class="navbar fixed-top navbar-dark bg-dark">
        <div><a href="/"><span style="color: black; font-family: Geneva; font-size: x-large">My</span><span style="color: white; font-family: Geneva; font-size: x-large">Store</span></a></div>
        <div>
            <span><a href="{{ route('sign_up') }}" style="color:white; font-family: Monaco;">Sign up</a> &ensp;<span style="color: dimgrey">|</span>&ensp;</span>
            <span><a href="{{{ route('sign_in') }}}" style="color:white; font-family: Monaco;">Sign in</a> &ensp;<span style="color: dimgrey">|</span>&ensp;</span>
            <span><a href="#bottom" style="color: white; font-family: Monaco;">Contact us</a> &ensp;</span>
        </div>
    </nav>
    <div class="backgrou">
        <div class="container-fluid">
            <div class="row align-items-center" style="height: 650px;">
                <div class="offset-1">
                    <div style="color: aliceblue; font-size: xxx-large; font-family: 'SF Mono'" data-aos="zoom-in-down">CREATE YOUR OWN<br>
                        STORE IN FEW<br>
                        MINUTES!<br><br> </div>
                    &ensp;<div class="offset-3" style="padding:2px 0;height:40px; border-radius: 15px; text-align:center; background: #555555; width: 300px;" ><a href="{{ route('sign_up') }}" style="color: white; font-size: x-large; font-family: 'SF Mono'">Create your store</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-between align-items-center offset-1" style="height: 1000px">
            <div data-aos="flip-left" data-aos-duration="1000">
            <span style="font-family:'Helvetica Neue'; font-size: 45px;">
            Beautiful themes<br>
            that are responsive<br>
            and customizable<br><br>
            </span>
                <span style="font-family: 'Helvetica Neue'; font-size: 20px;">
            No design skills needed.<br>
            You have complete<br>
            control over the look and feel<br>
            of your website<br>
            from its layout<br>
            to content and colors.
            </span>
            </div>
            <div data-aos="flip-right" data-aos-duration="1000">
                <img style="width: 700px; height: 500px;" src="images/ecommerce.png" alt="">
            </div>
        </div>
    </div>
    <hr>

    <div style="clip-path: polygon(49% 5%, 100% 0, 100% 100%, 0 100%, 0 0); background: rgb(2,0,36); background: linear-gradient(0deg, rgba(2,0,36,1) 0%, rgba(9,118,121,1) 0%, rgba(27,188,221,1) 100%);">
        <div class="container-fluid">
            <div class="row p-5">
                <div class="col-md-5 col-sm-5 col-lg-5">
                    <span style="font-size: 20px; font-family: 'SF Mono'">About</span><br><br>
                    <span style="font-size: 10px; font-family: 'SF Mono'">MyStore is a result of many years of experience<br>
                    of creating Web Sites and online  stores.<br>
We build this application to make it easy<br>
                    for clients to get their own store<br>
                    without contacting a software engineer.</span>
                </div>
                <div class="col-md-4 col-sm-4 col-lg-4">
                    <span style="font-size: 20px; font-family: 'SF Mono'">Social Media</span><br><br>
                    <span style="font-size: 10px; font-family: 'SF Mono'"><a href="https://mail.google.com/"><span style="color: black">saadounmtsm@gmail.com</span></a><br>
<a href="https://mail.google.com/"><span style="color: black">yahyaelfarci@gmail.com</span></a><br>
<a href="https://facebook.com/saadmtsm"><span style="color: black">SAAD MTSM</span></a><br>
<a href="https://facebook.com/yahyaelfarci"><span style="color: black">YAHYA ELFARCI</span></a></span>
                </div>
                <div class="col-md-3 col-sm-3 col-lg-3">
                    <span id="bottom" style="font-size: 20px; font-family: 'SF Mono'">Contact us</span><br><br>
                    <span style="font-size: 10px; font-family: 'SF Mono'">Sciences and technologies<br>
Faculty Marrakech-Gueliz<br>
 <u>+ 212 6 61 38 21 42</u><br>
                    <u>+ 212 6 61 37 28 52</u> <br>
                    <u>support@MyStore.ma</u></span>
                </div>
            </div>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script type="text/javascript">
        AOS.init({
            duration : 3000,
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
@endsection
