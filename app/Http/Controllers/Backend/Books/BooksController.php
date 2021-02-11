<?php

namespace App\Http\Controllers\Backend\Books;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Mosques\Mosque;
use App\Http\Controllers\CommonController;
use DB;
use Auth;
use Response;
use View;


class BooksController extends Controller
{


    // batch registration form
    public function registration_form(){
        $category = DB::table('book_category')->get();
        $author = DB::table('author')->get();
        return view('backend.books.registerForm',compact('category','author'));        
    }
     
    // save function
    public function save(Request $request){

        $data=$request->post();
        DB::table('books')->insert([
            'name' => $data['name'],
            'category' => $data['category'],
            'author' => $data['author'],
            'page' => $data['page'],
            'price' => $data['price'],
            'relase_date' => $data['relase_date'],
            'edition_date' => $data['edition_date'],
            'created_by' =>   Auth::user()->id,
            'size' =>    $data['page'],
            'forma_no' =>   $data['forma_no'],
            'printed_copy' =>    $data['printed_no'],
            'edition_version' =>    $data['edition_version'],
        ]);
        // return redirect('category/list');

         return redirect()->route('admin.book.list');
    }
   
    // save function
    public function savethana(Request $request){

        $data=$request->post();
        // print_r($data); die();
        DB::table('upazilas')->insert([            
            'district_id' => $data['district_id'],
            'name' => $data['thana'],
            'bn_name' => $data['bn_name'],
            'url' => $data['url'],
            
        ]);
        // return redirect('category/list');

         return redirect()->route('admin.book.add_new_athor');
    }

   // show list by Shamim 
    public function show_list(){
        $category = DB::table('book_category')->get();
        $info = DB::table('books')
                ->join('book_category', 'books.category', '=', 'book_category.id')
                ->join('author', 'books.author', '=', 'author.id','left')
                ->select('books.*','book_category.name as cat_name','author.name as author_name')
                ->paginate(25);        
        return view('backend.books.index',compact('info','category'));  
    
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
        
        if($request->post('book_name'))
        {
            $condition['books.name'] = $request->post('book_name');
        } 

        if($request->post('category'))
        {
            $condition['books.category'] = $request->post('category');
        } 

        if($request->post('author_name'))
        {
            $condition['books.author'] = $request->post('author_name');
        }

        if($request->post('paginate'))
        {
           $paginate = $request->post('paginate');
        }

        $category = DB::table('book_category')->get();

        $book_info =DB::table('books')                     
                    ->join('book_category', 'books.category', '=', 'book_category.id')
                    ->select('books.*','book_category.name as cat_name')
                    ->where($condition)->paginate($paginate);
        
        return view('backend.books.sindex', compact('book_info','category'));
       
    }


    public function add_new_athor() 
    {
    
    $data = '';
    $assoc = '';
    $json = array(
                    'items' =>  view('backend.books.sindex'),
                    'assoc' => $assoc,
                );
     return response()->json($json);

    // return Response::json(['view' => View::make('backend.books.add_new_author', $data)->render(), 'flag'=>$flag]);

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

        // save author function
    public function save_author(Request $request){

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

        $mst_id = DB::getPdo()->lastInsertId();

        return redirect()->route('admin.book.set_up' )->with( [ 'name' => $data['name'], 'id' => $mst_id  ] );

        // return redirect('admin/book/set_up');
    }


    public function thanaAdd(){


        $division = DB::table('divisions')->get();
        // $districts = DB::table('districts')->get();
        // $upazilas = DB::table('upazilas')->get();

        return view('backend.books.disAdd',compact('division'));        
 
    }


}
