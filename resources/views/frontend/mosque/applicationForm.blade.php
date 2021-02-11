@extends('frontend.layouts.app')

@section('content')
{{ Form::open(['route' => 'frontend.mosque.createlib', 'class' => '','id'=>'']) }}
    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <h3> <b>অনলাইন মসজিদ পাঠাগার স্থাপন আবেদন ফর্ম </b></h3>
                    
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
						      	<th class="text-center" colspan="6">মসজিদের অবস্থান:</th>
						    </tr>
					  	</thead>
					  	<tbody>
						    <tr>
						      	<th>বিভাগ </th>
						      	<td> {{ $mosque->div_name }}
						            <input type="hidden" name="mos_id"  value="{{ $mosque->id }}" class="form-control required">
					                <input type="hidden" name="div_id"  value="{{ $mosque->region }}" class="form-control required">
					                <input type="hidden" name="dis_id"  value="{{ $mosque->district }}" class="form-control required">
					                <input type="hidden" name="up_id"  value="{{ $mosque->upazila }}" class="form-control required">
					                <input type="hidden" name="uni_id"  value="{{ $mosque->union }}" class="form-control required">
					                <input type="hidden" name="vill_id"  value="{{ $mosque->village }}" class="form-control required">

						      	 </td>
						      	<th>জেলা </th>
						      	<td>
						      		{{ $mosque->dis_name }}
						      		 
						      	</td>
						      	<th>উপজেলা </th>
						      	<td>
						      		{{ $mosque->up_name }}
						      		 
						      	</td>
						    </tr>
						    <tr>
						      	 
						      	<th>মহল্লা/গ্রাম/সড়ক নং </th>
						      	<td>
						      		 {{ $mosque->vill_name }}
						      	</td>
						      	<!-- <th>ডাকঘর / পোস্ট কোড </th>
						      	<td>
						      		<input type="text" name="mosque[post_code]" value="" class="form-control required">
						      	</td> -->
						    </tr>
					  </tbody>
					</table>

                    <table class="table table-bordered">
	                    <colgroup>
						    <col width="20%">
						    <col width="28%">
						    <col width="4%">
						    <col width="20%">
						    <col width="28%">
						</colgroup>
						<thead>
						    <tr class="success">
						      	<th class="text-center" colspan="5">মসজিদের নাম, কাঠামো ও সুবিধাদি</th>
						    </tr>
						</thead>
					  	<tbody>
						    <tr>
						      	<td>মসজিদের নাম</td>
					      		<td>
							    	  <input type="text" name="mosque_name" id="mosque_name" value="{{ $mosque->mosques_name }}" class="form-control required clear">
					      		</td>
					      		<td rowspan="7"></td>
					      		 
					    	</tr>
						   
						    <tr>
						      	<td>মসজিদ প্রতিষ্ঠার সন</td>
						      	<td>
						      		<div class="form-inline">
								    	<input type="text" name="establish_year" id="establish_year" value="{{ $mosque->mosques_establishment_year }}" class="form-control required clear">
								    	<label for="email">ইংরেজি</label>
								  	</div>
						      	</td>

						       
						      
						    </tr>

						    <tr>
						      	<td>মসজিদের আয়তন</td>
						      	<td>
						      		<div class="form-inline">
										<input type="text" name="mosques_size" id="mosques_size" value="{{ $mosque->mosques_size }}" class="form-control required clear">								    	
										<label for="email">বর্গফুট</label>
								  	</div>
						      	</td>
						    </tr>

						    <tr>
						      	<td>মসজিদের কাঠামো</td>
						      	<td>
						      		<label class="radio-inline"><input type="radio" name="room_condition" value="1" checked>পাকা</label>
									<label class="radio-inline"><input type="radio" name="room_condition" value="2">আধা পাকা</label>
									<label class="radio-inline"><input type="radio" name="room_condition" value="3">কাঁচা</label>
						      	</td>
						    </tr>
						   
						    <tr>
						      	<td>নামাজের সুবিধার গড় সংখ্যা</td>
						      	<td>
						      		<div class="form-inline">
									    <label for="email">ওয়াক্তিয়া </label>
							      		 <input type="text" name="namazir_number" value="{{ $mosque->waktiya_prayer_average }}" id="namazir_number"  class="form-control required">
								    	<label for="email"> জুম্মা </label>
									    <input type="text" name="namazir_number_weekly" value="{{ $mosque->jumma_prayer_average }}" id="namazir_number_weekly"  class="form-control required">
								    	<label for="email">জন </label>
								    </div>
						      	</td>
						      
						       
						    </tr>

						    
						    
					  	</tbody>
					</table>


					<table class="table table-bordered">
						<colgroup>
						    <col width="20%">
						    <col width="28%">
						    <col width="30%">
						    <col width="20%">
						    <col width="28%">
						</colgroup>
					  	<thead>

						    <tr class="success">
						      	<th class="text-center" colspan="5">মসজিদের সম্পদ, কাঠামো, আয় ও জনবল :</th>
						    </tr>
					  	</thead>
					  	<tbody>
						   
						    <tr>
								<td>মসজিদের বার্ষিক আয় </td>
								<td>
									<span class="form-inline">
							      		<input type="text" name="yearly_income" value="" class="form-control required" >
								    	 
								    </span>
								</td>

								<td> বিগত বছরে মসজিদ কমিটির কয়টি সভা হইয়েছে </td>
								<td>  <input type="text" name="last_year_meeting" value="" id="last_year_meeting" class="form-control required"  > </td>


								 
						    </tr>

						    
						     <tr>
								<td>মসজিদ কে পরিচালনা করেন</td>
								<td>
									 <select name="direction">
					                 	<option value="1">কমিটি</option>
					                 	<option value="2">মুতাওয়াল্লী</option>
					                 </select>
								</td>

								<td>ওয়াকফ সম্পতি  
                	 আছে কি না (যদি থাকে তাহার বিবারণ) সম্পত্তির পরিমাণ</td>
								<td>   <input type="text" value="" name="wakf_property_amount" id="wakf_property_amount" class="form-control required clear"> </td>
								 
						    </tr>


						       <tr>
								<td>মসজিদের ইমাম  কোন কমিটির সদস্য </td>
								<td>
									  <input name="imam_commitee" id="imam_commitee" class="form-control required clear">
								</td>

								<td> মসজিদের ইমাম কি ইসলামিক ফাউন্ডেশেনের প্রশিক্ষণ প্রাপ্ত </td>
								<td>  
									 <div class="form-check">
										  <input class="form-check-input" type="radio" name="trained_imam" id="haveRadio" value="1" checked>
										  <label class="form-check-label" for="haveRadio">
										    হ্যাঁ
										  </label>
										
										  <input class="form-check-input" type="radio" name="trained_imam" id="noRadion" value="0">
										  <label class="form-check-label" for="noRadion">
										    না
										  </label>
										</div>
								</td>
								 
						    </tr>



						  
						    <tr>
						    	<td>ওয়াকফ সম্পতি 
                	 				আছে কি না (যদি থাকে তাহার  বিবারণ) মূল্য</td>
						    	<td> <input type="text" value="" name="wakf_property_price" id="wakf_property_price" class="form-control required clear">
						    	</td> 
						    </tr>
						    
						 
					    
					  	</tbody>
					</table>

					<table class="table table-bordered">
						<colgroup>
						    <col width="20%">
						    <col width="28%">
						    <col width="30%">
						    <col width="20%">
						    <!-- <col width="28%"> -->
						</colgroup>
					  	<thead>
						    <tr class="success">
						      	<th class="text-center" colspan="5">মসজিদ পাঠাগার  সংলগ্ন প্রতিষ্ঠান ও অন্যান্য :</th>
						    </tr>
					  	</thead>
					  	<tbody>
					   

					  

					  

					    <tr>
					      	<td> মসজিদের আলমারির সংখ্যা : কাঠের  </td>
					      	<td>
					      		   <input type="text" value="" name="wood_almari" id="wood_almari" class="form-control required clear">
					      	</td>
					      	<th>মসজিদের আলমারির সংখ্যা : স্টীলের</th>
					      	<td>
					      		  <input type="text" value="" name="still_almari" id="still_almari" class="form-control required clear">
					      	</td>

					    </tr>


					      <tr>
					      	<td> মসজিদের আলমারির সংখ্যা দেয়াল : আলমারির  </td>
					      	<td>
					      		    <input type="text" value="" name="wall_almari" id="wall_almari" class="form-control required clear">
					      	</td>
					      	<th> মসজিদের আলমারির সংখ্যা মোট  </th>
					      	<td>
					      		      <input type="text" value="" name="tot_almari" id="tot_almari" class="form-control required clear">
					      	</td>
					    </tr>


					      <tr>
					      	<td>মসজিদ হইতে কত দূরে পাবলিক লাইব্রেরী বা অন্য কোন প্রকার লাইব্রেরী রয়েছে  </td>
					      	<td>
					      		 <input type="text" name="libraryHave" id="libraryHave" class="form-control required clear">
					      	</td>


					      	<td> মসজিদে ইসলামিক ফাউন্ডেশন কর্তৃক স্থাপিত কোন পাঠাগার আছে কিনাঃ </td>
					      	<td>    <select name="haveLibrary">
					                 	<option value="1">আছে</option>
					                 	<option value="2" selected>নাই</option>
					                 </select> </td>
					    </tr>


					    <tr>
					     	<td rowspan="2"> মসজিদের অর্ধ মাইলের মধ্যে কি কি শিক্ষা প্রতিষ্ঠান ও সরকারী অফিস আছে  </td>
					      	<td rowspan="2">
					      		 <textarea name="haveGovtOffice" id="haveGovtOffice" class="form-control required clear"></textarea>
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
						      	<th class="text-center" colspan="6">মসজিদ পাঠাগার স্থাপন করা হইলে নিম্নবর্ণিত রেজিস্টার সংরক্ষণ ও লিপিবদ্ধ করা হইবে  :</th>
						    </tr>
					  	</thead>
					  	<tbody>
						    

						    <tr>
						      	<th> পুস্তক তালিকা রেজিস্টার </th>
						      	<td>
						      		 <input type="text" value="" name="book_list_register" id="book_list_register" class="form-control required clear">
						      	</td>
						      	<th>অনুদান রেজিস্টার</th>
						      	<td>
						      		 <input type="text" value="" name="onudan_register" id="onudan_register" class="form-control required clear">
						      	</td>
						      	<th>ইস্যু রেজিস্টার </th>
						      	<td>
						      		  
					                  <input name="issue_register" id="issue_register" class="form-control required clear">
						      	</td>
						    </tr>  

						    <tr>
						      	<th> কারয বিবরণী রেজিস্টার </th>
						      	<td>
						      		 <input name="karzobiboroni_register" id="karzobiboroni_register" class="form-control required clear">
						      	</td>
						      	<th>স্টক রেজিস্টার </th>
						      	<td>
						      		 <input name="stockRegister" id="stockRegister" class="form-control required clear">
						      	</td>
						      	<th> সাংস্কৃতিক অনুষ্ঠান রেজিস্টার </th>
						      	<td>
						      		  <input name="cultural_register" id="cultural_register" class="form-control required clear">
						      	</td>
						    </tr>

						     <tr>
						      	<th> অন্যান্য </th>
						      	<td>
						      		    <input name="other_register" id="other_register" class="form-control required clear">
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
						      	<th class="text-center" colspan="6">মসজিদ সোশ্যাল কারযবলি</th>
						    </tr>
					  	</thead>
					  	<tbody>
						    

						    <tr>
						      	<th> বিগত এক বছরে মসজিদে ওয়াজ মাহফিল  </th>
						      	<td>
						      		 <input class="form-check-input" type="text" name="last_year_waz" id="last_year_waz" value="0">
						      	</td>
						      	<th>বিগত এক বছরে মসজিদে আলোচনা সভা </th>
						      	<td>
						      		 <input class="form-check-input" type="text" name="last_year_alocona" id="last_year_alocona" value="0">
						      	</td>
						      	<th>বিগত এক বছরে মসজিদে তাফসীর</th>
						      	<td>
						      		  <input class="form-check-input" type="text" name="last_year_tafsir" id="last_year_tafsir" value="0">
						      	</td>
						    </tr>


					  </tbody>

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
						      	<th class="text-center" colspan="6">তথ্য প্রদানকারীর পরিচয়:</th>
						    </tr>
					  	</thead>
					  	<tbody>
						    <tr>
						      	<th colspan="6">যার / যাদের উপস্থিতিতে এই ফরম পূরণ করা হল( মসজিদ কমিটির সভাপতি /সম্পাদক/মোতাওযাল্লী / নিয়মিত গন্যমান্য মুসল্লিদের যে কোনো একজন)</th>
						    </tr>

						    <tr>
						      	<th>তথ্য প্রদানকারীর নাম </th>
						      	<td>
						      		<input type="text" name="c_name" value="" class="form-control required">
						      	</td>
						      	<th>পরিচয়</th>
						      	<td>
						      		<input type="text" name="address" value="" class="form-control required">
						      	</td>
						      	<th>স্বাক্ষর</th>
						      	<td>
						      		<input type="text" name="signiture" value="" class="form-control required">
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