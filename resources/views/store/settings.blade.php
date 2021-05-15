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
                @if(session('status')=='Changed successfully')
                    <div class="success alert alert-success" role="alert">{{ session('status') }}</div>
                @elseif(session('status')=='Invalid password')
                    <div class="success alert alert-danger" role="alert">{{ session('status') }}</div>
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
    <script src="jquery-3.5.1.min.js"></script>
    <script>
        $('.file-upload').file_upload();
    </script>

@endsection
