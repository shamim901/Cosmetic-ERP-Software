<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\DashboardViewRequest;
use Auth;
use DB;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(DashboardViewRequest $request)
    {
    	 $user=Auth::user();

        $district_office = DB::table('district_office')                   
                                ->where('id',$user->district)
                                ->where('status',1)
                                ->select('district_office.*')->first();

       
        if (empty($district_office)) {
              return view('frontend.ofice_info');          
        }
        else{ 
             return view('frontend.user.dashboard');    
        }
    }
}
