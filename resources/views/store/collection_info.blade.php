
@extends('layouts.store_admin')
@section('content1')

    <head>

        <style>
            .contenu{
                border: solid 1px grey;
                border-radius: 15px;
                margin-top: 150px;
                margin-right: 15%;
                margin-left: 15%;
            }
            .cat_info{
                font-size: x-large;
                font-family: "SF Mono";
                height: 50px;
            }
        </style>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    @if($collection->store->id==auth()->user()->store->id)
        <form action="{{ route('edit_collection') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <div class="contenu bg-light">
                    <div  class="cat_info row justify-content-center align-items-center">Change collection info</div>
                    <hr>
                    <input type="hidden" name="id" value="{{$id}}">
                    <div class="form-group m-5">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" style="@error('name') border:1px solid red; @enderror" placeholder="Name" value="{{$collection->name}}">
                    </div>
                    @error('name')
                    <div style="color: red; text-align: center;">{{ $message }}</div>
                    @enderror
                    <div class="form-group m-5">
                        <label for="reference">Reference</label>
                        <input type="text" class="form-control" name="reference" type="text" style="@error('reference') border:1px solid red; @enderror" placeholder="Reference" value="{{$collection->reference}}">
                    </div>
                    @error('reference')
                    <div style="color: red; text-align: center;">{{ $message }}</div>
                    @enderror
                    <div  class="row justify-content-center files" style="@error('image') border:1px solid red; @enderror">
                        <input type="file" class="bg-light fl" id="image" name="image">
                    </div>
                    @error('image')
                    <div style="color: red; text-align: center; margin-top: 50px;">{{ $message }}</div>
                    @enderror

                    <div style="height: 100px;" class="row justify-content-center mt-4">
                        <span><a href="/list_collection" class="btn btn-secondary mr-2"><i class="fas fa-arrow-left "></i></a></span>
                        <span><a href="/delete_collection/{{ $id }}" class="btn btn-danger mr-2"><i class="fas fa-trash "></i></a></span>
                        <span><button type="submit" class="btn btn-warning mr-2"><i class="fas fa-edit "></i></button></span>
                    </div>

                </div>

            </div>
        </form>

    @else
        <div class="container">
            <div class="row mt-5 justify-content-center text-muted"><h1 style="margin-top: 100px;">No such collection to edit</h1></div>
        </div>
    @endif
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>



    <script>
        $('document').ready(function () {
            $("#title").html("Collections");
        });
    </script>
@endsection
