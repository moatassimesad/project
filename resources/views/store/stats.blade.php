@extends('layouts.store_admin')
@section('content1')
    <head>
        <link rel="stylesheet" href="css/stats.css">
        <style>
            .chart{
                height: 100% !important;
                width: 100% !important;

            }
            .charttitle1{
                font-family: Helvetica, sans-serif;
                font-size: 17px;
                font-weight: 300;
                color: #212629;

            }


        </style>
    </head>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats mt-3">
                        <div class="card-header card-header-info1 card-header-icon">
                            <div class="card-icon">
                                <i class="fas fa-users fa-lg"></i>
                            </div>
                            <p class="card-category" style="color: #212629">TOTAL CLIENTS</p>
                            <h5 class="card-title">{{$clients->count()}}</h5>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats mt-3">
                        <div class="card-header card-header-info2 card-header-icon">
                            <div class="card-icon">
                                <i class="fas fa-shopping-bag fa-lg"></i>
                            </div>
                            <p class="card-category" style="color: #212629">ORDERS</p>
                            <h5 class="card-title">{{$orders->count()}}</h5>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats mt-3">
                        <div class="card-header card-header-info3 card-header-icon">
                            <div class="card-icon">
                                <i class="fas fa-tags"></i>
                            </div>
                            <p class="card-category" style="color: #212629">PRODUCTS</p>
                            <h5 class="card-title">{{ $products->count() }}</h5>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats mt-3">
                        <div class="card-header card-header-info card-header-icon">
                            <div class="card-icon">
                                <i class="fas fa-landmark"></i>
                            </div>
                            <p class="card-category" style="color: #212629">REVENUE</p>
                            <h5 class="card-title">MAD {{$total}}</h5>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row chart ml-1 mt-3">

                    <div class="col-lg-12 col-md-12 col-sm-12 ">
                        <div class="card" style="border-radius: 15px">
                            <div class="card-header" style="background-color: white">
                                <i class="fas fa-chart-line fa-lg ml-3" style="color: #fb8c00"></i><span class="charttitle1">&ensp;Sales</span>
                                <form action="{{route('chart_search')}}" method="post">
                                    @csrf
                                    <input type="date" class="" name="date">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                    @if($bigTotal??'')
                                        <span>MAD </span>
                                    @endif
                                    <span>{{$bigTotal ??''}}</span>
                                </form>
                            </div>
                            <div class="card-body " style="background: linear-gradient(60deg, #fea321, #fb8c00);">
                                {!! $chart->container() !!}
                                {!! $chart->script() !!}
                            </div>
                        </div>

                    </div>
            </div>
            <div class="row chart ml-1 mt-3">

                <div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-3 ">
                    <div class="card" style="border-radius: 15px">
                        <div class="card-header" style="background-color: white">
                            <i class="fas fa-chart-bar fa-lg ml-3 " style="color:  #02adc1;"></i><span class="charttitle1">&ensp;Client subscriptions (current week)</span>
                        </div>
                        <div class="card-body " style="background: linear-gradient(60deg, #26c5d9, #02adc1);">
                            {!! $chart1->container() !!}
                            {!! $chart1->script() !!}
                        </div>
                    </div>

                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-3 ">
                    <div class="card" style="border-radius: 15px">
                        <div class="card-header" style="background-color: white">
                            <i class="fas fa-chart-bar fa-lg ml-3" style="color: #43a047"></i><span class="charttitle1">&ensp;Revenue (current week) <span style="font-size: 10px;">(shipped & payed)</span></span>
                        </div>
                        <div class="card-body " style="background: linear-gradient(60deg, #65ba69, #43a047);">
                            {!! $chart2->container() !!}
                            {!! $chart2->script() !!}
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
