<?php

namespace App\Http\Controllers\Backend\Batchs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Mosques\Mosque;
use App\Http\Controllers\CommonController;
use DB;
use Auth;

class BatchController extends Controller
{


    // batch registration form
    public function registration_form(){

        return view('backend.batch.registerForm');        
    }
     
    // save function
    public function save(Request $request){

        // print_r("ok"); die();
        
        $data=$request->post();


        $CommonController = new CommonController;
        $reg_code = $CommonController->batchCode();
        
        DB::table('batch_setup')->insert([
            'name' => $data['name'],
            'code' =>  $reg_code,
            // 'number' => $data['duration'], // training duration
            'date_from' => $data['duration_start'],
            'date_to' => $data['duration_end'],
            'status' => $data['status']
        ]);

        return redirect()->route('admin.batch.list');
    }

    //  // save function
    // public function saveOfc(Request $request){

    //     $data=$request->post();

    //     print_r($data); die();

    //     $CommonController = new CommonController;
    //     $reg_code = $CommonController->batchCode();
        
    //     DB::table('batch_setup')->insert([
    //         'name' => $data['name'],
    //         'code' =>  $reg_code,
    //         // 'number' => $data['duration'], // training duration
    //         'date_from' => $data['duration_start'],
    //         'date_to' => $data['duration_end'],
    //         'status' => $data['status']
    //     ]);

    //     return redirect()->route('admin.batch.list');
    // }

    // show list by Shamim 
    public function show_list(){

        $info = DB::table('batch_setup')->paginate(10);

        $division=DB::table('divisions')->get();

        return view('backend.batch.index',compact('info','division'));  
    
    }

      // batch update form
    public function update_form($id){

        
        $batch_info = DB::table('batch_setup')
                        ->where('id',$id)
                        ->first();
        // print_r($batch_info); die();

        return view('backend.batch.updateForm',compact('batch_info'));        
    }

     // update function
    public function updating(Request $request){
        
        $data=$request->post();


        $affected = DB::table('batch_setup')
                    ->where('id', $data['id'])
                    ->update([
                        'name' => $data['name'],
                         'code' =>  0,
                        'date_from' => $data['duration_start'],
                        'date_to' => $data['duration_end'],
                        'status' => $data['status']
                    ]);

        return redirect()->route('admin.batch.list');
        
    }


    public function ofice_info(){

        $user=Auth::user();

        $district_office = DB::table('district_office')                   
                                ->where('id',$user->district)
                                ->where('status',1)
                                ->select('district_office.*')->first();

        return view('frontend.ofice_info_edit',compact('district_office'));  
    
    }

        public function ofice_info_new(){
        $user=Auth::user();

        $district_office = DB::table('district_office')                   
                                ->where('id',$user->district)
                                ->where('status',1)
                                ->select('district_office.*')->first();

        return view('backend.ofice_info_edit',compact('district_office'));  
    
    }

}
