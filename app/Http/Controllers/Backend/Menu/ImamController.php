<?php

namespace App\Http\Controllers\Frontend\Imams;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CommonController;
use Illuminate\Http\Request;
use App\Models\Imams\imam_registraions;
use DB;
use Auth;

use App\Models\Mosques\Mosque;


class ImamController extends Controller
{


    // imam registration form
    public function registration_form(){

        $division=DB::table('divisions')->get();
        
        $training_list = DB::table('training_setup')->get();
        
        $batch_list = DB::table('batch_setup')->get();

        // print_r($batch_list); die();
        
        return view('frontend.imam.applicationForm',compact('division','training_list','batch_list'));        
    } 

    // muajjin registration form
    public function mu_registration_form(){
        $division=DB::table('divisions')->get();
        return view('frontend.imam.muaApplicationForm',compact('division'));        
    } 

    // khotib registration form
    public function khotib_registration_form(){
        $division=DB::table('divisions')->get();
        return view('frontend.imam.khotibApplicationForm',compact('division'));        
    }

        // imam traing registration form
    public function trainingRegistration($id){
        $division=DB::table('divisions')->get();

        $mosques=DB::table('mosques')->get();

        $training_list = DB::table('training_setup')->get();

        $imam_info = DB::table('imam_registraions')
                    ->join('divisions', 'imam_registraions.division', '=', 'divisions.id')
                    ->join('districts', 'imam_registraions.district', '=', 'districts.id')
                    ->join('upazilas', 'imam_registraions.upazila', '=', 'upazilas.id')
                    ->join('unions', 'imam_registraions.union', '=', 'unions.id')
                    ->join('imam_educations', 'imam_registraions.id', '=', 'imam_educations.imam_id','left')
                    // ->join('villages', 'imam_registraions.village', '=', 'villages.id')
                    ->join('training_experiences', 'imam_registraions.id', '=', 'training_experiences.imam_id','left')
                    ->join('training_setup', 'training_experiences.training_id', '=', 'training_setup.id','left')
                    ->join('batch_setup', 'training_experiences.batch_id', '=', 'batch_setup.id','left')
                    ->select('imam_registraions.*', 'divisions.bn_name as div_name', 'districts.bn_name as dis_name', 'upazilas.bn_name as up_name', 'unions.bn_name as un_name','batch_setup.name as batch_name','training_setup.name as train_name','imam_educations.exam_name as e_name',
                        'imam_educations.board_uni as b_name',
                        'imam_educations.institue_name as i_name',
                        'imam_educations.depart as d_name',
                        'imam_educations.result as rsult',
                        'imam_educations.year as y'
                    )
                    ->where('imam_registraions.id',$id)->first();

        // print_r($imam_info); die();


        return view('frontend.imam.trainApplicationForm',compact('division','imam_info','mosques','training_list'));        
    }

