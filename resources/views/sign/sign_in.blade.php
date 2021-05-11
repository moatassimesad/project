@extends('layouts.app')
@section('content')

<head>
    <title>Sign in</title>
    <link rel="stylesheet" href="css/sign_in.css">
<body>
<form action="{{route('sign_in')}}" method="post">
    @csrf
<div class="container-fluid">
    <div class="row offset-1">
        <a href="/"><span class="mystore">MyStore</span></a>
    </div>
    <div class="row justify-content-center">
        <span class="sign_in">Sign in</span>
    </div>
    <div class="row justify-content-center">
        <span class="havent">You haven't an account? <a href="{{ route('sign_up') }}">Sign up</a></span>
    </div>
    <br> <br> <br>
</div>
    @if(session('status'))
        <div class="status">{{ session('status') }}</div>

@endif
<div style="height: 100px;" class="align-items-center row justify-content-center">
    <input class="email" style=" @error('email') border-bottom:solid 1px red; @enderror" name="email" type="text" placeholder="Email" value="{{old('email')}}">

</div>

    @error('email')
    <div class="email_error">{{ $message }}</div>
    @enderror
<div style="height: 100px;" class="align-items-center row justify-content-center">
    <input class="pd" style="@error('password') border-bottom:solid 1px red; @enderror" name="password" type="password" placeholder="Password">
</div>
    @error('password')
    <div class="pd_error">{{ $message }}</div>
    @enderror
    <div class="row justify-content-center">
        <div>
        <input type="checkbox" class="form-check-input" name="remember" id="remember">
        <label class="form-check-label" for="remember">Remember me</label></div>
    </div>
<div style="height: 100px;" class="row justify-content-center align-items-center">
    <div><button  class="bouton btn btn-dark">Sign in</button></div>
</div>
</div>
</form>
</body>
</head>

@endsection
