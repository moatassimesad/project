@extends('layouts.store_admin')
@section('content1')

    <head>
        <link rel="stylesheet" href="css/themes.css">
    </head>



    <div class="container-fluid">



        <div class="titlepage">
            <h1>Pick your favorite homepage design</h1>
            <p>These fonts & colors will be used to design your site.</p>
        </div>


        <div class="row row justify-content-center ">
            <div class="col-md-4 col-sm-6  mb-5">
            <div class="card">
                <img src="../images/homepage.png"  alt="theme night"/>
                <div class="info">
                    <h1>Sand</h1>
                    <p> A highly approachable feel</p>
                    <a href="/edit_theme/{{auth()->user()->store->id}}/sand">Pick</a>
                </div>
            </div>
        </div>
            <div class="col-md-4 col-sm-6 ">
                <div class="card">
                    <img src="../images/homepage.png" alt="theme night"/>
                    <div class="info">
                        <h1>Night Sky</h1>
                        <p> A highly approachable feel</p>
                        <a href="/edit_theme/{{auth()->user()->store->id}}/dark">Pick</a>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>



    <script>
        $('document').ready(function () {
            $("#title").html("Themes");
        });
    </script>

@endsection
