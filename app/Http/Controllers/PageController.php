<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\Address;

class PageController extends Controller
{

	//--------------------------------------------------------------------
	//IF AUTHENTICATE (LOGIN), GO TO WORK PAGE, ELSE COMEBACK TO MAIN PAGE
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
    //--------------------------------------------------------------------

 	//RCEIVE A POST FROM MODEL AND EDITING USER
 	//EDDITING USER ------------------------------------------------------
    public function editUser(Request $request){

    	//find the user at DB
    	$userInfo = User::find(auth()->user()->id);

		// address of this user 
		$userAddress = $userInfo->addresses;

    	//use inputs to update mySQL
        $userInfo->name = $request->input('name');
        $userInfo->phoneNumber = $request->input('phoneNumber');
        $userInfo->email = $request->input('email');
        $userAddress->address = $request->input('address');
        $userAddress->city = $request->input('city');
        $userAddress->zipCode = $request->input('zipCode');
        $userInfo->save();
        $userAddress->save();

        //show toastr on top of the page (ALERT)
        $notification = array(
            'message' => 'Updated!',
            'alert-type' => 'info'
        );

        //return to work page
        return redirect('/delivery')->with($notification);
    }
}
