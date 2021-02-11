<?php

namespace App\Models\Mosques;

use Illuminate\Database\Eloquent\Model;

class Mosque extends Model
{
    // protected $fillable = ['mosques_name'];
    
    public function Mosque_information_provider()
    {
    	return $this->hasMany('App\Models\Mosques\Mosque_information_provider');
    }

    public function Mosque_institution()
    {
    	return $this->hasMany('App\Models\Mosques\Mosque_institution');
    }

    public function mosque_treasure()
    {
    	return $this->hasMany('App\Models\Mosques\Mosque_treasure');
    }
}
