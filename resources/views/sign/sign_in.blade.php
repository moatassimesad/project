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
<form action="{{route('sign_in')}}" method="post">
    @csrf
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
    <br> <br> <br>
</div>
    @if(session('status'))
        <div style="text-align: center; color: red;">{{ session('status') }}</div>

@endif
<div style="height: 100px;" class="align-items-center row justify-content-center">
    <input style="width: 60%; height: 30px; border: none; border-bottom: solid 1px; @error('email') border-bottom:solid 1px red; @enderror" name="email" type="text" placeholder="Email" value="{{old('email')}}">

</div>

    @error('email')
    <div style="text-align: center; color: red;">{{ $message }}</div>
    @enderror
<div style="height: 100px;" class="align-items-center row justify-content-center">
    <input style="width: 60%; height: 30px; border: none; border-bottom: solid 1px;@error('password') border-bottom:solid 1px red; @enderror" name="password" type="password" placeholder="Password">
</div>
    @error('password')
    <div style="margin-bottom: 20px; text-align: center; color: red;">{{ $message }}</div>
    @enderror
<div style="height: 100px;" class="row justify-content-center align-items-center">
    <div><button style="width: 150px;" class="btn btn-dark">Sign in</button></div>
</div>
</div>
</form>
</body>
</head>

@endsection