    // imam save function
    public function saveImamInfo(Request $request){
        
        // print_r($_POST); die();

        $data=$request->post();

        $imam_last_id = DB::table('imam_registraions')
                    ->select('id as tot_imam')
                    ->where('division',$data['division_id'])
                    ->where('district',$data['district_id'])
                    ->where('upazila',$data['upazilla_id'])
                    ->where('union',$data['union_id'])
                    
                    ->orderBy('created_at', 'desc')->get();

        
        if (empty($imam_last_id)) {
            $id = 0001; 
        }
        else{
             $id = count($imam_last_id) + 1;
        }

        $CommonController = new CommonController;
        $reg_code = $CommonController->regCodeGenarate($data['division_id'],$data['district_id'],$data['upazilla_id'], $data['union_id'],$id);


        DB::table('imam_registraions')->insert([
            'name' => $data['imam_name'],
            'reg_code' => $reg_code,
            'division' => $data['division_id'],
            'district' => $data['district_id'],
            'upazila' => $data['upazilla_id'],
            'union' => $data['union_id'],
            'village' => $data['village_id'],

            'father_name' => $data['f_name'],
            'mother_name' => $data['m_name'],
            'dob' => $data['dob'],
            'img' => isset($data['img'])? $data['img']:'',
            'phone' => isset($data['phone'])? $data['phone']:0,
            
            'exam_name' => 0,
            'board_uni' => 0,
            'institue_name' => 0,
            'depart' => 0,
            'result' =>0,
            'year' => 0,
            'salary' => isset($data['salary'])?$data['salary']:0,
            'created_by' =>  Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
            'nid' => $data['nid'],

            // 'training_id'  => $data['train_name'],
            // 'batch_id'  => $data['batch_name']

        ]);

        $imam_id = DB::getPdo()->lastInsertId();

       // print_r($data['train_name'][0]); die();

        if(!empty($data['train_name'][0])){
            for ($i=0; $i < count($data['train_name']); $i++) { 

            $training_exp_add = array(
                'imam_id' =>     $imam_id,
                'training_id' =>  $data['train_name'][$i],
                'batch_id' => isset($data['batch_name'][$i])?$data['batch_name'][$i]:0,
                'created_by' =>  Auth::user()->id,
                'created_at' => date('Y-m-d H:i:s')
            );

            DB::table('training_experiences')->insert($training_exp_add);

           }
        }

       
        // print_r($training_exp_add); die();
       
        for ($i=0; $i < count($data['exam_name']); $i++) { 
             
        $education_info = array(
            'exam_name' =>  $data['exam_name'][$i],
            'board_uni' => $data['board_name'][$i],
            'institue_name' => $data['institue_name'][$i],
            'depart' => $data['deprt_name'][$i],
            'result' => $data['result'][$i],
            'year' => $data['year'][$i],
            'created_at' => date('Y-m-d H:i:s'),
            'imam_id' => $imam_id
            
        );
         
        DB::table('imam_educations')->insert($education_info);
        }

        return redirect('imam/showImamList');
    }

     // mua save function
    public function saveMuaInfo(Request $request){
        
        $data=$request->post();

        $mua_count = DB::table('mua_registration')
                    ->select('id as tot_imam')
                    ->where('division',$data['division_id'])
                    ->where('district',$data['district_id'])
                    ->where('upazila',$data['upazilla_id'])
                    ->where('union',$data['union_id'])                    
                    ->orderBy('created_at', 'desc')->get();

        
        if (empty($mua_count)) {
            $id = 0001; 
        }
        else{
             $id = count($mua_count) + 1;
        }

        $CommonController = new CommonController;
        $reg_code = $CommonController->regCodeGenarate($data['division_id'],$data['district_id'],$data['upazilla_id'], $data['union_id'],$id);

        DB::table('mua_registration')->insert([
            'name' => $data['imam_name'],
            'reg_code' => $reg_code,
            'division' => $data['division_id'],
            'district' => $data['district_id'],
            'upazila' => $data['upazilla_id'],
            'union' => $data['union_id'],
            'village' => $data['village_id'],

            'father_name' => $data['f_name'],
            'mother_name' => $data['m_name'],
            'dob' => $data['dob'],
            'img' => $data['img'],
            'phone' => $data['phone'],
             
            'salary' => isset($data['salary'])?$data['salary']:0,
            'created_by' =>  Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s')
        ]);


        $muajjin_id = DB::getPdo()->lastInsertId();

        // print_r($muajjin_id); die();


        for ($i=0; $i < count($data['exam_name']); $i++) {              
        $education_info = array(
            'muajjin_id' =>   $muajjin_id,
            'exam_name' =>  $data['exam_name'][$i],
            'board_uni' => $data['board_name'][$i],
            'institue_name' => $data['institue_name'][$i],
            'depart' => $data['deprt_name'][$i],
            'result' => $data['result'][$i],
            'year' => $data['year'][$i],
            'created_at' => date('Y-m-d H:i:s')
            
        );
         
        DB::table('imam_educations')->insert($education_info);
        }


        return redirect('imam/showMuaList');
    }


