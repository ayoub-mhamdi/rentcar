<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class voiture extends Model
{
	protected $primaryKey = 'matricule';
	
	public $incrementing = false;

    public function locations()
    {
    	return $this->hasMany(Location::class);
    }
}
