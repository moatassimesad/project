<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MyStore</title>
    <meta name="description" content="Home">
    <link rel="icon" href="images/logo.png" sizes="32x32" type="image/png">
    <!-- custom.css -->
    <link rel="stylesheet" href="css/custom.css">
    <!-- bootstrap.min.css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



    <!-- AOS -->
    <link rel="stylesheet" href="css/aos.css">
</head>

<body>
<!-- banner -->
<div class="jumbotron jumbotron-fluid" id="banner" style="background-image: url(images/banner-bk.jpg);">
    <div class="container text-center text-md-left">
        <header>
            @if(session('status'))
                <div class="alert alert-success">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    <strong>{{ session('status') }}</strong>
                </div>
            @endif
            <div class="row justify-content-between">
                <div class="col-2">
                    <img src="images/logo.png" alt="logo">
                </div>
                <div class="col-6 align-self-center text-right">
                    <a href="/sign_in" class="text-white lead">Already have an account ?</a>
                </div>
            </div>
        </header>
        <h1 data-aos="fade" data-aos-easing="linear" data-aos-duration="3000" data-aos-once="true" class="display-3 text-white font-weight-bold my-5">
            A New Way<br>
            To Start Business
        </h1>
        <p data-aos="fade" data-aos-easing="linear" data-aos-duration="3000" data-aos-once="true" class="lead text-white my-4">
            Create your own store in few minutes!
            <br><br> You can also choose between many designs to style your site. 👽
        </p>
        <a href="/sign_up" data-aos="fade" data-aos-easing="linear" data-aos-duration="1000" data-aos-once="true" class="btn my-4 font-weight-bold atlas-cta cta-green">Get Started</a>
    </div>
</div>
<!-- three-blcok -->
<div class="container my-5 py-2">
    <h2 class="text-center font-weight-bold my-5">Smartest protection for your site</h2>
    <div class="row">
        <div data-aos="fade-up" data-aos-delay="0" data-aos-duration="1000" data-aos-once="true" class="col-md-4 text-center">
            <img src="images/smart-protect-1.jpg" alt="Anti-spam" class="mx-auto">
            <h4>Anti-spam</h4>
            <p>--</p>
        </div>
        <div data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000" data-aos-once="true" class="col-md-4 text-center">
            <img src="images/smart-protect-2.jpg" alt="Phishing Detect" class="mx-auto">
            <h4>Phishing Detect</h4>
            <p>--</p>
        </div>
        <div data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000" data-aos-once="true" class="col-md-4 text-center">
            <img src="images/smart-protect-3.jpg" alt="Smart Scan" class="mx-auto">
            <h4>Smart Scan</h4>
            <p>--</p>
        </div>
    </div>
</div>
<!-- feature (skew background) -->
<div class="jumbotron jumbotron-fluid feature" id="feature-first">
    <div class="container my-5">
        <div class="row justify-content-between text-center text-md-left">
            <div data-aos="fade-right" data-aos-duration="1000" data-aos-once="true" class="col-md-6">
                <h2 class="font-weight-bold">Take a look inside</h2>
                <p class="my-4">A great dashbord for you with many features,
                    <br> to manage your store and to trace the evolution of your orders.</p>
                <a href="#" class="btn my-4 font-weight-bold atlas-cta cta-blue">Learn More</a>
            </div>
            <div data-aos="fade-left" data-aos-duration="1000" data-aos-once="true" class="col-md-6 align-self-center">
                <img src="images/feature-1.png" alt="Take a look inside" class="mx-auto d-block">
            </div>
        </div>
    </div>
</div>
<!-- feature (green background) -->
<div class="jumbotron jumbotron-fluid feature" id="feature-last">
    <div class="container">
        <div class="row justify-content-between text-center text-md-left">
            <div data-aos="fade-left" data-aos-duration="1000" data-aos-once="true" class="col-md-6 flex-md-last">
                <h2 class="font-weight-bold">Beautiful themes
                    that are responsive
                    and customizable</h2>
                <p class="my-4">
                    No design skills needed. You have complete
                    <br>
                    control over the look and feel of your website,
                    <br>
                    from its layout, to content and colors.
                </p>
                <a href="#" class="btn my-4 font-weight-bold atlas-cta cta-blue">Learn More</a>
            </div>
            <div data-aos="fade-right" data-aos-duration="1000" data-aos-once="true" class="col-md-6 align-self-center flex-md-first">
                <img src="images/feature-2.png" alt="Safe and reliable" class="mx-auto d-block">
            </div>
        </div>
    </div>
</div>

