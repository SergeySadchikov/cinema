<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    protected $fillable = ['number', 'row', 'type', 'price'];
    public $timestamps = false;

    public function hall()
    {
    	return $this->belongsTo('App\Models\Hall');
    }
    public function ticket()
    {
    	return $this->hasOne('App\Models\Ticket');
    }
}
