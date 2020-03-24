@extends('header.style_login')
<!-- FORM of the login. First page -->

@section('loginContent')

<form method="POST" action="login" class="login100-form validate-form">
    @csrf
    <span class="login100-form-title p-b-33">
        Account Login
    </span>

    <div class="wrap-input100 validate-input">
        <input class="input100" type="email" name="email" placeholder="Email" autocomplete="off" required>
        <!-- Animation -->
        <span class="focus-input100-1"></span>
        <span class="focus-input100-2"></span>
    </div>

    <div class="wrap-input100 rs1 validate-input">
        <input class="input100" type="password" name="pass" placeholder="Password" required>
        <!-- Animation -->
        <span class="focus-input100-1"></span>
        <span class="focus-input100-2"></span>
    </div>

    <div class="container-login100-form-btn m-t-20">
        <button type="submit" class="login100-form-btn">
            Sign in
        </button>
    </div>

    <div class="text-center p-t-45 p-b-4">
        <span class="txt1">
            Forgot
        </span>

        <a href="forgotPass" class="txt2 hov1">
            Password?
        </a>
    </div>

    <div class="text-center">
        <span class="txt1">
            Create an account?
        </span>

        <a href="signups" class="txt2 hov1">
            Sign up
        </a>
    </div>
</form>

@stop