<?php

namespace App\Http\Controllers\Api\V1\Mosque;
use App\Http\Controllers\API\V1\APIController;
use Illuminate\Http\Request;
use App\Models\Mosques\Mosque;
use App\Models\Mosques\Mosque_information_provider;
use App\Models\Mosques\Mosque_institution;
use App\Models\Mosques\Mosque_treasure;
use DB;
use Validator;
use Config;


class MosqueController extends APIController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($created_by, Request $request)
    {   

        $mosque = Mosque::where('created_by','=',$created_by)->get();

        $data = array();
        
        foreach ($mosque as $key => $item) {
            $village = DB::table('villages')->find($item->village);

            $data[$key]['mosque']['id'] = $item->id;
            $data[$key]['mosque']['mosques_name'] = $item->mosques_name;
            $data[$key]['mosque']['mosques_reg_code'] = $item->mosques_reg_code;
            $data[$key]['mosque']['mosques_establishment_year'] = $item->mosques_establishment_year;
            $data[$key]['mosque']['mosques_size'] = $item->mosques_size;
            $data[$key]['mosque']['mosques_structure'] = $item->mosques_structure;
            $data[$key]['mosque']['mosques_type'] = $item->mosques_type;
            $data[$key]['mosque']['waktiya_prayer_average'] = $item->waktiya_prayer_average;
            $data[$key]['mosque']['jumma_prayer_average'] = $item->jumma_prayer_average;
            $data[$key]['mosque']['women_prayer_facilities'] = $item->women_prayer_facilities;
            $data[$key]['mosque']['waktiya_women_prayer_average'] = $item->waktiya_women_prayer_average;
            $data[$key]['mosque']['jumma_women_prayer_average'] = $item->jumma_women_prayer_average;
            $data[$key]['mosque']['mosques_corridor'] = $item->mosques_corridor;
            $data[$key]['mosque']['electricity_facilities'] = $item->electricity_facilities;
            $data[$key]['mosque']['water_facilities'] = $item->water_facilities;
            $data[$key]['mosque']['toilet_facilities'] = $item->toilet_facilities;
            $data[$key]['mosque']['gas_facilities'] = $item->gas_facilities;
            $data[$key]['mosque']['region'] = $item->region;
            $data[$key]['mosque']['district'] = $item->district;
            $data[$key]['mosque']['upazila'] = $item->upazila;
            $data[$key]['mosque']['union'] = $item->union;
            $data[$key]['mosque']['village'] = $village->bn_name;
            $data[$key]['mosque']['post_code'] = $item->post_code;
            $data[$key]['mosque']['historically_important_mosjid'] = $item->historically_important_mosjid;
            $data[$key]['mosque']['created_by'] = $item->created_by;
            $data[$key]['mosque']['status'] = $item->status;
            
            // Mosque_treasure
            $Mosque_treasure = Mosque_treasure::where('mosques_id',$item->id)->first();

            if(!empty($Mosque_treasure)){
                $data[$key]['treasure']['id'] = $Mosque_treasure->id;
                $data[$key]['treasure']['mosques_id'] = $Mosque_treasure->mosques_id;
                $data[$key]['treasure']['mosques_property_measurements'] = $Mosque_treasure->mosques_property_measurements;
                $data[$key]['treasure']['mosques_floor_number'] = $Mosque_treasure->mosques_floor_number;
                $data[$key]['treasure']['mosques_property_price'] = $Mosque_treasure->mosques_property_price;
                $data[$key]['treasure']['mosques_annual_income'] = $Mosque_treasure->mosques_annual_income;
                $data[$key]['treasure']['mosques_property_type'] = $Mosque_treasure->mosques_property_type;
                $data[$key]['treasure']['mosques_management'] = $Mosque_treasure->mosques_management;
                $data[$key]['treasure']['mosques_khatib'] = $Mosque_treasure->mosques_khatib;
                $data[$key]['treasure']['mosques_imam'] = $Mosque_treasure->mosques_imam;
                $data[$key]['treasure']['mosques_khadem'] = $Mosque_treasure->mosques_khadem;
                $data[$key]['treasure']['mosques_imam_training'] = $Mosque_treasure->mosques_imam_training;
                $data[$key]['treasure']['motalli_name'] = $Mosque_treasure->motalli_name;
                $data[$key]['treasure']['motalli_mobile'] = $Mosque_treasure->motalli_mobile;
                $data[$key]['treasure']['imam_name'] = $Mosque_treasure->imam_name;
                $data[$key]['treasure']['imam_mobile'] = $Mosque_treasure->imam_mobile;
                $data[$key]['treasure']['imam_nid'] = $Mosque_treasure->imam_nid;

            }
            // Mosque_institution
            $Mosque_institution = Mosque_institution::where('mosques_id',$item->id)->first();

            if(!empty($Mosque_institution)){
                $data[$key]['institution']['id'] = $Mosque_institution->id;
                $data[$key]['institution']['mosques_id'] = $Mosque_institution->mosques_id;
                $data[$key]['institution']['mosques_library'] = $Mosque_institution->mosques_library;
                $data[$key]['institution']['iibrarian'] = $Mosque_institution->iibrarian;
                $data[$key]['institution']['total_books'] = $Mosque_institution->total_books;
                $data[$key]['institution']['total_almary'] = $Mosque_institution->total_almary;
                $data[$key]['institution']['mosques_institute_type'] = $Mosque_institution->mosques_institute_type;
                $data[$key]['institution']['mosques_institute_name'] = $Mosque_institution->mosques_institute_name;
                $data[$key]['institution']['madrasa_type'] = $Mosque_institution->madrasa_type;
                $data[$key]['institution']['aliya_madrasa_stage'] = $Mosque_institution->aliya_madrasa_stage;
                $data[$key]['institution']['kawmia_madrasa_stage'] = $Mosque_institution->kawmia_madrasa_stage;
                $data[$key]['institution']['mass_education'] = $Mosque_institution->mass_education;
                $data[$key]['institution']['center_teacher_training'] = $Mosque_institution->center_teacher_training;
            } 

            // Mosque_information_provider
            $Mosque_information_provider = Mosque_information_provider::where('mosques_id',$item->id)->first();
            if(!empty($Mosque_information_provider)){
                $data[$key]['info_provide']['id'] = $Mosque_information_provider->id;
                $data[$key]['info_provide']['mosques_id'] = $Mosque_information_provider->mosques_id;
                $data[$key]['info_provide']['provider_name'] = $Mosque_information_provider->provider_name;
                $data[$key]['info_provide']['provider_identity'] = $Mosque_information_provider->provider_identity;
                $data[$key]['info_provide']['provider_signature'] = $Mosque_information_provider->provider_signature;
            }
            // location
            $region = DB::table('divisions')->find($item->region);
            $district = DB::table('districts')->find($item->district);
            $upazila = DB::table('upazilas')->find($item->upazila);
            $union = DB::table('unions')->find($item->union);

            $data[$key]['location']['region'] = $region->bn_name;
            $data[$key]['location']['district'] = $district->bn_name;
            $data[$key]['location']['upazila'] = $upazila->bn_name;
            $data[$key]['location']['union'] = $union->bn_name;
            $data[$key]['location']['village'] = $village->bn_name;
            $data[$key]['location']['post_code'] = $item->post_code;
        }

        $list = $data;

        return response()->json(['status' => 'true', 'data' => $list],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create(Request $request)
    {
        $data=$request->post();
        
        
        if(!empty($data['reg_id'])){
            
            $mosque = Mosque::where('id', $data['reg_id'])->first();
            if(empty($mosque->id)){

                return response()->json(['status' => 'false', 'message' => 'Data Not Found'],404);
            }
            
            if(!empty($data['mosque']['mosques_name'])){

                $village = DB::table('villages')->where('union_id',$data['mosque']['union'])->where('bn_name',$data['mosque']['village'])->first();
                if(!empty($village)){
                    $data['mosque']['village']=$village->id;
                }else{
                    $villageData=DB::table('villages')->insert([
                        'division_id' => $data['mosque']['region'],
                        'district_id' => $data['mosque']['district'],
                        'upazilla_id' => $data['mosque']['upazila'],
                        'union_id'    => $data['mosque']['union'],
                        'bn_name'     => $data['mosque']['village'],
                    ]);
                    
                    $data['mosque']['village']=DB::getPdo()->lastInsertId();
                }

                DB::table('mosques')->where('id', $data['reg_id'])->update($data['mosque']);
            }

            if(!empty($data['treasure']['mosques_property_measurements'])){

                $treasure = Mosque_treasure::where('mosques_id',$data['reg_id'])->first();

                DB::table('mosque_treasures')->where('id', $treasure->id)->update($data['treasure']);
            }
            
            if(!empty($data['institution']['madrasa_type'])){

                $institutions = Mosque_institution::where('mosques_id',$data['reg_id'])->first();

                DB::table('mosque_institutions')->where('id', $institutions->id)->update($data['institution']);
            }

            if(!empty($data['info_provide']['provider_name'])){

                $providers = Mosque_information_provider::where('mosques_id',$data['reg_id'])->first();

                DB::table('mosque_information_providers')->where('id', $providers->id)->update($data['info_provide']);
            }
            
            return response()->json(['status' => 'true', 'message' => 'Update Successfully']);
            
        }else{
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
                        'bn_name'     => $data['mosque']['village'],
                    ]);
                    
                    $data['mosque']['village']=DB::getPdo()->lastInsertId();
                }

                if(DB::table('mosques')->insert($data['mosque'])){
                    
                    $last_id=DB::getPdo()->lastInsertId();

                    DB::table('mosque_treasures')->insert(array('mosques_id'=>$last_id));
                    DB::table('mosque_institutions')->insert(array('mosques_id'=>$last_id));
                    DB::table('mosque_information_providers')->insert(array('mosques_id'=>$last_id)); 

                    return response()->json(['status' => 'true', 'message' => 'Insert Successfully', 'insert_id' =>$last_id]);
                }else{
                    return response()->json(['status' => 'false', 'message' => 'Insert unsuccessfully'],201);
                }
            }
        }
        
        return response()->json(['status' => 'false', 'message' => 'Data not found'],201);
        
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Mosque  $mosque
     * @return \Illuminate\Http\Response
     */
    public function details(Request $request)
    {
        $data=$request->post();
        $mosque = Mosque::where('id', $data['mosque_id'])->first();

        $data = array();
        if(!empty($mosque->id)){
            $region = DB::table('divisions')->find($mosque->region);
            $district = DB::table('districts')->find($mosque->district);
            $upazila = DB::table('upazilas')->find($mosque->upazila);
            $union = DB::table('unions')->find($mosque->union);
            $village = DB::table('villages')->find($mosque->village);

            $data['location']['region'] = $region->bn_name;
            $data['location']['district'] = $district->bn_name;
            $data['location']['upazila'] = $upazila->bn_name;
            $data['location']['union'] = $union->bn_name;
            $data['location']['village'] = $village->bn_name;
            $data['location']['post_code'] = $mosque->post_code;

        
            $data['mosque']['id'] = $mosque->id;
            $data['mosque']['mosques_name'] = $mosque->mosques_name;
            $data['mosque']['mosques_reg_code'] = $mosque->mosques_reg_code;
            $data['mosque']['mosques_establishment_year'] = $mosque->mosques_establishment_year;
            $data['mosque']['mosques_size'] = $mosque->mosques_size;
            $data['mosque']['mosques_structure'] = config::get("mosque.structure.$mosque->mosques_structure");
            $data['mosque']['mosques_type'] = config::get("mosque.mosque_type.$mosque->mosques_type");
            $data['mosque']['waktiya_prayer_average'] = $mosque->waktiya_prayer_average;
            $data['mosque']['jumma_prayer_average'] = $mosque->jumma_prayer_average;
            $data['mosque']['women_prayer_facilities'] = config::get("mosque.yes_no.$mosque->women_prayer_facilities");
            $data['mosque']['waktiya_women_prayer_average'] = $mosque->waktiya_women_prayer_average;
            $data['mosque']['jumma_women_prayer_average'] = $mosque->jumma_women_prayer_average;
            $data['mosque']['mosques_corridor'] = config::get("mosque.yes_no.$mosque->mosques_corridor");
            $data['mosque']['electricity_facilities'] = config::get("mosque.yes_no.$mosque->electricity_facilities");
            $data['mosque']['water_facilities'] = $mosque->water_facilities;
            $data['mosque']['toilet_facilities'] = config::get("mosque.yes_no.$mosque->toilet_facilities");
            $data['mosque']['gas_facilities'] = config::get("mosque.yes_no.$mosque->gas_facilities");
            $data['mosque']['region'] = $mosque->region;
            $data['mosque']['district'] = $mosque->district;
            $data['mosque']['upazila'] = $mosque->upazila;
            $data['mosque']['union'] = $mosque->union;
            $data['mosque']['village'] = $village->bn_name;
            $data['mosque']['post_code'] = $mosque->post_code;
            $data['mosque']['historically_important_mosjid'] = config::get("mosque.yes_no.$mosque->historically_important_mosjid");
            $data['mosque']['created_by'] = $mosque->created_by;
            
            // Mosque_treasure
            $Mosque_treasure = Mosque_treasure::where('mosques_id',$mosque->id)->first();
            if(!empty($Mosque_treasure)){
                $data['treasure']['id'] = $Mosque_treasure->id;
                $data['treasure']['mosques_id'] = $Mosque_treasure->mosques_id;
                $data['treasure']['mosques_property_measurements'] = $Mosque_treasure->mosques_property_measurements;
                $data['treasure']['mosques_floor_number'] = $Mosque_treasure->mosques_floor_number;
                $data['treasure']['mosques_property_price'] = $Mosque_treasure->mosques_property_price;
                $data['treasure']['mosques_annual_income'] = $Mosque_treasure->mosques_annual_income;
                $data['treasure']['mosques_property_type'] = config::get("mosque.property_type.$Mosque_treasure->mosques_property_type");
                $data['treasure']['mosques_management'] = config::get("mosque.management.$Mosque_treasure->mosques_management");
                $data['treasure']['mosques_khatib'] = $Mosque_treasure->mosques_khatib;
                $data['treasure']['mosques_imam'] = $Mosque_treasure->mosques_imam;
                $data['treasure']['mosques_khadem'] = $Mosque_treasure->mosques_khadem;
                $data['treasure']['mosques_imam_training'] = config::get("mosque.training.$Mosque_treasure->mosques_imam_training");
                $data['treasure']['motalli_name'] = $Mosque_treasure->motalli_name;
                $data['treasure']['motalli_mobile'] = $Mosque_treasure->motalli_mobile;
                $data['treasure']['imam_name'] = $Mosque_treasure->imam_name;
                $data['treasure']['imam_mobile'] = $Mosque_treasure->imam_mobile;
                $data['treasure']['imam_nid'] = $Mosque_treasure->imam_nid;

            }    
            // Mosque_institution
            $Mosque_institution = Mosque_institution::where('mosques_id',$mosque->id)->first();
            if(!empty($Mosque_institution)){
                $data['institution']['id'] = $Mosque_institution->id;
                $data['institution']['mosques_id'] = $Mosque_institution->mosques_id;
                $data['institution']['mosques_library'] = config::get("mosque.yes_no.$Mosque_institution->mosques_library");
                $data['institution']['iibrarian'] = config::get("mosque.yes_no.$Mosque_institution->iibrarian");
                $data['institution']['total_books'] = $Mosque_institution->total_books;
                $data['institution']['total_almary'] = $Mosque_institution->total_almary;
                $data['institution']['mosques_institute_type'] = $Mosque_institution->mosques_institute_type;
                $data['institution']['mosques_institute_name'] = $Mosque_institution->mosques_institute_name;
                $data['institution']['madrasa_type'] = $Mosque_institution->madrasa_type;
                $data['institution']['aliya_madrasa_stage'] = config::get("mosque.alia_stage.$Mosque_institution->aliya_madrasa_stage");
                $data['institution']['kawmia_madrasa_stage'] = config::get("mosque.kawmia_stage.$Mosque_institution->kawmia_madrasa_stage");
                $data['institution']['mass_education'] = $Mosque_institution->mass_education;
                $data['institution']['center_teacher_training'] = config::get("mosque.training.$Mosque_institution->center_teacher_training");
                 
            }
            // Mosque_information_provider
            $Mosque_information_provider = Mosque_information_provider::where('mosques_id',$mosque->id)->first();
            if(!empty($Mosque_information_provider)){
                $data['info_provide']['id'] = $Mosque_information_provider->id;
                $data['info_provide']['mosques_id'] = $Mosque_information_provider->mosques_id;
                $data['info_provide']['provider_name'] = $Mosque_information_provider->provider_name;
                $data['info_provide']['provider_identity'] = $Mosque_information_provider->provider_identity;
                $data['info_provide']['provider_signature'] = $Mosque_information_provider->provider_signature;
            }
        
        }
        return response()->json(['status' => 'true', 'data' => array($data)],200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mosque  $mosque
     * @return \Illuminate\Http\Response
     */
    public function edit($mosjid_id,Request $request)
    {
        return response()->json(['status' => 'true', 'message' => $request['reg_id']],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mosque  $mosque
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data=$request->post();
        $mosque_data = Mosque::where('id', $data['mosque_id'])->first();
        if(!empty($mosque_data->id)){
            $mosque = Mosque::where('id', $data['mosque_id'])->delete();
    
            $Mosque_treasure = Mosque_treasure::where('mosques_id',$data['mosque_id'])->delete();
            
            $Mosque_institution = Mosque_institution::where('mosques_id',$data['mosque_id'])->delete();
    
            $Mosque_information_provider = Mosque_information_provider::where('mosques_id',$data['mosque_id'])->delete();
    
            return response()->json(['status' => 'true', 'data' => ['message' => 'Delete Successfully']],200);
        }else{
            return response()->json(['status' => 'false', 'data' => ['message' => 'Data Not Found']],404);
        }

    }

    public function status(Request $request)
    {
        $data=$request->post();
        $mosque_data = Mosque::where('id', $data['mosque_id'])->first();
        if(!empty($mosque_data->id)){
            $mosque = Mosque::where('id', $data['mosque_id'])->update(['status' => 1]);
            return response()->json(['status' => 'true', 'data' => ['message' => 'Successfully save the final']],200);
        }else{
           return response()->json(['status' => 'false', 'data' => ['message' => 'Data Not Found']],404); 
        }
        

    }
}