     // imam save function
    public function saveKhotibInfo(Request $request){
        
        $data=$request->post();

       $khotib = DB::table('khotib_registration')
                    ->select('id as tot_imam')
                    ->where('division',$data['division_id'])
                    ->where('district',$data['district_id'])
                    ->where('upazila',$data['upazilla_id'])
                    ->where('union',$data['union_id'])                    
                    ->orderBy('created_at', 'desc')->get();

        
        if (empty($khotib)) {
            $id = 0001; 
        }
        else{
             $id = count($khotib) + 1;
        }

        $CommonController = new CommonController;
        $reg_code = $CommonController->regCodeGenarate($data['division_id'],$data['district_id'],$data['upazilla_id'], $data['union_id'],$id);

        DB::table('khotib_registration')->insert([
            'name' => $data['imam_name'],
            'reg_code' => $reg_code,
            'division' => $data['division_id'],
            'district' => $data['district_id'],
            'upazila' => $data['upazilla_id'],
            'union' => $data['union_id'],
            'village' => $data['village_id'],

            'father_name' => $data['f_name'],
            'mother_name' => $data['m_name'],
            'dob' => $data['dob'],
            'img' => $data['img'],
            'phone' => $data['phone'],
            
            'exam_name' =>  $data['exam_name'],
            'board_uni' => $data['board_name'],
            'institue_name' => $data['institue_name'],
            'depart' => $data['deprt_name'],
            'result' => $data['result'],
            'year' => $data['year'],
            'salary' => isset($data['salary'])?$data['salary']:0,
            'created_by' =>  Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s')
        ]);


        // $prescription_update = array(
        //     'exam_name' =>  $data['exam_name'],
        //     'board_uni' => $data['board_name'],
        //     'institue_name' => $data['institue_name'],
        //     'depart' => $data['deprt_name'],
        //     'result' => $data['result'],
        //     'year' => $data['year']
            
        // );

         
         // DB::table('imam_educations')->insert([
            // 'exam_name' =>  $data['exam_name'],
            // 'board_uni' => $data['board_name'],
            // 'institue_name' => $data['institue_name'],
            // 'depart' => $data['deprt_name'],
            // 'result' => $data['result'],
            // 'year' => $data['year']
         // ]);


        return redirect('imam/showKhotibList');
    }

    // show imam list 

    public function showImamList(){

        $division = DB::table('divisions')->get();
        $imam_info = imam_registraions::join('divisions', 'imam_registraions.division', '=', 'divisions.id')
                    ->join('districts', 'imam_registraions.district', '=', 'districts.id')
                    ->join('upazilas', 'imam_registraions.upazila', '=', 'upazilas.id')
                    ->join('unions', 'imam_registraions.union', '=', 'unions.id')
                    // ->join('villages', 'imam_registraions.village', '=', 'villages.id')
                    ->select('imam_registraions.*', 'divisions.bn_name as div_name', 'districts.bn_name as dis_name', 'upazilas.bn_name as up_name', 'unions.bn_name as un_name')
                    ->orderBy('created_at', 'desc')
                    ->paginate(25);


        return view('frontend.imam.index',compact('imam_info','division'));  
    }

      // show mua list 

    public function showMuaList(){

        $division = DB::table('divisions')->get();
        $imam_info = DB::table('mua_registration')
                    ->join('divisions', 'mua_registration.division', '=', 'divisions.id')
                    ->join('districts', 'mua_registration.district', '=', 'districts.id')
                    ->join('upazilas', 'mua_registration.upazila', '=', 'upazilas.id')
                    ->join('unions', 'mua_registration.union', '=', 'unions.id')
                    // ->join('villages', 'imam_registraions.village', '=', 'villages.id')
                    ->select('mua_registration.*', 'divisions.bn_name as div_name', 'districts.bn_name as dis_name', 'upazilas.bn_name as up_name', 'unions.bn_name as un_name')
                    ->paginate(20);


        return view('frontend.imam.mua_index',compact('imam_info','division'));  
    }

      // show khotib list 

