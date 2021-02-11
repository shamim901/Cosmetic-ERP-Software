<?php

namespace App\Virtual\Models;

/**
 * @OA\Schema(
 *     title="Geo",
 *     description="Geo model",
 *     @OA\Xml(
 *         name="Geo"
 *     )
 * )
 */
class Geo
{

    /**
     * @OA\Property(
     *     title="ID",
     *     description="ID of the table",
     * )
     *
     * @var integer
     */
    private $id;

    /**
     * @OA\Property(
     *      title="Name",
     *      description="English Name",
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="Bangla Name",
     *      description="Bangla Name",
     * )
     *
     * @var string
     */
    public $bn_name;
}