@extends('layouts.app')
@section('content')
    @Auth
    this is your stats
    <form action="{{route('logout')}}" method="post">
        @csrf
        <button type="submit">logout</button>
    </form>
    @endauth
    @guest()
        U should <a href="/sign_in">sign in</a>
    @endguest
@endsection
