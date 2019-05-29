<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    protected $fillable = [
    	'name', 'ammount', 'ammount_before', 'porcentage', 'user_id'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function accounts()
    {
    	return $this->hasMany(Account::class);
    }
}
