@extends('layouts.store_admin')
@section('content1')
    <head>
        <link rel="stylesheet" href="css/list_delivery.css">
    </head>
<div class="container contenus">
    <table class="table table-borderless">
        <thead>
        <tr>
            <th scope="col">NAME</th>
            <th scope="col">REFERENCE</th>
            <th scope="col">ADDRESS</th>
            <th scope="col">PHONE</th>
            <th scope="col">ACTIONS</th>
        </tr>
        </thead>
        <tbody>
        @foreach($deliveries as $element)
        <tr>
            <th scope="row">{{$element->name}}</th>
            <td>{{$element->reference}}</td>
            <td>{{$element->address}}</td>
            <td>{{$element->phone}}</td>
            <td>
                <span><a href="" class="fa fa-edit btn btn-warning mr-2"></a></span>
                <span><a href="" class="fa fa-trash btn btn-danger mr-2"></a></span>
            </td>
        </tr>
        @endforeach
        {{-- --}}
        </tbody>
    </table>
</div>
@endsection
