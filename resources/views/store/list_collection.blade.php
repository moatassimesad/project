@extends('layouts.store_admin')
@section('content1')
    <head>
        <link rel="stylesheet" href="css/list_collection.css">
        <style>
            .image #zoom_in img{
                transform: scale(1);
                transition: 0.3s ease-in-out;
            }
            .image #zoom_in:hover img{
                transform: scale(1.1);
            }
        </style>
    </head>

    <div class="container-fluid mt-5">
        <input type="hidden" value="{{ $j=0 }}">

        @for($i=0;$i<$collections->count();$i++)
            <div class="row justify-content-around">

                <div class="mt-5 flex-column image">
                    <a id="zoom_in" href="/collection_info/{{$collections->getNth($i)->id}}"> <img src="images/{{ $collections->getNth($i)->image }}" alt="" class="images"></a>
                    <div class="text-center mt-2" style="font-weight:500 " >{{$collections->getNth($i)->name}}</div>
                </div>
                <input type="hidden" value="{{ $i++ }}">
                @if($collections->getNth($i)!=null)
                    <div class="mt-5 flex-column image">
                        <a id="zoom_in" href="/collection_info/{{$collections->getNth($i)->id}}"> <img src="images/{{ $collections->getNth($i)->image}}" alt="" class="images"></a>
                        <div class="text-center mt-2" style="font-weight:500 ">{{$collections->getNth($i)->name}}</div>
                    </div>
                @else
                    <input type="hidden" value="{{ $j=1 }}">
                    <a href="/add_collection">
                        <div class="row mt-5 bg-primary align-items-center justify-content-center plus"><p class="white">+ Add Category</p></div>
                    </a>
                @endif
                <input type="hidden" value="{{ $i++ }}">
                @if($collections->getNth($i)!=null)
                    <div class="mt-5 flex-column image">
                        <a id="zoom_in" href="/collection_info/{{$collections->getNth($i)->id}}"> <img src="images/{{ $collections->getNth($i)->image}}" alt="" class="images"></a>
                        <div class="text-center mt-2" style="font-weight:500 ">{{$collections->getNth($i)->name}}</div>
                    </div>
                @elseif($j==0)
                    <a href="/add_collection">
                        <div class="row mt-5 bg-primary align-items-center justify-content-center plus"><p class="white">+ Add Category</p></div>
                    </a>
                    <input type="hidden" value="{{ $j=1 }}">
                @else
                    <div class="mt-5 plus"></div>
                @endif
            </div>
        @endfor
        @if($j==0)
            <div class="row justify-content-around">
                <a href="/add_collection">
                    <div class="row mt-5 bg-primary align-items-center justify-content-center plus"><p class="white">+ Add Category</p></div>
                </a>
                <div class="mt-5 plus" ></div>
                <div class="mt-5 plus" ></div>
            </div>
        @endif
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>



    <script>
        $('document').ready(function () {
            $("#title").html("Collections");
            $(".collections").addClass('active');
            $(".products_toggle").addClass('active');
        });
    </script>
@endsection

