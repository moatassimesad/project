@extends('layouts.store_admin')
@section('content1')


    <head>
        <style>
            .images{
                border-radius: 10px;
                height: 7vw;
                width: 7vw;
            }
            .cssTable td{
                vertical-align: middle;
            }

        </style>
        <link rel="stylesheet" href="css/order_products.css">
    </head>
    <div class="container contient">

        <div class="pl-5">
            <pre>NUMBER      : {{$order->id}}</pre>
            <br>
            <pre>STATUS      : {{$order->status}}</pre>
            <br>
            <pre>PAYED TOTAL : MAD {{$order->payedTotal}}</pre>
            <br>
            <hr style="border-top: 1px solid blue;">
            <br>
            <pre >Delivery informations :</pre>
            <br>
            <table class="table table-striped table-sm table-borderless">
                <thead>
                <tr class="table-info">
                    <th scope="col">NAME</th>
                    <th scope="col">REFERENCE</th>
                    <th scope="col">ADDRESS</th>
                    <th scope="col">PHONE</th>
                    <th scope="col">DATE</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">{{ $delivery->name }}</th>
                        <td>{{ $delivery->reference }}</td>
                        <td>{{ $delivery->address }}</td>
                        <td>{{ $delivery->phone }}</td>
                        <td>{{ $delivery->created_at}}</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <hr style="border-top: 1px solid blue;">
            <br>
            <pre >Client informations :</pre>
            <br>
            <table class="table table-striped table-sm table-borderless">
                <thead>
                <tr class="table-info">
                    <th scope="col">FULL NAME</th>
                    <th scope="col">ADDRESS</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">PHONE</th>
                    <th scope="col">CITY</th>
                    <th scope="col">DATE</th>
                </tr>
                </thead>
                <tbody>

                    <tr>
                        <th scope="row">{{ $client->lastName }} {{ $client->firstName }}</th>
                        <td>{{ $client->address }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->phone }}</td>
                        <td>{{ $client->city }}</td>
                        <td>{{ $client->created_at}}</td>
                    </tr>

                </tbody>
            </table>
            <br><br>

            </div>
        </div>
        <br><br>
        <hr style="border-top: 1px solid blue;">
        <br>
            <pre style="text-align: center;">Products informations</pre>
            <br>

    <table class="table table-sm cssTable">
        <thead>
        <tr class="table-info">
            <th scope="col">IMAGE</th>
            <th scope="col">NAME</th>
            <th scope="col">REFERENCE</th>
            <th scope="col">PRICE</th>
            <th scope="col">DATE</th>

        </tr>
        </thead>
        <tbody>
        @foreach($order->products as $product)
            <tr>
                <th scope="row"><img src="../images/{{$product->image}}" alt="sdf" class="images"></th>
                <td>{{ $product->name }}</td>
                <td>{{ $product->reference }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->created_at }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>



    <script>
        $('document').ready(function () {
            $("#title").html("Orders");
        });
    </script>



@endsection
