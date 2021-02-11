@extends('backend.layouts.app')


@section('content')


{{ Form::open(['route' => 'admin.requisition.issued', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-menu', 'files' => false]) }}

	<style type="text/css">
	    .tdclass td{
	    	width: 10%;
	    }
	</style>

    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <h3> <b> চাহিদা পত্র </b></h3>
                    
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
						      	<th class="text-center" colspan="12"> বিক্রয় কেন্দ্রের তথ্য: </th>
						    </tr>
					  	</thead>
					  	<tbody>
						  
						    <tr>
						    	<th> বিক্রয় কেন্দ্রের নামঃ </th>
						      	<td>
						      		 <input type="text" name="customer_name" id="customer_name" value="{{ $info[0]->book_name }}" class="form-control required" placeholder="নাম"> 			
						      	</td>
						     
						      	<th> মোবাইল</th>
						      	<td>
						      		<input type="text" name="mobile" id="c_number" value="{{ $info[0]->mobile }}" class="form-control required" placeholder="মোবাইল">
						      	</td>
						      		<th colspan="8">    </th>						 
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
                                <th> পরিমাণ</th>
                                <th></th>
                            </tr>
                         </thead>
						
						<tbody>
							 @foreach($info as $key => $item)
                                <tr>                               
                                    <td class="text-center">{{ $item->book_name}}</td>
                                    <td class="text-center">{{ $item->cat_name}}</td>                                    
                                    <td class="text-center"> 
                                    	<input type="hidden" name="req_id" value="{{ $item->mst_id}}">
                                    	<input type="hidden" name="product_id[]" value="{{ $item->product_id}}">
                                    	<input type="text" name="issue_qnty[]" value="{{ $item->req_qnty}}">
                                    </td>  
                                </tr>
                            @endforeach
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