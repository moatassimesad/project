<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .leftCol{
            overflow-y: scroll;
        }
    </style>
    <link rel="icon" href="{{ asset('images/logo.png') }}" sizes="32x32" type="image/png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">    <!-- Our Custom CSS -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <!-- Font Awesome JS -->
    {{--    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>--}}
    {{--    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>--}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" integrity="sha512-BnbUDfEUfV0Slx6TunuB042k9tuKe3xrD6q4mg5Ed72LTgzDIcLPxg6yI2gcMFRyomt+yJJxE+zJwNmxki6/RA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- tailwind cdn -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ===== BOX ICONS ===== -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <!-- ===== CSS ===== -->

    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">

    <title>Dashboard</title>
</head>
<body id="body-pd">
<header class="header" id="header">
    <div class="header__toggle">
        <i class='bx bx-menu' id="header-toggle"></i>
    </div>
    <a class="nav-link"  href="" id="title" style="color:blue"></a>
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
                @if(auth()->user()->store->client_id != "")
                    <a class="dropdown-item" href="/index_change_paypal_credentials">Your paypal</a>
                @endif
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/logout"><i class="fas fa-sign-out-alt"></i>&emsp;Logout</a>
            </div>
        </li>

    </div>
</header>

<div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div class="leftCol">
            <a href="" class="nav__logo">
                <img class="logo" src="{{ asset('images/logo.png') }}" alt="logo">
                <span class="nav__logo-name">MyStore</span>
            </a>

            <div class="nav__list">
                <a href="/stats" class="dashboard nav__link">
                    <i class='fas fa-home' ></i>
                    <span class="nav__name">Dashboard</span>
                </a>

                <a href="/list_customer" class="customers nav__link">
                    <i class='fas fa-users' ></i>
                    <span class="nav__name">Customers</span>
                </a>
                <a href="/list_order" class="orders nav__link">
                    <i class='fas fa-shopping-bag' ></i>
                    <span class="nav__name">Orders</span>
                </a>



                    <a href="#product-menu" data-toggle="collapse" aria-expanded="false" class="products_toggle dropdown-toggle nav__link">
                        <i class="fas fa-align-left"></i>
                        <span class="ml-1">Products</span>

                    </a>
                    <ul class="collapse list-unstyled hveffect" id="product-menu">
                        <li>
                            <a href="/list_product" class="products nav__link">
                                <i class="fas fa-box"></i>
                                <span class="nav__name">Products</span>
                            </a>
                        </li>
                        <li>
                            <a href="/list_collection" class="collections nav__link">
                                <i class="fa fa-list-alt"></i>
                                <span class="nav__name">Collections</span>
                            </a>
                        </li>
                        <li>
                            <a href="/list_provider" class="providers nav__link">
                                <i class="fas fa-truck-loading"></i>
                                <span class="nav__name">Providers</span>
                            </a>
                        </li>
                    </ul>

                <a href="/list_delivery" class="deliveries nav__link">
                    <i class='fas fa-shipping-fast' ></i>
                    <span class="nav__name">Delivery</span>
                </a>



                <a href="#store-menu" data-toggle="collapse" aria-expanded="false" class="store_toggle nav__link dropdown-toggle">
                    <i class="fas fa-align-left"></i>
                    <span class="ml-1">Store</span>

                </a>
                <ul class="collapse list-unstyled" id="store-menu">
                    <li class="">
                        <a href="/themes" class="themes nav__link">
                            <i class="fas fa-paint-brush"></i>
                            <span class="nav__name">Themes</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="/edit_store" class="edit_store nav__link">
                            <i class="far fa-edit"></i>
                            <span class="nav__name">Edit store</span>
                        </a>
                    </li>
                </ul>

                <a href="/home/{{auth()->user()->store->id}}" target="_blank" class="nav__link">
                    <i class='fas fa-eye' ></i>
                    <span class="nav__name">Show store</span>
                </a>
            </div>
            <a href="/settings" class="settings nav__link">
                <i class='fas fa-cogs' ></i>
                <span class="nav__name">Settings</span>
            </a>
        </div>


    </nav>
</div>

                                    @if(auth()->user()->store->client_id == "")
                                        <div style="text-align: center;" class="success alert alert-warning" role="alert"><img style="float: left" class="mr-2" width="45px"
                                                                                                                               src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/pp-acceptance-small.png" alt="Buy now with PayPal" />
                                            set your paypal payment credentials
                                            <a style="color: blue;" href="/index_paypal_credentials">click here !</a></div>
                                    @endif


@yield('content1')
<!--===== SWEET ALERT =====-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!--===== MAIN JS =====-->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<!-- chart cdn -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

<script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>
