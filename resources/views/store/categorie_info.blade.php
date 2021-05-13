@extends('layouts.app')
@section('content')
    <head>

        <style>
            .contenus{
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
            .bouton{
                margin-right: 20px;
            }
            .cat_info{
                font-size: x-large;
                font-family: "SF Mono";
                height: 50px;
            }

        </style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <form action="{{ route('edit_categorie') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="contenus bg-light">
                <div  class=" row justify-content-center align-items-center cat_info">Change Category info</div>
                <hr>
                <input type="hidden" name="id" value="{{$id}}">
                <div  class="infos row justify-content-center align-items-center">
                    <input class="name"  name="name" type="text" placeholder="name" value="{{$categorie->name}}">
                </div>

                <div  class="infos row justify-content-center align-items-center">
                    <input class="reference"  name="reference" type="text"  placeholder="reference" value="{{$categorie->reference}}">
                </div>

                <div style="height: 100px;" class="row justify-content-center mt-4">
                    <span><a href="/list_categorie" class="fa fa-arrow-left btn btn-secondary mr-2"></a></span>
                    <span><a href="/delete_categorie/{{ $id }}" class="fa fa-trash btn btn-danger mr-2"></a></span>
                    <span><button type="submit" class="fa fa-edit btn btn-warning mr-2"></button></span>
                </div>

            </div>

        </div>
    </form>

    <script src="jquery-3.5.1.min.js"></script>
    <script>
        $('.file-upload').file_upload();
    </script>
@endsection
