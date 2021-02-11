@extends('frontend.layouts.app')

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
 <div class="panel-heading" role="tab" id="headingOne" style="background-color: green">
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
    {{ Form::open(['route' => 'frontend.imam.showMuaList', 'class' => '','id'=>'']) }}
    
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

    <select name="upazilla_id" id="upazila" class="upazila_val form-control required">
        <option value="">-- উপজেলা নির্বাচন করুন  --</option>
    </select>

    <select name="union_id" id="union" class="union_val form-control required">
        <option value="">-- ইউনিয়ন নির্বাচন করুন  --</option>
    </select>

    <input type="text" name="phone" placeholder=" ফোন খুঁজুন" class="form-control">
    <input type="text" name="reg_code" placeholder=" রেজিস্টার খুঁজুন" class="form-control">
    <input type="text" name="imam_name" placeholder="নাম খুঁজুন" class="form-control">
      <select class="form-control" name="paginate">
        <option value="25">25</option>
        <option value="50">50</option>
        <option value="75">75</option>
        <option value="100">100</option>
        <option value="500">500</option>
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

    <div class="row">

        <div class="col-xs-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-home"></i> ইমাম তালিকা 
                </div>

                <div class="panel-body">
                    <div class="">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <!-- <td class="text-center">#</td> -->
                                    <td class="text-center">নাম</td>
                                    <td class="text-center">রেজিষ্ট্রেশন কোড</td>
                                    <td class="text-center">মোবাইল</td>
                                    <td class="text-center">জন্ম তারিখ</td>
                                    <td class="text-center">জেলা</td>
                                    <td class="text-center">উপজেলা</td>
                                    <td class="text-center">ইউনিয়ন / পৌরসভা </td>
                                    <!-- <td class="text-center">Action</td> -->
                                    
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($imam_info as $key => $item)
                                <tr>
                                    <!-- <td> </td> -->
                                    <td>{{ $item->name}}</td>
                                    <td class="text-center">{{ $item->reg_code}}</td>
                                    <td class="text-center">{{ $item->phone}}</td>
                                    <td class="text-center">{{ $item->dob}}</td>
                                    <td class="text-center">{{ $item->div_name}}</td>
                                    <td class="text-center">{{ $item->dis_name}}</td>
                                    <td class="text-center">{{ $item->up_name}}</td> 

                                   <!--  <td class="text-center">
                                        <a href="/imam/train/{{$item->id }}" class="btn">Training Form</a>
                                    </td> -->
                                    
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                          {{ $imam_info->links() }}
                    </div>
                    
                </div>
            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!--row-->
@endsection