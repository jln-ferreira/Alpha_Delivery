<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Alpha Delivery</title>

    <!-- INCLUDE BOOTSTRAP-->
    @include('tools.toolsUsed')

    <!-- INCLUDE CSS (PUBLIC FILE > CSS) -->
    <link rel="stylesheet" href="<?php echo asset('public/css/page.css')?>" type="text/css">

</head>
<body>

    <!-- ===================================================================================== -->
    <!-- -------------------------------------[NAV BAR]--------------------------------------- -->
    <header>
        <nav id="navbar_header" class="fixed-top navbar navbar-expand-lg navbar-dark bg-dark">
          <!-- LOGO -->
          <a class="navbar-brand" href="#">
            <img src="bird.jpg" alt="Logo" style="width:40px;">
          </a>
          <!-- END LOGO -->
          <!-- Toggler/collapsibe Button -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>

          <!-- Navbar links -->
          <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Service</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="#">About</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="#">About</a>
              </li>
            </ul>
          </div>

          <!-- login link --> 
          <ul class="navbar-nav">
            <li class="nav-item">
              
                @yield('Account_Btn')

            </li>
          </ul>
        </nav>
    </header>
    <!-- -------------------------------------[END NAV BAR]----------------------------------- -->
    <!-- ===================================================================================== -->
    
    <!-- ===================================================================================== -->
    <!-- ------------------------------------[FIRST CONTENT]---------------------------------- -->
    <div class="container">
                
        @yield('First_Content')

    </div>
       
</body>

    <!-- INCLUDE toastr and JQUERY -->
    @include('tools.toolsUsedJavascript')

</html>
<style type="text/css">
  