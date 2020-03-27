@extends('page.style')
<!-- FORM of the page.style  -->

<!-- ---------------------------------------------------------- -->
<!------------------------ [LOGIN BUTTON] ------------------------>
@section('Account_Btn')

<a href="account" type="button" class="btn btn-primary">
  Login <!-- <span class="badge badge-light">9</span> -->
</a>

@stop 
<!---------------------- END LOGIN BUTTON ---------------------->




@section('First_Content')

<!-- --------------------FIRST PAGE WRITING------------------ -->
<div class="row">
    <div class="col-lg-12">
      <h1 id="theOne">
        <div class="typewrite" data-period="2000"
         data-type='[ "We are Strategy.", 
                      "We are Comunity.", 
                      "We are ONE." ]'>
          <span class="wrap"></span>
        </div>
      </h1>
    </div> 
  </div>

<!-------------------- EXPLAIN THE PROJECT -------------------->
<!-- ------------------------------------------------------- -->
<div class="col-lg-12">
  <h2 id="targetHeader"><b>HOW IT WORKS?</b></h2>
</div>


<div class="container">
  <hr>
</div>


<div class="row">
  <!-- SPACE -->
  <div class="col-lg-4"></div>
  <!-- [FIRST SQUERE] -->
  <div class="col-lg-4 border rounded">
        <p>Alpha Deliveres is a online plataform for VOLUNTIERS and  to help families get their needed household groceries delivered straight to their door. We only suport fresh & local products!</p>
        <p>Our ability to streamline the grocery buying process while supporting social distancing sets up apart for our competitors</p>  
  </div>
</div>
<!-- ------------------------------------------------------- -->


<!------------------------- ABOUT US -------------------------->
<!-- ------------------------------------------------------- -->












<!-- ------------------------------------------------------- -->

@stop