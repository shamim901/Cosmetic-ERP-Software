@extends('frontend.layouts.app')

@section('content')
{{ Form::open(['route' => 'frontend.imam.train_imam', 'class' => '','id'=>'']) }}
    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <h3> <b>অনলাইন ইমাম প্রশিক্ষণ আবেদন ফর্ম </b></h3>
                    
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
						      	<th class="text-center" colspan="6"> ইমামের তথ্য: </th>
						    </tr>
					  	</thead>
					  	<tbody>
						   
						    <tr>
						      	<th>নাম </th>
						      	<td>
						      		{{ $imam_info->name }}
						      	</td>
						      	<th>রেজিস্টার নাম্বার</th>
						      	<td>
						      		{{ $imam_info->reg_code }}
						      	</td>
						      	<th>পিতার নাম</th>
						      	<td>
						      		{{ $imam_info->father_name }}
						      	</td>
						    </tr>

						     <tr>
						      	<th>জন্ম তারিখ </th>
						      	<td>
						      		{{ $imam_info->dob }}
						      	</td>
						      	<th>মোবাইল</th>
						      	<td>
						      		{{ $imam_info->phone }}
						      	</td>
						      	<input type="hidden" name="imam_id" value=" {{ $imam_info->id }} ">
						      	<!-- <th>ছবি</th>
						      	<td>
						      		 
						      	</td> -->
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
						      	<th class="text-center" colspan="6"> ইমামের বাসস্থান:</th>
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
						      	<th class="text-center" colspan="6"> মসজিদের অবস্থান:</th>
						    </tr>
					  	</thead>
					  	<tbody>
						    <tr>
						      	<th>বিভাগ </th>
						      	<td> 
						      		  <select name="division_id" id="divisiond" class="form-control required">
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
					                  
					                  <select name="district_id" id="districtd" class="district_vald form-control required">
					                    <option value="">-- নির্বাচন করুন  --</option>
					                  </select>
					                </div>
						      	</td>

						      	<th>উপজেলা </th>
						      	<td>  <div class="form-group">
					                  @if($errors->has('upazilla_id'))
					                    <div class="alert alert-warning"><i class="fa fa-warning"></i>{{ $errors->first('upazilla_id') }}</div>
					                  @endif
					                  
					                  <select name="upazilla_id" id="upazilad" class="upazila_vald form-control required">
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
					                  
					                  <select name="union_id" id="uniond" class="union_vald form-control required">
					                    <option value="">-- নির্বাচন করুন  --</option>
					                  </select>
					                </div>
						      	</td>

						        	<th>মসজিদের নাম</th>
						      	<td>
						      		 
					                 <select name="mosque" class="form-control required">
					                 	<option value="">-- নির্বাচন করুন  --</option>
					                 	  @foreach($mosques as $mosques)
					                 	<option value="{{ $mosques->id }}">{{ $mosques->mosques_name }}</option>
					                 	 @endforeach
					                 </select>
					               
						      	</td>


						      	<!-- <th>গ্রামের নাম</th>
						      	<td>
						      		 <div class="form-group">
					                  @if($errors->has('village_id'))
					                    <div class="alert alert-warning"><i class="fa fa-warning"></i>{{ $errors->first('village_id') }}</div>
					                  @endif
					                  
					                  <input type="text" name="village_id" id="villagesd" class="form-control required">
					                </div>
						      	</td> -->
						    </tr>
					  </tbody>
					</table>


					<table class="table table-bordered" id="education_table" style="margin-bottom:0px; ">
                        <thead>
					    	<tr class="success">
						      	<th class="text-center" colspan="9">  ইমামের প্রশিক্ষণের তালিকা:</th>
						    </tr>
					  	</thead>
                            <thead>
                            <tr class="active">
                                <th> প্রশিক্ষণের নাম </th>
                                <th> ব্যাচ </th>
                                
                            </tr>

                            </thead>
                            <tbody>
                            <tr class="success">
                              <td>  @if($imam_info->train_name)
                              		{{ $imam_info->train_name }} 
                              		@endif
                              </td>
                              <td>  @if($imam_info->batch_name)
                              		{{ $imam_info->batch_name }} 
                              		@endif
                              </td>
                             
                            </tr>
                            </tbody>
                        </table>

                    <table class="table table-bordered" id="education_table" style="margin-bottom:0px; ">
                        <thead>
					    	<tr class="success">
						      	<th class="text-center" colspan="9">  ইমামের প্রশিক্ষণ সংযুক্তকরণ:</th>
						    </tr>
					  	</thead>
                            <thead>
                            <tr class="active">
                                <th> প্রশিক্ষণের নাম </th>
                                                     
                            </tr>

                            </thead>
                            <tbody>
                            <tr class="success">
                              <td> 
                              	<select name="train_name"  class="form-control required">
							                    <option value="">-- নির্বাচন করুন  --</option>
							                    @foreach($training_list as $item)
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
						      	<th class="text-center" colspan="9"> ইমামের শিক্ষাগত যোগ্যতা:</th>
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
                            </tr>

                            </thead>
                            <tbody>
                            <tr class="success">
                              <td> {{ $imam_info->e_name }} </td>
                              <td> {{ $imam_info->b_name }} </td>
                              <td> {{ $imam_info->i_name }} </td>
                              <td> {{ $imam_info->d_name }} </td>
                              <td> {{ $imam_info->rsult }} </td>
                              <td> {{ $imam_info->y }} </td>
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
