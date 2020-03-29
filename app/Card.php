<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\item;

class Card extends Model
{
	// link to a table
	protected $table = 'cards';

    //this is what is fillable
    protected $fillable = ['user_id', 'name'];
    //will not count timestamp (createdAt)
    public $timestamps = false;

    // RELATIONSHIP
    public function users()
    {
    	//many one user has many address (maybe)
        return $this->belongsTo(User::class, 'user_id');
    }

    public function itens()
    {
        //one CARD has many ITENS
        //collun card_id 
        return $this->hasMany(Item::class);
    }
}

/*

USER  ->   ADDRESS
      ->   CARD     ->  ITEM
*/
