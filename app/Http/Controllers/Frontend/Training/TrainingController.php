<?php

namespace App\Http\Controllers\Frontend\Training;

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

        return view('frontend.training.registerForm');        
    }
     
    // save function
    public function save(Request $request){
        
        $data=$request->post();

        $CommonController = new CommonController;
        $reg_code = $CommonController->TrainingCode();
        
        DB::table('training_setup')->insert([
            'name' => $data['name'],
            'code' =>  $reg_code,
            'number' => $data['duration'], // training duration
            'status' => $data['status']
        ]);

        return redirect()->route('admin.train.list');
    }

    // show list by Shamim 
    public function show_list(){

        $info = DB::table('training_setup')->get();

        $division=DB::table('divisions')->get();

        return view('frontend.training.index',compact('info','division'));  
    
    }

     // training edit form
    public function edit_form($id){

        $train_info = DB::table('training_setup')
                        ->where('id',$id)
                        ->first();
        return view('frontend.training.updateForm',compact('train_info'));        
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

        return redirect()->route('admin.train.list');
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

        return view('frontend.training.trainee_list',compact('imam_info','division','training_list'));  
    
    }


    // Training  Search Panel Result By Shamim
    public function trainingSearchPanel(Request $request)
    {
        // print_r($_POST); die();
        $division=DB::table('divisions')->get();

        $training_list = DB::table('training_setup')->get();

        $condition = null;
        
        if($request->post('division_id'))
        {
            $condition['train_imams.division'] = $request->post('division_id');
        }

        if($request->post('district_id'))
        {
            $condition['train_imams.district'] = $request->post('district_id');
        }

        if($request->post('upazilla_id'))
        {
            $condition['train_imams.upazila'] = $request->post('upazilla_id');
        }

        // if($request->post('union_id'))
        // {
        //     $condition['imam_registraions.union'] = $request->post('union_id');
        // }

        if($request->post('reg_code'))
        {
            $condition['imam_registraions.reg_code'] = $request->post('reg_code');
        }

        if($request->post('phone'))
        {
            $condition['imam_registraions.phone'] = $request->post('phone');
        } 

        if($request->post('imam_name'))
        {
            $condition['imam_registraions.name'] = $request->post('imam_name');
        }

        if($request->post('training_id'))
        {
            $condition['train_imams.training_id'] = $request->post('training_id');
        }        


        if($request->post('status'))
        {
            $condition['train_imams.status'] = $request->post('status');
        }

        if($request->post('paginate'))
        {
           $paginate = $request->post('paginate');
        }

        $imam_info = DB::table('train_imams')
                    ->join('divisions', 'train_imams.division', '=', 'divisions.id')
                    ->join('districts', 'train_imams.district', '=', 'districts.id')
                    ->join('upazilas', 'train_imams.upazila', '=', 'upazilas.id')
                    ->join('unions', 'train_imams.union', '=', 'unions.id')
                    ->join('imam_registraions', 'train_imams.imam_id', '=', 'imam_registraions.id')
                     ->join('training_setup', 'train_imams.training_id', '=', 'training_setup.id','left')
                    // ->join('villages', 'library_applications.village', '=', 'villages.id')
                    ->select('train_imams.*', 'divisions.bn_name as div_name', 'districts.bn_name as dis_name', 'upazilas.bn_name as up_name', 'unions.bn_name as un_name',
                        'imam_registraions.reg_code',
                        'imam_registraions.name as imam_name',
                        'imam_registraions.phone',
                        'imam_registraions.dob','training_setup.name as train_name'
                    )
                    ->where($condition)->paginate($paginate);

        // echo "<pre>"; print_r($imam_info); die();
        
        return view('frontend.training.trainee_list', compact('imam_info','division','training_list'));

       
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
