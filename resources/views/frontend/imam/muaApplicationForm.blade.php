@extends('frontend.layouts.app')

@section('content')
{{ Form::open(['route' => 'frontend.imam.saveMuaInfo', 'class' => '','id'=>'']) }}
    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <h3> <b>অনলাইন মুয়াজ্জিন  আবেদন ফর্ম </b></h3>
                    
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
						      	<th class="text-center" colspan="6"> মুয়াজ্জিনের তথ্য: </th>
						    </tr>
					  	</thead>
					  	<tbody>
						   
						    <tr>
						      	<th>নাম </th>
						      	<td>
						      		<input type="text" name="imam_name" value="" class="form-control required">
						      	</td>
						      	<th>পিতার নাম</th>
						      	<td>
						      		<input type="text" name="f_name" value="" class="form-control required">
						      	</td>
						      	<th>মাতার নাম</th>
						      	<td>
						      		<input type="text" name="m_name" value="" class="form-control required">
						      	</td>
						    </tr>

						     <tr>
						      	<th>জন্ম তারিখ </th>
						      	<td>
						      		<input type="date" name="dob" value="" class="form-control required">
						      	</td>
						      	<th>মোবাইল</th>
						      	<td>
						      		<input type="text" name="phone" value="" class="form-control required">
						      	</td>
						      	<th>ছবি</th>
						      	<td>
						      		<input type="file" name="img" value="" class="form-control required">
						      	</td>
						    </tr>

						    <tr>
						    	<th>বেতন </th>
						      	<td>
						      		<input type="text" name="salary" value="" class="form-control">
						      	</td>
						    </tr>
					  </tbody>
					</table>

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
						      	<th class="text-center" colspan="6"> মুয়াজ্জিনের বাসস্থান:</th>
						    </tr>
					  	</thead>
					  	<tbody>
						    <tr>
						      	<th>বিভাগ </th>
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
						      		  <div class="form-group">
					                  @if($errors->has('district_id'))
					                    <div class="alert alert-warning"><i class="fa fa-warning"></i>{{ $errors->first('district_id') }}</div>
					                  @endif
					                  
					                  <select name="district_id" id="district" class="district_val form-control required">
					                    <option value="">-- নির্বাচন করুন  --</option>
					                  </select>
					                </div>
						      	</td>

						      	<th>উপজেলা </th>
						      	<td>  <div class="form-group">
					                  @if($errors->has('upazilla_id'))
					                    <div class="alert alert-warning"><i class="fa fa-warning"></i>{{ $errors->first('upazilla_id') }}</div>
					                  @endif
					                  
					                  <select name="upazilla_id" id="upazila" class="upazila_val form-control required">
					                    <option value="">-- নির্বাচন করুন  --</option>
					                  </select>
					                </div>
					               </td>
						    </tr>
						    <tr>
						      	 
						      	<th> ইউনিয়ন / পৌরসভা </th>
						      	<td>
						      		  <div class="form-group">
					                  @if($errors->has('union_id'))
					                    <div class="alert alert-warning"><i class="fa fa-warning"></i>{{ $errors->first('union_id') }}</div>
					                  @endif
					                  
					                  <select name="union_id" id="union" class="union_val form-control required">
					                    <option value="">-- নির্বাচন করুন  --</option>
					                  </select>
					                </div>
						      	</td>
						      	<th>গ্রামের নাম</th>
						      	<td>
						      		 <div class="form-group">
					                  @if($errors->has('village_id'))
					                    <div class="alert alert-warning"><i class="fa fa-warning"></i>{{ $errors->first('village_id') }}</div>
					                  @endif
					                  
					                  <input type="text" name="village_id" id="villages" class="form-control required">
					                </div>
						      	</td>
						    </tr>
					  </tbody>
					</table>

