@extends('header.style_login')
<!-- FORM of the login. First page -->

@section('loginContent')

<form method="POST" class="login100-form validate-form">
    @csrf
    <span class="login100-form-title p-b-33">
        Sign Up
    </span>

    <!-- PERSONAL INFO for Sign UP -->
    <!-- NAME -->
    <div class="wrap-input100 validate-input">
        <input class="input100" type="text" name="name" id="name" placeholder="name" required>
        <!-- Animation -->
        <span class="focus-input100-1"></span>
        <span class="focus-input100-2"></span>
    </div>

    <!-- PHONE NUMBER -->
    <div class="wrap-input100 validate-input">
        <input class="input100" type="text" name="number" id="phoneNumber" placeholder="phone Number" required>
        <!-- Animation -->
        <span class="focus-input100-1"></span>
        <span class="focus-input100-2"></span>
    </div>

    <!-- EMAIL -->
    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
        <input class="input100" type="text" name="email" id="email" placeholder="Email" required>
        <!-- Animation -->
        <span class="focus-input100-1"></span>
        <span class="focus-input100-2"></span>
    </div>

    <!-- PASSWORD -->
    <div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
        <input class="input100" type="password" name="pass" id="pass" placeholder="Password" required>
        <!-- Animation -->
        <span class="focus-input100-1"></span>
        <span class="focus-input100-2"></span>
    </div>

    <!-- ADDRESS for Sign in -->
    <!-- FULL ADDRESS -->
    <div style="margin-top: 10px;" class="wrap-input100 validate-input">
        <input class="input100" type="text" name="address" placeholder="Address" required>
        <!-- Animation -->
        <span class="focus-input100-1"></span>
        <span class="focus-input100-2"></span>
    </div>

    <!-- CITY -->
    <div class="wrap-input100 validate-input">
        <input class="input100" type="text" name="city" placeholder="City" required>
        <!-- Animation -->
        <span class="focus-input100-1"></span>
        <span class="focus-input100-2"></span>
    </div>

    <!-- ZIP CODE -->
    <div class="wrap-input100 validate-input">
        <input class="input100" type="text" name="zipCode" placeholder="Zip Code" required>
        <!-- Animation -->
        <span class="focus-input100-1"></span>
        <span class="focus-input100-2"></span>
    </div>

    <!-- BUTTON SAVE NEW CUSTOMER -->
    <div class="container-login100-form-btn m-t-20">
        <button type="submit" class="login100-form-btn">
            Sign Up
        </button>
        <a class="btn btn-danger" href="./">Back</a> <!-- --------------------------------------------MARIANA HERE -->
    </div>
</form>
@stop