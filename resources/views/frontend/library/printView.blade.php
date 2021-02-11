@extends('frontend.layouts.app')

@section('content')



    <div class="row">
        <div class="col-md-8 col-md-offset-2" >
            <div class="panel panel-default">                
                <div class="panel-heading text-center">
                    <h3> <b>অনলাইন মসজিদ পাঠাগার ডাটাবেইজ সফটওয়্যার  </b></h3>
                    <p>ইসলামিক ফাউন্ডেশন<br>
					আগারগাঁও, শেরেবাংলা নগর, ঢাকা-১২০৭</p>
                </div>

                <div class="panel-body">
					<table class="table">
						<colgroup>
						    <col width="30%">
						    <col width="700%">
						</colgroup>
					  	
					  	<tbody>
						   
						    <tr>
						      	<th style="border-top: none !important;">মসজিদের নাম</th>
						      	<th style="border-top: none !important;">
					                <div class="form-group">
					                  @if($errors->has('mosque_name'))
					                    <div class="alert alert-warning"><i class="fa fa-warning"></i>{{ $errors->first('mosque_name') }}</div>
					                  @endif
					                 
					                 : {{ $library->mosque_name}}
					                </div>
					                </div>
					              
						      	</th>
						    </tr>

						    <tr>
						      	<th style="border-top: none !important;">বিভাগ</th>
						      	<th style="border-top: none !important;">
					                <div class="form-group">
					                  @if($errors->has('div_name'))
					                    <div class="alert alert-warning"><i class="fa fa-warning"></i>{{ $errors->first('div_name') }}</div>
					                  @endif
					                 
					                 : {{ $library->div_name}}
					                </div>
					                </div>
					              
						      	</th>
						    </tr>

						   <tr>
						      	<th style="border-top: none !important;">জেলা</th>
						      	<th style="border-top: none !important;">
					                <div class="form-group">
					                  @if($errors->has('dis_name'))
					                    <div class="alert alert-warning"><i class="fa fa-warning"></i>{{ $errors->first('dis_name') }}</div>
					                  @endif
					                 
					                 : {{ $library->dis_name}}
					                </div>
					                </div>
					              
						      	</th>
						    </tr>

						   <tr>
						      	<th style="border-top: none !important;">উপজেলা</th>
						      	<th style="border-top: none !important;">
					                <div class="form-group">
					                  @if($errors->has('up_name'))
					                    <div class="alert alert-warning"><i class="fa fa-warning"></i>{{ $errors->first('up_name') }}</div>
					                  @endif
					                 
					                 : {{ $library->up_name}}
					                </div>
					                </div>
					              
						      	</th>
						    </tr>


						    <tr>
						      	<th style="border-top: none !important;">ইউনিয়ন / পৌরসভা</th>
						      	<th style="border-top: none !important;">
					                <div class="form-group">
					                  @if($errors->has('un_name'))
					                    <div class="alert alert-warning"><i class="fa fa-warning"></i>{{ $errors->first('un_name') }}</div>
					                  @endif
					                 
					                 : {{ $library->un_name}}
					                </div>
					                </div>
					              
						      	</th>
						    </tr>

						    <tr>
						      	<th style="border-top: none !important;">গ্রামের নাম</th>
						      	<th style="border-top: none !important;">
					                <div class="form-group">
					                  @if($errors->has('vill_name'))
					                    <div class="alert alert-warning"><i class="fa fa-warning"></i>{{ $errors->first('vill_name') }}</div>
					                  @endif
					                 
					                 : {{ $library->vill_name}}
					                </div>
					                </div>
					              
						      	</th>
						    </tr>
						    <tr>
						      	<th style="border-top: none !important;">পাঠাগার প্রতিষ্ঠার সন </th>
						      	<th style="border-top: none !important;">
					                <div class="form-group">
					                  @if($errors->has('establish_year'))
					                    <div class="alert alert-warning"><i class="fa fa-warning"></i>{{ $errors->first('establish_year') }}</div>
					                  @endif
					                  
					                 : {{ $library->establish_year}}
					                </div>
					              
						      	</th>
						    </tr>

						    <tr>
						      	<th style="border-top: none !important;">ইফা প্রদত্ত পুস্তকের সংখ্যা ও প্রয়োজনীয় তথ্য </th>
						      	<th style="border-top: none !important;">
					                <div class="form-group">
					                  @if($errors->has('total_books_by_ifa'))
					                    <div class="alert alert-warning"><i class="fa fa-warning"></i>{{ $errors->first('total_books_by_ifa') }}</div>
					                  @endif
					                  
					                 : {{ $library->total_books_by_ifa}}
					                </div>
					              
						      	</th>
						    </tr>

						    <tr>
						      	<th style="border-top: none !important;">বাইরের প্রকাশনার প্রদত্ত পুস্তকের সংখ্যা ও প্রয়োজনীয় তথ্য </th>
						      	<th style="border-top: none !important;">
					                <div class="form-group">
					                  @if($errors->has('total_books_by_other'))
					                    <div class="alert alert-warning"><i class="fa fa-warning"></i>{{ $errors->first('total_books_by_other') }}</div>
					                  @endif
					                  
					                : {{ $library->total_books_by_other}}
					                </div>
					              
						      	</th>
						    </tr>

						    <tr>
						      	<th style="border-top: none !important;">প্রাপ্ত পুস্তকের সংখ্যা  </th>
						      	<th style="border-top: none !important;">
					                <div class="form-group">
					                  @if($errors->has('total_books'))
					                    <div class="alert alert-warning"><i class="fa fa-warning"></i>{{ $errors->first('total_books') }}</div>
					                  @endif
					                  
					                : {{ $library->total_books}}
					                </div>
					              
						      	</th>
						    </tr>

						    <tr>
						      	<th style="border-top: none !important;">পুস্তক সংরক্ষনের জন্য প্রদত্ত আলমারীর সংখ্যা </th>
						      	<th style="border-top: none !important;">
					                <div class="form-group">
					                  @if($errors->has('total_almari'))
					                    <div class="alert alert-warning"><i class="fa fa-warning"></i>{{ $errors->first('total_almari') }}</div>
					                  @endif
					                  
					                : {{ $library->total_almari}}
					                </div>
					              
						      	</th>
						    </tr>

						    <tr>
						      	<th style="border-top: none !important;">পুস্তক সংরক্ষনের জন্য প্রদত্ত আলমারী প্রদানের তারিখ </th>
						      	<th style="border-top: none !important;">
					                <div class="form-group">
					                  @if($errors->has('almari_receive_date'))
					                    <div class="alert alert-warning"><i class="fa fa-warning"></i>{{ $errors->first('almari_receive_date') }}</div>
					                  @endif
					                  
					                : {{ $library->almari_receive_date}}
					                </div>
					              
						      	</th>
						    </tr>

						    <tr>
						      	<th style="border-top: none !important;">সর্বশেষ পরিদর্শন এর তারিখ  </th>
						      	<th style="border-top: none !important;">
					                <div class="form-group">
					                  @if($errors->has('last_visit_date'))
					                    <div class="alert alert-warning"><i class="fa fa-warning"></i>{{ $errors->first('last_visit_date') }}</div>
					                  @endif
					                  
					                : {{ $library->last_visit_date}}
					                </div>
					              
						      	</th>
						    </tr>
						    <tr>
						      	<th style="border-top: none !important;">পরিদর্শনকারীর নাম </th>
						      	<th style="border-top: none !important;">
					                <div class="form-group">
					                  @if($errors->has('visitor_name'))
					                    <div class="alert alert-warning"><i class="fa fa-warning"></i>{{ $errors->first('visitor_name') }}</div>
					                  @endif
					                  
					                : {{ $library->visitor_name}}
					                </div>
					              
						      	</th>
						    </tr>

						    <tr>
						      	<th style="border-top: none !important;">পরিদর্শনকারীর পদবি </th>
						      	<th style="border-top: none !important;">
					                <div class="form-group">
					                  @if($errors->has('visitor_designation'))
					                    <div class="alert alert-warning"><i class="fa fa-warning"></i>{{ $errors->first('visitor_designation') }}</div>
					                  @endif

					                : {{ $library->visitor_designation}}
					                </div>
					              
						      	</th>
						    </tr>

						    <tr>
						      	<th style="border-top: none !important;">পরিদর্শনকারীর ঠিকানা  </th>
						      	<th style="border-top: none !important;">
					                <div class="form-group">
					                  @if($errors->has('visitor_address'))
					                    <div class="alert alert-warning"><i class="fa fa-warning"></i>{{ $errors->first('visitor_address') }}</div>
					                  @endif
					                  
					                : {{ $library->visitor_address}}
					                </div>
					              
						      	</th>
						    </tr>

						    <tr>
						      	<th style="border-top: none !important;">পরিদর্শনকারীর মন্তব্য  </th>
						      	<th style="border-top: none !important;">
					                <div class="form-group">
					                  @if($errors->has('visitor_comment'))
					                    <div class="alert alert-warning"><i class="fa fa-warning"></i>{{ $errors->first('visitor_comment') }}</div>
					                  @endif
					                  
					                 <textarea name="visitor_comment" id="visitor_comment" class="form-control required clear"> {{ $library->visitor_comment}}</textarea>
					                </div>
					              
						      	</th>
						    </tr>

						    <tr>
						      	<th style="border-top: none !important;">সাইনবোর্ড আছে /নাই </th>
						      	<th style="border-top: none !important;">
					                <div class="form-group">
					                  @if($errors->has('have_signboard'))
					                    <div class="alert alert-warning"><i class="fa fa-warning"></i>{{ $errors->first('have_signboard') }}</div>
					                  @endif
					                  
					                  <div class="form-check">
										
										@if ( $library->have_signboard === 1)
										    : আছে
										@else
										    : নাই
										@endif
										
										</div>
					                </div>
					              
						      	</th>
						    </tr>

						      <tr>
						      	<th style="border-top: none !important;"> মডেল মসজিদ কিনা </th>
						      	<th style="border-top: none !important;">
					                <div class="form-group">
					                  @if($errors->has('is_model_mosque'))
					                    <div class="alert alert-warning"><i class="fa fa-warning"></i>{{ $errors->first('is_model_mosque') }}</div>
					                  @endif
					                  
					                  <div class="form-check">
										
										@if ( $library->is_model_mosque === 1)
										    : আছে
										@else
										    : নাই
										@endif
										
										</div>
					                </div>
					              
						      	</th>
						    </tr>
					  </tbody>
					</table>
					
	                
                </div>
            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!--row-->
    
<script type="text/javascript">

    window.print();
    setTimeout(function () {
        window.close();
    }, 150);

</script>


@endsection