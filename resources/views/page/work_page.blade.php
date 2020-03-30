@extends('page.style')
<!-- FORM of the page.style  -->

@section('First_Content')

<!-- --------------------FIRST PAGE WRITING------------------ -->
<!-- --------[HEADER] -->
<div class="row">
    <div id="header_Work" class="col-lg-12">
    	<a href="myCard" class="btn btn-success">My Cards</a>
    </div> 
</div>
	
@stop





<!-- @if( auth()->check() )
                <li class="nav-item">
                    <a class="nav-link" href="#">{{ auth()->user()->name }}</a>
                </li>
            @endif -->