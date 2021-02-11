<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Mosques\Mosque;
use App\Http\Controllers\CommonController;
use DB;
use Auth;
use Response;
use View;


class ReportController extends Controller
{

    public function topSeller(){

        $division=DB::table('divisions')->get();

        $info = DB::table('ifd_book_sales_mst as bsm')
                ->join('book_sellers','bsm.sell_center_id','=','book_sellers.id')
                ->join('divisions', 'book_sellers.division_id', '=', 'divisions.id')
                ->join('districts', 'book_sellers.distict_id', '=', 'districts.id')
                ->join('upazilas', 'book_sellers.upozila_id', '=', 'upazilas.id')
                ->groupBy('bsm.sell_center_id')
                ->orderBy(DB::raw('SUM(bsm.tot_bill)'),'desc')
                ->select(DB::raw('book_sellers.name, divisions.bn_name as div_name,districts.bn_name as dis_name,upazilas.bn_name as up_name, count(bsm.id) as tot_sale, SUM(bsm.tot_bill) as total_sales'))
                ->get();

        // echo "<pre>"; print_r($info); die();
        return view('backend.report.index',compact('info','division'));  

    } 
}
