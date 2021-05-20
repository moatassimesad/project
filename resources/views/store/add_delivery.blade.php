@extends('layouts.store_admin')
@section('content1')
    <head>
        <style>

        </style>
        <link rel="stylesheet" href="css/add_delivery.css">
    </head>

    <form action="{{ route('add_delivery') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="container">
            <div class="contenus bg-light">
                <div  class="category_info row justify-content-center align-items-center cat_info">Delivery info</div>
                <hr>
                <div  class="infos row justify-content-center align-items-center">
                    <input class="name"  name="name" type="text" style="@error('name') border-bottom:1px solid red; @enderror" placeholder="name" value="{{old('name')}}">
                </div>
                @error('name')
                <div style="color: red; text-align: center;">{{ $message }}</div>
                @enderror
                <div  class="infos row justify-content-center align-items-center">
                    <input class="reference"  name="reference" type="text" style="@error('reference') border-bottom:1px solid red; @enderror" placeholder="reference" value="{{old('reference')}}">
                </div>
                @error('reference')
                <div style="color: red; text-align: center;">{{ $message }}</div>
                @enderror
                <div  class="infos row justify-content-center align-items-center">
                    <input class="address"  name="address" type="text" style="@error('address') border-bottom:1px solid red; @enderror" placeholder="address" value="{{old('address')}}">
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
                        <input class="phone" style="@error('phone') border-bottom:solid 1px red; @enderror" type="number" name="phone" id="phone" placeholder="6 xx xx xx xx" value="{{ old('phone') }}">
                    </div>
                </div>

            @error('phone')
            <div class="error">{{ $message }}</div>
            @enderror
                <div style="height: 100px;" class="row justify-content-center mt-4">
                    <div><button type="submit" id="submit" name="submit"   class="bouton btn btn-dark">&emsp;&emsp;Save&emsp;&emsp;</button></div>
                    <div><a href="/list_delivery" class="btn btn-secondary ">&emsp;&emsp;Cancel&emsp;&emsp;</a></div>
                </div>
            </div>
            </div>

        </div>
    </form>



@endsection
