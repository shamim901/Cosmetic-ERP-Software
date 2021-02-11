@extends('backend.layouts.app')


@section('content')


{{ Form::open(['route' => 'admin.employee.saveacr', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-menu', 'files' => false]) }}

    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
                
                <!-- @include('backend.books._list_sub_nav') -->
                @include('backend.employee.employee_tab')

                <div class="panel-body">
                	 
     
 
<fieldset class="box box-primary box-body">		

    
        <div class="row">

            <div class="col-md-12 text-left" id="employee_name"></div>
        </div>
        <div class="row">
            <div class="col-md-12 detailsContainer">
                                    
                    
<span>
    
    <div class="row">   
        <div class="col-md-12">
        <!-- Decision By -->
        <div class="col-md-3">                  
            <div class="form-group  ">
               <label> এ সি আর দ্বারা  </label>
                 <input type='text' name='by' id='total_point' value=" "  class="form-control bn_language" > 
                <span class='help-inline'> </span>
            </div>      
        </div>
        <div class="col-md-3">                      
            <div class="form-group ">
                <label> এ সি আর ধাপ</label> 
                 <input type="text" name="step" class="form-control">
                <span class='help-inline'> </span>           
            </div>    
        </div>

        <!-- Total Point -->
        <div class="col-sm-2 col-md-3 col-lg-2">        
            <div class="form-group ">
                <label class=" control-label"> এ সি আর পয়েন্টস </label>
                <input type='text' name='total_point' id='total_point' value=" "  class="form-control bn_language"  required>                
                <span class='help-inline'> </span>
            </div>
        </div>  
        

        <!-- ACR Date -->
        <div class="col-md-3">                      
            <div class="form-group  ">
                <label>এ সি আর তারিখ</label>  
                                            
                    <input type='date' name='date' id='date' value=" "  class="form-control datepickerCommon"  maxlength="100"  tabindex="5" >
                    <span class='help-inline'> </span>
               
            </div>      
        </div>  

        <!-- Comment -->
       <!--  <div class="col-md-3">                      
            <div class="form-group  "> 

                <textarea name='comment[]'  id='comment' class="form-control longInput bn_language"  maxlength="150"  tabindex="6" style=" height: 28px;"> </textarea>
                <span class='help-inline'> </span>

            </div>      
        </div> -->


        <div class="col-md-1">          
            <div class="form-group">
                <label class="control-label">&nbsp;</label>
 <br/> 
            </div>          
        </div> 
</div>
    </div>              
</span>         
              
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