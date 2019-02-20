<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    public function tickets()
    {
    	return $this->hasMany('App\Models\Ticket');
    }
    public function hall()
    {
    	return $this->belongsTo('App\Models\Hall');
    }
    public function film()
    {
    	return $this->belongsTo('App\Models\Film');
    }
}
