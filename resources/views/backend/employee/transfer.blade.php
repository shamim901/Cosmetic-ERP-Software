@extends('backend.layouts.app')


@section('content')


{{ Form::open(['route' => 'admin.employee.saveTransfer', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-menu', 'files' => false]) }}

    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
                
                <!-- @include('backend.books._list_sub_nav') -->
                @include('backend.employee.employee_tab')

                <div class="panel-body">
                	 
     
 
<fieldset class="box box-primary box-body">		
     <div class="row">
            <div class="col-md-12 text-center" id="employee_name"></div>
        </div>
        <div class="detailsContainer">                  
             
<span class="row">  
    <div class="col-sm-12 col-md-12 col-lg-12">                 
  
        <!------------- Transfer to work station -------------> 
        <div class="col-sm-3 col-md-3 col-lg-3">    
            <div class="form-group">
                <label> স্থানান্তর শাখা নং</label> 
                 <input type="text" name="JOINNING_DATE_FROM[]" value=" "  id="JOINNING_DATE_FROM" class="form-control datepickerCommon" title=" " required="" />                             
                <span class='help-inline'></span>
            </div>
        </div>

        <div class="col-sm-3 col-md-3 col-lg-3">    
            <div class="form-group">
                <label>স্থানান্তর বিভাগ নং</label>
                <input type="text" name="JOINNING_DATE_FROM[]" value=" "  id="JOINNING_DATE_FROM" class="form-control datepickerCommon" title=" " required="" />
                <span class='help-inline'></span>
            </div>
        </div>  
                <div class="col-sm-2 col-md-2 col-lg-2">        
            <!-- ----------- Joining Date From--------------- -->
            <div class="">
                <div class='form-group'>
                    <label> যোগদানের সময় </label>
                    <input type="text" name="JOINNING_DATE_FROM[]" value=" "  id="JOINNING_DATE_FROM" class="form-control datepickerCommon" title=" " required="" />
                </div>
            </div>
        </div>
                <div class="col-sm-3 col-md-3 col-lg-3">    
            <!------------- Transfer Letter No -------------> 
            <div class="form-group  ">
                <div id="checkLetterNo" style="color:#F00; font-size:14px;"></div>
                <label> স্থানান্তর চিঠি নং </label>
                <input type='text' name='TRANSFER_LETTER_NO[]' value=" "  id='TRANSFER_LETTER_NO' class="form-control bn_language"  />                      
                <span class='help-inline'> </span>
            </div>
        </div>
    </div>  


    <div class="col-sm-12 col-md-12 col-lg-12"> 

        <div class="col-sm-3 col-md-3 col-lg-3">
            <!------------- Transfer reason -------------> 
            <div class="form-group  ">
                <label> স্থানান্তর কারণ</label>
                 <input type='text' name='TRANSFER_LETTER_NO[]' value=" "  id='TRANSFER_LETTER_NO' class="form-control bn_language"  /> 
                <span class='help-inline'> </span>
            </div>
        </div>

        <div class="col-sm-3 col-md-3 col-lg-3">               
            <div class="form-group  ">
                <label>স্থানান্তর মন্তব্য </label>
                <input type="text" name="TRANSFER_REMARKS[]" value=" " id="TRANSFER_REMARKS" class="form-control bn_language" title=" " />
                <span class='help-inline'></span>
            </div>
        </div>  

        <div class="col-md-1 addContainer"> 
            <h3>    
                
            </h3>
        </div>

    </div>
    
        </span>       
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