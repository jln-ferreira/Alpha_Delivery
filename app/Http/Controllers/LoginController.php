<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Address;

class LoginController extends Controller
{
	//VERIFY IF THERE IS USER WITH THIS LOGIN
    public function login(Request $request){

    	//fetch all users of the DB
    	$users = User::all();

    	// bring info what the user typed:
    	$email = $request->get('email');
    	$pass = $request->get('pass');

    	//EMAIL AND PASS INCORRECT
    	//show toastr on top of the page (ALERT)
        $notificationWarning = array(
            'message' => 'Wrong User!',
            'alert-type' => 'warning'
        );

    	//loop from all users in DB
    	foreach ($users as $user) {
    		//RIGHT USER EMAIL AND PASSWORD
    		if ($user->email == $email && $user->password == $pass) {
    			
		    	//show toastr on top of the page (Correct)
		        $notificationRight = array(
		            'message' => 'Welcome ' . $user->name,
		            'alert-type' => 'success'
		        );
    			return back()->with($notificationRight);
    		}
    	}
    	// go back to the same page '/' and insert a message Wrong User!
        return back()->with($notificationWarning);
    }



    //SIGN UP -> NEW CUSTOMER
    public function newCustomer(Request $request){

    	//CERTIFY IF THE EMAIL IS NEW ONE (NEW CUSTOMER)
    	//fetch all users of the DB
    	$users = User::all();

    	// bring info what the user typed:
    	$email = $request->get('email');

    	//loop from all users in DB
    	foreach ($users as $user) {
    		//IS THERE EMAIL REGISTRED?
    		if ($user->email == $email) {
    			
				//show toastr on top of the page (wrong)
		        $notification = array(
		            'message' => 'Already have account, ' . $user->name,
		            'alert-type' => 'info'
		        );
    			return redirect('/')->with($notification);
    		}
    	}
    	//IF THE USER IS NEW
	    $newUser = new User([
			'name'   	  => $request->get('name'),
			'phoneNumber' => $request->get('phoneNumber'),
			'email'		  => $request->get('email'),
			'password'	  => $request->get('pass')
    	]);
		//save mySQL
     	$newUser->save();

     	//CREATE THE ADDRESS
     	$newAddress = new Address([
     		'user_id' => $newUser->id,
     		'address' => $request->get('address'),
     		'city'	  => $request->get('city'),
     		'zipCode' => $request->get('zipCode')
     	]);
     	//save mySQL
     	$newAddress->save();

     	//show toastr on top of the page (Correct)
        $notification = array(
            'message' => 'Welcome ' . $newUser->name,
            'alert-type' => 'success'
        );
		return redirect('/')->with($notification);
    }
}
