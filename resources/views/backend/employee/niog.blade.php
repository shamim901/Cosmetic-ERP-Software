@extends('backend.layouts.app')


@section('content')


{{ Form::open(['route' => 'admin.employee.saveNiogInfo', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-menu', 'files' => false]) }}

    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
                 
                @include('backend.employee.employee_tab')
   <div class="panel-body">
                     
     
 
<fieldset class="box box-primary box-body"> 
        <div class="col-sm-12 col-md-12 col-lg-12"> 
                           
            <div class="col-sm-3 col-md-3 col-lg-3"> 
                <!------- exam name --------->
                <div class="form-group  ">
                    <label> রোল নং </label>
                     <input class="form-control bn_language" id='emp_institute'  name='emp_institute' type='text' maxlength="200" />
                     <span class='help-inline'> </span>
                </div>      
            </div>
            <!------- exam subject --------->
            <div class="col-sm-3 col-md-3 col-lg-3"> 
                <div class="form-group ">
                    <label> বিষয় </label>
                      <input class="form-control bn_language" id='emp_institute'  name='emp_institute' type='text' maxlength="200" />
                    <span class='help-inline'> </span>
                </div>      
            </div> 
            <!------- exam institute --------->
            <div class="col-sm-3 col-md-3 col-lg-3"> 
                <div class="form-group">
                    <label> প্রতিষ্ঠানের  নাম </label>
                    <input class="form-control bn_language" id='emp_institute'  name='emp_institute' type='text' maxlength="200" />
                    <span class='help-inline'> </span>
                </div>          
            </div>          

            <div class="col-sm-3 col-md-3 col-lg-3"> 
                <div class="form-group ">
                    <label> বোর্ড </label>
                     <input class="form-control bn_language" id='emp_institute'  name='emp_institute' type='text' maxlength="200"/>
                     <span class='help-inline'> </span>
                </div>      
            </div>      

            <div class="col-sm-3 col-md-3 col-lg-3"> 
                <div class="form-group">
                    <label> সাল</label>
                     <input class="form-control bn_language" id='emp_institute'  name='emp_institute' type='text' maxlength="200" />
                                     </div>          
            </div>


            <div class="col-sm-3 col-md-3 col-lg-3"> 
                <div class="form-group">
                    <label>জি পি এ</label>
                     <input class="form-control bn_language" id='emp_institute'  name='emp_institute' type='text' maxlength="200" />
                    <span class='help-inline'> </span>
                </div>      
            </div>

          
 
        </div>                  

    </fieldset>
     
 
					<div class="text-center">
						<button type="submit" class="btn btn-success" >সংরক্ষণ</button>
					</div>
	                
                </div>
            </div> 
        </div> 

    </div><!--row-->
    {{ Form::close() }}
@endsection