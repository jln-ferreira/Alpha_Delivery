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
		}
		
		#body_full{
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
    <div id="header">
    	<h3>Hello {{$name_owner}}!</h3>
    	<h4>We have a good news for you!</h4>
    	<p>{{$name_user}} choose your Card and he wants to help! <b>UHUL!</b></p>
    </div>


	<!-- INFO -->
	<div id="body_full">
		<div id="content">
		  <div class="info_content">
		    <h2 id="info">INFOMATION</h2>
		  </div>

<hr>

		  <!-- content -->
		  <div>
		    <table id="allcard_itens_DT">
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

		<div style="margin-top: 40px;" id="selivered">
			<a class="button" id="Button_delivery" href="http://localhost/Alpha_Delivery/delivered/{{$card_id}}/{{$user_id}}"><p style="margin-top: 10px;">Delivered!</p></a>
			<a class="button" id="Button_giveUp" href="http://localhost/Alpha_Delivery/giveup/{{$card_id}}/{{$user_id}}"><p style="margin-top: 10px;">Give up</p></a>
		</div>
	</div>
</body>