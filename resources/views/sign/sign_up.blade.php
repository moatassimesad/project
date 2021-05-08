@extends('layouts.app')
@section('content')

    <head>
        <title>Sign up</title>
        <style>
            img {
                max-width: 100%; height: auto;
            }
            input{
                text-align:center;
            }
            input:focus, textarea:focus, select:focus{
                outline: none;
            }
        </style>
    </head>
    <body>
    <div class="container-fluid">
        <div class="row offset-1">
            <a href="/"><span style="color: black; font-family: Geneva; font-size: x-large">MyStore</span></a>
        </div>
        <div class="row justify-content-center">
            <span style="font-family: Arial; font-weight: bold; font-size: 80px;">Sign up</span>
        </div>
        <div class="row justify-content-center">
            <span style="font-family: Geneva;">Already have an account? <a href="{{ route('sign_in') }}">Sign in</a></span>
        </div>
    </div>
    <form action="{{ route('sign_up') }}" method="post">
        <input type="hidden" name="storeName">
        <input type="hidden" name="storeActivityType">
        @csrf
    <div class="container p-3">
        <div style="height: 100px;" class="align-items-center row justify-content-between justify-content-around">
            <input style="width: 30%; height: 30px; border: none; border-bottom: solid 1px;@error('firstName') border-bottom:solid 1px red; @enderror" type="text" id="firstName" name="firstName" placeholder="First Name" value="{{ old('firstName') }}">
            <input style="width: 30%; height: 30px; border: none; border-bottom: solid 1px;@error('lastName') border-bottom:solid 1px red; @enderror" type="text" id="lastName" name="lastName" placeholder="Last Name" value="{{ old('lastName') }}">
        </div>

        @error('firstName')
        <div style="text-align: center; color: red;">{{ $message }}</div>
        @enderror
        @error('lastName')
        <div style="text-align: center; color: red;">{{ $message }}</div>
        @enderror
        <div style="height: 100px;" class="align-items-center row justify-content-center">
            <input style="width: 60%; height: 30px; border: none; border-bottom: solid 1px;@error('email') border-bottom:solid 1px red; @enderror" type="text" id="email" name="email" placeholder="Email"value="{{ old('email') }}">

        </div>
        @error('email')
        <div style="text-align: center; color: red;">{{ $message }}</div>
        @enderror
        <div style="height: 100px;" class="align-items-center row justify-content-center">
            <select id="city" name="city" style=" height: 30px; border: none; border-bottom: solid 1px;@error('city') border-bottom:solid 1px red; @enderror" value="{{ old('city') }}" required>
                <option value="0" selected disabled>City</option>
            </select>

        </div>
        @error('city')
        <div style="text-align: center; color: red;">{{ $message }}</div>
        @enderror
        <div style="height: 100px;" class="row align-items-center justify-content-center">
            <div><select style="height: 30px; border: none; border-bottom: solid 1px;">
                    <option value="0">+212</option>
                </select>
            </div>
            <div class="offset-1"><input style="width :300px; height: 30px; border: none; border-bottom: solid 1px;@error('phone') border-bottom:solid 1px red; @enderror" type="number" name="phone" id="phone" placeholder="6 xx xx xx xx" value="{{ old('phone') }}"></div>
        </div>
    </div>
        @error('phone')
        <div style="text-align: center; color: red;">{{ $message }}</div>
        @enderror
    <div style="height: 100px;" class="align-items-center row justify-content-center">
        <input style="width: 60%; height: 30px; border: none; border-bottom: solid 1px; @error('password') border-bottom:solid 1px red; @enderror"  type="password" name="password" id="password" placeholder="Password">

    </div>
    <div style="height: 100px;" class="align-items-center row justify-content-center">
        <input style="width: 60%; height: 30px; border: none; border-bottom: solid 1px;" type="password" id="password_confirmation" name="password_confirmation" placeholder="Re-Password">

    </div>
        @error('password')
        <div style="margin-bottom: 20px; text-align: center; color: red;">{{ $message }}</div>
        @enderror
    <div style="height: 100px;" class="row justify-content-center">
        <div><button type="submit" id="submit" name="submit"  style="width: 150px;" class="btn btn-dark">Save</button></div>
        <div><button type="reset" id="reset" style="width: 150px;" class="btn btn-light offset-3">Cancel</button></div>
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
