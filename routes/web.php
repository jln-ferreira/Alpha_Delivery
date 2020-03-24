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
//----------------============= LOGIN PAGE =============----------------
//======================================================================

//ACCESS FIRST PAGE LOGIN
Route::get('/', function () {
    return view('header.login');
});

//VERIFY IF THERE IS USER WITH THIS LOGIN -----> LOGIN
Route::post('/login', 'LoginController@login');


//SIGN UP ------------------------
//VERIFY IF THERE IS USER WITH THIS LOGIN
Route::get('/signup', function () {
    return view('header.sign_up ');
});

//SIGN UP -> NEW CUSTOMER
Route::post('/newCustomer', 'LoginController@newCustomer');


//FORGOT PASSWORD -----------------
Route::get('/forgotPass', function () {
    return view('header.forgotPass');
});
//Send email
Route::post('/forgotPass/send', 'LoginController@sendEmail');



