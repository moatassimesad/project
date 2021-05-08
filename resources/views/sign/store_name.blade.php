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
            background: url("images/im.png") no-repeat center center ;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

    </style>
</head>
<div class="backg" style="height: 1100px;">
    <div class="container-fluid">
        <div class="row offset-1">
            <a href="/"><span style=" font-family: Geneva; font-size: x-large; color: white;">MyStore</span></a>
        </div>
        <div class="row justify-content-center">
            <span style="font-family: Arial; color: white; font-weight: bold; font-size: 80px;">Sell online with MyStore</span>
        </div>



<form action="{{ route('store_name') }}" method="post">
    @csrf
        <div style="height: 100px;" class="align-items-center row justify-content-center">
            <input name="storeName" style="background: none; width: 40%; height: 30px; border: none; border-bottom: solid 1px white; @error('storeName') border-bottom:1px solid red;  @enderror " type="text" id="storeName" placeholder="Store Name" autocomplete="off">

        </div>
    @error('storeName')
    <div style="color: red; text-align: center">
        {{$message}}
    </div>
    @enderror
        <div style="height: 100px;" class="align-items-center row justify-content-center">
            <span style="color: white; text-align: center; width: 40%; height: 30px; border: none; border-bottom: solid 1px white;" id="show"></span>

        </div>
        <div style="height: 100px;" class="align-items-center row justify-content-center">
            <select name="storeActivityType" style=" width: 10%; background: none; outline: none; border: none; border-bottom: 1px solid white; color: white; @error('storeActivityType') border-bottom:1px solid red;  @enderror" id="storeActivityType" >
                <option selected disabled>Selling what?</option>
                <option value="Clothing">Clothing</option>
                <option value="Jewlery">Jewelry</option>
                <option value="Food">Food</option>
                <option value="Make-up">make-up</option>
                <option value="Electronics">Electronics</option>
            </select>
        </div>
    @error('storeActivityType')
    <div style="color: red; text-align: center; margin-bottom: 20px;">
        {{$message}}
    </div>
    @enderror
        <div style="height: 100px;" class="row justify-content-center ">
            <div><button type="submit" name="submit" style="width: 150px;" class="btn btn-info">Save</button></div>
        </div>
</form>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    $('#show').html('.MyStore.ma');
    $('#storeName').keyup(function () {
        $('#show').show();
        //  var dev = $(this).val();
        $('#show').html($(this).val()+'.MyStore.ma');
    });
</script>
</body>
@endsection
