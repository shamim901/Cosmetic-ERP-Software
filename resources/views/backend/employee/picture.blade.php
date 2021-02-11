@extends('backend.layouts.app')


@section('content')


{{ Form::open(['route' => 'admin.book.save', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-menu', 'files' => false]) }}

    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
                
                <!-- @include('backend.books._list_sub_nav') -->
                @include('backend.employee.employee_tab')

                <div class="panel-body">
                	 
     

    <fieldset class="box-body">
        <div class="row">
            <div class="col-md-12 msg">
                
            </div>
            
        </div>
        <div class="row">            
            <div class="col-md-5">

            </div>
            <div class="col-md-6">

                <div id="image_preview" style=" width: 250px; height: 350px; display: block">
                   
                    <img id="previewing" src=" " width="300" height="300"/>
                </div>
            </div>
            <div class="col-md-1">

            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center margin-top-sm">
                <progress></progress>
            </div>
        </div>


        <!--<div class="progress">
            <div class="bar"></div >
            <div class="percent">0%</div >
        </div>-->

        <div class="row"> 
            <div class="col-md-5">

            </div>
            <div class="col-md-6">
                <div class="form-group "> 
                    <input type="file" name="photo" id="photo" class="btn btn-success" />
                    <input type="hidden" name="emp_id" value=" "/>

                    <span class='help-inline'></span>

                </div>
            </div>
            <div class="col-md-1">

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