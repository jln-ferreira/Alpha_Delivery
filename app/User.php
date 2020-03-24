<?php

namespace App;

use App\Address;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable{

    //this is what is fillable`2
    protected $fillable = ['name', 'phoneNumber', 'email', 'password'];
    //will not count timestamp (createdAt)
    public $timestamps = false;
    //atribute to does not fill
    protected $attributes = [
        'active' => false
    ];

    // RELATIONSHIP
    public function addresses()
    {
        //one Company has many Customer/Students
        // Gonna seach his own id on TD student
        //collun company_id 
        return $this->hasMany(Address::class);
    }
}
