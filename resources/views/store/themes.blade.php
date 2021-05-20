@extends('layouts.store_admin')
@section('content1')

    <head>
        <link rel="stylesheet" href="css/themes.css">
    </head>



    <div class="container">

        <div class="wrapper-theme">

        <div class="titlepage">
            <h1>Pick a theme you like</h1>
            <p>These fonts & colors will be used to design your site.</p>
        </div>
        <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card">
                <img src="images/sandtheme2.png" alt="theme sand"/>
                <div class="info">
                    <h1>Sand</h1>
                    <p>Like a calm and clear day at the beach</p>
                    <button>Pick</button>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card">
                <img src="images/themenight.jpeg" alt="theme night"/>
                <div class="info">
                    <h1>Night Sky</h1>
                    <p> A highly approachable feel</p>
                    <button>Pick</button>
                </div>
            </div>
        </div>
        </div>
        </div>

    </div>



@endsection
