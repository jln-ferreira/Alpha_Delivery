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