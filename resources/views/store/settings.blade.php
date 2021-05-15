@extends('layouts.store_admin')
@section('content1')
    <head>
        <link rel="stylesheet" href="css/settings.css">
    </head>

<form action="{{ route('edit_basic_info') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="container">
        <div class="contenus bg-light">
            <div  class="category_info row justify-content-center align-items-center cat_info">Basic informations</div>
            <hr>
            @if(session('status'))
                <div class="success alert alert-success" role="alert">{{ session('status') }}</div>

            @endif

            <div class="align-items-center row justify-content-between justify-content-around fn_ln">
                <input class="fn_and_ln" style="@error('firstName') border-bottom:solid 1px red; @enderror" type="text" id="firstName" name="firstName" placeholder="First Name" value="{{auth()->user()->firstName}}">
                <input class="fn_and_ln" style="@error('lastName') border-bottom:solid 1px red; @enderror" type="text" id="lastName" name="lastName" placeholder="Last Name" value="{{auth()->user()->lastName}}">
            </div>
            @error('firstName')
            <div class="error">{{ $message }}</div>
            @enderror
            @error('lastName')
            <div class="error">{{ $message }}</div>
            @enderror
            <div  class="city_div align-items-center row justify-content-center">
                <select id="city" name="city" class="city" style="@error('city') border-bottom:solid 1px red; @enderror" required>
                    <option value="{{auth()->user()->city}}" selected>{{auth()->user()->city}}</option>
                </select>

            </div>
            @error('city')
            <div class="error">{{ $message }}</div>
            @enderror
            <div  class="code_div row align-items-center justify-content-center">
                <div><select class="code">
                        <option value="0">+212</option>
                    </select>
                </div>
                <div class="offset-1">
                    <input class="phone" style="@error('phone') border-bottom:solid 1px red; @enderror" type="number" name="phone" id="phone" placeholder="6 xx xx xx xx" value="{{auth()->user()->phone}}">
                </div>
            </div>

            @error('phone')
            <div class="error">{{ $message }}</div>
            @enderror
            <div style="height: 100px;" class="row justify-content-center mt-4">
                <div><button type="submit" id="submit" name="submit"   class="fa fa-edit btn btn-warning">&emsp;&emsp;Save&emsp;&emsp;</button></div>
            </div>
        </div>
    </div>


