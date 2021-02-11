<?php

namespace App\Http\Controllers\Backend\Training;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Mosques\Mosque;
use App\Http\Controllers\CommonController;
use DB;
use Auth;

class TrainingController extends Controller
{


    // training registration form
    public function registration_form(){

        return view('backend.training.registerForm');        
    }
     
    // save function
    public function save(Request $request){
        
        $data=$request->post();

        $CommonController = new CommonController;
        $reg_code = $CommonController->TrainingCode();
        
        DB::table('training_setup')->insert([
            'name' => $data['name'],
            'code' => $reg_code,
            'number' => $data['duration'], // training duration
            'status' => $data['status'],
            'created_by' =>    Auth::user()->id,
            'created_at' =>  date('Y-m-d H:i:s')
        ]);

        return redirect('admin/train/list');
    }

    // show list by Shamim 
    public function show_list(){

        $info = DB::table('training_setup')->paginate(10);

        $division=DB::table('divisions')->get();

        return view('backend.training.index',compact('info','division'));  
    
    }

     // training edit form
    public function edit_form($id){

        $train_info = DB::table('training_setup')
                        ->where('id',$id)
                        ->first();
        return view('backend.training.updateForm',compact('train_info'));        
    }
     
      // update function
    public function updating(Request $request){
        
        $data=$request->post();


        $affected = DB::table('training_setup')
                    ->where('id', $data['id'])
                    ->update([
                         'name' => $data['name'],
                        'number' => $data['duration'], // training duration
                        'status' => $data['status']
                    ]);

        return redirect('train/list');
    }

    // training list with current status by Shamim 
    public function show_list_new(){

       $division=DB::table('divisions')->get();

       $training_list = DB::table('training_setup')->get();

        $imam_info=DB::table('train_imams')
                    ->join('divisions', 'train_imams.division', '=', 'divisions.id')
                    ->join('districts', 'train_imams.district', '=', 'districts.id')
                    ->join('upazilas', 'train_imams.upazila', '=', 'upazilas.id')
                    ->join('unions', 'train_imams.union', '=', 'unions.id')
                    ->join('imam_registraions', 'train_imams.imam_id', '=', 'imam_registraions.id')
                    ->join('training_setup', 'train_imams.training_id', '=', 'training_setup.id','left')
                    // ->join('villages', 'imam_registraions.village', '=', 'villages.id')

                    ->select('train_imams.*', 'divisions.bn_name as div_name', 'districts.bn_name as dis_name', 'upazilas.bn_name as up_name', 'unions.bn_name as un_name',
                        'imam_registraions.reg_code',
                        'imam_registraions.name as imam_name',
                        'imam_registraions.phone',
                        'imam_registraions.dob','training_setup.name as train_name'
                    )
                    ->paginate(20);

        return view('backend.training.trainee_list',compact('imam_info','division','training_list'));  
    
    }

 
     // Search Panel Result By Shamim
    public function search(Request $request)
    {
        // print_r($_POST); die();
        $condition = null;
        
        if($request->post('train_name'))
        {
            $condition['training_setup.name'] = $request->post('train_name');
        } 

        if($request->post('train_code'))
        {
            $condition['training_setup.code'] = $request->post('train_code');
        } 

        // if($request->post('customer_mobile'))
        // {
        //     $condition['ifd_customer.customer_mobile'] = $request->post('customer_mobile');
        // } 

        if($request->post('from_date'))
        {
            $condition['training_setup.created_at'] = $request->post('from_date');
        } 

        if($request->post('to_date'))
        {
            $condition['training_setup.created_at'] = $request->post('to_date');
        }



        if($request->post('paginate'))
        {
           $paginate = $request->post('paginate');
        }
 
        $info =DB::table('training_setup')                     
                    // ->join('ifd_customer', 'training_setup.customer_id', '=', 'ifd_customer.id')
                    ->where($condition)
                    ->paginate($paginate);
                    
        // print_r($info); die();
        
        return view('backend.training.sindex', compact('info'));
       
    }

    public function approve($id){

        $affected = DB::table('train_imams')
                    ->where('id', $id)
                    ->update([
                        'status' => 2,                        
                    ]);

        return redirect('imam/imam_training_reg_list');
    }

    public function cancel($id){

            $affected = DB::table('train_imams')
                    ->where('id', $id)
                    ->update([
                        'status' => 3,                        
                    ]);

            return redirect('imam/imam_training_reg_list');
    }

    public function delete($id){

        $affected = DB::table('train_imams')
                    ->where('id', $id)
                    ->update([
                        'status' => 4,                        
                    ]);

        return redirect('imam/imam_training_reg_list');

    }




}
