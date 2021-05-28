@extends('layouts.store_admin')
@section('content1')
<head>
    <link rel="stylesheet" href="css/product_providers.css">
</head>
    <div class="container contient">
        <div class="row justify-content-center"><img style="width: 200px; height: 200px; border-radius: 10px;" src="../images/{{$product->image}}" alt="dwc" ></div>
        <br><br>
        <div class="pl-5">
            <pre>NAME     : {{$product->name}}</pre>
            <br>
            <pre>PRICE    : {{$product->name}}</pre>
            <br>
            <pre>QUANTITY : {{$product->quantity}}</pre>
            <br>
            <pre>DESCRIPTION :</pre>
            <div class="p-2" style="border-radius: 10px; border: 1px solid #76d7d7;">{{$product->description}}</div>
        <br>

        <pre >Available colors :</pre>
        <br>
        <div class="row">
            @foreach($colors as $color)
                @if($color == "none")
                    <div> This product has no colors </div>
                @else
                    <div class="ml-2 mr-2" style="width: 30px; height: 30px; border-radius: 50%; background-color: {{$color}}"></div>
                @endif

            @endforeach
        </div>
        </div>
        <br><br>
        <hr style="border-top: 1px solid blue;">
        <br>
        <pre style="text-align: center;">Providers informations</pre>
        <br>
        <table class="table table-striped table-sm table-borderless">
            <thead>
            <tr class="table-info">
                <th scope="col">NAME</th>
                <th scope="col">ADDRESS</th>
                <th scope="col">PHONE</th>
                <th scope="col">QUANTITY</th>
                <th scope="col">SHIPPING COST</th>
                <th scope="col">DATE</th>
            </tr>
            </thead>
            <tbody>
            @foreach($product->providers as $provider)
                <tr>
                    <th scope="row">{{ $provider->name }}</th>
                    <td>{{ $provider->address }}</td>
                    <td>{{ $provider->phone }}</td>
                    <td>{{ $provider->pivot->quantity }}</td>
                    <td>{{ $provider->pivot->unitCost }}</td>
                    <td>{{ $provider->pivot->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>



<script>
    $('document').ready(function () {
        $("#title").html("Products");
    });
</script>


@endsection
