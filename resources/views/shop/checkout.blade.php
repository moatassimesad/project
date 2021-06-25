@extends('layouts.shop')


@section('content2')

    <head>
        <link rel="stylesheet"   href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>

        <link rel="stylesheet" href="css/intlTelInput.css">
    </head>

<style>
    .clr{
        color: #000000;
    }
    .error{
        text-align: center;
        color: red;
    }
</style>

<div class="container">
    @if(session('status'))
        <div class="success alert alert-danger" role="alert">{{ session('status') }}</div>

    @endif
    <form action="{{ route('pay') }}" method="post">
        @csrf
    <section>

        <!--Grid row-->
        <div class="row mt-4">

            <!--Grid column-->
            <div class="col-lg-8 mb-4">

                <!-- Card -->
                <div class="card wish-list pb-1">
                    <div class="card-body">

                        <h5 class=" clr mb-2">Billing details</h5>

                        <!-- Grid row -->
                        <div class="row">

                            <!-- Grid column -->
                            <div class="col-lg-6">

                                <!-- First name -->
                                <div class="clr md-form md-outline mb-0 mb-lg-2">
                                    <label for="firstName">First name</label>
                                    <input type="text" style="@error('firstName') border:solid 1px red; @enderror" id="firstName" name="firstName" value="{{old('firstName')}}" class="form-control mb-0 mb-lg-2">
                                    <input type="hidden"  name="store_id" value="{{$store->id}}">

                                </div>

                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-lg-6">

                                <!-- Last name -->
                                <div class="clr md-form md-outline">
                                    <label for="lastName">Last name</label>
                                    <input type="text" name="lastName" style="@error('lastName') border:solid 1px red; @enderror" value="{{old('lastName')}}" id="lastName" class="form-control">

                                </div>

                            </div>
                            <!-- Grid column -->

                        </div>
                        <!-- Grid row -->
                        @error('firstName')
                        <div class="error">{{ $message }}</div>
                        @enderror

                        @error('lastName')
                        <div class="error">{{ $message }}</div>
                        @enderror



                        <!-- Address -->
                        <div class="clr md-form md-outline mb-lg-2">
                            <label for="form1">Address</label>
                            <input type="text"  style="@error('address') border:solid 1px red; @enderror" id="form14" name="address" value="{{old('address')}}" placeholder="House number and street name" class="form-control">

                        </div>
                        @error('address')
                        <div class="error">{{ $message }}</div>
                        @enderror


                        <!-- Postcode / ZIP -->
                        <div class="clr md-form md-outline mb-lg-2">
                            <label for="form3">Post code / ZIP</label>
                            <input type="text" style="@error('postCode') border:solid 1px red; @enderror" name="postCode" value="{{old('postCode')}}" id="form16" class="form-control">

                        </div>
                        @error('postCode')
                        <div class="error">{{ $message }}</div>
                    @enderror

                        <!-- Town / City -->
                        <div class="clr md-form md-outline mb-lg-2">
                            <label for="form4">Town / City</label>
                            <input type="text" style="@error('city') border:solid 1px red; @enderror" name="city" value="{{old('city')}}" id="form17" class="form-control">

                        </div>
                        @error('city')
                        <div class="error">{{ $message }}</div>
                    @enderror

                        <!-- Phone -->
                        <div class="clr md-form md-outline mb-lg-2">
                            <label for="form5">Phone</label>
                            <input  type="tel"  style="@error('phone') border:solid 1px red; @enderror" id="phoneNo" name="phone" value="{{old('phone')}}" class="form-control">

                        </div>
                        @error('phone')
                        <div class="error">{{ $message }}</div>
                        @enderror




                        <!-- Email address -->
                        <div class="clr md-form md-outline">
                            <label for="form6">Email address</label>
                            <input type="email" style="@error('email') border:solid 1px red; @enderror" id="form19" name="email" value="{{old('email')}}" class="form-control">

                        </div>
                        @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror

                        <!-- Additional information -->

                    </div>
                </div>
                <!-- Card -->

            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-4">

                <!-- Card -->
                <div class="card mb-4">
                    <div class=" clr card-body">

                        <h5 class="mb-3">The total amount of</h5>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                Subtotal
                                @if($cart)
                                    <span>$ {{$cart->totalPrice}}</span>
                                @else
                                    <span>$ 0</span>
                                @endif
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                Shipping
                                <span><strong>Free</strong></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                <div>
                                    <strong>Total</strong>
                                    <strong>
                                        <p class="mb-0">(including VAT)</p>
                                    </strong>
                                </div>
                                @if($cart)
                                    <span><strong>$ {{$cart->totalPrice}}</strong></span>
                                @else
                                    <span><strong>$ 0</strong></span>
                                @endif
                            </li>
                        </ul>

                       <button type="submit" name="cash" value="cash" class="btn btn-primary btn-block waves-effect waves-light mb-1 @if($cart == null) disabled @endif">Cash on delivery</button>
                        @if($store->client_id != "")
                        <button type="submit" name="paypal" value="paypal" style="border: none; outline: none; background: none;" href="/pay_with_paypal/{{ $store->id }}"><img src="https://miro.medium.com/max/624/1*MqdZnOy5ySk8PIUbUtt5Cg.png" height="70"></button>

                        @endif

                    </div>
                </div>
                <!-- Card -->



            </div>
            <!--Grid column-->

        </div>
        <!--Grid row-->

    </section>
    </form>
</div>

<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>

{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
{{--    <script src="js/intlTelInput.js"></script>--}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>


    <script>
    $("#shoplink").css("border-bottom","2px solid #2E8AD0");


</script>

<script>
    const phoneInputField = document.querySelector("#phoneNo");
    const phoneInput = window.intlTelInput(phoneInputField, {
        utilsScript:
            "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });
</script>


@endsection
