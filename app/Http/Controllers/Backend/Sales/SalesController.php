<?php

namespace App\Http\Controllers\Backend\Sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Http\Controllers\CommonController;
use DB;
use Auth;
use Response;
use View;


class SalesController extends Controller
{

    public function registration_form(){
        $category = DB::table('ifd_customer')->get();
        $books = DB::table('product')->get();
        return view('backend.sales.registerForm',compact('category','books'));        
    }

    public function show_list(){

        $division=DB::table('divisions')->get();
        $info = DB::table('ifd_book_sales_mst as bsm')
                ->join('ifd_customer', 'bsm.customer_id', '=', 'ifd_customer.id')
                ->join('book_sellers', 'bsm.sell_center_id', '=', 'book_sellers.id')
                ->select('bsm.*','ifd_customer.name','ifd_customer.customer_mobile','book_sellers.name as seller_name')
                ->orderBy('bsm.id','desc')
                ->paginate(25);      

        return view('backend.sales.index',compact('info','division'));  
    
    }

     
    // save function
    public function save(Request $request){

        // print_r($_POST); die();
        $prefix_sell_center = DB::table('book_sellers')                
                ->select('prefix')
                ->where('id',Auth::user()->sell_center_id)
                ->orderBy('id','desc')
                ->first(); 
        // print_r($prefix_sell_center); die();

        $sale_id = DB::table('ifd_book_sales_mst')                
                ->select('id')
                ->orderBy('id','desc')
                ->first(); 


        if (empty($sale_id)) {
            $sales_id = 1;
        }
        else{
            $sales_id = $sale_id->id+1;
        }
 
        $data = $request->post();

        if (empty($data['customer'])) {
            // print_r("ok3"); die();
            $nogod_sale = DB::table('ifd_customer')
                ->where('sell_center_id',Auth::user()->sell_center_id)
                ->where('name','নগদ বিক্রি')
                ->get();
            
            if (empty($nogod_sale[0]->name)) {
                 // print_r("ok"); die();
                DB::table('ifd_customer')->insert([
                    'sell_center_id' => Auth::user()->sell_center_id,
                    'name' =>  'নগদ বিক্রি',
                    'customer_mobile' => 0
            ]);

            $data['customer'] = DB::getPdo()->lastInsertId();
            }

            if ($data['customer_name'] != 'নগদ বিক্রি') {
                DB::table('ifd_customer')->insert([
                    'sell_center_id' => Auth::user()->sell_center_id,
                    'name' =>  $data['customer_name'],
                    'customer_mobile' => $data['mobile']
            ]);

            $data['customer'] = DB::getPdo()->lastInsertId();

            }else{
                $data['customer'] = 1;
            }
        }

      
        $ncount = count($data['product_id']);

        DB::table('ifd_book_sales_mst')->insert([
            'sell_center_id' => Auth::user()->sell_center_id,
            'sale_no' =>  date('dmy').$sales_id,
            'customer_id' => $data['customer'],
            'tot_bill' => $data['pharmacy_total_price'],
            'tot_normal_discount' => $data['discount'],
            'tot_paid' => $data['paid'],
            'tot_due' => $data['due'],
            'tot_return' => 0,
            'tot_refund_amount' =>   0,
            'created_by' =>    Auth::user()->id,
            'created_date' =>  date('Y-m-d H:i:s'),
            'is_return' =>   0
        ]);

        $mst_id = DB::getPdo()->lastInsertId();

        $discount = $data['discount']/ $ncount;    

        for ($j = 0; $j < $ncount; $j++){
         DB::table('ifd_book_sales_dtls')->insert([
            'master_id' => $mst_id,
            'product_id' => $data['product_id'][$j],
            'qnty' => $data['qnty'][$j],
            'unit_price' => $data['sale_price'][$j],
            'discount_type' => 1,
            'normal_discount_percent' => 0,
            'normal_discount_taka' => $discount
        ]);
        }

        for ($j = 0; $j < $ncount; $j++){

            $info = DB::table('stocks')
                ->where('product_id', $data['product_id'][$j])
                ->get();  

            $update_qnty[$j] = $info[0]->quantity_level-$data['qnty'][$j];

            $affected = DB::table('stocks')
                    ->where('product_id', $data['product_id'][$j])
                    ->where('saleCenter_id',Auth::user()->id)
                    ->update([
                    'quantity_level' => $update_qnty[0]   
                     ]);

        } 
        echo $this->sale_print($mst_id);
        return redirect()->route('admin.sale.list');
    }
   
 
    public function checkStock(Request $request){
         
        $row =  DB::table('stocks')
                           ->where('product_id',1)
                           ->get();
        $res = false;
        if ($row) {
            $stock = ($row[0]->quantity_level) ? $row[0]->quantity_level : 0;
            if ($stock > 0) {
                $res = true;
            }
        }
        echo $res;
        exit;
    }

    public function checkStock_sale(Request $request){
         
        $row =  DB::table('stocks')
                           ->where('product_id',1)
                           ->get();
        $res = false;
        if ($row) {
            $stock = ($row[0]->quantity_level) ? $row[0]->quantity_level : 0;
            if ($stock > 0) {
                $res = true;
            }
        }
        echo $res;
        exit;
    }


