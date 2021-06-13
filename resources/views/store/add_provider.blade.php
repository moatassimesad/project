@extends('layouts.store_admin')
@section('content1')

    <form action="{{ route('add_provider') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="container">
            <div class="contenus bg-light">
                <div  class="row justify-content-center align-items-center cat_info">Provider info</div>
                <hr>
                <div class="form-group m-5">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" style="@error('name') border:1px solid red; @enderror" placeholder="Name" value="{{old('name')}}">
                </div>
                @error('name')
                <div style="color: red; text-align: center;">{{ $message }}</div>
                @enderror
                <div class="form-group m-5">
                    <label for="name">Reference</label>
                    <input type="text" class="form-control" name="reference" style="@error('reference') border:1px solid red; @enderror" placeholder="Reference" value="{{old('reference')}}">
                </div>
                @error('reference')
                <div style="color: red; text-align: center;">{{ $message }}</div>
                @enderror
                <div class="form-group m-5">
                    <label for="name">Address</label>
                    <input type="text" class="form-control" name="address" style="@error('address') border:1px solid red; @enderror" placeholder="Address" value="{{old('address')}}">
                </div>
                @error('address')
                <div style="color: red; text-align: center;">{{ $message }}</div>
                @enderror
                <div class="form-group m-5">
                    <label for="name">Phone</label>
                    <input type="text" class="form-control" name="phone" style="@error('phone') border:1px solid red; @enderror" placeholder="+212 x xx xx xx xx" value="{{old('phone')}}">
                </div>
                @error('phone')
                <div class="error">{{ $message }}</div>
                @enderror
                <div style="height: 100px;" class="row justify-content-center mt-4">
                    <div><button type="submit" id="submit" name="submit"   class="bouton btn btn-dark">&emsp;&emsp;Save&emsp;&emsp;</button></div>
                    <div><a href="/list_delivery" class="btn btn-secondary ">&emsp;&emsp;Cancel&emsp;&emsp;</a></div>
                </div>
            </div>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>



    <script>
        $('document').ready(function () {
            $("#title").html("Providers");
            $(".providers").addClass('active');
            $(".products_toggle").addClass('active');
        });
    </script>
@endsection
