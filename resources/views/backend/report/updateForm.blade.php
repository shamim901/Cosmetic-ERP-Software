@extends('backend.layouts.app')


@section('content')


{{ Form::open(['route' => 'admin.book.updating', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'id' => 'create-menu', 'files' => false]) }}

    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <h3> <b> বই  সংযুক্তকরণ </b></h3>
                    
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
						      	<th class="text-center" colspan="6"> বই তথ্য: </th>
						    </tr>
					  	</thead>
					  	<tbody>						   
						    <tr>
						      	<th>নাম </th>
						      	<td>
						      		<input type="text" name="name" value="{{ $info->name}}" class="form-control required">
						      	</td>
						      	<th> ক্যাটাগরি  </th>
						      	<td>
						      		 
						      	<select name="category" class="form-control required">
							        <option value="">--  নির্বাচন করুন  --</option>                           
							            @foreach($category as $item)
							            <option value="{{ $item->id }}" {{ old('division_id')==$item->id?'selected':'' }}>
							                {{ 
							                    $item->name
							                }}
							            </option>
							            @endforeach
							    </select>
						      	</td>

						      	

						      	
						      	<th> লেখকের নামঃ </th>
						      	<td>
						      		<input type="text" name="author" value="{{ $info->author}}" class="form-control required">
						      	</td>

						     </tr>

						    <tr>

						      	<th> মোট পৃষ্ঠা সংখ্যা</th>
						      	<td>
						      		<input type="text" name="page" value="{{ $info->page}}" class="form-control required">
						      	</td>


						      	<th>মূল্য</th>
						      	<td>
						      		<input type="text" name="price" value="{{ $info->price}}" class="form-control required">
						      	</td>


						      	<th>প্রকাশের তারিখ </th>
						      	<td>
						      		<input type="date" name="relase_date" value="{{ $info->relase_date}}" class="form-control required">
						      	</td>

						      	</tr>


						     <tr>
						      	<th>সংস্কার তারিখ</th>
						      	<td>
						      		<input type="date" name="edition_date" value="{{ $info->edition_date}}" class="form-control required">

						      		<input type="hidden" name="id" value="{{$info->id}}">
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