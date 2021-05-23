<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- tailwind cdn -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body{
            background-color: #F7F5EE;
        }
    </style>
</head>

<body>
<div class="container">
    <div class="row justify-content-center mt-4 mb-2" style="font-size: x-large; font-family: 'SF Mono'">MyStore</div>
    <div style="margin-left: 10vw; margin-right: 10vw;">
        <hr class="mb-2" style="border-top: 1px solid black;">
    </div>
    <div class="row justify-content-center">
        <div class="mr-2">Home</div>
        <div class="ml-2">Shop</div>

    </div>
    <div class="row justify-content-center">
        <div class="mr-2 home" style="width: 45px; height: 3px; border-radius: 5px; background-color: #F7F5EE;"></div>
        <div class="ml-2 shop" style="width: 40px; height: 3px; border-radius: 5px; background-color: #F7F5EE;"></div>
    </div>
    <br><br><br><br>

</div>
@yield('content2')
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
