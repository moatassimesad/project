@extends('layouts.store_admin')
@section('content1')

    <head>
        <style>
            .images{
                border-radius: 10px;
                height: 7vw;
                width: 7vw;
            }
            .cssTable td{
                vertical-align: middle;
            }
            .add{
                font-family: "PT Mono";
                font-size: large;
                margin-right: 20px;
            }
            .delivery{
                margin-left: 20px;
                font-size: large;
                font-family: "PT Mono";
                color: dimgrey;
            }
            .contient{
                margin-top: 100px;
            }
            select{
                background: none;
            }
            .success{
                text-align: center;
            }
        </style>
    </head>
    <div class="container contient">
        @if(session('status'))
            <div class="success alert alert-success" role="alert">{{ session('status') }}</div>

        @endif
            @if(session('status1'))
            <div class="success alert alert-danger" role="alert">{{ session('status1') }}</div>

        @endif
        <div class="row justify-content-between">
            <div class="delivery">Orders {{ $orders->count() }}</div>

        </div>
        <br><br>
        <table class="table table-sm cssTable">
            <thead>
            <tr class="table-info">
                <th scope="col">NUMBER</th>
                <th scope="col">STATUS</th>
                <th scope="col">PAYED TOTAL</th>
                <th scope="col">DATE</th>
                <th scope="col">ACTION</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>
                        <form action="{{ route('edit_order') }}" method="post" name="myFormName{{$order->id}}">
                            @csrf
                            <input type="hidden" name="order_id" value="{{$order->id}}">
                        <select name="status" id="status{{$order->id}}">
                            <option value="{{$order->status}}" selected disabled>{{$order->status}}</option>
                            @foreach($status as $item)
                                @continue($item == $order->status)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select>
                        </form>
                    </td>
                    <td>{{ $order->payedTotal }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>
                        <span><a href="/order_products_info/{{$order->id}}" class=" mr-2"><i class="fas fa-eye"></i></a></span>
                        <span><a href="/delete_order/{{$order->id}}" class=" mr-2"><i class="fas fa-trash"></i></a></span>
                    </td>
                </tr>

            @endforeach

            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>



    <script>
        $('document').ready(function () {
            $("#title").html("Orders");
        });
    </script>
    @foreach($orders as $order)
        <script>
            $(document).ready(function() {
                $('#status{{$order->id}}').on('change', function() {
                    document.forms['myFormName{{$order->id}}'].submit();
                });
            });
        </script>
    @endforeach

@endsection
