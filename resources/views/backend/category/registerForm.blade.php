@extends('backend.layouts.app')


@section('content')


{{ Form::open(['route' => 'admin.category.save', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-menu', 'files' => false]) }}

    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
                 
                 @include('backend.category._new_sub_nav')

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
						      	<th class="text-center" colspan="6"> বই ক্যাটাগরি তথ্য: </th>
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
						      	
						      	<th> ধরণ </th>
						      	<td>
						      		<input type="text" name="type" value="" class="form-control required">
						      	</td>

						      	<th>বর্ণনা</th>
						      	<td>
						      		<textarea name="description" class="form-control required"></textarea>
						      	</td>

						    
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