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
      <a class="navbar-brand" href="/Alpha_Delivery">
        <img src="<?php echo asset('public/img/logo.png')?>" alt="Logo" style="width:40px;">
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
            <a class="nav-link" href="/Alpha_Delivery">Home</a>
          </li>
          
          @guest
          <li class="nav-item">
            <a class="nav-link" href="#service">Service</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link " href="#About">About</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link " href="#contact">Contact</a>
          </li>
          @endguest

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
    <!-- ---------------------------------------[CONTENT]------------------------------------- -->
    <div id="First_Content" class="container-flex">
                
        @yield('First_Content')

    </div>

  <!-- ===================================================================================== -->
  <!-- ---------------------------------------[CONTENT]------------------------------------- -->
  <footer class="new_footer_area bg_color">
    <div class="new_footer_top">
        <div class="container-flex" style="text-align: center;">
            <div class="row">
                <div class="col-lg-12">
                    <div style="">
                        <h3 class="f-title f_600 t_color f_size_18">Team Solutions</h3>
                        <div class="f_social_icon">
                            <ul style="list-style: none; padding-left: 0px;" class="social-network social-circle">
                             <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                             <li><a href="#" class="icoInstagram" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                             <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_bg">
            <div class="footer_bg_one"></div>
            <div class="footer_bg_two"></div>
        </div>
    </div>
    
  </footer>

</body>


    <!-- INCLUDE toastr [is the message box] -->
    @include('tools.toastr')

</html>
<style type="text/css">
  