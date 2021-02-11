<?php

namespace App\Http\Controllers\Backend\EmpRole;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Mosques\Mosque;
use App\Http\Controllers\CommonController;
use DB;
use Auth;

class EmpRoleController extends Controller
{


    // training registration form
    public function registration_form(){

        return view('backend.emp_role.registerForm');        
    }
     
    // save function
    public function save(Request $request){
              
        $data=$request->post();        
        DB::table('emp_role')->insert([
            'name' => $data['name'],            
            'status' => $data['status'],
            'created_by' =>    Auth::user()->id,
            'created_at' =>  date('Y-m-d H:i:s')
        ]);
         return redirect('/admin/emp_role/list');
    }

    // show list by Shamim 
    public function show_list(){

        $info = DB::table('emp_role')->get();
        // $division=DB::table('divisions')->get();
        return view('backend.emp_role.index',compact('info'));  
    
    }

     // training edit form
    public function edit_form($id){

        $info = DB::table('emp_role')
                        ->where('id',$id)
                        ->first();
        // print_r($info); die();
        return view('backend.emp_role.updateForm',compact('info'));        
    }
     
      // update function
    public function updating(Request $request){
        
        $data=$request->post();
        // print_r($data); die();
        $affected = DB::table('emp_role')
                    ->where('id', $data['id'])
                    ->update([
                         'name' => $data['name'],                         
                        'status' => $data['status']
                    ]);

        return redirect('/admin/emp_role/list');
    }
 

}
