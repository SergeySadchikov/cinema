<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    public function seances()
    {
    	return $this->hasMany('App\Models\Seance');
    }
}
