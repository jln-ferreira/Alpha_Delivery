@extends('page.style')
<!-- FORM of the page.style  -->
<!-- INCLUDE ALL FUNCTIONS OF THIS APP -->
@include('tools.toolsFunctionPHP')

@section('First_Content')

<!-- --------------------FIRST PAGE WRITING------------------ -->
<!-- --------[HEADER] -->
<div class="row">
    <div id="header_Work" class="col-lg-12">
    	<a href="myCard" class="btn btn-success">My Cards</a>
    </div> 
</div>

<!-- ----------------------All DELIVERY---------------------- -->
<!-- -------[NAME PAGE] -->
<div id="namePage_Work" class="col-lg-12">
	<h2>Delivery</h2>
</div> 

<!-- ------------[DATA TABLE]--------------- -->
<div class="container">

	<table id="allCard_DT" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Order</th>
				<th>Country</th>
				<th>City</th>
				<th>Description</th>
				<th>Tips?</th>
				<th>Deadline</th>
				<th>Quantity</th>
				<th>Status</th>
				<th style="text-align:center;width:100px;">
					<i id="newCard_addRow" class="plus_FW fa fa-plus fa-xs"></i>
				</th>
			</tr>
		</thead>
		<tbody>
			@foreach($all_Cards as $card)
			<tr>
				<td>{{$card->id}}</td>
				<td>{{$card->users->addresses->country}}</td>
				<td>{{$card->users->addresses->city}}</td>
				<td>{{$card->name}}</td>
				<td>{{$card->tips}}</td>
				<td>{{$card->deadline}}</td>
				<td>{{$card->itens->count()}}</td>
				<td>{{active($card->active)}}</td>
				<td style="text-align-last: center;">	
					<a href="#"><i class="pen_FW fa fa-pencil fa-xs" title="Edit"></i></a>
					<a href="#"><i class="trash_FW fa fa-trash fa-xs" title="Delete"></i></a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@stop