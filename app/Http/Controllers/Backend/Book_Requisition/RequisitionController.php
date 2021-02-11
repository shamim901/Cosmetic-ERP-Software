<?php

namespace App\Http\Controllers\Backend\Book_Requisition;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Mosques\Mosque;
use App\Http\Controllers\CommonController;
use DB;
use Auth;
use Response;
use View;


class RequisitionController extends Controller
{


    // batch registration form
    public function registration_form(){
        $bookSeller = DB::table('book_sellers')->get();
        $books = DB::table('books')->get();
        return view('backend.book_requisition.registerForm',compact('bookSeller','books'));        
    }
     
    // save function
    public function save(Request $request){

        // echo "<pre>"; print_r($_POST); die();       
        $data = $request->post();

        $requi_last_id = DB::table('ifd_book_requision_mst')
                    ->select('id as tot_imam')
                    ->orderBy('created_time', 'desc')->get();
        
        if (empty($requi_last_id)) {
            $id = 0001; 
        }
        else{
             $id = count($requi_last_id) + 1;
        }        
        // print_r(date('dmy').Auth::user()->id.$data['customer']); die();

        $ncount = count($data['product_id']);

        DB::table('ifd_book_requision_mst')->insert([
            'book_sell_center_id' =>  1,
            'requisition_no' =>   date('dmy').$id,
            'requisition_date' =>  date('Y-m-d H:i:s'),
            'requisition_by' =>  Auth::user()->id,
            'status' => 1
        ]);

        $mst_id = DB::getPdo()->lastInsertId();
  
        for ($j = 0; $j < $ncount; $j++){
         DB::table('ifd_book_requision_dtls')->insert([
            'requision_id' => $mst_id,
            'product_id' => $data['product_id'][$j],
            'req_qnty' => $data['qnty'][$j],
            'status' =>  1
        ]);
        }

        
        return redirect()->route('admin.requisition.create');
    }

   // show list by Shamim 
    public function show_list(){      

        $division=DB::table('divisions')->get();   
        $info = DB::table('ifd_book_requision_mst as brm')
                ->join('book_sellers', 'brm.book_sell_center_id', '=', 'book_sellers.id')
                ->select('brm.*','book_sellers.name','book_sellers.mobile')
                ->paginate(25);        

        // echo "<pre>"; print_r($info); die(); 
        return view('backend.book_requisition.index',compact('info','division'));  
    
    }


   // show list by Shamim 
    public function issue_pending_list(){
         
        $info = DB::table('ifd_book_requision_mst as brm')
                ->join('book_sellers', 'brm.book_sell_center_id', '=', 'book_sellers.id')
                ->select('brm.*','book_sellers.name','book_sellers.mobile')
                ->get();        
        // echo "<pre>"; print_r($info); die(); 
        return view('backend.book_requisition.pending_issue_list',compact('info'));      
    }

    

      // batch update form
    public function update_form($id){
        // print_r("ok"); die();
        $category = DB::table('book_category')->get();
        $info = DB::table('books')
                        ->where('id',$id)
                        ->first();
        // print_r($batch_info); die();
        return view('backend.books.updateForm',compact('info','category'));        
    }

     // update function
    public function updating(Request $request){
        
        $data=$request->post();

        $affected = DB::table('books')
                    ->where('id', $data['id'])
                    ->update([
                        'name' => $data['name'],
                        'category' => $data['category'],
                        'author' => $data['author'],
                        'page' => $data['page'],
                        'price' => $data['price'],
                        'relase_date' => $data['relase_date'],
                        'edition_date' => $data['edition_date'],
                        'updated_by' =>   Auth::user()->id,
                        'updated_at' =>   date('Y-m-d H:i:s')
                    ]);

        return redirect('admin/book/list');
    }


