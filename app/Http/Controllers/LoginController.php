<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Address;
use Mail;

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
            //RIGHT USER EMAIL AND PASSWORD(encrypted)
            if ($user->email == $email && Hash::check($pass, $user->password)) {
                
                //CREATE AUTHENTICATION! FINALY MODAFOCA
                 auth()->login($user);

                //show toastr on top of the page (Correct)
                $notificationRight = array(
                    'message' => 'Welcome ' . $user->name,
                    'alert-type' => 'success'
                );
                return redirect('/delivery')->with($notificationRight);
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
            'name'        => $request->get('name'),
            'phoneNumber' => $request->get('phoneNumber'),
            'email'       => $request->get('email'),
            'password'    => $request->get('pass')
        ]);
        //save mySQL
        $newUser->save();

        //CREATE THE ADDRESS
        $newAddress = new Address([
            'user_id' => $newUser->id,
            'address' => $request->get('address'),
            'country' => $request->get('country'),
            'city'    => $request->get('city'),
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

    //SEND EMAIL TO USER HOW FORGOT HIS PASSWORD
    public function sendEmail(Request $request){
        
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
                    'message' => 'Your password was sent to your email, ' . $user->name,
                    'alert-type' => 'success'
                );


                // RANDOMIC PASS AS NEW ONE
                $newPass = rand(100000, 999999);

                
                // SEND THE EMAIL
                // GONNA SEND ALL INFORMATION TO View > email > mail
                $to_name = $user->name;
                $to_email = $request->get("email"); //EMAIL THAT INSERTED 
                $data = array('name' => $user->name, 'body' => 'Your NEW password is ' . $newPass);
                Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
                $message->to($to_email)->subject('Alpha Delivery - Password');
                });

                //change for new password 
                $changePass = User::where('email', '=', $email)->get();
                $saveNewPass = User::find($changePass[0]->id);
                $saveNewPass->password = $newPass;

                $saveNewPass->save();



                //return to main page
                return redirect('/')->with($notification);
            }
        }       
        //show toastr on top of the page (wrong)
        $notification = array(
            'message' => 'Sorry, there is no e-mail with this email',
            'alert-type' => 'info'
        );
        return back()->with($notification);

    }
    
}