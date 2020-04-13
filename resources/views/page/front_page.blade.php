@extends('page.style')
<!-- FORM of the page.style  -->

@section('First_Content')

<!-- --------------------FIRST PAGE WRITING------------------ -->
<div id="content_fullHeader">
  <img id="front_img" src="public/img/img_vancouver.jpeg">
  <h1 id="theOne">
    <div class="typewrite" data-period="2000"
     data-type='[ "We are Strategy.", 
                  "We are Comunity.", 
                  "We are ONE." ]'>
      <span class="wrap"></span>
    </div>
  </h1>
</div> 

<!-------------------- EXPLAIN THE PROJECT -------------------->
<!-- ------------------------------------------------------- -->
<div id="service" class="contents">
  <div class="col-lg-12">
    <h2 class="targetHeader"><b>HOW IT WORKS?</b></h2>
  </div>

  <!-- LINE TO DEVIDE -->
  <div class="container">
    <hr>
  </div>


  <div class="content_square">
    <!-- [FIRST SQUERE] -->
    <div class="info_content col-lg-6">
          <p>Alpha Deliveres is a online plataform for TWO TYPES POR PERSON:</p> 
          <ul>
            <li>Needers;</li>
            <li>Buyers;</li>
          </ul>
          <p><b>Needers</b> are a person who are unavailable, for any reason and cannot do your own household groceries;</p>
          <p>
            <b>Buyers</b> are volunteers (non paymment) to help families get their needed delivered straight to their door, with or without tips.
          </p>

          <br>
          
          <small>Follow an easy explanation how to use it:</small>
          <h1>VIDEO HOW IT WORKS</h1>
    </div>
  </div>
</div>
<!-- ------------------------------------------------------- -->


<!------------------------- ABOUT US -------------------------->
<!-- ------------------------------------------------------- -->
<div id="About" class="contents">
  <div class="col-lg-12">
    <h2 class="targetHeader"><b>ABOUT US?</b></h2>
  </div>

  <!-- LINE TO DEVIDE -->
  <div class="container">
    <hr>
  </div>


  <div class="content_square">
    <!-- [FIRST SQUERE] -->
    <div class="info_content col-lg-6">
          <p>Alpha Deliveres is a online plataform for TWO TYPES POR PERSON:</p> 
          <ul>
            <li>Quarentined;</li>
            <li>Buyers;</li>
          </ul>
          <p><b>Quarentined</b> are who in quarentine and cannot do your own household groceries;</p>
          <p><b>Buyers</b> are volunteers to help families get their needed delivered straight to their door.</p>
          <p>Our ability to streamline the grocery buying process while supporting social distancing sets up apart for our competitors</p>  

          <h1>VIDEO HOW IT WORKS</h1>
    </div>
  </div>
</div>


<!-- ------------------------------------------------------- -->

<!------------------------- CONTACT -------------------------->
<!-- ------------------------------------------------------- -->
<div id="contact" class="container contents">
  <div class="col-lg-12">
    <h2  class="targetHeader"><b>CONTACT</b></h2>
  </div>

    <!-- LINE TO DEVIDE -->
  <div class="container">
    <hr>
  </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header bg-primary text-white"><i class="fa fa-envelope"></i> Contact us.
                </div>
                <div class="card-body">
                    <form method="POST" action="contact">
                      @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="Enter name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" name="message" rows="6" required></textarea>
                        </div>
                        <div class="mx-auto">
                        <button type="submit" class="btn btn-primary text-right">Submit</button></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-4">
            <div class="card bg-light mb-3">
                <div class="card-header bg-success text-white text-uppercase"><i class="fa fa-home"></i> Address</div>
                <div class="card-body">
                    <p>North Vancouver</p>
                    <p>Canada</p>
                    <p>Email : grouse.delivery@gmail.com</p>
                </div>
            </div>
        </div>
    </div>
</div>

@stop