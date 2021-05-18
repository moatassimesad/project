@extends('layouts.store_admin')
@section('content1')
    <head>
        <link rel="stylesheet" href="css/list_collection.css">
    </head>


    <div class="row justify-content-center">
        @foreach($collections as $collection)
            <div class="col-6 col-md-4 mt-5">
                <a href="/collection_info/{{$collection->id}}"> <img src="images/{{ $collection->image}}" alt="" class="images"></a>
            </div>
        @endforeach
        <div class="col-6 col-md-4 mt-5">
            <a href="/add_collection">
                <div class="row bg-secondary align-items-center justify-content-center images plus">+</div>
            </a>
        </div>
    </div>



@endsection
