<head>
	<meta charset="UTF-8">

	<!-- BOOTSTRAP -->
	<style>
		#header{
		    text-align: center;
		}
		
		#info{
			text-align: center;
    		color: #1E90FF;
		}
		
		#content{
			width: 50%;
		    text-align-last: center;
		    box-shadow: 5px 10px 18px #888888;
		    border-radius: 9px;
		    padding-top: 10px;
		}
		
		#body_full{
			margin-top: 40px;
			text-align: -webkit-center;
		}


		table {
		  border-collapse: collapse;
		  width: 100%;
		}

		th, td {
		  padding: 8px;
		  text-align: left;
		  border-bottom: 1px solid #ddd;
		}

		tr:hover {background-color:#f5f5f5;}

		.button{
			border: none;
			color: white;
			width: 80px;
    		height: 37px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: 4px 2px;
			cursor: pointer;
			border-radius: 10px;
		}
		.button:hover {
			box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
		}
		#Button_delivery{
			background-color: #4CAF50; /* Green */
		}
		#Button_giveUp{
			background-color: #f44336;/* red */
		}
	</style>
	<!-- ---------------- -->

	<title>Document</title>
</head>
<body>

	<!-- HEADER -->
	<div style="text-align: -webkit-center;" id="content_header">
	    <div style="width: 50%;" id="header">
	    	<h3>Hello {{$name_user}}!</h3>
	    	<h4>Thank you to help the comunity!</h4>
	    	<p>
	    		Your choose a card of Mariana Dias Vilela<br>
	    		We shared your name and phone number with {{$name_owner}} to this arrangement become easier; <br>
	    		Hope this experience of helping other peopple will be beautiful.
	    	</p>
	    	<small>The dedline is: {{$card_deadline}}</small>




			<div id="personal_info" style="text-align: -webkit-center;">
				<table style="width: 65%;">
			      <thead>
			        <tr>
			          <th colspan="2">Personal Information</th>
			        </tr>
			      </thead>
			      <tbody>
			        <tr>
			          <td>Name</td>
			          <td>{{$name_owner}}</td>
			        </tr>
			        <tr>
			          <td>Email</td>
			          <td>{{$email_owner}}</td>
			        </tr>
			        <tr>
			          <td>Phone Number</td>
			          <td>{{$phoneNumber_owner}}</td>
			        </tr>
			        <tr>
			          <td>Address</td>
			          <td>{{$address_owner}}</td>
			        </tr>
			        <tr>
			          <td>Country</td>
			          <td>{{$country_owner}}</td>
			        </tr>
			        <tr>
			          <td>Zip Code</td>
			          <td>{{$zipCode_owner}}</td>
			        </tr>
			      </tbody>
			    </table>
			</div>
		</div>
	</div>


	<!-- INFO -->
	<div id="body_full">
		<div id="content">
		  <div class="info_content">
		    <h2 id="info">GROCERIES CARD</h2>
		  </div>

<hr>

		  <!-- content -->
		  <div>
		    <table id="allcard_itens_DT">
		      <thead>
		        <tr>
		          <th>Order</th>
	              <th>Name</th>
	              <th>Quantity</th>
	              <th>Comments</th>
		        </tr>
		      </thead>
		      <tbody>
		        <tr>
		        @foreach($all_itens as $item)
		          <td>{{$card_id}}</td>
	              <td>{{$item->name}}</td>
	              <td>{{$item->quantity}}</td>
	              <td>{{$item->comment}}</td>
		        </tr>
		        @endforeach
		      </tbody>
		    </table>
		  </div>

		</div>

		<div style="margin-top: 40px;" id="selivered">
			<a class="button" id="Button_delivery" href="http://localhost/Alpha_Delivery/delivered/{{$card_id}}/{{$user_id}}"><p style="margin-top: 10px;">I delivered!</p></a>
			<a class="button" id="Button_giveUp" href="http://localhost/Alpha_Delivery/giveup/{{$card_id}}/{{$user_id}}"><p style="margin-top: 10px;">Give up</p></a>
		</div>

	</div>
</body>
</html>