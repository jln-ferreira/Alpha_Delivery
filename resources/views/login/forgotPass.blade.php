@extends('login.style_login')
<!-- FORM of the login. First page -->

@section('loginContent')

<form method="POST" action="forgotPass/send" class="login100-form validate-form">
    @csrf
    <span class="login100-form-title p-b-33">
        Forgot Password
    </span>

    <!-- PERSONAL INFO for Sign UP -->
    <!-- NAME -->
    <div class="wrap-input100 validate-input">
        <input class="input100" type="email" name="email" id="email" placeholder="Email" required>
        <!-- Animation -->
        <span class="focus-input100-1"></span>
        <span class="focus-input100-2"></span>
    </div>

    <!-- BUTTON SAVE NEW CUSTOMER -->
    <div class="container-login100-form-btn m-t-20">
        <button type="submit" class="login100-form-btn">
            Send my Password
        </button>
        <a class="btn btn-danger" href="account">Back</a> <!-- --------------------------------------------MARIANA HERE -->
    </div>
</form>
@stop