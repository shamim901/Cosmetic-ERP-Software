@extends('backend.layouts.app')


@section('content')


{{ Form::open(['route' => 'admin.product.category_save', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-menu', 'files' => false]) }}

    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
                
                 <div style="width: 100%" style="display: inline-block;">
 	 
				    <div  class="panel-heading" style="width: 40%; float: left;">
				        <h3> <b> Category Add </b></h3>
				    </div>

					<div class="panel-heading" style="width: 60%;float: right;text-align: right;" >
				        <h3> <b> <a href="{{route('admin.product.category_list')}}" class="btn btn-success">list</a> </b></h3>             
				    </div>
				</div>
 

                <div class="panel-body">
                	<table class="table table-bordered">
						<colgroup>
						    <col width="15%">
						    <col width="20%">
						    <col width="13%">
						    <col width="20%">
						    <col width="12%">
						    <col width="20%">
						</colgroup>
					  	<thead>
					    	<tr class="success">
						      	<th class="text-center" colspan="6"> Category Information </th>
						    </tr>
					  	</thead>
					  	<tbody>						   
						    <tr>
						    	<tr>
						    	<th>Category Name</th>
						      	<td><input type="text" name="c_name" value="" class="form-control required"></td>
						     
						      	<th>Status</th>
						      	<td>
						      		<select name="c_status" class="form-control required">
							        	<option value="1">Active</option>
							        	<option value="2">InActive</option>
							    	</select>
						      	</td>				      							     
						     </tr>							
						    
					  	</tbody>
					</table>

                	
             

					<div class="text-center">
						<button type="submit" class="btn btn-success" >সংরক্ষণ</button>
					</div>
	                
                </div>
            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!--row-->
    {{ Form::close() }}
@endsection