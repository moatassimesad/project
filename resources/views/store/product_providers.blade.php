@extends('layouts.store_admin')
@section('content1')
<head>
    <link rel="stylesheet" href="css/product_providers.css">
</head>
    <div class="container contient">
        <div class="row justify-content-center"><img style="width: 200px; height: 200px; border-radius: 10px;" src="../images/{{$product->image}}" alt="dwc" ></div>
        <br><br>
        <pre style="text-align: center;">Name     : {{$product->name}}</pre>
        <br>
        <pre style="text-align: center;">PRICE    : {{$product->name}}</pre>
        <br>
        <pre style="text-align: center;">QUANTITY : {{$product->quantity}}</pre>
        <br>
        <pre style="text-align: center;">Description :</pre>
        <br>
        <div class="row justify-content-center ml-5 mr-5 pl-5 pr-5" style="font-family: 'SF Mono'">{{$product->description}}</div>
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
                <th scope="col">Quantity</th>
                <th scope="col">Shipping cost</th>
                <th scope="col">Date</th>
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
