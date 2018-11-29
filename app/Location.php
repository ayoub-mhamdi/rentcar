<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    public function client()
    {
    	return $this->belongsTo(Client::class);
    }
    public function voiture()
    {
    	return $this->belongsTo(Voiture::class);
    }

}
