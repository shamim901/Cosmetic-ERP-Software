<?php

namespace App\Http\Controllers\Api\V1\Common;

use App\Http\Controllers\API\V1\APIController;
use App\Http\Resources\Common\GeoResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class GeoController.
 */
class GeoController extends APIController
{
    /**
     * @OA\Get(
     *      path="/divisionsddd",
     *      operationId="getDivisionList",
     *      tags={"Common"},
     *      summary="Get list of division",
     *      description="Returns list of division",
     *      @OA\Parameter(
     *          name="q",
     *          description="Seach by name",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          ),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/GeoResource")
     *       ),
     *      @OA\Response(response=401, description="Unauthenticated"),
     *      @OA\Response(response=403, description="Forbidden"),
     *     )
     * @param Request $request
     * @return GeoResource
     */

     public function divisions(Request $request)
    {
        // print_r("ss"); die();
        $query = DB::table('divisions');
        if ($request->get('q')) {
            $query
                ->where('name', 'LIKE', '%'. $request->get('q') .'%')
                ->orWhere('bn_name', 'LIKE', '%'. $request->get('q') .'%');
        }
        return new GeoResource($query->select(['id', 'bn_name as name'])->get());
    }

        public function emp_role(Request $request)
    {
        // print_r("ss"); die();
        $query = DB::table('emp_role');
         
        return new GeoResource($query->select(['id', 'name'])->get());
    }


    /**
     * @OA\Get(
     *      path="/divisionsddd/{division_id}/districts",
     *      operationId="getDistrictListByDivision",
     *      tags={"Common"},
     *      summary="Get list of district by division",
     *      description="Returns list of district",
     *      @OA\Parameter(
     *          name="division_id",
     *          description="Division Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          ),
     *      ),
     *     @OA\Parameter(
     *          name="q",
     *          description="Seach by name",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          ),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/GeoResource")
     *       ),
     *      @OA\Response(response=401, description="Unauthenticated"),
     *      @OA\Response(response=403, description="Forbidden")
     *     )
     * @param $divisionId
     * @param Request $request
     * @return GeoResource
     */
    public function districtsByDivision($divisionId, Request $request)
    {
        $query = DB::table('districts');
        if ($divisionId) {
            $query->where('division_id', '=', (int)$divisionId);
        }
        if ($request->get('q')) {
            $query
                ->where('name', 'LIKE', '%'. $request->get('q') .'%')
                ->orWhere('bn_name', 'LIKE', '%'. $request->get('q') .'%');
        }
        return new GeoResource($query->select(['id', 'bn_name as name'])->get());
    }

    /**
     * @OA\Get(
     *      path="/districts/{district_id}/upazilas",
     *      operationId="getDistrictListByDivision",
     *      tags={"Common"},
     *      summary="Get list of district by division",
     *      description="Returns list of district",
     *      @OA\Parameter(
     *          name="district_id",
     *          description="District Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          ),
     *      ),
     *     @OA\Parameter(
     *          name="q",
     *          description="Seach by name",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          ),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/GeoResource")
     *       ),
     *      @OA\Response(response=401, description="Unauthenticated"),
     *      @OA\Response(response=403, description="Forbidden")
     *     )
     * @param $districtId
     * @param Request $request
     * @return GeoResource
     */
    public function upazilasByDistrict($districtId, Request $request)
    {
        $query = DB::table('upazilas');
        if ($districtId) {
            $query->where('district_id', '=', (int)$districtId);
        }
        if ($request->get('q')) {
            $query
                ->where('name', 'LIKE', '%'. $request->get('q') .'%')
                ->orWhere('bn_name', 'LIKE', '%'. $request->get('q') .'%');
        }
        return new GeoResource($query->select(['id', 'bn_name as name'])->get());
    }

    /**
     * @OA\Get(
     *      path="/upazilas/{upazila_id}/unions",
     *      operationId="getDistrictListByDivision",
     *      tags={"Common"},
     *      summary="Get list of district by division",
     *      description="Returns list of district",
     *      @OA\Parameter(
     *          name="upazila_id",
     *          description="Upazilas Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          ),
     *      ),
     *     @OA\Parameter(
     *          name="q",
     *          description="Seach by name",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          ),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/GeoResource")
     *       ),
     *      @OA\Response(response=401, description="Unauthenticated"),
     *      @OA\Response(response=403, description="Forbidden")
     *     )
     * @param $upazilaId
     * @param Request $request
     * @return GeoResource
     */
    public function unionsByUpazila($upazilaId, Request $request)
    {
        $query = DB::table('unions');
        if ($upazilaId) {
            $query->where('upazilla_id', '=', (int)$upazilaId);
        }
        if ($request->get('q')) {
            $query
                ->where('name', 'LIKE', '%'. $request->get('q') .'%')
                ->orWhere('bn_name', 'LIKE', '%'. $request->get('q') .'%');
        }
        return new GeoResource($query->select(['id', 'bn_name as name'])->get());
    }