    public function showKhotibList(){

        $division = DB::table('divisions')->get();
        $imam_info = DB::table('khotib_registration')
                    ->join('divisions', 'khotib_registration.division', '=', 'divisions.id')
                    ->join('districts', 'khotib_registration.district', '=', 'districts.id')
                    ->join('upazilas', 'khotib_registration.upazila', '=', 'upazilas.id')
                    ->join('unions', 'khotib_registration.union', '=', 'unions.id')
                    // ->join('villages', 'imam_registraions.village', '=', 'villages.id')
                    ->select('khotib_registration.*', 'divisions.bn_name as div_name', 'districts.bn_name as dis_name', 'upazilas.bn_name as up_name', 'unions.bn_name as un_name')
                    ->paginate(20);


        return view('frontend.imam.khotib_index',compact('imam_info','division'));  
    }

    public function saveTrainImam(Request $request){

        $data=$request->post();

         DB::table('train_imams')->insert([
            'imam_id' => $data['imam_id'],
            'masjid_id' =>  $data['mosque'],
            'division' => $data['division_id'],
            'district' => $data['district_id'],
            'upazila' => $data['upazilla_id'],
            'union' => $data['union_id'],
            'village' => $data['village_id'],
            'created_at' => date('Y-m-d'),
            'created_by' => Auth::user()->id,
            'training_id' => $data['train_name'],
            'status' => 1
        ]);

          return redirect('imam/imam_training_reg_list');
    }


    public function imam_training_reg_list(){

        $division=DB::table('divisions')->get();

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
                    ->where('train_imams.status',1)
                    ->paginate(20);

        // print_r($imam_info); die();
        return view('frontend.imam.trainee_list',compact('imam_info','division'));  
    }


      // Imam Search Panel Result By Shamim
    public function searchPanel(Request $request)
    {
        // print_r($_POST); die();
        $division=DB::table('divisions')->get();

        $condition = null;
        
        if($request->post('division_id'))
        {
            $condition['imam_registraions.division'] = $request->post('division_id');
        }

        if($request->post('district_id'))
        {
            $condition['imam_registraions.district'] = $request->post('district_id');
        }

        if($request->post('upazilla_id'))
        {
            $condition['imam_registraions.upazila'] = $request->post('upazilla_id');
        }

        if($request->post('union_id'))
        {
            $condition['imam_registraions.union'] = $request->post('union_id');
        }

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
         if($request->post('nid'))
        {
            $condition['imam_registraions.nid'] = $request->post('nid');
        }


        if($request->post('paginate'))
        {
           $paginate = $request->post('paginate');
        }

        $imam_info = DB::table('imam_registraions')
                    ->join('divisions', 'imam_registraions.division', '=', 'divisions.id')
                    ->join('districts', 'imam_registraions.district', '=', 'districts.id')
                    ->join('upazilas', 'imam_registraions.upazila', '=', 'upazilas.id')
                    ->join('unions', 'imam_registraions.union', '=', 'unions.id')
                    // ->join('villages', 'library_applications.village', '=', 'villages.id')
                    ->select('imam_registraions.*', 'divisions.bn_name as div_name', 'districts.bn_name as dis_name', 'upazilas.bn_name as up_name','unions.bn_name as un_name')
                    ->where($condition)->paginate($paginate);
        
        return view('frontend.imam.index', compact('imam_info','division'));

       
    }


      // Training Req Imam Search Panel Result By Shamim
    public function trainingReqSearchPanel(Request $request)
    {
        // print_r($_POST); die();
        $division=DB::table('divisions')->get();

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
                    // ->join('villages', 'library_applications.village', '=', 'villages.id')
                    ->select('train_imams.*', 'divisions.bn_name as div_name', 'districts.bn_name as dis_name', 'upazilas.bn_name as up_name', 'unions.bn_name as un_name',
                        'imam_registraions.reg_code',
                        'imam_registraions.name as imam_name',
                        'imam_registraions.phone',
                        'imam_registraions.dob'
                    )
                    ->where($condition)->paginate($paginate);

        // echo "<pre>"; print_r($imam_info); die();
        
        return view('frontend.imam.trainee_list', compact('imam_info','division'));

       
    }


