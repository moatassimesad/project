@extends('layouts.app')
@section('content')

<head>
    <title>Sign in</title>
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
<body>
<div class="container-fluid">
    <div class="row offset-1">
        <a href="/"><span style="color: black; font-family: Geneva; font-size: x-large">MyStore</span></a>
    </div>
    <div class="row justify-content-center">
        <span style="font-family: Arial; font-weight: bold; font-size: 80px;">Sign in</span>
    </div>
    <div class="row justify-content-center">
        <span style="font-family: Geneva;">You haven't an account? <a href="{{ route('sign_up') }}">Sign up</a></span>
    </div>
</div>

<div style="height: 100px;" class="align-items-center row justify-content-center">
    <input style="width: 60%; height: 30px; border: none; border-bottom: solid 1px;" type="text" placeholder="Adress Email">

</div>
<div style="height: 100px;" class="align-items-center row justify-content-center">
    <input style="width: 60%; height: 30px; border: none; border-bottom: solid 1px;" type="password" placeholder="Password">
</div>
<div style="height: 100px;" class="row justify-content-center align-items-center">
    <div><button style="width: 150px;" class="btn btn-dark">Sign in</button></div>
</div>
</div>
</body>
</head>

@endsection
