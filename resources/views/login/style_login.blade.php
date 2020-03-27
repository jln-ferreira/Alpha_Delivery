<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Alpha Delivery</title>

    <!-- INCLUDE BOOTSTRAP-->
    @include('tools.toolsUsed')

    <!-- INCLUDE CSS (PUBLIC FILE > CSS) -->
    <link rel="stylesheet" href="<?php echo asset('public/css/login.css')?>" type="text/css">

</head>
<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
                
                @section('loginContent')
                @show

            </div>
        </div>
    </div>
       
</body>

    <!-- INCLUDE toastr and JQUERY -->
    @include('tools.toastr')

</html>