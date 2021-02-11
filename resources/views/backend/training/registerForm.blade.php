@extends('backend.layouts.app')

@section('content') 

{{ Form::open(['route' => 'admin.train.save', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-menu', 'files' => false]) }}

    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
            	<div style="width: 100%">
            		<div  class="panel-heading" style="width: 40%; float: left;">
            			<h3> <b> প্রশিক্ষণ সংযুক্তকরণ </b></h3> 
            		</div>

            		<div class="panel-heading" style="width: 60%;float: right;text-align: right;" >
            			<!-- <h3> <b> <a href="">Create</a> </b></h3>              -->
            			<h3> <b> <a href="{{route('admin.train.list')}}" class="btn btn-success">list</a> </b></h3>             
            		</div>
            	</div>
             

                <div class="panel-heading" style="float: right;">
                	
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
						      	<th class="text-center" colspan="6"> প্রশিক্ষণ তথ্য: </th>
						    </tr>
					  	</thead>
					  	<tbody>						   
						    <tr>
						      	<th>নাম </th>
						      	<td>
						      		<input type="text" name="name" value="" class="form-control required">
						      	</td>
						      <!-- 	<th>ব্যাচ</th>
						      	<td>
						      		 <select name="batch">
						      			<option value="1">Batch1</option>
						      			<option value="2">Batch2</option>
						      		</select>
						      	</td> -->

						      	<!-- <th>সংখ্যা</th>
						      	<td>
						      		<input type="text" name="number" value="" class="form-control required">
						      	</td>
 -->
						      	
						      	<th>সময়কাল</th>
						      	<td>
						      		<input type="text" name="duration" value="" class="form-control required">
						      	</td>

						      	<th>অবস্থা</th>
						      	 	<td>
						      		<select name="status">
						      			<option value="1">Active</option>
						      			<option value="2">InActive</option>
						      		</select>
						      	</td>
						    </tr>
						    

						 <!--    <tr>
						      	<th>অবস্থা</th>
						      	 	<td>
						      		<select name="status">
						      			<option value="1">Active</option>
						      			<option value="2">InActive</option>
						      		</select>
						      	</td>
						    </tr> -->
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