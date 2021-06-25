@extends('layouts.store_admin')
@section('content1')

    <head>
        <link rel="stylesheet" href="css/edit_store.css">
    </head>


    <form action="{{ route('edit_store_info') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="container">
            @if(session('status2'))
                <div class="success alert alert-success" style="text-align: center;" role="alert">{{ session('status2') }}</div>

            @endif
                @if(session('status3'))
                    <div class="success alert alert-success" style="text-align: center;" role="alert">{{ session('status3') }}</div>

                @endif
            <div class="contenus bg-light">
                <div  class="category_info row justify-content-center align-items-center cat_info">Store informations</div>
                <hr>
                <div class="form-group m-5">
                    <label for="name">Store name</label>
                    <input name="storeName" class="form-control" style=" @error('storeName') border-bottom:1px solid red;  @enderror " type="text" id="storeName" placeholder="Store Name" autocomplete="off" value="{{ $store->name }}">

                </div>
                @error('storeName')
                <div style="color: red; text-align: center; margin-top: 50px;">
                    {{$message}}
                </div>
                @enderror
                <div class="align-items-center row justify-content-center">
                    <span style="border-bottom: 1px solid black;" id="show"></span>

                </div>
                <div class="align-items-center row justify-content-center mt-5 mr-2 ml-2">
                    <label for="textLayer_top">Enter a text layer that will displayed at the top of the picture in the top</label>
                    <textarea class="form-control" style="  @error('textLayer_top') border:1px solid red;  @enderror" placeholder="Enter a text layer top for your store..." name="textLayer_top" rows="3">{{ $store->textLayer_top }}</textarea>
                </div>
                @error('textLayer_top')
                <div style="color: red; text-align: center; margin-top: 50px;">
                    {{$message}}
                </div>
                @enderror
                <div class="align-items-center row justify-content-center mt-4 mr-2 ml-2">
                    <label for="textLayer_bottom">Enter a text layer that will displayed at the top of the picture in the bottom</label>
                    <textarea class="form-control" style="  @error('textLayer_bottom') border:1px solid red;  @enderror" placeholder="Enter a text layer bottom for your store..." name="textLayer_bottom" rows="3">{{ $store->textLayer_bottom }}</textarea>
                </div>
                @error('textLayer_bottom')
                <div style="color: red; text-align: center; margin-top: 50px;">
                    {{$message}}
                </div>
                @enderror
                <div style="height: 100px;" class="row justify-content-center mt-4">
                    <div><button type="submit" id="submit" name="submit"   class="btn btn-warning"><i class="fas fa-edit"></i>&emsp;&emsp;Edit&emsp;&emsp;</button></div>
                </div>
            </div>
        </div>


    </form>
    <form action="{{ route('add_store_images') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="container">
            <div class="contenus bg-light">
                <div  class="category_info row justify-content-center align-items-center cat_info">Add pictures to your store</div>
                <hr>
                <div  class="row justify-content-center files" style="@error('image_top') border:1px solid red; @enderror">
                    <input type="file" class="bg-light fl" id="image_top" name="image_top" width="1800px">
                </div>
                @error('image_top')
                <div style="color: red; text-align: center; margin-top: 50px;">{{ $message }}</div>
                @enderror
                <div  class="row justify-content-center files mt-5" style="@error('image_bottom') border:1px solid red; @enderror">
                    <input type="file" class="bg-light fl" id="image_bottom" name="image_bottom">
                </div>
                @error('image_bottom')
                <div style="color: red; text-align: center; margin-top: 50px;">{{ $message }}</div>
                @enderror
                <div style="height: 100px;" class="row justify-content-center mt-4">
                    <div><button type="submit" id="submit" name="submit"   class="btn btn-primary">&emsp;&emsp;Save&emsp;&emsp;</button></div>
                </div>

            </div>

        </div>
    </form>






    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script>
        let tab1=["Clothing","Jewelery","Make-up","Food","Electronics"];
        let intruder1 = '{{ $store->storeActivityType }}';
        for(let i =1; i<=tab1.length;i++){
            if(tab1[i-1]==intruder1)
                continue;
            let option= document.createElement("option");
            option.value=tab1[i-1];
            let text=document.createTextNode(tab1[i-1]);
            option.appendChild(text);
            document.getElementById("storeActivityType").appendChild(option);
        }
    </script>
    <script>
        $('#show').html('.MyStore.ma');
        $('#storeName').keyup(function () {
            $('#show').show();
            //  var dev = $(this).val();
            $('#show').html($(this).val()+'.MyStore.ma');
        });
    </script>
    <script>
        $('.file-upload').file_upload();
    </script>
    <script>
        $('document').ready(function () {
            $("#title").html("Settings");
            $(".edit_store").addClass('active');
            $(".store_toggle").addClass('active');
        });
    </script>
@endsection
