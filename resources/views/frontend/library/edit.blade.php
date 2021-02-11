@extends('frontend.layouts.app')

@section('content')
{{ Form::open(['route' => 'frontend.library.update', 'class' => '','id'=>'']) }}
    <div class="row">

        <div class="col-md-8 col-md-offset-2" >

            <div class="panel panel-default">
                
                <div class="panel-heading text-center">
                    <h3> <b>অনলাইন মসজিদ পাঠাগার ডাটাবেইজ সফটওয়্যার  </b></h3>
                    <p>ইসলামিক ফাউন্ডেশন<br>
					আগারগাঁও, শেরেবাংলা নগর, ঢাকা-১২০৭</p>
                </div>

                <div class="panel-body">
					<table class="table table-bordered">
						<colgroup>
						    <col width="30%">
						    <col width="700%">
						</colgroup>
					  	
					  	<tbody>
						    <tr>
						    <tr>
						      	<th>মসজিদের নাম</th>
						      	<th>
					                <div class="form-group">
					                  @if($errors->has('mosque_name'))
					                    <div class="alert alert-warning"><i class="fa fa-warning"></i>{{ $errors->first('mosque_name') }}</div>
					                  @endif
					                  
					                  <input type="text" name="mosque_name" id="mosque_name" value="{{ $library->mosque_name}}" class="form-control required clear">
					                </div>

					                <input type="hidden" name="id"  value="{{ $library->id}}" class="form-control required">
					                </div>
					              
						      	</th>
						    </tr>
						    <tr>
						      	<th>পাঠাগার প্রতিষ্ঠার সন </th>
						      	<th>
					                <div class="form-group">
					                  @if($errors->has('establish_year'))
					                    <div class="alert alert-warning"><i class="fa fa-warning"></i>{{ $errors->first('establish_year') }}</div>
					                  @endif
					                  
					                  <input type="text" name="establish_year" id="establish_year" value="{{ $library->establish_year}}" class="form-control required clear">
					                </div>
					              
						      	</th>
						    </tr>

						    <tr>
						      	<th>ইফা প্রদত্ত পুস্তকের সংখ্যা ও প্রয়োজনীয় তথ্য </th>
						      	<th>
					                <div class="form-group">
					                  @if($errors->has('total_books_by_ifa'))
					                    <div class="alert alert-warning"><i class="fa fa-warning"></i>{{ $errors->first('total_books_by_ifa') }}</div>
					                  @endif
					                  
					                  <input type="text" value="{{ $library->total_books_by_ifa}}" name="total_books_by_ifa" id="total_books_by_ifa" class="form-control required clear books">					                   
					                </div>
					              
						      	</th>
						    </tr>

						    <tr>
						      	<th>বাইরের প্রকাশনার প্রদত্ত পুস্তকের সংখ্যা ও প্রয়োজনীয় তথ্য </th>
						      	<th>
					                <div class="form-group">
					                  @if($errors->has('total_books_by_other'))
					                    <div class="alert alert-warning"><i class="fa fa-warning"></i>{{ $errors->first('total_books_by_other') }}</div>
					                  @endif
					                  
					                  <input type="text" name="total_books_by_other" value="{{ $library->total_books_by_other}}" id="total_books_by_other" class="form-control required clear books">
					                </div>
					              
						      	</th>
						    </tr>

						    <tr>
						      	<th>প্রাপ্ত পুস্তকের সংখ্যা  </th>
						      	<th>
					                <div class="form-group">
					                  @if($errors->has('total_books'))
					                    <div class="alert alert-warning"><i class="fa fa-warning"></i>{{ $errors->first('total_books') }}</div>
					                  @endif
					                  
					                  <input type="text" name="total_books" value="{{ $library->total_books}}" id="total_books" readonly class="form-control required clear">
					                </div>
					              
						      	</th>
						    </tr>

						    <tr>
						      	<th>পুস্তক সংরক্ষনের জন্য প্রদত্ত আলমারীর সংখ্যা </th>
						      	<th>
					                <div class="form-group">
					                  @if($errors->has('total_almari'))
					                    <div class="alert alert-warning"><i class="fa fa-warning"></i>{{ $errors->first('total_almari') }}</div>
					                  @endif
					                  
					                  <input type="text" value="{{ $library->total_almari}}" name="total_almari" id="total_almari" class="form-control required clear">
					                </div>
					              
						      	</th>
						    </tr>

						    <tr>
						      	<th>পুস্তক সংরক্ষনের জন্য প্রদত্ত আলমারী প্রদানের তারিখ </th>
						      	<th>
					                <div class="form-group">
					                  @if($errors->has('almari_receive_date'))
					                    <div class="alert alert-warning"><i class="fa fa-warning"></i>{{ $errors->first('almari_receive_date') }}</div>
					                  @endif
					                  
					                  <input type="date" value="{{ $library->almari_receive_date}}" name="almari_receive_date" id="almari_receive_date" class="form-control required clear">
					                </div>
					              
						      	</th>
						    </tr>

						    <tr>
						      	<th>সর্বশেষ পরিদর্শন এর তারিখ  </th>
						      	<th>
					                <div class="form-group">
					                  @if($errors->has('last_visit_date'))
					                    <div class="alert alert-warning"><i class="fa fa-warning"></i>{{ $errors->first('last_visit_date') }}</div>
					                  @endif
					                  
					                  <input type="date" value="{{ $library->last_visit_date}}" name="last_visit_date" id="last_visit_date" class="form-control required clear">
					                </div>
					              
						      	</th>
						    </tr>
						    <tr>
						      	<th>পরিদর্শনকারীর নাম </th>
						      	<th>
					                <div class="form-group">
					                  @if($errors->has('visitor_name'))
					                    <div class="alert alert-warning"><i class="fa fa-warning"></i>{{ $errors->first('visitor_name') }}</div>
					                  @endif
					                  
					                  <input type="text" value="{{ $library->visitor_name}}" name="visitor_name" id="visitor_name" class="form-control required clear">
					                </div>
					              
						      	</th>
						    </tr>

						    <tr>
						      	<th>পরিদর্শনকারীর পদবি </th>
						      	<th>
					                <div class="form-group">
					                  @if($errors->has('visitor_designation'))
					                    <div class="alert alert-warning"><i class="fa fa-warning"></i>{{ $errors->first('visitor_designation') }}</div>
					                  @endif
					                  
					                  <input type="text" value="{{ $library->visitor_designation}}" name="visitor_designation" id="visitor_designation" class="form-control required clear">
					                </div>
					              
						      	</th>
						    </tr>

						    <tr>
						      	<th>পরিদর্শনকারীর ঠিকানা  </th>
						      	<th>
					                <div class="form-group">
					                  @if($errors->has('visitor_address'))
					                    <div class="alert alert-warning"><i class="fa fa-warning"></i>{{ $errors->first('visitor_address') }}</div>
					                  @endif
					                  
					                  <input type="text" value="{{ $library->visitor_address}}" name="visitor_address" id="visitor_address" class="form-control required clear">
					                </div>
					              
						      	</th>
						    </tr>

						    <tr>
						      	<th>পরিদর্শনকারীর মন্তব্য  </th>
						      	<th>
					                <div class="form-group">
					                  @if($errors->has('visitor_comment'))
					                    <div class="alert alert-warning"><i class="fa fa-warning"></i>{{ $errors->first('visitor_comment') }}</div>
					                  @endif
					                  
					                  <textarea name="visitor_comment" id="visitor_comment" class="form-control required clear">{{ $library->visitor_comment}}</textarea>
					                </div>
					              
						      	</th>
						    </tr>

						    <tr>
						      	<th>সাইনবোর্ড আছে /নাই </th>
						      	<th>
					                <div class="form-group">
					                  @if($errors->has('have_signboard'))
					                    <div class="alert alert-warning"><i class="fa fa-warning"></i>{{ $errors->first('have_signboard') }}</div>
					                  @endif
					                  
					                  <div class="form-check">
										  <input class="form-check-input" type="radio" name="have_signboard" id="haveRadio" value="1" checked>
										  <label class="form-check-label" for="haveRadio">
										    আছে
										  </label>
										
										  <input class="form-check-input" type="radio" name="have_signboard" id="noRadion" value="0">
										  <label class="form-check-label" for="noRadion">
										    নাই
										  </label>
										</div>
					                </div>
					              
						      	</th>
						    </tr>

						       <tr>
						      	<th> মডেল মসজিদ কিনা?</th>
						      	<th>
					                <div class="form-group">
					                  @if($errors->has('is_model_mosque'))
					                    <div class="alert alert-warning"><i class="fa fa-warning"></i>{{ $errors->first('is_model_mosque') }}</div>
					                  @endif
					                  
					                  <div class="form-check">
										  <input class="form-check-input" type="radio" name="is_model_mosque" id="haveRadio" value="1" checked>
										  <label class="form-check-label" for="haveRadio">
										    হ্যাঁ
										  </label>
										
										  <input class="form-check-input" type="radio" name="is_model_mosque" id="noRadion" value="0">
										  <label class="form-check-label" for="noRadion">
										    না
										  </label>
										</div>
					                </div>
					              
						      	</th>
						    </tr>


					  </tbody>
					</table>
					<div class="text-center">
						<button type="submit" id="saveMosjid" class="btn btn-success">সম্পাদন করুন</button>
					</div>
	                
                </div>
            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!--row-->
{{ Form::close() }}
@endsection