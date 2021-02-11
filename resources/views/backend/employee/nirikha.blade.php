@extends('backend.layouts.app')


@section('content')


{{ Form::open(['route' => 'admin.employee.saveNirikha', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-menu', 'files' => false]) }}

    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
                
                <!-- @include('backend.books._list_sub_nav') -->
                @include('backend.employee.employee_tab')

                <div class="panel-body">
                	 
 
    <fieldset class="box box-primary box-body">		
      <div class="row">

        <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">           
            <!-- -----------Job Experience/ Organization Name ------------------- --> 
            <div class="form-group ">
                <label> প্রতিষ্ঠান </label>
                <input type='text' name='ORGANIZATION' value="" id='ORGANIZATION' class="form-control" maxlength="150"   tabindex="1"/>
                <span class='help-inline'> </span>
            </div>      
        </div>

        <!-- Optional: clear the XS cols if their content doesn't match in height -->
        <div class="clearfix visible-xs-block"></div>

        <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
            <!-- ----------- Job Experience/ ORGANIZATION_ADDRESS ---------------- -->               
            <div class="form-group">
                <label> প্রতিষ্ঠানের ঠিকানা </label>
                <textarea  name='ORGANIZATION_ADDRESS' id='ORGANIZATION_ADDRESS' class="form-control" rows="1" cols="50" tabindex="5"  maxlength="150" style="max-height:28px;"></textarea>
                <span class='help-inline'> </span>
            </div>
        </div>

        <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
            <!-- ----------- Job Experience/ YEAR START --------------- -->
            <div class=" ">
                <div class='form-group'>
                    <label> যোগদানের তারিখ </label>
                    <input type="text" name="YEAR_START" value="" id="YEAR_START" class="form-control datepickerCommon" title=" "  tabindex="9"/>
                </div>
            </div>
        </div>

    </div>  


    <div class="row">

        <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">       
            <!-- -----------Job Experience/ Organization Name In Bengali ------------------- --> 
            <div class="form-group ">
                <label> প্রতিষ্ঠান (বাংলায়) </label>
                <input type='text' name='ORGANIZATION_BENGALI' value="" id='ORGANIZATION_BENGALI' class="form-control bn_language" maxlength="150" tabindex="2"/>
                <span class='help-inline'> </span>
            </div>
        </div>

        <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
            <!-- ----------- Job Experience/ ORGANIZATION_ADDRESS IN BENGALI ---------------- -->               
            <div class="form-group ">
                <label> প্রতিষ্ঠানের ঠিকানা (বাংলায়)</label>
                <textarea  name='ORGANIZATION_ADDRESS_BENGALI' id='ORGANIZATION_ADDRESS_BENGALI' class="form-control bn_language" rows="1" cols="50" tabindex="6"  maxlength="150" style="max-height:28px;"></textarea>
                <span class='help-inline'> </span>
            </div>
        </div>

        <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
            <!-- ----------- Job Experience/ YEAR END --------------- -->
            <div class=" ">
                <div class='form-group'>
                    <label> সমাপ্তি তারিখ </label>
                    <input type="text" name="YEAR_END" value="" id="YEAR_END" class="form-control datepickerCommon" title=" "  tabindex="10"/>
                    <span class='help-inline'> </span>
                </div>
            </div>  
        </div>

        <!-- Optional: clear the XS cols if their content doesn't match in height -->
        <div class="clearfix visible-xs-block"></div>

    </div>              


    <div class="row">

        <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
            <!-- ----------- Job Experience/ Position ------------- -->                         
            <div class="form-group  ">
                <label> পজিশন </label>
                <select class="form-control" name="POSITION" id="POSITION"  tabindex="2">
                    
                </select>

                <span class='help-inline'> </span>
            </div>
        </div>


        <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
            <!-- ----------- Job Experience/ CONTACT PERSON ENGLISH ------------ -->               
            <div class="form-group  ">
                <label> যোগাযোগকারীর নাম্বার </label>
                <input type='text' name='CONTACT_PERSON' value="" id='CONTACT_PERSON' class="form-control" maxlength="50" tabindex="7"/>
                <span class='help-inline'> </span>
            </div>
        </div>


        <!-- Optional: clear the XS cols if their content doesn't match in height -->
        <div class="clearfix visible-xs-block"></div>

        <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">           
            <!-- ----------- Job Experience/ REASON FOR LEAVING ---------------- -->               
            <div class="form-group  ">
                <label>ছাড়ার কারণ </label>
                <textarea  name='REASON_FOR_LEAVING' id='REASON_FOR_LEAVING' class="form-control" rows="1" cols="50"   tabindex="11"  maxlength="50" style="max-height:28px;"></textarea>
                <span class='help-inline'> </span>
            </div>      
        </div>

    </div>              


    <div class="row">

        <!-- Optional: clear the XS cols if their content doesn't match in height -->
        <div class="clearfix visible-xs-block"></div>

        <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
            <!-- ----------- Job Experience/ CONTACT Number ------------ -->               
            <div class="form-group  ">
                <label> যোগাযোগ </label>
                <input type='text' name='CONTACT_NUMBER' value="" id='CONTACT_NUMBER' class="form-control bn_language" maxlength="15" tabindex="4"/>
                <span class='help-inline'> </span>
            </div>                      
        </div>


        <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
            <!-- ----------- Job Experience/ CONTACT PERSON IN BENGALI ------------ -->               
            <div class="form-group  ">
                <label> যোগাযোগ নং (বাংলায়) </label>
                <input type='text' name='CONTACT_PERSON_BENGALI' value="" id='CONTACT_PERSON_BENGALI' class="form-control bn_language" maxlength="50" tabindex="8"/>
                <span class='help-inline'> </span>
            </div>
        </div>

        <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">       
            <!-- ----------- Job Experience/ Reason For Leaving In Bengali ---------------- -->               
            <div class="form-group  ">
                <label> ছাড়ার কারণ (বাংলায়) </label>
                <textarea  name='REASON_FOR_LEAVING_BENGALI' id='REASON_FOR_LEAVING_BENGALI' class="form-control bn_language" rows="1" cols="50"  tabindex="12"  maxlength="50" style="max-height:28px;"></textarea>
                <span class='help-inline'> </span>
            </div>
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