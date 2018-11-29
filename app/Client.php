<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class client extends Model
{

	protected $primaryKey = 'cin';
	
	public $incrementing = false;

    public function locations()
    {
    	return $this->hasMany(Location::class);
    }

    public function infractions()
    {
    	return $this->hasMany(Infraction::class);
    }

}
