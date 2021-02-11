
@extends('backend.layouts.app')


@section('content')

<!-- Search Panel Start   -->
<style>
 .mControl {
 max-width: 150px;
 min-width: 100px;
 }

 .fieldset {
 margin: 0px;
 padding: 0px;
 }

 .panel-heading {
 padding: 5px 10px !important
 }

 .form-control {
 width: 100% !important;
 }
 .form-group {
 width: 100% !important;
 }
</style>

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true" style="padding: 0px 100px 0px 100px">
 <div class="panel panel-primary">
 <div class="panel-heading" role="tab" id="headingOne">
 <div class="panel-title">
 <span class="glyphicon glyphicon-plus"></span>
 <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true"
 aria-controls="collapseOne" style="text-decoration: none;">
 Search Panel
 </a>
 </div>
 </div>
 <fieldset class="fieldset">
 <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
 <div class="panel-body form-inline">
 <div class="row">
    {{ Form::open(['route' => 'frontend.library.list', 'class' => '','id'=>'']) }}
    
    <select name="division_id" id="division" class="form-control required">
        <option value="">-- বিভাগ নির্বাচন করুন  --</option>                           
            @foreach($division as $item)
            <option value="{{ $item->id }}" {{ old('division_id')==$item->id?'selected':'' }}>
                {{ 
                    $item->bn_name
                }}
            </option>
            @endforeach
    </select>

   <select name="district_id" id="district" class="district_val form-control required">
        <option value="">-- জেলা নির্বাচন করুন  --</option>
    </select>

    <select name="upazilla_id" id="uapzila" class="upazila_val form-control required">
        <option value="">-- উপজেলা নির্বাচন করুন  --</option>
    </select>

    <select name="union_id" id="union" class="union_val form-control required">
        <option value="">-- ইউনিয়ন নির্বাচন করুন  --</option>
    </select>

    <button type="submit"  class="btn btn-success"> খুঁজুন </button>

    {{ Form::close() }}
   
 </div>
 </div>
 </div>
 </fieldset>
 </div>
</div>

<!-- Search Panel End   -->


<!-- List Start   -->
    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
                
                @include('backend.library._list_sub_nav')

                <div class="panel-body">
                	<div class="">
                		<table class="table table-bordered">
                			<thead>
                				<tr>
            						<td class="text-center">মসজিদের নাম</td>
            						<td class="text-center">পাঠাগার প্রতিষ্ঠার সন</td>
                                    <td class="text-center">বিভাগ</td>
                                    <td class="text-center">জেলা</td>
                                    <td class="text-center">উপজেলা</td>
                                    <td class="text-center">ইউনিয়ান</td>
            						<td class="text-center">পরিদর্শনকারীর নাম</td>
            						<td class="text-center">পরিদর্শন এর তারিখ</td>
            						<td class="text-center"></td>
                                    <td class="text-center"></td>
            					</tr>
                			</thead>
                			<tbody>
            				@foreach($library as $key => $item)
            					<tr>
            						<td>{{ $item->mosque_name}}</td>
            						<td>{{ $item->establish_year}}</td>
                                    <td>{{ $item->div_name}}</td>
                                    <td>{{ $item->dis_name}}</td>
                                    <td>{{ $item->up_name}}</td>
                                    <td>{{ $item->un_name}}</td>
            						<td>{{ $item->visitor_name}}</td>
            						<td>{{ $item->last_visit_date}}</td>
            						<td><a href="/library/edit/{{$item->id }}"><i class="fa fa-edit"></i></a></td>
                                    <td><a href="/library/printView/{{$item->id }}"><i class="fa fa-print"></i></a></td>
            					</tr>
                			@endforeach
                			</tbody>
                		</table>
                	</div>
                    
                </div>
            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!--row-->

<!-- List End   -->

@endsection