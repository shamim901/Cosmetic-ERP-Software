@extends('backend.layouts.app')


@section('content')


{{ Form::open(['route' => 'admin.employee.saveNiogInfo', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-menu', 'files' => false]) }}

    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
                
                <!-- @include('backend.books._list_sub_nav') -->
                @include('backend.employee.employee_tab')

                <div class="panel-body">
                	 
     
 
<fieldset class="box box-primary box-body">		

 
        <div class="col-sm-6 col-md-4 col-lg-4"> 
            <!-- Employee Visual Id -->
            <div class="form-group  ">
                <div class='control'>               
                    <input type='text' name='emp_visual_id' value=" " id='emp_visual_id' class="form-control"  maxlength="100">
                    <span class='help-inline'> </span>
                </div>
            </div>

            <!-- Circular Date -->  
            <div class="form-group  ">
                 <div class='control'>
                    <input type="text" name="circular_date" value=" " id="circular_date"   class="form-control datepickerCommon"/>
                    <span class='help-inline'> </span>
                </div>
            </div>

            <!------------ Viva Exam Date ----------->
            <div class="form-group  ">
                <div class='control'>
                    <input type='text' name='viva_exam_date' id='viva_exam_date' value=" " class="form-control datepickerCommon"  maxlength="150"/>
                    <span class='help-inline'> </span>
                </div>
            </div>

            <!------------ Second Reference Person Name ----------->
            <div class="form-group">
 
                <div class='control'>
                    <input type='text' name='second_reference_person_name' id='second_reference_person_name' value=" " class="form-control bn_language"  maxlength="100"/>
                    <span class='help-inline'> </span>
                </div>
            </div>


            <!-- appoint_board_meeting No -->
            <div class="form-group  ">
 
                <div class='control'>           
                    <input type='text' name='appoint_board_meeting' id='appoint_board_meeting' value=" "  class="form-control"  maxlength="100">
                    <span class='help-inline'> </span>
                </div>
            </div>
        </div>


        <div class="col-md-4">
            <!-- File No -->
            <div class="form-group  "> 
                <div class='control'>
                    <span id="checkDuplicateSubjectName" style="color:#F00; font-size:14px;"></span>
                    <input type='text' name='file_no' value=" " id='file_no' class="form-control"  maxlength="100">
                    <span class='help-inline'> </span>
                </div>
            </div>

            <!------------ Application No ----------->
            <div class="form-group">
             <div class='control'>
                    <input type='text' name='application_no' id='application_no' value=" " class="form-control"  maxlength="100"/>
                    <span class='help-inline'> </span>
                </div>
            </div>

            <!------------ First Reference Person Name ----------->
            <div class="form-group ">
 
                <div class='control'>
                    <input type='text' name='first_reference_person_name' id='first_reference_person_name' value=" " class="form-control bn_language"  maxlength="100"/>
                    <span class='help-inline' ></span>
                </div>
            </div>

            <!------------ Second Reference Person Description ----------->
            <div class="form-group ">
 
                <div class='control'>
                    <textarea name='second_reference_person_description' id='second_reference_person_description'  class="form-control bn_language"  maxlength="200" style="max-height:28px;">      
                
                    </textarea>
                    <span class='help-inline'>  </span>
                </div>
            </div>

            <!------------ appoint_board_meeting_date----------->
            <div class="form-group ">
 
                <div class='control'>
                    <input type='text' name='appoint_board_meeting_date' id='appoint_board_meeting_date' value="" class="form-control datepickerCommon"  maxlength="150"/>
                    <span class='help-inline'></span>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-4 col-lg-4">
            <!-- Circular No -->
            <div class="form-group ">
                <div class='control'>
                    <input type='text' name='circular_no' value="" id='circular_no'  class="form-control"  maxlength="100">
                    <span class='help-inline'> </span>
                </div>
            </div>

            <!------------ Written Exam Date ----------->
            <div class="form-group >
                <div class='control'>
                    <input type='text' name='written_exam_date' id='written_exam_date' value=" " class="form-control datepickerCommon"  maxlength="150"/>
                    <span class='help-inline'> </span>
                </div>
            </div>

            <!------------ First Reference Person Description ----------->
            <div class="form-group ">
                <div class='control'>
                    <textarea name='first_reference_person_description' id='first_reference_person_description'  class="form-control bn_language"  maxlength="200" style="max-height:28px;">                    
                
                    </textarea>
                    <span class='help-inline'> </span>
                </div>
            </div>

            <!-- Appointment Letter No -->
            <div class="form-group ">
 
                <div class='control'>           
                    <input type='text' name='appointment_letter_no' value=" " id='appointment_letter_no' class="form-control"  maxlength="100">
                    <span class='help-inline'> </span>
                </div>
            </div>




            <!--niz jela / own district -->
            <div class="form-group ">
                <div class='control'>   
                    <select class="form-control chosenCommon chosen-single" name="appoint_own_district" id="appoint_own_district">
                        <option value="0">বাছাই করুন</option>
                                 
                    </select>
                </div>
            </div>

        </div>



        <div class="col-sm-6 col-md-4 col-lg-4">        
            <!-- cadre / non cadre -->
            <div class="form-group  ">
                <div class='control'>   
                    <select class="form-control" name="cadre_noncadre" id="cadre_noncadre">
                        
                    </select>
                </div>
            </div>      
        </div>  


        <div class="col-sm-6 col-md-4 col-lg-4"> 

            <!-- Reporting Boss  -->
            <div class="form-group  ">
                       
                <div class='control'>   
                    <select class="form-control chosenCommon chosen-single" name="reporting_boss_id" id="reporting_boss_id" onchange="getEmpIdForDesignation(this)" required="">
                        <option value="">বাছাই করুন</option>
                                            
                    </select>
                </div>
            </div>

        </div>  

        <div class="col-sm-6 col-md-4 col-lg-4"> 

            <!-- Reporting Boss designation -->
            <div class="form-group  ">
 
                <div class='control'>                               
                    <input type='text'  value=" " id='reporting_boss_designation_name' class="form-control" readonly>


                    <span class='help-inline'> reporting_boss_designation_id</span>
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