@extends('layouts.store_admin')
@section('content1')
    <head>
        <link rel="stylesheet" href="css/list_delivery.css">
    </head>
<div class="container contient">
    <div class="row justify-content-between">
        <div class="delivery">Deliveries {{ $deliveries->count() }}</div>
        <div><a class="btn btn-primary add" href="/add_delivery">+ Add delivery</a></div>
    </div>
    <br><br>
    <table id="searching" class="table table-striped table-sm table-borderless">
        <thead>
        <tr class="table-info">
            <th scope="col">NAME</th>
            <th scope="col">REFERENCE</th>
            <th scope="col">ADDRESS</th>
            <th scope="col">PHONE</th>
            <th scope="col">ACTIONS</th>
        </tr>
        </thead>
        <tbody>
        @foreach($deliveries as $element)
        <tr>
            <input type="hidden" class="delivery_id" value="{{ $element->id }}">
            <th scope="row">{{$element->name}}</th>
            <td>{{$element->reference}}</td>
            <td>{{$element->address}}</td>
            <td>{{$element->phone}}</td>
            <td>
                <span><a href="/delivery_info/{{$element->id}}" class="btn btn-warning mr-2"><i class="fas fa-edit"></i></a></span>
                <span><button type="button" class="show_alert btn btn-danger mr-2"><i class="fas fa-trash"></i></button></span>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>



    <script>
        $('document').ready(function () {
            $("#title").html("Deliveries");
            $(".deliveries").addClass('active');
        });
    </script>
    <script>
        $('document').ready(function () {
            $(".show_alert").on('click',function (e){
                e.preventDefault();
                var delivery_id = $(this).closest("tr").find('.delivery_id').val();
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this delivery with every order delivered by it!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {

                            window.location.href = "/delete_delivery/"+delivery_id;
                            swal("Poof! Delivery has been deleted!", {
                                icon: "success",
                            });
                        } else {
                            swal("Deleting canceled!");
                        }
                    });
            });
        });
    </script>
@endsection
