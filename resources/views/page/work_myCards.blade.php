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

<div class="modal fade" id="addCardModel" tabindex="-1" role="dialog" aria-labelledby="addCardModel_Label" aria-hidden="true">
	<div class="modal-dialog" role="document">
    	<div class="modal-content">
      		<div class="modal-header" style=" background-color: #DC143C;">
        		<h5 class="modal-title" id="personalInfo_Label" style=" color: white;">New Card:</h5>
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close" style=" color: white;">
          			<span aria-hidden="true">&times;</span>
        		</button>
    		</div>
    		<div class="modal-body">
        
      <!------------------------------ INSIDE MODAL ----------------------------->
				<form method="POST" action="{{ route('add_newCard') }}">
				@csrf
					<!-- name card -->
					<div class="form-group">
						<label for="nameNewCard">Name for your Card:</label>
						<input type="text" class="form-control" id="nameNewCard" name="nameNewCard" required>
					</div>
					<!-- TIPS -->
					<label for="tips">Offering Tips?</label>
					<select name="tips" id="tipsYN">
						<option value="No" selected>No</option>
						<option value="Yes">Yes</option>
					</select>
					<div id="divValueTips" style="display: none; padding-left: 30px;">
						<label for="valueTips">Value: </label>
						<input type="number" class="form-control" id="valueTips" name="valueTips" max="100" min="1" value="1" style="width: 50%; display: inline-block;">
					</div>
				
					<!-- DEADLINE -->
					<div class="form-group">
					<label for="deadline">Expiration date:</label>
					<input type="date" class="form-control" id="deadline" name="deadline" min="{{date('Y-m-d')}}" max="{{date('Y-m-d', strtotime(' + 30 days'))}}">
					</div>

					<button class="modal-footer"  style="justify-content: center;background-color: transparent;border: 0;margin: 0 auto;">
						<div>
							<div class="buttonSaveCard">
								<div class="iconSave">
									<i class="fa fa-floppy-o"></i>
								</div>
							</div>
						</div>
					</button>
				</form>
    		</div>
    	</div>
	</div>
</div>
<!-- ========================================================================================================== -->

@stop

