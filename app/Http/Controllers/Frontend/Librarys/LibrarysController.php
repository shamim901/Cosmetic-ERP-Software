<?php

namespace App\Http\Controllers\Frontend\Librarys;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class LibrarysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // library list update by Shamim
    public function index()
    {
        // die();
        $division=DB::table('divisions')->get();

        $library= DB::table('librarys')
                    ->join('divisions', 'librarys.division_id', '=', 'divisions.id')
                    ->join('districts', 'librarys.district_id', '=', 'districts.id')
                    ->join('upazilas', 'librarys.upazilla_id', '=', 'upazilas.id')
                    // ->join('mosques', 'librarys.mosque_id', '=', 'mosques.id')
                    ->join('unions', 'librarys.union_id', '=', 'unions.id')
                    // ->join('villages', 'library_applications.village_id', '=', 'villages.id')
                    ->where('librarys.status',2)
                    ->select('librarys.*', 
                        'divisions.bn_name as div_name', 
                        'districts.bn_name as dis_name', 
                        'upazilas.bn_name as up_name',
                        'unions.bn_name as un_name')->get();

        // echo "<pre>"; print_r($library); die();

        return view('frontend.library.index', compact('library','division'));
    }

       
    public function authentic($id){
        
        $affected = DB::table('librarys')
                    ->where('id',$id)
                    ->update([
                        'status' =>2,
                        
                    ]);

        return redirect('library/list');
    }

     public function authentic_cancel($id){
        
        $affected = DB::table('librarys')
                    ->where('id',$id)
                    ->update([
                        'status' =>3,
                        
                    ]);

        return redirect('library/list');
    }


     public function pending_list()
    {
        // die();
        $division=DB::table('divisions')->get();

        $library= DB::table('librarys')
                    ->join('divisions', 'librarys.division_id', '=', 'divisions.id')
                    ->join('districts', 'librarys.district_id', '=', 'districts.id')
                    ->join('upazilas', 'librarys.upazilla_id', '=', 'upazilas.id')
                    // ->join('mosques', 'librarys.mosque_id', '=', 'mosques.id')
                    ->join('unions', 'librarys.union_id', '=', 'unions.id')
                    // ->join('villages', 'library_applications.village_id', '=', 'villages.id')
                    ->where('librarys.status',1)
                    ->select('librarys.*', 
                        'divisions.bn_name as div_name', 
                        'districts.bn_name as dis_name', 
                        'upazilas.bn_name as up_name',
                        'unions.bn_name as un_name')->get();

        // echo "<pre>"; print_r($library); die();

        return view('frontend.library.pending_list', compact('library','division'));
    }




    public function showLibraryForm()
    {
        $division=DB::table('divisions')->get();
        return view('frontend.library.create', compact('division'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->post();
        $village = DB::table('villages')->where('union_id',$data['union_id'])->where('bn_name',$data['village_id'])->first();
        if(!empty($village)){
            $data['village_id']=$village->id;
        }else{
            $villageData=DB::table('villages')->insert([
                'division_id' => $data['division_id'],
                'district_id' => $data['district_id'],
                'upazilla_id' => $data['upazilla_id'],
                'union_id'    => $data['union_id'],
                'bn_name'     => $data['village_id'],
            ]);
            
            $data['village_id']=DB::getPdo()->lastInsertId();
        }
        unset($data['_token']);

        if(DB::table('librarys')->insert($data)){
            $last_id=DB::getPdo()->lastInsertId();

            return response()->json(['status' => 'true', 'message' => 'Insert Successfully', 'insert_id' =>$last_id]);
        }else{
            return response()->json(['status' => 'false', 'message' => 'Insert unsuccessfully'],201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $library= DB::table('librarys')->where('id',$id)->first();
        return view('frontend.library.edit', compact('library'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data=$request->post();
        $id=$data['id'];
        unset($data['id']);
        unset($data['_token']);
        DB::table('librarys')->where('id', $id)->update($data);

        return redirect('library/list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
    // library print view by Shamim
    public function printLibraryInfo($id)
    {
        $library= DB::table('librarys')
                ->join('divisions', 'librarys.division_id', '=', 'divisions.id')
                ->join('districts', 'librarys.district_id', '=', 'districts.id')
                ->join('upazilas', 'librarys.upazilla_id', '=', 'upazilas.id')
                ->join('unions', 'librarys.union_id', '=', 'unions.id')
                ->join('villages', 'librarys.village_id', '=', 'villages.id')
                ->select('librarys.*', 'divisions.bn_name as div_name', 'districts.bn_name as dis_name', 'upazilas.bn_name as up_name', 'unions.bn_name as un_name','villages.bn_name as vill_name')
                ->where('librarys.id',$id)
                ->first();
        return view('frontend.library.printView', compact('library'));

        return redirect('library/list');
    }


    // Library Applied Pending List by Shamim
    // public function pending_list(){

    //     $division=DB::table('divisions')->get();

    //     $library= DB::table('library_applications')
    //             ->join('divisions', 'library_applications.division_id', '=', 'divisions.id')
    //             ->join('districts', 'library_applications.district_id', '=', 'districts.id')
    //             ->join('upazilas', 'library_applications.upazilla_id', '=', 'upazilas.id')
    //             // ->join('mosques', 'library_applications.mosque_id', '=', 'mosques.id')
    //             // ->join('unions', 'library_applications.union_id', '=', 'unions.id')
    //             // ->join('villages', 'library_applications.village_id', '=', 'villages.id')
    //             ->select('library_applications.*', 'divisions.bn_name as div_name', 'districts.bn_name as dis_name', 'upazilas.bn_name as up_name')
    //             ->get();

    //      return view('frontend.library.pending_list', compact('library','division'));
    // }



    // Library Search Panel Result By Shamim
    public function searchPanel(Request $request)
    {
        // print_r($_POST); die();
        $division=DB::table('divisions')->get();

        $condition = null;
        
        if($request->post('division_id'))
        {
            $condition['librarys.division_id'] = $request->post('division_id');
        }

        if($request->post('district_id'))
        {
            $condition['librarys.district_id'] = $request->post('district_id');
        }

        if($request->post('upazilla_id'))
        {
            $condition['librarys.upazilla_id'] = $request->post('upazilla_id');
        }

        if($request->post('union_id'))
        {
            $condition['librarys.union_id'] = $request->post('union_id');
        }

        // print_r($condition); die();
        $library= DB::table('librarys')
                    ->join('divisions', 'librarys.division_id', '=', 'divisions.id')
                    ->join('districts', 'librarys.district_id', '=', 'districts.id')
                    ->join('upazilas', 'librarys.upazilla_id', '=', 'upazilas.id')
                    // ->join('mosques', 'librarys.mosque_id', '=', 'mosques.id')
                    ->join('unions', 'librarys.union_id', '=', 'unions.id')
                    // ->join('villages', 'library_applications.village_id', '=', 'villages.id')
                    ->select('librarys.*', 'divisions.bn_name as div_name', 
                        'districts.bn_name as dis_name', 'upazilas.bn_name as up_name',
                        'unions.bn_name as un_name'
                    )
                    ->where($condition)->get();
        // echo "<pre>"; print_r($library); die();
        return view('frontend.library.index', compact('library','division'));

       
    }


    // Pending Library Search Panel Result By Shamim
    public function pendingLibrarySearchPanel(Request $request)
    {
        // print_r($_POST); die();
        $division=DB::table('divisions')->get();

        $condition = null;
        
        if($request->post('division_id'))
        {
            $condition['library_applications.division_id'] = $request->post('division_id');
        }

        if($request->post('district_id'))
        {
            $condition['library_applications.district_id'] = $request->post('district_id');
        }

        if($request->post('upazilla_id'))
        {
            $condition['library_applications.upazilla_id'] = $request->post('upazilla_id');
        }

        // if($request->post('union_id'))
        // {
        //     $condition['library_applications.union_id'] = $request->post('union_id');
        // }

        $library= DB::table('library_applications')
                    ->join('divisions', 'library_applications.division_id', '=', 'divisions.id')
                    ->join('districts', 'library_applications.district_id', '=', 'districts.id')
                    ->join('upazilas', 'library_applications.upazilla_id', '=', 'upazilas.id')
                    ->join('mosques', 'library_applications.mosque_id', '=', 'mosques.id')
                    // ->join('unions', 'library_applications.union_id', '=', 'unions.id')
                    // ->join('villages', 'library_applications.village_id', '=', 'villages.id')
                    ->select('library_applications.*', 'divisions.bn_name as div_name', 'districts.bn_name as dis_name', 'upazilas.bn_name as up_name')
                    ->where($condition)->get();
        return view('frontend.library.pending_list', compact('library','division'));

       
    }

    public function bn2enNumber ($id){
        print_r($id); die();
    $search_array= array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
    $replace_array= array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
    $en_number = str_replace($search_array, $replace_array, $number);

    return $en_number;
}


}
