<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="images/logo.png" sizes="32x32" type="image/png">
    <title>Sign in</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>
<body>
<form action="{{route('sign_in')}}" method="post">
    @csrf
    <div class="limiter">
        <div class="container-login100" style="background: linear-gradient(60deg, #26c6da, #54ad58);">
            <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
                <form class="login100-form validate-form flex-sb flex-w">
					<span class="login100-form-title p-b-53">
						Sign In
					</span>
                    @if(session('status'))
                        <div class="alert alert-danger status" role="alert">{{ session('status') }}</div>

                    @endif
                    <form action=""></form>
                    <div class="p-t-31 p-b-9">
						<span class="txt1">
							Email
						</span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Username is required">
                        <input class="input100" style=" @error('email') border:solid 1px red; @enderror" name="email" type="text" placeholder="Email" value="{{old('email')}}" >
                        <span class="focus-input100"></span>
                    </div>
                    @error('email')
                    <div style="color: red; text-align: center;">{{ $message }}</div>
                    @enderror

                    <div class="p-t-13 p-b-9">
						<span class="txt1">
							Password
						</span>

                        <a href="#" class="txt2 bo1 m-l-5">
                            Forgot?
                        </a>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <input class="input100" style="@error('password') border:solid 1px red; @enderror" name="password" type="password" placeholder="Password" >
                        <span class="focus-input100"></span>
                    </div>
                    @error('password')
                    <div style="color: red; text-align: center;">{{ $message }}</div>
                    @enderror

                    <div class="container-login100-form-btn m-t-17">
                        <button class="login100-form-btn" style="font-family: Monaco, Times, serif" type="submit">
                            Sign In
                        </button>
                    </div>
                </form>

                <div class="w-full text-center p-t-55">
						<span class="txt2">
							Not a member?
						</span>

                    <a href="/sign_up" class="">
                        Sign up now
                    </a>
                </div>
</form>
</div>
</div>
</div>


<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>
</html>
