@extends('layouts.store_admin')
@section('content1')
    <head>
        <style>

        </style>
        <link rel="stylesheet" href="{{ asset('css/add_delivery.css') }}">
    </head>
    @if($delivery->store->id ?? ''==auth()->user()->store->id ?? '')
    <form action="{{ route('edit_delivery') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="container">
            <div class="contenus bg-light">
                <div  class="category_info row justify-content-center align-items-center cat_info">Change delivery info</div>
                <hr>
                <div  class="infos row justify-content-center align-items-center">
                    <input type="hidden" name="id" value="{{$id}}">
                    <input class="name"  name="name" type="text" style="@error('name') border-bottom:1px solid red; @enderror" placeholder="name" value="{{$delivery->name}}">
                </div>
                @error('name')
                <div style="color: red; text-align: center;">{{ $message }}</div>
                @enderror
                <div  class="infos row justify-content-center align-items-center">
                    <input class="reference"  name="reference" type="text" style="@error('reference') border-bottom:1px solid red; @enderror" placeholder="reference" value="{{$delivery->reference}}">
                </div>
                @error('reference')
                <div style="color: red; text-align: center;">{{ $message }}</div>
                @enderror
                <div  class="infos row justify-content-center align-items-center">
                    <input class="address"  name="address" type="text" style="@error('address') border-bottom:1px solid red; @enderror" placeholder="address" value="{{$delivery->address}}">
                </div>
                @error('address')
                <div style="color: red; text-align: center;">{{ $message }}</div>
                @enderror
                <div  class="code_div row align-items-center justify-content-center">
                    <div><select class="code">
                            <option value="0">+212</option>
                        </select>
                    </div>
                    <div class="offset-1">
                        <input class="phone" style="@error('phone') border-bottom:solid 1px red; @enderror" type="number" name="phone" id="phone" placeholder="6 xx xx xx xx" value="{{$delivery->phone}}">
                    </div>
                </div>

                @error('phone')
                <div class="error">{{ $message }}</div>
                @enderror
                <div style="height: 100px;" class="row justify-content-center mt-4">
                    <div><a href="/list_delivery" class="bouton btn btn-secondary"><i class=" fas fa-arrow-left"></i></a></div>
                    <div><button type="submit" id="submit" name="submit"   class="btn btn-warning"><i class="fas fa-edit "></i></button></div>
                </div>
            </div>
        </div>

        </div>
    </form>
    @else
        <div class="container">
            <div class="row mt-5 justify-content-center text-muted"><h1 style="margin-top: 100px;">No such delivery to edit</h1></div>
        </div>
    @endif
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>



    <script>
        $('document').ready(function () {
            $("#title").html("Deliveries");
        });
    </script>
@endsection
