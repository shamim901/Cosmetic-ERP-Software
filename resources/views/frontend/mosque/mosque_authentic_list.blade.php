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
    {{ Form::open(['route' => 'frontend.mosque.list', 'class' => '','id'=>'']) }}
    
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

    <br>

    <!-- <input type="text" name="reg_code" class="form-control"> -->

     <select  name="reg_code" class="masjid_reg_code_auto_search"  class="form-control" id="masjid_reg_code_auto_search">

    </select>

    <select  name="masjid_name" class="masjid_name_auto_search"  class="form-control" id="masjid_name_auto_search">
      <!--   <option value=""></option> -->
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
                    <i class="fa fa-home"></i> মসজিদ জরিপ তালিকা 
                </div>

                <div class="panel-body">
                    <div class="">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td class="text-center">মসজিদের নাম</td>
                                    <td class="text-center">মসজিদের রেজিষ্ট্রেশন কোড</td>
                                    <td class="text-center">মসজিদ প্রতিষ্ঠার সন</td>
                                    <td class="text-center">মসজিদের আয়তন</td>
                                    <!-- <td class="text-center">Library Application Form</td> -->
                                    <td colspan="2" class="text-center"> Action</td>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($mosque as $key => $item)
                                <tr>
                                    <td>{{ $item->mosques_name}}</td>
                                    <td class="text-center">{{ $item->mosques_reg_code}}</td>
                                    <td class="text-center">{{ $item->mosques_establishment_year}}</td>
                                    <td class="text-center">{{ $item->mosques_size}}</td>

                                  <!--   <td class="text-center">
                                        <a href="/mosque/mosApplication/{{$item->id }}"><i class="fa fa-edit"></i></a>
                                    </td> -->

                                     <td class="text-center">
                                        <a href="/imam/authentic_mosjid/{{$item->id }}" class="btn"> Approved </a>
                                    </td>

                                    <td class="text-center">
                                     <a href="/train/cancel/{{$item->id }}" class="btn"> Cancel </a> 
                                    </td>
                                    
                                    
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div><!-- panel -->

        </div><!-- col-md-10 -->

    </div><!--row-->
@endsection