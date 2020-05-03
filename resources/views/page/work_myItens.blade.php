@extends('page.style')
<!-- FORM of the page.style  -->

<!-- INCLUDE ALL FUNCTIONS OF THIS APP -->
@include('tools.toolsFunctionPHP')


@section('First_Content')

<!-- --------[Move to My card] -->
<div class="row">
    <div id="header_Work" class="col-lg-12">
    	<a href="../myCard" class="btn btn-success">My Cards</a>
    </div> 
</div>
<!-- ----------------------MY ITENS---------------------- -->
<!-- -------[NAME PAGE] -->
<div id="namePage_Work" class="col-lg-12">
	<small>for Card: {{$card_id->id}} - {{$card_id->name}}</small>
</div> 

<div class="container">

	<!-- ------------[DATA TABLE MY CARD]--------------- -->
	<table id="myCard_DT" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Order</th>
				<th>Description</th>
				<th>Tips?</th>
				<th>Deadline</th>
				<th>Quantity</th>
				<th>Status</th>
				<th style="text-align:center;width:100px;">Add row
				</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<form method="POST" action="../update_card/{{$card_id->id}}">
					@csrf
    				{{ method_field('PATCH') }} <!-- UPDATE -->
					<td>
						<input type="number" name="card_id" autocomplete="off" value="{{$card_id->id}}" disabled>
					</td>
					<td>
						<input type="text" name="name" autocomplete="off" value="{{$card_id->name}}" required>
					</td>
					<td>
						<select name="tips">
						  <option value="No" <?php if($card_id->tips == 'No') echo "selected"?>>No</option>
						  <option value="Yes" <?php if($card_id->tips == 'Yes') echo "selected"?>>Yes</option>
						</select>
					</td>
					<td>
						<input type="date" name="deadline" min="{{date('Y-m-d')}}" value="{{$card_id->deadline}}" required>
					</td>
					<td>{{$card_id->itens->count()}}</td>
					<td>
						<select name="active">
							<option value="0" <?php if($card_id->active == 0) echo "selected"?> >0 = DESATIVED</option>
							<option value="1" <?php if($card_id->active == 1) echo "selected"?> >1 = ACTIVE</option>
							<option value="2" <?php if($card_id->active == 2) echo "selected"?> >2 = CHOOSED BY</option>
							<option value="3" <?php if($card_id->active == 3) echo "selected"?> >3 = DELIVERED</option>
						</select>
					</td>
					<td style="text-align-last: center;">	
						<button type="edit" class="save_FW btn btn-success"><i class="fa fa-save"></i></button>
					</td>
				</form>
			</tr>
		</tbody>
	</table>
	<!-- ----------------------------------------------- -->
	<br><br><hr>
	<div style="text-align: center;" class="col-lg-12">
		<h2>My Itens:</h2>
	</div> 
	<!-- ------------[DATA TABLE ITENS]--------------- -->
	<table id="myItens_DT" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Order</th>
				<th>Name</th>
				<th>Quantity</th>
				<th>Comment</th>
				<th style="text-align:center;width:100px;">Add row
					<i id="newItem_addRow" class="plus_FW fa fa-plus fa-xs"></i>
				</th>
			</tr>
		</thead>
		<tbody>
			@foreach($card_id->itens as $item)
			<tr>
				<td>{{$item->id}}</td>
				<td>{{$item->name}}</td>
				<td>{{$item->quantity}}</td>
				<td>{{$item->comment}}</td>
				<td style="text-align-last: center;">	
					<a href="../delete_item/{{$item->id}}"><i class="trash_FW fa fa-trash fa-xs" title="Delete"></i></a>
				</td>
			</tr>
			@endforeach
			<!-- ADDING NEW ITEM -->
			<tr id="new_Item_tr" style="display: none;">
				<form method="POST" action="../add_newItem">
					@csrf
					<td></td>
					<input type="hidden" name="card_id" value="{{$card_id->id}}">
					<td><input type="text" name="name" required></td>
					<td><input type="number" name="quantity" min="1" required></td>
					<td><textarea cols="50" rows ="3" name="comment"></textarea></td>
					<td style="text-align-last: center;">	
						<button class="save_FW btn btn-success"><i class="fa fa-save"></i></button>
					</td>
				</form>
			</tr>
				 
		</tbody>
	</table>



	<!-- ONE CARD SELECTED WITH ALL ITENS -->
	<!-- ------------------------------- -->
	<div class="row">
		<div class="col-md-12" style="vertical-align: top; position: relative;">
			<form method="POST" action="../update_card/{{$card_id->id}}">
			@csrf
			{{ method_field('PATCH') }} <!-- UPDATE -->
				<div class="card box_card" style="min-height: 200px; border-color: lightgray;">
					<div class="card-header" style=" background-color: #DC143C; color: white;">
						<div style="display: inline-block;">
							<input type="number" name="card_id" autocomplete="off" value="{{$card_id->id}}" disabled>
						</div>
						
						<div data-toggle="tooltip" title="Tips!!" style="display: inline-block; float: right; color: #FFD700">
							<i class="fa fa-btc"></i>
						</div>
						
					</div>

					<div class="card-body text-secondary">
						<input style="display: block; font-weight: bold; font-size: large; margin-bottom: 30px; width: 50%;" type="text" name="name" autocomplete="off" value="{{$card_id->name}}" required>
						<div style="margin-top: 8px;">
							<h4 class="card-text" style="display: inline-block; vertical-align: text-top;">Itens:</h4>
							<div style="display: inline-block;">
								@foreach($card_id->itens as $item)
									<button style="padding: 3px; margin-bottom: 4px;" type="button" class="btn btn-primary">{{ $item->name }}<span class="badge" style="background-color: white; color: black; margin-left: 4px">{{ $item->quantity }}</span></button>
								@endforeach
								<a id="addItemPlus" href="#" style="color: #32CD32; " class="fa fa-plus-circle fa-lg"></a>
							</div>
						</div>
					</div>
					<div style="text-align: right; margin: 10px 4px 4px 0px">
			    		<input type="date" name="deadline" min="{{date('Y-m-d')}}" max="{{date('Y-m-d', strtotime(' + 30 days'))}}" value="{{$card_id->deadline}}" required>
			    	</div>
				</div>
			</form>
			<!-- footer -->
			<div style="text-align-last: center;">
				<a style="font-size: 30px; border-right: dotted; border-right-width: thin;" href="#"><i class="pen_FW fa fa-pencil fa-xs" title="Edit"></i></a>
				<a style="font-size: 30px;" href="#"><i class="trash_FW fa fa-trash fa-xs" title="Delete"></i></a>
			</div>
		</div>

</div>

@stop

			