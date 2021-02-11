<?php

namespace App\Models\Mosques;

use Illuminate\Database\Eloquent\Model;

class Mosque_treasure extends Model
{
    public function mosque()
    {
        return $this->belongsTo('App\Models\Mosques\Mosque', 'mosque_id');
    }
}
