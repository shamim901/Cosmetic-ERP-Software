<?php

namespace App\Http\Controllers\Backend\BookSellers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\CommonController;
use DB;
use Auth;

class BSellerController extends Controller
{

    // batch registration form
    public function registration_form(){
        $division=DB::table('divisions')->get();
        return view('backend.booksellers.registerForm',compact('division')); 
    }
     
    // save function
    public function save(Request $request){

        // print_r($_POST); die();
        $data=$request->post();
 
        DB::table('book_sellers')->insert([
            'name' => $data['name'],            
            'prefix' => $data['prefix'],            
            'mobile' => $data['mobile'],            
            'division_id' => $data['division_id'],
            'distict_id' => $data['district_id'],
            'upozila_id' => $data['upazilla_id'],
            'created_at' => date('Y-m-d H:i:s')
        ]);

        // return redirect('category/list');
         return redirect()->route('admin.bseller.set_up');
    }

   // show list by Shamim 
    public function show_list(){

        $info = DB::table('book_sellers')
                    ->join('divisions', 'book_sellers.division_id', '=', 'divisions.id')
                    ->join('districts', 'book_sellers.distict_id', '=', 'districts.id')
                    ->join('upazilas', 'book_sellers.upozila_id', '=', 'upazilas.id')
                    ->select('book_sellers.*', 'divisions.bn_name as div_name', 'districts.bn_name as dis_name', 'upazilas.bn_name as up_name')
                    ->paginate(25);

        $division=DB::table('divisions')->get();

        return view('backend.booksellers.index',compact('info','division'));  
    
    }

      // batch update form
    public function update_form($id){
        
        $info = DB::table('book_sellers')
                        ->where('id',$id)
                        ->first();
         
        $division = DB::table('divisions')->get();
        $districts = DB::table('districts')->get();
        $upazilas = DB::table('upazilas')->get();

        return view('backend.booksellers.updateForm',compact('info','division','districts','upazilas'));        
    }

     // update function
    public function updating(Request $request){
        
        // print_r($_POST); die();
        $data=$request->post();
        $affected = DB::table('book_sellers')
                    ->where('id', $data['id'])
                    ->update([
                        'name' => $data['name'], 
                        'prefix' => $data['prefix'],             
                        'mobile' => $data['mobile'],            
                        'division_id' => $data['division_id'],
                        'distict_id' => $data['district_id'],
                        'upozila_id' => $data['upazilla_id'],
                        'updated_at' => date('Y-m-d H:i:s')
                    ]);

        return redirect('admin/bseller/list');
    }

     // Search Panel Result By Shamim
    public function search(Request $request)
    {
        // print_r($_POST); die();
        $condition = null;                
        if($request->post('name'))
        {
            $condition['book_sellers.name'] = $request->post('name');
        } 

        if($request->post('mobile'))
        {
            $condition['book_sellers.mobile'] = $request->post('mobile');
        } 

        if($request->post('division_id'))
        {
            $condition['book_sellers.division_id'] = $request->post('division_id');
        }

        if($request->post('district_id'))
        {
            $condition['book_sellers.distict_id'] = $request->post('district_id');
        }

        if($request->post('upazilla_id'))
        {
            $condition['book_sellers.upozila_id'] = $request->post('upazilla_id');
        }


        if($request->post('paginate'))
        {
           $paginate = $request->post('paginate');
        }

        // $category = DB::table('book_category')->get();

        $info = DB::table('book_sellers')                     
                    // ->select('books.*')
                    ->join('divisions', 'book_sellers.division_id', '=', 'divisions.id')
                    ->join('districts', 'book_sellers.distict_id', '=', 'districts.id')
                    ->join('upazilas', 'book_sellers.upozila_id', '=', 'upazilas.id')
                    ->select('book_sellers.*','divisions.bn_name as div_name', 'districts.bn_name as dis_name', 'upazilas.bn_name as up_name')
                    ->where($condition)->paginate($paginate);

        // print_r(compact('book_info')); die();

        $division = DB::table('divisions')->get();
        
        return view('backend.booksellers.sindex', compact('info','division'));       
    }

}
