<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Address extends Model
{
    // link to a table
	protected $table = 'addresses';

	// RELATIONSHIP
    public function users()
    {
    	//many one user has many address (maybe)
        return $this->belongsTo(User::class, 'user_id');
    }

}
