@extends('backend.layouts.app')


@section('content')


{{ Form::open(['route' => 'admin.employee.savebank', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-menu', 'files' => false]) }}

    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
                
                <!-- @include('backend.books._list_sub_nav') -->
                @include('backend.employee.employee_tab')

                <div class="panel-body">
                	 
     
 
    <fieldset class="box box-primary box-body">
    <div class="col-sm-12 col-md-12 col-lg-12">     
            <div class="col-sm-6  col-md-6 col-lg-6 padding-left-div">
            
                <!-- -----------Employee BANK_NAME ------------------- --> 
                <div class="form-group ">
                    <label> ব্যাংকের নাম </label>
                    
                    <input type="text" class="form-control " name="BANK_NAME" id="BANK_NAME" required="" tabindex="1">
                   
                    
                    <span class='help-inline'> </span>
                </div>

                <!-- ----------- Employee BANK ACCOUNT_NAME ------------- --> 
                <div class="form-group  ">
                    <label> অ্যাকাউন্ট নাম </label>
                    <input type='text' name='ACCOUNT_NAME' value=" " id='ACCOUNT_NAME' class="form-control" maxlength="100"  placeholder=" " required="" tabindex="2"/>
                    <span class='help-inline'> </span>
                </div>
                
            </div> 
            
            <div class="col-sm-5 col-md-5 col-lg-5 padding-left-div">
                
                <!-- ----------- Employee BANK BRANCH ---------------- -->               
                <div class="form-group ">
                    <label> শাখা </label>
                    <input type="text" class="form-control" name="BRANCH_ID" id="BRANCH_ID" required="" tabindex="4">
                                                  
                                                       
                    <span class='help-inline'> </span>
                </div>
                
                <!-- -----------Employee BANK ACCOUNT_NO ------------------- --> 
                <div class="form-group ">
                    <label>অ্যাকাউন্ট নং </label>
                    <input type='text' name='ACCOUNT_NO' value=" " id='ACCOUNT_NO' class="form-control" maxlength="20"  placeholder="ACCOUNT_NO" required="" tabindex="3"/>
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