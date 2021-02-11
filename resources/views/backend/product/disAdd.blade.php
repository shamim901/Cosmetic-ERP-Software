@extends('backend.layouts.app')


@section('content')


{{ Form::open(['route' => 'admin.book.savethana', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-menu', 'files' => false]) }}

    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
                  <div style="width: 100%" style="display: inline-block;">
					 	 
					    <div  class="panel-heading" style="width: 40%; float: left;">
					        <h3> <b>  থানা সংযুক্তকরণ </b></h3>
					    </div>

						<div class="panel-heading" style="width: 60%;float: right;text-align: right;" >
					        <h3> <b> <a href="{{route('admin.bseller.list')}}" class="btn btn-success">list</a> </b></h3>             
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
						      	<th class="text-center" colspan="6"> থানা সংযুক্তকরণ : </th>
						    </tr>
					  	</thead>
					  	<tbody>						   
 
						    <tr> 
						      	<th> বিভাগ </th>
						      	<td>
						      		  <select name="division_id" id="division" class="form-control required">
					                    <option value="">-- নির্বাচন করুন  --</option>
					                    @foreach($division as $item)
					                      <option value="{{ $item->id }}" {{ old('division_id')==$item->id?'selected':'' }}>
					                        {{ 
					                          $item->bn_name
					                        }}
					                      </option>
					                    @endforeach
					                  </select>
						      	</td>

						      	<th>জেলা </th>
						      	<td>
						      		   <select name="district_id" id="district" class="district_val form-control required">
					                    <option value="">-- নির্বাচন করুন  --</option>
					                  </select>
						      	</td>

						      
								<th> উপজেলা (ইংরেজিতে) </th>
						      	<td>
						      		 <input type="text" name="thana" value="" required="">
						      	</td>
			     	
						    </tr>
						     <th> উপজেলা (বাংলায়) </th>
						      	<td>
						      		 <input type="text" name="bn_name" value="" required="">
						      	</td>

						       <th> লিংক </th>
						      	<td>
						      		 <input type="text" name="url" value="" required="">
						      	</td>
						    <tr>
						     	
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