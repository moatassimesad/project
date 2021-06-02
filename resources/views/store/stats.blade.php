@extends('layouts.store_admin')
@section('content1')
    <head>
        <link rel="stylesheet" href="css/stats.css">
        <style>
            .chart{
                height: 100% !important;
                width: 100% !important;
            }
        </style>
    </head>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-info card-header-icon">
                            <div class="card-icon">
                                <i class="fas fa-user-circle"></i>
                            </div>
                            <p class="card-category">TOTAL CLIENTS</p>
                            <h5 class="card-title">{{$clients->count()}}</h5>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-info card-header-icon">
                            <div class="card-icon">
                                <i class="fas fa-user-circle"></i>
                            </div>
                            <p class="card-category">ORDERS</p>
                            <h5 class="card-title">{{$orders->count()}}</h5>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-info card-header-icon">
                            <div class="card-icon">
                                <i class="fas fa-user-circle"></i>
                            </div>
                            <p class="card-category">PRODUCTS</p>
                            <h5 class="card-title">{{ $products->count() }}</h5>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-info card-header-icon">
                            <div class="card-icon">
                                <i class="fas fa-user-circle"></i>
                            </div>
                            <p class="card-category">TOTAL SALE</p>
                            <h5 class="card-title">MAD {{$total}}</h5>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row chart">

                                {!! $chart->container() !!}
                                {!! $chart->script() !!}
                            </div>
                    </div>
                </div>


            </div>




        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>



    <script>
        $('document').ready(function () {
            $("#title").html("Dashboard");
        });
    </script>


@endsection



