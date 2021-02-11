<?php

namespace App\Http\Resources\Common;

use Illuminate\Http\Resources\Json\JsonResource;

class GeoResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
