<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public function seat()
    {
    	return $this->belongsTo('App\Models\Seat');
    }
    public function seance()
    {
    	return $this->belongsTo('App\Models\Seance');
    }
}
