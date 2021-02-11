@extends('backend.layouts.app')


@section('content')


{{ Form::open(['route' => 'admin.bseller.updating', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-menu', 'files' => false]) }}

    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <h3> <b> বই বিক্রয় কেন্দ্র সংযুক্তকরণ </b></h3>
                    
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
						      	<th class="text-center" colspan="6"> বই বিক্রয় কেন্দ্র তথ্য: </th>
						    </tr>
					  	</thead>
					  	<tbody>						   
						    <tr>
						      	<th>নাম </th>
						      	<td>
						      		<input type="text" name="name" value="{{$info->name}}" class="form-control required">
						      		<input type="hidden" name="id" value="{{$info->id}}" class="form-control required">
						      	</td>
						     
						      	<th> বিভাগ </th>
						      	<td>
						      		 
 									<select name="division_id" id="division" class="form-control required">
			              				<option selected value="">Select One </option>
			                                @foreach($division as $item) 
											<option value="{{ $item->id }}" {{ $info->division_id ==$item->id?'selected':'' }}>
											   {{ 
					                          		$item->bn_name
					                        	}}
					                        @endforeach
					                    </option>
			
                        			</select>
						      	</td>

						      	<th> প্রিফিক্স </th>
						      	<td>
						      		<input type="text" name="prefix" value="{{$info->prefix}}" class="form-control required">
						      	</td>

						      	<th> মোবাইল </th>
						      	<td>
						      		<input type="text" name="mobile" value="{{$info->mobile}}" class="form-control required">
						      	</td>
						    </tr>
						    <tr>
						      	<th>জেলা </th>
						      	<td>
						      		  
					                  <select name="district_id" id="district" class="district_val form-control required">
					                    <option selected value="">Select One </option>
			                                @foreach($districts as $item) 
											<option value="{{ $item->id }}" {{ $info->distict_id ==$item->id?'selected':'' }}>
											   {{ 
					                          		$item->bn_name
					                        	}}
					                        @endforeach
					                    </option>
					                  </select>
						      	</td>

						     
								<th> উপজেলা </th>
						      	<td>
						      		<select name="upazilla_id" id="upazila" class="upazila_val form-control required">
					                    <option selected value="">Select One </option>
			                                @foreach($upazilas as $item) 
											<option value="{{ $item->id }}" {{ $info->upozila_id ==$item->id?'selected':'' }}>
											   {{ 
					                          		$item->bn_name
					                        	}}
					                        @endforeach
					                    </option>
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