    public function getMedicineInfo($id){

        $row =  DB::table('stocks')
                ->join('product','product.id','=','stocks.product_id')
                ->join('product_category','product_category.id','=','product.category')
                ->where('product_id',$id)
                ->select('stocks.*','product.*','product_category.name as cat_name')
                ->get();
        // print_r($row); die(); 
        $data['category'] = $row[0]->category_name;
        $data['b_name'] = $row[0]->product_name;
        $data['price'] =  $row[0]->price;
        $data['product_id'] = $row[0]->product_id;
        $data['quantity_level'] = $row[0]->quantity_level;


         echo json_encode($data);
    }

    public function getMedicineInfo_sale($id){

        $row =  DB::table('stocks')
                ->join('product','product.id','=','stocks.product_id')
                ->join('product_category','product_category.id','=','product.category')
                ->where('product_id',$id)
                ->select('stocks.*','product.*','product_category.category_name as cat_name')
                ->get();
        // print_r($row); die(); 
        $data['category'] = $row[0]->cat_name;
        $data['b_name'] = $row[0]->product_name;
        $data['price'] =  $row[0]->price;
        $data['product_id'] = $row[0]->product_id;
        $data['quantity_level'] = $row[0]->quantity_level;

        
         echo json_encode($data);
    }

      public function getCustomer_info($id){

        $row =  DB::table('ifd_customer')
                ->where('id',$id)
                ->get();
        
        // print_r($row); die();         
        $data['name'] = $row[0]->name;
        $data['customer_mobile'] =  $row[0]->customer_mobile;
        
         echo json_encode($data);
    }

     
    public function sale_print($mst_id){

        $info = DB::table('ifd_book_sales_mst as bsm')
                                ->join('ifd_customer', 'bsm.customer_id', '=', 'ifd_customer.id')
                                ->join('ifd_book_sales_dtls as bsd', 'bsm.id', '=', 'bsd.master_id')
                                ->join('product', 'bsd.product_id', '=', 'product.id')
                                ->join('users', 'bsm.created_by', '=', 'users.id')
                                ->join('book_sellers', 'users.sell_center_id', '=', 'book_sellers.id')
                                ->join('districts', 'book_sellers.distict_id', '=', 'districts.id')
                                ->join('upazilas', 'book_sellers.upozila_id', '=', 'upazilas.id')
                                ->where('bsm.id', $mst_id)
                                ->select('bsm.*','ifd_customer.name','ifd_customer.customer_mobile','product.product_name as book_name',
                                        'product.price as unit_price','users.username','bsd.qnty as product_sale_qnty',
                                        'bsd.normal_discount_taka as product_discount','book_sellers.name as sell_center_name',
                                        'districts.bn_name as dis_name', 'upazilas.bn_name as up_name', 'book_sellers.mobile as sellcenter_num')
                                ->get();
        // print_r($info); die();
 
         return view('backend.sales.printView', compact('info'));                                        
    }



     // Search Panel Result By Shamim
    public function search(Request $request)
    {
        // print_r($_POST); die();
        $condition = null;
        
        if($request->post('sale_no'))
        {
            $condition['ifd_book_sales_mst.sale_no'] = $request->post('sale_no');
        } 

        if($request->post('customer_name'))
        {
            $condition['ifd_customer.name'] = $request->post('customer_name');
        } 

        if($request->post('customer_mobile'))
        {
            $condition['ifd_customer.customer_mobile'] = $request->post('customer_mobile');
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

 

         if($request->post('sell_center'))
        {
            $condition['book_sellers.id'] = $request->post('sell_center');
        } 

        if($request->post('from_date'))
        {
            $condition['ifd_book_sales_mst.created_date'] = $request->post('from_date');
        } 

        if($request->post('to_date'))
        {
            $condition['ifd_book_sales_mst.created_date'] = $request->post('to_date');
        }



        if($request->post('paginate'))
        {
           $paginate = $request->post('paginate');
        }
 
        $info =DB::table('ifd_book_sales_mst')                     
                    ->join('ifd_customer', 'ifd_book_sales_mst.customer_id', '=', 'ifd_customer.id')
                    ->join('book_sellers', 'ifd_book_sales_mst.sell_center_id', '=', 'book_sellers.id')
                    ->where($condition)
                    ->orderBy('ifd_book_sales_mst.id','desc')
                    ->select('ifd_book_sales_mst.*','ifd_customer.name as castomer_name','ifd_customer.customer_mobile')
                    ->paginate($paginate);
                    
        // print_r($info); die();
        $division=DB::table('divisions')->get();       
        return view('backend.sales.sindex', compact('info','division'));
       
    }

    public function reprint($mst_id){
        echo $this->sale_print($mst_id);
        return redirect()->route('admin.sale.list');                        
        }


    // due paid start 

    public function due_list(){

        $division=DB::table('divisions')->get();
        $info = DB::table('ifd_book_sales_mst as bsm')
                ->join('ifd_customer', 'bsm.customer_id', '=', 'ifd_customer.id')
                ->join('book_sellers', 'bsm.sell_center_id', '=', 'book_sellers.id')
                ->select('bsm.*','ifd_customer.name','ifd_customer.customer_mobile','book_sellers.name as seller_name', 
                    DB::raw('SUM(bsm.tot_bill) as total_sales'),
                    DB::raw('SUM(bsm.tot_paid) as total_paid'),
                    DB::raw('SUM(bsm.tot_due) as total_due'),
                    DB::raw('SUM(bsm.tot_normal_discount) as tot_discount')
                )
                ->orderBy('bsm.id','desc')
                ->groupBy('bsm.customer_id')
                ->paginate(25);   

        // print_r($info); die();   

        return view('backend.sales.due_list',compact('info','division'));  
    
    }
}
