@extends('page.style')
<!-- FORM of the page.style  -->

<!-- INCLUDE ALL FUNCTIONS OF THIS APP -->
@include('tools.toolsFunctionPHP')


@section('First_Content')
<!-- ----------------------MY CARDS---------------------- -->
<!-- -------[NAME PAGE] -->
<div id="namePage_Work" class="col-lg-12">
	<h2>My Cards</h2>
</div> 

<!-- ------------[DATA TABLE]--------------- -->
<div class="container">	

	<hr>

	<!-- ALL CARDS WITH A RIGHT DEADLINE -->
	<!-- ------------------------------- -->
	<div class="row">
	@foreach(auth()->user()->cards as $card)
		@if((strtotime($card->deadline) - strtotime(date("Y-m-d")))/ 86400 >= 1)
		<div class="col-md-4" style="vertical-align: top; position: relative;">
			<div class="card box_card" style="min-height: 200px; border-color: lightgray;">
				<div class="card-header" style=" background-color: #DC143C; color: white;">
					<div style="display: inline-block;">
						{{$card->id}}
					</div>
					@if($card->tips != 0)
					<div data-toggle="tooltip" title="Tips: {{ $card->tips }}.00" style="display: inline-block; float: right; color: #FFD700">
						<i class="fa fa-btc"></i>
					</div>
					@endif
				</div>

				<div class="card-body text-secondary">
					<h5 class="card-title">{{$card->name}}</h5>
					<small class="card-text" style="margin-bottom: 0px">Itens:</small>
					@foreach($card->itens as $item)
						<div class="badge badge-primary" >{{$item->name}}</div>
					@endforeach
				</div>
				<div style="position: absolute; bottom: 0; right: 0; margin-right: 4px;">
		    		<small>{{(strtotime($card->deadline) - strtotime(date("Y-m-d")))/ 86400}} days left</small>
		    	</div>
			</div>
			<!-- footer -->
			<div style="text-align-last: center;">
				<a style="font-size: 30px; border-right: dotted; border-right-width: thin;" href="{{ route('modify_card', ['card_id' => $card->id]) }}"><i class="pen_FW fa fa-pencil fa-xs" title="Edit"></i></a>
				<a style="font-size: 30px;" href="{{ route('delete_card', ['card_id' => $card->id]) }}"><i class="trash_FW fa fa-trash fa-xs" title="Delete"></i></a>
			</div>
		</div>
		@endif
	@endforeach

	<!-- ------------------------------- -->

	<!----------- CARD FOR ADD CARDS ------>
	<!-- ------------------------------- -->
		<a href="#" class="col-md-4" style="vertical-align: top;" data-toggle="modal" data-target="#addCardModel">
			<div id="boxAdd" class="card" style="min-height: 200px; position: relative">
				<i id="iconAdd" style="font-size: 80px; color: #40E0D0; position: absolute;  top: 30%; left: 40%;" class="fa fa-plus-circle"></i>
			</div>
		</a>

	</div>
</div>

<!------ modal ADD CARD  ------>
@include('page.model.model_addCard')
@stop

