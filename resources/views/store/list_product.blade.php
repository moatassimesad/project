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
            .add{
                font-family: "PT Mono";
                font-size: large;
                margin-right: 20px;
            }
            .delivery{
                margin-left: 20px;
                font-size: large;
                font-family: "PT Mono";
                color: dimgrey;
            }
            .contient{
                margin-top: 100px;
            }
        </style>
    </head>
    <div class="container contient">
    <div class="row justify-content-between">
        <div class="delivery">Products {{ $products->count() }}</div>
        <div><a class="btn btn-primary add" href="/add_product">+ Add Product</a></div>
    </div>
    <br><br>
    <table class="table table-sm cssTable">
        <thead>
        <tr class="table-info">
            <th scope="col">IMAGE</th>
            <th scope="col">NAME</th>
            <th scope="col">REFERENCE</th>
            <th scope="col">PRICE</th>
            <th scope="col">DATE</th>
            <th scope="col">ACTION</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
        <tr>
            <th scope="row"><img src="images/{{$product->image}}" alt="" class="images"></th>
            <td>{{ $product->name }}</td>
            <td>{{ $product->reference }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->created_at }}</td>
            <td>
                <span><a href="/product_providers_info/{{$product->id}}" class="btn btn-secondary mr-2"><i class="fas fa-eye"></i></a></span>
                <span><a href="/product_info/{{$product->id}}" class="btn btn-warning mr-2"><i class="fas fa-edit"></i></a></span>
                <span><a href="/delete_product/{{$product->id}}" class="btn btn-danger mr-2"><i class="fas fa-trash"></i></a></span>
            </td>
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
