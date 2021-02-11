@extends('backend.layouts.app')

@section('content')

{{ Form::open(['route' => 'admin.product.product_save', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-menu', 'files' => false]) }}

    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
                
                <div style="width: 100%" style="display: inline-block;"> 	 
				    <div  class="panel-heading" style="width: 40%; float: left;">
				        <h3> <b>Product Add </b></h3>
				    </div>

					<div class="panel-heading" style="width: 60%;float: right;text-align: right;" >
				        <h3> <b> <a href="{{route('admin.book.list')}}" class="btn btn-success">list</a> </b></h3>             
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
						      	<th class="text-center" colspan="6"> Product Information </th>
						    </tr>
					  	</thead>
					  	<tbody>						   
						    <tr>
						    	<tr>
						 
						      	<th>Product Name</th>
						      	<td>
						      		<input type="text" name="name" value="{{$info->product_name}}" class="form-control required">
						      	</td>
						      	<th> Category  </th>
						      	<td>
						      		
						      
						      	<select name="category_id" class="form-control required">
							        <option value=""> </option>                           
							            @foreach($category as $item)
							            <option value="{{ $item->id }}" {{ $info->category ==$item->id?'selected':'' }}>
							                {{ 
							                    $item->category_name
							                }}
							            </option>
							            @endforeach
							    </select>
						      	</td>

						      	<th> Company Name </th>
						      	<td>	
						      	<select name="company_id" class="form-control required">
							        <option value=""> </option>                           
							            @foreach($product_company as $item)
							            <option value="{{ $item->id }}" {{  $info->company == $item->id?'selected':'' }}>
							                {{ 
							                    $item->company_name
							                }}
							            </option>
							            @endforeach
							    </select>
						      	</td>
						      							      	
						      	
						     </tr>

							<tr>
								<th>Unit</th>
						      	<td>
						      		<select name="unit_id" class="form-control required">
							        <option value=""> </option>                           
							            @foreach($measurement_unit as $item)
							            <option value="{{ $item->id }}" {{$info->unit==$item->id?'selected':'' }}>
							                {{ 
							                    $item->unit_name
							                }}
							        	</option>
							            @endforeach
							    </select>
						      	</td>

						      	<th>Opening Balance</th>
						      	<td>
						      		<input type="text" name="opening_balance" value="" class="form-control required">
						      	</td>

						      	<th>Opening Price</th>
						      	<td>
						      		<input type="text" name="opening_price" value="" class="form-control required">
						      	</td>						      
						 
						     </tr>

						    <tr> 
						    	<th> Purchase Price</th>
						      	<td>
						      		<input type="text" name="purchase_price" value="" class="form-control required">
						      	</td>

						    	<th> Sale Price </th>
						      	<td>
						      		<input type="text" name="sale_price" value="" class="form-control required">
						      	</td>
						     						       
						      	<th>Status </th>
						      	<td>
						      		 <select name="status" class="form-control">
						      		 	<option value="1">Active</option>
						      		 	<option value="1">InActive</option>
						      		 </select>
						      	</td>

						     </tr>

<!-- 
						     <tr>
						      	<th>সংস্কার সংখ্যা</th>
						      	<td>
						      		<input type="text" name="edition_version" value="" class="form-control required">
						      	</td>
						      
						      	<th>সংস্কার তারিখ</th>
						      	<td>
						      		<input type="date" name="edition_date" value="" class="form-control required">
						      	</td>

						      	<th>প্রকাশের তারিখ </th>
						      	<td>
						      		<input type="date" name="relase_date" value="" class="form-control required">
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