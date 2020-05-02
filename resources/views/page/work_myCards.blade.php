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
					<i id="newCard_addRow" class="plus_FW fa fa-plus fa-xs"></i>
				</th>
			</tr>
		</thead>
		<tbody>
			@foreach(auth()->user()->cards as $card)
			<tr>
				<td>{{$card->id}}</td>
				<td>{{$card->name}}</td>
				<td>{{$card->tips}}</td>
				<td>{{$card->deadline}}</td>
				<td>{{$card->itens->count()}}</td>
				<td>{{active($card->active)}}</td>
				<td style="text-align-last: center;">	
					<a href="modify_card/{{$card->id}}"><i class="pen_FW fa fa-pencil fa-xs" title="Edit"></i></a>
					<a href="delete_card/{{$card->id}}"><i class="trash_FW fa fa-trash fa-xs" title="Delete"></i></a>
				</td>
			</tr>
			@endforeach
			
			<!-- ADDING NEW CARD -->
			<tr id="new_Card_tr" style="display: none;">
				<form method="POST" action="add_newCard">
					@csrf
					<td><!-- <input type="text" name="user_id" style="display: none;" value="{{auth()->user()->id}}"> --></td>
					<td><input type="text" name="name" required></td>
					<td>
						<select name="tips">
						  <option value="No" selected>No</option>
						  <option value="Yes">Yes</option>
						</select>
					</td>
					<td><input type="date" name="deadline" min="{{date('Y-m-d')}}" required></td>
					<td></td>
					<td>1 = Active</td>
					<td style="text-align-last: center;">	
						<button class="save_FW btn btn-success"><i class="fa fa-save"></i></button>
					</td>
				</form>
			</tr>
		</tbody>
	</table>	

	<!-- ALL CARDS WITH A RIGHT DEADLINE -->
	<!-- ------------------------------- -->
	<div class="row">
	@foreach(auth()->user()->cards as $card)
		@if((strtotime($card->deadline) - strtotime(date("Y-m-d")))/ 86400 >= 1)
		<div class="col-md-4" style="vertical-align: top; position: relative;">
			<div class="card border-secondary box_card" style="min-height: 200px;">
				<div class="card-header" style=" background-color: #DC143C; color: white;">
					<div style="display: inline-block;">
						{{$card->id}}
					</div>
					@if($card->tips == 'Yes')
					<div data-toggle="tooltip" title="Tips!!" style="display: inline-block; float: right; color: #FFD700">
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
				<div style="position: absolute; bottom: 0; right: 0;">
		    		<small>{{(strtotime($card->deadline) - strtotime(date("Y-m-d")))/ 86400}} days left</small>
		    	</div>
			</div>
			<!-- footer -->
			<div style="text-align-last: center;">
				<a style="font-size: 30px; border-right: dotted; border-right-width: thin;" href="modify_card/{{$card->id}}"><i class="pen_FW fa fa-pencil fa-xs" title="Edit"></i></a>
				<a style="font-size: 30px;" href="delete_card/{{$card->id}}"><i class="trash_FW fa fa-trash fa-xs" title="Delete"></i></a>
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
				<form method="POST" action="add_newCard">
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
						<input type="number" class="form-control" id="valueTips" name="valueTips" max="100" min="0" value="0" style="width: 50%; display: inline-block;">
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

