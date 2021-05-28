@extends('layouts.shop')


@section('content2')
<style>
    .clr{
        color: #000000;
    }
</style>

<div class="container">
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
                                    <input type="text" id="firstName" class="form-control mb-0 mb-lg-2">

                                </div>

                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-lg-6">

                                <!-- Last name -->
                                <div class="clr md-form md-outline">
                                    <label for="lastName">Last name</label>
                                    <input type="text" id="lastName" class="form-control">

                                </div>

                            </div>
                            <!-- Grid column -->

                        </div>
                        <!-- Grid row -->




                        <!-- Address Part 1 -->
                        <div class="clr md-form md-outline mb-lg-2">
                            <label for="form1">Address</label>
                            <input type="text" id="form14" placeholder="House number and street name" class="form-control">

                        </div>

                        <!-- Address Part 2 -->
                        <div class=" clr md-form md-outline mb-lg-2">
                            <label for="form2">Address</label>
                            <input type="text" id="form15" placeholder="Apartment, suite, unit etc. (optional)"
                                   class="form-control">

                        </div>

                        <!-- Postcode / ZIP -->
                        <div class="clr md-form md-outline mb-lg-2">
                            <label for="form3">Postcode / ZIP</label>
                            <input type="text" id="form16" class="form-control">

                        </div>

                        <!-- Town / City -->
                        <div class="clr md-form md-outline mb-lg-2">
                            <label for="form4">Town / City</label>
                            <input type="text" id="form17" class="form-control">

                        </div>

                        <!-- Phone -->
                        <div class="clr md-form md-outline mb-lg-2">
                            <label for="form5">Phone</label>
                            <input type="number" id="form18" class="form-control">

                        </div>

                        <!-- Email address -->
                        <div class="clr md-form md-outline">
                            <label for="form6">Email address</label>
                            <input type="email" id="form19" class="form-control">

                        </div>

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
                                    <span>MAD {{$cart->totalPrice}}</span>
                                @else
                                    <span>MAD 0</span>
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
                                    <span><strong>MAD {{$cart->totalPrice}}</strong></span>
                                @else
                                    <span><strong>MAD 0</strong></span>
                                @endif
                            </li>
                        </ul>

                        <button type="button" class="btn btn-primary btn-block waves-effect waves-light">Make purchase</button>

                    </div>
                </div>
                <!-- Card -->



            </div>
            <!--Grid column-->

        </div>
        <!--Grid row-->

    </section>
</div>

<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>

<script>
    $("#shoplink").css("border-bottom","2px solid #2E8AD0");
</script>


@endsection
