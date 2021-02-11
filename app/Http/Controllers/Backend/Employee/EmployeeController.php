<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Mosques\Mosque;
use App\Http\Controllers\CommonController;
use DB;
use Auth;
use Response;
use View;


class EmployeeController extends Controller
{


    // batch registration form
    public function registration_form(){

        // print_r("test"); die();
        $category = DB::table('book_category')->get();
        $author = DB::table('author')->get();
        return view('backend.employee.registerForm',compact('category','author'));        
    }


    public function picture(){

        // print_r("test"); die();
        $category = DB::table('book_category')->get();
        $author = DB::table('author')->get();
        return view('backend.employee.picture',compact('category','author'));        
    }

     public function contact_no(){

        // print_r("test"); die();
        $category = DB::table('book_category')->get();
        $author = DB::table('author')->get();
        return view('backend.employee.contact_no',compact('category','author'));        
    }

     public function familly_info(){

        // print_r("test"); die();
        $category = DB::table('book_category')->get();
        $author = DB::table('author')->get();
        return view('backend.employee.familly_info',compact('category','author'));        
    }

     public function education_info(){

        // print_r("test"); die();
        $category = DB::table('book_category')->get();
        $author = DB::table('author')->get();
        return view('backend.employee.education_info',compact('category','author'));        
    }

    public function work_experince(){

        // print_r("test"); die();
        $category = DB::table('book_category')->get();
        $author = DB::table('author')->get();
        return view('backend.employee.work_experince',compact('category','author'));        
    }

     public function training(){

        // print_r("test"); die();
        $category = DB::table('book_category')->get();
        $author = DB::table('author')->get();
        return view('backend.employee.training',compact('category','author'));        
    }

     public function imp_nothi(){

        // print_r("test"); die();
        $category = DB::table('book_category')->get();
        $author = DB::table('author')->get();
        return view('backend.employee.imp_nothi',compact('category','author'));        
    }

     public function niog(){

        // print_r("test"); die();
        $category = DB::table('book_category')->get();
        $author = DB::table('author')->get();
        return view('backend.employee.niog',compact('category','author'));        
    }

     public function bank_info(){

        // print_r("test"); die();
        $category = DB::table('book_category')->get();
        $author = DB::table('author')->get();
        return view('backend.employee.bank_info',compact('category','author'));        
    }

     public function niog_info(){

        // print_r("test"); die();
        $category = DB::table('book_category')->get();
        $author = DB::table('author')->get();
        return view('backend.employee.niog_info',compact('category','author'));        
    }

     public function transfer(){

        // print_r("test"); die();
        $category = DB::table('book_category')->get();
        $author = DB::table('author')->get();
        return view('backend.employee.transfer',compact('category','author'));        
    }


     public function acr(){

        // print_r("test"); die();
        $category = DB::table('book_category')->get();
        $author = DB::table('author')->get();
        return view('backend.employee.acr',compact('category','author'));        
    }


     public function nirikha(){

        // print_r("test"); die();
        $category = DB::table('book_category')->get();
        $author = DB::table('author')->get();
        return view('backend.employee.nirikha',compact('category','author'));        
    }

     public function attikoron(){

        // print_r("test"); die();
        $category = DB::table('book_category')->get();
        $author = DB::table('author')->get();
        return view('backend.employee.attikoron',compact('category','author'));        
    }

     public function promotion(){

        // print_r("test"); die();
        $category = DB::table('book_category')->get();
        $author = DB::table('author')->get();
        return view('backend.employee.promotion',compact('category','author'));        
    }

