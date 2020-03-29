@extends('page.style')
<!-- FORM of the page.style  -->

@section('First_Content')

<!-- --------------------FIRST PAGE WRITING------------------ -->
<div class="row">
    <div class="col-lg-12">
      <h3 id="firstPart_Work">
        List of Cards


		@if( auth()->check() )
                <li class="nav-item">
                    <a class="nav-link" href="#">{{ auth()->user()->name }}</a>
                </li>
            @endif

      </h3>
    </div> 
  </div>

@stop