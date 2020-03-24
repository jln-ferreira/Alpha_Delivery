<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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

    	// loop from all users in DB
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
}