</form>



    <form action="{{ route('edit_login_info') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="container">
            <div class="contenus bg-light">
                <div  class="category_info row justify-content-center align-items-center cat_info">Login informations</div>
                <hr>
                @if(session('status1')=='Password changed successfully')
                    <div class="success alert alert-success" role="alert">{{ session('status1') }}</div>
                @elseif(session('status1')=='Invalid password')
                    <div class="success alert alert-danger" role="alert">{{ session('status1') }}</div>
                @endif
                <div  class="infos row justify-content-center align-items-center">
                    <input class="name"  name="old_password" type="password" style="@error('name') border-bottom:1px solid red; @enderror" placeholder="old password">
                </div>
                @error('old_password')
                <div style="color: red; text-align: center;">{{ $message }}</div>
                @enderror
                <div  class="infos row justify-content-center align-items-center">
                    <input class="name"  name="password" type="password" style="@error('name') border-bottom:1px solid red; @enderror" placeholder="new password">
                </div>
                <div  class="infos row justify-content-center align-items-center">
                    <input class="reference"  name="password_confirmation" type="password" style="@error('reference') border-bottom:1px solid red; @enderror" placeholder="retype password">
                </div>
                @error('password')
                <div style="color: red; text-align: center;">{{ $message }}</div>
                @enderror
                <div style="height: 100px;" class="row justify-content-center mt-4">
                    <div><button type="submit" id="submit" name="submit"   class="fa fa-edit btn btn-warning">&emsp;&emsp;Save&emsp;&emsp;</button></div>
                </div>

            </div>

        </div>
    </form>



    <form action="{{ route('add_store_images') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="container">
            <div class="contenus bg-light">
                <div  class="category_info row justify-content-center align-items-center cat_info">Add pictures to your store</div>
                <hr>
                @if(session('status2'))
                    <div class="success alert alert-success" role="alert">{{ session('status2') }}</div>

                @endif
                <div  class="row justify-content-center files" style="@error('images') border:1px solid red; @enderror">
                    <input type="file" class="bg-light fl" id="image" name="images[]" multiple="multiple">
                </div>
                @error('images')
                <div style="color: red; text-align: center; margin-top: 50px;">{{ $message }}</div>
                @enderror
                <div style="height: 100px;" class="row justify-content-center mt-4">
                    <div><button type="submit" id="submit" name="submit"   class="btn btn-primary">&emsp;&emsp;Save&emsp;&emsp;</button></div>
                </div>

            </div>

        </div>
    </form>

    <form action="{{ route('edit_store_info') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="container">
            <div class="contenus bg-light">
                <div  class="category_info row justify-content-center align-items-center cat_info">Store informations</div>
                <hr>
                @if(session('status3'))
                    <div class="success alert alert-success" role="alert">{{ session('status') }}</div>

                @endif
                <div style="height: 100px;" class="align-items-center row justify-content-center">
                    <input name="storeName" class="name" style=" @error('storeName') border-bottom:1px solid red;  @enderror " type="text" id="storeName" placeholder="Store Name" autocomplete="off">

                </div>
                @error('storeName')
                <div style="color: red; text-align: center; margin-top: 50px;">
                    {{$message}}
                </div>
                @enderror
                <div style="height: 100px;" class="align-items-center row justify-content-center">
                    <span class="ajax" id="show"></span>

                </div>
                <div style="height: 100px;" class="align-items-center row justify-content-center">
                    <select name="storeActivityType" class="city"  style="  @error('storeActivityType') border-bottom:1px solid red;  @enderror" id="storeActivityType" >
                        <option selected value="{{$store->storeActivityType}}">{{$store->storeActivityType}}</option>
                    </select>
                </div>
                @error('storeActivityType')
                <div style="color: red; text-align: center; margin-top: 50px;">
                    {{$message}}
                </div>
                @enderror
                <div class="text_area align-items-center row justify-content-center">
                    <textarea class="form-control" style="  @error('textLayer') border:1px solid red;  @enderror" placeholder="Enter a text layer for your store..." name="textLayer" rows="3"></textarea>
                </div>
                @error('textLayer')
                <div style="color: red; text-align: center; margin-top: 50px;">
                    {{$message}}
                </div>
                @enderror
                <div style="height: 100px;" class="row justify-content-center mt-4">
                    <div><button type="submit" id="submit" name="submit"   class="fa fa-edit btn btn-warning">&emsp;&emsp;Save&emsp;&emsp;</button></div>
                </div>
            </div>
        </div>


    </form>
    <script src="jquery-3.5.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        let tab=["Marrakech","Casablanca","Agadir","Tanger","Fes","Rabat","Laayoune","Ifrane","Kenitra"];
        let intruder = '{{ auth()->user()->city }}';
        for(let i =1; i<=tab.length;i++){
            if(tab[i-1]==intruder)
                continue;
            let option= document.createElement("option");
            option.value=tab[i-1];
            let text=document.createTextNode(tab[i-1]);
            option.appendChild(text);
            document.getElementById("city").appendChild(option);
        }
    </script>
    <script>
        let tab1=["Clothing","Jewelery","Make-up","Food","Electronics"];
        let intruder1 = '{{ $store->storeActivityType }}';
        for(let i =1; i<=tab1.length;i++){
            if(tab1[i-1]==intruder1)
                continue;
            let option= document.createElement("option");
            option.value=tab1[i-1];
            let text=document.createTextNode(tab1[i-1]);
            option.appendChild(text);
            document.getElementById("storeActivityType").appendChild(option);
        }
    </script>
    <script>
        $('#show').html('.MyStore.ma');
        $('#storeName').keyup(function () {
            $('#show').show();
            //  var dev = $(this).val();
            $('#show').html($(this).val()+'.MyStore.ma');
        });
    </script>

    <script>
        $('.file-upload').file_upload();
    </script>

@endsection
