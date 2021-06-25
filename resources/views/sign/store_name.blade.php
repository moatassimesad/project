@extends('layouts.app')
@section('content')

<head>
    <title>Store Name</title>
    <link rel="stylesheet" href="css/store_name.css">
</head>
<div class="backg">
    <div class="container-fluid">
        <div class="row justify-content-between offset-1">
            <a href=""><span class="mystore">MyStore</span></a>
            <a href="/logout"><span class="logout">Log out</span></a>
        </div>
        <div class="row justify-content-center">
            <span class="sell">Sell online with MyStore</span>
        </div>



<form action="{{ route('store_name') }}" method="post">
    @csrf
        <div style="height: 100px;" class="align-items-center row justify-content-center">
            <input name="storeName" class="storename" style=" @error('storeName') border-bottom:1px solid red;  @enderror " type="text" id="storeName" placeholder="Store Name" autocomplete="off">

        </div>
    @error('storeName')
    <div class="name_error">
        {{$message}}
    </div>
    @enderror
        <div style="height: 100px;" class="align-items-center row justify-content-center">
            <span class="ajax" id="show"></span>

        </div>
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
