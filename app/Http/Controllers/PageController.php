<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\Address;
use App\Card;
use App\Item;

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
    	$all_Cards = Card::all();

    	return view('page.work_page', compact('all_Cards'));
    }
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


    
}
