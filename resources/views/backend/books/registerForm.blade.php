@extends('backend.layouts.app')


@section('content')


{{ Form::open(['route' => 'admin.book.save', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-menu', 'files' => false]) }}

    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
                
                @include('backend.books._list_sub_nav')

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
						      	<th class="text-center" colspan="6"> বই তথ্য: </th>
						    </tr>
					  	</thead>
					  	<tbody>						   
						    <tr>
						    	<tr>
						    	<th> লেখকের নামঃ </th>
						      	<td>
						      		 
						      	 @if (session()->get( 'id'))
						      	 <select name="author">
						      	 	<option value="{{ session()->get( 'id' ) }}"> {{ session()->get( 'name' ) }}</option>
						      	 </select>
						      	 <br>
						      	@else
 									<select name="author" id="author" class="form-control required">
			              				<option selected value="">Select One </option>
			                                @foreach($author as $item) 
											<option value="{{ $item->id }}" {{ old('division_id') ==$item->id?'selected':'' }}>
											   {{ 
					                          		$item->name
					                        	}}
					                        @endforeach
					                    </option>
			
                        			</select>

						      	 @endif
                        			<!-- <input type="button" class="form-control author_name_add" id="loginModal"  value="+"> -->
                        			<a class="nav-link"    style="cursor: pointer"  data-toggle="modal"   data-target="#loginModal">Add new Author</a>
						      	</td>
						     
						      	<th>বইয়ের নাম </th>
						      	<td>
						      		<input type="text" name="name" value="" class="form-control required">
						      	</td>
						      	<th> ক্যাটাগরি  </th>
						      	<td>
						      		
						      
						      	<select name="category" class="form-control required">
							        <option value=""> </option>                           
							            @foreach($category as $item)
							            <option value="{{ $item->id }}" {{ old('division_id')==$item->id?'selected':'' }}>
							                {{ 
							                    $item->name
							                }}
							            </option>
							            @endforeach
							    </select>
						      	</td>
						      							      	
						      	
						     </tr>

							<tr>
						      	<th>মূল্য</th>
						      	<td>
						      		<input type="text" name="price" value="" class="form-control required">
						      	</td>

						      		<th> মোট পৃষ্ঠা সংখ্যা</th>
						      	<td>
						      		<input type="text" name="page" value="" class="form-control required">
						      	</td>
						 
						     </tr>


						    <tr>
						    


						    	<th> সাইজ: </th>
						      	<td>
						      		<select name="size">
						      			<option value="ডিডি">ডিডি</option>
						      			<option value="ডিসি">ডিসি</option>
						      			<option value="রয়েল">রয়েল</option>
						      		</select>
						      		 
						      	</td>
						     
						      	<th>ফর্মা সংখ্যা 	</th>
						      	<td>
						      		<input type="text" name="forma_no" value="" class="form-control required">
						      	</td>


						      	<th> মুদ্রণ সংখ্যা	মূল্য </th>
						      	<td>
						      		<input type="text" name="printed_no" value="" class="form-control required">
						      	</td>

						     </tr>


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