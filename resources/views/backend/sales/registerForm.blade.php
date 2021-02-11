@extends('backend.layouts.app')


@section('content')


{{ Form::open(['route' => 'admin.sale.save', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-menu', 'files' => false]) }}

	<style type="text/css">
	    .tdclass td{
	    	width: 10%;
	    }
	</style>

    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
                
				<div style="width: 100%" style="display: inline-block;">
				 	 
				    <div  class="panel-heading" style="width: 40%; float: left;">
				        <h3> <b> Product Sale </b></h3>
				    </div>

					<div class="panel-heading" style="width: 60%;float: right;text-align: right;" >
				        <h3> <b> <a href="{{route('admin.sale.list')}}" class="btn btn-success">list</a> </b></h3>             
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
						      	<th class="text-center" colspan="12"> Customer Info: </th>
						    </tr>
					  	</thead>
					  	<tbody>

						    <tr style="width: 100%">
						      	<th>Customer Name</th>
						      	<td>
						      		<select name="customer" id="customer" class="form-control required" style="width: 100%">
							        <option value=""> </option>                           
							            @foreach($category as $item)
							            <option  value="{{ $item->id }}" 
							            	c_name="{{ $item->name }}" c_number="{{ $item->customer_mobile }}" 
							            	 {{ old('division_id')==$item->id?'selected':'' }}>
							                {{ 
							                    $item->name
							                }}
							            </option>
							            @endforeach
							        </select>
						      	</td>
						      <!-- 	<th> পাওনা  </th>
						      	<td>
						      	 	<input type="text" name="due" value="" class="form-control" readonly> 						      	  
						      	</td> -->

						      	<th colspan="8">    </th>
						      	 
						      							    						      	 
						     </tr>

						    <tr>
						    	<th> Customer Name: </th>
						      	<td>
						      		 <input type="text" name="customer_name" id="customer_name" value="নগদ বিক্রি" class="form-control required" placeholder="গ্রাহকের নাম"> 			
						      	</td>
						     
						      	<th>  Customer Mobile:</th>
						      	<td>
						      		<input type="text" name="mobile" class="form-control" id="c_number" value=""  placeholder="গ্রাহকের মোবাইল" style="width: 100%">
						      	</td>

						      		<th colspan="8">    </th>
						 
						     </tr>

						<thead>
					    	<tr class="success">
						      	<th class="text-center" colspan="12">  Add Product </th>
						    </tr>
					  	</thead>

						    <tr>
						    	<!-- <th></th>
						    	<th></th> -->
						    	<th colspan="3" style="text-align: right;"> Product </th>
						      	<td>
						      		<select name="size" class="book_sale" id="book_sale" class="form-control required" style="width: 100%">
							        <option value=""> </option>                           
							            @foreach($books as $item)
							            <option value="{{ $item->id }}" {{ old('division_id')==$item->id?'selected':'' }}>
							                {{ 
							                    $item->product_name
							                }}
							            </option>
							            @endforeach
							        </select>
						      		 
						      	</td>
						
						     </tr>
						    
					  </tbody>
					</table>

					 <table class="table table-bordered" id="education_table" style="margin-bottom:0px; ">
                        <thead>
					    	<tr class="success">
						      	<th class="text-center" colspan="9"> Product Sale </th>
						    </tr>
					  	</thead>
                            <thead>
                            <tr class="active">
                                <th> Product Name </th>
                                <th> Price </th>
                                <th> Stocks </th>
                                <th> Discount </th>
                                <th> Quantity</th>
                                <th> Sub Total </th>
                                <th></th>
                            </tr>

                            </thead>
						
						<tbody id="sale_data">
                        </tbody>

                        </table>
                  

                         <table class="table table-bordered" id="education_table" style="margin-bottom:0px; ">
                        <thead>
					    	<tr class="success">
						      	<th class="text-center" colspan="9">  Payment </th>
						    </tr>
					  	</thead>
                            <thead>
                            <tr class="active">
                               
                                <th> Total Price </th>
                                <th> Paid </th>
                                <th> Due </th>  
                                <th> Discount Type</th>  
                                <th> Discount </th>
                              
                                           
                                <th></th>
                            </tr>

                            </thead>
                            <tbody>
                            <tr class="success">
                                <td>
                                    
                                     <input class="form-control" id="pharmacy_total_price" name="pharmacy_total_price" type="text" size="1" style="text-align: center;" value="0" readonly/>
                                      
                                </td>
                                <td>
                                    <input type="text" name="paid" id="paid" class="form-control paid" size="1" value="0">
                                </td>

                                <td>
                                       <input type="text" class="form-control due" id="due" name="due" size="1" value="0" readonly>       
                                </td>

                                <td>
                                	   <select name="discount_type"  class="form-control" id="discount_type" size="1">
				                            <option value="1">Fixed Amount (TK)</option>
				                            <option value="2">Percentage (%)</option>
				                        </select>
                    				 
                                </td>
                                <td>
                                	<div class="input-group">
                                	<div class="input-group-addon">
                                    <i class="fa" id='discount_type_text'> </i>
                                    </div>
                                     <input type="text" name="discount" class="form-control discount"  id="discount" size="1" value="0">
                                 	</div>
                                </td>
                              

								<td></td>                                
                                 
                            </tr>
                            </tbody>
                        </table>
                  

                	
             

					<div class="text-center">
						<button type="submit" class="btn btn-success" >Save</button>
					</div>
	                
                </div>
            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!--row-->
    {{ Form::close() }}
@endsection