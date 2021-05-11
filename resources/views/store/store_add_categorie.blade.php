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
        .categorie_info{
            height: 50px;
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
            height: 100px;
        }
        .bouton{
            width: 150px;
        }
        input{
            background: none;
        }
        .bouton{
            margin-right: 20px;
        }
    </style>
</head>


        <div class="container ">
            <div class="contenus bg-light">
                <div  class="categorie_info row justify-content-center align-items-center">Categorie info</div>
                <hr>
                <div  class="infos row justify-content-center align-items-center">
                    <input class="name"  name="name" type="text" placeholder="name" value="{{old('name')}}">
                </div>
                <div  class="infos row justify-content-center align-items-center">
                    <input class="reference"  name="reference" type="text" placeholder="reference" value="{{old('reference')}}">
                </div>
                <div style="height: 100px;" class="row justify-content-center mt-4">
                    <div><button type="submit" id="submit" name="submit"   class="bouton btn btn-dark">&emsp;&emsp;Save&emsp;&emsp;</button></div>
                    <div><button type="reset" id="reset" class="btn btn-secondary ">&emsp;&emsp;Cancel&emsp;&emsp;</button></div>
                </div>

            </div>

        </div>



@endsection
