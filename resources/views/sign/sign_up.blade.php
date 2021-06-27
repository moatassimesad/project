<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sign up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="wrapper" style="background-image: url('images/bg-registration-form-1.jpg');">
    <div class="inner">
        <div class="image-holder">
            <img src="images/sign_up_image.png" alt="uiwyr">
        </div>
        <form action="{{ route('sign_up') }}" method="post">
            @csrf
            <h3>Sign up </h3> <span>Already have an account <a href="/sign_in">Sign in</a> !</span><br><br>
            <div class="form-group">
                <input type="text" style="@error('firstName') border-bottom: 1px solid red; @enderror" id="firstName" name="firstName" placeholder="First Name" value="{{ old('firstName') }}" class="form-control">
                <input type="text" style="@error('lastName') border-bottom: 1px solid red; @enderror" placeholder="Last Name" class="form-control" id="lastName" name="lastName" value="{{ old('lastName') }}">

            </div>
            @error('firstName')
            <div style="text-align: center; color: red">{{ $message }}</div>
            @enderror
            @error('lastName')
            <div style="text-align: center; color: red">{{ $message }}</div>
            @enderror
            <div class="form-wrapper">
                <input type="text" style="@error('phone') border-bottom: 1px solid red; @enderror" class="form-control" name="phone" id="phone" placeholder="+212 x xx xx xx xx" value="{{ old('phone') }}">
                <i class="zmdi zmdi-phone"></i>
            </div>
            @error('phone')
            <div style="text-align: center; color: red">{{ $message }}</div>
            @enderror
            <div class="form-wrapper">
                <input type="text" style="@error('email') border-bottom: 1px solid red; @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Email Address" class="form-control">
                <i class="zmdi zmdi-email"></i>
            </div>
            @error('email')
            <div style="text-align: center; color: red">{{ $message }}</div>
            @enderror
            <div class="form-wrapper">
                <select id="city" style="@error('city') border-bottom: 1px solid red; @enderror" name="city" required class="form-control">
                    <option value="0" selected>City</option>
                </select>
                <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
            </div>
            @error('city')
            <div style="text-align: center; color: red">{{ $message }}</div>
            @enderror
            <div class="form-wrapper">
                <input type="password" style="@error('password') border-bottom: 1px solid red; @enderror" name="password" id="password" placeholder="Password" class="form-control">
                <i class="zmdi zmdi-lock"></i>
            </div>
            <div class="form-wrapper">
                <input type="password" style="@error('password') border-bottom: 1px solid red; @enderror" id="password_confirmation" name="password_confirmation" placeholder="Re-Password" class="form-control">
                <i class="zmdi zmdi-lock"></i>
            </div>
            @error('password')
            <div style="text-align: center; color: red">{{ $message }}</div>
            @enderror
            <button>Register
                <i class="zmdi zmdi-arrow-right"></i>
            </button>
        </form>
    </div>
</div>

</body>
<script>
    let tab=["Marrakech","Casablanca","Agadir","Tanger","Fes","Rabat","Laayoune","Ifrane","Kenitra"];
    for(let i =1; i<=tab.length;i++){
        let option= document.createElement("option");
        option.value=tab[i-1];
        let text=document.createTextNode(tab[i-1]);
        option.appendChild(text);
        document.getElementById("city").appendChild(option);
    }
</script>
</html>
