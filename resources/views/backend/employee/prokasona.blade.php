@extends('backend.layouts.app')


@section('content')


{{ Form::open(['route' => 'admin.book.save', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-menu', 'files' => false]) }}

    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
                
                <!-- @include('backend.books._list_sub_nav') -->
                @include('backend.employee.employee_tab')

                <div class="panel-body">
                	 
 
    <fieldset class="box box-primary box-body">		
    
    <div class="col-sm-12 col-md-12 col-lg-12">                     
        <input type="hidden" name="empId" id="empId" value=" " required="" />   
        <!-- Start Left Side -->
        <!-- permanent address -->
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="col-sm-3 col-md-3 col-lg-3">                
                <!-- -----------PUBLICATION---------------- --> 
                <div class="form-group">
                    <label >publication_type </label>
                    <input type='text' class="form-control bn_language"  name='publication_type' id='publication_type'  value="" required/>
                    <span class='help-inline'> </span>
                </div>
            </div>

            <div class="col-sm-3 col-md-3 col-lg-3">
                <!-- ----------- Date of PUBLICATION --------------- -->
                <div class="form-group  ">   
                    publication_date                     
                    <input type="text" name="PUBLICATION_DATE" value=" " id="PUBLICATION_DATE" class="form-control datepickerCommon"  title=" " tabindex="3" required/>
                    <span class='help-inline'> </span>
                </div>  
            </div>


            <div class="col-sm-6 col-md-6 col-lg-6">    

                 <div class="form-group  ">                   
                    <label > publication_description </label>       
                    <textarea class="form-control bn_language" rows="3" id="publication_description" name="publication_description" required=""> </textarea>
                    <span class='help-inline'> </span>
                </div>      
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