@extends('page.style')
<!-- FORM of the page.style  -->

<!-- INCLUDE ALL FUNCTIONS OF THIS APP -->
@include('tools.toolsFunctionPHP')

@section('First_Content')
<!-------------------------- [MODAL] ---------------------->
<!-- CLICK NAME USER. POSSIBLE: MODIFY AND LOGOUT -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Row information</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

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
				<th>Status</th>
				<th style="text-align:center;width:100px;">Add row <button type="button" class="btn btn-success">
						<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
					</button></th>
			</tr>
		</thead>
		<tbody>
			@foreach(auth()->user()->cards as $card)
			<tr>
				<td>{{$card->id}}</td>
				<td>{{$card->name}}</td>
				<td>{{$card->tips}}</td>
				<td>{{$card->deadline}}</td>
				<td>{{active($card->active)}}</td>
				<td>
					<button type="butt	on" class="btn btn-primary btn-xs dt-edit" style="margin-right:16px;">
						<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
					</button>
					<button type="button" class="btn btn-danger btn-xs dt-delete">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
					</button>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</div>

@stop
