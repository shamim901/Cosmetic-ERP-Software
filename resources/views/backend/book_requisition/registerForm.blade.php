@extends('backend.layouts.app')


@section('content')


{{ Form::open(['route' => 'admin.requisition.save', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-menu', 'files' => false]) }}

	<style type="text/css">
	    .tdclass td{
	    	width: 10%;
	    }
	</style>

    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
                 
                 @include('backend.book_requisition._new_sub_nav')

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
						      	<th class="text-center" colspan="12"> বিক্রয় কেন্দ্রের তথ্য: </th>
						    </tr>
					  	</thead>
					  	<tbody>

						    <tr style="width: 100%">
						      	<th>বিক্রয় কেন্দ্রের নাম </th>
						      	<td>
						      		<select name="bookSeller" id="bookSeller" class="form-control required">
							        <option value="">--  নির্বাচন করুন  --</option>                           
							            @foreach($bookSeller as $item)
							            <option id="customer_nn" value="{{ $item->id }}" 
							            	c_name="{{ $item->name }}" c_number="{{ $item->mobile }}" 
							            	 {{ old('division_id')==$item->id?'selected':'' }}>
							                {{ 
							                    $item->name
							                }}
							            </option>
							            @endforeach
							        </select>
						      	</td>
						      	 

						      	<th colspan="8">    </th>
						      	 
						      							    						      	 
						     </tr>

						    <tr>
						    	<th> বিক্রয় কেন্দ্রের নামঃ </th>
						      	<td>
						      		 <input type="text" name="customer_name" id="customer_name" value="" class="form-control required" placeholder="নাম"> 			
						      	</td>
						     
						      	<th> মোবাইল</th>
						      	<td>
						      		<input type="text" name="mobile" id="c_number" value="" class="form-control required" placeholder="মোবাইল">
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
						      		<select name="size" class="book_requisition" id="book_requisition" class="form-control required">
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
                               
                                <th> ক্যাটাগরি </th>
                                <th> স্টক </th>
                                
                                <th> পরিমাণ</th>
                                 
                                <th></th>
                            </tr>

                            </thead>
						
						<tbody id="sale_data">
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