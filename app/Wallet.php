<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = [
    	'ammount', 'ammountBefore', 'user_id'
    ];
}
