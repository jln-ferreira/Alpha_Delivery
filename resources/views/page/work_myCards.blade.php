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
				<!-- <th>Quantity</th> -->
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
				<!-- <td>{{$card->itens->count()}}</td> -->
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
					<td>1 = Active</td>
					<td style="text-align-last: center;">	
						<button class="save_FW btn btn-success"><i class="fa fa-save"></i></button>
					</td>
				</form>
			</tr>
		</tbody>
	</table>

</div>

@stop