     public function prokasona(){

        // print_r("test"); die();
        $category = DB::table('book_category')->get();
        $author = DB::table('author')->get();
        return view('backend.employee.prokasona',compact('category','author'));        
    }


     
    // save function by Shamim
    public function savePersonalInfo(Request $request){

        $data=$request->post();
        // echo "<pre>"; print_r($data); die();


        DB::table('bf_hrm_ls_employee')->insert([
        'EMP_NAME' => $data['hrm_employee_name'],
        'EMP_FATHER_NAME' => $data['hrm_employee_father'],
        'EMP_MOTHER_NAME'  => $data['hrm_employee_mother'],
        'BIRTH_DATE'  => $data['hrm_employee_birth_day'],
        'BIRTH_PLACE'  => $data['employee_birth_place_bengali'],
        'EMP_BLOOD_GROUP'  => $data['hrm_blood_group'],
        'GENDER'  => $data['hrm_employee_sex'],
        // 'RELIGION'  => $data['hrm_employee_religion'],
        'MARITAL_STATUS'  => $data['hrm_employee_marital_status'],
        'NATIONAL_ID' => $data['hrm_employee_national_id'],
        'PASSPORT_NO'  => $data['hrm_employee_passport_no'],
        'DRIVING_LICENCE'  => $data['hrm_employee_driving_licence'],
        'NATIONALITY'  => $data['hrm_employee_nationality'],
        'EMP_GRADE'  => $data['hrm_employee_grade'],
        'EMP_TYPE'  => $data['hrm_employee_type'],
        // 'EMPLOYEE_ID' => $data['employee_id'],
        'EMP_JOB_NATURE'  => $data['hrm_employee_job_nature'],
        // 'EMP_DEPARTMENT' => $data['employee_emp_department'],
        // 'EMP_DESIGNATION'  => $data['hrm_employee_designation'],
        // 'QUALIFICATION'  => $data['emp_designation_two'],
        'JOINNING_DATE'  => date("Y-m-d", strtotime(str_replace('/', '-', $data['employee_joining_date']))),
        'JOB_CONFIRM_DATE' => date("Y-m-d", strtotime(str_replace('/', '-', $data['employee_confirmarion_date']))),
        //$data['QUOTA_ID']                         = 1;
        'STATUS' => $data['employee_status']
        // 'CODE' =>'',
        // 'EMP_CODE' => '',
        ]);
        // return redirect('category/list');

         return redirect()->route('admin.employee.contact_no');
    }

    // save function by Shamim
    public function saveContactInfo(Request $request){

        $data=$request->post();
        // echo "<pre>"; print_r($data); die();


        // DB::table('bf_hrm_ls_employee')->insert([
        // 'EMP_NAME' => $data['hrm_employee_name'],
        // 'EMP_FATHER_NAME' => $data['hrm_employee_father'],
        // 'EMP_MOTHER_NAME'  => $data['hrm_employee_mother'],
        // 'BIRTH_DATE'  => $data['hrm_employee_birth_day'],
        // 'BIRTH_PLACE'  => $data['employee_birth_place_bengali'],
        // 'EMP_BLOOD_GROUP'  => $data['hrm_blood_group'],
        // 'GENDER'  => $data['hrm_employee_sex'],
        // // 'RELIGION'  => $data['hrm_employee_religion'],
        // 'MARITAL_STATUS'  => $data['hrm_employee_marital_status'],
        // 'NATIONAL_ID' => $data['hrm_employee_national_id'],
        // 'PASSPORT_NO'  => $data['hrm_employee_passport_no'],
        // 'DRIVING_LICENCE'  => $data['hrm_employee_driving_licence'],
        // 'NATIONALITY'  => $data['hrm_employee_nationality'],
        // 'EMP_GRADE'  => $data['hrm_employee_grade'],
        // 'EMP_TYPE'  => $data['hrm_employee_type'],
        // // 'EMPLOYEE_ID' => $data['employee_id'],
        // 'EMP_JOB_NATURE'  => $data['hrm_employee_job_nature'],
        // // 'EMP_DEPARTMENT' => $data['employee_emp_department'],
        // // 'EMP_DESIGNATION'  => $data['hrm_employee_designation'],
        // // 'QUALIFICATION'  => $data['emp_designation_two'],
        // 'JOINNING_DATE'  => date("Y-m-d", strtotime(str_replace('/', '-', $data['employee_joining_date']))),
        // 'JOB_CONFIRM_DATE' => date("Y-m-d", strtotime(str_replace('/', '-', $data['employee_confirmarion_date']))),
        // //$data['QUOTA_ID']                         = 1;
        // 'STATUS' => $data['employee_status'],
        // // 'CODE' =>'',
        // // 'EMP_CODE' => '',
        // ]);
        // return redirect('category/list');

         return redirect()->route('admin.employee.familly_info');
    }

