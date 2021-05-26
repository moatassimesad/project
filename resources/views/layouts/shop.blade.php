<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <link rel="icon" href="images/logo.png" sizes="32x32" type="image/png">

    <title>Store/home</title>


    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Our Custom CSS -->


    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <style>

        body{
            background-color: #F7F5EE;
        }

        #store-name{
            font-size: x-large;
            font-family: "Times New Roman", Times, serif;
            letter-spacing: 2px;
            color: #413C3C;
        }

        #nav_line{
            margin-left: 10vw;
            margin-right: 10vw;
        }
        hr{
            border-top: 1px solid #707070;
        }

        #nav-link{
            font-size: medium;
            font-family: "Times New Roman", Times, serif;

        }
        a{
            color: #413C3C;
        }
    </style>

</head>

<body>


<div class="content">

    <div class="container-fluid">

        <div class="row justify-content-center mt-4 mb-2" id="store-name">
            STORE NAME
        </div>
        <div id="nav_line">
            <hr class="mb-2">
        </div>
        <div class="row justify-content-center " id="nav-link">
            <div class="mr-2">
                <a href="#">
                    Home
                </a>
            </div>

            <div class="ml-2">
                <a href="#">
                    Shop
                </a>
            </div>
            <div class="panier ml-2">
                <a href="">
                    <i class="fas fa-shopping-bag"></i>
                </a>
            </div>

        </div>
    </div>
    @yield('content2')
</div>






<!-- jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>



</body>
</html>