<!-- price table -->
{{--<div class="container my-5 py-2" id="price-table">
    <h2 class="text-center font-weight-bold d-block mb-3">Check our pricing</h2>
    <div class="row">
        <div data-aos="fade-right" data-aos-delay="200" data-aos-duration="1000" data-aos-once="true" class="col-md-4 text-center py-4 mt-5">
            <h4 class="my-4">STARTUP</h4>
            <p class="font-weight-bold">$ <span class="display-2 font-weight-bold">0</span> / MO.</p>
            <ul class="list-unstyled">
                <li>Up to 5 Documents</li>
                <li>Up to 3 Reviews</li>
                <li>5 team Members</li>
                <li>Limited Support</li>
            </ul>
            <a href="#" class="btn my-4 font-weight-bold atlas-cta cta-ghost">Get Free</a>
        </div>
        <div data-aos="fade-up" data-aos-duration="1000" data-aos-once="true" class="col-md-4 text-center py-4 mt-5 rounded" id="price-table__premium">
            <h4 class="my-4">PREMIUM</h4>
            <p class="font-weight-bold">$ <span class="display-2 font-weight-bold">10</span> / MO.</p>
            <ul class="list-unstyled">
                <li>Up to 15 Documents</li>
                <li>Up to 10 Reviews</li>
                <li>25 team Members</li>
                <li>Limited Support</li>
            </ul>
            <a href="#" class="btn my-4 font-weight-bold atlas-cta cta-green">Get Free</a>
        </div>
        <div data-aos="fade-left" data-aos-delay="200" data-aos-duration="1000" data-aos-once="true" class="col-md-4 text-center py-4 mt-5">
            <h4 class="my-4">PROFESSIONAL</h4>
            <p class="font-weight-bold">$ <span class="display-2 font-weight-bold">30</span> / MO.</p>
            <ul class="list-unstyled">
                <li>Unlimited Documents</li>
                <li>Unlimited Reviews</li>
                <li>Unlimited Members</li>
                <li>Unlimited Support</li>
            </ul>
            <a href="#" class="btn my-4 font-weight-bold atlas-cta cta-ghost">Get Free</a>
        </div>
    </div>
</div>
<!-- client -->
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-md-2 py-2 align-self-center">
                <img src="images/client-1.png" class="mx-auto d-block">
            </div>
            <div class="col-sm-4 col-md-2 py-2 align-self-center">
                <img src="images/client-2.png" class="mx-auto d-block">
            </div>
            <div class="col-sm-4 col-md-2 py-2 align-self-center">
                <img src="images/client-3.png" class="mx-auto d-block">
            </div>
            <div class="col-sm-4 col-md-2 py-2 align-self-center">
                <img src="images/client-4.png" class="mx-auto d-block">
            </div>
            <div class="col-sm-4 col-md-2 py-2 align-self-center">
                <img src="images/client-5.png" class="mx-auto d-block">
            </div>
            <div class="col-sm-4 col-md-2 py-2 align-self-center">
                <img src="images/client-6.png" class="mx-auto d-block">
            </div>
        </div>
    </div>
</div>--}}
<!-- contact -->
<div class="jumbotron jumbotron-fluid mt-5" id="contact" style="background-image: url(images/contact-bk.jpg);">
    <div class="container my-5">
        <div class="row justify-content-between">
            <div class="col-md-6 text-white">
                <h2 class="font-weight-bold">Contact Us</h2>
                <p class="my-4">

                    <br>
                </p>
                <ul class="list-unstyled">
                    <li>Email : saadounmtsm@gmail.com</li>
                    <li>Phone : +212 6 71 79 94 21</li>
                    <li>Address : 112 Boulevard Abdelkrim Al Khattabi, Marrakech 40000.</li>
                </ul>
            </div>
            <div class="col-md-6">
                <form action="{{ route('feedback') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">Your Name</label>
                            <input type="name" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Email">Your Email</label>
                            <input type="email" class="form-control" id="Email" name="email">
                        </div>
                    </div>
                    @error('email')
                    <div class="error">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="message" rows="3" name="message"></textarea>
                    </div>
                    @error('message')
                    <div class="error">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="btn font-weight-bold atlas-cta atlas-cta-wide cta-green my-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- copyright -->
<div class="jumbotron jumbotron-fluid" id="copyright">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-6 text-white align-self-center text-center text-md-left my-2">
                Copyright © 2021 All rights reserved.
            </div>
            <div class="col-md-6 align-self-center text-center text-md-right my-2" id="social-media">
                <a href="https://www.facebook.com/saad.moatassime" target="_blank" class="d-inline-block text-center ml-2">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="https://twitter.com/saadmotsm" target="_blank" class="d-inline-block text-center ml-2">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="https://www.linkedin.com/in/saad-moatassime-688853188?fbclid=IwAR0vfUelcjIKxNq53CvwKRPMUv-F0uhYzgus370D_eY4WLl1pVMo_I9BjGk" target="_blank" class="d-inline-block text-center ml-2">
                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- AOS -->
<script src="js/aos.js"></script>
<script>
    AOS.init({
    });
</script>
</body>

</html>
