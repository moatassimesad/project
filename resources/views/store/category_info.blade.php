
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

            .name,.reference{
                width: 60%;
                height: 30px;
                border: none;
                border-bottom: solid 1px;
            }
            img {
                max-width: 100%; height: auto;
            }
            input{
                text-align:center;
            }
            input:focus, textarea:focus, select:focus{
                outline: none;
            }
            a, u {
                text-decoration: none; !important;
            }
            a {
                text-decoration: none !important;
            }
            .infos{
                height: 150px;
            }
            input{
                background: none;
            }
            .cat_info{
                font-size: x-large;
                font-family: "SF Mono";
                height: 50px;
            }
        </style>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    @if($category->user_id==auth()->user()->id)
    <form action="{{ route('edit_category') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="contenu bg-light">
                <div  class=" row justify-content-center align-items-center cat_info">Change Category info</div>
                <hr>
                <input type="hidden" name="id" value="{{$id}}">
                <div  class="infos row justify-content-center align-items-center">
                    <input class="name" style="@error('name') border-bottom:1px solid red; @enderror"  name="name" type="text" placeholder="name" value="{{$category->name}}">
                </div>
                @error('name')
                <div style="color: red; text-align: center;">{{ $message }}</div>
                @enderror
                <div  class="infos row justify-content-center align-items-center">
                    <input class="reference" style="@error('reference') border-bottom:1px solid red; @enderror" name="reference" type="text"  placeholder="reference" value="{{$category->reference}}">
                </div>
                @error('reference')
                <div style="color: red; text-align: center;">{{ $message }}</div>
                @enderror

                <div style="height: 100px;" class="row justify-content-center mt-4">
                    <span><a href="/list_category" class="fa fa-arrow-left btn btn-secondary mr-2"></a></span>
                    <span><a href="/delete_category/{{ $id }}" class="fa fa-trash btn btn-danger mr-2"></a></span>
                    <span><button type="submit" class="fa fa-edit btn btn-warning mr-2"></button></span>
                </div>

            </div>

        </div>
    </form>

    @else
        <div class="container">
            <div class="row mt-5 justify-content-center text-muted"><h1 style="margin-top: 100px;">No such category to edit</h1></div>
        </div>
    @endif

@endsection
