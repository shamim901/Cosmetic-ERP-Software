<?php

namespace App\Models\Mosques;

use Illuminate\Database\Eloquent\Model;

class Mosque_information_provider extends Model
{
    public function Mosque()
    {
        return $this->belongsTo('App\Models\Mosques\Mosque');
    }
}
