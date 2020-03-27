<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Card;

class Item extends Model
{
    // link to a table
	protected $table = 'itens';

    //this is what is fillable
    protected $fillable = ['card_id', 'name', 'quantity', 'comment'];

    // RELATIONSHIP
    public function cards()
    {
    	//many one user has many address (maybe)
        return $this->belongsTo(Card::class, 'card_id');
    }
}
