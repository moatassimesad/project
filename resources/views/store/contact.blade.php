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

    <form action="{{ route('save_contact') }}" method="post">
        @csrf
        <div class="container">
            @if(session('status'))
                <div class="success alert alert-success" role="alert">{{ session('status') }}</div>
            @endif
                <div class="form-group">
                    <label for="exampleInputEmail1">Facebook</label>
                    <input style="@error('facebookLink') border: 1px solid red; @enderror" type="text" class="form-control" name="facebookLink"  placeholder="Enter your Facebook link" value="{{ $store->facebookLink }}">
                </div>
                @error('facebookLink')
            <div class="error">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label>Twitter</label>
                    <input style="@error('twitterLink') border: 1px solid red; @enderror" type="text" class="form-control" name="twitterLink" placeholder="Enter your Twitter link" value="{{ $store->twitterLink }}">
                </div>
            @error('twitterLink')
            <div class="error">{{ $message }}</div>
            @enderror
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>



<script>
    $('document').ready(function () {
        $("#title").html("Settings");
    });
</script>

@endsection
