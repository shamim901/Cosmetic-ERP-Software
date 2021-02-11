<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Mosques\Mosque;
use App\Http\Controllers\CommonController;
use DB;
use Auth;
use Response;
use View;


class ProductController extends Controller
{

    /* company functions start */
    
    public function company_create(){
        
        $country = DB::table('country')->get(); 
        $city = DB::table('city')->get(); 

        return view('backend.product.company_create',compact('country','city'));
    }

    public function company_save(Request $request){

        $data=$request->post();

        DB::table('product_company')->insert([
            'company_code' => $data['c_code'],
            'company_name' => $data['c_name'],
            'company_location' => $data['c_location'],
            'company_country' => $data['c_country'],
            'status' => $data['c_status']             
        ]);

        return redirect()->route('admin.product.company_list');
    }

    public function company_list(){

        $info = DB::table('product_company as pc')
                ->join('country','pc.company_country','country.id')
                ->join('city','pc.company_country','city.id')
                ->select('pc.*','country.name as country_name','city.name as city_name')
                ->paginate(25); 
              
        return view('backend.product.company_list',compact('info')); 
    }

    /* company functions end */


    /* category functions start */
    
    public function category_create(){

        return view('backend.product.category_create');
    }

    public function category_save(Request $request){

        $data=$request->post();

        DB::table('product_category')->insert([
            'category_name' => $data['c_name'],
            'status' => $data['c_status'],
            'created_by' =>   Auth::user()->id,
            'created_date' =>  date('Y-m-d H:i:s')
        ]);

        return redirect()->route('admin.product.category_list');
    }

    public function category_list(){

        $info = DB::table('product_category')->paginate(25);              
        return view('backend.product.category_list',compact('info')); 
    }

    /* category functions end */


    /* opening balace start */

    public function opening_balance_create(){
        
        $category = DB::table('product_category')->get();

        $info = DB::table('product')
                ->join('product_category', 'product.category', '=', 'product_category.id')
                ->where('product.opening_balance',0)
                ->select('product.*','product_category.category_name as cat_name')
                ->paginate(25);          
        return view('backend.product.opening_balance',compact('info','category'));  
    
    }

     public function opening_balance_save(Request $request){


    $data = $request->post();

    $op_balance = $data['op_value'];
    $product_id = $data['id']; 
   
    DB::table('ifd_opening_balance')->insert([
            'saleCenter_id' =>  Auth::user()->id,
            'product_id' =>  $data['id'],
            'qnty' =>  $op_balance,
            'created_by' =>   Auth::user()->id,
            'created_at' =>  date('Y-m-d H:i:s')
        ]);

    // inset into stock table
    DB::table('stocks')->insert([
            'saleCenter_id' =>  Auth::user()->id,
            'product_id' =>  $data['id'],
            'quantity_level' =>  $op_balance
        ]);

    // update book table
    $affected = DB::table('product')
                    ->where('id', $data['id'])
                    ->update([
                         'opening_balance' => 1,            
                        'updated_at' => date('Y-m-d H:i:s'),
                        'updated_by' =>  Auth::user()->id

    ]);

    return redirect()->route('admin.product.opening_balance_list');
    }

    public function opening_balance_list(){
        $category = DB::table('product_category')->get();
        $info = DB::table('product')
                ->join('product_category', 'product.category', '=', 'product_category.id')
                ->join('stocks', 'product.id', '=', 'stocks.product_id')
                ->where('product.opening_balance',1)
                ->select('product.*','product_category.category_name','stocks.quantity_level')
                ->paginate(25);          
        return view('backend.product.opening_balance_update',compact('info','category'));  
    
    }

    public function opening_balance_update(Request $request){
    
    $data = $request->post();
    $op_balance = $data['op_value'];
     
    $affected = DB::table('stocks')
                    ->where('product_id', $data['id'])
                    ->where('saleCenter_id',Auth::user()->id)
                    ->update([
                    'quantity_level' =>  $op_balance    
                     ]);

    return redirect()->route('admin.product.opening_balance_list');
    }

     /* opening balace end */


