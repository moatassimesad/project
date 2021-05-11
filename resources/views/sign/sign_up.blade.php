@extends('layouts.app')
@section('content')

    <head>
        <title>Sign up</title>
        <link rel="stylesheet" href="css/sign_up.css">
    </head>
    <body>
    <div class="container-fluid">
        <div class="row offset-1">
            <a href="/"><span class="mystore">MyStore</span></a>
        </div>
        <div class="row justify-content-center">
            <span class="sign_up">Sign up</span>
        </div>
        <div class="row justify-content-center">
            <span class="already">Already have an account? <a href="{{ route('sign_in') }}">Sign in</a></span>
        </div>
    </div>
    <form action="{{ route('sign_up') }}" method="post">
        @csrf
    <div class="container p-3">
        <div class="align-items-center row justify-content-between justify-content-around fn_ln">
            <input class="fn_and_ln" style="@error('firstName') border-bottom:solid 1px red; @enderror" type="text" id="firstName" name="firstName" placeholder="First Name" value="{{ old('firstName') }}">
            <input class="fn_and_ln" style="@error('lastName') border-bottom:solid 1px red; @enderror" type="text" id="lastName" name="lastName" placeholder="Last Name" value="{{ old('lastName') }}">
        </div>

        @error('firstName')
        <div class="error">{{ $message }}</div>
        @enderror
        @error('lastName')
        <div class="error">{{ $message }}</div>
        @enderror
        <div class="email_div align-items-center row justify-content-center">
            <input class="email" style="@error('email') border-bottom:solid 1px red; @enderror" type="text" id="email" name="email" placeholder="Email"value="{{ old('email') }}">

        </div>
        @error('email')
        <div class="error">{{ $message }}</div>
        @enderror
        <div  class="city_div align-items-center row justify-content-center">
            <select id="city" name="city" class="city" style="@error('city') border-bottom:solid 1px red; @enderror" value="{{ old('city') }}" required>
                <option value="0" selected disabled>City</option>
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
                <input class="phone" style="@error('phone') border-bottom:solid 1px red; @enderror" type="number" name="phone" id="phone" placeholder="6 xx xx xx xx" value="{{ old('phone') }}">
            </div>
        </div>
    </div>
        @error('phone')
        <div class="error">{{ $message }}</div>
        @enderror
    <div class="pd_div align-items-center row justify-content-center">
        <input class="pd" style="@error('password') border-bottom:solid 1px red; @enderror"  type="password" name="password" id="password" placeholder="Password">

    </div>
    <div class="pd_div align-items-center row justify-content-center">
        <input class="pd" type="password" id="password_confirmation" name="password_confirmation" placeholder="Re-Password">

    </div>
        @error('password')
        <div class="pd_error">{{ $message }}</div>
        @enderror
    <div style="height: 100px;" class="row justify-content-center offset-4 mt-4">
        <div><button type="submit" id="submit" name="submit"   class="bouton btn btn-dark">Save</button></div>
        <div><button type="reset" id="reset" class="bouton btn btn-light offset-3">Cancel</button></div>
    </div>



    </div>
    </form>
    <script>
        let tab=["Marrakech","Casablanca","Agadir","Tanger","Fes","Rabat","Laayoune","Ifrane","Kenitra"];
        for(let i =1; i<=tab.length;i++){
            let option= document.createElement("option");
            option.value=tab[i-1];
            let text=document.createTextNode(tab[i-1]);
            option.appendChild(text);
            document.getElementById("city").appendChild(option);
        }
    </script>
    </body>

@endsection
