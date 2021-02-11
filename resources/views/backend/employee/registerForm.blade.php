@extends('backend.layouts.app')


@section('content')


{{ Form::open(['route' => 'admin.employee.savePersonalInfo', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-menu', 'files' => false]) }}

    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
                
                <!-- @include('backend.books._list_sub_nav') -->
                @include('backend.employee.employee_tab')

                <div class="panel-body">
                	 
     
 
<fieldset class="box box-primary box-body">		
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-12">

        <div class="col-sm-3 col-md-3 col-lg-3">
            <!-- -----------Employee Name ---------------- --> 					
            <div class="form-group ">
                <label>নাম (ইংরেজি) </label>
                <input type='text' class="form-control" name='hrm_employee_name' id='hrm_employee_name' value=" " required=""  maxlength="100"  tabindex="1" />
                <span class='help-inline'> </span>
            </div>	
        </div>


        <div class=" col-sm-3 col-md-3 col-lg-3">
            <!-- -----------Employee Name Bengali ---------------- --> 					
            <div class="form-group">
                <label> নাম(বাংলায়)  </label>
                <input type='text' class="form-control bn_language" name='employee_name_bengali' id='employee_name_bengali' value=" " maxlength="100"  tabindex="2"  required="" />
                <span class='help-inline'> </span>
            </div>	
        </div>	

        <div class=" col-sm-3 col-md-3 col-lg-3">
            <!-- -----------Employee Personal ID---------------- --> 					
            <div class="form-group ">
                <label>  পার্সোনাল আইডি </label>
                <input type='text' class="form-control bn_language" name='emp_personal_id' id='emp_personal_id' value=" " maxlength="100"  tabindex="2"  />
                <span class='help-inline'> </span>
            </div>	
        </div>	
        
        <div class=" col-sm-3 col-md-3 col-lg-3">
            <!-- ----------- Employee Father_name ---------------- --> 
            <div class="form-group ">
                <label> বাবার নাম (ইংরেজিতে) </label>
                <input type='text' class="form-control" name='hrm_employee_father' id='hrm_employee_father'  value=" "  maxlength="100" tabindex="3"/>
                <span class='help-inline'> </span>
            </div>
        </div>


        <div class=" col-sm-3 col-md-3 col-lg-3">
            <!-- ----------- Employee Father_name Bengali ---------------- --> 
            <div class="form-group ">
                <label> বাবার নাম (বাংলায়) </label>
                <input type='text' class="form-control bn_language" name='employee_father_bengali' id='employee_father_bengali'  value=" " maxlength="100" tabindex="4" />
                <span class='help-inline'></span>
            </div>
        </div>


        <div class=" col-sm-3 col-md-3 col-lg-3">	
            <!-- ----------- Employee Mother_name ---------------- --> 					
            <div class="form-group ">
                <label> মায়ের নাম (ইংরেজিতে) </label>
                <input type='text' class="form-control" name='hrm_employee_mother' id='hrm_employee_mother' value=""   maxlength="100" tabindex="5"/>
                <span class='help-inline'> </span>
            </div>	
        </div>


        <div class=" col-sm-3 col-md-3 col-lg-3">
            <!-- ----------- Employee Mother_name Bengali ---------------- --> 					
            <div class="form-group ">
                <label> মায়ের নাম(বাংলায়) </label>
                <input type='text' class="form-control bn_language" name='employee_mother_bengali' id='employee_mother_bengali' value=" " maxlength="100" tabindex="6" />
                <span class='help-inline'> </span>
            </div>	
        </div>	


        <div class=" col-sm-3 col-md-3 col-lg-3">
            <!-- ----------- Date of Birth --------------- -->
            <div class="form-group">						
                <label> জন্মতারিখ </label>
                <input type="text" class="form-control datepickerCommon" name="hrm_employee_birth_day" id="hrm_employee_birth_day" value=" " title=""  tabindex="7"/>
            </div>	
        </div>


        <div class=" col-sm-3 col-md-3 col-lg-3">	
            <!-- ----------- Birth Place Bengali --------------- -->
            <div class="form-group ">
                <label>জন্মস্থান</label>
                <input type='text' class="form-control bn_language" name='employee_birth_place_bengali' id='employee_birth_place_bengali'  maxlength="200" value=" "  tabindex="9"/>
                <span class='help-inline'> </span>
            </div>
        </div>


        <div class=" col-sm-3 col-md-3 col-lg-3">
            <!-- ----------- Gender-------------------- -->
            <div class="form-group ">						
                <label>লিঙ্গ</label>
                <select name="hrm_employee_sex" id="hrm_employee_sex" class="form-control"  required="" tabindex="10">
                    <option value="">বাছাই করুন</option>
                    <option value="1"> ছেলে </option>
                    <option value="2"> মেয়ে </option>
                                       
                </select>
                <span class='help-inline'></span>						
            </div>		
        </div>	


        <div class=" col-sm-3 col-md-3 col-lg-3">
            <!-- ----------- Blood Group --------------- -->
            <div class="form-group ">						
                <label> রক্ত গ্রুপ  </label>
                <select class="form-control" name="hrm_blood_group" id="hrm_blood_group" tabindex="11">
                    <option >বাছাই করুন</option>
                    <option value="1">O+</option>
                    <option value="2">O-</option>
                    <option value="2">AB-</option>
                    <option value="2">AB+</option>
                    <option value="2">B+</option>
                    <option value="2">B-</option>
                    
                </select>
                <span class='help-inline'> </span>					
            </div>		
        </div>


        <div class=" col-sm-3 col-md-3 col-lg-3">
            <!-- -----------Marital Status------------- --> 
            <div class="form-group">
            <label> বৈবাহিক অবস্থা </label>
                <select class="form-control" name="hrm_employee_marital_status" id="hrm_employee_marital_status"  required="" tabindex="12">
                    <option value="">বাছাই করুন</option>
                    <option value="1">Single</option>
                    <option value="2">Married</option>
                    <option value="3">Widow</option>
                </select>
                <span class='help-inline'></span>
            </div>
        </div>


    <!--     <div class=" col-sm-3 col-md-3 col-lg-3">	
             ----------Religion ------------ -
            <div class="form-group ">						
                <label> ধর্ম </label>
                <select class="form-control" name="hrm_employee_religion" id="hrm_employee_religion"  required="" tabindex="13">
                    <option value="">বাছাই করুন</option>
                    
                </select>
                <span class='help-inline'> </span>					
            </div>
        </div> -->


        <div class=" col-sm-3 col-md-3 col-lg-3">
            <!-- ----------- Nationality ---------------- --> 
            <div class="form-group">
                <label> জাতীয়তা </label>
                <select name="hrm_employee_nationality" id="hrm_employee_nationality" class="form-control" required="" tabindex="14">
                    <option value="">বাছাই করুন</option>
                    <option value="1">Bangladesi</option>
                    <option value="2">Others</option>
                     
                </select>
                <span class='help-inline'> </span>
            </div>	
        </div>



        <div class=" col-sm-3 col-md-3 col-lg-3">
            <span id="checkNationalid" style="color:#F00; font-size:14px;"></span>
            <!-- ---------- National Id ---------------- --> 
            <div class="form-group ">

                <label> জাতীয় আইডি  </label>
                <input type='text' class="form-control" name='hrm_employee_national_id' id='hrm_employee_national_id' value="" required="" maxlength="30" tabindex="15"  onblur="nationalidCheck()"/>
                <span class='help-inline'> </span>
            </div>	
        </div>

        <div class=" col-sm-3 col-md-3 col-lg-3">
            <span id="checkNationalid" style="color:#F00; font-size:14px;"></span>
            <!-- ---------- National Id ---------------- --> 
            <div class="form-group ">

                <label> জন্মনিবন্ধন নং </label>
                <input type='text' class="form-control" name='hrm_employee_birth_regis_id' id='hrm_employee_birth_regis_id' value=" "  maxlength="50" tabindex="15"  onblur="nationalidCheck()"/>
                <span class='help-inline'></span>
            </div>	
        </div>	


        <div class=" col-sm-3 col-md-3 col-lg-3">
            <!-- ----------Passport Number---------------- --> 
            <div class="form-group ">
                <div id="checkPasspost" style="color:#F00; font-size:14px;"></div>
                <label> পাসপোর্ট নং </label>
                <input class="form-control" id='hrm_employee_passport_no'  name='hrm_employee_passport_no' type='text'  maxlength="50" value=" " tabindex="23" onblur="passportCheck()"/>
                <span class='help-inline'> </span>
            </div>
        </div>



        <div class=" col-sm-3 col-md-3 col-lg-3">
            <!-- ----------Driving Licence------------------> 
            <div class="form-group  ">
                <div id="checkDrivingLicence" style="color:#F00; font-size:14px;"></div>
                <label> ড্রাইভিং লাইসেন্সে  </label>
                <input type='text' class="form-control" id='hrm_employee_driving_licence'  name='hrm_employee_driving_licence' value=" " maxlength="50"   onblur="drivingLicencetCheck()"/>
                <span class='help-inline'></span>
            </div>
        </div>


     <!--    <div class=" col-sm-3 col-md-3 col-lg-3">
            -----------Employee Type---------------- - 
            <div class="form-group">
                <label> কর্মচারী ধরণ</label>
                <select name="hrm_employee_type" id="hrm_employee_type" class="form-control" tabindex="16">
                   <option value="0">Admin</option>
                   <option value="0">Admin</option>
                </select>
                <span class='help-inline'> </span>
            </div>
        </div>
 -->
        <input type="hidden" name="hrm_employee_type" value="1">

        <div class=" col-sm-3 col-md-3 col-lg-3">
            <!-- -----------Employee Job Nature---------------- --> 
            <div class="form-group">
                <label> জবের প্রকৃতি  </label>
                <select name="hrm_employee_job_nature" id="hrm_employee_job_nature" class="form-control" required="" tabindex="17">
                     <option value="0">Full Time</option>
                     <option value="1">Half Time</option>
                </select>
                <span class='help-inline'></span>
            </div>
        </div>


        <div class=" col-sm-3 col-md-3 col-lg-3">
            <!-- ---------- Employee Grade--------------- --> 
            <div class="form-group ">
                <label>কর্মচারী গ্রেড</label>
                <select name="hrm_employee_grade" id="hrm_employee_grade" class="form-control" required="" tabindex="20">
                     <option value="0">১</option>
                     <option value="1">২</option>
                     <option value="2">৩</option>
                     <option value="3">৪</option>
                     <option value="4">৫</option>
                     <option value="5">৬</option>
                     <option value="6">৭</option>
                    
                </select>
                <span class='help-inline'> </span>
            </div>	
        </div>


        <div class=" col-sm-3 col-md-3 col-lg-3">
            <!-- ----------- Joining Date---------------- -->						
            <div class="form-group ">						
                <label> যোগদানের তারিখ  </label>
                <input type="date" class="form-control datepickerCommon" name="employee_joining_date" id="employee_joining_date" value=" " title="" required="" tabindex="21"/>
                <span class='help-inline'> </span>
            </div>	
        </div>


        <div class=" col-sm-3 col-md-3 col-lg-3">
            <!-- ----------- Confirmation Date---------------- --> 						
            <div class="form-group">						
                <label> চাকরী নিসশয়ন </label>
                <input type="text" class="form-control datepickerCommon" name="employee_confirmarion_date" id="employee_confirmarion_date" value=" "  title="" required="" tabindex="22"/>
                <span class='help-inline'> </span>
            </div>
        </div>



        <div class=" col-sm-3 col-md-3 col-lg-3">
            <!-- ----------- Employee Status---------------- --> 
            <div class="form-group">	
                <label>স্ট্যাটাস </label>
                <select name="employee_status" id="employee_status" class="form-control" required="" tabindex="26">
                     <option value="1">Active</option>
                     <option value="0">InActive</option>
                    
                </select>
                <span class='help-inline'></span>						
            </div>	
        </div>


    <div class="col-sm-3 col-md-3 col-lg-3"> 		
        <!-- cadre / non cadre -->
        <div class="form-group">
            
            	  <label>ক্যাডার</label>
                <select class="form-control" name="cadre_noncadre" id="cadre_noncadre" required>
                  	 <option value="1">Cadre</option>
                     <option value="0">non</option>
                </select>
            
        </div>		
    </div>

    <div class="col-sm-3 col-md-3 col-lg-3"> 		
        <!-- cadre / non cadre -->
        <div class="form-group ">
            
            	  <label> সেক্টর </label>
                <!-- <select name="employment_sector" id="employment_sector" class="form-control" tabindex="16">
                    
                </select> -->
                <input type="text" class="form-control" name="employment_sector" value="">
            
        </div>		
    </div>


    <div class=" col-sm-3 col-md-3 col-lg-3">
        <!-- -----------Employee Type---------------- --> 
        <div class="form-group">
            <label> কৌটা</label>
            <select name="quota_id" class="form-control quota_id" id="quota_id"  required="" tabindex="25">
                <option value=""> Select</option>
                <option value="0"> No</option>
                <option value="1"> Yes</option>
 
            </select>
            <span class='help-inline'></span>
        </div>
    </div>

</div>	


<!------ freedom fighter start  -->
<!------ freedom fighter start  -->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 quata_panel" style="display: none;"> 
    <div class="row" id="freedom_fighter_info" >
    
     
        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
            <!-- ----------- Employee Relation With Freedom Fighter---------------- --> 
            <div class="form-group">	
                <label> মুক্তিযোদ্ধা  </label>
                <select name="emp_f_fighter_relation" id="emp_f_fighter_relation" class="form-control"  tabindex="26">
                     
                </select>
                <span class='help-inline'> </span>						
            </div>	
        </div>	

        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
            <!-- ---------Freedom Fighter Name------------------> 
            <div class="form-group">
                <label>  মুক্তিযোদ্ধার নাম </label>
                <input type='text' class="form-control bn_language" id='freedom_fighter_name'  name='freedom_fighter_name' value="" maxlength="50" />
                <span class='help-inline'> </span>
            </div>
        </div>

        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
            <!-- ---------Freedom Fighter Father Name------------------> 
            <div class="form-group">
                <label>  মুক্তিযোদ্ধার বাবার নাম </label>
                <input type='text' class="form-control bn_language" id='freedom_fighter_father_name'  name='freedom_fighter_father_name' value=" " maxlength="50"   />
                <span class='help-inline'> </span>
            </div>
        </div>


        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
            <!-- --------- Freedom Fighter address ------------------> 
            <div class="form-group">
                <label>  মুক্তিযোদ্ধার ঠিকানা </label>
                <input type='text' class="form-control bn_language" id='freedom_fighter_address'  name='freedom_fighter_address' value="" maxlength="255"   />
                <span class='help-inline'></span>
            </div>
        </div>


        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
            <!-- --------- Freedom Fighter national id ------------------> 
            <div class="form-group">
                <label> মুক্তিযোদ্ধার জাতীয় নং </label>
                <input type='text' class="form-control" id='freedom_fighter_national_id'  name='freedom_fighter_national_id' value="" maxlength="50"   />
                <span class='help-inline'> </span>
            </div>
        </div>

        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
            <!-- --------- Freedom Fighter birth date-----------------> 
            <div class="form-group">
                <label>  মুক্তিযোদ্ধার জন্মতারিখ </label>
                <input type='text' class="form-control datepickerCommon" id='freedom_fighter_birth_date'  name='freedom_fighter_birth_date' value="" />
                <span class='help-inline'></span>
            </div>
        </div>		


        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
            <!-- -----------Freedom Fighter Birth Certificate -------------------------------- --> 
            <div class="form-group">
                <label>  মুক্তিযোদ্ধার জন্মসনদ নং </label>
                <input type='text' class="form-control" id='birth_certificate_no'  name='birth_certificate_no' value="" maxlength="50"   />
                <span class='help-inline'> </span>
            </div>
        </div>


        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">			
            <div class="form-group">					
                <label>স্ট্যাটাস</label>
                <select class="form-control" name="live_status" id="live_status">
                    
                    	
                </select>
                <span class='help-inline'> </span>
            </div>
        </div>


        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
            <!-- -----------Freedom Fighter Birth Certificate -------------------------------- --> 
            <div class="form-group">
                <label>মৃত্যু সার্টিফিকেট নং </label>
                <input type='text' class="form-control" id='death_certificate_no'  name='death_certificate_no' value="" maxlength="50"   />
                <span class='help-inline'> </span>
            </div>
        </div>


        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
            <!-- -----------Freedom Fighter Mukti Barta-------------------------------- --> 
            <div class="form-group">
                <label>  মুক্তিযোদ্ধা মুক্তি বার্তা নং </label>
                <input type='text' class="form-control" id='freedom_mukti_barta_no'  name='freedom_mukti_barta_no' value="" maxlength="50"   />
                <span class='help-inline'> </span>
            </div>
        </div>


        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
            <!-- -----------Freedom Fighter Gazet no -------------------------------- --> 
            <div class="form-group">
                <label> মুক্তিযোদ্ধার গেজেট নং  </label>
                <input type='text' class="form-control" id='freedom_gazet_no'  name='freedom_gazet_no' value=" " maxlength="50"   />
                <span class='help-inline'></span>
            </div>
        </div>



        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
            <!-- -----------Freedom Fighter Mukti Barta-------------------------------- --> 
            <div class="form-group">
                <label> গেজেট তারিখ</label>
                <input type='text' class="form-control datepickerCommon" id='freedom_gazet_date'  name='freedom_gazet_date' value="" />
                <span class='help-inline'> </span>
            </div>
        </div>



        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
            <!-- -----------Freedom Fighter Number-------------------------------- --> 
            <div class="form-group">
                <label> সনদ নং </label>
                <input type='text' class="form-control" id='bamus_sonod_no'  name='bamus_sonod_no' value=" " maxlength="50"   />
                <span class='help-inline'> </span>
            </div>
        </div>


        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
            <!-- -----------Freedom Fighter Number- date------------------------------- --> 
            <div class="form-group">
                <label> সনদ তারিখ</label>
                <input type='text' class="form-control datepickerCommon" id='bamus_sonod_date'  name='bamus_sonod_date' value="" />
                <span class='help-inline'></span>
            </div>
        </div>


        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
            <!-- -----------Freedom Fighter Indian Reg No------------------------------- --> 
            <div class="form-group">
                <label> মুক্তিযোদ্ধার নং </label>
                <input type='text' class="form-control" id='fighter_indian_reg_no'  name='fighter_indian_reg_no' value="" maxlength="50"   />
                <span class='help-inline'></span>
            </div>
        </div>

        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
            <!-- --------- Freedom Fighter national id ------------------> 
            <div class="form-group">
                <label> মুক্তিযোদ্ধার বাবার জাতীয় আইডি </label>
                <input type='text' class="form-control" id='freedom_father_national_id'  name='freedom_father_national_id' value="" maxlength="50"   />
                <span class='help-inline'></span>
            </div>
        </div>

        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
            <!-- --------- Freedom Fighter national id ------------------> 
            <div class="form-group">
                <label> মুক্তিযোদ্ধার মায়ের আইডি </label>
                <input type='text' class="form-control" id='freedom_mother_national_id'  name='freedom_mother_national_id' value="" maxlength="50"   />
                <span class='help-inline'></span>
            </div>
        </div>


        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
            <!-- --------- Freedom Fighter national id ------------------> 
            <div class="form-group">
                <label>রিমারক্স </label>
                <input type='text' class="form-control bn_language" id='freedom_remarks'  name='freedom_remarks' value="" maxlength="255"   />
                <span class='help-inline'></span>
            </div>
        </div>

 
    </div>
</div>		
<!------ freedom fighter end -->	

 
</fieldset> 


					<div class="text-center">
						<button type="submit" class="btn btn-success" >সংরক্ষণ</button>
					</div>
	                
                </div>
            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!--row-->
    {{ Form::close() }}

 
@endsection


