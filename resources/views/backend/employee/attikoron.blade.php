@extends('backend.layouts.app')


@section('content')


{{ Form::open(['route' => 'admin.employee.saveAttikoron', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-menu', 'files' => false]) }}

    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
                
                <!-- @include('backend.books._list_sub_nav') -->
                @include('backend.employee.employee_tab')

                <div class="panel-body">
                	 
 
    <fieldset class="box box-primary box-body">		
             <div class="col-sm-12 col-md-12 col-lg-12">

            <div class="col-sm-3 col-md-3 col-lg-3">
                <div class="form-group ">            
                    <label>  আত্তীকরণ তারিখ </label>               
                    <input type='date' class="form-control datepickerCommon" id='attikoron_date'  name='attikoron_date'  value=" " />
                </div>  
            </div>  
            

            <div class="col-sm-3 col-md-3 col-lg-3">
                <div class="form-group ">
                    <label> আত্তীকরণ করেছেন </label>  
                     <input type='text' class="form-control datepickerCommon" id='attikoron_date'  name='by'  value=" " />         
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