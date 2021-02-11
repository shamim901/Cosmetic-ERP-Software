@extends('backend.layouts.app')


@section('content')


{{ Form::open(['route' => 'admin.employee.savePromosion', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-menu', 'files' => false]) }}

    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
                
                <!-- @include('backend.books._list_sub_nav') -->
                @include('backend.employee.employee_tab')

                <div class="panel-body">
                	 
 
    <fieldset class="box box-primary box-body">		
     
        <!-- Multiple rows start -->    
        <div class="col-sm-12 col-md-12 col-lg-12" id="detailsContainer">
             

<span>
    <div class="row">
        <!-- Employee -->
        <div class="col-md-4">
            <div class="form-group">
                <label> নাম </label>
                <div class=''>
                   <!--  <select class="form-control chosenCommon chosen-single" name="employee_id[]" id="employee_id"  tabindex="1" required>
                       
                    </select> -->
                    <input type="text" name="">
                    <span class='help-inline'> </span>
                </div>
            </div>
        </div>

        <!-- Decision steps -->
        <div class="col-md-4">
            <div class="form-group">
                <label> পজিশন নাম </label>
                <div class=''>
                   <!--  <select name="promotion_designation[]" id="promotion_designation" class="form-control" required tabindex="3">
                           
                    </select> -->
                    <input type="text" name="">
                    <span class='help-inline'> </span>
                </div>
            </div>    
        </div>

        <!-- Promotion Department -->
        <div class="col-md-4">
            <div class="form-group">
               <label> পজিশন বিভাগ </label>
                <div class=''>
                   <!--  <select name="dept_id[]" id="dept_id" class="form-control" required tabindex="3">
                        
                    </select> -->

                    <input type="text" name="" class="form-control"> 
                    <span class='help-inline'> </span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        
        <!-- Comment -->
        <div class="col-md-4">
            <div class="form-group">
                <label> কমেন্টস</label>  
                
                    <textarea name='promotion_comment[]'  id='promotion_comment' class="form-control longInput"  maxlength="150"  tabindex="6" style=" height: 28px;"> </textarea>
                    <span class='help-inline'> </span>
            
            </div>      
        </div>

        <div class="col-md-4">
            <div class="form-group  ">
                <label>প্রোমোশন দিয়েছেন ?</label>  
                <div class=''>
                    <input type="text" name="">
                    <span class='help-inline'> </span>
                </div>
            </div>
        </div>

        <!-- Promotion Date -->
        <div class="col-md-3">
            <div class="form-group  ">
              <label> প্রোমোশন তারিখ</label>   
                <div class=''>
                    <input type='date' name='promotion_date[]' id='promotion_date' value=" "  class="form-control datepickerCommon"  maxlength="100"  tabindex="5">
                    <span class='help-inline'> </span>
                </div>
            </div>
        </div>
      

    </div>

</span>

        </div>
        <!-- Multiple rows star --> 

       
            

 
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