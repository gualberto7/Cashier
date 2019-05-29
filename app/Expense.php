<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
    	'ammount', 'description', 'wallet_id'
    ];
}
