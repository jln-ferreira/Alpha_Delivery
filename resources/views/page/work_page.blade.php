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
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($all_Cards as $card)
			<tr>
				<td class="card_id"><a href="#" data-toggle="modal" data-target="#itens_Modal">{{$card->id}}</a></td>
				<td>{{$card->users->addresses->country}}</td>
				<td>{{$card->users->addresses->city}}</td>
				<td>{{$card->name}}</td>
				<td>{{$card->tips}}</td>
				<td>{{$card->deadline}}</td>
				<td>{{$card->itens->count()}}</a></td>
				<td>{{active($card->active)}}</td>
				<td style="text-align-last: center;">
					@if($card->user_id == auth()->user()->id)	
						<a href="#" data-toggle="tooltip" data-placement="right" title="Thats yours"><i class="fa fa-address-card"></i></a>
					@else
						<a href="groceries_email/{{$card->user_id}}"><i class="fa fa-heart"></i></a>
					@endif
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

<!-- -------------------------------------------[MODAL SHOW ALL ITENS]----------------------------------------- -->
<!-- ========================================================================================================== -->
<div class="modal fade" id="itens_Modal" tabindex="-1" role="dialog" aria-labelledby="itens_Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="itens_Label">Itens</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div style="align-self: center;"><p>Order: <small style="font-weight: bolder;" id="number_order">1</small></p></div>
      <div class="modal-body">
        
      <!------------------------------ INSIDE MODAL ----------------------------->
        <!-- PERSONAL INFORMATION -->
        <table id="allcard_itens_DT" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Order</th>
              <th>Name</th>
              <th>Quantity</th>
              <th>Comments</th>
            </tr>
          </thead>
          <tbody>
            @foreach($all_Cards as $card_item)
            @foreach($card_item->itens as $item)
            <tr>
              <td>{{$card_item->id}}</td>
              <td>{{$item->name}}</td>
              <td>{{$item->quantity}}</td>
              <td>{{$item->comment}}</td>
            </tr>
            @endforeach
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- ========================================================================================================== -->

@stop