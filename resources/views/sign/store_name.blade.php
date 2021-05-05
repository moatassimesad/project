@extends('layouts.app')
@section('content')
<head>
    <title>Store Name</title>
    <style>
        img {
            max-width: 100%; height: auto;
        }
        input{
            text-align:center;
            color: white;
        }
        input:focus, textarea:focus, select:focus{
            outline: none;
            color: white;
        }
        select{
            text-align:center;
        }
        .backg{
            background: url("public/images/im.png") no-repeat center center ;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

    </style>
</head>
<div class="backg" style="height: 1100px; background-color: black">
    <div class="container-fluid">
        <div class="row offset-1">
            <a href="/"><span style=" font-family: Geneva; font-size: x-large; color: white;">MyStore</span></a>
        </div>
        <div class="row justify-content-center">
            <span style="font-family: Arial; color: white; font-weight: bold; font-size: 80px;">Sell online with MyStore</span>
        </div>



<form action="" method="post">
        <div style="height: 100px;" class="align-items-center row justify-content-center">
            <input style="background: none; width: 40%; height: 30px; border: none; border-bottom: solid 1px white;" type="text" placeholder="Store Name">

        </div>
        <div style="height: 100px;" class="align-items-center row justify-content-center">
            <span style="color: white; text-align: center; width: 40%; height: 30px; border: none; border-bottom: solid 1px white;">echo "store_name.MyStore.com";</span>

        </div>
        <div style="height: 100px;" class="align-items-center row justify-content-center">
            <select style="width: 10%; background: none; outline: none; border: none; border-bottom: 1px solid white; color: white;">
                <option selected>Selling what?</option>
                <option>Clothing</option>
                <option>Jewelry</option>
                <option>Food</option>
                <option>make-up</option>
                <option>Electronics</option>
            </select>
        </div>

        <div style="height: 100px;" class="row justify-content-center ">
            <div><button style="width: 150px;" class="btn btn-info">Save</button></div>
        </div>
</form>
    </div>
</div>
</body>
@endsection
