@extends('backend.layouts.app')


@section('content')


{{ Form::open(['route' => 'admin.employee.saveDocuement', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-menu', 'files' => false]) }}

    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
                
                <!-- @include('backend.books._list_sub_nav') -->
                @include('backend.employee.employee_tab')

            <div class="panel-body">
                	             
            <fieldset class="box box-primary box-body">		

            
<div class="row box box-primary">
    <fieldset class="box-body">
        
        <input type="hidden" name="emp_id" value=""/>
        <input type="hidden" name="field_name" value="NID_STATUS_FILE"/>
        <div class="row margin-top-sm">
            <div class="col-md-3">   
                <label>জাতীয় আইডি </label>
            </div>
            <div class="col-md-1 msg"></div>
            <div class="col-md-2 file_view">   
              
            </div>
            <div class="col-md-4">   
                <input type="file" name="file_name" class="btn btn-success"/>
                
            </div>
            <div class="col-md-2">
                <input type="submit" class="btn btn-primary btn-file-upload" value="সংরক্ষণ"/>
            </div>
        </div>
       
        
              <input type="hidden" name="emp_id" value=" "/>
        <input type="hidden" name="field_name" value="PV_STATUS_FILE"/>
        <div class="row margin-top-sm">
            <div class="col-md-3">   
                <label> Status</label>
            </div>
             <div class="col-md-1 msg"></div>
            <div class="col-md-2 file_view">   
               

            </div>
            <div class="col-md-4">   
                <input type="file" name="file_name" class="btn btn-success"/>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary btn-file-upload">সংরক্ষণ</button>
            </div>
        </div>
        
            <input type="hidden" name="emp_id" value=" "/>
        <input type="hidden" name="field_name" value="JAS_STATUS_FILE"/>
        <div class="row margin-top-sm">
            <div class="col-md-4">   
                <label>কর্মচারী আইডি  </label>
            </div>
            <div class="col-md-2">   
                
            </div>
            <div class="col-md-4">   
                <input type="file" name="file_name" class="btn btn-success"/>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary btn-file-upload">সংরক্ষণ </button>
            </div>
        </div>
        
         
        <input type="hidden" name="emp_id" value=" "/>
        <input type="hidden" name="field_name" value="NDA_STATUS_FILE"/>
        <div class="row margin-top-sm">
            <div class="col-md-3">   
                <label>আইডি</label>
            </div>
            <div class="col-md-1 msg"></div>
            <div class="col-md-2 file_view">  
              
            </div>
            <div class="col-md-4">   
                <input type="file" name="file_name" class="btn btn-success"/>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary btn-file-upload"> সংরক্ষণ</button>
            </div>
        </div>
        
        
        <input type="hidden" name="emp_id" value=" "/>
        <input type="hidden" name="field_name" value="DL_STATUS_FILE"/>
        <div class="row margin-top-sm">
            <div class="col-md-3">   
                <label>DL_STATUS_FILE </label>
            </div>
            <div class="col-md-1 msg"></div>
            <div class="col-md-2 file_view">
               
            </div>
            <div class="col-md-4">   
                <input type="file" name="file_name" class="btn btn-success"/>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary btn-file-upload">সংরক্ষণ </button>
            </div>
        </div>
       

         <input type="hidden" name="emp_id" value=" "/>
        <input type="hidden" name="field_name" value="PASSPORT_STATUS_FILE"/>
        <div class="row margin-top-sm">
            <div class="col-md-3">   
                <label>পাসপোর্ট </label>
            </div>
            <div class="col-md-1 msg"></div>
            <div class="col-md-2 file_view">
                
            </div>
            <div class="col-md-4">   
                <input type="file" name="file_name" class="btn btn-success"/>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary btn-file-upload">সংরক্ষণ </button>
            </div>
        </div>
        
        <input type="hidden" name="emp_id" value=" >"/>
        <input type="hidden" name="field_name" value="EDUCATIONAL_STATUS_FILE"/>
        <div class="row margin-top-sm">
            <div class="col-md-3">   
                <label> শিক্ষা কার্ড </label>
            </div>
            <div class="col-md-1 msg"></div>
            <div class="col-md-2 file_view">
                
            </div>
            <div class="col-md-4">   
                <input type="file" name="file_name" class="btn btn-success"/>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary btn-file-upload">সংরক্ষণ </button>
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