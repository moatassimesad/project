@extends('layouts.app')
@section('content')
<head>
    <link rel="stylesheet" href="css/add_categorie.css">
</head>
<form action="{{ route('add_categorie') }}" method="post" enctype="multipart/form-data">
    @csrf

        <div class="container">
            <div class="contenus bg-light">
                <div  class="categorie_info row justify-content-center align-items-center cat_info">Category info</div>
                <hr>

                <div  class="row justify-content-center files" style="@error('image') border:1px solid red; @enderror">
                    <input type="file" class="bg-light fl" id="image" name="image">
                </div>
                @error('image')
                <div style="color: red; text-align: center; margin-top: 50px;">{{ $message }}</div>
                @enderror
                <div  class="infos row justify-content-center align-items-center">
                    <input class="name"  name="name" type="text" style="@error('name') border-bottom:1px solid red; @enderror" placeholder="name" value="{{old('name')}}">
                </div>
                @error('name')
                <div style="color: red; text-align: center;">{{ $message }}</div>
                @enderror
                <div  class="infos row justify-content-center align-items-center">
                    <input class="reference"  name="reference" type="text" style="@error('reference') border-bottom:1px solid red; @enderror" placeholder="reference" value="{{old('reference')}}">
                </div>
                @error('reference')
                <div style="color: red; text-align: center;">{{ $message }}</div>
                @enderror
                <div style="height: 100px;" class="row justify-content-center mt-4">
                    <div><button type="submit" id="submit" name="submit"   class="bouton btn btn-dark">&emsp;&emsp;Save&emsp;&emsp;</button></div>
                    <div><button type="reset" id="reset" class="btn btn-secondary ">&emsp;&emsp;Cancel&emsp;&emsp;</button></div>
                </div>

            </div>

        </div>
</form>

<script src="jquery-3.5.1.min.js"></script>
<script>
    $('.file-upload').file_upload();
</script>
@endsection