     // Search Panel Result By Shamim
    public function search(Request $request)
    {
        // print_r($_POST); die();
        $condition = null;
        
        // if($request->post('book_name'))
        // {
        //     $condition['books.name'] = $request->post('book_name');
        // } 

        if($request->post('requisition_no'))
        {
            $condition['brm.requisition_no'] = $request->post('requisition_no');
        } 

        if($request->post('bseller_name'))
        {
            $condition['book_sellers.name'] = $request->post('bseller_name');
        } 

        if($request->post('bseller_number'))
        {
            $condition['book_sellers.mobile'] = $request->post('bseller_number');
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

        $category = DB::table('book_category')->get();
         $division=DB::table('divisions')->get();

        $info =DB::table('ifd_book_requision_mst as brm')                     
                    ->join('book_sellers', 'brm.book_sell_center_id', '=', 'book_sellers.id')
                    ->select('brm.*','book_sellers.name','book_sellers.mobile')
                    ->where($condition)->paginate($paginate);
        
        return view('backend.book_requisition.sindex', compact('info','division'));
       
    }

 

    public function checkStock(Request $request){
         
        $row =  DB::table('stocks')
                           ->where('book_id',1)
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
                ->join('books','books.id','=','stocks.book_id')
                ->join('book_category','book_category.id','=','books.category')
                ->where('book_id',$id)
                ->select('stocks.*','books.*','book_category.name as cat_name')
                ->get();
        // print_r($row); die(); 
        $data['category'] = $row[0]->cat_name;
        $data['b_name'] = $row[0]->name;
        $data['price'] =  $row[0]->price;
        $data['book_id'] = $row[0]->book_id;
        $data['quantity_level'] = $row[0]->quantity_level;
        echo json_encode($data);
    }

      public function getBookSellerInfo($id){

        $row =  DB::table('book_sellers')
                ->where('id',$id)
                ->get();        

        $data['name'] = $row[0]->name;
        $data['mobile'] =  $row[0]->mobile;
        
         echo json_encode($data);
    }


     

    public function bookNameSearch(Request $request)
    {
         if ($query = $request->post('q')) 
            {     
             $results =  DB::table('books')
                        ->join('stocks', 'books.id', '=', 'stocks.book_id')
                        ->where('name','like', '%'.$query.'%')
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


    public function bookSellerSearch(Request $request)
    {
         if ($query = $request->post('q')) 
            {     
             $results =  DB::table('book_sellers')
                        // ->join('stocks', 'books.id', '=', 'stocks.book_id')
                        ->where('name','like', '%'.$query.'%')
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


    public function getReqDetails($id){

        // $bookSeller = DB::table('book_sellers')->get();
        // $books = DB::table('books')->get();

        $info = DB::table('ifd_book_requision_mst as brm')
                ->join('ifd_book_requision_dtls as brd','brm.id','=','brd.requision_id')
                ->join('books','books.id','=','brd.product_id')
                ->join('book_sellers','brm.book_sell_center_id','=','book_sellers.id')
                ->join('book_category','books.category','=','book_category.id')
                ->where('brm.id',$id)
                ->select('brm.id as mst_id','books.name as book_name', 'brd.product_id' ,'brd.req_qnty','book_sellers.name','book_sellers.mobile'
                        ,'book_category.name as cat_name')
                ->get();

        // echo "<pre>"; print_r($info); die();

        return view('backend.book_requisition.updateForm',compact('info'));    
    }

    public function issue(Request $request){
        

        $data = $request->post();

        $ncount = count($data['product_id']);

        
        $affected2 = DB::table('ifd_book_requision_mst')
                    ->where('id', $data['req_id'])                   
                    ->update([
                    'status' => 1
                     ]);
        
        for ($j = 0; $j < $ncount; $j++){
           
             $affected = DB::table('ifd_book_requision_dtls')
                    ->where('product_id', $data['product_id'][$j])
                    ->where('requision_id',$data['req_id'])
                    ->update([
                    'issue_no' => date('dmy'),
                    'issued_by' => Auth::user()->id,
                    'issued_date' =>  date('Y-m-d H:i:s'),
                    'issue_qnty'=> $data['issue_qnty'][$j],   
                    'status'=> 2,   
                     ]);
        }


         for ($j = 0; $j < $ncount; $j++){
             
            $prev_qnty =  DB::table('stocks')
                    ->where('book_id', $data['product_id'][$j])
                    ->where('bseller_id',Auth::user()->id)
                    ->select('quantity_level')
                    ->get();

            // print_r($prev_qnty); 

            $affected2 = DB::table('stocks')
                    ->where('book_id', $data['product_id'][$j])
                    ->where('bseller_id',Auth::user()->id)
                    ->update([
                    'quantity_level' =>   $data['issue_qnty'][$j]  + $prev_qnty[0]->quantity_level 
                     ]);

        }
        echo $this->sale_print($data['req_id']);
        // return redirect()->route('admin.requisition.issue_list');
    }

    public function sale_print($mst_id){

        $info = DB::table('ifd_book_requision_mst as bsm')                                 
                                ->join('ifd_book_requision_dtls as bsd', 'bsm.id', '=', 'bsd.requision_id')
                                ->join('books', 'bsd.product_id', '=', 'books.id')
                                ->join('users', 'bsm.requisition_by', '=', 'users.id')
                                ->join('book_sellers', 'bsm.book_sell_center_id', '=', 'book_sellers.id')
                                ->join('districts', 'book_sellers.distict_id', '=', 'districts.id')
                                ->join('upazilas', 'book_sellers.upozila_id', '=', 'upazilas.id')
                                ->where('bsm.id', $mst_id)
                                ->select('bsm.*','books.name as book_name', 'bsd.req_qnty','bsd.issue_qnty','books.price as unit_price','users.username', 'book_sellers.name as sell_center_name',
                                        'districts.bn_name as dis_name', 'upazilas.bn_name as up_name', 'book_sellers.mobile as sellcenter_num','bsd.issue_no')
                                ->get();
        // print_r($info); die();
         return view('backend.book_requisition.printView', compact('info'));                                        
    }
    

}
