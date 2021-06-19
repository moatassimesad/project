@extends('layouts.store_admin')

@section('content1')

    <head>
        <link rel="stylesheet" href="css/list_customer.css">
    </head>
    <div class="container contient">
        @if(session('status'))
            <div class="success alert alert-danger" role="alert">{{ session('status') }}</div>

        @endif
        <div class="row justify-content-between">
            <div class="client">Customers {{ $clients->count() }}</div>
        </div>
        <br><br>
        <table id="searching" class="table table-striped table-sm table-borderless">
            <thead>
            <tr class="table-info">
                <th scope="col">FULL NAME</th>
                <th scope="col">EMAIL</th>
                <th scope="col">ADDRESS</th>
                <th scope="col">PHONE</th>
                <th scope="col">TOTAL ORDERS</th>
                <th scope="col">JOINED AT</th>
                <th scope="col">ACTION</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clients as $element)
                <tr>
                    <input type="hidden" class="customer_id" value="{{ $element->id }}">
                    <th scope="row">{{$element->lastName}} {{$element->firstName}}</th>
                    <td>{{$element->email}}</td>
                    <td>{{$element->address}}</td>
                    <td>{{$element->phone}}</td>
                    <td>{{$element->orders->count()}}</td>
                    <td>{{$element->created_at}}</td>
                    <td>
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
            $("#title").html("Customers");
            $(".customers").addClass('active');
        });
    </script>
    <script>
        $('document').ready(function () {
            $(".show_alert").on('click',function (e){
                e.preventDefault();
                var customer_id = $(this).closest("tr").find('.customer_id').val();
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this customer with all its orders!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {

                            window.location.href = "/delete_customer/"+customer_id;
                            swal("Poof! Customer has been deleted!", {
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
