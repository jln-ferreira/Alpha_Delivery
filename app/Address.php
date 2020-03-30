<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Address extends Model
{
    // link to a table
	protected $table = 'addresses';

	//this is what is fillable
    protected $fillable = ['user_id', 'address', 'city', 'zipCode'];
    //will not count timestamp (createdAt)
    public $timestamps = false;


	// RELATIONSHIP
    public function users()
    {
    	//many users has many address 
        return $this->belongsTo(User::class, 'user_id');
    }

}


/*

USER  ->   ADDRESS
      ->   CARD     ->  ITEM
*/