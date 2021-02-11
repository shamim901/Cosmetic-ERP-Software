<?php

namespace App\Http\Controllers\Backend\Categorys;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Mosques\Mosque;
use App\Http\Controllers\CommonController;
use DB;
use Auth;

class CategoryController extends Controller
{


    // batch registration form
    public function registration_form(){

        return view('backend.category.registerForm');        
    }
     
    // save function
    public function save(Request $request){

        $data=$request->post();
 
        DB::table('book_category')->insert([
            'name' => $data['name'],
            
            'type' => $data['type'],
            'description' => $data['description']
        ]);

        // return redirect('category/list');
         return redirect()->route('admin.category.set_up');
    }

   // show list by Shamim 
    public function show_list(){

        $info = DB::table('book_category')->paginate(25);

        $division=DB::table('divisions')->get();

        return view('backend.category.index',compact('info','division'));  
    
    }

      // batch update form
    public function update_form($id){

        
        $category_info = DB::table('book_category')
                        ->where('id',$id)
                        ->first();
        // print_r($category_info); die();

        return view('backend.category.updateForm',compact('category_info'));        
    }

     // update function
    public function updating(Request $request){
        
        $data=$request->post();


        $affected = DB::table('book_category')
                    ->where('id', $data['id'])
                    ->update([
                        'name' => $data['name'],
                        'type' => $data['type'],
                        'description' => $data['description']
                    ]);

        return redirect('admin/category/list');
    }

}
