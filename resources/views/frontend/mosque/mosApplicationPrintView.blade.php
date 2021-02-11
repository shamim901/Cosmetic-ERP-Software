@extends('frontend.layouts.app')

@section('content')
{{ Form::open(['route' => 'frontend.library.update', 'class' => '','id'=>'']) }}
    <div class="row">

        <div class="col-md-8 col-md-offset-2" >

            <div class="panel panel-default">
                <p style="  padding-left: 10px; padding-top: 10px">
                	মহাপরিচালক, ইসলামিক ফাউন্ডেশ্ন । <br>
                	মাধ্যম ঃ প্রকল্প পরিচালক/পরিচালক/উপ-পরিচালক <br>
                	প্রকল্প দপ্তর/ইসলামিক ফাউন্ডেশ্ন বিভাগীয়/জেলা কার্যালয়
                </p>
                <div class="panel-heading text-center">
                    <h3> <b> বিষয়ঃ মসজিদ পাঠাগার স্থাপন করার জন্য আবেদন </b></p>
                </div>

                <p style="  padding-left: 10px; padding-top: 10px">
                	জনাব, <br>
                &nbsp &nbsp &nbsp &nbsp &nbsp ইসলামিক ফাউন্ডেশন করতিক বাস্তবায়নাধীন "মসজিদ পাঠাগার সম্প্রসারণ ও সক্তিশালীকরণ" শীর্ষক প্রকল্পের আওতায় আমাদের মসজিদে একটি পাঠাগার স্থাপনের জন্য অনুরোধ জানাইতেছি । নিম্নে বর্ণিত তথ্যদি সহানুভূতির সঙ্গে বিবেচনা করিবার জন্য পেশ করা হইলঃ  
                </p>


                <p  style="  padding-left: 10px; padding-top: 10px;line-height: 2.0">
                	01.  মসজিদের নাম (যদি নাম থাকে নচেৎ স্থানের নাম): <input type="number" name="" style="border-color: white"> <br>
                	02.  মসজিদের অবস্থান : মহল্লা/গ্রাম/সড়ক নং <input type="number" name="" style="border-color: white"> <br> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp ডাকঘর: <input type="text" name="" style="border-color: white"> উপজেলা:<input type="text" name=""> জেলাঃ <input type="text" name="" style="border-color: white"> <br>
                	03. মসজিদ প্রতিষ্ঠার সন: <input type="date" name="" style="border-color: white"> <br>
                	04. মসজিদের দৈর্ঘ্যঃ <input type="number" name="" style="border-color: white; width: 100px"> ফুট, প্রস্থঃ <input type="number" name="" style="border-color: white; width: 100px"> বর্গফুটঃ <input type="number" name="" style="border-color: white; width: 100px"> <br>
                	05. মসজিদ ঘরের বিব্রণ (কাঁচা/পাকা) ছাদ ......... ভিটি ...... দেয়াল ......... <br>
                	০৬ মসজিদ কে পরিচালনা করেনঃ কমিটি ......  মুতাওয়াল্লী ............ <br>
                	০৭। বিগত বছরে মসজিদ কমিটির কয়টি সভা হইয়েছেঃ ... <br>
                	০৮। নামাযিগণের গড় সংখ্যাঃ ......... জুম্মাঃ ...... <br>
                	০৯। মসজিদের বাথসরিক আয়ঃ ............ <br>
                	১০। ওয়াকফ সম্পতি 
                	 আছে কি না (যদি থাকে তাহার বিব্রণ)ঃ সম্পত্তির পরিমাণ ............... মূল্য ......... আয়ের পরিমাণ ............ আয়ের পরিমাণ ...... 
                	 <br>

                	১১। মসজিদের আলমারির সংখস্যাঃ কাঠের  <input type="checkbox" name=""> স্টীলের  <input type="checkbox" name=""> <br>
                	১২। মসজিদে ইসলামিক ফাউন্ডেশ্ন করতিক স্থাপিত কোন পাঠাগার আছে কিনাঃ  <input type="checkbox" name=""> <br>
                	    ক) থাকিলে কবে প্রতিস্তিত হইয়েছে <input type="number" name="" style="border-color: white; width: 100px"> খ) পাঠাগার কমিটির সদস্য সংখ্যা কত <input type="number" name="" style="border-color: white; width: 100px"> <br>
                	    গ) পুস্থক সংখ্যা কত <input type="number" name="" style="border-color: white; width: 100px"> ঘ) দৈনিক গড় পাঠকের সংখ্যা <input type="number" name="" style="border-color: white; width: 100px"> <br>
                	১৩) মসজিদ পাঠাগার স্থাপন করা হইলে নিম্নবর্ণিত রেজিস্টার সংরক্ষণ ও লিপিবদ্ধ করা হইবে । <br>
                	ক) পুস্তক তালিকা রেজিস্টার <input type="number" name="" style="border-color: white; width: 100px"> খ) অনুদান রেজিস্টার <input type="number" name="" style="border-color: white; width: 100px"> <br>
                	গ) ইস্যু রেজিস্টার <input type="text" name="" style="border-color: white; width: 100px"> ঘ) কারয বিবরণী রেজিস্টার <input type="text" name="" style="border-color: white; width: 100px"> <br>
                	এ) স্টক রেজিস্টার <input type="text" name="" style="border-color: white; width: 100px"> চ) সাংস্কৃতিক অনুষ্ঠান রেজিস্টার <input type="text" name="" style="border-color: white; width: 100px"> ছ) অন্যান্য <input type="text" name="" style="border-color: white; width: 100px"> <br>
                	১৪) মসজিদের অর্ধ মাইলের মধ্যে কি কি শিক্ষা প্রথিস্তান ও সরকারী অফিস আছে ............ <br>
                	১৫) মসজিদ হইতে কত দূরে পাব্লিক লাইব্রারি বা অন্য কোন প্রকার লাইব্রারি রয়েছে .................. <br>
                	১৬) মসজিদের ইমাম কি ইসলামিক ফাউন্ডেশেনের প্রশিক্ষণ প্রাপ্তঃ হ্যাঁ ...... না ...... <br>
                	১৭) মসজিদের ইমাম নিম্নেউক্ত কোন কমিটির সদস্য । <br>
                	ক) ..................... খ) ............... <br>
                	গ) ..................... ঘ) ............... <br>
                	১৮) বিগত এক বছরে মসজিদে ওয়াজ মাহফিল ......... টি, আলোচনা সভা ............ টি, তাফসীর ............। টি হয়েছে । <br>
                	১৯। মসজিদ কে কেন্দ্র করে করিয়া নিম্নেউক্ত কর্মসূচী গ্রহণ করা হইয়াছে ঃ নৈশ বিদ্যালায় ............  <br>
                	দাথব্ব চিকিথসালয় ......... পরিষ্কার পরিচ্ছন্নতা অভিযান ............ <br>
                	এতিমখানা ............ রিলিফ ওয়ার্ক ............ সম্বায় সমিতি ...............  <br>
                	মক্তব শিক্ষা ............ অন্যান্য .........  <br> <br>

                	অঙ্গীকার নামা  <br>

                	১। উপরোক্ত সকল বিবরণ সত্য ।  <br> 
                	২। ইসলামিক ফাউন্ডেশ্ন জেলা/বিভাগীয় কার্যালয় প্রদত্ত পুস্তকের হেফাযতসহ পাথাগারের সার্বিক উন্নয়নের সচেষ্ঠ থাকিব।  <br>
                	৩। ইসলামিক ফাউন্ডেশ্নের চাহিদা অনুসারে পাঠাগার ও মসজিদ সম্পর্কিত প্রয়োজনীয় তথ্য সরবারাহ করিব।   <br>
                	৪। ইসলামিক ফাউন্ডেশন মসজিদ কেন্দ্রিক বিভিন্ন কর্মসূচীতে সহযোগিতা দানে সচেষ্ঠ থাকিব ।  <br>
                	৫। পাঠাগার সংক্রান্ত সকল খরচ, যথাঃ সাইনবোর্ড তৈরি, স্টাম্প তৈরি, প্রয়োজনীয় রেজিস্টার ও খাতাসমুহ ক্রয় ইত্যাদি নিজেদের খরচে করিতে প্রস্তুত আছি।  <br>
                	৬। মসজিদ কমিটির সভাপতি/মুতাওয়াল্লী/ইমাম সাহেব/বিদুথসাহী একজনকে করিয়ে গঠিত আরেকটি কমিটী মাধ্যমে পাঠাগার পরিচালনা করিব।  <br>
                	৭। জুম্মা আগে/পরে মুস্ললিদিগকে পাঠাগারের পুস্থক পাঠের জন্য উদবিদ্দধ করিব।  <br> <br>

                	অতএব, করতিপখ সমীপে বিনীত নিবেদন এই যে, আমাদের মসজিদকে মসজিদ পাঠাগার সম্প্রসারণ ও সক্তিশালীকরণ প্রকল্প প্রগল্পএর অন্তর্ভুক্ত করিয়া অত্র এলাকাবাসীকে ইসলামের ইতিহাস, আদর্শ, মূল্যবোধ, সঙ্গেস্ক্রিত ও নৈতিকতা সম্পর্কে জ্ঞান আহরণ ও খেদমত করিবার সুযোগ দানে বাধিত করবেন।  <br>

                	<div class="row" style="padding-left: 10px; padding-top: 10px">
                		<div class="col-md-6">
                			প্রতায়নঃ <br>
                			১) স্থানীয় জাতীয় সংসদ সদস্যা/উপজেলা নির্বাহী অফিসারের সাক্ষর ঃ <br><br>


                			২) পোর/ইউনিয়ন চউন্সিল চেয়ারম্যানের সাক্ষরঃ<br><br>


                		</div>
                		<div class="col-md-6" style="text-align: center;"> 
                			নিবেদক <br>
                			মসজিদ কমিটির পক্ষে <br>

                			সাক্ষর ঃ <br>
                			তারিখ ঃ <br>
                			নামঃ <br>
                			ঠিকানা ঃ <br>
                		</div>
                	</div>



                </p>

					<div class="text-center">
						<button type="submit" id="saveMosjid" class="btn btn-success">সম্পাদন করুন</button>
					</div>
	                
               
            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!--row-->
{{ Form::close() }}
@endsection