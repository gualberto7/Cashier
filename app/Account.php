<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
    	'ammount', 'type', 'description', 'box_id'
    ];

    public function box()
    {
    	return $this->belongsTo(Box::class);
    }

}
