<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <style>
        a, u {
            text-decoration: none; !important;
        }
        a {
            text-decoration: none !important;
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="d-flex" id="wrapper">
    <!-- Sidebar-->
    <div class="bg-dark border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">--------</div>
        <div class="list-group list-group-flush">
            <a class="list-group-item list-group-item-action bg-dark fa fa-bar-chart" id="dashboard" href="#!" style="color: white; margin-top: 20px;"><span style="font-family: 'SF Mono' "> Dashboard</span></a>
            <a class="list-group-item list-group-item-action bg-dark fa fa-calendar-check-o" id="orders" href="#!" style="color: white; margin-top: 20px;"><span style="font-family: 'SF Mono' "> Orders</span></a>
            <a class="list-group-item list-group-item-action bg-dark fa fa-archive" id="products" href="#!" style="color: white; margin-top: 20px;"><span style="font-family: 'SF Mono' "> Products</span></a>
            <a class="list-group-item list-group-item-action bg-dark fa fa-folder-open" id="categories" href="/list_category" style="color: white; margin-top: 20px;"><span style="font-family: 'SF Mono' "> Categories</span></a>
            <a class="list-group-item list-group-item-action bg-dark fa fa-envelope-o" id="providers" href="#!" style="color: white; margin-top: 20px;"><span style="font-family: 'SF Mono' "> Providers</span></a>
            <a class="list-group-item list-group-item-action bg-dark fa fa-group" id="customers" href="#!" style="color: white; margin-top: 20px;"><span style="font-family: 'SF Mono' "> Customers</span></a>
            <a class="list-group-item list-group-item-action bg-dark fa fa-paint-brush" id="templates" href="#!" style="color: white; margin-top: 20px;"><span style="font-family: 'SF Mono' "> Templates</span></a>
            <a class="list-group-item list-group-item-action bg-dark fa fa-paper-plane" id="delivery" href="/list_delivery" style="color: white; margin-top: 20px;"><span style="font-family: 'SF Mono' "> Delivery</span></a>
            <a class="list-group-item list-group-item-action bg-dark fa fa-eye" id="dashboard" href="#!" style="color: white; margin-top: 20px;"><span style="font-family: 'SF Mono' "> Show store</span></a>
            <a class="list-group-item list-group-item-action bg-dark fa fa-gears" id="settings" href="#!" style="color: white; margin-top: 100px;"><span style="font-family: 'SF Mono' "> Settings</span></a>
        </div>
    </div>
    <!-- Page Content-->
    <div id="page-content-wrapper">
        <nav class="navbar fixed-top navbar-dark bg-light">
            <div>
                <a href="/" style="font-size: x-large; font-family: 'Geneva';">MyStore</a>
                <span id="title" style="color: dimgrey; font-size: large; color: lightslategrey; margin-left: 160px;"></span>
            </div>
            <div>

                <a style="color: black;" class="dropdown-toggle" id="navbarDropdown" href="#!" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->firstName }} {{ auth()->user()->lastName }}</a>
                <span class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#!">Condition of use</a>
                    <a class="dropdown-item" href="#!">Your contact</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}">Log out</a>
                </span>
            </div>
        </nav>
        <!--

        content

        -->

        @yield('content1')




</div>
</div>
<!-- Bootstrap core JS-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
$("#dashboard").click(function () {
    $("#title").html("|&ensp;Dashboard");
})
</script>
<!-- Core theme JS-->
</body>
</html>
