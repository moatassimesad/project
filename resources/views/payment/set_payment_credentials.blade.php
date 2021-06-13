@extends('layouts.store_admin')
@section('content1')
    <head>
        <style>
            .success{
                text-align: center;
            }
            .error{
                text-align: center;
                color: red;
            }

        </style>
    </head>

    <form action="{{ route('save_paypal_credentials') }}" method="post">
        @csrf
        <div class="container">
            @if(session('status'))
                <div class="success alert alert-success" role="alert">{{ session('status') }}</div>
            @endif
            <div class="form-group">
                <label for="exampleInputEmail1">Client id</label>
                <input style="@error('client_id') border: 1px solid red; @enderror" type="text" class="form-control" name="client_id"  placeholder="Enter your client id" value="{{ old('client_id') }}">
            </div>
            @error('client_id')
            <div class="error">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label>Client secret</label>
                <input style="@error('client_secret') border: 1px solid red; @enderror" type="text" class="form-control" name="client_secret" placeholder="Enter your client secret" value="{{ old('client_secret') }}">
            </div>
            @error('client_secret')
            <div class="error">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>



    <script>
        $('document').ready(function () {
            $("#title").html("Paypal credentials");
        });
    </script>

@endsection
