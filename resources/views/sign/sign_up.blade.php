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

    <div class="container p-3">
        <div style="height: 100px;" class="align-items-center row justify-content-between justify-content-around">
            <input style="width: 30%; height: 30px; border: none; border-bottom: solid 1px;" type="text" placeholder="First Name">
            <input style="width: 30%; height: 30px; border: none; border-bottom: solid 1px;" type="text" placeholder="Last Name">
        </div>

        <div style="height: 100px;" class="align-items-center row justify-content-center">
            <input style="width: 60%; height: 30px; border: none; border-bottom: solid 1px;" type="text" placeholder="Adress Email">

        </div>
        <div style="height: 100px;" class="align-items-center row justify-content-center">
            <select id="city" style=" height: 30px; border: none; border-bottom: solid 1px;">
                <option value="0" selected>City</option>
            </select>

        </div>
        <div style="height: 100px;" class="row align-items-center justify-content-center">
            <div><select style="height: 30px; border: none; border-bottom: solid 1px;">
                    <option value="0">+212</option>
                </select>
            </div>
            <div class="offset-1"><input style="width :300px; height: 30px; border: none; border-bottom: solid 1px;" type="text" placeholder="6 xx xx xx xx"></div>
        </div>
    </div>
    <div style="height: 100px;" class="align-items-center row justify-content-center">
        <input style="width: 60%; height: 30px; border: none; border-bottom: solid 1px;" type="password" placeholder="Password">

    </div>
    </div>
    <div style="height: 100px;" class="align-items-center row justify-content-center">
        <input style="width: 60%; height: 30px; border: none; border-bottom: solid 1px;" type="password" placeholder="Re-Password">

    </div>
    <div style="height: 100px;" class="row justify-content-center">
        <div><button  style="width: 150px;" class="btn btn-dark">Save</button></div>
        <div><button style="width: 150px;" class="btn btn-light offset-3">Cancel</button></div>
    </div>



    </div>
    <script>
        let tab=["Marrakech","Casablanca","Agadir","Tanger","Fes","Rabat","Laayoune","Ifrane","Kenitra"];
        for(let i =1; i<=tab.length;i++){
            let option= document.createElement("option");
            option.value=i;
            let text=document.createTextNode(tab[i-1]);
            option.appendChild(text);
            document.getElementById("city").appendChild(option);
        }
    </script>
    </body>

@endsection
