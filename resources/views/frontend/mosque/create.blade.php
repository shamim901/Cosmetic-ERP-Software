@extends('frontend.layouts.app')

@section('content')
{{ Form::open(['route' => 'frontend.mosque.create', 'class' => '','id'=>'']) }}
    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <h3> <b>মসজিদ জরিফ ফরম </b></h3>
                    <p> ইসলামিক ফাউন্ডেশন কার্যক্রম, ডিজিটালে রুপান্তর ও ডিজিটাল আর্কাইভ স্থাপন প্রকল্প<br>
                    ইসলামিক ফাউন্ডেশন<br>
					আগারগাঁও, শেরেবাংলা নগর, ঢাকা-১২০৭</p>
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
						      	<td>
						      		{{$division->bn_name}} 
						      		<input type="hidden"  name="mosque[region]" value="{{$division->id}}" class="form-control required">
						      	</td>
						      	<th>জেলা </th>
						      	<td>
						      		{{$district->bn_name}} 
						      		<input type="hidden"  name="mosque[district]" value="{{$district->id}}" class="form-control required">
						      	</td>
						      	<th>উপজেলা </th>
						      	<td>
						      		{{$upazila->bn_name}} 
						      		<input type="hidden"  name="mosque[upazila]" value="{{$upazila->id}}" class="form-control required">
						      	</td>
						    </tr>
						    <tr>
						      	<th>ইউনিয়ন </th>
						      	<td>
						      		{{$union->bn_name}} 
						      		<input type="hidden"  name="mosque[union]" value="{{$union->id}}" class="form-control required">
						      	</td>
						      	<th>গ্রাম /মহল্লা </th>
						      	<td>
						      		<input type="text" id="villages" name="mosque[village]" value="" class="form-control required">
						      	</td>
						      	<th>ডাকঘর / পোস্ট কোড </th>
						      	<td>
						      		<input type="text" name="mosque[post_code]" value="" class="form-control required">
						      	</td>
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
							    	<input type="text" name="mosque[mosques_name]" value="" class="form-control required">
					      		</td>
					      		<td rowspan="7"></td>
					      		<td>মসজিদের বারান্দা </td>
					      		<td>
					      			<label class="radio-inline"><input type="radio" name="mosque[mosques_corridor]" value="1" checked>আছে</label>
									<label class="radio-inline"><input type="radio" name="mosque[mosques_corridor]" value="2">নাই ।</label>
					      		</td>
					    	</tr>
						    <tr>
						      	<td>মসজিদের রেজিষ্ট্রেশন কোড</td>
						      	<td>
						      		<input type="text" name="mosque[mosques_reg_code]" value="" class="form-control required">
						      	</td>

						      	<td>বৈদ্যুতিক সুবিধা </td>
						      	<td>
						      		<label class="radio-inline"><input type="radio" name="mosque[electricity_facilities]" value="1" checked="">আছে</label>
									<label class="radio-inline"><input type="radio" name="mosque[electricity_facilities]" value="2">নাই ।</label>
						      	</td>
						    </tr>

						    <tr>
						      	<td>মসজিদ প্রতিষ্ঠার সন</td>
						      	<td>
						      		<div class="form-inline">
								    	<input type="text" name="mosque[mosques_establishment_year]" value="" class="form-control required">
								    	<label for="email">ইংরেজি</label>
								  	</div>
						      	</td>

						      	<td rowspan="3">পানি সরবরাহ ব্যবস্থা</td>
						      	<td rowspan="3">
						      		
									<div class="checkbox">
									  <label><input type="checkbox" name="mosque[water_facilities]" value="1" checked>পুকুর</label>
									</div>
									<div class="checkbox">
									  <label><input type="checkbox" name="mosque[water_facilities]" value="2">টিউবয়েল</label>
									</div>
									<div class="checkbox">
									  <label><input type="checkbox" name="mosque[water_facilities]" value="3" >সাপ্লাই</label>
									</div>
									<div class="checkbox">
									  <label><input type="checkbox" name="mosque[water_facilities]" value="4" >অন্যান্য</label>
									</div>
									<div class="checkbox">
									  <label><input type="checkbox" name="mosque[water_facilities]" value="5" >নাই</label>
									</div>
						      	</td>
						      
						    </tr>

						    <tr>
						      	<td>মসজিদের আয়তন</td>
						      	<td>
						      		<div class="form-inline">
								    	<input type="text" name="mosque[mosques_size]" value="" class="form-control required">
								    	<label for="email">বর্গফুট</label>
								  	</div>
						      	</td>
						    </tr>

						    <tr>
						      	<td>মসজিদের কাঠামো</td>
						      	<td>
						      		<label class="radio-inline"><input type="radio" name="mosque[mosques_structure]" value="1" checked>পাকা</label>
									<label class="radio-inline"><input type="radio" name="mosque[mosques_structure]" value="2">আধা পাকা</label>
									<label class="radio-inline"><input type="radio" name="mosque[mosques_structure]" value="3">কাঁচা</label>
						      	</td>
						    </tr>
						    <tr>
						      	<td>মসজিদের ধরণ</td>
						      	<td>
						      		<label class="radio-inline"><input type="radio" name="mosque[mosques_type]" value="1" checked>জামে মসজিদ</label>
									<label class="radio-inline"><input type="radio" name="mosque[mosques_type]" value="2">পাঞ্জেগানা</label>
									<label class="radio-inline"><input type="radio" name="mosque[mosques_type]" value="3">অন্যান্য</label>
						      	</td>
						      
						     	<td>পয়: ব্যবস্থা</td>
						      	<td>
						      		<label class="radio-inline"><input type="radio" name="mosque[toilet_facilities]" value="1" checked>আছে</label>
									<label class="radio-inline"><input type="radio" name="mosque[toilet_facilities]" value="2">নাই ।</label>
						      	</td>
						    </tr>

						    <tr>
						      	<td>নামাজের সুবিধার গড় সংখ্যা</td>
						      	<td>
						      		<div class="form-inline">
									    <label for="email">ওয়াক্তিয়া </label>
							      		<input type="text" name="mosque[waktiya_prayer_average]" value="" class="form-control required" style="width: 60px !important">
								    	<label for="email">জুমআ </label>
									    <input type="text" name="mosque[jumma_prayer_average]" value="" class="form-control required" style="width: 60px !important">
								    	<label for="email">জন </label>
								    </div>
						      	</td>
						      
						      	<td>গ্যাস সরবরাহ</td>
						      	<td>
						      		<label class="radio-inline"><input type="radio" name="mosque[gas_facilities]" value="1" checked>আছে</label>
									<label class="radio-inline"><input type="radio" name="mosque[gas_facilities]" value="2">নাই ।</label>
						      	</td>
						    </tr>

						    <tr>
						      	<td colspan="5">মহিলাদের নামাজের পৃথক বাবস্থা আছে কি না ? 
						      		<label class="radio-inline"><input type="radio" name="mosque[women_prayer_facilities]" value="1" checked>আছে</label>
									<label class="radio-inline"><input type="radio" name="mosque[women_prayer_facilities]" value="2">নাই ।</label>

						       		থাকলে নামাজের সুবিধার গড় সংখ্যা

						       		<span class="form-inline">
									    <label for="email">ওয়াক্তিয়া </label>
							      		<input type="text" name="mosque[waktiya_women_prayer_average]" value="" class="form-control required" style="width: 60px !important">
								    	<label for="email">জুমআ </label>
									    <input type="text" name="mosque[jumma_women_prayer_average]" value="" class="form-control required" style="width: 60px !important">
								    	<label for="email">জন </label>
								    </span>
						       	</td>
						    </tr>
						    <tr>
						      	<td colspan="2">ঐতিহাসিক / প্রত্নতাত্তিক গুরুত্বপূণ মসজিদ কিনা ?  </td>
						      	<td colspan="3">
						      		<label class="radio-inline"><input type="radio" name="mosque[historically_important_mosjid]" value="1" checked>আছে</label>
									<label class="radio-inline"><input type="radio" name="mosque[historically_important_mosjid]" value="2">নাই ।</label>
						      	</td>
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
						      	<th class="text-center" colspan="5">মসজিদের সম্পদ, কাঠামো, আয় ও জনবল :</th>
						    </tr>
					  	</thead>
					  	<tbody>
						    <tr>
								<td>মসজিদের সম্পত্তি</td>
								<td>
									<span class="form-inline">
									    <label for="email"> পরিমান </label>
							      		<input type="text" name="treasure[mosques_property_measurements]" value="" class="form-control required" style="width: 60px !important">
								    	<label for="email"><!-- আনুমানিক --> মূল্য </label>
									    <input type="text" name="treasure[mosques_property_price]" value="" class="form-control required" style="width: 60px !important">
								    	<label for="email">টাকা </label>
								    </span>
								</td>
								<td rowspan="9"></td>
								<td>মসজিদের খতিব</td>
								<td>
									<input type="text" name="treasure[mosques_khatib]" value="" class="form-control required">
								</td>
						    </tr>

						    <tr>
								<td>মসজিদের বার্ষিক আয় বায় </td>
								<td>
									<span class="form-inline">
									    <label for="email">  আয়   </label>
							      		<input type="text" name="treasure[mosques_annual_income]" value="" class="form-control required" style="width: 60px !important">
								    	<label for="email"><!-- আনুমানিক --> টাকা, বায় </label>
									    <input type="text" name="treasure[mosques_annual_expense]" value="" class="form-control required" style="width: 60px !important">
								    	<label for="email">টাকা </label>
								    </span>
								</td>

								<td>মসজিদের ইমামের  সংখ্যা </td>
								<td>
									<input type="text" name="treasure[mosques_imam]" value="" class="form-control required">
								</td>
						    </tr>

						    <tr>
								<td>মসজিদের সম্পত্তির ধরণ </td>
								<td>
									<label class="radio-inline"><input type="radio" name="treasure[mosques_property_type]" value="1" checked>ওয়াকফ কৃত</label>
									<label class="radio-inline"><input type="radio" name="treasure[mosques_property_type]" value="2">সরকারি</label>
									<div>
										<label class="radio-inline"><input type="radio" name="treasure[mosques_property_type]" value="3">নিজস্ব</label>
									</div>
								</td>

								<td>মসজিদের মুয়াজ্জিনের  সংখ্যা </td>
								<td>
									<input type="text" name="treasure[mosques_muazzin]" value="" class="form-control">
								</td>
						    </tr>

						    <tr>
								<th rowspan="3">মসজিদের পরিচালনা </th>
								<td rowspan="3">
									<label class="radio-inline"><input type="radio" name="treasure[mosques_management]" value="1">কমিটি কর্তৃক</label>
									<label class="radio-inline"><input type="radio" name="treasure[mosques_management]" value="2">সরকার কর্তৃক</label>
									<div>
										<label class="radio-inline"><input type="radio" name="treasure[mosques_management]" value="3">মোতাওল্লী কর্তৃক</label>
										<label class="radio-inline"><input type="radio" name="treasure[mosques_management]" value="4">অন্যান্য</label>
									</div>
									<label class="radio-inline"><input type="radio" name="treasure[mosques_management]" value="5">প্রতিষ্ঠান/সংস্থা  কর্তৃক</label>
								</td>
						    </tr>
						    <tr>
						     	<td>মসজিদের খাদেমের সংখ্যা </td>
						      	<td>
						      		<input type="text" name="treasure[mosques_khadem]" value="" class="form-control required">
						      	</td>
						    </tr>

						    <tr>
						      	<td>মসজিদের ইমামের প্রশিক্ষণ </td>
						      	<td>
						      		<label class="checkbox-inline"><input type="checkbox" name="treasure[mosques_imam_training]" value="1" checked="">ইফা  কর্তৃক </label>
									<label class="checkbox-inline"><input type="checkbox" name="treasure[mosques_imam_training]" value="2">অন্য প্রতিষ্ঠান  কর্তৃক</label>
									<div>
										<label class="checkbox-inline"><input type="checkbox" name="treasure[mosques_imam_training]" value="3">অন্যান্য</label>
									</div>
						      	</td>
						    </tr>
						    
						    <tr>
						      	<td>মসজিদের তলার সংখ্যা কত?</td>
						      	<td>
						      		<input type="text" name="treasure[mosques_floor_number]" value="" class="form-control">
						      	</td>
						      	<th>ইমামের নাম</th>
						      	<td>
						      		<input type="text" name="treasure[imam_name]" value="" class="form-control required">
						      	</td>
						    </tr>
						    <tr>
						      	<td>মসজিদ কমিটির সভাপতি/ মোতআল্লির নাম</td>
						      	<td>
						      		<input type="text" name="treasure[motalli_name]" value="" class="form-control required">
						      	</td>
						      	<th>ইমামের মোবাইল নং</th>
						      	<td>
						      		<input type="text" name="treasure[imam_mobile]" value="" class="form-control required">
						      	</td>
						    </tr>
						    <tr>
						      	<td>সভাপতি/ মোতআল্লির মোবাইল নং</td>
						      	<td>
						      		<input type="text" name="treasure[motalli_mobile]" value="" class="form-control required">
						      	</td>
						      	<th>এনআইডি নং</th>
						      	<td>
						      		<input type="text" name="treasure[imam_nid]" value="" class="form-control required">
						      	</td>
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
						      	<th class="text-center" colspan="5">মসজিদ পাঠাগার  সংলগ্ন প্রতিষ্ঠান ও অন্যান্য :</th>
						    </tr>
					  	</thead>
					  	<tbody>
					    <tr>
					      	<td>মসজিদের পাঠাগার</td>
					      	<td>
					      		<label class="radio-inline"><input type="radio" name="institution[mosques_library]" value="1" checked>আছে</label>
								<label class="radio-inline"><input type="radio" name="institution[mosques_library]" value="0">নাই ।</label>
					      	</td>
					      	<td rowspan="9"></td>
					      	<td>সংলগ্ন প্রতিষ্ঠান  মাদ্রাসা হলে ধরণ </td>
					      	<td>
					      		<label class="checkbox-inline"><input type="checkbox" value="institution[madrasa_type]" value="1">আলিয়া</label>
								<label class="checkbox-inline"><input type="checkbox" value="institution[madrasa_type]" value="2">কওমী</label>
								<label class="checkbox-inline"><input type="checkbox" value="institution[madrasa_type]" value="3">হাফিজিয়া </label>
					      	</td>
					    </tr>

					    <tr>
					      	<td>দায়িত্ব  প্রাপ্ত লাইব্রেরিয়ান </td>
					      	<td>
					      		<label class="radio-inline"><input type="radio" name="institution[iibrarian]" value="1" checked>আছে</label>
								<label class="radio-inline"><input type="radio" name="institution[iibrarian]" value="0">নাই ।</label>
					      	</td>
					      
					      	<td> সংলগ্ন প্রতিষ্ঠান আলিয়া মাদ্রাসা হলে পর্যান্ত </td>
					      	<td>
					      		<label class="radio-inline"><input type="radio" name="institution[aliya_madrasa_stage]" value="1">দাখিল</label>
								<label class="radio-inline"><input type="radio" name="institution[aliya_madrasa_stage]" value="2">আলিম</label>
								<label class="radio-inline"><input type="radio" name="institution[aliya_madrasa_stage]" value="3">ফাজিল</label>
								<label class="radio-inline"><input type="radio" name="institution[aliya_madrasa_stage]" value="4">কামিল</label>
					      	</td>
					    </tr>

					    <tr>
					      	<td>পাঠাগারে মোট</td>
					      	<td>
					      		<span class="form-inline">
								    <label for="email">পুস্তক</label>
						      		<input type="text" name="institution[total_books]" value="" class="form-control required" style="width: 60px !important">
							    	<label for="email">আলমারি  </label>
								    <input type="text" name="institution[total_almary]" value="" class="form-control required" style="width: 60px !important">
							    	<label for="email">সংখ্যা </label>
							    </span>
					      	</td>
					      
					      	<td> সংলগ্ন প্রতিষ্ঠান কওমী মাদ্রাসা হলে পর্যান্ত</td>
					      	<td>
					      		<label class="radio-inline"><input type="radio" name="institution[kawmia_madrasa_stage]" value="1">এবতেদায়ী</label>
								<label class="radio-inline"><input type="radio" name="institution[kawmia_madrasa_stage]" value="2">কাফিয়া</label>
								<label class="radio-inline"><input type="radio" name="institution[kawmia_madrasa_stage]" value="3">দাওরাহ হাদিস</label>
					      	</td>
					    </tr>

					    <tr>
					      	<td>মসজিদ  সংলগ্ন প্রতিষ্ঠান</td>
					      	<td>
					      		<label class="checkbox-inline"><input type="checkbox" name="institution[mosques_institute_type]" value="1">এতিমখানা</label>
								<label class="checkbox-inline"><input type="checkbox" name="institution[mosques_institute_type]" value="2">মাজার</label>
								<label class="checkbox-inline"><input type="checkbox" name="institution[mosques_institute_type]" value="3">মাদ্রাসা</label>
								<div>
									<label class="checkbox-inline"><input type="checkbox" name="institution[mosques_institute_type]" value="1">খানকা</label>
									<label class="checkbox-inline"><input type="checkbox" name="institution[mosques_institute_type]" value="4">মক্তব</label>
									<label class="checkbox-inline"><input type="checkbox" name="institution[mosques_institute_type]" value="5">হেবজখানা</label>
								</div>
								<label class="checkbox-inline"><input type="checkbox" name="institution[mosques_institute_type]" value="6">অন্যান্য</label>
								<label class="checkbox-inline"><input type="checkbox" name="institution[mosques_institute_type]" value="7">নাই</label>
					      	</td>
					      	<th>মসজিদ ভিত্তিক গণশিক্ষা কেন্দ্র</th>
					      	<td>
					      		<div>
						      		<label class="checkbox-inline"><input type="checkbox" name="institution[mass_education]" value="1">কুরআন শিক্ষা</label>
									<label class="checkbox-inline"><input type="checkbox" name="institution[mass_education]" value="2">প্রাক-প্রাথমিক</label>
								</div>
								<div>
									<label class="checkbox-inline"><input type="checkbox" name="institution[mass_education]" value="3">বয়স্ক শিক্ষা</label>
									<label class="checkbox-inline"><input type="checkbox" name="institution[mass_education]" value="4">অন্যান্য</label>
									<label class="checkbox-inline"><input type="checkbox" name="institution[mass_education]" value="5">নাই</label>
								</div>
					      	</td>
					    </tr>
					    <tr>
					     	<td rowspan="2"> সংলগ্ন প্রতিষ্ঠানের নাম </td>
					      	<td rowspan="2">
					      		<input type="text" name="institution[mosques_institute_name]" value="" class="form-control required">
					      	</td>
					    </tr>

					    <tr>
					      	<td>কেন্দ্রে শিক্ষকের প্রশিক্ষণ </td>
					      	<td>
					      		<label class="checkbox-inline"><input type="checkbox" name="institution[center_teacher_training]" value="1">ইফা  কর্তৃক </label>
								<label class="checkbox-inline"><input type="checkbox" name="institution[center_teacher_training]" value="2">অন্য প্রতিষ্ঠান  কর্তৃক</label>
								<div>
									<label class="checkbox-inline"><input type="checkbox" name="institution[center_teacher_training]" value="3">অন্যান্য</label>
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
						      		<input type="text" name="info_provide[provider_name]" value="" class="form-control required">
						      	</td>
						      	<th>পরিচয়</th>
						      	<td>
						      		<input type="text" name="info_provide[provider_identity]" value="" class="form-control required">
						      	</td>
						      	<th>স্বাক্ষর</th>
						      	<td>
						      		<input type="text" name="info_provide[provider_signature]" value="" class="form-control required">
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