      // muajjin Search Panel Result By Shamim
    public function muaSearchPanel(Request $request)
    {
        // print_r($_POST); die();
        $division=DB::table('divisions')->get();

        $condition = null;
        
        if($request->post('division_id'))
        {
            $condition['mua_registration.division'] = $request->post('division_id');
        }

        if($request->post('district_id'))
        {
            $condition['mua_registration.district'] = $request->post('district_id');
        }

        if($request->post('upazilla_id'))
        {
            $condition['mua_registration.upazila'] = $request->post('upazilla_id');
        }

        if($request->post('union_id'))
        {
            $condition['mua_registration.union'] = $request->post('union_id');
        }

        if($request->post('reg_code'))
        {
            $condition['mua_registration.reg_code'] = $request->post('reg_code');
        }

        if($request->post('phone'))
        {
            $condition['mua_registration.phone'] = $request->post('phone');
        } 

        if($request->post('imam_name'))
        {
            $condition['mua_registration.name'] = $request->post('imam_name');
        }


        if($request->post('paginate'))
        {
           $paginate = $request->post('paginate');
        }

        $imam_info = DB::table('mua_registration')
                    ->join('divisions', 'mua_registration.division', '=', 'divisions.id')
                    ->join('districts', 'mua_registration.district', '=', 'districts.id')
                    ->join('upazilas', 'mua_registration.upazila', '=', 'upazilas.id')
                    ->join('unions', 'mua_registration.union', '=', 'unions.id')
                    // ->join('villages', 'library_applications.village', '=', 'villages.id')
                    ->select('mua_registration.*', 'divisions.bn_name as div_name', 'districts.bn_name as dis_name', 'upazilas.bn_name as up_name','unions.bn_name as un_name')
                    ->where($condition)->paginate($paginate);
        
        return view('frontend.imam.mua_index', compact('imam_info','division'));

       
    }

    // khotib Search Panel Result By Shamim
    public function khotibSearchPanel(Request $request)
    {
        // print_r($_POST); die();
        $division=DB::table('divisions')->get();

        $condition = null;
        
        if($request->post('division_id'))
        {
            $condition['khotib_registration.division'] = $request->post('division_id');
        }

        if($request->post('district_id'))
        {
            $condition['khotib_registration.district'] = $request->post('district_id');
        }

        if($request->post('upazilla_id'))
        {
            $condition['khotib_registration.upazila'] = $request->post('upazilla_id');
        }

        if($request->post('union_id'))
        {
            $condition['khotib_registration.union'] = $request->post('union_id');
        }

        if($request->post('reg_code'))
        {
            $condition['khotib_registration.reg_code'] = $request->post('reg_code');
        }

        if($request->post('phone'))
        {
            $condition['khotib_registration.phone'] = $request->post('phone');
        } 

        if($request->post('imam_name'))
        {
            $condition['khotib_registration.name'] = $request->post('imam_name');
        }


        if($request->post('paginate'))
        {
           $paginate = $request->post('paginate');
        }

        $imam_info = DB::table('khotib_registration')
                    ->join('divisions', 'khotib_registration.division', '=', 'divisions.id')
                    ->join('districts', 'khotib_registration.district', '=', 'districts.id')
                    ->join('upazilas', 'khotib_registration.upazila', '=', 'upazilas.id')
                    ->join('unions', 'khotib_registration.union', '=', 'unions.id')
                    // ->join('villages', 'library_applications.village', '=', 'villages.id')
                    ->select('khotib_registration.*', 'divisions.bn_name as div_name', 'districts.bn_name as dis_name', 'upazilas.bn_name as up_name','unions.bn_name as un_name')
                    ->where($condition)->paginate($paginate);
        
        return view('frontend.imam.khotib_index', compact('imam_info','division'));

       
    }


