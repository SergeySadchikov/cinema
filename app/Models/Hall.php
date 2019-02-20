<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    public $timestamps = false;
    
    public function seats()
    {
    	return $this->hasMany('App\Models\Seat');
    }
    public function seances()
    {
    	return $this->hasMany('App\Models\Seance');
    }
}