    public function villageByUnion($unionId, Request $request)
    {
        $query = DB::table('villages');
        if ($unionId) {
            $query->where('union_id', '=', (int)$unionId);
        }
        if ($request->get('q')) {
            $query
                ->where('name', 'LIKE', '%'. $request->get('q') .'%')
                ->orWhere('bn_name', 'LIKE', '%'. $request->get('q') .'%');
        }
        return new GeoResource($query->select(['id', 'bn_name as name'])->get());
    }

     public function masjidByUnion($unionId, Request $request)
    {
        $query = DB::table('mosques');
        if ($unionId) {
            $query->where('union_id', '=', (int)$unionId);
        }
        if ($request->get('q')) {
            $query
                ->where('mosques_name', 'LIKE', '%'. $request->get('q') .'%');
        }
        return new GeoResource($query->select(['id', 'mosques_name as name'])->get());
    }

    public function villageSearchByUnion($unionId, Request $request)
    {
        $query = DB::table('villages');
        if ($unionId) {
            $query->where('union_id', '=', (int)$unionId);
        }
        if ($request->get('q')) {
            $query
                ->Where('bn_name', 'LIKE', '%'. $request->get('q') .'%');
        }

        $result=$query->select(['id', 'bn_name as name'])->get();

        $names=array();
        foreach($result as $row){
            $names[]=$row->name;
        }
        echo json_encode($names);
    }

    /**
     * @OA\Get(
     *      path="/districts",
     *      operationId="getDistrictList",
     *      tags={"Common"},
     *      summary="Get list of district",
     *      description="Returns list of district",
     *      @OA\Parameter(
     *          name="q",
     *          description="Seach by name",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          ),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/GeoResource")
     *       ),
     *      @OA\Response(response=401, description="Unauthenticated"),
     *      @OA\Response(response=403, description="Forbidden"),
     *     )
     * @param Request $request
     * @return GeoResource
     */
    public function districts(Request $request)
    {
        $query = DB::table('districts');
        if ($request->get('q')) {
            $query
                ->where('name', 'LIKE', '%'. $request->get('q') .'%')
                ->orWhere('bn_name', 'LIKE', '%'. $request->get('q') .'%');
        }
        return new GeoResource($query->select(['id', 'bn_name as name'])->get());
    }

    /**
     * @OA\Get(
     *      path="/upazilas",
     *      operationId="getUpazilaList",
     *      tags={"Common"},
     *      summary="Get list of upazila",
     *      description="Returns list of upazila",
     *      @OA\Parameter(
     *          name="q",
     *          description="Seach by name",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          ),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/GeoResource")
     *       ),
     *      @OA\Response(response=401, description="Unauthenticated"),
     *      @OA\Response(response=403, description="Forbidden"),
     *     )
     * @param Request $request
     * @return GeoResource
     */
    public function upazilas(Request $request)
    {
        $query = DB::table('upazilas');
        if ($request->get('q')) {
            $query
                ->where('name', 'LIKE', '%'. $request->get('q') .'%')
                ->orWhere('bn_name', 'LIKE', '%'. $request->get('q') .'%');
        }
        return new GeoResource($query->select(['id', 'bn_name as name'])->get());
    }

    /**
     * @OA\Get(
     *      path="/unions",
     *      operationId="getUnionList",
     *      tags={"Common"},
     *      summary="Get list of union",
     *      description="Returns list of union",
     *      @OA\Parameter(
     *          name="q",
     *          description="Seach by name",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          ),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/GeoResource")
     *       ),
     *      @OA\Response(response=401, description="Unauthenticated"),
     *      @OA\Response(response=403, description="Forbidden"),
     *     )
     * @param Request $request
     * @return GeoResource
     */
    public function unions(Request $request)
    {
        $query = DB::table('unions');
        if ($request->get('q')) {
            $query
                ->where('name', 'LIKE', '%'. $request->get('q') .'%')
                ->orWhere('bn_name', 'LIKE', '%'. $request->get('q') .'%');
        }
        return new GeoResource($query->select(['id', 'bn_name as name'])->get());
    }

    public function masjid(Request $request)
    {
        $query = DB::table('mosques');
        if ($request->get('q')) {
            $query
                ->where('mosques_name', 'LIKE', '%'. $request->get('q') .'%');
        }
        return new GeoResource($query->select(['id', 'mosques_name as name'])->get());
    }

    public function villages(Request $request)
    {
        $query = DB::table('villages');
        if ($request->get('q')) {
            $query
                ->where('name', 'LIKE', '%'. $request->get('q') .'%')
                ->orWhere('bn_name', 'LIKE', '%'. $request->get('q') .'%');
        }
        return new GeoResource($query->select(['id', 'bn_name as name'])->get());
    }
}
