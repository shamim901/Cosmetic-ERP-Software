<?php

namespace App\Http\Controllers\Backend\Authors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Mosques\Mosque;
use App\Http\Controllers\CommonController;
use DB;
use Auth;

class AuthorController extends Controller
{


    // batch registration form
    public function registration_form(){
        $division=DB::table('divisions')->get();
        return view('backend.author.registerForm',compact('division'));        
    }
     
    // // save function
    // public function save(Request $request){

    //     // print_r($_POST); die();
        
    //     $data=$request->post();

    //       $imam_last_id = DB::table('imam_registraions')
    //                 ->select('id as tot_imam')
    //                 ->where('division',$data['division_id'])
    //                 ->where('district',$data['district_id'])
    //                 ->where('upazila',$data['upazilla_id'])
    //                 ->where('union',$data['union_id'])
                    
    //                 ->orderBy('created_at', 'desc')->get();

        
    //     if (empty($imam_last_id)) {
    //         $id = 0001; 
    //     }
    //     else{
    //          $id = count($imam_last_id) + 1;
    //     }

    //     $CommonController = new CommonController;
    //     $reg_code = $CommonController->regCodeGenarate($data['division_id'],$data['district_id'],$data['upazilla_id'], $data['union_id'],$id);


    //     $CommonController = new CommonController;
    //     $reg_code = $CommonController->batchCode();

    //      DB::table('author')->insert([
    //         'name' => $data['name'],            
    //         'mobile' => $data['mobile'],            
    //         'code' => $reg_code,            
    //         'division_id' => $data['division_id'],
    //         'distict_id' => $data['district_id'],
    //         'upozila_id' => $data['upazilla_id'],
    //         'union_id' => $data['union_id'],
    //         'village' => $data['village_id']
    //     ]);

    //     return redirect('admin/author/list');
    // }


            // save author function
    public function save(Request $request){

        // print_r($_POST); die();
        
        $data=$request->post();

        $author_id = DB::table('author')
                    ->select('id')                    
                    ->orderBy('created_at', 'desc')->first();

        // print_r($author_id->id); die();
        
        if (empty($author_id)) {
            $id = 0001; 
        }
        else{
             $id = $author_id->id + 1;
        }

        $CommonController = new CommonController;
        $reg_code = $CommonController->regCodeGenarate($data['division_id'],$data['district_id'],$data['upazilla_id'], $data['union_id'],$id);
        
         DB::table('author')->insert([
            'name' => $data['name'],            
            'mobile' => $data['mobile'],            
            'code' => $reg_code,            
            'division_id' => $data['division_id'],
            'distict_id' => $data['district_id'],
            'upozila_id' => $data['upazilla_id'],
            'union_id' => $data['union_id'],
            'village' => $data['village_id']
        ]);

        return redirect('admin/author/list');
    }


    // show list by Shamim 
    public function show_list(){

        $info = DB::table('author')
                    ->join('divisions', 'author.division_id', '=', 'divisions.id')
                    ->join('districts', 'author.distict_id', '=', 'districts.id')
                    ->join('upazilas', 'author.upozila_id', '=', 'upazilas.id')
                    ->join('unions', 'author.union_id', '=', 'unions.id')
                    ->orderBy('author.id','desc')
                    ->select('author.*', 'divisions.bn_name as div_name', 'districts.bn_name as dis_name', 'upazilas.bn_name as up_name')
        ->get();

        $division=DB::table('divisions')->get();

        return view('backend.author.index',compact('info','division'));  
    
    }

      // batch update form
    public function update_form($id){

        
        $batch_info = DB::table('batch_setup')
                        ->where('id',$id)
                        ->first();
        // print_r($batch_info); die();

        return view('backend.author.updateForm',compact('batch_info'));        
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

        return redirect('batch/list');
    }

    // Search Panel Result By Shamim
    public function search(Request $request)
    {
        // print_r($_POST); die();
        $condition = null;                
        if($request->post('name'))
        {
            $condition['author.name'] = $request->post('name');
        } 

        if($request->post('mobile'))
        {
            $condition['author.mobile'] = $request->post('mobile');
        } 

        if($request->post('division_id'))
        {
            $condition['author.division_id'] = $request->post('division_id');
        }

        if($request->post('district_id'))
        {
            $condition['author.distict_id'] = $request->post('district_id');
        }

        if($request->post('upazilla_id'))
        {
            $condition['author.upozila_id'] = $request->post('upazilla_id');
        }


        if($request->post('paginate'))
        {
           $paginate = $request->post('paginate');
        }

        // $category = DB::table('book_category')->get();

        $info = DB::table('author')                     
                    // ->select('books.*')
                    ->join('divisions', 'author.division_id', '=', 'divisions.id')
                    ->join('districts', 'author.distict_id', '=', 'districts.id')
                    ->join('upazilas', 'author.upozila_id', '=', 'upazilas.id')
                    ->select('author.*','divisions.bn_name as div_name', 'districts.bn_name as dis_name', 'upazilas.bn_name as up_name')
                    ->where($condition)->paginate($paginate);

        // print_r(compact('book_info')); die();

        $division = DB::table('divisions')->get();
        
        return view('backend.author.index', compact('info','division'));       
    }

     public function authorNameSearch(Request $request)
    {
         if ($query = $request->post('q')) 
            {     
             $results =  DB::table('author')
                        ->where('name','like', '%'.$query.'%')
                        // ->select('books.id','books.name','stocks.quantity_level')
                        // ->where('stocks',)
                        ->get();

            $items = [];
            $assoc = [];
            foreach ($results as $row) {
                $text = $row->name;
                $items[] = array(
                    'id' => $row->id,
                    'text' => $text,
                );
                $assoc[$row->id] = $row;
                }

                $status_code = 200;
                $json = array(
                    'items' => $items,
                    'assoc' => $assoc,
                );
            }
        else{
                $status_code = 422;
                $json = array(
                        'error' => 'Required Parameters not found.',
                            );
            }
                         
    return response()->json($json);
    }

}