    /* price update start */
    public function price_list(){
        $category = DB::table('book_category')->get();
        $info = DB::table('product')
                ->join('product_category', 'product.category', '=', 'product_category.id','left')
                ->join('stocks', 'product.id', '=', 'stocks.product_id','left')
                // ->where('product.opening_balance',1)
                ->select('product.*','product_category.category_name as cat_name','stocks.quantity_level')
                ->paginate(25);  
        // echo "<pre>"; print_r($info); die();       
        return view('backend.product.price_update',compact('info','category'));  
    
    }

    public function price_update(Request $request){
    
    $data = $request->post();
    $price = $data['op_value'];
     
    $affected = DB::table('product')
                    ->where('id', $data['id'])
                    ->where('saleCenter_id',Auth::user()->id)
                    ->update([
                    'price' =>  $price    
                     ]);

    return redirect()->route('admin.product.price_list');
    }
    /* price update end */

    
    /* product functions start */
    public function product_setup(){
    
        $category = DB::table('product_category')->get();        
        $product_company = DB::table('product_company')->get();
        $measurement_unit = DB::table('measurement_unit')->get();

        return view('backend.product.product_create',compact('category','product_company','measurement_unit'));        
    
    }
      
    public function product_save(Request $request){

        $data=$request->post();

        // echo "<pre>"; print_r($data); die();

        DB::table('product')->insert([
            'product_name' => $data['name'],
            'category' => $data['category_id'],
            'company' => $data['company_id'],
            'unit' => $data['unit_id'],
            'opening_balance' => $data['opening_balance'],
            'purchase_price' => $data['purchase_price'],
            'price' => $data['sale_price'],
            'saleCenter_id' => $data['status'],           
            'created_by' =>   Auth::user()->id,          
            'created_at' => date('Y-m-d H:i:s')                      
        ]); 

         return redirect()->route('admin.product.product_list');
    }

    public function product_list(){

        $category = DB::table('product_category')->get();        
        $product_company = DB::table('product_company')->get(); 

        $info = DB::table('product')
                ->join('product_category', 'product.category', '=', 'product_category.id')
                ->join('product_company', 'product.company', '=', 'product_company.id','left')
                ->select('product.*','product_category.category_name','product_company.company_name')
                ->paginate(25);        
        return view('backend.product.product_list',compact('info','category'));  
    
    }

    public function product_update($id){
        $category = DB::table('product_category')->get();        
        $product_company = DB::table('product_company')->get();
        $measurement_unit = DB::table('measurement_unit')->get();
 
        $info = DB::table('product')
                        ->where('id',$id)
                        ->first();
        
        return view('backend.product.product_edit',compact('info','category','product_company','measurement_unit'));        
    }




    /* *****product functions end********** */


    /* purchase functions start */
    public function purchase_setup(){
    
        $category = DB::table('product_category')->get();        
        $product_company = DB::table('product_company')->get();
        $measurement_unit = DB::table('measurement_unit')->get();

        return view('backend.product.product_create',compact('category','product_company','measurement_unit'));        
    
    }
      
    public function purchase_save(Request $request){

        $data=$request->post();

        // echo "<pre>"; print_r($data); die();

        DB::table('product')->insert([
            'product_name' => $data['name'],
            'category' => $data['category_id'],
            'company' => $data['company_id'],
            'unit' => $data['unit_id'],
            'opening_balance' => $data['opening_balance'],
            'purchase_price' => $data['purchase_price'],
            'price' => $data['sale_price'],
            'saleCenter_id' => $data['status'],           
            'created_by' =>   Auth::user()->id,          
            'created_at' => date('Y-m-d H:i:s')                      
        ]); 

         return redirect()->route('admin.product.product_list');
    }

      public function purchase_list(){

        $category = DB::table('product_category')->get();        
        $product_company = DB::table('product_company')->get(); 

        $info = DB::table('product')
                ->join('product_category', 'product.category', '=', 'product_category.id')
                ->join('product_company', 'product.company', '=', 'product_company.id','left')
                ->select('product.*','product_category.category_name','product_company.company_name')
                ->paginate(25);        
        return view('backend.product.product_list',compact('info','category'));  
    
    }

    /* *****purchase functions end********** */




   

}
