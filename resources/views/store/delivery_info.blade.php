@extends('layouts.store_admin')
@section('content1')
    @if($delivery->store->id ?? ''==auth()->user()->store->id ?? '')
    <form action="{{ route('edit_delivery') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$id}}">
        <div class="container">
            <div class="contenus bg-light">
                <div  class="category_info row justify-content-center align-items-center cat_info">Change delivery info</div>
                <hr>
                <div class="form-group m-5">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" style="@error('name') border:1px solid red; @enderror" placeholder="Untitled product" value="{{$delivery->name}}">
                </div>
                @error('name')
                <div style="color: red; text-align: center;">{{ $message }}</div>
                @enderror
                <div class="form-group m-5">
                    <label for="name">Reference</label>
                    <input type="text" class="form-control" name="reference" style="@error('reference') border:1px solid red; @enderror" placeholder="Reference" value="{{$delivery->reference}}">
                </div>
                @error('reference')
                <div style="color: red; text-align: center;">{{ $message }}</div>
                @enderror
                <div class="form-group m-5">
                    <label for="name">Address</label>
                    <input type="text" class="form-control" name="address" style="@error('address') border:1px solid red; @enderror" placeholder="Address" value="{{$delivery->address}}">
                </div>
                @error('address')
                <div style="color: red; text-align: center;">{{ $message }}</div>
                @enderror
                <div class="form-group m-5">
                    <label for="name">Phone</label>
                    <input type="text" class="form-control" name="phone" style="@error('phone') border:1px solid red; @enderror" placeholder="+212 x xx xx xx xx" value="{{$delivery->phone}}">
                </div>
                @error('phone')
                <div class="error">{{ $message }}</div>
                @enderror
                <div style="height: 100px;" class="row justify-content-center mt-4">
                    <div><a href="/list_delivery" class="bouton btn btn-secondary"><i class=" fas fa-arrow-left"></i></a></div>
                    <div><button type="submit" id="submit" name="submit"   class="btn btn-warning"><i class="fas fa-edit "></i></button></div>
                </div>
            </div>
        </div>

        </div>
    </form>
    @else
        <div class="container">
            <div class="row mt-5 justify-content-center text-muted"><h1 style="margin-top: 100px;">No such delivery to edit</h1></div>
        </div>
    @endif
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>



    <script>
        $('document').ready(function () {
            $("#title").html("Deliveries");
        });
    </script>
@endsection
