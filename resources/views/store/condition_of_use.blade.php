@extends('layouts.store_admin')
@section('content1')
    <head>
        <style>
            .text_area{
                margin-right: 5vw;
                margin-left: 5vw;
            }
            ::placeholder{
                font-size: x-large;
            }
            .bouton{
                margin-top: 40px;
            }
            .success{
                text-align: center;
            }

        </style>
    </head>
    <form action="{{ route('save_condition_of_use') }}" method="post">
        @csrf
   <div class="container">
       @if( session('status') )
           <div class="success alert alert-success" role="alert">{{ session('status') }}</div>
       @endif
       <div class="text_area align-items-center row justify-content-center">
           <textarea class="form-control" style="  @error('conditionOfUse') border:1px solid red;  @enderror" placeholder="Enter your store's conditions of use..." name="conditionOfUse" rows="5"></textarea>
       </div>
       @error('conditionOfUse')
       <div style="color: red; text-align: center; margin-top: 50px;">
           {{$message}}
       </div>
       @enderror
       <div class="row justify-content-center">
           <button class="bouton btn btn-primary" type="submit">Save</button>
       </div>
   </div>
    </form>
@endsection
