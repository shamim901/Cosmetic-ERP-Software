
<?php

namespace App\Virtual\Resources;

use App\Virtual\Models\Geo;

/**
 * @OA\Schema(
 *     title="GeoResource",
 *     description="Geo resource",
 *     @OA\Xml(
 *         name="GeoResource"
 *     )
 * )
 */
class GeoResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper",
     * )
     *
     * @var Geo[]
     */
    private $data;
}