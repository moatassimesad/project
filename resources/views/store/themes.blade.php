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
                    <button>Pick</button>
                </div>
            </div>
        </div>
            <div class="col-md-4 col-sm-6 ">
                <div class="card">
                    <img src="../images/homepage.png" alt="theme night"/>
                    <div class="info">
                        <h1>Night Sky</h1>
                        <p> A highly approachable feel</p>
                        <button>Pick</button>
                    </div>
                </div>
            </div>
        </div>


    </div>



@endsection
