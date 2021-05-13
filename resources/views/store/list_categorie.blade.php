@extends('layouts.app')
@section('content')
<head>
    <link rel="stylesheet" href="css/list_categorie.css">
</head>

<div class="container-fluid mt-5">
    <input type="hidden" value="{{ $j=0 }}">

    @for($i=0;$i<$categories->count();$i++)
    <div class="row justify-content-around">

        <div class="mt-5">
            <a href="/categorie_info/{{$categories->getNth($i)->id}}"> <img src="images/{{ $categories->getNth($i)->image }}" alt="" class="images"></a>
        </div>
        <input type="hidden" value="{{ $i++ }}">
        @if($categories->getNth($i)!=null)
            <div class="mt-5">
                <a href="/categorie_info/{{$categories->getNth($i)->id}}"> <img src="images/{{ $categories->getNth($i)->image}}" alt="" class="images"></a>
            </div>
        @else
            <input type="hidden" value="{{ $j=1 }}">
            <a href="/add_categorie">
            <div class="row mt-5 bg-light align-items-center justify-content-center plus"><h1>+</h1></div>
            </a>
        @endif
        <input type="hidden" value="{{ $i++ }}">
        @if($categories->getNth($i)!=null)
            <div class="mt-5">
                <a href="/categorie_info/{{$categories->getNth($i)->id}}"> <img src="images/{{ $categories->getNth($i)->image}}" alt="" class="images"></a>
            </div>
        @elseif($j==0)
            <a href="/add_categorie">
            <div class="row mt-5 bg-light align-items-center justify-content-center plus"><h1>+</h1></div>
            </a>
            <input type="hidden" value="{{ $j=1 }}">
        @else
            <div class="mt-5 plus"></div>
        @endif
    </div>
    @endfor
    @if($j==0)
        <div class="row justify-content-around">
            <a href="/add_categorie">
            <div class="row mt-5 bg-light align-items-center justify-content-center plus"><h1>+</h1></div>
            </a>
            <div class="mt-5 plus" ></div>
            <div class="mt-5 plus" ></div>
        </div>
    @endif
</div>



@endsection
