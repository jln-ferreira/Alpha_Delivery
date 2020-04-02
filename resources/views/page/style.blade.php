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
            <a class="nav-link " href="#">Contact</a>
          </li>
          @auth
          <li class="nav-item ">
            <a style="color: white;" class="nav-link" href="{{ url('delivery') }}">Delivery</a>
          </li>
          @endauth
        </ul>
      </div>

      <!-- login link --> 
      <ul class="navbar-nav">
        <li class="nav-item">
          
          <!-- IF THERE IS SOMEONE LOGGED: -->
          @auth
          <!-- Button trigger modal -->
          @include('page.model.model')

          @else
            <a href="account" type="button" class="btn btn-primary">
              Login <!-- <span class="badge badge-light">9</span> -->
            </a>
          @endauth

        </li>
      </ul>
    </nav>
</header>
<!-- -------------------------------------[END NAV BAR]----------------------------------- -->
<!-- ===================================================================================== -->

<body>
    <!-- ===================================================================================== -->
    <!-- ------------------------------------[FIRST CONTENT]---------------------------------- -->
    <div id="First_Content" class="container-flex">
                
        @yield('First_Content')

    </div>
       
</body>

    <!-- INCLUDE toastr [is the message box] -->
    @include('tools.toastr')

</html>
<style type="text/css">
  