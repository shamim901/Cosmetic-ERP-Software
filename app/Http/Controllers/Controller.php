<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


 /**
  * @OA\Info(
  *      version="1.0.0",
  *      title="Mosjid Management System (API Docs)",
  * )
  *  @OA\Server(
  *      url=L5_SWAGGER_CONST_HOST,
  *      description="Api Server"
  * )

  */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
