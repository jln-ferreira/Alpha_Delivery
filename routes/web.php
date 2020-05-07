<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//----------------============= FIRST PAGE =============----------------
//======================================================================
// Route::get('/', function () {
//     return view('pages.login');
// });
//ACCESS LOGIN
Route::get('/', function () {
    return view('page.front_page');
});



//----------------============= LOGIN PAGE =============----------------
//======================================================================

//ACCESS LOGIN
Route::get('/account', function () {
    return view('login.login');
});

//VERIFY IF THERE IS USER WITH THIS LOGIN -----> LOGIN
Route::post('/login', 'LoginController@login');


//SIGN UP ------------------------
//VERIFY IF THERE IS USER WITH THIS LOGIN
Route::get('/signup', function () {
    return view('login.sign_up ');
});

//SIGN UP -> NEW CUSTOMER
Route::post('/newCustomer', 'LoginController@newCustomer');


//FORGOT PASSWORD -----------------
Route::get('/forgotPass', function () {
    return view('login.forgotPass');
});
//Send email
Route::post('/forgotPass/send', 'LoginController@sendEmail');


//---------------============= WORKING PAGE =============---------------
//======================================================================
// AFTER LOGIN, SEND TO REAL PAGE
Route::get('/delivery', 'PageController@WorkPage');
// Route::get('/delivery', function () {
//     return view('page.work_page');
// });

//IF SOMEONE CLICK AND ACCEPT HELP WITH DELIVERY (CLICK S2)
//---------------- [SEND EMAIL] ----------------
Route::get('/groceries_email/{card_id}', 'EmailController@accept_Email');


//--------===========[MODEL]===========--------
// LOGOUT-------------
Route::get('/logoutUser', function () {
    auth()->logout();
    return view('page.front_page');
});

//MODIFY USER -> receive info of POST MODEL
Route::patch('/editUser', 'PageController@editUser');




//---------------============= MY CARD PAGE =============---------------
//======================================================================
//Send to page my Cards (AUTH)
Route::get('/myCard', 'PageController@myCardsPage')->name('myCard');

//[CARD]
//[add new card]
Route::post('/add_newCard', 'PageController@add_newCard')->name('add_newCard');

//[Delete card]
Route::get('/delete_card/{card_id}', 'PageController@delete_Card')->name('delete_card');

//[Modify card] -> go to page
Route::get('/modify_card/{card_id}', 'PageController@modify_card')->name('modify_card');
Route::patch('/update_card/{card_id}', 'PageController@update_card')->name('update_card');

//[ITEM]
//[add new item]
Route::post('/add_newItem', 'PageController@add_newItem')->name('add_newItem');
//[Delete item]
Route::get('/delete_item/{item_id}', 'PageController@delete_Item')->name('delete_item');
//[Modify Item]
Route::patch('/update_item/{item_id}', 'PageController@update_item')->name('update_item');

//---------------============= [EMAIL] =============---------------
//======================================================================
// IS POSSIBLE TO ACCEPT OR DECLINE OF BOTH SIDES INSIDE DE EMAIL SEND
//[Card delivered!]
Route::get('/delivered/{card_id}/{user_id}', 'EmailController@delivered_Card');
//[Card Give up!]
Route::get('/giveup/{card_id}/{user_id}', 'EmailController@giveup_Card');

// ----- [CONTACT BY EMAIL] -----
Route::POST('/contact', 'EmailController@contact');