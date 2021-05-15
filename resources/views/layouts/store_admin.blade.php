<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <title>index 4</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->


    <!-- Font Awesome JS -->


</head>

<body>

<div class="wrapper">
    <!-- Sidebar  -->

    <nav   id="sidebar">
        <div class="sidebar-header">
            <h3>Mystore</h3>
            <strong>MS</strong>
        </div>

        <ul class="list-unstyled components">
            <li class="active">
                <a   href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fa fa-bar-chart"></i>
                    Dashboard
                </a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a class="white fa fa-bar-chart" href=""> Dashboard 1</a>
                    </li>
                    <li>
                        <a class="white fa fa-bar-chart" href=""> Adshboard 2</a>
                    </li>
                    <li>
                        <a class="white fa fa-bar-chart" href=""> Dashboard 3</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="">
                    <i class="fa fa-calendar-check-o"></i>
                    Orders
                </a>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fa fa-archive"></i>
                    Products
                </a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li><a class="fa fa-archive" href="">Products</a></li>
                    <li><a class="fa fa-folder-open" href="/list_category">Categories</a></li>
                    <li><a class="fa fa-envelope-o" href="">Providers</a></li>
                </ul>
            </li>
            <li>
                <a href="">
                    <i class="fa fa-group"></i>
                    Customers
                </a>
            </li>
            <li>
                <a href="">
                    <i class="fa fa-paint-brush"></i>
                    Templates
                </a>
            </li>
            <li>
                <a href="/list_delivery">
                    <i class="fa fa-paper-plane"></i>
                    Delivery
                </a>
            </li>
            <li>
                <a href="">
                    <i class="fa fa-eye"></i>
                    View store
                </a>
            </li>
        </ul>
        <br><br><br>

        <ul class="list-unstyled">
            <li>
                <a href="/settings" class="download">
                    <i class="fa fa-gears"></i>
                    Settings
                </a>
            </li>

        </ul>
    </nav>

    <!-- Page Content  -->
    <div id="content">

        <!--  navbar  -->

        <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="container-fluid">

                <!--first btn-->
                <button type="button" id="sidebarCollapse" class="btn btn-dark">
                    <i class="fa fa-bars"></i>

                </button>
                <!--second btn-->
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Dashboard</a>
                        </li>


                        <div class="navbar-nav my-2 my-lg-0">
                            <li class="nav-item dropdown ">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ auth()->user()->firstName }} {{ auth()->user()->lastName }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Condition of use</a>
                                    <a class="dropdown-item" href="#">Your contact</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/logout">Logout</a>
                                </div>
                            </li>

                        </div>
                    </ul>
                </div>
            </div>
        </nav>

        <!--/navbar-->
        @yield('content1')

    </div>
</div>

<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
            $('#content').toggleClass('active');
        });
    });
</script>
</body>

</html>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
