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
                <div class="panel-heading text-center">
                    <h3> <b> বই বিক্রি </b></h3>
                    
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
						      	<th class="text-center" colspan="12"> গ্রাহকের তথ্য: </th>
						    </tr>
					  	</thead>
					  	<tbody>

						    <tr style="width: 100%">
						      	<th>গ্রাহকের নাম </th>
						      	<td>
						      		<select name="customer" id="customer" class="form-control required">
							        <option value="">--  নির্বাচন করুন  --</option>                           
							            @foreach($category as $item)
							            <option id="customer_nn" value="{{ $item->id }}" 
							            	c_name="{{ $item->name }}" c_number="{{ $item->customer_mobile }}" 
							            	 {{ old('division_id')==$item->id?'selected':'' }}>
							                {{ 
							                    $item->name
							                }}
							            </option>
							            @endforeach
							        </select>
						      	</td>
						      	<th> পাওনা  </th>
						      	<td>
						      	 	<input type="text" name="due" value="" class="form-control" readonly> 						      	  
						      	</td>

						      	<th colspan="8">    </th>
						      	 
						      							    						      	 
						     </tr>

						    <tr>
						    	<th> গ্রাহকের নামঃ </th>
						      	<td>
						      		 <input type="text" name="customer_name" id="customer_name" value="নগদ বিক্রি" class="form-control required" placeholder="গ্রাহকের নাম"> 			
						      	</td>
						     
						      	<th> গ্রাহকের মোবাইল</th>
						      	<td>
						      		<input type="text" name="mobile" id="c_number" value="" class="form-control required" placeholder="গ্রাহকের মোবাইল">
						      	</td>

						      		<th colspan="8">    </th>
						 
						     </tr>

						<thead>
					    	<tr class="success">
						      	<th class="text-center" colspan="12">  বই সংযুক্তি </th>
						    </tr>
					  	</thead>

						    <tr>
						    	<!-- <th></th>
						    	<th></th> -->
						    	<th colspan="3" style="text-align: right;"> বই </th>
						      	<td>
						      		<select name="size" class="book_sale" id="book_sale" class="form-control required">
							        <option value="">--  নির্বাচন করুন  --</option>                           
							            @foreach($books as $item)
							            <option value="{{ $item->id }}" {{ old('division_id')==$item->id?'selected':'' }}>
							                {{ 
							                    $item->name
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
						      	<th class="text-center" colspan="9">  বই বিক্রি </th>
						    </tr>
					  	</thead>
                            <thead>
                            <tr class="active">
                                <th> বইয়ের নাম  </th>
                                <th> দাম </th>
                                <th> স্টক </th>
                                <th> ছাড় </th>
                                <th> পরিমাণ</th>
                                <th> মোট দাম </th>
                                <th></th>
                            </tr>

                            </thead>
						
						<tbody id="sale_data">
                        </tbody>

                        </table>
                  

                         <table class="table table-bordered" id="education_table" style="margin-bottom:0px; ">
                        <thead>
					    	<tr class="success">
						      	<th class="text-center" colspan="9">  হিসেব নিকেশ </th>
						    </tr>
					  	</thead>
                            <thead>
                            <tr class="active">
                               
                                <th> মোট দাম </th>
                                <th> পরিশোধ </th>
                                <th> ছাড় </th>
                                <th> বাকি</th>                
                                <th></th>
                            </tr>

                            </thead>
                            <tbody>
                            <tr class="success">
                                <td>
                                    
                                     <input class="form-control" id="pharmacy_total_price" name="pharmacy_total_price" type="text" size="1" style="text-align: center;" readonly/>
                                      
                                </td>
                                <td>
                                    <input type="text" name="paid" id="paid" class="form-control paid" size="1">
                                </td>
                                <td>
                                     <input type="text" name="discount" class="form-control discount"  size="1">
                                </td>
                                <td>
                                       <input type="text" class="form-control due" id="due" name="due" size="1" readonly>
                                       
                                </td>

								<td></td>                                
                                 
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