    // save function by Shamim
    public function saveFamillyInfo(Request $request){

        $data=$request->post();
        // echo "<pre>"; print_r($data); die();

        DB::table('emp_family')->insert([
        'EMP_ID' =>  1,
        'NAME' => isset($data['hrm_employee_name'])?$data['hrm_employee_name']:'',
        'NAME_BENGALI'  => isset($data['employee_name_bengali'])?$data['employee_name_bengali']:'',
        'RELATION'  => isset($data['hrm_employee_birth_day'])?$data['hrm_employee_birth_day']:'',
        'BIRTH_DATE'  => isset($data['employee_birth_place_bengali'])?$data['employee_birth_place_bengali']:'',
        'AGE'  => isset($data['ORGANIZATION'])?$data['ORGANIZATION']:'',
        'OCCPATION'  => '',
        // 'RELIGION'  => $data['hrm_employee_religion'],
        'CONTACT_NO'  => 0,
        
        
        ]);
        
         return redirect()->route('admin.employee.work_experince');
    }

     // save function by Shamim
    public function saveWorkingExInfo(Request $request){

        $data=$request->post();
        // echo "<pre>"; print_r($data); die();

        DB::table('emp_job_history')->insert([
        'EMP_ID' =>  1,
        'inst_name' => $data['ORGANIZATION'],
        'TRANSFER_REMARKS'  => $data['CONTACT_NUMBER'],
        'DATE_TO'  => '',
        'DATE_FROM'  => $data['YEAR_END'],
        'ENTRY_REASON'  => $data['REASON_FOR_LEAVING_BENGALI'],
        
        
        ]);
        
         return redirect()->route('admin.employee.imp_nothi');
    }


      // save function by Shamim
    public function saveTraining(Request $request){

        $data=$request->post();
        // echo "<pre>"; print_r($data); die();

        // DB::table('emp_job_history')->insert([
        // 'EMP_ID' =>  1,
        // 'inst_name' => $data['ORGANIZATION'],
        // 'TRANSFER_REMARKS'  => $data['CONTACT_NUMBER'],
        // 'DATE_TO'  => '',
        // 'DATE_FROM'  => $data['YEAR_END'],
        // 'ENTRY_REASON'  => $data['REASON_FOR_LEAVING_BENGALI'],
        
        
        // ]);
        
         return redirect()->route('admin.employee.imp_nothi');
    }

     // save function by Shamim
    public function saveDocuement(Request $request){

        $data=$request->post();
        // echo "<pre>"; print_r($data); die();

        // DB::table('emp_job_history')->insert([
        // 'EMP_ID' =>  1,
        // 'inst_name' => $data['ORGANIZATION'],
        // 'TRANSFER_REMARKS'  => $data['CONTACT_NUMBER'],
        // 'DATE_TO'  => '',
        // 'DATE_FROM'  => $data['YEAR_END'],
        // 'ENTRY_REASON'  => $data['REASON_FOR_LEAVING_BENGALI'],
        
        
        // ]);
        
         return redirect()->route('admin.employee.niog');
    }

     public function saveNiog(Request $request){

        $data=$request->post();
        // echo "<pre>"; print_r($data); die();

        // DB::table('emp_job_history')->insert([
        // 'EMP_ID' =>  1,
        // 'inst_name' => $data['ORGANIZATION'],
        // 'TRANSFER_REMARKS'  => $data['CONTACT_NUMBER'],
        // 'DATE_TO'  => '',
        // 'DATE_FROM'  => $data['YEAR_END'],
        // 'ENTRY_REASON'  => $data['REASON_FOR_LEAVING_BENGALI'],
        
        
        // ]);
        
         return redirect()->route('admin.employee.bank_info');
    }

     public function savebank(Request $request){

        $data=$request->post();
        // echo "<pre>"; print_r($data); die();

        DB::table('emp_bank_info')->insert([
        'EMP_ID' =>  1,
        'BANK_name' => $data['BANK_NAME'],
        'ACCOUNT_NAME'  => $data['ACCOUNT_NAME'],
        
        'BRANCH_ID'  => $data['BRANCH_ID'],
        'ACCOUNT_NO'  => $data['ACCOUNT_NO']
        ]);
        
         return redirect()->route('admin.employee.transfer');
    }

