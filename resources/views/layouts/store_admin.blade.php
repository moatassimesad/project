<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="{{ asset('images/logo.png') }}" sizes="32x32" type="image/png">

    <title>MyStore</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">    <!-- Our Custom CSS -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <!-- tailwind cdn -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>

<div class="wrapper">
    <!-- Sidebar  -->
    <nav   id="sidebar">
        <div class="sidebar-header">
             <div class="row flex-row Msname">

                 <a class="title" href="/stats"><img class="logo ml-2 mt-2 mr-3" src="{{ asset('images/logo.png') }}" alt="logo"></a>
                 <a class="title" href="/stats">MyStore</a>
             </div>
        </div>

        <ul class="list-unstyled components">

            <li class="{{'stats'==request()->path()?'active':''}}" >
                <a href="/stats">
                    <i class="fas fa-home"></i>
                    <span class="ml-0">&emsp;Dashboard</span>
                </a>
            </li>

            <li class="{{'list_order'==request()->path()? 'active':''}}" >
                <a href="/list_order">
                    <i class="fas fa-shopping-bag"></i>

                    <span class="ml-1">&emsp;Orders</span>
                </a>
            </li>
            <li>
                <a href="#product-menu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-box"></i>
                    <span class="ml-1">&emsp;Products</span>

                </a>
                <ul class="collapse list-unstyled hveffect" id="product-menu">
                    <li class="{{'#'==request()->path()? 'active':''}}"><a href="/list_product">&emsp;Products</a></li>
                    <li class="{{'#'==request()->path()? 'active':''}}"><a href="/list_collection">&emsp;Collections</a></li>
                    <li class="{{'#'==request()->path()? 'active':''}}"><a href="/list_provider">&emsp;Providers</a></li>
                </ul>
            </li>

            <li class="{{'list_customer'==request()->path()? 'active':''}}" >
                <a href="/list_customer">
                    <i class="fas fa-users"></i>
                    <span style="margin-left: 0">&emsp;Customers</span>

                </a>
            </li>
            <li>
                <a href="#store-menu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-paint-brush"></i>
                    <span class="ml-1">&emsp;Store</span>

                </a>
                <ul class="collapse list-unstyled" id="store-menu">
                    <li class="{{'#'==request()->path()? 'active':''}}"><a href="/themes">&emsp;Themes</a></li>
                    <li class="{{'#'==request()->path()? 'active':''}}"><a href="/edit_store">&emsp;Edit Store</a></li>
                </ul>
            </li>
            <li class="{{'list_delivery'==request()->path()?'active':''}}" id="delivery" >
                <a href="/list_delivery">
                    <i class="fas fa-shipping-fast"></i>
                    &emsp;Delivery
                </a>
            </li>
            <li class="{{'#'==request()->path()? 'active':''}}">
                <a href="/home/{{auth()->user()->store->id}}" target="_blank" id="showstore">
                    <i class="fas fa-eye"></i>
                    <span class="ml-1">&emsp;ShowStore</span>

                </a>
            </li>

        </ul>
        <br>

        <ul class="list-unstyled ">
            <li class="{{'settings'==request()->path()? 'active':''}}">
                <a href="/settings" class="settings">
                    <i class="fas fa-cogs"></i>
                    <span class="ml-0">&emsp;Settings</span>

                </a>
            </li>

        </ul>
    </nav>

    <!-- Page Content  -->
    <div id="content">

        <!--  navbar  -->
        <div id="navbarcontent" >
            <nav class="navbar navbar-expand-lg navbar-light py-2">
                <div class="container-fluid">

                    <!--first btn-->

                        <a class="nav-link"  href="" id="title" style="color:#cad4df "></a>

                    <!--second btn-->
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-right"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">



                            <div class="navbar-nav " id="userhoverffect">
                                <li class="nav-item dropdown " >
                                    <a class="nav-link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"style="color:#cad4df " >
                                        <span id="usericon"><i class="fas fa-user-circle fa-lg"></i></span>
                                        {{ auth()->user()->firstName }} {{ auth()->user()->lastName }}
                                        <i class="fas fa-angle-down"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right"  aria-labelledby="navbarDropdown" style="background-color: #cad4df ;color: #2a3b4e">
                                        <a class="dropdown-item" href="/condition_of_use">Condition of use</a>
                                        <a class="dropdown-item" href="/contact">Your contact</a>
                                        <a class="dropdown-item" href="/home/{{auth()->user()->store->id}}" target="_blank">Your store</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="/logout"><i class="fas fa-sign-out-alt"></i>&emsp;Logout</a>
                                    </div>
                                </li>

                            </div>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

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
<!-- chart cdn -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>



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

