@extends('layouts.store_admin')
@section('content1')
    <head>
        <link rel="stylesheet" href="css/stats.css">

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
                            <p class="card-category">TOTAL VISITOR</p>
                            <h3 class="card-title">555</h3>
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
                            <h3 class="card-title">343</h3>
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
                            <h3 class="card-title">75</h3>
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
                            <h3 class="card-title">$245</h3>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-chart">
                        <div class="card-header card-header-success">


                        </div>
                        <div class="card-body">
                            <div class="container">
                                {!! $chart->container() !!}
                                {!! $chart->script() !!}
                            </div>

                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons"></i> updated 4 minutes ago
                            </div>
                        </div>
                    </div>
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



