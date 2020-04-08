<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\Address;
use App\Card;
use App\Item;
use Mail;

class PageController extends Controller
{
	// --------------------------[WORK PAGE]------------------------------
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

    	//take all user to show on the first page
    	$all_Cards = Card::where([
    		['active', '=', 1],
    		['deadline', '>=', date("Y-m-d")]
    	])->get();

    	return view('page.work_page', compact('all_Cards'));
    }
    // 1 800 9592059
    //--------------------------------------------------------------------

    // -----------------------------[MODEL]-------------------------------
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
    //--------------------------------------------------------------------

    // --------------------------[MY CARD PAGE]---------------------------
	//--------------------------------------------------------------------
	//GOES TO MY CARD PAGE. NEED TO AUTH FIRST
	public function myCardsPage(){

    	if(!auth()->check()){
	    	//Didnt Login
	        $notification = array(
	            'message' => 'You have to login first!',
	            'alert-type' => 'error'
	        );

    		return view('page.front_page')->with($notification);
    	}
    	return view('page.work_myCards');
    }
    //-------------------------------------------

    //----- [Add new Card] -> Button save
    public function add_newCard(Request $request){

		//CEATE A NEW CARD
	    $newCard = new Card([
			'user_id'  => auth()->user()->id,
			'name'	   => $request->get('name'),
			'tips'	   => $request->get('tips'),
			'deadline' => $request->get('deadline')
    	]);
		//save mySQL
     	$newCard->save();

		//show toastr on top of the page (Sucess)
        $notification = array(
            'message' => 'Card created!',
            'alert-type' => 'success'
        );

     	return back()->with($notification);
    }
    //-------------------------------------------

    //----- [DELETE Card] -> Button Trash
    public function delete_Card($card_id){

		Card::find($card_id)->delete();

        //show toastr on top of the page (Sucess)
        $notification = array(
            'message' => 'Card deleted!',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }
    //-------------------------------------------

    //----- [MODIFY Card] -> Button Pencil
    //goes to my itens page
    public function modify_card(Card $card_id){
       
        return view('page.work_myItens', compact('card_id'));
    }
    //-------------------------------------------

    //------ [UPDATE Cards] -> Button save
    public function update_card(Request $request, Card $card_id){

        //use inputs to update mySQL
        $card_id->name = $request->input('name');
        $card_id->tips = $request->input('tips');
        $card_id->deadline = $request->input('deadline');
        $card_id->active = $request->input('active');
        $card_id->save();

        //show toastr on top of the page (change Card)
        $notification = array(
            'message' => 'Card updated!',
            'alert-type' => 'info'
        );

        //$studentId->update($request->all());
        return back()->with($notification);
    }

    //----- [Add new Card] -> Button save
    public function add_newItem(Request $request){

		//CEATE A NEW ITEM
	    $newItem = new Item([
			'card_id'  => $request->get('card_id'),
			'name'	   => $request->get('name'),
			'quantity' => $request->get('quantity'),
			'comment'  => $request->get('comment')
    	]);
		//save mySQL
     	$newItem->save();

		//show toastr on top of the page (Sucess)
        $notification = array(
            'message' => 'Item Added!',
            'alert-type' => 'success'
        );

     	return back()->with($notification);
    }
    //-------------------------------------------

    //SEND EMAIL TO BOTH PARTS TO CONTACT THEIS SELFS 
    //----------[ACCEPT HELP!]-------
    public function accept_Email(Card $card_id){

    	// SEND THE EMAIL
    	// SEND INFORMATION TO WHO NEED HELP (CARD OWNER)
    	//--------[card owner]--------
    	$name_owner = $card_id->users->name;
    	$to_email_owner = $card_id->users->email;					
    	$name_user = auth()->user()->name;
	    $phoneNumber_user = auth()->user()->phoneNumber;
	    $email_user = auth()->user()->email;

	    //--send email for CARD OWNER--
		$data = array(
			'name_owner' 	   => $name_owner, 
			'name_user' 	   => $name_user,
			'phoneNumber_user' => $phoneNumber_user,
			'email_user' 	   => $email_user
		);

		// Mail::send('emails.mail_match_user', $data, function($message) use ($name_owner, $to_email_owner) {
		// 	$message->to($to_email_owner)->subject('Alpha Delivery - Groceries');
		// });

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
			'name_owner' 		=> $name_owner,            //has it
			'name_user' 		=> $name_user,			   //has it
			'email_user' 		=> $email_user, 		   //has it
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

		return 'foi';


    }

    
}
