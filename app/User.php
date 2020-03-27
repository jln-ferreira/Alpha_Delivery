<?php

namespace App;

use App\Address;
use App\Card;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable{

     //this is what is fillable
    protected $fillable = ['name', 'phoneNumber', 'email', 'password'];
    //will not count timestamp (createdAt)
    public $timestamps = false;


    // RELATIONSHIP
    public function addresses()
    {
        //one USER has many ADDRESS
        //collun user_id 
        return $this->hasMany(Address::class);
    }
    public function cards()
    {
        //one USER has many CARDS
        //collun user_id 
        return $this->hasMany(Card::class);
    }
}
