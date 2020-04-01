@extends('page.style')
<!-- FORM of the page.style  -->

<!-- INCLUDE ALL FUNCTIONS OF THIS APP -->
@include('tools.toolsFunctionPHP')


@section('First_Content')
<!-- ----------------------MY ITENS---------------------- -->
<!-- -------[NAME PAGE] -->
<div id="namePage_Work" class="col-lg-12">
	<h2>My Items</h2>
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
					<td>{{active($card_id->active)}}</td>
					<td style="text-align-last: center;">	
						<button type="edit" class="save_FW btn btn-success"><i class="fa fa-save"></i></button>
					</td>
				</form>
			</tr>
		</tbody>
	</table>

</div>

@stop

			