    // imam edit by Shamim
    public function edit($id){
        $division=DB::table('divisions')->get();

        $mosques=DB::table('mosques')->get();

        $training_list = DB::table('training_setup')->get();

        $batch_list = DB::table('batch_setup')->get();

        $imam_info = DB::table('imam_registraions')
                    ->join('divisions', 'imam_registraions.division', '=', 'divisions.id')
                    ->join('districts', 'imam_registraions.district', '=', 'districts.id')
                    ->join('upazilas', 'imam_registraions.upazila', '=', 'upazilas.id')
                    ->join('unions', 'imam_registraions.union', '=', 'unions.id')
                    ->join('imam_educations', 'imam_registraions.id', '=', 'imam_educations.imam_id','left')
                    // ->join('villages', 'imam_registraions.village', '=', 'villages.id')
                    ->join('training_experiences', 'imam_registraions.id', '=', 'training_experiences.imam_id','left')
                    ->join('training_setup', 'training_experiences.training_id', '=', 'training_setup.id','left')
                    ->join('batch_setup', 'training_experiences.batch_id', '=', 'batch_setup.id','left')
                    ->select('imam_registraions.*', 'divisions.bn_name as div_name', 'districts.bn_name as dis_name', 'upazilas.bn_name as up_name', 'unions.bn_name as un_name','batch_setup.name as batch_name','training_setup.name as train_name','imam_educations.exam_name as e_name',
                        'imam_educations.board_uni as b_name',
                        'imam_educations.institue_name as i_name',
                        'imam_educations.depart as d_name',
                        'imam_educations.result as rsult',
                        'imam_educations.year as y'
                    )
                    ->where('imam_registraions.id',$id)->first();

        // print_r($imam_info); die();


        return view('frontend.imam.editImamForm',compact('division','imam_info','mosques','training_list','batch_list'));        
    }


      // update function
    public function update(Request $request){
        
        $data=$request->post();

        // print_r($data); die();


        $affected = DB::table('imam_registraions')
                    ->where('id', $data['id'])
                    ->update([
                        'name' => $data['imam_name'],
                        'reg_code' => $data['reg'],
                        'division' => $data['division_id'],
                        'district' => $data['district_id'],
                        'upazila' => $data['upazilla_id'],
                        'union' => $data['union_id'],
                        'village' => $data['village_id'],

                        'father_name' => $data['f_name'],
                        'mother_name' => $data['m_name'],
                        'dob' => $data['dob'],
                        'img' => $data['img'],
                        'phone' => $data['phone'],
                        
                        'exam_name' => 0,
                        'board_uni' => 0,
                        'institue_name' => 0,
                        'depart' => 0,
                        'result' =>0,
                        'year' => 0,
                        'salary' => isset($data['salary'])?$data['salary']:0,
                        'created_by' =>  Auth::user()->id,
                        'created_at' => date('Y-m-d H:i:s'),
                    ]);

        // print_r($affected); die();
         if(!empty($data['train_name'][0])){
            for ($i=0; $i < count($data['train_name']); $i++) { 

                    $affected2 = DB::table('training_experiences')
                    ->where('imam_reg_num', $data['id'])
                    ->update([
                        'imam_reg_num' =>     $data['id'],
                        'training_id' =>  $data['train_name'][$i],
                        'batch_id' => $data['batch_name'][$i],
                        'created_by' =>  Auth::user()->id,
                        'created_at' => date('Y-m-d H:i:s')
                    ]);
        }
        }

        for ($i=0; $i < count($data['exam_name']); $i++) { 
        
        $affected3 = DB::table('imam_educations')
                    ->where('imam_id', $data['id'])
                    ->update([
                        'exam_name' =>  $data['exam_name'][$i],
                        'board_uni' => $data['board_name'][$i],
                        'institue_name' => $data['institue_name'][$i],
                        'depart' => $data['deprt_name'][$i],
                        'result' => $data['result'][$i],
                        'year' => $data['year'][$i],
                        'created_at' => date('Y-m-d H:i:s'),
                        'imam_id' =>  $data['id']
                    ]);

        }


        return redirect('imam/showImamList');
    }

       public function mosjid_pending_list()
    {

        $division=DB::table('divisions')->get();

        $user=Auth::user();

        $mosque = Mosque::where('region','=',$user->division)->where('district','=',$user->district)->where('upazila','=',$user->upazila)->where('union','=',$user->union)->where('status','=',0)->get();
        
        return view('frontend.mosque.mosque_authentic_list', compact('mosque','division'));
    }


        // imam traing registration form
    public function authentic_mosjid($id){
        
        $affected = DB::table('mosques')
                    ->where('id',$id)
                    ->update([
                        'status' =>1,
                        
                    ]);

        return redirect()->route('imam.mosjid_pending_list'); 
    }



}
