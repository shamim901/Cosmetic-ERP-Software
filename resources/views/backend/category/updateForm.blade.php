@extends('backend.layouts.app')


@section('content')
{{ Form::open(['route' => 'admin.category.updating', 'class' => '','id'=>'']) }}
    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
                  @include('backend.category._list_sub_nav')
                
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
						      	<th class="text-center" colspan="6"> বই ক্যাটাগরি  তথ্য: </th>
						    </tr>
					  	</thead>
					  	<tbody>						   
						    <tr>
						      	<th>নাম </th>
						      	<td>
						      		<input type="text" name="name" value=" {{ $category_info->name }} " class="form-control required">
						      		<input type="hidden" name="id" value=" {{ $category_info->id }} " class="form-control required">
						      	</td>
				      	
						      	<th>ধরণ</th>
						      	<td>
						      		<input type="text" name="type" value="{{ $category_info->type }} " class="form-control required">
						      	</td>

						      	<th>বর্ণনা</th>
						      	<td>
						      		<textarea name="description" class="form-control required">{{ $category_info->description }} </textarea>
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