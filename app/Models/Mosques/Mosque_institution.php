<?php

namespace App\Models\Mosques;

use Illuminate\Database\Eloquent\Model;

class Mosque_institution extends Model
{
    public function Mosque()
    {
        return $this->belongsTo('App\Models\Mosques\Mosque');
    }
}
