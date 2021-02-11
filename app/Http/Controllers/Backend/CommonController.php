<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;

class CommonController extends Controller
{
      // registration code generate

    public function regCodeGenarate($div, $dis, $upazila, $union,$extnd_number){

        if ( $dis <= 9 ) {
             $dis_code = "0".$dis;
        }
        else{
            $dis_code = $dis;
        }

        if ( $upazila <= 9 ) {
             $up_code = "00".$upazila;
        }
        elseif ( $upazila <= 99 ) {
            $up_code = "0".$upazila;
        }
        else{
            $up_code = $upazila;
        }

        if ( $union <= 9 ) {
             $un_code = "000".$upazila;
        }
        elseif ( $union <= 99 ) {
            $un_code = "00".$union;
        }
        elseif ( $union <= 999 ) {
            $un_code = "0".$union;
        }
        else{
            $un_code = $union;
        }


        $code = "0".$div.$dis_code.$up_code.$un_code.$extnd_number;

        // print_r($code); die();

        return $code;

    }

    // batch code 

    public function batchCode(){

        $batch_last_id = DB::table('batch_setup')
                    ->select('id')
                    ->orderBy('created_at', 'desc')->first();

        if (empty($batch_last_id->id)) {
            $code = 'B0001'; 
        }       
        elseif ( $batch_last_id->id <= 9 ) {
            $id = $batch_last_id->id+1;
            $code = "B000".$id;
        }
        elseif ( $batch_last_id->id <= 99 ) {
            $id = $batch_last_id->id+1;
            $code = "B00".$id;
        }
        else {
            $id = $batch_last_id->id+1;
            $code = "B0".$id;
        }

     return $code;
    }

     // batch code 

    public function TrainingCode(){

        $training_last_id = DB::table('training_setup')
                    ->select('id')
                    ->orderBy('created_at', 'desc')->first();

        // print_r($training_last_id->id); die();

        if (empty($training_last_id->id)) {
            $code = 'T0001'; 
        }       
        elseif ( $training_last_id->id <= 9 ) {
            $id = $training_last_id->id+1;
            $code = "T000".$id;
        }
        elseif ( $training_last_id->id <= 99 ) {
            $id = $training_last_id->id+1;
            $code = "T00".$id;
        }
        else {
            $id = $training_last_id->id+1;
            $code = "T0".$id;
        }

     return $code;
    }


     public function customerNameSearch(Request $request)
    {
         if ($query = $request->post('q')) 
            {     
             $results =  DB::table('ifd_customer')
                        ->where('name','like', '%'.$query.'%')
                        ->where('sell_center_id',Auth::user()->sell_center_id)
                        ->get();

            $items = [];
            $assoc = [];
            foreach ($results as $row) {
                $text = $row->name.'>>'.$row->customer_mobile;
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


    public function bookNameSearch(Request $request)
    {
         if ($query = $request->post('q')) 
            {     
             $results =  DB::table('product')
                        ->join('stocks', 'product.id', '=', 'stocks.product_id')
                        ->where('product_name','like', '%'.$query.'%')
                        ->select('product.id','product.product_name','stocks.quantity_level')
                        // ->where('stocks',)
                        ->get();

            $items = [];
            $assoc = [];
            foreach ($results as $row) {
                $text = $row->product_name. " >> " . $row->quantity_level;
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


    public function sellCenterNameSearch(Request $request)
    {
         if ($query = $request->post('q')) 
            {     
             $results =  DB::table('book_sellers')
                        // ->join('stocks', 'books.id', '=', 'stocks.product_id')
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


    public function companyNameSearch(Request $request)
    {
         if ($query = $request->post('q')) 
            {     
             $results =  DB::table('product_company')
                        ->where('company_name','like', '%'.$query.'%')
                        ->get();

            $items = [];
            $assoc = [];
            foreach ($results as $row) {
                $text = $row->company_name;
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

    public function categoryNameSearch(Request $request)
    {
         if ($query = $request->post('q')) 
            {     
             $results =  DB::table('product_category')
                        ->where('category_name','like', '%'.$query.'%')
                        ->get();

            $items = [];
            $assoc = [];
            foreach ($results as $row) {
                $text = $row->category_name;
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

    public function productNameSearch(Request $request)
    {
         if ($query = $request->post('q')) 
            {     
             $results =  DB::table('product')
                        ->where('product_name','like', '%'.$query.'%')
                        ->get();

            $items = [];
            $assoc = [];
            foreach ($results as $row) {
                $text = $row->product_name;
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
