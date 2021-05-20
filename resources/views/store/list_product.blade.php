@extends('layouts.store_admin')
@section('content1')
    <head>
        <style>
            td {

                vertical-align: center;
            }
        </style>
    </head>

    <table class="table table-striped table-borderless table-sm">
        <thead>
        <tr class="table-info">
            <th scope="col">NAME</th>
            <th scope="col">IMAGE</th>
            <th scope="col">REFERENCE</th>
            <th scope="col">PRICE</th>
            <th scope="col">PROVIDERS</th>
            <th scope="col">ACTION</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
        <tr>
            <th scope="row">{{ $product->name }}</th>
            <td>image</td>
            <td>{{ $product->reference }}</td>
            <td>{{ $product->price }}</td>
            <td>
                @foreach($product->providers as $provider)
                <li>{{$provider->name}}</li>
                <li>{{$provider->pivot->quantity}}</li>
                <li>{{$provider->pivot->unitCost}}</li>
                @endforeach
            </td>
            <td>action</td>

        </tr>
        @endforeach

        </tbody>
    </table>
@endsection
