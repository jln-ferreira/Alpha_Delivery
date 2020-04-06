<head>
	<!-- BOOTSTRAP -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<!-- ---------------- -->
</head>
<body>

	<!-- HEADER -->
	<div class="container">
		<div class="col-lg-3"></div>
		<div class="card col-lg-5">
		    <div class="card-body">
		    	<h3 style="text-align: -webkit-center;">Hello {{$name_owner}}!</h3>
		    	<h4 style="text-align: -webkit-center;">We have a good news for you!</h4>
		    	<p>{{$name_user}} choose your Card and he wants to help! UHUl!</p>
		    </div>
		</div>
	</div>


	<!-- INFO -->
	<div class="modal-dialog" role="document">
	<div class="modal-content">
	  <div class="modal-header">
	    <h3 class="modal-title" id="itens_Label">INFOMATION</h3>
	  </div>
	  <div class="modal-body">
	    
	  <!------------------------------ INSIDE MODAL ----------------------------->
	    <!-- PERSONAL INFORMATION -->
	    <table id="allcard_itens_DT" class="table table-striped table-bordered">
	      <thead>
	        <tr>
	          <th>Name</th>
	          <th>Phone Number</th>
	          <th>Email</th>
	        </tr>
	      </thead>
	      <tbody>
	        <tr>
	          <td>{{$name_user}}</td>
	          <td>{{$phoneNumber_user}}</td>
	          <td>{{$email_user}}</td>
	        </tr>
	      </tbody>
	    </table>
	  </div>
	</div>
	</div>
</body>