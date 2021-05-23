@extends('layouts.store_admin')
@section('content1')


    <head>
        <link rel="stylesheet" href="css/list_provider.css">
    </head>
    <div class="container contient">
        <div class="row justify-content-between">
            <div class="provider">providers {{ $providers->count() }}</div>
            <div><a class="btn btn-primary add" href="/add_provider">+ Add provider</a></div>
        </div>
        <br><br>
        <table class="table table-striped table-sm table-borderless">
            <thead>
            <tr class="table-info">
                <th scope="col">NAME</th>
                <th scope="col">REFERENCE</th>
                <th scope="col">ADDRESS</th>
                <th scope="col">PHONE</th>
                <th scope="col">ACTIONS</th>
            </tr>
            </thead>
            <tbody>
            @foreach($providers as $element)
                <tr>
                    <th scope="row">{{$element->name}}</th>
                    <td>{{$element->reference}}</td>
                    <td>{{$element->address}}</td>
                    <td>{{$element->phone}}</td>
                    <td>
                        <span><a href="/provider_info/{{$element->id}}" class="btn btn-warning mr-2"><i class="fas fa-edit"></i></a></span>
                        <span><a href="/delete_provider/{{$element->id}}" class="btn btn-danger mr-2"><i class="fas fa-trash"></i></a></span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>



    <script>
        $('document').ready(function () {
            $("#title").html("Providers");
        });
    </script>

@endsection
