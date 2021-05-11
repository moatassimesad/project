@extends('layouts.app')
@section('content')
    <head>
<title>MyStore</title>
        <link rel="stylesheet" href="css/welcome.css">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    </head>
    <nav class="navbar fixed-top navbar-dark bg-dark">
        <div>
            <a href="/"><span class="my">My</span><span class="store">Store</span></a>
        </div>
        <div>
            <span><a href="{{ route('sign_up') }}" class="signup">Sign up</a> &ensp;<span style="color: dimgrey">|</span>&ensp;</span>
            <span><a href="{{{ route('sign_in') }}}" class="signin">Sign in</a> &ensp;<span style="color: dimgrey">|</span>&ensp;</span>
            <span><a href="#bottom" class="contactus">Contact us</a>  &ensp; </span>
        </div>
    </nav>
    <div class="backgrou">
        <div class="container-fluid">
            <div class="row align-items-center" style="height: 100vh">
                <div class="offset-1">
                    <div class="createyourown" data-aos="zoom-in-down">CREATE YOUR OWN<br>
                        STORE IN FEW<br>
                        MINUTES!<br><br> </div>
                    &ensp;<div class="offset-3 create_div" ><a href="{{ route('sign_up') }}" class="create_a">Create your store</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-between align-items-center offset-1 centre">
            <div data-aos="fade-down-left" data-aos-duration="1000">
            <span class="beautiful">
            Beautiful themes<br>
            that are responsive<br>
            and customizable<br><br>
            </span>
                <span class="nodesign">
            No design skills needed.<br>
            You have complete<br>
            control over the look and feel<br>
            of your website<br>
            from its layout<br>
            to content and colors.
            </span>
            </div>
            <div data-aos="fade-down-right" data-aos-duration="1000">
                <img class="ecommerceimage mr-4" src="images/ecommerce.jpg" alt="">
            </div>
        </div>
    </div>
    <hr>

    <div class="pentagon" data-aos="fade-up" data-aos-duration="1000">
        <div class="container-fluid">
            <div class="row p-5">
                <div class="col-md-5 col-sm-5 col-lg-5">
                    <span class="titles">About</span><br><br>
                    <span style="font-size: 10px; font-family: 'SF Mono'; color: white">MyStore is a result of many years of experience<br>
                    of creating Web Sites and online  stores.<br>
                    We build this application to make it easy<br>
                    for clients to get their own store<br>
                    without contacting a software engineer.</span>
                </div>
                <div class="col-md-4 col-sm-4 col-lg-4">
                    <span class="titles">Social Media</span><br><br>
                    <span style="font-size: 10px; font-family: 'SF Mono'"><a href="https://mail.google.com/"><span style="color: white">saadounmtsm@gmail.com</span></a><br>
<a href="https://mail.google.com/"><span style="color: white">yahyaelfarci@gmail.com</span></a><br>
<a href="https://facebook.com/saadmtsm"><span style="color: white">Facebook : SAAD MTSM</span></a><br>
<a href="https://facebook.com/yahyaelfarci"><span style="color: white"> Facebook : YAHYA ELFARCI</span></a></span>
                </div>
                <div class="col-md-3 col-sm-3 col-lg-3">
                    <span id="bottom" class="titles">Contact us</span><br><br>
                    <span style="font-size: 10px; font-family: 'SF Mono'; color: white;">Sciences and technologies<br>
Faculty Marrakech-Gueliz<br>
 <u>+ 212 6 61 38 21 42</u><br>
                    <u>+ 212 6 61 37 28 52</u> <br>
                    <u>support@MyStore.ma</u></span>
                </div>
            </div>
            <div class="row justify-content-center" style="font-size: 15px; color: white">Copyright © 2020 MyStore. All rights reserved.</div>

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
