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
	<!-- ONE CARD SELECTED WITH ALL ITENS -->
	<!-- ------------------------------- -->
	<div class="row">
		<div class="col-md-12" style="vertical-align: top; position: relative;">
			<form id="update_card" method="POST" action="{{ route('update_card', ['card_id' => $card_id->id]) }}">
			@csrf
			{{ method_field('PATCH') }} <!-- UPDATE -->
			</form>
				<div class="card box_card" style="border-color: lightgray;">
					<div class="card-header" style=" background-color: #DC143C; color: white;">
						<div style="display: inline-block;">
							<input type="number" name="card_id" autocomplete="off" value="{{$card_id->id}}" form="update_card" disabled style="background-color: transparent; color: white; border: none; font-weight: bold;">
						</div>
						@if($card_id->tips != 0)
							<div data-toggle="tooltip" title="Tips: {{ $card_id->tips }}.00" style="display: inline-block; float: right; color: #FFD700">
								<i class="fa fa-btc"></i>
							</div>
						@endif
					</div>

					<div class="card-body text-secondary row">
						<input class="col-md-6" form="update_card" style="display: block; font-weight: bold; font-size: large; margin-bottom: 30px; width: 50%;" type="text" name="nameCard" autocomplete="off" value="{{$card_id->name}}" required>
						<!-- TIPS -->
						<div class="col-md-6" id="divValueTips" style="text-align: right;">
							<label style="font-size: large" for="valueTips">Tip Value: </label>
							<input type="number" form="update_card" class="form-control" id="valueTips" name="valueTips" max="100" min="0" value="{{ $card_id->tips }}" style="width: 13%;display: inline-block;">
						</div>
						<div style="margin-top: 8px;">
							<h4 class="card-text" style="display: inline-block;">Itens:</h4>
							<div style="display: inline-block;">

								<!-- EACH ITEM INSIDE THIS CARD -->
								@foreach($card_id->itens as $item)
								<div class="dropdown" style="display: inline-block;">
									  <button style="padding: 3px; margin-bottom: 4px;" type="button" class="btn btn-primary" data-toggle="dropdown">{{ $item->name }}<span class="badge" style="background-color: white; color: black; margin-left: 4px">{{ $item->quantity }}</span></button>
								  <div class="dropdown-menu" style=" border-radius: 20px; padding: 15px; inline-size: max-content;">
								  	<form method="POST" action="{{ route('update_item', ['item_id' => $item->id]) }}">
										@csrf
										{{ method_field('PATCH') }} <!-- UPDATE -->
									    <li><input type="hidden" name="idModify" value="{{$item->card_id}}"></input></li>
									    <small>Name Item:</small>
									    <li><input type="text" name="nameModify" value="{{$item->name}}" class="form-control" required></input></li>
									    <small>Quantity:</small>
									    <li><input type="number" name="quantityModify" value="{{$item->quantity}}" class="form-control" min="1" max="100" required></input></li>
									    <small>Price per Unit:</small>
									    <li><input type="number" name="priceModify" value="	" class="form-control" min="1" max="100"></input></li>
									    <li><textarea style="margin-top: 10px;" name="commentModify" value="{{$item->comment}}" class="form-control" id="" cols="20" rows="5" placeholder="Comments"></textarea></li>
									    <!-- footer -->
										<div style="text-align-last: center; margin-top: 15px;">
											<button class="btn btn-success">
											    <span class="icon is-small">
											    	<i class="fa fa-check"></i>
											    </span>
											    <span>Save</span>
											</button>
											<a href="{{ route('delete_item', ['item_id' => $item->id]) }}" class="btn btn-danger is-outlined">
											    <span>Delete</span>
											    <span class="icon is-small">
											      	<i class="fa fa-times"></i>
											    </span>
											</a>
										</div>
									<!-- </form> -->
								  </div>
								</div>
								@endforeach
								<!-- OPEN MODAL ADD ITEM -->
								<a id="addItemPlus" style="color: #32CD32; " class="fa fa-plus-circle fa-lg" data-toggle="modal" data-target="#addItensModal"></a>
							</div>
						</div>
					</div>
					<div style="padding: 10px 20px 10px 20px">
						<!-- STATUS OF THE CARD -->
						<select name="activeCard" form="update_card">
							<option value="0" <?php if($card_id->active == 0) echo "selected"?> >0 = DESATIVED</option>
							<option value="1" <?php if($card_id->active == 1) echo "selected"?> >1 = ACTIVE</option>
							<option value="2" <?php if($card_id->active == 2) echo "selected"?> >2 = CHOOSED BY</option>
							<option value="3" <?php if($card_id->active == 3) echo "selected"?> >3 = DELIVERED</option>
						</select>
						<!-- deadline -->
			    		<input style="float: right;" form="update_card" type="date" name="deadlineCard" min="{{date('Y-m-d')}}" max="{{date('Y-m-d', strtotime(' + 30 days'))}}" value="{{$card_id->deadline}}" required>
			    	</div>
				</div>
			
				<!-- footer -->
				<div style="text-align-last: center; margin-top: 20px;">
					<input type="submit" form="update_card" value="&#10004; Save" class="btn btn-outline-success"> 
					<a href="{{ route('delete_card', ['card_id' => $card_id]) }}" class="btn btn-outline-danger">&#10060; Delete</a>
				</div>
			</form>
		</div>
	</div>
</div>

<!------ modal ADD ITEM  ------>
@include('page.model.model_addItem')

<script src="<?php echo asset('public/js/API_Grocery.js')?>" type="text/javascript"></script>
@stop		