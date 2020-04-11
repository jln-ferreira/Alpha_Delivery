<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\Address;
use App\Card;
use App\Item;
use Mail;

class EmailController extends Controller
{
    //This controller is to controll all the email send
    //SEND EMAIL TO BOTH PARTS TO CONTACT THEIS SELFS 
    //----------[ACCEPT HELP!]-------
    public function accept_Email(Card $card_id){

    	// SEND THE EMAIL
    	// SEND INFORMATION TO WHO NEED HELP (CARD OWNER)
    	//--------[card owner]--------
    	$user_id          = auth()->user()->id;
    	$name_owner       = $card_id->users->name;
    	$to_email_owner   = $card_id->users->email;					
    	$name_user        = auth()->user()->name;
	    $phoneNumber_user = auth()->user()->phoneNumber;
	    $email_user       = auth()->user()->email;

	    //--send email for CARD OWNER--
		$data = array(
			'card_id' 		   => $card_id->id,
			'user_id'		   => $user_id,	  
			'name_owner' 	   => $name_owner, 
			'name_user' 	   => $name_user,
			'phoneNumber_user' => $phoneNumber_user,
			'email_user' 	   => $email_user
		);

		Mail::send('emails.mail_match_user', $data, function($message) use ($name_owner, $to_email_owner) {
			$message->to($to_email_owner)->subject('Alpha Delivery - Groceries');
		});

		// SEND INFORMATION TO USER
    	//--------[USER]--------
    	$card_deadline 	   = $card_id->deadline;
    	$phoneNumber_owner = $card_id->users->phoneNumber;
    	$email_owner 	   = $card_id->users->email;
    	$address_owner 	   = $card_id->users->addresses->address;
		$country_owner     = $card_id->users->addresses->country;
		$zipCode_owner     = $card_id->users->addresses->zipCode;
		$all_itens  	   = $card_id->itens; 	//-- For foreach --


	    //--send email for USER--
		$data = array(
			'user_id'		    => $user_id,
			'name_owner' 		=> $name_owner,            //has it
			'name_user' 		=> $name_user,			   //has it
			'email_owner' 		=> $email_owner, 		   //has it
			'card_deadline' 	=> $card_deadline,         //new
			'phoneNumber_owner' => $phoneNumber_owner, 	   //new
			'address_owner' 	=> $address_owner,         //new 
			'country_owner' 	=> $country_owner,         //new 
			'zipCode_owner' 	=> $zipCode_owner,         //new 
			'card_id' 			=> $card_id->id,           //new 
			'all_itens'		    => $all_itens
		);

		Mail::send('emails.mail_match_groceries', $data, function($message) use ($name_owner, $email_user) {
			$message->to($email_user)->subject('Alpha Delivery - Groceries');
		});


		//change the card to 2 - CHOSE BY
		$card_id->active = 2;
		$card_id->save();

		//show toastr on top of the page (Success)
        $notification = array(
            'message' => 'Email was sent!',
            'alert-type' => 'success'
        );

     	return back()->with($notification);
    }

    // CONFIRMATION DELIVERY
    // ------[email - confirmation delivery]------
    public function delivered_Card(Card $card_id, User $user_id){

    	//change the card to 3 - DELIVERED
		$card_id->active = 3;
		$card_id->save();

		//SEND CERTIFICATE
    	//--------[VARIABLE]--------
    	$card_owner_name  = $card_id->users->name;
    	$card_user_name   = $user_id->name;
    	$card_owner_email = $card_id->users->email;
    	$card_user_email  = $user_id->email;

		//--------[USER]--------
	    //--send email for USER--
		$data = array(
			'name_award'  => $card_user_name
		);

		Mail::send('emails.mail_Certificate', $data, function($message) use ($card_user_name, $card_user_email) {
			$message->to($card_user_email)->subject('Alpha Delivery - Groceries');
		});

		//--------[OWNER]--------
	    //--send email for USER--
		$data = array(
			'name_award' => $card_owner_name
		);

		Mail::send('emails.mail_Certificate', $data, function($message) use ($card_owner_name, $card_owner_email) {
			$message->to($card_owner_email)->subject('Alpha Delivery - Groceries');
		});

		//show toastr on top of the page (Success)
        $notification = array(
            'message' => 'Thank you to help the comunity!!',
            'alert-type' => 'success'
        );

		return redirect('/')->with($notification);
    }
}
