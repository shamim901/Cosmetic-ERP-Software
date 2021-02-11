@extends('backend.layouts.app')


@section('content')


{{ Form::open(['route' => 'admin.employee.saveFamillyInfo', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-menu', 'files' => false]) }}

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
            <!-- ----------- Date of Birth --------------- -->
            <div class="form-group">						
                <label> জন্মতারিখ </label>
                <input type="text" class="form-control datepickerCommon" name="hrm_employee_birth_day" id="hrm_employee_birth_day" value=" " title="" required="" tabindex="7"/>
            </div>	
        </div>


        <div class=" col-sm-3 col-md-3 col-lg-3">	
            <!-- ----------- Birth Place Bengali --------------- -->
            <div class="form-group ">
                <label>জন্মতারিখ (বাংলায়) </label>
                <input type='text' class="form-control bn_language" name='employee_birth_place_bengali' id='employee_birth_place_bengali'  maxlength="200" value=" "  tabindex="9"/>
                <span class='help-inline'> </span>
            </div>
        </div>
  


      
            <div class="col-sm-3 col-md-3 col-lg-3">
                <!-- ----------- Relation ---------------- --> 
                <div class="form-group  ">
                     <label> সম্পর্ক   </label>
                  <!--   <select class="form-control" name="RELATION" id="RELATION"  tabindex="6">
 

                    </select> -->
                     <input class="form-control bn_language" id='ORGANIZATION' name='RELATION' type='text' maxlength="200" />
                    <span class='help-inline'> </span>
                </div>              
            </div>




            <div class="col-sm-3 col-md-3 col-lg-3"> 
                <div class="form-group ">
                    <label> প্রতিষ্ঠান </label>
                    <input class="form-control bn_language" id='ORGANIZATION' name='ORGANIZATION' type='text' maxlength="200" />
                    <span class='help-inline'> </span>
                </div>          
            </div>

            <div class="col-sm-3 col-md-3 col-lg-3"> 
                <div class="form-group ">
                    <label>প্রতিষ্ঠানের ঠিকানা </label>
                    <input class="form-control bn_language" id='ORGANIZATION_ADDRESS' name='ORGANIZATION_ADDRESS' type='text' maxlength="200" />
                    <span class='help-inline'> </span>
                </div>          
            </div>

                <div class="col-sm-3 col-md-3 col-lg-3"> 
                <div class="form-group">
                    <label> পরিবারের পদবি </label>
                    <input class="form-control bn_language" id='FAMILY_DESIGNATION' name='FAMILY_DESIGNATION' type='text' maxlength="200" />
                    <span class='help-inline'></span>
                </div>          
            </div>

            <div class="col-sm-3 col-md-3 col-lg-3">
                <!-- ----------- Employee family Contact No ---------------- -->               
                <div class="form-group ">
                    <label>যোগাযোগ নং </label>
                    <input type='text' name='CONTACT_NO' value=" " id='CONTACT_NO' class="form-control" maxlength="15" tabindex="7"/>
                    <span class='help-inline'></span>
                </div>          
            </div>

             <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
            <!-- --------- Freedom Fighter national id ------------------> 
            <div class="form-group">
                <label> মন্তব্য </label>
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