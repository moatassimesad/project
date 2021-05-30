@extends('layouts.shop')
@section('content2')


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');



        .card {
            border: none
        }

        .card-title{
            background: #2E8AD0;
            opacity: 0.7;
        }



        .totals tr td {
            font-size: 13px
        }

        .footer {
            background-color: #eeeeeea8
        }

        .footer span {
            font-size: 12px
        }

        .product-qty span {
            font-size: 12px;
            color: #dedbdb
        }
    </style>

    <div class="container mt-4">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-title">
                        <div class="text-left logo p-2 px-5"><img src="{{ asset('images/logo.png') }}" width="35"></div>
                    </div>
                    <div class="invoice pt-2 px-5 pb-5">
                        <h5>Your order Confirmed!</h5> <span class="font-weight-bold d-block mt-4">Hello, Client Name</span> <span>You order has been confirmed and will be shipped in next two days!</span>
                        <div class="payment border-top mt-3 mb-3 border-bottom table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="py-2"> <span class="d-block text-muted">Order Date</span> <span>12 Jan,2018</span> </div>
                                    </td>
                                    <td>
                                        <div class="py-2"> <span class="d-block text-muted">Order No</span> <span>MT12332345</span> </div>
                                    </td>
                                    <td>
                                        <div class="py-2"> <span class="d-block text-muted">Payment</span> <span><img src="https://img.icons8.com/color/48/000000/mastercard.png" width="20" /></span> </div>
                                    </td>
                                    <td>
                                        <div class="py-2"> <span class="d-block text-muted">Shiping Address</span> <span>414 Advert Avenue, NY,USA</span> </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>



                        <div class="product border-bottom table-responsive">
                            <table class="table table-borderless">
                                <tbody>

{{--                                @foreach()--}}
                                <tr>
                                    <td width="20%"> <img src="https://i.imgur.com/u11K1qd.jpg" width="90"> </td>
                                    <td width="60%"> <span class="font-weight-bold">Product Name</span>
                                        <div class="product-qty"> <span class="d-block">Quantity:1</span> <span>Color:Dark</span> </div>
                                    </td>
                                    <td width="20%">
                                        <div class="text-right"> <span class="font-weight-bold">MAD 67.50</span> </div>
                                    </td>
                                </tr>
{{--                               @endfor--}}
                                </tbody>
                            </table>
                        </div>
                        <div class="row d-flex justify-content-end">
                            <div class="col-md-5">
                                <table class="table table-borderless">
                                    <tbody class="totals">
                                    <tr>
                                        <td>
                                            <div class="text-left"> <span class="text-muted">Subtotal</span> </div>
                                        </td>
                                        <td>
                                            <div class="text-right"> <span>MAD 168.50</span> </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="text-left"> <span class="text-muted">Shipping Fee</span> </div>
                                        </td>
                                        <td>
                                            <div class="text-right"> <span>Free</span> </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="text-left"> <span class="text-muted">Tax Fee</span> </div>
                                        </td>
                                        <td>
                                            <div class="text-right"> <span>MAD 0.00</span> </div>
                                        </td>
                                    </tr>

                                    <tr class="border-top border-bottom">
                                        <td>
                                            <div class="text-left"> <span class="font-weight-bold">Order Total</span> </div>
                                        </td>
                                        <td>
                                            <div class="text-right"> <span class="font-weight-bold">$238.50</span> </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <p>We will be sending shipping confirmation email when the item shipped successfully!</p>
                        <p class="font-weight-bold mb-0">Thank you for shopping with us!</p> <span>Name-Store Team</span>
                    </div>
                    <div class="d-flex justify-content-between footer p-3"> <span>12 June, 2020</span> </div>
                </div>
            </div>
        </div>

        <div class="row d-flex justify-content-center">
            <a href="/shop/{{$store->id}}" ><button type="button" class="btn btn-primary btn-block waves-effect waves-light mt-2">Continue shopping</button></a>
        </div>

    </div>



@endsection