<!-- 				<table class="table table-bordered">
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
						      	<th class="text-center" colspan="6"> মসজিদের অবস্থান:</th>
						    </tr>
					  	</thead>
					  	<tbody>
						    <tr>
						      	<th>বিভাগ </th>
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
						      		  <div class="form-group">
					                  @if($errors->has('district_id'))
					                    <div class="alert alert-warning"><i class="fa fa-warning"></i>{{ $errors->first('district_id') }}</div>
					                  @endif
					                  
					                  <select name="district_id" id="district" class="district_val form-control required">
					                    <option value="">-- নির্বাচন করুন  --</option>
					                  </select>
					                </div>
						      	</td>

						      	<th>উপজেলা </th>
						      	<td>  <div class="form-group">
					                  @if($errors->has('upazilla_id'))
					                    <div class="alert alert-warning"><i class="fa fa-warning"></i>{{ $errors->first('upazilla_id') }}</div>
					                  @endif
					                  
					                  <select name="upazilla_id" id="upazila" class="upazila_val form-control required">
					                    <option value="">-- নির্বাচন করুন  --</option>
					                  </select>
					                </div>
					               </td>
						    </tr>
						    <tr>
						      	 
						      	<th> ইউনিয়ন / পৌরসভা </th>
						      	<td>
						      		  <div class="form-group">
					                  @if($errors->has('union_id'))
					                    <div class="alert alert-warning"><i class="fa fa-warning"></i>{{ $errors->first('union_id') }}</div>
					                  @endif
					                  
					                  <select name="union_id" id="union" class="union_val form-control required">
					                    <option value="">-- নির্বাচন করুন  --</option>
					                  </select>
					                </div>
						      	</td>
						      	<th>গ্রামের নাম</th>
						      	<td>
						      		 <div class="form-group">
					                  @if($errors->has('village_id'))
					                    <div class="alert alert-warning"><i class="fa fa-warning"></i>{{ $errors->first('village_id') }}</div>
					                  @endif
					                  
					                  <input type="text" name="village_id" id="villages" class="form-control required">
					                </div>
						      	</td>
						    </tr>
					  </tbody>
					</table>

 -->
              
                      <table class="table table-bordered" id="education_table" style="margin-bottom:0px; ">
                        <thead>
					    	<tr class="success">
						      	<th class="text-center" colspan="9"> মুয়াজ্জিনের শিক্ষাগত যোগ্যতা:</th>
						    </tr>
					  	</thead>
                            <thead>
                            <tr class="active">
                                <th> পরীক্ষার নাম </th>
                                <th> বোর্ড/বিশ্ববিদ্যালয় </th>
                                <th> শিক্ষা প্রতিষ্ঠানের নাম</th>
                                <th>শাখা/বিষয়</th>
                                <th>বিভাগ/ শ্রেণী</th>
                                <th>সন</th>
                                <th style="width: 130px;">Action</th>
                            </tr>

                            </thead>
                            <tbody>
                            <tr class="success">
                                <td>
                                    <div>
                                        <div class='form-group'>
                                            <input class="form-control" id=''
                                                   name='exam_name[]' type='text'/>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <div class="control">
                                            <input class="form-control" id=''
                                                   name='board_name[]' type='text'/>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <div class="control">
                                            <input class="form-control" id=''
                                                   name='institue_name[]' type='text'/>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <div class="control">
                                            <input class="form-control" id=''
                                                   name='deprt_name[]' type='text'/>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <div class="control">
                                            <input class="form-control" id=''
                                                   name='result[]' type='text'/>
                                        </div>
                                    </div>
                                </td>
                                    <td style="padding: 2px 1px">
                                       <input class="form-control" id=''
                                                   name='year[]' type='date'/>
                                    </td>
                    
                                <td>
                                    <button type="button" class="btn btn-warning btn-xs edu_add">Add</button>&nbsp;<button
                                            type="button" class="btn btn-danger btn-xs edu_remove">Remove
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                  



					<div class="text-center">
						<button type="submit" class="btn btn-success" id="saveMosjid">সংরক্ষণ</button>
					</div>
	                
                </div>
            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!--row-->
    {{ Form::close() }}
@endsection