     public function saveNiogInfo(Request $request){

        $data=$request->post();
        // echo "<pre>"; print_r($data); die();

        // DB::table('emp_job_history')->insert([
        // 'EMP_ID' =>  1,
        // 'inst_name' => $data['ORGANIZATION'],
        // 'TRANSFER_REMARKS'  => $data['CONTACT_NUMBER'],
        // 'DATE_TO'  => '',
        // 'DATE_FROM'  => $data['YEAR_END'],
        // 'ENTRY_REASON'  => $data['REASON_FOR_LEAVING_BENGALI'],
        
        
        // ]);
        
         return redirect()->route('admin.employee.transfer');
    }
     public function saveTransfer(Request $request){

        $data=$request->post();
        // echo "<pre>"; print_r($data); die();

        // DB::table('emp_job_history')->insert([
        // 'EMP_ID' =>  1,
        // 'inst_name' => $data['ORGANIZATION'],
        // 'TRANSFER_REMARKS'  => $data['CONTACT_NUMBER'],
        // 'DATE_TO'  => '',
        // 'DATE_FROM'  => $data['YEAR_END'],
        // 'ENTRY_REASON'  => $data['REASON_FOR_LEAVING_BENGALI'],
        
        
        // ]);
        
         return redirect()->route('admin.employee.acr');
    }
     public function saveacr(Request $request){

        $data=$request->post();
        // echo "<pre>"; print_r($data); die();

        DB::table('emp_acr')->insert([
        'EMPLOYEE_ID' =>  1,
        'TOTAL_POINT' => $data['total_point'],
        'DECISION_STEPS' => $data['step'],
        'DECISION_BY'  => $data['by'],
        'ACR_YEAR'  => $data['date']
        
        
        ]);
        
         return redirect()->route('admin.employee.nirikha');
    }

     public function saveNirikha(Request $request){

        $data=$request->post();
        // echo "<pre>"; print_r($data); die();

        // DB::table('emp_job_history')->insert([
        // 'EMP_ID' =>  1,
        // 'inst_name' => $data['ORGANIZATION'],
        // 'TRANSFER_REMARKS'  => $data['CONTACT_NUMBER'],
        // 'DATE_TO'  => '',
        // 'DATE_FROM'  => $data['YEAR_END'],
        // 'ENTRY_REASON'  => $data['REASON_FOR_LEAVING_BENGALI'],
        
        
        // ]);
        
         return redirect()->route('admin.employee.attikoron');
    }

  public function savePromosion(Request $request){

        $data=$request->post();
        // echo "<pre>"; print_r($data); die();

        // DB::table('emp_job_history')->insert([
        // 'EMP_ID' =>  1,
        // 'inst_name' => $data['ORGANIZATION'],
        // 'TRANSFER_REMARKS'  => $data['CONTACT_NUMBER'],
        // 'DATE_TO'  => '',
        // 'DATE_FROM'  => $data['YEAR_END'],
        // 'ENTRY_REASON'  => $data['REASON_FOR_LEAVING_BENGALI'],
        
        
        // ]);
        
        // echo "Succesfully Employee Create";
         return redirect()->route('admin.employee.list');
    }

 public function saveAttikoron(Request $request){

        $data=$request->post();
        // echo "<pre>"; print_r($data); die();

        DB::table('emp_attikoron')->insert([
        'EMP_ID' =>  1,
        'ATTIKORON_GIVEN_BY' => isset($data['by'])?$data['by']:'',
        'ATTIKORON_DATE'  => isset($data['attikoron_date'])?$data['attikoron_date']:''
        
        
        ]);
        
         return redirect()->route('admin.employee.promotion');
    }




   // show list by Shamim 
    public function show_list(){
        $category = DB::table('book_category')->get();
        $info = DB::table('bf_hrm_ls_employee')
                // ->join('book_category', 'books.category', '=', 'book_category.id')
                // ->join('author', 'books.author', '=', 'author.id','left')
                // ->select('books.*','book_category.name as cat_name','author.name as author_name')
                ->paginate(25);        
        return view('backend.employee.index',compact('info'));  
    
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

 

    

 

}
