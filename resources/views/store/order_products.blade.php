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

            th,tr{
                font-size: 15px;
            }

            @media (max-width: 992px) {

                th,tr{
                    font-size: 13px;
                }
            }

            @media (max-width: 768px) {

                th,tr{
                    font-size: 12px;
                }
            }
            @media (max-width: 576px) {

                th,tr{
                    font-size: 10px;
                }
            }


            .orderdetailscss{
                font-size: large;
                font-family: Helvetica, sans-serif;
                font-weight: 600;
                font-variant: small-caps;
                color: #354861;
                text-transform: capitalize;
            }

        </style>
        <link rel="stylesheet" href="css/order_products.css">
    </head>



    <div class="container">



        <div class="row ml-4 mb-4">
            <div class="col-lg-4 col-md-4 col-sm-4 orderdetailscss">
                Order No : {{$order->id}}
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 orderdetailscss">
               Order Status : {{$order->status}}
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 orderdetailscss">
                Total Payed : $ {{$order->payedTotal}}
            </div>
        </div>





        <div class="row ">
            <div class="col-12 text-left mb-2 orderdetailscss ">
                Products informations
            </div>
        </div>
        <table class="table  table-sm  cssTable">
            <thead>
            <tr class="table-info">
            <th scope="col">IMAGE</th>
            <th scope="col">NAME</th>
            <th scope="col">REFERENCE</th>
            <th scope="col">PRICE ($)</th>
            <th scope="col">QUANTITY</th>
            <th scope="col">COLOR</th>
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
                <td>{{ $product->pivot->quantity }}</td>
                <td>{{ $product->pivot->color }}</td>
                <td>{{ $product->created_at }}</td>
            </tr>
        @endforeach

        </tbody>
        </table>

            <div class="row mt-5">
                <div class="col-12 text-left mb-2 orderdetailscss ">
                    Client informations
                </div>
            </div>
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



            <div class="row mt-5 ">
                <div class="col-12 text-left mb-2 orderdetailscss ">
                    Delivery informations :
                </div>
            </div>
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

            <br>



    </div>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>



    <script>
        $('document').ready(function () {
            $("#title").html("Orders / Details");
            $(".orders").addClass('active');
        });
    </script>



@endsection
