@extends('layouts.store_admin')
@section('content1')
<head>
    <link rel="stylesheet" href="css/product_providers.css">


    <style>



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

        .productname{
            font-size: large;
            font-family: Helvetica, sans-serif;
            font-weight: bold;
            font-variant: small-caps;
            color: #354861;
            text-transform: capitalize;
        }
        .productprice{
            color: #354861;
            font-family: Helvetica, sans-serif;
            font-size: large;
            font-variant: small-caps;
            font-weight: 600;
            line-height: 24px;
        }
        .productqte{
            color: #354861;
            font-family: Helvetica, sans-serif;
            font-size: large;
            font-variant: small-caps;
            font-weight: 600;
            line-height: 24px;
        }
        .descriptionname{
            color: #354861;
            font-family: Helvetica, sans-serif;
            font-size: large;
            font-variant: small-caps;
            font-weight: 600;
            line-height: 24px;
        }
        .description{

            font-family: Roboto, sans-serif;
            font-size: 16px;
            font-weight: 300;
            color: #354861;
        }
        .productcolor{
            color: #354861;
            font-family: Helvetica, sans-serif;
            font-size: large;
            font-variant: small-caps;
            font-weight: 600;
            line-height: 24px;
        }

        .nocolor{
            color: #354861;
            font-family: Roboto, sans-serif;
            font-size: large;
            font-weight: 500;
            line-height: 24px;
        }

        .providersdetails{
            font-size: large;
            font-family: Helvetica, sans-serif;
            font-weight: bold;
            font-variant: small-caps;
            color: #354861;
            text-transform: capitalize;
        }


        .image{

            width : 300px;
            height: 300px;
        }

        .imgcss img{
            margin-left: 36% ;
        }



        @media (max-width:1200px) {
            .image{
                width : 250px;
                height: 250px;
            }
            .imgcss img{
                margin: auto;
            }
        }
        @media (max-width:992px) {

            .image {
                width: 220px;
                height: 220px;
            }
            .imgcss img{
                margin: auto;
            }
        }
        @media (max-width:576px) {
            .image {
                width: 100%;
                height: 400px;
            }
            .imgcss img{
                margin: auto;
            }
        }


    </style>



</head>
    <div class="container  ">

        <div class="row  mt-5">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-3 imgcss " >
                <img style="border-radius: 10px;" src="../images/{{$product->image}}" alt="productImage"  class="image"  >
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-3 ">
                <div class="text-left ml-1 ">
                    <div class="productname" >Name     : {{$product->name}}</div>
                </div>
                <div class="text-left ml-1 mt-2">
                    <div class="productprice" >Price     : MAD&ensp;{{$product->price}}</div>
                </div>
                <div class="text-left ml-1 mt-2">
                    <div class="productqte" >   Stock    : {{$product->quantity}}</div>
                </div>

                <span class="ml-1 mt-2 descriptionname">Description :</span>
                <div class="text-left ml-1 mt-2 description">
                    {{ $product->description }}
                </div>
                <span class="ml-1 mt-3 productcolor">Available Colors :</span>
                <div class="row justify-content-start ml-3 mt-2" >
                    @foreach($colors as $color)
                        @if($color == "none")
                            <div class="nocolor"> This product has no colors </div>
                        @else
                            <div class="ml-2 mr-2" style="width: 30px; height: 30px; border-radius: 50%; background-color: {{$color}}"></div>
                        @endif

                    @endforeach
                </div>
            </div>

        </div>










        @if($product->providers->count())

            <div class="row mb-2 mt-5 ">
                <div class="col-12 text-left mb-2 providersdetails ">
                    Providers informations
                </div>
            </div>


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
                    <td>{{ $provider->pivot->created_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @else
            <div class="row mb-2 mt-5 ">
                <div class="col-12 text-left mb-2 providersdetails ">
                    There's no provider for this product.
                </div>
            </div>

            @endif

    </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>



<script>
    $('document').ready(function () {
        $("#title").html("Product / Details");
        $(".products").addClass('active');
        $(".products_toggle").addClass('active');
    });
</script>


@endsection
