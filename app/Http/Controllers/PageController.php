<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function WorkPage(){

    	if(!auth()->check()){
	    	//Didnt Login
	        $notification = array(
	            'message' => 'You have to login first!',
	            'alert-type' => 'error'
	        );

    		return view('page.front_page')->with($notification);
    	}
    	return view('page.work_page');
    }
}
