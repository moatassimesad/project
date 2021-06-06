@extends('layouts.store_admin')
@section('content1')
    <head>

    </head>
    <form action="{{ route('add_collection') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="container">
            <div class="contenus bg-light">
                <div  class="row justify-content-center align-items-center cat_info">Collection info</div>
                <hr>
                <div class="form-group m-5">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" style="@error('name') border:1px solid red; @enderror" placeholder="Name" value="{{old('name')}}">
                </div>
                @error('name')
                <div style="color: red; text-align: center;">{{ $message }}</div>
                @enderror
                <div class="form-group m-5">
                    <label for="reference">Reference</label>
                    <input type="text" class="form-control" name="reference" type="text" style="@error('reference') border:1px solid red; @enderror" placeholder="Reference" value="{{old('reference')}}">
                </div>
                @error('reference')
                <div style="color: red; text-align: center;">{{ $message }}</div>
                @enderror
                <div  class="row justify-content-center files" style="@error('image') border:1px solid red; @enderror">
                    <input type="file" class="bg-light fl" id="image" name="image">
                </div>
                @error('image')
                <div style="color: red; text-align: center; margin-top: 50px;">{{ $message }}</div>
                @enderror
                <div style="height: 100px;" class="row justify-content-center mt-4">
                    <div><button type="submit" id="submit" name="submit"   class="bouton btn btn-dark">&emsp;&emsp;Save&emsp;&emsp;</button></div>
                    <div><button type="reset" id="reset" class="btn btn-secondary ">&emsp;&emsp;Cancel&emsp;&emsp;</button></div>
                </div>

            </div>

        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>



    <script>
        $('document').ready(function () {
            $("#title").html("Collections");
        });
    </script>

    <script src="jquery-3.5.1.min.js"></script>
    <script>
        $('.file-upload').file_upload();
    </script>
@endsection
