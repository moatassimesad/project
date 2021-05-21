@extends('layouts.store_admin')
@section('content1')
    <head>
        <style>
            td {
                vertical-align: center;
            }
            .images{
                border-radius: 10px;
                height: 10vh;
                width: 7vw;
            }
        </style>
    </head>

    <table class="table table-striped table-sm">
        <thead>
        <tr class="table-info">
            <th scope="col">IMAGE</th>
            <th scope="col">NAME</th>
            <th scope="col">REFERENCE</th>
            <th scope="col">PRICE</th>
            <th scope="col">PROVIDERS</th>
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
                <span><a href="/product_providers_info/{{$product->id}}" class=" mr-2"><i class="fas fa-eye"></i></a></span>
                <span><a href="/product_info/{{$product->id}}" class=" mr-2"><i class="fas fa-edit"></i></a></span>
                <span><a href="/delete_product/{{$product->id}}" class=" mr-2"><i class="fas fa-trash"></i></a></span>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>



    <script>
        $('document').ready(function () {
            $("#title").html("Products");
        });
    </script>
@endsection
