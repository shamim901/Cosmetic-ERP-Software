@extends('backend.layouts.app')


@section('content')


{{ Form::open(['route' => 'admin.employee.saveContactInfo', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-menu', 'files' => false]) }}

    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
                
                <!-- @include('backend.books._list_sub_nav') -->
                @include('backend.employee.employee_tab')

                <div class="panel-body">
                	 
     
 
<fieldset class="box box-primary box-body">		

      
 <div class="col-sm-12 col-md-12 col-lg-12">                        
        <input type="hidden" name="empId" id="empId" value=" " required="" />   
     
        <div class="col-sm-6 col-md-6 col-lg-6">
            <h4 style="margin-left:-13px"><strong>স্থায়ী ঠিকানা</strong></h4>
                            
        </div>
        
        <div class="col-sm-6 col-md-6 col-lg-6">                    
            <div class="col-md-11">
                <h4><strong>বর্তমান ঠিকানা  </h4>           
            </div>      
             
    </div>
    
    
    <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="col-sm-6 col-md-6 col-lg-6">
            <div class="col-sm-6 col-md-6 col-lg-6">    
                <!-- -----------PERMANENT Village ---------------- --> 
                <div class="form-group  ">
                    <div id="checkVillage" style="color:#F00; font-size:14px;"></div>
                    <label> গ্রাম </label>
                    <input type='text' class="form-control bn_language" name='employee_permanent_village' id='employee_permanent_village'  maxlength="100" value=" " onblur="emailCheck()"  />
                    <span class='help-inline'> </span>
                </div>  
                
                <!-- -----------PERMANENT POST OFFICE ----------- --> 
                <div class="form-group ">
                    <label> পোষ্ট অফিস </label>
                 
                   <!--  <select class="form-control bn_language" name='employee_permanent_post_office' id='employee_permanent_post_office'   >
                       
                    </select> -->
                    <input type="text" class="form-control" name=" thana">
                    <span class='help-inline'> </span>
                </div>              
            </div>
            
            
            <div class="col-sm-6 col-md-6 col-lg-6">                
                <!-- -----------PERMANENT POLICE STATION ---------------- --> 
                <div class="form-group">
                    <label> থানা </label>
                   
                    <!-- <select class="form-control bn_language"  name='employee_permanent_police_station' id='employee_permanent_police_station'  >
                        
                    </select> -->
                    <input type="text" class="form-control" name=" thana">
                    <span class='help-inline'> </span>
                </div>              
                
                                
                <!-- -----------PERMANENT DISTRICT ---------------- --> 
                <div class="form-group">
                    <label> জেলা </label>
                    <input type="text" class="form-control" name=" thana">
                  <!--   <select class="form-control bn_language"  name='employee_permanent_district' id='employee_permanent_district'>
                        
                    </select> -->
                    <span class='help-inline'> </span>
                </div>              
                
                    
            </div>

 
           <!--  <div class="col-sm-12 col-md-12 col-lg-12">             
                    <div class="row">
                        <div class="col-md-3" style="margin-left: -36px;text-align: left;"><input  type='checkbox' id='permanent_as_postal'  name='postal[]' value="1" class="form-control postal" /></div>
                        <div class="col-md-9">
                            <h4 style="margin-left: -36px;text-align: left;"><strong>Use As Postal Address</strong></h4>
                        </div>
                    </div>
                    
                </div>
 -->
            <div class="col-sm-12 col-md-12 col-lg-12">             
                <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6">                
                
                <!-- ----------- emergrency contact person------------- --> 
                <div class="form-group ">
                    <label>জরুরী যোগাযোগ নাম  </label>
                    <input type='text' class="form-control bn_language" name='employee_emergency_contact_name' id='employee_emergency_contact_name'  maxlength="50"  value=" "/>
                    <span class='help-inline'> </span>
                </div>
                
                <!-- ----------- emergrency contact  mobile------------- --> 
                 <div class="form-group ">
                    <label> জরুরী যোগাযোগ নাম্বার </label>
                    <input type='text' class="form-control bn_language" name='employee_emergency_contact' id='employee_emergency_contact' maxlength="15"  value=" " />
                    <span class='help-inline'> </span>
                </div>              
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6">
                <!------------- emergrency contact person- relation--------------> 
                <div class="form-group ">
                    <label> সম্পর্ক </label>
                  <!--   <select class="form-control" name="employee_relation" id="employee_relation" >
                         
                    </select>     -->
                    <input type="text" class="form-control" name=" thana">               
                    <span class='help-inline'> </span>
                </div>          
            </div>
            </div>
        </div>
        </div>          
            
        


        <div class="col-sm-6 col-md-6 col-lg-6">
            <div class="col-sm-6 col-md-6 col-lg-6">    
                <!-- ----------- PRESENT VILLAGE ---------------- --> 
                <div class="form-group">
                    <div id="checkVillage" style="color:#F00; font-size:14px;"></div>
                    <label > গ্রাম</label>
                    <input type='text' class="form-control bn_language" name='employee_present_village' id='employee_present_village'  maxlength="100" value=" " onblur="emailCheck()"  />
                    <span class='help-inline'> </span>
                </div>  
                
                <!-- -----------PRESENT POST OFFICE ------------ --> 
                <div class="form-group  ">
                    <label>পোষ্ট অফিস </label>
                   
                <!--     <select class="form-control bn_language" name='employee_present_post_office' id='employee_present_post_office'   >
                        
                    </select> -->
                    <input type="text" class="form-control" name=" thana">
                    <span class='help-inline'> </span>
                </div>              
            </div>

            <div class="col-sm-6 col-md-6 col-lg-6">                
                <!-- -----------PRESENT POLICE STATION ---------------- --> 
                <div class="form-group">
                    <label> থানা </label>
                   <!-- 
                    <select class="form-control bn_language"  name='employee_present_police_station' id='employee_present_police_station'  >
                     
                    </select> -->
                    <input type="text" class="form-control" name=" thana">
                    <span class='help-inline'> </span>
                </div>              
                
                                
                <!-- -----------PRESENT DISTRICT ---------------- --> 
                <div class="form-group  ">
                    <label> জেলা</label>
                 <!--  <select class="form-control bn_language" name='employee_present_district' id='employee_present_district' >
                        
                    </select> -->
                    <input type="text" class="form-control" name=" thana">
                    <span class='help-inline'> </span>
                </div>

                
                    
            </div>
                <div class="col-sm-6 col-md-6 col-lg-6">                
              
                    
                <!-- ----------- Email Address---------------- --> 
                <div class="form-group">
                    <div id="checkEmail" style="color:#F00; font-size:14px;"></div>
                    <label> ইমেইল </label>
                    <input type='text' class="form-control" name='employee_email_address' id='employee_email_address'  maxlength="100" value=" " onblur="emailCheck()"  />
                    <span class='help-inline'> </span>
                </div>  
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">                
                <!-- -----------fax no------------ --> 
                <div class="form-group  ">
                    <label> ফ্যাক্স </label>
                    <input type='text' class="form-control bn_language" name='employee_fax_no' id='employee_fax_no'  value=" " />
                    <span class='help-inline'> </span>
                </div>
                </div>              
                
                <div class="col-md-6 col-sm-6 col-lg-6">
            
                <!-- ----------- Telephone No---------------- --> 
                <div class="form-group  ">
                    <label> টেলিফোন </label>
                    <input type='text' class="form-control bn_language"  name='employee_telephone_no' id='employee_telephone_no'  maxlength="15" value=" "/>
                    <span class='help-inline'> </span>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-lg-6">
                <!------------- Mobile No------------------> 
                <div class="form-group  ">
                    <label> মোবাইল</label>
                    <input type='text' class="form-control bn_language"  name='employee_mobile_no' id='employee_mobile_no' maxlength="15" value=" "  required=""/>
                    <span class='help-inline'> </span>
                </div>
            </div>
            

           <!--      <div class="col-sm-12 col-md-12 col-lg-12">             
                    <div class="row">
                        <div class="col-md-3" style="margin-left: -36px;text-align: left;">
                            <input  type='checkbox' id='present_as_postal'  name='postal[]' value="2" class="form-control postal"/></div>
                        <div class="col-md-9">
                            <h4 style="margin-left: -36px;text-align: left;"><strong>Use As Postal Address</strong></h4>
                        </div>
                    </div>
                    
                </div> -->

                
        </div>      
 
    </div>

 
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