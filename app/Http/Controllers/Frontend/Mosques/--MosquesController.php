<?php

namespace App\Http\Controllers\Frontend\Mosques;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CommonController;
use Illuminate\Http\Request;
use App\Models\Mosques\Mosque;
use DB;
use Auth;

class MosquesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // masjid update by Shamim
    public function index()
    {
        $division=DB::table('divisions')->get();

        $user=Auth::user();

        $mosque = Mosque::where('region','=',$user->division)->where('district','=',$user->district)->where('upazila','=',$user->upazila)->where('union','=',$user->union)->where('status','=',1)->get();
        
        return view('frontend.mosque.index', compact('mosque','division'));
    }  
    public function pending_list()
    {
        $division=DB::table('divisions')->get();

        $user=Auth::user();

        $mosque = Mosque::where('region','=',$user->division)->where('district','=',$user->district)->where('upazila','=',$user->upazila)->where('union','=',$user->union)->get();
        
        return view('frontend.mosque.index', compact('mosque','division'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // print_r("ok"); die();
        $user=Auth::user();

        $division = DB::table('divisions')->find($user->division);
        $district = DB::table('districts')->find($user->district);
        $upazila = DB::table('upazilas')->find($user->upazila);
        $union = DB::table('unions')->find($user->union);

        return view('frontend.mosque.create', compact('division','district', 'upazila', 'union'));
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

         // print_r($data['mosque']['region']); die();

        $imam_last_id = DB::table('mosques')
                    ->select('id as tot_mos')
                    ->where('region',$data['mosque']['region'])
                    ->where('district',$data['mosque']['district'])
                    ->where('upazila',$data['mosque']['upazila'])
                    ->where('union',$data['mosque']['union'])
                    ->orderBy('created_at', 'desc')->get();

        
        if (empty($imam_last_id)) {
            $id = 0001; 
        }
        else{
             $id = count($imam_last_id) + 1;
        }

        $CommonController = new CommonController;
        $reg_code = $CommonController->regCodeGenarate($data['mosque']['region'],$data['mosque']['district'],$data['mosque']['upazila'], $data['mosque']['union'],$id);

        // print_r($reg_code); die();
       
        
        if(!empty($data['mosque'])){

            $village = DB::table('villages')->where('union_id',$data['mosque']['union'])->where('bn_name',$data['mosque']['village'])->first();
            if(!empty($village)){
                $data['mosque']['village']=$village->id;
            }else{
                $villageData=DB::table('villages')->insert([
                    'division_id' => $data['mosque']['region'],
                    'district_id' => $data['mosque']['district'],
                    'upazilla_id' => $data['mosque']['upazila'],
                    'union_id'    => $data['mosque']['union'],
                    'bn_name'     => $data['mosque']['village']
                ]);
                
                $data['mosque']['village']=DB::getPdo()->lastInsertId();
            }

            if(DB::table('mosques')->insert($data['mosque'])){
                
                $last_id=DB::getPdo()->lastInsertId();
                $data['treasure']['mosques_id']=$last_id;
                $data['institution']['mosques_id']=$last_id;
                $data['info_provide']['mosques_id']=$last_id;

                DB::table('mosque_treasures')->insert($data['treasure']);
                DB::table('mosque_institutions')->insert($data['institution']);
                DB::table('mosque_information_providers')->insert($data['info_provide']); 

                return redirect('mosque/create');
            }else{
                return redirect('mosque/create');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mosque  $mosque
     * @return \Illuminate\Http\Response
     */
    public function show(Mosque $mosque)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mosque  $mosque
     * @return \Illuminate\Http\Response
     */
    public function edit(Mosque $mosque)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mosque  $mosque
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mosque $mosque)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mosque  $mosque
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mosque $mosque)
    {
        //
    }

     /**
     * Library application Form.
     *
     * @param  \App\Mosque  $mosque
     * @return \Illuminate\Http\Response
     */

    public function mosApplicationForm($id){
        // print_r("test"); die();mosques
         $mosque= DB::table('mosques')
                ->join('divisions', 'mosques.region', '=', 'divisions.id')
                ->join('districts', 'mosques.district', '=', 'districts.id')
                ->join('upazilas', 'mosques.upazila', '=', 'upazilas.id')
                ->join('unions', 'mosques.union', '=', 'unions.id')
                ->join('villages', 'mosques.village', '=', 'villages.id')
                ->select('mosques.*', 'divisions.bn_name as div_name', 'districts.bn_name as dis_name', 'upazilas.bn_name as up_name', 'unions.bn_name as un_name','villages.bn_name as vill_name')
                ->where('mosques.id',$id)
                ->first();

        // print_r($mosque); die();

        return view('frontend.mosque.applicationForm',compact('mosque'));
    } 


    // library application form by Shamim
    public function createlib(Request $request){
        // print_r($_POST); die();

        $data=$request->post();
        
        DB::table('library_applications')->insert([
            'mosque_name' => $data['mosque_name'],
            'mosque_id' => $data['mos_id'],
            'division_id' => $data['div_id'],
            'district_id' => $data['dis_id'],
            'upazilla_id' => $data['up_id'],
            'village_id' => $data['vill_id'],
            'mosjid_establish_year' => $data['establish_year'],
            'masjid_room_condition' => $data['room_condition'],
            'direction' => $data['direction'],
            'last_year_meeting' => $data['last_year_meeting'],
            'number_Namazi_Daily' => $data['namazir_number'],
            'number_Namazi_Weekly' => $data['namazir_number_weekly'],
            'total_yearly_income' => $data['yearly_income'],
            'wakf_property' => $data['wakf_property_amount'],
            'wakf_property_amount' => $data['wakf_property_price'],
            'wood_almari' => $data['wood_almari'],
            'still_almari' => $data['still_almari'],
            'wall_almari' => $data['wall_almari'],
            'total_almari' => $data['tot_almari'],
            'isHaveLibraryByIF' => $data['haveLibrary'],
            'book_register' => $data['book_list_register'],
            'onudan_register' => $data['onudan_register'],
            'issue_register' => $data['issue_register'],
            'karzo_biboroni_register' => $data['karzobiboroni_register'],
            'stock_register' => $data['stockRegister'],
            'cultural_register' => $data['cultural_register'],
            'other_register' => $data['other_register'],
            'edu_instit_or_govt' => $data['haveGovtOffice'],
            'library_within_range' => $data['libraryHave'],
            'trained_imam' => $data['trained_imam'],
            'imam_komiti' => '$data[imam_commitee]',
            'last_year_waz' => $data['last_year_waz'],
            'last_year_alocona' => $data['last_year_alocona'],
            'last_year_tafsir' => $data['last_year_tafsir'],
            'mosjid_activity' => "test",
            'on_behalf_of_name' => $data['c_name'],
            'visitor_address' => $data['address']
        ]);

        return redirect('mosque/list');
    }



      // Masjid Search Panel Result By Shamim
    public function searchPanel(Request $request)
    {
        // print_r($_POST); die();
        $division=DB::table('divisions')->get();

        $condition = null;
        
        if($request->post('division_id'))
        {
            $condition['mosques.region'] = $request->post('division_id');
        }

        if($request->post('district_id'))
        {
            $condition['mosques.district'] = $request->post('district_id');
        }

        if($request->post('upazilla_id'))
        {
            $condition['mosques.upazila'] = $request->post('upazilla_id');
        }

        if($request->post('union_id'))
        {
            $condition['mosques.union'] = $request->post('union_id');
        }

        if($request->post('reg_code'))
        {
            $condition['mosques.id'] = $request->post('reg_code');
        }

        // print_r($condition); die();


        $mosque= DB::table('mosques')
                    ->join('divisions', 'mosques.region', '=', 'divisions.id')
                    ->join('districts', 'mosques.district', '=', 'districts.id')
                    ->join('upazilas', 'mosques.upazila', '=', 'upazilas.id')
                    ->join('unions', 'mosques.union', '=', 'unions.id')
                    // ->join('villages', 'library_applications.village', '=', 'villages.id')
                    ->select('mosques.*', 'divisions.bn_name as div_name', 'districts.bn_name as dis_name', 'upazilas.bn_name as up_name','unions.bn_name as un_name')
                    ->where($condition)->get();
        
        return view('frontend.mosque.index', compact('mosque','division'));

       
    }

    public function mosqueNameSearch(Request $request)
    {
         if ($query = $request->post('q')) 
            {     
             $results =  DB::table('mosques')
                        ->where('mosques_name','like', '%'.$query.'%')
                        ->get();

            $items = [];
            $assoc = [];
            foreach ($results as $row) {
                $text = $row->mosques_name;
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


     public function mosqueNameSearchByRegCode(Request $request)
    {
        $user=Auth::user();
        
        if ($query = $request->post('q')) 
            {     
             $results =  DB::table('mosques')
                        ->where('mosques_reg_code','like', '%'.$query.'%')
                        ->where('district','=',$user->district)
                        ->where('upazila','=',$user->upazila)
                        ->where('union','=',$user->union)
                        ->get();

            $items = [];
            $assoc = [];
            foreach ($results as $row) {
                $text = $row->mosques_reg_code;
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
