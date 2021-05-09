@extends('layouts.app')
@section('content')

    <form action="{{route('logout')}}" method="post">
        @csrf
        Welcome , this is your stats <button type="submit" style="float:right; background:none; border: none;">logout</button>
    </form>
@endsection
