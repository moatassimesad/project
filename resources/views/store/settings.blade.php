@extends('layouts.store_admin')
@section('content1')
    <head>
        <link rel="stylesheet" href="css/settings.css">
    </head>

<form action="{{ route('edit_basic_info') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="container">
        @if(session('status'))
            <div class="success alert alert-success" role="alert">{{ session('status') }}</div>

        @endif
            @if(session('status1')=='Password changed successfully')
                <div class="success alert alert-success" role="alert">{{ session('status1') }}</div>
            @elseif(session('status1')=='Invalid password')
                <div class="success alert alert-danger" role="alert">{{ session('status1') }}</div>
            @endif
        <div class="contenus bg-light">
            <div  class="row justify-content-center align-items-center cat_info">Basic informations</div>
            <hr>


            <div class="row mt-5 m-4">
                <div class="col">
                    <label for="">First name</label>
                    <input type="text" class="form-control" style="@error('firstName') border:1px solid red; @enderror" placeholder="First name" name="firstName" value="{{auth()->user()->firstName}}">
                </div>
                <div class="col">
                    <label for="">Last name</label>
                    <input type="text" class="form-control" style="@error('lastName') border:1px solid red; @enderror" placeholder="Last name" name="lastName" value="{{auth()->user()->firstName}}">
                </div>
            </div>
            @error('firstName')
            <div  style="text-align: center; color: red;">{{ $message }}</div>
            @enderror
            @error('lastName')
            <div style="text-align: center; color: red;">{{ $message }}</div>
            @enderror
            <div class="form-group m-4">
                <label for="city">Collection</label>
                <select id="city" name="city" class="form-control" id="city">
                    <option value="{{auth()->user()->city}}" selected>{{auth()->user()->city}}</option>
                </select>
            </div>
            @error('city')
            <div style="text-align: center; color: red;">{{ $message }}</div>
            @enderror
            <div class="form-group m-5">
                <label for="name">Phone</label>
                <input type="text" class="form-control" name="phone" style="@error('phone') border:1px solid red; @enderror" placeholder="+212 x xx xx xx xx" value="{{auth()->user()->phone}}">
            </div>
            @error('phone')
            <div style="text-align: center; color: red;">{{ $message }}</div>
            @enderror


            <div style="height: 100px;" class="row justify-content-center mt-4">
                <div><button type="submit" id="submit" name="submit"   class="btn btn-warning"><i class="fas fa-edit"></i>&emsp;&emsp;Edit&emsp;&emsp;</button></div>
            </div>
        </div>
    </div>


</form>



    <form action="{{ route('edit_login_info') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="container">
            <div class="contenus bg-light">
                <div  class="row justify-content-center align-items-center cat_info">Login informations</div>
                <hr>
                <div  class="form-group m-5">
                    <input class="form-control"  name="old_password" type="password" style="@error('old_password') border:1px solid red; @enderror" placeholder="old password">
                </div>
                @error('old_password')
                <div style="color: red; text-align: center;">{{ $message }}</div>
                @enderror
                <div  class="form-group m-5">
                    <input class="form-control"  name="password" type="password" style="@error('password') border:1px solid red; @enderror" placeholder="new password">
                </div>
                <div  class="form-group m-5">
                    <input class="form-control"  name="password_confirmation" type="password" style="@error('password') border:1px solid red; @enderror" placeholder="retype password">
                </div>
                @error('password')
                <div style="color: red; text-align: center;">{{ $message }}</div>
                @enderror
                <div style="height: 100px;" class="row justify-content-center mt-4">
                    <div><button type="submit" id="submit" name="submit"   class="btn btn-warning"><i class="fas fa-edit"></i>&emsp;&emsp;Edit&emsp;&emsp;</button></div>
                </div>

            </div>

        </div>
    </form>






    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>



    <script>
        $('document').ready(function () {
            $("#title").html("Settings");
        });
    </script>
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

@endsection
